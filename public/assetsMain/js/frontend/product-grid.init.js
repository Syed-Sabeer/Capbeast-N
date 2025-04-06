/*
Template Name: Toner eCommerce + Admin HTML Template
Author: Themesbrand
Version: 1.2.0
Website: https://Themesbrand.com/
Contact: Themesbrand@gmail.com
File: product grid list init Js File
*/


var productListData = [{
    'id': 1,
    "wishList": false,
<<<<<<< HEAD
<<<<<<< HEAD
    "productImg": "../assets/images/products/img-8.png",
=======
    "productImg": "{{ asset('assetsMain/images/products/img-8.png') }}",
>>>>>>> e5cafc9 (many frontend changes)
=======
    "productImg": "../assets/images/products/img-8.png",
>>>>>>> d2d5016 (working on front end for products pages)
    "productTitle": "World's most expensive t shirt",
    "category": "Fashion",
    "price": "354.99",
    "discount": "25%",
    "rating": "4.9",
    "arrival": true,
    "color": ["success", "info", "warning", "danger"],
}, {
    'id': 2,
    "wishList": false,
<<<<<<< HEAD
<<<<<<< HEAD
    "productImg": "../assets/images/products/img-15.png",
=======
    "productImg": "assetsMain/images/products/img-15.png",
>>>>>>> e5cafc9 (many frontend changes)
=======
    "productImg": "../assets/images/products/img-15.png",
>>>>>>> d2d5016 (working on front end for products pages)
    "productTitle": "Like Style Women Black Handbag",
    "category": "Fashion",
    "price": "742.00",
    "discount": "0%",
    "rating": "4.2",
    "arrival": false,
    "color": ["light", "dark"],
}, {
    'id': 3,
    "wishList": true,
<<<<<<< HEAD
<<<<<<< HEAD
    "productImg": "../assets/images/products/img-1.png",
=======
    "productImg": "assetsMain/images/products/img-1.png",
>>>>>>> e5cafc9 (many frontend changes)
=======
    "productImg": "../assets/images/products/img-1.png",
>>>>>>> d2d5016 (working on front end for products pages)
    "productTitle": "Black Horn Backpack For Men Bags 30 L Backpack",
    "category": "Grocery",
    "price": "150.00",
    "discount": "25%",
    "rating": "3.8",
    "arrival": true,
    "color": ["primary", "danger", "secondary"],
}, {
    'id': 4,
    "wishList": false,
<<<<<<< HEAD
<<<<<<< HEAD
    "productImg": "../assets/images/products/img-7.png",
=======
    "productImg": "assetsMain/images/products/img-7.png",
>>>>>>> e5cafc9 (many frontend changes)
=======
    "productImg": "../assets/images/products/img-7.png",
>>>>>>> d2d5016 (working on front end for products pages)
    "productTitle": "Innovative education book",
    "category": "Kids",
    "price": "96.26",
    "discount": "0%",
    "rating": "4.7",
    "arrival": false,
}, {
    'id': 5,
    "wishList": false,
<<<<<<< HEAD
<<<<<<< HEAD
    "productImg": "../assets/images/products/img-4.png",
=======
    "productImg": "assetsMain/images/products/img-4.png",
>>>>>>> e5cafc9 (many frontend changes)
=======
    "productImg": "../assets/images/products/img-4.png",
>>>>>>> d2d5016 (working on front end for products pages)
    "productTitle": "Sangria Girls Mint Green & Off-White Solid Open Toe Flats",
    "category": "Kids",
    "price": "96.26",
    "discount": "75%",
    "rating": "4.7",
    "arrival": true,
    "color": ["success", "danger", "secondary"],
}, {
    'id': 6,
    "wishList": false,
<<<<<<< HEAD
<<<<<<< HEAD
    "productImg": "../assets/images/products/img-5.png",
=======
    "productImg": "assetsMain/images/products/img-5.png",
>>>>>>> e5cafc9 (many frontend changes)
=======
    "productImg": "../assets/images/products/img-5.png",
>>>>>>> d2d5016 (working on front end for products pages)
    "productTitle": "Lace-Up Casual Shoes For Men",
    "category": "Fashion",
    "price": "229.00",
    "discount": "0%",
    "rating": "4.0",
    "arrival": false,
    "color": ["danger"],
}, {
    'id': 7,
    "wishList": false,
<<<<<<< HEAD
<<<<<<< HEAD
    "productImg": "../assets/images/products/img-6.png",
=======
    "productImg": "assetsMain/images/products/img-6.png",
>>>>>>> e5cafc9 (many frontend changes)
=======
    "productImg": "../assets/images/products/img-6.png",
>>>>>>> d2d5016 (working on front end for products pages)
    "productTitle": "Striped High Neck Casual Men Orange Sweater",
    "category": "Fashion",
    "price": "120.00",
    "discount": "48%",
    "rating": "4.8",
    "arrival": false,
    "size": ["s", "m", "l", "xl"],
}, {
    'id': 8,
    "wishList": true,
<<<<<<< HEAD
<<<<<<< HEAD
    "productImg": "../assets/images/products/img-9.png",
=======
    "productImg": "assetsMain/images/products/img-9.png",
>>>>>>> e5cafc9 (many frontend changes)
=======
    "productImg": "../assets/images/products/img-9.png",
>>>>>>> d2d5016 (working on front end for products pages)
    "productTitle": "Lace-Up Casual Shoes For Men",
    "category": "Kids",
    "price": "229.00",
    "discount": "15%",
    "rating": "2.4",
    "arrival": false,
    "color": ["light", "warning"],
}, {
    'id': 9,
    "wishList": false,
<<<<<<< HEAD
<<<<<<< HEAD
    "productImg": "../assets/images/products/img-10.png",
=======
    "productImg": "assetsMain/images/products/img-10.png",
>>>>>>> e5cafc9 (many frontend changes)
=======
    "productImg": "../assets/images/products/img-10.png",
>>>>>>> d2d5016 (working on front end for products pages)
    "productTitle": "Printed, Typography Men Round Neck Black T-shirt",
    "category": "Fashion",
    "price": "81.99",
    "discount": "0%",
    "rating": "4.9",
    "arrival": true,
    "color": ["dark", "light"],
}, {
    'id': 10,
    "wishList": false,
<<<<<<< HEAD
<<<<<<< HEAD
    "productImg": "../assets/images/products/img-12.png",
=======
    "productImg": "assetsMain/images/products/img-12.png",
>>>>>>> e5cafc9 (many frontend changes)
=======
    "productImg": "../assets/images/products/img-12.png",
>>>>>>> d2d5016 (working on front end for products pages)
    "productTitle": "Carven Lounge Chair Red",
    "category": "Furniture",
    "price": "209.99",
    "discount": "0%",
    "rating": "4.1",
    "arrival": false,
    "color": ["secondary", "dark", "danger", "light"],
}, {
    'id': 11,
    "wishList": false,
<<<<<<< HEAD
<<<<<<< HEAD
    "productImg": "../assets/images/products/img-3.png",
=======
    "productImg": "assetsMain/images/products/img-3.png",
>>>>>>> e5cafc9 (many frontend changes)
=======
    "productImg": "../assets/images/products/img-3.png",
>>>>>>> d2d5016 (working on front end for products pages)
    "productTitle": "Ninja Pro Max Smartwatch",
    "category": "Watches",
    "price": "309.09",
    "discount": "20%",
    "rating": "3.5",
    "arrival": false,
    "color": ["secondary", "info"],
}, {
    'id': 12,
    "wishList": false,
<<<<<<< HEAD
<<<<<<< HEAD
    "productImg": "../assets/images/products/img-2.png",
=======
    "productImg": "assetsMain/images/products/img-2.png",
>>>>>>> e5cafc9 (many frontend changes)
=======
    "productImg": "../assets/images/products/img-2.png",
>>>>>>> d2d5016 (working on front end for products pages)
    "productTitle": "Opinion Striped Round Neck Green T-shirt",
    "category": "Fashion",
    "price": "126.99",
    "discount": "0%",
    "rating": "4.1",
    "arrival": true,
    "color": ["success"],
}];

