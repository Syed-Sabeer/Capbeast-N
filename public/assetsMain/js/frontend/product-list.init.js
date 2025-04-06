/*
Template Name: Toner eCommerce + Admin HTML Template
Author: Themesbrand
Version: 1.2.0
Website: https://Themesbrand.com/
Contact: Themesbrand@gmail.com
File: product list init Js File
*/

var productListData = [{
    'id': 1,
    "productImg": "../assets/images/products/img-10.png",
    "productTitle": "World's most expensive t shirt",
    "description": "T-Shirt house best black boys T-Shirt fully cotton material & all size available hirt fully cotton material & all size available.",
    "category": "Fashion",
    "price": "354.99",
    "discount": "25%",
    "rating": "4.9",
    "stock": "Out of stock",
    "color": ["secondary", "light", "dark"],
    "size": ["s", "m", "l"],
},{
    'id': 2,
    "productImg": "../assets/images/products/img-15.png",
    "productTitle": "Like Style Women Black Handbag",
    "description": "T-Shirt house best black boys T-Shirt fully cotton material & all size available hirt fully cotton material & all size available.",
    "category": "Fashion",
    "price": "742.00",
    "discount": "0%",
    "rating": "4.2",
    "stock": "In stock",
    "color": ["light", "dark"],
},{
    'id': 3,
    "productImg": "../assets/images/products/img-1.png",
    "productTitle": "Black Horn Backpack For Men Bags 30 L Backpack",
    "description": "T-Shirt house best black boys T-Shirt fully cotton material & all size available hirt fully cotton material & all size available.",
    "category": "Grocery",
    "price": "150.99",
    "discount": "25%",
    "rating": "3.8",
    "stock": "In stock",
    "color": ["primary", "danger", "secondary"],
    "size": ["s", "m", "l"],
},{
    'id': 4,
    "productImg": "../assets/images/products/img-7.png",
    "productTitle": "Innovative education book",
    "description": "T-Shirt house best black boys T-Shirt fully cotton material & all size available hirt fully cotton material & all size available.",
    "category": "Kids",
    "price": "96.26",
    "discount": "0%",
    "rating": "4.7",
    "stock": "In stock",
},{
    'id': 5,
    "productImg": "../assets/images/products/img-4.png",
    "productTitle": "Sangria Girls Mint Green & Off-White Solid Open Toe Flats",
    "description": "T-Shirt house best black boys T-Shirt fully cotton material & all size available hirt fully cotton material & all size available.",
    "category": "Kids",
    "price": "96.26",
    "discount": "75%",
    "rating": "4.7",
    "stock": "In stock",
    "color": ["success", "danger", "secondary"],
    "size": ["40", "41", "42"],
},{
    'id': 6,
    "productImg": "../assets/images/products/img-5.png",
    "productTitle": "Lace-Up Casual Shoes For Men",
    "description": "T-Shirt house best black boys T-Shirt fully cotton material & all size available hirt fully cotton material & all size available.",
    "category": "Fashion",
    "price": "229.00",
    "discount": "0%",
    "rating": "4.0",
    "stock": "In stock",
    "color": ["danger"],
    "size": ["40", "41", "42"],
},{
    'id': 7,
    "productImg": "../assets/images/products/img-6.png",
    "productTitle": "Striped High Neck Casual Men Orange Sweater",
    "description": "T-Shirt house best black boys T-Shirt fully cotton material & all size available hirt fully cotton material & all size available.",
    "category": "Fashion",
    "price": "120.00",
    "discount": "48%",
    "rating": "4.8",
    "stock": "In stock",
    "size": ["s", "m", "l", "xl"],
},{
    'id': 8,
    "productImg": "../assets/images/products/img-9.png",
    "productTitle": "Lace-Up Casual Shoes For Men",
    "description": "T-Shirt house best black boys T-Shirt fully cotton material & all size available hirt fully cotton material & all size available.",
    "category": "Kids",
    "price": "229.00",
    "discount": "15%",
    "rating": "2.4",
    "stock": "In stock",
    "color": ["light", "warning"],
    "size": ["s", "l"],
},{
    'id': 9,
    "productImg": "../assets/images/products/img-10.png",
    "productTitle": "Printed, Typography Men Round Neck Black T-shirt",
    "description": "T-Shirt house best black boys T-Shirt fully cotton material & all size available hirt fully cotton material & all size available.",
    "category": "Fashion",
    "price": "81.99",
    "discount": "0%",
    "rating": "4.9",
    "stock": "In stock",
    "color": ["dark", "light"],
    "size": ["s", "m", "l", "xl"],
},{
    'id': 10,
    "productImg": "../assets/images/products/img-12.png",
    "productTitle": "Carven Lounge Chair Red",
    "description": "T-Shirt house best black boys T-Shirt fully cotton material & all size available hirt fully cotton material & all size available.",
    "category": "Furniture",
    "price": "209.99",
    "discount": "0%",
    "rating": "4.1",
    "stock": "In stock",
    "color": ["secondary", "dark", "danger", "light"],
},{
    'id': 11,
    "productImg": "../assets/images/products/img-3.png",
    "productTitle": "Ninja Pro Max Smartwatch",
    "description": "T-Shirt house best black boys T-Shirt fully cotton material & all size available hirt fully cotton material & all size available.",
    "category": "Watches",
    "price": "309.09",
    "discount": "20%",
    "rating": "3.5",
    "stock": "In stock",
    "color": ["secondary", "info"],
},{
    'id': 12,
    "productImg": "../assets/images/products/img-2.png",
    "productTitle": "Opinion Striped Round Neck Green T-shirt",
    "description": "T-Shirt house best black boys T-Shirt fully cotton material & all size available hirt fully cotton material & all size available.",
    "category": "Fashion",
    "price": "126.99",
    "discount": "0%",
    "rating": "4.1",
    "stock": "In stock",
    "color": ["success"],
    "size": ["s", "m", "l", "xl"],
}];


