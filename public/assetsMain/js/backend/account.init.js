/*
Template Name: Toner eCommerce + Admin HTML Template
Author: Themesbrand
Website: https://Themesbrand.com/
Contact: Themesbrand@gmail.com
File: Account init js
*/

var swiper = new Swiper(".mySwiper", {
    loop: 'true',
    spaceBetween: 10,
    autoplay: {
        delay: 2500,
        disableOnInteraction: false,
    },
});

var removeBtns = document.getElementsByClassName("remove-item-btn");

Array.from(removeBtns).forEach(function (btn) {
    btn.addEventListener("click", function (e) {
        
        e.target.closest("tr").remove()
    });
});
