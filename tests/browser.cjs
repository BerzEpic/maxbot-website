/* Optional local browser checks: PHP + Playwright. All upstream responses are mocked. */
const assert = require('node:assert/strict');
const {spawn} = require('node:child_process');
const path = require('node:path');
const fs = require('node:fs');
const {chromium} = require(process.env.PLAYWRIGHT_MODULE || 'playwright');
const root = path.resolve(__dirname, '..');
const origin = 'http://127.0.0.1:8082';
const base = origin + '/landing/maxbot/';
const server = spawn(process.env.PHP_BIN || 'php', ['-S', '127.0.0.1:8082', path.join(__dirname, 'router.php')], {cwd: root, stdio: ['ignore', 'pipe', 'pipe']});
let serverLog = '';server.stderr.on('data', chunk => {serverLog += chunk;});
let count = 0, browser;
function check(value, message) {assert.ok(value, message); count++;}
async function start() {
  for(let i=0;i<40;i++) {try {const r=await fetch(base+'docs'); if(r.status===200)return;}catch{} await new Promise(r=>setTimeout(r,100));}
  throw Error('Local server failed: '+serverLog);
}
(async()=>{
  await start();
  browser=await chromium.launch({headless:true,executablePath:process.env.CHROMIUM_BIN || undefined,args:['--no-sandbox','--disable-dev-shm-usage','--disable-gpu']});
  const page=await browser.newPage({viewport:{width:1440,height:1000}});
  const errors=[];page.on('pageerror',e=>errors.push({message:e.message,url:page.url()}));
  await page.route('**/*', route => new URL(route.request().url()).origin === origin ? route.continue() : route.abort());
  const pages=['','features','docs','docs-free','docs-standard','docs-core','docs-whatsapp','templates','template?slug=undergraduate_admissions','tutorials','use-cases','integrations','whatsapp','privacy-policy'];
  const links = new Set();
  for(const width of [1440,390]) {
    await page.setViewportSize({width,height:900});
    for(const route of pages) {
      const response=await page.goto(base+route,{waitUntil:'domcontentloaded'});
      check(response.status()===200,'renders '+route);
      check(await page.locator('h1').count()>0,'heading '+route);
      check(await page.evaluate(()=>document.documentElement.scrollWidth<=innerWidth+1),'no page overflow '+width+' '+route);
      check(await page.locator('a[href*="codecanyon.net/item"]').count()===0,'no old purchase destinations');
      for(const href of await page.locator('a[href]').evaluateAll(as=>as.map(a=>a.href))) if(href.startsWith(base))links.add(href);
      if(route==='docs' && width===1440 && process.env.SCREENSHOT_DIR) await page.screenshot({path:path.join(process.env.SCREENSHOT_DIR,'docs-desktop.png'),fullPage:true});
      const buttons=page.locator('[data-launch-edition]');
      for(let i=0;i<await buttons.count();i++) {
        const button=buttons.nth(i);
        if(!await button.isVisible())continue;
        const edition=await button.getAttribute('data-launch-edition');
        await button.click();
        check(await page.locator('#launch-dialog').evaluate(el=>el.open),'opens CTA '+route);
        check((await page.locator('#launch-title').innerText()).includes(edition==='pro'?'Pro':'Standard'),'correct edition');
        check(!await page.locator('#launch-consent').isChecked(),'consent unchecked');
        check(await page.locator('#launch-email').evaluate(el=>el===document.activeElement),'initial email focus');
        if(route==='docs' && edition==='pro' && process.env.SCREENSHOT_DIR) await page.screenshot({path:path.join(process.env.SCREENSHOT_DIR,'modal-'+width+'.png')});
        await page.keyboard.press('Escape');
        check(await button.evaluate(el=>el===document.activeElement),'focus restored');
      }
    }
  }
  // Internal page/fragment checks. Check responses without requesting third-party media.
  const cache=new Map();
  for(const href of links) {
    const url=new URL(href);const target=url.origin+url.pathname+url.search;
    if(!cache.has(target)){const r=await page.request.get(target);check(r.status()===200,'internal link '+target);cache.set(target,await r.text());}
    if(url.hash && url.hash!=='#'){
      const id=decodeURIComponent(url.hash.slice(1));
      check(cache.get(target).includes('id="'+id+'"') || cache.get(target).includes("id='"+id+"'"),'fragment '+href);
    }
  }
  await page.goto(base+'docs');
  await page.locator('[data-nav-toggle]').click();
  await page.locator('.nav-cta [data-launch-edition]').click();
  check((await page.locator('#launch-title').innerText()).includes('Standard'),'mobile navigation Standard');
  await page.keyboard.press('Escape');
  await page.locator('[data-nav-toggle]').click();
  const opener=page.locator('[data-launch-edition="pro"]').first();
  async function open(){await opener.click();await page.locator('#launch-email').fill('visitor@example.com');}
  await open();
  await page.locator('#launch-email').fill('bad');await page.locator('#launch-submit').click();
  check(await page.locator('#launch-email').getAttribute('aria-invalid')==='true','invalid email');
  check(await page.locator('#launch-consent').getAttribute('aria-invalid')==='true','missing consent');
  await page.locator('#launch-email').fill('visitor@example.com');await page.locator('#launch-consent').check();
  await page.locator('#launch-submit').click();await page.locator('#launch-result[data-state=error]').waitFor();
  check((await page.locator('#launch-result').innerText()).includes('temporarily unavailable'),'real disabled endpoint');
  await page.keyboard.press('Escape');
  const endpoint='**/api/launch-interest.php';
  for(const [status,body,message] of [
    [200,{success:false,code:'not_confirmed'},'couldn’t confirm'],
    [429,{success:false,code:'rate_limited'},'Too many'],
    [503,{success:false,code:'signup_unavailable'},'unavailable'],
    [422,{success:false,code:'consent_required'},'Please agree'],
  ]) {
    await page.route(endpoint,r=>r.fulfill({status,contentType:'application/json',body:JSON.stringify(body)}));
    await open();await page.locator('#launch-consent').check();await page.locator('#launch-submit').click();
    await page.locator('#launch-result[data-state=error]').waitFor();
    check((await page.locator('#launch-result').innerText()).includes(message),'error/retry '+status);
    check(await page.locator('#launch-submit').isEnabled(),'retry enabled');
    await page.keyboard.press('Escape');await page.unroute(endpoint);
  }
  let requests=0;let release;
  await page.route(endpoint,async r=>{requests++;const data=r.request().postDataJSON();check(data.edition==='pro' && data.consent===true,'browser context agrees');await new Promise(resolve=>release=resolve);await r.fulfill({status:200,contentType:'application/json',body:JSON.stringify({success:true,code:'launch_interest_recorded'})});});
  await open();await page.locator('#launch-consent').check();await page.locator('#launch-submit').click();
  await page.waitForFunction(()=>document.querySelector('#launch-submit').disabled);
  await page.locator('#launch-form').evaluate(el=>{el.dispatchEvent(new Event('submit',{cancelable:true}));el.dispatchEvent(new Event('submit',{cancelable:true}));});
  check(requests===1,'no overlapping submissions'); release();
  await page.locator('#launch-result[data-state=success]').waitFor();
  check((await page.locator('#launch-result').innerText()).includes('Maxbot Pro'),'mocked success correct edition');
  await page.keyboard.press('Escape');await page.unroute(endpoint);
  await page.route(endpoint,r=>r.abort());await open();await page.locator('#launch-consent').check();await page.locator('#launch-submit').click();
  await page.locator('#launch-result[data-state=error]').waitFor();check((await page.locator('#launch-result').innerText()).includes('connection'),'network error');
  await page.keyboard.press('Escape');await page.unroute(endpoint);
  await open();
  await page.locator('[data-launch-close]').last().focus();await page.keyboard.press('Tab');
  check(await page.locator('.launch-close').evaluate(el=>el===document.activeElement),'Tab wraps');
  await page.keyboard.press('Shift+Tab');check(await page.locator('[data-launch-close]').last().evaluate(el=>el===document.activeElement),'Shift Tab wraps');
  await page.keyboard.press('Escape');
  check(await page.evaluate(()=>document.body.style.overflow===''),'scroll restored');
  const emptyResult = await page.request.post(base+'api/launch-interest.php',{data:{email:'visitor@example.com',consent:true,edition:'pro'}});
  check(emptyResult.status()===403,'custom-header protection');
  const badResult=await page.request.post(base+'api/launch-interest.php',{headers:{'X-Maxbot-Launch':'1'},data:{email:'bad',consent:true,edition:'pro'}});
  check(badResult.status()===422,'server rejects bad email');
  const expectedPreviewErrors=errors.filter(e=>e.message==='jQuery is not defined' && e.url.includes('/template?'));
  check(errors.length===expectedPreviewErrors.length,'no unexpected browser JavaScript errors: '+JSON.stringify(errors));
  console.log(`${expectedPreviewErrors.length} existing preview jQuery errors caused by intentionally blocked external CDN; preview runtime not validated.`);
  check(!/Fatal error|Warning:|Parse error/.test(serverLog),'no PHP runtime errors');
  console.log(`${count} browser/HTTP assertions passed. Upstream mocked; live signup not tested.`);
})().catch(e=>{console.error(e);process.exitCode=1;}).finally(async()=>{if(browser)await browser.close();server.kill();});