var prevButton = document.getElementById('page-prev');
var nextButton = document.getElementById('page-next');

var currentPage = 1;
var itemsPerPage = 5;

loadProductList(productListData, currentPage);
paginationEvents();

function loadProductList(datas, page) {
    var pages = Math.ceil(datas.length / itemsPerPage)
    if (page < 1) page = 1
    if (page > pages) page = pages
    if (document.getElementById("product-list")) {
        document.getElementById("product-list").innerHTML = "";
        for (var i = (page - 1) * itemsPerPage; i < (page * itemsPerPage) && i < datas.length; i++) {
        // Array.from(datas).forEach(function (listdata) {
            if(datas[i]){
                var checkinput = datas[i].wishList ? "active" : "";
                
                var num = 1;
                if (datas[i].color) {
                    var colorElem = '<ul class="clothe-colors list-unstyled hstack gap-1 mb-0 flex-wrap">';
                    Array.from(datas[i].color).forEach(function (elem) {
                        num++;
                        colorElem += '<li>\
                                    <input type="radio" name="color'+ datas[i].id + '" id="product-color-' + datas[i].id + num + '">\
                                    <label class="avatar-xxs btn btn-'+ elem + ' p-0 d-flex align-items-center justify-content-center rounded-circle" for="product-color-' + datas[i].id + num + '"></label>\
                                </li>';
                    })
                    colorElem += '</ul>';
                } else {
                    var colorElem = '';
                }

                if (datas[i].size) {
                    var sizeElem = '<ul class="clothe-size list-unstyled hstack gap-2 mb-0 flex-wrap">';
                    Array.from(datas[i].size).forEach(function (elem) {
                        num++;
                        sizeElem += '<li>\
                                    <input type="radio" name="sizes'+ datas[i].id + '" id="product-size-' + datas[i].id + num + '">\
                                    <label class="avatar-xxs btn btn-soft-primary text-uppercase p-0 fs-12 d-flex align-items-center justify-content-center rounded-circle" for="product-size-'+ datas[i].id + num + '">' + elem + '</label>\
                                </li>';
                    })
                    sizeElem += '</ul>';
                }else{
                    var sizeElem = '';
                }

                var text = datas[i].discount;
                var myArray = text.split("%");
                var discount = myArray[0];
                var afterDiscount = datas[i].price - (datas[i].price * discount / 100);
                if (discount > 0) {
                    var discountElem = '<div class="ribbon ribbon-danger ribbon-shape">'+ datas[i].discount + ' OFF</div>';
                    var afterDiscountElem = '<h5 class="text-secondary mb-0">$' + afterDiscount.toFixed(2) + ' <span class="text-muted fs-13"><del>$' + datas[i].price + '</del></span></h5>'
                } else {
                    var discountElem = '';
                    var afterDiscountElem = '<h5 class="text-secondary mb-0">$' + datas[i].price + '</h5>'
                }

                if (document.getElementById("layout-noSidebar")) {
                    var layout = '<div class="col-md-3">'
                } else {
                    var layout = '<div class="col-md-4">'
                }

                document.getElementById("product-list").innerHTML += '<div class="card ribbon-box">\
                    '+discountElem+'\
                    <div class="card-body">\
                        <div class="row">\
                            '+layout + '\
                                <div class="bg-light p-2 rounded-2 h-100">\
                                    <img src="'+datas[i].productImg+'" alt="" class="img-fluid">\
                                </div>\
                            </div>\
                            <div class="col-md">\
                                <div>\
                                    <div class="mb-2">\
                                        <span class="me-2">'+datas[i].rating+'</span>\
                                        <span> <i class="ri-star-fill text-warning align-bottom"></i></span>\
                                    </div>\
                                    <a href="#!"><h4 class="fs-16">'+datas[i].productTitle+'</h4></a>\
                                    <p class="text-muted mb-3">'+datas[i].description+'</p>\
                                    <div class="d-flex gap-1">\
                                        '+afterDiscountElem+'\
                                        '+isStatus(datas[i].stock)+'\
                                    </div>\
                                </div>\
                                <div class="mt-3">\
                                    <div class="d-flex gap-4">\
                                        '+ colorElem + '\
                                        '+ sizeElem + '\
                                    </div>\
                                </div>\
                                <div class="mt-3 hstack gap-2 justify-content-end">\
                                    <a href="shop-cart.html" class="btn btn-primary"> <i class="ri-shopping-cart-2-fill align-bottom me-1"></i> Add To Cart</a>\
                                    <a href="#!" class="btn btn-soft-secondary"> <i class="ri-eye-fill align-bottom"></i></a>\
                                </div>\
                            </div>\
                        </div>\
                    </div>\
                </div>'
            }
        // });
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

function isStatus(val) {
    switch (val) {
        case "In stock":
            return ('<span class="badge bg-success-subtle text-success  align-middle ms-1">'+ val +'</span>');
        case "Out of stock":
            return ('<span class="badge bg-danger-subtle text-danger  align-middle ms-1">'+ val +'</span>');
    }
}


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
})


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