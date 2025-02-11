// Initialiser Swiper
var swiper = new Swiper(".mySwiper", {
    slidesPerView: 1, // Un avis à la fois
    spaceBetween: 30,
    loop: true, // Recommencer en boucle
    navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
    },
    pagination: {
        el: ".swiper-pagination",
        clickable: true,
    },
    autoplay: {
        delay: 5000, // Change d'avis toutes les 5 secondes
        disableOnInteraction: false,
    },
});