var prevButton = document.getElementById('page-prev');
var nextButton = document.getElementById('page-next');

// configuration variables
var currentPage = 1;
var itemsPerPage

if (document.getElementById("col-3-layout")) {
    itemsPerPage = 12;
} else {
    itemsPerPage = 9;
}

loadProductList(productListData, currentPage);
paginationEvents();

function loadProductList(datas, page) {
    var pages = Math.ceil(datas.length / itemsPerPage)
    if (page < 1) page = 1;
    if (page > pages) page = pages;

    if (document.getElementById("product-grid")) {
        document.getElementById("product-grid").innerHTML = "";
        for (var i = (page - 1) * itemsPerPage; i < (page * itemsPerPage) && i < datas.length; i++) {
            // Array.from(datas).forEach(function (listdata) {
            if (datas[i]) {
                var checkinput = datas[i].wishList ? "active" : "";
                var num = 1;
                if (datas[i].color) {
                    var colorElem = '<ul class="clothe-colors list-unstyled hstack gap-1 mb-3 flex-wrap">';
                    Array.from(datas[i].color).forEach(function (elem) {
                        num++;
                        colorElem += '<li>\
                                    <input type="radio" name="sizes'+ datas[i].id + '" id="product-color-' + datas[i].id + num + '">\
                                    <label class="avatar-xxs btn btn-'+ elem + ' p-0 d-flex align-items-center justify-content-center rounded-circle" for="product-color-' + datas[i].id + num + '"></label>\
                                </li>';
                    })
                    colorElem += '</ul>';
                } else if (datas[i].size) {
                    var colorElem = '<ul class="clothe-size list-unstyled hstack gap-2 mb-3 flex-wrap">';
                    Array.from(datas[i].size).forEach(function (elem) {
                        num++;
                        colorElem += '<li>\
                                    <input type="radio" name="sizes'+ datas[i].id + '" id="product-color-' + datas[i].id + num + '">\
                                    <label class="avatar-xxs btn btn-soft-primary text-uppercase p-0 fs-12 d-flex align-items-center justify-content-center rounded-circle" for="product-color-'+ datas[i].id + num + '">' + elem + '</label>\
                                </li>';
                    })
                    colorElem += '</ul>';
                } else {
                    var colorElem = '<div class="avatar-xxs mb-3">\
                                    <div class="avatar-title bg-light text-muted rounded cursor-pointer">\
                                        <i class="ri-error-warning-line"></i>\
                                    </div>\
                                </div>'
                }

                var text = datas[i].discount;
                var myArray = text.split("%");
                var discount = myArray[0];
                var afterDiscount = datas[i].price - (datas[i].price * discount / 100);
                if (discount > 0) {
                    var discountElem = '<div class="avatar-xs label">\
                                    <div class="avatar-title bg-danger rounded-circle fs-11">'+ datas[i].discount + '</div>\
                                </div>';
                    var afterDiscountElem = '<h5 class="text-secondary mb-0">$' + afterDiscount.toFixed(2) + ' <span class="text-muted fs-12"><del>$' + datas[i].price + '</del></span></h5>'
                } else {
                    var discountElem = "";
                    var afterDiscountElem = '<h5 class="text-secondary mb-0">$' + datas[i].price + '</h5>'
                }

                if (document.getElementById("col-3-layout")) {
                    var layout = '<div class="col-xxl-3 col-lg-4 col-md-6">'
                } else {
                    var layout = '<div class="col-xxl-4 col-lg-4 col-md-6">'
                }

                document.getElementById("product-grid").innerHTML += layout + '\
                        <div class="card ecommerce-product-widgets border-0 rounded-0 shadow-none overflow-hidden">\
                            <div class="bg-light bg-opacity-50 rounded py-4 position-relative">\
                                <img src="'+ datas[i].productImg + '" alt="" style="max-height: 200px;max-width: 100%;" class="mx-auto d-block rounded-2">\
                                <div class="action vstack gap-2">\
                                    <button class="btn btn-danger avatar-xs p-0 btn-soft-warning custom-toggle product-action '+ checkinput + '" data-bs-toggle="button">\
                                        <span class="icon-on"><i class="ri-heart-line"></i></span>\
                                        <span class="icon-off"><i class="ri-heart-fill"></i></span>\
                                    </button>\
                                </div>\
                                '+ discountElem + '\
                            </div>\
                            <div class="pt-4">\
                                <div>\
                                    '+ colorElem + '\
                                    <a href="#!">\
                                        <h6 class="text-capitalize fs-15 lh-base text-truncate mb-0">'+ datas[i].productTitle + '</h6>\
                                    </a>\
                                    <div class="mt-2">\
                                        <span class="float-end">'+ datas[i].rating + ' <i class="ri-star-half-fill text-warning align-bottom"></i></span>\
                                        '+ afterDiscountElem + '\
                                    </div>\
                                    <div class="tn mt-3">\
                                        <a href="#!" class="btn btn-primary btn-hover w-100 add-btn"><i class="mdi mdi-cart me-1"></i> Add To Cart</a>\
                                    </div>\
                                </div>\
                            </div>\
                        </div>\
                    </div>'
                // });
            };
        }
    }

    if(document.getElementById("product-grid-right")){
        document.getElementById("product-grid-right").innerHTML = "";
        for (var i = (page - 1) * itemsPerPage; i < (page * itemsPerPage) && i < datas.length; i++) {
            if (datas[i]) {
                var checkinput = datas[i].wishList ? "active" : "";

                var productLabel = datas[i].arrival ? '<p class="fs-11 fw-medium badge bg-primary py-2 px-3 product-lable mb-0">Best Arrival</p>' : "";

                var num = 1;
                if (datas[i].color) {
                    var colorElem = '<ul class="clothe-colors list-unstyled hstack gap-1 mb-3 flex-wrap d-none">';
                    Array.from(datas[i].color).forEach(function (elem) {
                        num++;
                        colorElem += '<li>\
                                    <input type="radio" name="sizes'+ datas[i].id + '" id="product-color-' + datas[i].id + num + '">\
                                    <label class="avatar-xxs btn btn-'+ elem + ' p-0 d-flex align-items-center justify-content-center rounded-circle" for="product-color-' + datas[i].id + num + '"></label>\
                                </li>';
                    })
                    colorElem += '</ul>';
                } else if (datas[i].size) {
                    var colorElem = '<ul class="clothe-size list-unstyled hstack gap-2 mb-3 flex-wrap d-none">';
                    Array.from(datas[i].size).forEach(function (elem) {
                        num++;
                        colorElem += '<li>\
                                    <input type="radio" name="sizes'+ datas[i].id + '" id="product-color-' + datas[i].id + num + '">\
                                    <label class="avatar-xxs btn btn-soft-primary text-uppercase p-0 fs-12 d-flex align-items-center justify-content-center rounded-circle" for="product-color-'+ datas[i].id + num + '">' + elem + '</label>\
                                </li>';
                    })
                    colorElem += '</ul>';
                } else {
                    var colorElem = '<div class="avatar-xxs mb-3 d-none">\
                                    <div class="avatar-title bg-light text-muted rounded cursor-pointer">\
                                        <i class="ri-error-warning-line"></i>\
                                    </div>\
                                </div>'
                }

                var text = datas[i].discount;
                var myArray = text.split("%");
                var discount = myArray[0];
                var afterDiscount = datas[i].price - (datas[i].price * discount / 100);
                if (discount > 0) {
                    var afterDiscountElem = '<h5 class="mb-0">$' + afterDiscount.toFixed(2) + ' <span class="text-muted fs-12"><del>$' + datas[i].price + '</del></span></h5>'
                } else {
                    var afterDiscountElem = '<h5 class="mb-0">$' + datas[i].price + '</h5>'
                }

                if (document.getElementById("col-3-layout")) {
                    var layout = '<div class="col-xxl-3 col-lg-4 col-md-6">'
                } else {
                    var layout = '<div class="col-lg-4 col-md-6">'
                }

                document.getElementById("product-grid-right").innerHTML += layout + '\
                    <div class="card overflow-hidden element-item">\
                        <div class="bg-light py-4">\
                            <div class="gallery-product">\
                                <img src="'+ datas[i].productImg + '" alt="" style="max-height: 215px;max-width: 100%;" class="mx-auto d-block">\
                            </div>\
                            '+productLabel+'\
                            <div class="gallery-product-actions">\
                                <div class="mb-2">\
                                    <button type="button" class="btn btn-danger btn-sm custom-toggle '+ checkinput + '" data-bs-toggle="button">\
                                        <span class="icon-on"><i class="mdi mdi-heart-outline align-bottom fs-15"></i></span>\
                                        <span class="icon-off"><i class="mdi mdi-heart align-bottom fs-15"></i></span>\
                                    </button>\
                                </div>\
                                <div>\
                                    <button type="button" class="btn btn-success btn-sm custom-toggle" data-bs-toggle="button">\
                                        <span class="icon-on"><i class="mdi mdi-eye-outline align-bottom fs-15"></i></span>\
                                        <span class="icon-off"><i class="mdi mdi-eye align-bottom fs-15"></i></span>\
                                    </button>\
                                </div>\
                            </div>\
                            <div class="product-btn px-3">\
                                <a href="#!" class="btn btn-primary btn-sm w-75 add-btn"><i class="mdi mdi-cart me-1"></i> Add to Cart</a>\
                            </div>\
                        </div>\
                        <div class="card-body">\
                            <div>\
                                '+ colorElem + '\
                                <a href="#!">\
                                    <h6 class="fs-16 lh-base text-truncate mb-0">'+ datas[i].productTitle + '</h6>\
                                </a>\
                                <div class="mt-3">\
                                    <span class="float-end">'+ datas[i].rating + ' <i class="ri-star-half-fill text-warning align-bottom"></i></span>\
                                    '+ afterDiscountElem + '\
                                </div>\
                            </div>\
                        </div>\
                    </div>\
                </div>'
            }
        }
    }
    selectedPage();
    currentPage == 1 ? prevButton.parentNode.classList.add('disabled') : prevButton.parentNode.classList.remove('disabled');
    currentPage == pages ? nextButton.parentNode.classList.add('disabled') : nextButton.parentNode.classList.remove('disabled');
}

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
        return Math.ceil(productListData.length / itemsPerPage);
    };

    function clickPage() {
        document.addEventListener('click', function (e) {
            if (e.target.nodeName == "A" && e.target.classList.contains("clickPageNumber")) {
                currentPage = e.target.textContent;
                loadProductList(productListData, currentPage);
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
            loadProductList(productListData, currentPage);
        }
    });

    nextButton.addEventListener('click', function () {
        if (currentPage < numPages()) {
            currentPage++;
            loadProductList(productListData, currentPage);
        }
    });

    pageNumbers();
    clickPage();
    selectedPage();
}

