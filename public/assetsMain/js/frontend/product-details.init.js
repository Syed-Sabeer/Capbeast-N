/*
Template Name: Toner eCommerce + Admin HTML Template
Author: Themesbrand
Website: https://Themesbrand.com/
Contact: Themesbrand@gmail.com
File: product Details init js
*/

var swiper = new Swiper(".productSwiper", {
    
    spaceBetween: 10,
    slidesPerView: 4,
    mousewheel: true,
    freeMode: true,
    watchSlidesProgress: true,
    breakpoints: {
      992: {
        slidesPerView: 4,
        spaceBetween: 10,
        direction: "vertical",
      },
    },
  });
  var swiper2 = new Swiper(".productSwiper2", {
    loop: true,
    spaceBetween: 10,
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
    thumbs: {
      swiper: swiper,
    },
  });