document.addEventListener("DOMContentLoaded", () => {

    const elements = document.querySelectorAll("[data-animate]");

    const observer = new IntersectionObserver((entries) => {
        entries.forEach((entry, index) => {

            if (entry.isIntersecting) {
                const el = entry.target;

                const delay = el.dataset.delay || 0;
                const duration = el.dataset.duration || 600;
                const type = el.dataset.animate;

                setTimeout(() => {
                    el.style.transition = `
                        opacity ${duration}ms cubic-bezier(0.22, 1, 0.36, 1),
                        transform ${duration}ms cubic-bezier(0.22, 1, 0.36, 1)
                    `;

                    el.style.opacity = "1";
                    el.style.transform = "translateY(0) scale(1)";
                }, delay);

                observer.unobserve(el);
            }

        });
    }, {
        threshold: 0.2
    });

    elements.forEach((el, index) => {

        const type = el.dataset.animate;

        // kondisi awal berdasarkan tipe animasi
        el.style.opacity = "0";

        switch (type) {
            case "fade-up":
                el.style.transform = "translateY(40px)";
                break;
            case "fade-down":
                el.style.transform = "translateY(-40px)";
                break;
            case "fade-left":
                el.style.transform = "translateX(40px)";
                break;
            case "fade-right":
                el.style.transform = "translateX(-40px)";
                break;
            case "zoom-in":
                el.style.transform = "scale(0.8)";
                break;
            default:
                el.style.transform = "translateY(30px)";
        }

        // auto delay biar berurutan
        if (!el.dataset.delay) {
            el.dataset.delay = index * 150;
        }

        observer.observe(el);
    });

});