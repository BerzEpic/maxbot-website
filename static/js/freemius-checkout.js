/* Maxbot Pro Overlay Checkout: config fetched on demand; no secrets or license keys logged. */
(function () {
  'use strict';

  var meta = document.querySelector('meta[name="maxbot-checkout-config-url"]');
  var endpoint = meta && meta.content;
  var status = document.getElementById('freemius-checkout-status');
  if (!endpoint || !status) return;

  var checkoutScript = null;
  var busy = false;

  function inform(message, kind) {
    status.textContent = message;
    status.dataset.state = kind || 'info';
    status.hidden = !message;
  }

  function loadFreemius() {
    if (window.FS && typeof window.FS.Checkout === 'function') return Promise.resolve();
    if (checkoutScript) return checkoutScript;
    checkoutScript = new Promise(function (resolve, reject) {
      var script = document.createElement('script');
      script.src = 'https://checkout.freemius.com/js/v1/';
      script.async = true;
      script.onload = function () {
        if (window.FS && typeof window.FS.Checkout === 'function') resolve();
        else reject(new Error('Checkout library unavailable'));
      };
      script.onerror = function () { reject(new Error('Checkout library unavailable')); };
      document.head.appendChild(script);
    }).catch(function (error) {
      checkoutScript = null;
      throw error;
    });
    return checkoutScript;
  }

  async function openCheckout(button) {
    if (busy) return;
    busy = true;
    var buttons = document.querySelectorAll('[data-freemius-checkout]');
    buttons.forEach(function (node) { node.disabled = true; });
    inform('Opening secure Freemius checkout…', 'pending');
    try {
      var response = await fetch(endpoint, {
        method: 'GET',
        credentials: 'same-origin',
        cache: 'no-store',
        headers: { 'Accept': 'application/json' }
      });
      var payload = await response.json();
      if (!response.ok || payload.success !== true) {
        if (payload.code === 'sandbox_requires_protection') throw new Error('Sandbox checkout requires a protected staging website.');
        if (payload.code === 'sandbox_not_configured') throw new Error('Sandbox checkout has not been configured on this server.');
        throw new Error('Maxbot Pro checkout is not enabled yet.');
      }
      if (!['production', 'sandbox'].includes(payload.mode) || !payload.product_id || !payload.plan_id || !payload.public_key) {
        throw new Error('Checkout configuration is invalid.');
      }
      if (payload.mode === 'sandbox' && (!payload.sandbox || !payload.sandbox.token || !payload.sandbox.ctx)) {
        throw new Error('Sandbox checkout configuration is incomplete.');
      }
      await loadFreemius();
      var checkout = new window.FS.Checkout({
        product_id: payload.product_id,
        plan_id: payload.plan_id,
        public_key: payload.public_key
      });
      var options = {
        name: 'Maxbot Pro',
        licenses: 1,
        purchaseCompleted: function () {
          // This callback alone is NOT authoritative proof of payment settlement.
          inform('Freemius has registered your checkout. Check your email for purchase and license details.', 'success');
        },
        success: function () {
          inform('Thank you! Check your Freemius purchase email for the plugin and license details.', 'success');
        }
      };
      if (payload.mode === 'sandbox') options.sandbox = payload.sandbox;
      checkout.open(options);
      inform(payload.mode === 'sandbox'
        ? 'Freemius sandbox checkout opened. Use test payment details only; no real charge will be made.'
        : 'Secure Freemius checkout opened.', 'info');
    } catch (error) {
      inform(error && error.message ? error.message : 'Could not open checkout. Please try again.', 'error');
      status.focus();
    } finally {
      busy = false;
      buttons.forEach(function (node) { node.disabled = false; });
    }
  }

  document.addEventListener('click', function (event) {
    var button = event.target.closest('[data-freemius-checkout="professional"]');
    if (!button) return;
    event.preventDefault();
    openCheckout(button);
  });
}());
