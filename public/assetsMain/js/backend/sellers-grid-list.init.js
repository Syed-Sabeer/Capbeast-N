/*
Template Name: Toner eCommerce + Admin HTML Template
Author: Themesbrand
Version: 1.2.0
Website: https://Themesbrand.com/
Contact: Themesbrand@gmail.com
File: sellers grid list init File
*/

var url = "../assets/json/";
var sellerList = '';
var editList = false;

var prevButton = document.getElementById('page-prev');
var nextButton = document.getElementById('page-next');


// configuration variables
var currentPage = 1;
var itemsPerPage = 8;

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
getJSON("sellers-grid-list.json", function (err, data) {
    if (err !== null) {
        console.log("Something went wrong: " + err);
    } else {
        sellerList = data;
        loadSellersListData(sellerList, currentPage);
        paginationEvents();
        sortElementsById();;
    }
});

function loadSellersListData(datas, page) {
    var pages = Math.ceil(datas.length / itemsPerPage);
    if (page < 1) page = 1;
    if (page > pages) page = pages;

    document.getElementById("seller-list").innerHTML = "";

    for (var i = (page - 1) * itemsPerPage; i < (page * itemsPerPage) && i < datas.length; i++) {
    // Array.from(datas).forEach(function (listData){
        var checkVerified = datas[i].verified ? '<i class="ph-circle-wavy-check-fill text-primary align-middle fs-15 ms-1"></i></h5>' : "";

        document.getElementById("seller-list").innerHTML += '<div class="col-xxl-3 col-lg-6">\
        <div class="card">\
            <div class="card-body p-4">\
                <div class="avatar-md mx-auto">\
                    <div class="avatar-title bg-light rounded">\
                        <img src="'+datas[i].companyLogo+'" alt="" class="avatar-xs">\
                    </div>\
                </div>\
                <div class="text-center mt-3">\
                    <a href="seller-overview.html"><h5 class="mb-1">'+datas[i].sellerName+checkVerified+'</h5></a>\
                    <p class="text-muted fs-16 mb-4">'+datas[i].webUrl+'</p>\
                </div>\
                <div class="row">\
                    <div class="col-6">\
                        <div class="text-center">\
                            <p class="text-muted mb-2 fs-15">Item Stock</p>\
                            <h5 class="mb-0">'+datas[i].stock+'</h5>\
                        </div>\
                    </div>\
                    <div class="col-6 border-start border-start-dashed">\
                        <div class="text-center">\
                            <p class="text-muted mb-2 fs-15">Revenue</p>\
                            <h5 class="mb-0">'+datas[i].revenue+'</h5>\
                        </div>\
                    </div>\
                </div>\
                <div class="mt-4 hstack gap-2">\
                    <button type="button" class="btn btn-soft-secondary w-100">View Details</button>\
                    <div class="dropdown flex-shrink-0">\
                        <button class="btn btn-soft-info btn-icon" type="button" data-bs-toggle="dropdown" aria-expanded="false">\
                            <i class="ph-dots-three-outline-vertical-fill"></i>\
                        </button>\
                        <ul class="dropdown-menu">\
                            <li><a class="dropdown-item edit-list" href="#createModal" data-bs-toggle="modal" data-edit-id="'+datas[i].id+'">Edit</a></li>\
                            <li><a class="dropdown-item remove-list" href="#deleteRecordModal"  data-remove-id="'+datas[i].id+'" data-bs-toggle="modal">Delete</a></li>\
                        </ul>\
                    </div>\
                </div>\
            </div>\
        </div>\
    </div>';
    }
    selectedPage();
    refreshCallbacks();
    currentPage == 1 ? prevButton.parentNode.classList.add('disabled') : prevButton.parentNode.classList.remove('disabled');
    currentPage == pages ? nextButton.parentNode.classList.add('disabled') : nextButton.parentNode.classList.remove('disabled');
    // });
}

// companyLogo image
document.querySelector("#companyLogo-image-input").addEventListener("change", function () {
    var preview = document.querySelector("#companyLogo-img");
    var file = document.querySelector("#companyLogo-image-input").files[0];
    var reader = new FileReader();
    reader.addEventListener("load", function () { 
        preview.src = reader.result;
    }, false);
    if (file) {
        reader.readAsDataURL(file);
    }
});

var companyLogoImg = document.getElementById("companyLogo-img");
var sellerNameVal = document.getElementById("sellerName-input");
var webUrlVal = document.getElementById("webUrl-input");
var stockVal = document.getElementById("itemStock-input");
var revenueVal = document.getElementById("revenue-input");


