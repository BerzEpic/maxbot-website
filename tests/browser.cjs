/* Optional Playwright UI test: real PHP rendering, mocked Freemius library, no payments. */
'use strict';
const assert = require('node:assert/strict');
const {spawn} = require('node:child_process');
const path = require('node:path');
const {chromium} = require(process.env.PLAYWRIGHT_MODULE || 'playwright');
const root = path.resolve(__dirname, '..');
const origin = 'http://127.0.0.1:8082';
const base = origin + '/landing/maxbot/';
const server = spawn(process.env.PHP_BIN || 'php', ['-S','127.0.0.1:8082',path.join(__dirname,'router.php')], {
  cwd:root, env:{...process.env,
    MAXBOT_FREEMIUS_CHECKOUT_MODE:'sandbox',
    MAXBOT_FREEMIUS_SANDBOX_PROTECTED:'1',
    MAXBOT_FREEMIUS_SECRET_KEY:'sk_TEST_ONLY_NOT_A_REAL_FREEMIUS_SECRET_KEY'
  }, stdio:['ignore','pipe','pipe']
});
let browser, checks=0, serverLogs='';
server.stderr.on('data',b=>{serverLogs+=b;});
function check(value,msg) { assert.ok(value,msg);checks++; }
async function start() {
  for(let i=0;i<50;i++){
    try{const response=await fetch(base); if(response.ok) return;}catch{}
    await new Promise(resolve=>setTimeout(resolve,100));
  }
  throw Error('PHP server failed: '+serverLogs);
}
(async()=>{
  await start();
  browser=await chromium.launch({headless:true,args:['--no-sandbox','--disable-dev-shm-usage']});
  const page=await browser.newPage({viewport:{width:1440,height:1000}});
  const errors=[];page.on('pageerror',e=>errors.push(e.message));
  await page.route('**/*',route=>{
    const url=route.request().url();
    if(url.startsWith('https://checkout.freemius.com/js/v1/')) {
      return route.fulfill({status:200,contentType:'application/javascript',body:
        'window.FS={Checkout:class{constructor(config){window.testConfig=config;}open(options){window.testOptions=options;}}};'});
    }
    return new URL(url).origin===origin ? route.continue() : route.abort();
  });
  const pages=['','features','docs','docs-free','docs-pro','docs-core','docs-whatsapp','templates','template?slug=undergraduate_admissions','tutorials','use-cases','integrations','whatsapp','privacy-policy'];
  for(const width of [1440,390]){
    await page.setViewportSize({width,height:900});
    for(const route of pages){
      const response=await page.goto(base+route,{waitUntil:'domcontentloaded'});
      check(response.status()===200,'renders '+route+' at '+width);
      check(await page.locator('h1').count()>0,'has page heading '+route);
      check(await page.locator('#launch-dialog').count()===0,'old modal absent '+route);
      check(await page.evaluate(()=>document.documentElement.scrollWidth<=innerWidth+1),'no horizontal overflow '+route+' at '+width);
      const pro=page.locator('[data-freemius-checkout="professional"]');
      check(await pro.count()>0,'shared Pro purchase action '+route);
    }
  }
  await page.goto(base);
  const button=page.locator('main [data-freemius-checkout="professional"]').first();
  await button.click();
  await page.waitForFunction(()=>window.testOptions && window.testConfig);
  const details=await page.evaluate(()=>({constructor:window.testConfig,options:{licenses:window.testOptions.licenses,sandbox:window.testOptions.sandbox}}));
  check(details.constructor.product_id===42360,'correct product ID');
  check(details.constructor.plan_id===74609,'correct Professional plan');
  check(details.options.licenses===1,'one-site checkout');
  check(!!details.options.sandbox.token,'signed sandbox checkout');
  check(!errors.filter(e=>!e.includes('jQuery is not defined')).length,'no checkout JS errors: '+errors.join('; '));
  check(!/Fatal error|Parse error/.test(serverLogs),'no PHP fatal errors');
  console.log(checks+' optional browser checks passed; checkout SDK was mocked (no payments).');
})().catch(e=>{console.error(e);process.exitCode=1;}).finally(async()=>{if(browser)await browser.close();server.kill();});
