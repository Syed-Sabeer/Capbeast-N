/*
Template Name: Toner eCommerce + Admin HTML Template
Author: Themesbrand
Version: 1.2.0
Website: https://Themesbrand.com/
Contact: Themesbrand@gmail.com
File: Product-grid init File
*/

var productListData = [{
    'id': 1,
    "productImg": "../assets/images/products/img-10.png",
    "productTitle": "World's most expensive t shirt",
    "category": "Fashion",
    "price": "354.99",
    "discount": "25%",
    "rating": "4.9",
    "color": ["secondary", "light", "dark"],
    "size": ["s", "m", "l"],
    "stock": "12",
    "orders": "48",
    "publish": "12 Oct, 2021",
}, {
    'id': 2,
    "productImg": "../assets/images/products/img-15.png",
    "productTitle": "Like Style Women Black Handbag",
    "category": "Fashion",
    "price": "742.00",
    "discount": "0%",
    "rating": "4.2",
    "color": ["light", "dark"],
    "stock": "06",
    "orders": "30",
    "publish": "06 Jan, 2021",
}, {
    'id': 3,
    "productImg": "../assets/images/products/img-1.png",
    "productTitle": "Black Horn Backpack For Men Bags 30 L Backpack",
    "category": "Grocery",
    "price": "150.99",
    "discount": "25%",
    "rating": "3.8",
    "color": ["primary", "danger", "secondary"],
    "size": ["s", "m", "l"],
    "stock": "10",
    "orders": "48",
    "publish": "26 Mar, 2021",
}, {
    'id': 4,
    "productImg": "../assets/images/products/img-7.png",
    "productTitle": "Innovative education book",
    "category": "Kids",
    "price": "96.26",
    "discount": "0%",
    "rating": "4.7",
    "stock": "15",
    "orders": "40",
    "publish": "19 Apr, 2021",
}, {
    'id': 5,
    "productImg": "../assets/images/products/img-4.png",
    "productTitle": "Sangria Girls Mint Green & Off-White Solid Open Toe Flats",
    "category": "Kids",
    "price": "96.26",
    "discount": "75%",
    "rating": "4.7",
    "color": ["success", "danger", "secondary"],
    "size": ["40", "41", "42"],
    "stock": "08",
    "orders": "55",
    "publish": "30 Mar, 2021",
}, {
    'id': 6,
    "productImg": "../assets/images/products/img-5.png",
    "productTitle": "Lace-Up Casual Shoes For Men",
    "category": "Fashion",
    "price": "229.00",
    "discount": "0%",
    "rating": "4.0",
    "color": ["danger"],
    "size": ["40", "41", "42"],
    "stock": "15",
    "orders": "48",
    "publish": "12 Oct, 2021",
}, {
    'id': 7,
    "productImg": "../assets/images/products/img-6.png",
    "productTitle": "Striped High Neck Casual Men Orange Sweater",
    "category": "Fashion",
    "price": "120.00",
    "discount": "48%",
    "rating": "4.8",
    "size": ["s", "m", "l", "xl"],
    "stock": "12",
    "orders": "45",
    "publish": "15 May, 2021",
}, {
    'id': 8,
    "productImg": "../assets/images/products/img-9.png",
    "productTitle": "Lace-Up Casual Shoes For Men",
    "category": "Kids",
    "price": "229.00",
    "discount": "15%",
    "rating": "2.4",
    "color": ["light", "warning"],
    "size": ["s", "l"],
    "stock": "20",
    "orders": "48",
    "publish": "21 Jun, 2021",
}, {
    'id': 9,
    "productImg": "../assets/images/products/img-10.png",
    "productTitle": "Printed, Typography Men Round Neck Black T-shirt",
    "category": "Fashion",
    "price": "81.99",
    "discount": "0%",
    "rating": "4.9",
    "color": ["dark", "light"],
    "size": ["s", "m", "l", "xl"],
    "stock": "14",
    "orders": "55",
    "publish": "15 Jan, 2021",
}, {
    'id': 10,
    "productImg": "../assets/images/products/img-12.png",
    "productTitle": "Carven Lounge Chair Red",
    "category": "Furniture",
    "price": "209.99",
    "discount": "0%",
    "rating": "4.1",
    "color": ["secondary", "dark", "danger", "light"],
    "stock": "20",
    "orders": "60",
    "publish": "15 Jun, 2021",
}, {
    'id': 11,
    "productImg": "../assets/images/products/img-3.png",
    "productTitle": "Ninja Pro Max Smartwatch",
    "category": "Watches",
    "price": "309.09",
    "discount": "20%",
    "rating": "3.5",
    "color": ["secondary", "info"],
    "stock": "12",
    "orders": "48",
    "publish": "12 Oct, 2021",
}, {
    'id': 12,
    "productImg": "../assets/images/products/img-2.png",
    "productTitle": "Opinion Striped Round Neck Green T-shirt",
    "category": "Fashion",
    "price": "126.99",
    "discount": "0%",
    "rating": "4.1",
    "color": ["success"],
    "size": ["s", "m", "l", "xl"],
    "stock": "06",
    "orders": "30",
    "publish": "06 Jan, 2021",
}];

var prevButton = document.getElementById('page-prev');
var nextButton = document.getElementById('page-next');
var currentPage = 1;
var itemsPerPage = 6;
loadProductList(productListData, currentPage);
paginationEvents();