// create-form
var forms = document.querySelectorAll('.create-form')
Array.prototype.slice.call(forms).forEach(function (form) {
    form.addEventListener('submit', function (event) {
        event.preventDefault();

        var errorMsg = document.getElementById("alert-error-msg");
        errorMsg.classList.remove("d-none");

        setTimeout(() => errorMsg.classList.add("d-none"), 2000);

        var imgArray = window.location.href.split("#");
        var logoArray = companyLogoImg.src.split("#");
        var text;
        if (logoArray[0] == imgArray[0]) {
            text = "Please select a company logo image";
            errorMsg.innerHTML = text;
            return false;
        } else if (sellerNameVal.value == "") {
            text = "Please enter a seller name";
            errorMsg.innerHTML = text;
            return false;
        } else if (webUrlVal.value == "") {
            text = "Please enter a web url";
            errorMsg.innerHTML = text;
            return false;
        } else if (stockVal.value == "") {
            text = "Please enter a number of stocks";
            errorMsg.innerHTML = text;
            return false;
        } else if (revenueVal.value == "") {
            text = "Please enter a revenue";
            errorMsg.innerHTML = text;
            return false;
        }
        

        if (imgArray[0] && sellerNameVal.value !== "" && webUrlVal.value !== "" && stockVal.value !== ""  && revenueVal.value !== "" && !editList) {
            var newArrayId = findNextId();
            var newArray = {
                'id': newArrayId,
                "sellerName": sellerNameVal.value,
                "companyLogo": companyLogoImg.src,
                "verified": false,
                "webUrl": webUrlVal.value,
                "stock" : stockVal.value,
                "revenue" : revenueVal.value
            };
            sellerList.push(newArray);
            sortElementsById();
        }else if (imgArray[0] && sellerNameVal.value !== "" && webUrlVal.value !== "" && stockVal.value !== ""  && revenueVal.value !== "" && editList) {
            var getEditid = 0;
            getEditid = document.getElementById("id-field").value;
            sellerList = sellerList.map(function (item) {
                if (item.id == getEditid) {
                    var editObj = {
                        'id': getEditid,
                        "sellerName": sellerNameVal.value,
                        "companyLogo": companyLogoImg.src,
                        "verified": item.verified,
                        "webUrl": webUrlVal.value,
                        "stock" : stockVal.value,
                        "revenue" : revenueVal.value
                    }
                    return editObj;
                }
                return item;
            });
            editList = false;
        }

        pageEvent(sellerList);
        loadSellersListData(sellerList, currentPage);
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
        return Math.ceil(sellerList.length / itemsPerPage);
    };

    function clickPage() {
        document.addEventListener('click', function (e) {
            if (e.target.nodeName == "A" && e.target.classList.contains("clickPageNumber")) {
                currentPage = e.target.textContent;
                loadSellersListData(sellerList, currentPage);
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
            loadSellersListData(sellerList, currentPage);
        }
    });

    nextButton.addEventListener('click', function () {
        if (currentPage < numPages()) {
            currentPage++;
            loadSellersListData(sellerList, currentPage);
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
    if (sellerList.length === 0) {
        return 0;
    }
    var lastElementId = fetchIdFromObj(sellerList[sellerList.length - 1]),
        firstElementId = fetchIdFromObj(sellerList[0]);
    return (firstElementId >= lastElementId) ? (firstElementId + 1) : (lastElementId + 1);
}

function sortElementsById() {
    var manySellerList = sellerList.sort(function (a, b) {
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
    
    loadSellersListData(manySellerList, currentPage);
}

// refreshCallbacks
function refreshCallbacks() {
    // edit-list
    var getEditid = 0;
    Array.from(document.querySelectorAll(".edit-list")).forEach(function (elem) {
        elem.addEventListener('click', function (event) {
            getEditid = elem.getAttribute('data-edit-id');
            sellerList = sellerList.map(function (item) {
                if (item.id == getEditid) {
                    editList = true;
                    document.getElementById("createModalLabel").innerHTML = "Edit seller details";
                    document.getElementById("addNew").innerHTML = "Save";
                    document.getElementById("id-field").value = item.id;
                    companyLogoImg.src = item.companyLogo;
                    sellerNameVal.value = item.sellerName;
                    webUrlVal.value = item.webUrl;
                    stockVal.value = item.stock;
                    revenueVal.value = item.revenue;
                }
                return item;
            });
        });
    });


    // remove-list
    var getid = 0;
    Array.from(document.querySelectorAll(".remove-list")).forEach(function (item) {
        item.addEventListener('click', function (event) {
            getid = item.getAttribute('data-remove-id');
            document.getElementById("remove-item").addEventListener("click", function () {
                function arrayRemove(arr, value) {
                    return arr.filter(function (ele) {
                        return ele.id != value;
                    });
                }
                var filtered = arrayRemove(sellerList, getid);

                sellerList = filtered;
                pageEvent(sellerList);
                loadSellersListData(sellerList, currentPage);
                document.getElementById("close-removeModal").click();
            });
        });
    });
}

// clearFields
function clearFields() {
    document.getElementById("id-field").value = ""
    companyLogoImg.src = "";
    sellerNameVal.value = "";
    webUrlVal.value = "";
    stockVal.value = "";
    revenueVal.value = "";
    document.getElementById("companyLogo-image-input").value = "";
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
            return el.sellerName.toLowerCase().indexOf(query.toLowerCase()) !== -1 || el.webUrl.toLowerCase().indexOf(query.toLowerCase()) !== -1
        })
    }
    var filterData = filterItems(sellerList, inputVal);
    pageEvent(filterData);
    loadSellersListData(filterData, currentPage);
});