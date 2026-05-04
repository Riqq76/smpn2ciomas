// animasi load halaman
document.addEventListener("DOMContentLoaded", function () {
    const elements = document.querySelectorAll("[data-animate]");

    elements.forEach((el, index) => {

        // kondisi awal
        el.style.opacity = "0";
        el.style.transform = "translateY(30px)";

        setTimeout(() => {
            el.style.opacity = "1";
            el.style.transform = "translateY(0)";
            el.style.transition = "all 0.6s ease";
        }, 200 * index);

    });
});