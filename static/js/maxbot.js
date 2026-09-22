/* Maxbot site behaviour — no dependencies. */
(function () {
  'use strict';

  var reduceMotion = window.matchMedia && window.matchMedia('(prefers-reduced-motion: reduce)').matches;

  /* ---------------------------------------------------------------- nav -- */
  function initNav() {
    var nav = document.querySelector('[data-nav]');
    var toggle = document.querySelector('[data-nav-toggle]');
    if (!nav || !toggle) return;

    function close() {
      nav.classList.remove('is-open');
      toggle.setAttribute('aria-expanded', 'false');
    }

    toggle.addEventListener('click', function () {
      var open = nav.classList.toggle('is-open');
      toggle.setAttribute('aria-expanded', open ? 'true' : 'false');
    });

    nav.querySelectorAll('a').forEach(function (link) {
      link.addEventListener('click', function () {
        if (window.innerWidth <= 980) close();
      });
    });

    document.addEventListener('keydown', function (e) {
      if (e.key === 'Escape') close();
    });

    window.addEventListener('resize', function () {
      if (window.innerWidth > 980) close();
    });
  }

  /* ------------------------------------------------------------ reveals -- */
  function initReveal() {
    var items = document.querySelectorAll('.reveal');
    if (!items.length) return;

    if (reduceMotion || !('IntersectionObserver' in window)) {
      items.forEach(function (el) { el.classList.add('is-in'); });
      return;
    }

    var io = new IntersectionObserver(function (entries) {
      entries.forEach(function (entry) {
        if (entry.isIntersecting) {
          entry.target.classList.add('is-in');
          io.unobserve(entry.target);
        }
      });
    }, { rootMargin: '0px 0px -8% 0px', threshold: 0.08 });

    items.forEach(function (el) { io.observe(el); });
  }

  /* ------------------------------------------------- documentation nav --- */
  function initDocs() {
    var aside = document.querySelector('[data-docs-nav]');
    var toggle = document.querySelector('[data-docs-toggle]');
    var links = Array.prototype.slice.call(document.querySelectorAll('[data-docs-link]'));
    var sections = Array.prototype.slice.call(document.querySelectorAll('[data-docs-section]'));
    var search = document.getElementById('docs-filter');
    var empty = document.getElementById('docs-filter-empty');

    if (toggle && aside) {
      toggle.addEventListener('click', function () {
        var open = aside.classList.toggle('is-open');
        toggle.setAttribute('aria-expanded', open ? 'true' : 'false');
      });
    }

    if (aside) {
      links.forEach(function (link) {
        link.addEventListener('click', function () {
          if (window.innerWidth <= 980) {
            aside.classList.remove('is-open');
            if (toggle) toggle.setAttribute('aria-expanded', 'false');
          }
        });
      });
    }

    if (search) {
      search.addEventListener('input', function () {
        var q = search.value.trim().toLowerCase();
        var visible = 0;

        document.querySelectorAll('.docs-group').forEach(function (group) {
          var matches = 0;
          group.querySelectorAll('.docs-link').forEach(function (link) {
            var hit = !q || link.textContent.toLowerCase().indexOf(q) !== -1;
            link.hidden = !hit;
            if (hit) matches += 1;
          });
          group.hidden = matches === 0;
          if (q && matches) group.open = true;
          visible += matches;
        });

        if (empty) empty.style.display = visible ? 'none' : 'block';
      });
    }

    if (links.length && sections.length) {
      var syncing = false;
      var sync = function () {
        var current = sections[0].id;
        sections.forEach(function (section) {
          if (section.getBoundingClientRect().top <= 150) current = section.id;
        });
        links.forEach(function (link) {
          var active = link.getAttribute('href') === '#' + current;
          link.classList.toggle('is-active', active);
          if (active) {
            var group = link.closest('details');
            if (group) group.open = true;
          }
        });
        syncing = false;
      };

      document.addEventListener('scroll', function () {
        if (syncing) return;
        syncing = true;
        window.requestAnimationFrame(sync);
      }, { passive: true });

      sync();
    }
  }

  /* ------------------------------------------- screenshot presentation --- */
  /**
   * Screenshots are laid out from their real dimensions:
   *  - wide images (ratio >= 1.65) take a full row,
   *  - square and tall images sit beside the text,
   * and no image is ever displayed wider than its natural size, so
   * nothing is upscaled into blur or squeezed out of proportion.
   */
  function initFigures() {
    var figures = document.querySelectorAll('[data-fig]');
    if (!figures.length) return;

    var pending = figures.length;

    function classify(figure) {
      var img = figure.querySelector('img');
      var w = img ? img.naturalWidth : 0;
      var h = img ? img.naturalHeight : 0;

      if (!w || !h) {
        // Unknown dimensions (still loading, or the file is missing):
        // fall back to a full-width row, which is always safe.
        figure.classList.add('docs-fig--wide');
        return;
      }

      var ratio = w / h;

      // The figure carries 10px of padding on each side, so capping it at the
      // image's natural width + 20px guarantees the image is never displayed
      // larger than it really is — no upscaling, and no blur.
      var cap = w + 20;
      img.style.aspectRatio = w + ' / ' + h;

      if (ratio >= 1.6) {
        figure.classList.add('docs-fig--wide');
        figure.style.maxWidth = cap + 'px';
      } else if (ratio >= 1.05) {
        figure.classList.add('docs-fig--square');
        figure.style.maxWidth = Math.min(460, cap) + 'px';
      } else {
        figure.classList.add('docs-fig--tall');
        figure.style.maxWidth = Math.min(320, cap) + 'px';
      }
    }

    /**
     * Once every screenshot in a section is measured, decide the section's
     * layout: a section whose screenshots are all tall or square puts them
     * beside the text, while anything wide keeps its own full-width row.
     */
    function layoutSections() {
      document.querySelectorAll('[data-docs-section]').forEach(function (section) {
        var figs = section.querySelectorAll('[data-fig]');
        if (!figs.length) return;

        var measured = true;
        var beside = figs.length <= 2;

        figs.forEach(function (fig) {
          if (!fig.classList.contains('docs-fig--wide') &&
              !fig.classList.contains('docs-fig--square') &&
              !fig.classList.contains('docs-fig--tall')) {
            measured = false;
          }
          if (fig.classList.contains('docs-fig--wide')) beside = false;
        });

        // Leave a section alone until every screenshot in it has been
        // measured, so it is never laid out from a guess.
        if (!measured) return;

        section.classList.toggle('doc-sec--aside', beside);
      });
    }

    figures.forEach(function (figure) {
      var img = figure.querySelector('img');
      if (!img) { pending -= 1; return; }

      function done() {
        classify(figure);
        pending -= 1;
        layoutSections();
      }

      if (img.complete) done();
      else {
        img.addEventListener('load', done, { once: true });
        img.addEventListener('error', done, { once: true });
      }
    });

    // Lazy-loaded screenshots below the fold resolve as the reader scrolls,
    // so re-run the section decision when they arrive.
    window.setTimeout(layoutSections, 1200);
    window.addEventListener('load', layoutSections);
  }

  /* ----------------------------------------------------------- lightbox -- */
  function initLightbox() {
    var box = document.getElementById('lightbox');
    if (!box) return;

    var image = box.querySelector('img');
    var close = box.querySelector('button');

    function hide() {
      box.classList.remove('is-open');
      box.setAttribute('aria-hidden', 'true');
      image.src = '';
      document.body.style.overflow = '';
    }

    document.querySelectorAll('[data-zoom]').forEach(function (button) {
      button.addEventListener('click', function () {
        var source = button.querySelector('img');
        if (!source) return;
        image.src = source.currentSrc || source.src;
        image.alt = source.alt;
        box.classList.add('is-open');
        box.setAttribute('aria-hidden', 'false');
        document.body.style.overflow = 'hidden';
        if (close) close.focus();
      });
    });

    if (close) close.addEventListener('click', hide);
    box.addEventListener('click', function (e) { if (e.target === box) hide(); });
    document.addEventListener('keydown', function (e) { if (e.key === 'Escape') hide(); });
  }

  document.addEventListener('DOMContentLoaded', function () {
    initNav();
    initReveal();
    initDocs();
    initFigures();
    initLightbox();
  });
})();
