var swiper1 = new Swiper('.basic-swiper', {
    spaceBetween: 30,
    loop: true,
    autoplay: {
        delay: 2500,
        disableOnInteraction: false
    },
    pagination: {
        el: '.swiper-pagination1',
        clickable: true,
    },
    navigation: {
        nextEl: '.swiper-button-next1',
        prevEl: '.swiper-button-prev1',
    },
});

var swiper2 = new Swiper('.card-swiper', {
    slidesPerView: 4,
    spaceBetween: 30,
    loopFillGroupWithBlank: true,
    pagination: {
        el: '.swiper-scrollbar1',
        type: 'progressbar',
    },
});

var swiper3 = new Swiper('.mini-card-swiper', {
    slidesPerView: 3,
    spaceBetween: 30,
    loopFillGroupWithBlank: true,
    scrollbar: {
        el: '.swiper-scrollbar2',
    },
});

var swiper4 = new Swiper('.wide-swiper', {
    spaceBetween: 30,
    effect: 'fade',
    pagination: {
        el: '.swiper-pagination2',
        clickable: true,
    },
});