function searchResult(data) {
    if (data.length == 0) {
        document.getElementById("pagination-element").style.display = "none";
        document.getElementById("search-result-elem").classList.remove("d-none");
    } else {
        document.getElementById("pagination-element").style.display = "flex";
        document.getElementById("search-result-elem").classList.add("d-none");
    }

    var pageNumber = document.getElementById('page-num');
    pageNumber.innerHTML = "";
    var dataPageNum = Math.ceil(data.length / itemsPerPage)
    // for each page
    for (var i = 1; i < dataPageNum + 1; i++) {
        pageNumber.innerHTML += "<div class='page-item'><a class='page-link clickPageNumber' href='javascript:void(0);'>" + i + "</a></div>";
    }
}

//  category list filter
Array.from(document.querySelectorAll('.filter-list a')).forEach(function (filteritem) {
    filteritem.addEventListener("click", function () {
        var filterListItem = document.querySelector(".filter-list a.active");
        if (filterListItem) filterListItem.classList.remove("active");
        filteritem.classList.add('active');

        var filterItemValue = filteritem.querySelector(".listname").innerHTML
        var filterData = productListData.filter(filterlist => filterlist.category === filterItemValue);

        searchResult(filterData);
        loadProductList(filterData, currentPage);
    });
})

// Search product list
var searchProductList = document.getElementById("searchProductList");
searchProductList.addEventListener("keyup", function () {
    var inputVal = searchProductList.value.toLowerCase();
    function filterItems(arr, query) {
        return arr.filter(function (el) {
            return el.productTitle.toLowerCase().indexOf(query.toLowerCase()) !== -1
        })
    }
    var filterData = filterItems(productListData, inputVal);
    searchResult(filterData);
    loadProductList(filterData, currentPage);
});


