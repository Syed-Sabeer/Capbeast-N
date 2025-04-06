/*
Template Name: Toner eCommerce + Admin HTML Template
Author: Themesbrand
Version: 1.2.0
Website: https://Themesbrand.com/
Contact: Themesbrand@gmail.com
File: trend fashion init Js File
*/

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


//top product slider
var swiper = new Swiper(".top-Product-slider", {
    loop: true,
    spaceBetween: 24,
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
        1024: {
            slidesPerView: 3,
        },
        1400: {
            slidesPerView: 5,
        },
    },
});

//product load more
var work = document.querySelector("#productList");
var items = Array.from(work.querySelectorAll(".item"));
var loadMore = document.getElementById("productLoadMore");
maxItems = 10;
loadItems = 5;
hiddenClass = "hidden-product";
hiddenItems = Array.from(document.querySelectorAll(".hidden-product"));

items.forEach(function (item, index) {
    if (index > maxItems - 1) {
        item.classList.add(hiddenClass);
    }
});

loadMore.addEventListener("click", function () {
    [].forEach.call(document.querySelectorAll("." + hiddenClass), function (
        item,
        index
    ) {
        if (index < loadItems) {
            item.classList.remove(hiddenClass);
        }

        if (document.querySelectorAll("." + hiddenClass).length === 0) {
            loadMore.style.display = "none";
        }
    });
});
