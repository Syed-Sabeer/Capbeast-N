/*
Template Name: Toner eCommerce + Admin HTML Template
Author: Themesbrand
Version: 1.2.0
Website: https://Themesbrand.com/
Contact: Themesbrand@gmail.com
File: Address Js File
*/

var addressListData = [{
    'id': 1,
    "checked": false,
    "addressType": "Home",
    "name": "Witney Blessington",
    "address": "144 Cavendish Avenue, Indianapolis, IN 46251",
    "phone": "012-345-6789"
}, {
    'id': 2,
    "checked": true,
    "addressType": "Office",
    "name": "Edwin Adenike",
    "address": "2971 Westheimer Road, Santa Ana, IL 80214",
    "phone": "123-456-7890"
}];

var editlist = false;

loadAddressList(addressListData);

function loadAddressList(datas) {
    document.getElementById("address-list").innerHTML = "";
    Array.from(datas).forEach(function (listdata) {
        var checkinput = listdata.checked ? "checked" : "";
        document.getElementById("address-list").innerHTML += '<div class="col-lg-6">\
                        <div>\
                            <div class="form-check card-radio">\
                                <input id="shippingAddress'+ listdata.id + '" name="shippingAddress" type="radio" class="form-check-input" ' + checkinput + '>\
                                <label class="form-check-label" for="shippingAddress'+ listdata.id + '">\
                                    <span class="mb-4 fw-semibold fs-12 d-block text-muted text-uppercase">'+ listdata.addressType + ' Address</span>\
                                    <span class="fs-14 mb-2 fw-semibold  d-block">'+ listdata.name + '</span>\
                                    <span class="text-muted fw-normal text-wrap mb-1 d-block">'+ listdata.address + '</span>\
                                    <span class="text-muted fw-normal d-block">Mo. '+ listdata.phone + '</span>\
                                </label>\
                            </div>\
                            <div class="d-flex flex-wrap p-2 py-1 bg-light rounded-bottom border mt-n1 fs-13">\
                                <div>\
                                    <a href="#" class="d-block text-body p-1 px-2 edit-list" data-edit-id="'+ listdata.id + '" data-bs-toggle="modal" data-bs-target="#addAddressModal"><i class="ri-pencil-fill text-muted align-bottom me-1"></i> Edit</a>\
                                </div>\
                                <div>\
                                    <a href="#" class="d-block text-body p-1 px-2 remove-list" data-remove-id="'+ listdata.id + '" data-bs-toggle="modal" data-bs-target="#removeAddressModal"><i class="ri-delete-bin-fill text-muted align-bottom me-1"></i> Remove</a>\
                                </div>\
                            </div>\
                        </div>\
                    </div>';

        editAddressList();
        removeItem();
    });
};


var createAddressForms = document.querySelectorAll('.createAddress-form')
Array.prototype.slice.call(createAddressForms).forEach(function (form) {
    form.addEventListener('submit', function (event) {
        if (!form.checkValidity()) {
            event.preventDefault();
            event.stopPropagation();
        } else {
            event.preventDefault();
            var inputName = document.getElementById('addaddress-Name').value;
            var addressValue = document.getElementById('addaddress-textarea').value;
            var phoneValue = document.getElementById('addaddress-phone').value;
            var stateValue = document.getElementById('state').value;

            if (inputName !== "" &&
                addressValue !== "" &&
                stateValue !== "" &&
                phoneValue !== "" && !editlist) {
                var newListId = findNextId();
                var newList = {
                    'id': newListId,
                    "checked": false,
                    "addressType": stateValue,
                    "name": inputName,
                    "address": addressValue,
                    "phone": phoneValue
                };

                addressListData.push(newList);
            } else if (inputName !== "" &&
                addressValue !== "" &&
                stateValue !== "" &&
                phoneValue !== "" && editlist) {
                var getEditid = 0;
                getEditid = document.getElementById("addressid-input").value;
                addressListData = addressListData.map(function (item) {
                    if (item.id == getEditid) {
                        var editObj = {
                            'id': getEditid,
                            "checked": item.checked,
                            "addressType": stateValue,
                            "name": inputName,
                            "address": addressValue,
                            "phone": phoneValue
                        }
                        return editObj;
                    }
                    return item;
                });
                editlist = false;
                console.log(addressListData)
            }

            loadAddressList(addressListData)
            document.getElementById("addAddress-close").click();
        }
        form.classList.add('was-validated');
    }, false)
});

function fetchIdFromObj(list) {
    return parseInt(list.id);
}

function findNextId() {
    if (addressListData.length === 0) {
        return 0;
    }
    var lastElementId = fetchIdFromObj(addressListData[addressListData.length - 1]),
        firstElementId = fetchIdFromObj(addressListData[0]);
    return (firstElementId >= lastElementId) ? (firstElementId + 1) : (lastElementId + 1);
}

Array.from(document.querySelectorAll(".addAddress-modal")).forEach(function (elem) {
    elem.addEventListener('click', function (event) {
        document.getElementById("addAddressModalLabel").innerHTML = "Add New Address";
        document.getElementById("addNewAddress").innerHTML = "Add";
        document.getElementById("addaddress-Name").value = "";
        document.getElementById("addaddress-textarea").value = "";
        document.getElementById("addaddress-phone").value = "";
        document.getElementById("state").value = "Home";

        document.getElementById("createAddress-form").classList.remove('was-validated');
    });
});


function editAddressList() {
    var getEditid = 0;
    Array.from(document.querySelectorAll(".edit-list")).forEach(function (elem) {
        elem.addEventListener('click', function (event) {
            getEditid = elem.getAttribute('data-edit-id');
            addressListData = addressListData.map(function (item) {
                if (item.id == getEditid) {
                    editlist = true;
                    document.getElementById("createAddress-form").classList.remove('was-validated');
                    document.getElementById("addAddressModalLabel").innerHTML = "Edit Address";
                    document.getElementById("addNewAddress").innerHTML = "Save";

                    document.getElementById("addressid-input").value = item.id;
                    document.getElementById('addaddress-Name').value = item.name;
                    document.getElementById('addaddress-textarea').value = item.address;
                    document.getElementById('addaddress-phone').value = item.phone;
                    document.getElementById('state').value = item.addressType;

                }
                return item;
            });
        });
    });
};


// removeItem
function removeItem() {
    var getid = 0;
    Array.from(document.querySelectorAll(".remove-list")).forEach(function (item) {
        item.addEventListener('click', function (event) {
            getid = item.getAttribute('data-remove-id');
            document.getElementById("remove-address").addEventListener("click", function () {
                function arrayRemove(arr, value) {
                    return arr.filter(function (ele) {
                        return ele.id != value;
                    });
                }
                var filtered = arrayRemove(addressListData, getid);

                addressListData = filtered;

                loadAddressList(addressListData);
                document.getElementById("close-removeAddressModal").click();
            });
        });
    });
}