// price range slider
var slider = document.getElementById('product-price-range');
if(slider){
    noUiSlider.create(slider, {
        start: [0, 2000], // Handle start position
        step: 10, // Slider moves in increments of '10'
        margin: 20, // Handles must be more than '20' apart
        connect: true, // Display a colored bar between the handles
        behaviour: 'tap-drag', // Move handle on tap, bar is draggable
        range: { // Slider can select '0' to '100'
            'min': 0,
            'max': 2000
        },
        format: wNumb({ decimals: 0, prefix: '$ ' })
    });

    var minCostInput = document.getElementById('minCost'),
        maxCostInput = document.getElementById('maxCost');

    var filterDataAll = '';

    // When the slider value changes, update the input and span
    slider.noUiSlider.on('update', function (values, handle) {
        var productListupdatedAll = productListData;

        if (handle) {
            maxCostInput.value = values[handle];

        } else {
            minCostInput.value = values[handle];
        }

        var maxvalue = maxCostInput.value.substr(2);
        var minvalue = minCostInput.value.substr(2);
        filterDataAll = productListupdatedAll.filter(
            product => parseFloat(product.price) >= minvalue && parseFloat(product.price) <= maxvalue
        );

        searchResult(filterDataAll);
        loadProductList(filterDataAll, currentPage);
    });

    minCostInput.addEventListener('change', function () {
        slider.noUiSlider.set([null, this.value]);
    });

    maxCostInput.addEventListener('change', function () {
        slider.noUiSlider.set([null, this.value]);
    });
}


