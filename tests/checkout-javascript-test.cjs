/* No browser dependency. Mocks Freemius Checkout; does not perform real purchases. */
'use strict';
const assert = require('node:assert/strict');
const fs = require('node:fs');
const vm = require('node:vm');
const path = require('node:path');
const src = fs.readFileSync(path.resolve(__dirname, '../static/js/freemius-checkout.js'), 'utf8');

function mockApp(fetchResult) {
  let clickListener;
  const status = { textContent: '', dataset: {}, hidden: true, focusCalled: false, focus() {this.focusCalled = true;} };
  const button = { disabled: false };
  let openArgs = null;
  const scripts = [];
  const window = { FS: { Checkout: class Checkout {
    constructor(options) { this.options = options; }
    open(options) { openArgs = { constructor: this.options, options }; }
  } } };
  const document = {
    body: {},
    querySelector(selector) {
      if (selector === 'meta[name="maxbot-checkout-config-url"]') return {content:'/landing/maxbot/api/freemius-checkout.php'};
      return null;
    },
    getElementById(id) { return id === 'freemius-checkout-status' ? status : null; },
    querySelectorAll() { return [button]; },
    addEventListener(name, cb) { if (name === 'click') clickListener = cb; },
    head: {appendChild(script) {scripts.push(script); if(script.onload)script.onload();}},
    createElement() {return {}},
  };
  const context = {document, window, fetch: async ()=>fetchResult, Promise, Error};
  vm.runInNewContext(src, context);
  async function click() {
    clickListener({target:{closest() { return button; }}, preventDefault() {}});
    await new Promise(resolve => setImmediate(resolve));
  }
  return {click, status, button, scripts, window, getOpen: ()=>openArgs};
}
(async () => {
  const publicConfig = {
    success: true, mode:'sandbox', product_id:42360, plan_id:74609,
    public_key:'pk_1b72c370ec81ae12f3ef0391946bc',
    sandbox:{token:'TEST_ONLY_TOKEN',ctx:'TEST_ONLY_CONTEXT'}
  };
  const success = mockApp({ok:true,json:async()=>publicConfig});
  await success.click();
  const data = success.getOpen();
  assert.ok(data, 'checkout opened');
  assert.equal(data.constructor.plan_id,74609,'Professional plan selected');
  assert.equal(data.options.licenses,1,'one-site checkout');
  assert.equal(data.options.sandbox.token,'TEST_ONLY_TOKEN','sandbox token passed to Freemius');
  assert.equal(success.button.disabled,false,'purchase CTA reenabled');
  data.options.success({user:{email:'buyer@example.com'},license:{key:'FAKE_SENSITIVE_LICENSE'}});
  assert.match(success.status.textContent,/purchase email/i);
  assert.doesNotMatch(success.status.textContent,/FAKE_SENSITIVE_LICENSE/,'license not revealed');
  const disabled = mockApp({ok:false,json:async()=>({success:false,code:'checkout_disabled'})});
  await disabled.click();
  assert.match(disabled.status.textContent,/not enabled/i);
  assert.equal(disabled.button.disabled,false,'CTA reenabled on error');
  const production = mockApp({ok:true,json:async()=>({...publicConfig,mode:'production',sandbox:undefined})});
  await production.click();
  assert.ok(!('sandbox' in production.getOpen().options),'production never passes sandbox token');
  console.log('Freemius checkout JavaScript mock assertions passed.');
})().catch(e=>{console.error(e);process.exitCode=1;});
