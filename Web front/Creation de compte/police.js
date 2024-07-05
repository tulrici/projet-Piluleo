document.addEventListener('DOMContentLoaded', function() {
    const increaseButton = document.getElementById('increaseFont');
    const decreaseButton = document.getElementById('decreaseFont');
    const elementsToResize = [
        'body', 
        '.connexion p', 
        '.fontSizeControl', 
        '.login-container .heading',
        '.login-container .paragraph',
        '.login-container input',
        '.login-container button',
        '.bottom-text a',
        '#horloge'
    ];
    const maxFontSize = 40;
    const step = 2;

    function changeFontSize(increase) {
        elementsToResize.forEach(selector => {
            const elements = document.querySelectorAll(selector);
            elements.forEach(el => {
                let currentSize = parseFloat(window.getComputedStyle(el).fontSize);
                if (increase) {
                    currentSize = Math.min(currentSize + step, maxFontSize);
                } else {
                    currentSize = Math.max(currentSize - step, 1);
                }
                el.style.fontSize = currentSize + 'px';
            });
        });
    }

    increaseButton.addEventListener('click', () => {
        changeFontSize(true);
        applyHorlogeSize();
    });
    decreaseButton.addEventListener('click', () => {
        changeFontSize(false);
        applyHorlogeSize();
    });

    function applyHorlogeSize() {
        const horlogeEl = document.getElementById('horloge');
        if (horlogeEl) {
            const currentSize = parseFloat(window.getComputedStyle(horlogeEl).fontSize);
            horlogeEl.style.fontSize = currentSize + 'px';
        }
    }

    // Appliquer la taille initiale à l'horloge
    applyHorlogeSize();

    // Observer les changements dans le DOM
    const observer = new MutationObserver(applyHorlogeSize);
    observer.observe(document.getElementById('horloge'), { childList: true, subtree: true });
});