// discount-filter
var arraylist = [];
document.querySelectorAll("#discount-filter .form-check").forEach(function (item) {
    var inputVal = item.querySelector(".form-check-input").value;
    item.querySelector(".form-check-input").addEventListener("change", function () {
        if (item.querySelector(".form-check-input").checked) {
            arraylist.push(inputVal);
        } else {
            arraylist.splice(arraylist.indexOf(inputVal), 1);
        }

        var filterproductdata = productListData;
        if (item.querySelector(".form-check-input").checked && inputVal == 0) {
            filterDataAll = filterproductdata.filter(function (product) {
                if (product.discount) {
                    var listArray = product.discount.split("%");

                    return parseFloat(listArray[0]) < 10;
                }
            });
        } else if (item.querySelector(".form-check-input").checked && arraylist.length > 0) {
            var compareval = Math.min.apply(Math, arraylist);
            filterDataAll = filterproductdata.filter(function (product) {
                if (product.discount) {
                    var listArray = product.discount.split("%");
                    return parseFloat(listArray[0]) >= compareval;
                }
            });
        } else {
            filterDataAll = productListData;
        }

        searchResult(filterDataAll);
        loadProductList(filterDataAll, currentPage);
    });
});

// rating-filter
document.querySelectorAll("#rating-filter .form-check").forEach(function (item) {
    var inputVal = item.querySelector(".form-check-input").value;
    item.querySelector(".form-check-input").addEventListener("change", function () {
        if (item.querySelector(".form-check-input").checked) {
            arraylist.push(inputVal);
        } else {
            arraylist.splice(arraylist.indexOf(inputVal), 1);
        }

        var filterproductdata = productListData;
        if (item.querySelector(".form-check-input").checked && inputVal == 1) {
            filterDataAll = filterproductdata.filter(function (product) {
                if (product.rating) {
                    var listArray = product.rating;
                    return parseFloat(listArray) == 1;
                }
            });
        } else if (item.querySelector(".form-check-input").checked && arraylist.length > 0) {
            var compareval = Math.min.apply(Math, arraylist);
            filterDataAll = filterproductdata.filter(function (product) {
                if (product.rating) {
                    var listArray = product.rating;
                    return parseFloat(listArray) >= compareval;
                }
            });
        } else {
            filterDataAll = productListData;
        }

        searchResult(filterDataAll);
        loadProductList(filterDataAll, currentPage);
    });
});

