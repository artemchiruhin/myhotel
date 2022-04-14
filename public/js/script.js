const swiper = new Swiper('.swiper', {
    direction: 'horizontal',
    loop: true,
    speed: 500,
    autoplay: {
        delay: 5000,
    },
    navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
    },
});
