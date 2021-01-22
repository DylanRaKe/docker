var swiper = new Swiper('.swiper-container', {
    effect: 'coverflow',
    speed: 400,
    spaceBetween: 30,
    setWrapperSize: true,
    roundLengths: true,
    loop: true,
    loopedSlides: 3,
    loopAdditionalSlides: 1,
    loopPreventsSlide: true,
    grabCursor: false,
    centeredSlides: true,
    centeredSlidesBounds: true,
    slidesPerView: 'auto',
    coverflowEffect: {
        rotate: 10,
        stretch: 0,
        depth: 250,
        modifier: 1,
        slideShadows: true,
    },
    navigation: {
    nextEl: '.swiper-button-next',
    prevEl: '.swiper-button-prev',
    },
pagination: {
    el: '.swiper-pagination',
},
});