// color-filter
document.querySelectorAll("#color-filter li").forEach(function (item) {
    var inputVal = item.querySelector("input[type='radio']").value;
    item.querySelector("input[type='radio']").addEventListener("change", function () {

        var filterData = productListData.filter(function (filterlist) {
            if (filterlist.color) {
                return filterlist.color.some(function (g) {
                    return g == inputVal;
                });
            }
        });

        searchResult(filterData);
        loadProductList(filterData, currentPage);

    });
});

// size-filter
document.querySelectorAll("#size-filter li").forEach(function (item) {
    var inputVal = item.querySelector("input[type='radio']").value;
    item.querySelector("input[type='radio']").addEventListener("change", function () {

        var filterData = productListData.filter(function (filterlist) {
            if (filterlist.size) {
                return filterlist.size.some(function (g) {
                    return g == inputVal;
                });
            }
        });

        searchResult(filterData);
        loadProductList(filterData, currentPage);
    });
});

document.getElementById("sort-elem").addEventListener("change", function (e) {
    var inputVal = e.target.value
    if (inputVal == "low_to_high") {
        sortElementsByAsc();
    } else if (inputVal == "high_to_low") {
        sortElementsByDesc();
    } else if (inputVal == "") {
        sortElementsById()
    }
});

// sort element ascending
function sortElementsByAsc() {
    var list = productListData.sort(function (a, b) {
        var text = a.discount;
        var myArray = text.split("%");
        var discount = myArray[0];
        var x = a.price - (a.price * discount / 100);

        var text1 = b.discount;
        var myArray1 = text1.split("%");
        var discount = myArray1[0];
        var y = b.price - (b.price * discount / 100);

        if (x < y) {
            return -1;
        }
        if (x > y) {
            return 1;
        }
        return 0;
    })
    loadProductList(list, currentPage);
}

