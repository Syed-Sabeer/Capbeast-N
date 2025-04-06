/*
Template Name: Toner eCommerce + Admin HTML Template
Author: Themesbrand
Version: 1.2.0
Website: https://Themesbrand.com/
Contact: Themesbrand@gmail.com
File: modern fashion init Js File
*/


var swiper = new Swiper(".category-slider", {
    spaceBetween: 24,
    loop: true,
    autoplay: {
        delay: 2500,
        disableOnInteraction: false,
    },
    navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
    },
    breakpoints: {
        640: {
            slidesPerView: 2,
        },
        768: {
            slidesPerView: 4,
        },
        1024: {
            slidesPerView: 4,
        },
    },
});

// counter
const end = new Date("Augest 16, 2025 00:00:00").getTime();
//const end = new Date("November 09, 2020 00:00:00").getTime();
const dayEl = document.getElementById('days');
const hoursEl = document.getElementById('hours');
const minutesEl = document.getElementById('minutes');
const secondsEl = document.getElementById('seconds');
const seconds = 1000;
const minutes = seconds * 60;
const hours = minutes * 60;
const days = hours * 24;

const x = setInterval(function () {
    let now = new Date().getTime();
    const difference = end - now;

    if (difference < 0) {
        clearInterval(x);
        document.getElementById("done").innerHTML = "End Sales 🎉";
        return;
    }

    dayEl.innerText = Math.floor(difference / days);
    hoursEl.innerText = Math.floor((difference % days) / hours);
    minutesEl.innerText = Math.floor((difference % hours) / minutes);
    secondsEl.innerText = Math.floor((difference % minutes) / seconds);
}, seconds);

//filter nav
var filterBtns = document.querySelectorAll(".filter-btns .nav-link"),
    productItems = document.querySelectorAll(".product-item");
Array.from(filterBtns).forEach(function (t) {
    t.addEventListener("click", function (t) {
        t.preventDefault();
        for (var e = 0; e < filterBtns.length; e++) filterBtns[e].classList.remove("active");
        this.classList.add("active");
        var n = t.target.dataset.filter;
        Array.from(productItems).forEach(function (t) {
            "all" === n || t.classList.contains(n) ? (t.style.display = "block") : (t.style.display = "none");
        });
    });
});
