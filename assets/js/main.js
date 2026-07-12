/* ============================================================
   Ben Maker Studio — front-end behavior
   Theme toggle · mobile menu · product modal · language switcher
   ============================================================ */

(function () {
    'use strict';

    /* ---- Theme toggle (persists in localStorage) ---- */
    var root = document.documentElement;
    var themeToggle = document.getElementById('theme-toggle');
    if (themeToggle) {
        themeToggle.addEventListener('click', function () {
            var next = root.getAttribute('data-theme') === 'light' ? 'dark' : 'light';
            root.setAttribute('data-theme', next);
            try { localStorage.setItem('theme', next); } catch (e) {}
        });
    }

    /* ---- Mobile menu ---- */
    var menuBtn = document.getElementById('menu-btn');
    var nav = document.getElementById('nav');
    if (menuBtn && nav) {
        menuBtn.addEventListener('click', function () {
            var open = nav.classList.toggle('open');
            menuBtn.setAttribute('aria-expanded', open ? 'true' : 'false');
        });
        nav.querySelectorAll('a').forEach(function (a) {
            a.addEventListener('click', function () {
                nav.classList.remove('open');
                menuBtn.setAttribute('aria-expanded', 'false');
            });
        });
    }

    /* ---- Product modal ---- */
    var modal = document.getElementById('product-modal');
    var successModal = document.getElementById('success-modal');

    function openSuccess() {
        if (!successModal) return;
        successModal.classList.add('open');
        successModal.setAttribute('aria-hidden', 'false');
        document.body.style.overflow = 'hidden';
    }
    function closeSuccess() {
        if (!successModal) return;
        successModal.classList.remove('open');
        successModal.setAttribute('aria-hidden', 'true');
        document.body.style.overflow = '';
    }
    if (successModal) {
        successModal.querySelectorAll('[data-close-success]').forEach(function (el) {
            el.addEventListener('click', closeSuccess);
        });
    }

    if (modal) {
        var mImg   = document.getElementById('modal-image');
        var mCat   = document.getElementById('modal-category');
        var mTitle = document.getElementById('modal-title');
        var mPrice = document.getElementById('modal-price');
        var mDesc  = document.getElementById('modal-description');
        var oForm  = document.getElementById('order-form');
        var oId    = document.getElementById('order-product-id');
        var oName  = document.getElementById('order-product-name');
        var oErr   = document.getElementById('order-error');
        var oBtn   = document.getElementById('order-submit');

        function openModal(card) {
            var name = card.getAttribute('data-name');
            mImg.src = card.getAttribute('data-image');
            mImg.alt = name;
            mTitle.textContent = name;
            mPrice.textContent = card.getAttribute('data-price');
            mDesc.textContent = card.getAttribute('data-description') || 'No description provided.';
            var cat = card.getAttribute('data-category');
            if (cat) { mCat.textContent = cat; mCat.style.display = ''; }
            else { mCat.style.display = 'none'; }
            if (oId) oId.value = card.getAttribute('data-id') || '';
            if (oName) oName.value = name;
            if (oErr) { oErr.hidden = true; oErr.textContent = ''; }
            if (oForm) oForm.reset();
            if (oId) oId.value = card.getAttribute('data-id') || '';
            if (oName) oName.value = name;
            modal.classList.add('open');
            modal.setAttribute('aria-hidden', 'false');
            document.body.style.overflow = 'hidden';
        }

        function closeModal() {
            modal.classList.remove('open');
            modal.setAttribute('aria-hidden', 'true');
            document.body.style.overflow = '';
        }

        document.querySelectorAll('.product-card').forEach(function (card) {
            card.addEventListener('click', function () { openModal(card); });
            card.addEventListener('keydown', function (e) {
                if (e.key === 'Enter' || e.key === ' ') { e.preventDefault(); openModal(card); }
            });
        });

        modal.querySelectorAll('[data-close]').forEach(function (el) {
            el.addEventListener('click', closeModal);
        });
        document.addEventListener('keydown', function (e) {
            if (e.key === 'Escape' && modal.classList.contains('open')) closeModal();
            if (e.key === 'Escape' && successModal && successModal.classList.contains('open')) closeSuccess();
        });

        /* ---- Submit order via fetch, then show congrats popup ---- */
        if (oForm) {
            oForm.addEventListener('submit', function (e) {
                e.preventDefault();
                if (oErr) { oErr.hidden = true; oErr.textContent = ''; }
                if (oBtn) { oBtn.disabled = true; oBtn.textContent = 'Sending…'; }

                fetch('order.php', { method: 'POST', body: new FormData(oForm) })
                    .then(function (r) { return r.json(); })
                    .then(function (data) {
                        if (data && data.ok) {
                            closeModal();
                            openSuccess();
                            oForm.reset();
                        } else {
                            if (oErr) { oErr.hidden = false; oErr.textContent = (data && data.error) || 'Something went wrong. Please try again.'; }
                        }
                    })
                    .catch(function () {
                        if (oErr) { oErr.hidden = false; oErr.textContent = 'Network error. Please try again.'; }
                    })
                    .finally(function () {
                        if (oBtn) { oBtn.disabled = false; oBtn.textContent = 'Order now'; }
                    });
            });
        }
    }

    /* ============================================================
       ---- Language switcher dropdown toggle (new) ----
       ============================================================ */
    var langToggleBtn = document.getElementById('langToggleBtn');
    var langDropdown = document.getElementById('langDropdown');

    if (langToggleBtn && langDropdown) {
        // Toggle dropdown on button click
        langToggleBtn.addEventListener('click', function (e) {
            e.stopPropagation();
            langDropdown.classList.toggle('open');
        });

        // Close dropdown when clicking outside
        document.addEventListener('click', function (e) {
            if (!langToggleBtn.contains(e.target) && !langDropdown.contains(e.target)) {
                langDropdown.classList.remove('open');
            }
        });

        // Optional: close dropdown after clicking a language link (page will reload, but good practice)
        langDropdown.querySelectorAll('a').forEach(function (link) {
            link.addEventListener('click', function () {
                langDropdown.classList.remove('open');
            });
        });
    }

})();