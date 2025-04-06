/*
Template Name: Toner eCommerce + Admin HTML Template
Author: Themesbrand
Version: 1.2.0
Website: https://Themesbrand.com/
Contact: Themesbrand@gmail.com
File: brands list init File
*/

var url = "../assets/json/";
var brandList = '';
var editList = false;

var prevButton = document.getElementById('page-prev');
var nextButton = document.getElementById('page-next');

// configuration variables
var currentPage = 1;
var itemsPerPage = 15;

var getJSON = function (jsonurl, callback) {
    var xhr = new XMLHttpRequest();
    xhr.open("GET", url + jsonurl, true);
    xhr.responseType = "json";
    xhr.onload = function () {
        var status = xhr.status;
        if (status === 200) {
            callback(null, xhr.response);
        } else {
            callback(status, xhr.response);
        }
    };
    xhr.send();
};


// get json
getJSON("brand-list.json", function (err, data) {
    if (err !== null) {
        console.log("Something went wrong: " + err);
    } else {
        brandList = data;
        loadBrandListData(brandList, currentPage);
        paginationEvents();
        sortElementsById();
    }
});

function loadBrandListData(datas, page) {
    var pages = Math.ceil(datas.length / itemsPerPage);
    if (page < 1) page = 1;
    if (page > pages) page = pages;

    document.getElementById("brand-list").innerHTML = "";

    for (var i = (page - 1) * itemsPerPage; i < (page * itemsPerPage) && i < datas.length; i++) {
    // Array.from(datas).forEach(function (listData){

        document.getElementById("brand-list").innerHTML += '<div class="col">\
        <div class="card brand-widget card-animate">\
            <div class="card-body text-center pb-2">\
                <img src="'+datas[i].companyLogo+'" alt="" class="brand-img">\
            </div>\
            <div class="card-footer text-center border-0">\
                <h6 class="fs-17">'+datas[i].brandName+'</h6>\
                <p class="mb-0"><a href="#!" class="link-success stretched-link">'+datas[i].productItems+' Items</a></p>\
            </div>\
        </div>\
    </div>';
    }
    selectedPage();
    // refreshCallbacks();
    currentPage == 1 ? prevButton.parentNode.classList.add('disabled') : prevButton.parentNode.classList.remove('disabled');
    currentPage == pages ? nextButton.parentNode.classList.add('disabled') : nextButton.parentNode.classList.remove('disabled');
    // });
}

// brandLogo image
document.querySelector("#brandLogo-image-input").addEventListener("change", function () {
    var preview = document.querySelector("#brandLogo-img");
    var file = document.querySelector("#brandLogo-image-input").files[0];
    var reader = new FileReader();
    reader.addEventListener("load", function () { 
        preview.src = reader.result;
    }, false);
    if (file) {
        reader.readAsDataURL(file);
    }
});


var brandLogoImg = document.getElementById("brandLogo-img");
var brandNameVal = document.getElementById("brandName-input");

// create-form
var forms = document.querySelectorAll('.create-form')
Array.prototype.slice.call(forms).forEach(function (form) {
    form.addEventListener('submit', function (event) {
        event.preventDefault();

        var errorMsg = document.getElementById("alert-error-msg");
        errorMsg.classList.remove("d-none");

        setTimeout(() => errorMsg.classList.add("d-none"), 2000);

        var imgArray = window.location.href.split("#");
        var logoArray = brandLogoImg.src.split("#");
        var text;
        if (logoArray[0] == imgArray[0]) {
            text = "Please select a brand logo image";
            errorMsg.innerHTML = text;
            return false;
        } else if (brandNameVal.value == "") {
            text = "Please enter a brand name";
            errorMsg.innerHTML = text;
            return false;
        }

        if (imgArray[0] && brandNameVal.value !== "" && brandLogoImg.value !== "" && !editList) {
            var newArrayId = findNextId();
            var newArray = {
                'id': newArrayId,
                "brandName": brandNameVal.value,
                "companyLogo": brandLogoImg.src,
                "productItems": '0'
            };
            brandList.push(newArray);
            sortElementsById();
        }

        pageEvent(brandList);
        loadBrandListData(brandList, currentPage);
        document.getElementById("alert-error-msg").classList.add("d-none");
        document.getElementById("createModal-close").click();
        return true;
    });
});

