function initBeforeAfterSliders(selector = '.slider-container') {
    const containers = document.querySelectorAll(selector);

    containers.forEach((container) => {
        const slider = container.querySelector('.before-after-slider');
        const before = container.querySelector('.before-image');
        const beforeImg = before?.querySelector('img');
        const resizer = container.querySelector('.resizer');

        if (!slider || !before || !beforeImg || !resizer) return;

        const syncWidth = () => {
            beforeImg.style.width = slider.offsetWidth + 'px';
        };

        const slideTo = (x) => {
            const w = slider.offsetWidth;
            const clamped = Math.max(0, Math.min(x, w));
            before.style.width = clamped + 'px';
            resizer.style.left = clamped + 'px';
        };

        const setInitial = () => {
            syncWidth();
            slideTo(slider.offsetWidth / 2);
        };

        let dragging = false;

        const clientXToLocalX = (clientX) => {
            const rect = slider.getBoundingClientRect();
            return clientX - rect.left;
        };

        resizer.addEventListener('pointerdown', (e) => {
            dragging = true;
            resizer.classList.add('resize');

            // Capture pointer so move/up are delivered even if pointer leaves the handle
            resizer.setPointerCapture?.(e.pointerId);

            slideTo(clientXToLocalX(e.clientX));
            e.preventDefault();
        });

        const stop = () => {
            dragging = false;
            resizer.classList.remove('resize');
        };

        resizer.addEventListener('pointerup', stop);
        resizer.addEventListener('pointercancel', stop);
        resizer.addEventListener('lostpointercapture', stop);

        resizer.addEventListener('pointermove', (e) => {
            if (!dragging) return;
            slideTo(clientXToLocalX(e.clientX));
            e.preventDefault();
        });

        window.addEventListener('resize', () => {
            const rect = slider.getBoundingClientRect();
            const current = parseFloat(before.style.width) || (rect.width / 2);
            const pct = rect.width ? (current / rect.width) : 0.5;

            syncWidth();
            slideTo(slider.offsetWidth * pct);
        });

        // Init
        setInitial();
    });
}

document.addEventListener('DOMContentLoaded', () => initBeforeAfterSliders());