// sort element descending
function sortElementsByDesc() {
    var list = productListData.sort(function (a, b) {
        var text = a.discount;
        var myArray = text.split("%");
        var discount = myArray[0];
        var x = a.price - (a.price * discount / 100);

        var text1 = b.discount;
        var myArray1 = text1.split("%");
        var discount = myArray1[0];
        var y = b.price - (b.price * discount / 100);

        if (x > y) {
            return -1;
        }
        if (x < y) {
            return 1;
        }
        return 0;
    })
    loadProductList(list, currentPage);
}

// sort element id
function sortElementsById() {
    var list = productListData.sort(function (a, b) {
        var x = parseInt(a.id);
        var y = parseInt(b.id);

        if (x < y) {
            return -1;
        }
        if (x > y) {
            return 1;
        }
        return 0;
    })
    loadProductList(list, currentPage);
}

// no sidebar page

var hidingTooltipSlider = document.getElementById('slider-hide');
if (hidingTooltipSlider){
    noUiSlider.create(hidingTooltipSlider, {
        range: {
            min: 0,
            max: 2000
        },
        start: [20, 800],
        tooltips: true,
        connect: true,
        pips: {
            mode: 'count',
            values: 5,
            density: 4
        },
        format: wNumb({ decimals: 2, prefix: '$ ' })
    });

    var minCostInput = document.getElementById('minCost'),
        maxCostInput = document.getElementById('maxCost');

    var filterDataAll = '';

        // When the slider value changes, update the input and span
        hidingTooltipSlider.noUiSlider.on('update', function (values, handle) {
        var productListupdatedAll = productListData;

        if (handle) {
            maxCostInput.value = values[handle];

        } else {
            minCostInput.value = values[handle];
        }

        var maxvalue = maxCostInput.value.substr(2);
        var minvalue = minCostInput.value.substr(2);
        filterDataAll = productListupdatedAll.filter(
            product => parseFloat(product.price) >= minvalue && parseFloat(product.price) <= maxvalue
        );

        searchResult(filterDataAll);
        loadProductList(filterDataAll, currentPage);
    });
}