function loadProductList(datas, page) {
    var pages = Math.ceil(datas.length / itemsPerPage)
    if (page < 1) page = 1
    if (page > pages) page = pages;
    document.getElementById("product-grid").innerHTML = "";
    for (var i = (page - 1) * itemsPerPage; i < (page * itemsPerPage) && i < datas.length; i++) {
        if (datas[i]) {
            // Array.from(datas).forEach(function (listdata) {
            var num = 1;
            if (datas[i].color) {
                var colorElem = '<ul class="clothe-colors list-unstyled hstack gap-1 d-flex mb-0 flex-wrap mb-3">';
                Array.from(datas[i].color).forEach(function (elem) {
                    num++;
                    colorElem += '<li>\
                                        <input type="radio" name="color'+ datas[i].id + '" id="product-color-' + datas[i].id + num + '">\
                                        <label class="avatar-xxs border border-2 border-white btn btn-'+ elem + ' p-0 d-flex align-items-center justify-content-center rounded-circle" for="product-color-' + datas[i].id + num + '"></label>\
                                    </li>';
                })
                colorElem += '</ul>';
            } else {
                var colorElem = '';
            }

            if (datas[i].size) {
                var sizeElem = '<ul class="clothe-size list-unstyled hstack gap-2 d-flex mb-0 flex-wrap mb-3">';
                Array.from(datas[i].size).forEach(function (elem) {
                    num++;
                    sizeElem += '<li>\
                                        <input type="radio" name="sizes'+ datas[i].id + '" id="product-size-' + datas[i].id + num + '">\
                                        <label class="avatar-xxs border border-2 border-white btn btn-soft-primary text-uppercase p-0 fs-12 d-flex align-items-center justify-content-center rounded-circle" for="product-size-'+ datas[i].id + num + '">' + elem + '</label>\
                                    </li>';
                })
                sizeElem += '</ul>';
            } else {
                var sizeElem = '';
            }

            var text = datas[i].discount;
            var myArray = text.split("%");
            var discount = myArray[0];
            var afterDiscount = datas[i].price - (datas[i].price * discount / 100);
            if (discount > 0) {
                var discountElem = '<div class="avatar-xs label">\
                                        <div class="avatar-title bg-danger rounded-circle fs-11">'+ datas[i].discount + '</div>\
                                    </div>';
                var afterDiscountElem = '<h5 class="text-primary fs-17 mb-0">$' + afterDiscount.toFixed(2) + ' <span class="text-muted fs-14"><del>$' + datas[i].price + '</del></span></h5>'
            } else {
                var discountElem = "";
                var afterDiscountElem = '<h5 class="text-primary fs-17 mb-0">$' + datas[i].price + '</h5>'
            }


            document.getElementById("product-grid").innerHTML += '<div class="col-lg-4 col-sm-6">\
            <div class="card ecommerce-product-widgets overflow-hidden">\
                <div class="card-body">\
                    <div class="bg-light rounded py-5 position-relative">\
                        <div class="dropdown action">\
                            <button class="btn btn-soft-secondary btn-sm btn-icon" type="button" data-bs-toggle="dropdown" aria-expanded="false">\
                                <i class="ph-dots-three-outline"></i>\
                            </button>\
                            <ul class="dropdown-menu">\
                                <li><a class="dropdown-item" href="#">Edit</a></li>\
                                <li><a class="dropdown-item" href="#">Remove</a></li>\
                            </ul>\
                        </div>\
                        <img src="'+ datas[i].productImg + '" alt="" style="max-height: 150px;max-width: 100%;" class="mx-auto d-block rounded-2">\
                        '+ discountElem + '\
                    </div>\
                    <div class="mt-3">\
                        <div class="mb-2 d-flex justify-content-between align-items-center">\
                        '+ afterDiscountElem + '\
                            <span>'+ datas[i].rating + ' <i class="ri-star-half-fill text-warning align-middle"></i></span>\
                        </div>\
                        <a href="#!">\
                            <h6 class="fs-16 text-capitalize lh-base text-truncate mb-0">'+ datas[i].productTitle + '</h6>\
                        </a>\
                        <p class="text-muted">'+ datas[i].category + '</p>\
                        <div class="row d-none">\
                            <div class="col-6">'+ colorElem + '</div>\
                            <div class="col-6">'+ sizeElem + '</div>\
                        </div>\
                        <div class="row text-center g-0">\
                            <div class="col-4 border-end border-end-dashed">\
                                <div class="mt-3">\
                                    <h5 class="fs-15 text-truncate mb-1">'+ datas[i].stock + '</h5>\
                                    <p class="text-muted mb-0">Stocks</p>\
                                </div>\
                            </div>\
                            <div class="col-4 border-end border-end-dashed">\
                                <div class="mt-3">\
                                    <h5 class="fs-15 text-truncate mb-1">'+ datas[i].orders + '</h5>\
                                    <p class="text-muted mb-0">Orders</p>\
                                </div>\
                            </div>\
                            <div class="col-4">\
                                <div class="mt-3">\
                                    <h5 class="fs-15 text-truncate mb-1">'+ datas[i].publish + '</h5>\
                                    <p class="text-muted mb-0">Publish</p>\
                                </div>\
                            </div>\
                        </div>\
                    </div>\
                </div>\
            </div>';
        }
    };
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
});


// price range slider
var slider = document.getElementById('product-price-range');
if (slider) {
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