function selectedPage() {
    var pagenumLink = document.getElementById('page-num').getElementsByClassName('clickPageNumber');
    for (var i = 0; i < pagenumLink.length; i++) {
        if (i == currentPage - 1) {
            pagenumLink[i].parentNode.classList.add("active");
        } else {
            pagenumLink[i].parentNode.classList.remove("active");
        }
    }
};

// paginationEvents
function paginationEvents() {
    var numPages = function numPages() {
        return Math.ceil(brandList.length / itemsPerPage);
    };

    function clickPage() {
        document.addEventListener('click', function (e) {
            if (e.target.nodeName == "A" && e.target.classList.contains("clickPageNumber")) {
                currentPage = e.target.textContent;
                loadBrandListData(brandList, currentPage);
            }
        });
    };

    function pageNumbers() {
        var pageNumber = document.getElementById('page-num');
        pageNumber.innerHTML = "";
        // for each page
        for (var i = 1; i < numPages() + 1; i++) {
            pageNumber.innerHTML += "<div class='page-item'><a class='page-link clickPageNumber' href='javascript:void(0);'>" + i + "</a></div>";
        }
    }

    prevButton.addEventListener('click', function () {
        if (currentPage > 1) {
            currentPage--;
            loadBrandListData(brandList, currentPage);
        }
    });

    nextButton.addEventListener('click', function () {
        if (currentPage < numPages()) {
            currentPage++;
            loadBrandListData(brandList, currentPage);
        }
    });

    pageNumbers();
    clickPage();
    selectedPage();
}

function fetchIdFromObj(member) {
    return parseInt(member.id);
}

function findNextId() {
    if (brandList.length === 0) {
        return 0;
    }
    var lastElementId = fetchIdFromObj(brandList[brandList.length - 1]),
        firstElementId = fetchIdFromObj(brandList[0]);
    return (firstElementId >= lastElementId) ? (firstElementId + 1) : (lastElementId + 1);
}

function sortElementsById() {
    var manybrandList = brandList.sort(function (a, b) {
        var x = fetchIdFromObj(a);
        var y = fetchIdFromObj(b);

        if (x > y) {
            return -1;
        }
        if (x < y) {
            return 1;
        }
        return 0;
    })
    
    loadBrandListData(manybrandList, currentPage);
}

// clearFields
function clearFields() {
    document.getElementById("id-field").value = ""
    brandLogoImg.src = "";
    brandNameVal.value = "";
    document.getElementById("brandLogo-image-input").value = "";
}

document.getElementById('createModal').addEventListener('hidden.bs.modal', event => {
    clearFields();
});

// pageEvent
function pageEvent(data) {
    if (data.length == 0) {
        document.getElementById("pagination-element").style.display = "none";
        document.getElementById("noresult").classList.remove("d-none");
    } else {
        document.getElementById("pagination-element").style.display = "flex";
        document.getElementById("noresult").classList.add("d-none");
    }

    var pageNumber = document.getElementById('page-num');
    pageNumber.innerHTML = "";
    var dataPageNum = Math.ceil(data.length / itemsPerPage)
    // for each page
    for (var i = 1; i < dataPageNum + 1; i++) {
        pageNumber.innerHTML += "<div class='page-item'><a class='page-link clickPageNumber' href='javascript:void(0);'>" + i + "</a></div>";
    }
}

// Search input list
var searchInputList = document.getElementById("searchInputList");
searchInputList.addEventListener("keyup", function () {
    var inputVal = searchInputList.value.toLowerCase();
    function filterItems(arr, query) {
        return arr.filter(function (el) {
            return el.brandName.toLowerCase().indexOf(query.toLowerCase()) !== -1
        })
    }
    var filterData = filterItems(brandList, inputVal);
    pageEvent(filterData);
    loadBrandListData(filterData, currentPage);
});