// choices category input
if(document.getElementById('select-category')){
    var productCategoryInput = new Choices(document.getElementById('select-category'), {
        searchEnabled: false,
    });

    productCategoryInput.passedElement.element.addEventListener('change', function (event) {
        var productCategoryValue = event.detail.value
        if (event.detail.value) {
            var filterData = productListData.filter(productlist => productlist.category === productCategoryValue);
        }else {
            var filterData = productListData;
        }
        searchResult(filterData);
        loadProductList(filterData, currentPage);
    }, false);
}

// select-rating
if(document.getElementById('select-rating')){
    var productRatingInput = new Choices(document.getElementById('select-rating'), {
        searchEnabled: false,
        allowHTML: true,
        delimiter: ',',
        editItems: true,
        maxItemCount: 5,
        removeItemButton: true,
    });

    productRatingInput.passedElement.element.addEventListener('change', function (event) {
        var productRatingInputValue = productRatingInput.getValue(true);
        if(event.detail.value == 1){
            filterDataAll = productListData.filter(function (product) {
                if (product.rating) {
                    var listArray = product.rating;
                    return parseFloat(listArray) == 1;
                }
            });
        } else if (productRatingInputValue.length > 0) {
            var compareval = Math.min.apply(Math, productRatingInputValue);
            filterDataAll = productListData.filter(function (product) {
                if (product.rating) {
                    var listArray = product.rating;
                    return parseFloat(listArray) >= compareval;
                }
            });
        } else {
            filterDataAll = productListData;
        }
        
        searchResult(filterDataAll);
        loadProductList(filterDataAll, currentPage);
    }, false);
}

// select-discount
if(document.getElementById('select-discount')){
    var productDiscountInput = new Choices(document.getElementById('select-discount'), {
        searchEnabled: false,
        allowHTML: true,
        delimiter: ',',
        editItems: true,
        maxItemCount: 5,
        removeItemButton: true,
    });

    productDiscountInput.passedElement.element.addEventListener('change', function (event) {
        var productDiscountInputValue = productDiscountInput.getValue(true);
        var filterproductdata = productListData;
        if(event.detail.value == 0){
            filterDataAll = productListData.filter(function (product) {
                if (product.discount) {
                    var listArray = product.discount.split("%");
                    return parseFloat(listArray[0]) < 10;
                }
            });
        } else if (productDiscountInputValue.length > 0) {
            var compareval = Math.min.apply(Math, productDiscountInputValue);
            filterDataAll = productListData.filter(function (product) {
                if (product.discount) {
                    var listArray = product.discount.split("%");
                    return parseFloat(listArray[0]) >= compareval;
                }
            });
        } else {
            filterDataAll = productListData;
        }
        searchResult(filterDataAll);
        loadProductList(filterDataAll, currentPage);
    }, false);
}