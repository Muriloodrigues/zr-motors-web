import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

document.addEventListener('DOMContentLoaded', function() {
    const header = document.getElementById('main-header');
    const footer = document.getElementById('main-footer');

    console.log("O JS encontrou o menu?", header);
    console.log("O JS encontrou o footer?", footer);

    if (header && footer) {
        const observer = new IntersectionObserver(function(entries) {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    header.classList.add('-translate-y-full');
                } else {
                    header.classList.remove('-translate-y-full');
                }
            });
        }, {
            root: null,
            threshold: 0.1 
        });
        observer.observe(footer);
    }
});