/* One accessible native dialog for all paid-edition launch actions. */
(function () {
  'use strict';
  var dialog = document.getElementById('launch-dialog');
  if (!dialog) return;
  var form = document.getElementById('launch-form');
  var email = form.elements.email;
  var consent = form.elements.consent;
  var submit = document.getElementById('launch-submit');
  var result = document.getElementById('launch-result');
  var opener, edition, pending = null, previousOverflow = '';
  var names = {standard: 'Maxbot Standard', pro: 'Maxbot Pro'};

  function announce(message, state) {
    result.textContent = message;
    result.dataset.state = state;
  }
  function clearErrors() {
    [email, consent].forEach(function (field) { field.removeAttribute('aria-invalid'); });
    document.getElementById('launch-email-error').textContent = '';
    document.getElementById('launch-consent-error').textContent = '';
  }
  function reset() {
    form.reset(); clearErrors(); form.hidden = false;
    submit.disabled = false; submit.textContent = 'Notify me at launch';
    form.removeAttribute('aria-busy'); announce('', '');
  }
  document.addEventListener('click', function (event) {
    var button = event.target.closest('[data-launch-edition]');
    if (!button || !names[button.dataset.launchEdition]) return;
    if (dialog.open) return;
    opener = button; edition = button.dataset.launchEdition; reset();
    form.elements.edition.value = edition;
    var name = names[edition];
    document.getElementById('launch-edition-label').textContent = name + (edition === 'pro' ? ' · Coming soon' : ' · Availability updates');
    document.getElementById('launch-title').textContent = edition === 'pro' ? 'Be first to know when Maxbot Pro launches' : 'Know when Maxbot Standard is available';
    document.getElementById('launch-description').textContent = edition === 'pro'
      ? 'Maxbot Pro is on the way. Leave your email and we’ll let you know as soon as it’s available.'
      : 'Maxbot Standard is planned for CodeCanyon as a one-time purchase. Leave your email for its availability announcement.';
    document.getElementById('launch-consent-copy').textContent = 'I agree to receive emails about the ' + name + ' launch.';
    previousOverflow = document.body.style.overflow;
    document.body.style.overflow = 'hidden';
    dialog.showModal(); email.focus();
  });
  function finishClose() {
    if (dialog.open) return;
    if (pending) { pending.abort(); pending = null; }
    document.body.style.overflow = previousOverflow;
    reset();
    if (opener && opener.isConnected) opener.focus();
  }
  function closeDialog() { dialog.close(); finishClose(); }
  dialog.querySelectorAll('[data-launch-close]').forEach(function (button) {
    button.addEventListener('click', closeDialog);
  });
  dialog.addEventListener('cancel', function (event) { event.preventDefault(); closeDialog(); });
  dialog.addEventListener('close', finishClose);
  // The native modal makes the background inert; keep Tab on its visible controls.
  dialog.addEventListener('keydown', function (event) {
    if (event.key !== 'Tab') return;
    var controls = Array.from(dialog.querySelectorAll('button, input, a[href]')).filter(function (el) {
      return !el.disabled && el.type !== 'hidden' && el.getClientRects().length;
    });
    var first = controls[0], last = controls[controls.length - 1];
    if (event.shiftKey && document.activeElement === first) { event.preventDefault(); last.focus(); }
    if (!event.shiftKey && document.activeElement === last) { event.preventDefault(); first.focus(); }
  });
  form.addEventListener('submit', async function (event) {
    event.preventDefault();
    if (pending) return;
    clearErrors(); announce('', '');
    email.value = email.value.trim();
    var badEmail = !email.validity.valid || /\s/.test(email.value);
    if (badEmail) {
      email.setAttribute('aria-invalid', 'true');
      document.getElementById('launch-email-error').textContent = 'Enter a valid email address.';
    }
    if (!consent.checked) {
      consent.setAttribute('aria-invalid', 'true');
      document.getElementById('launch-consent-error').textContent = 'Please agree to receive this edition’s launch email.';
    }
    if (badEmail || !consent.checked) { (badEmail ? email : consent).focus(); return; }
    var controller = new AbortController(); pending = controller;
    submit.disabled = true; submit.textContent = 'Submitting…'; form.setAttribute('aria-busy', 'true');
    announce('Submitting your request…', 'pending');
    var timedOut = false;
    var timer = setTimeout(function () { timedOut = true; controller.abort(); }, 15000);
    try {
      var response = await fetch(form.action, {
        method: 'POST', credentials: 'same-origin', signal: controller.signal,
        headers: {'Content-Type': 'application/json', 'Accept': 'application/json', 'X-Maxbot-Launch': '1'},
        body: JSON.stringify({email: email.value, consent: true, edition: edition})
      });
      var body = await response.json();
      if (pending !== controller || !dialog.open) return;
      if (response.ok && body.success === true && body.code === 'launch_interest_recorded') {
        form.hidden = true;
        announce('You’re on the list. We’ll let you know when ' + names[edition] + ' is available.', 'success');
        dialog.querySelector('[data-launch-close]').focus();
      } else {
        var messages = {
          invalid_email: 'Check your email address and try again.',
          consent_required: 'Please agree to receive this edition’s launch email.',
          rate_limited: 'Too many requests. Please wait a minute before trying again.',
          signup_unavailable: 'Launch signup is temporarily unavailable. Please try again later.',
          not_confirmed: 'We couldn’t confirm your launch request. Please try again later.',
          invalid_request: 'Your request could not be submitted. Please reload this page and try again.'
        };
        announce(messages[body.code] || 'We couldn’t submit your request. Please try again.', 'error');
      }
    } catch (error) {
      if (pending === controller && dialog.open) {
        announce(timedOut ? 'The request timed out. Please try again.' : 'We couldn’t reach the signup service. Check your connection and try again.', 'error');
      }
    } finally {
      clearTimeout(timer);
      if (pending === controller) {
        pending = null; submit.disabled = false; submit.textContent = 'Try again'; form.removeAttribute('aria-busy');
      }
    }
  });
}());
