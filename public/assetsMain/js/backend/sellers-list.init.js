/*
Template Name: Toner eCommerce + Admin HTML Template
Author: Themesbrand
Version: 1.2.0
Website: https://Themesbrand.com/
Contact: Themesbrand@gmail.com
File: sellers list init File
*/

var perPage = 10;
var editlist = false;

var options = {
    valueNames: [
        "id",
        "sellerName",
        "itemStock",
        "balance",        
        "email",
        "phone",
        "createDate",
        "accountStatus",
    ],
    page: perPage,
    pagination: true,
    plugins: [
        ListPagination({
            left: 2,
            right: 2,
        }),
    ],
};

var sellersList = new List("sellersList", options).on("updated", function (list) {
    list.matchingItems.length == 0 ?
        (document.getElementsByClassName("noresult")[0].style.display = "block") :
        (document.getElementsByClassName("noresult")[0].style.display = "none");
    var isFirst = list.i == 1;
    var isLast = list.i > list.matchingItems.length - list.page;
    // make the Prev and Nex buttons disabled on first and last pages accordingly
    document.querySelector(".pagination-prev.disabled") ?
        document.querySelector(".pagination-prev.disabled").classList.remove("disabled") : "";
    document.querySelector(".pagination-next.disabled") ?
        document.querySelector(".pagination-next.disabled").classList.remove("disabled") : "";
    if (isFirst) {
        document.querySelector(".pagination-prev").classList.add("disabled");
    }
    if (isLast) {
        document.querySelector(".pagination-next").classList.add("disabled");
    }
    if (list.matchingItems.length <= perPage) {
        document.querySelector(".pagination-wrap").style.display = "none";
    } else {
        document.querySelector(".pagination-wrap").style.display = "flex";
    }

    if (list.matchingItems.length == perPage) {
        document.querySelector(".pagination.listjs-pagination").firstElementChild.children[0].click()
    }

    if (list.matchingItems.length > 0) {
        document.getElementsByClassName("noresult")[0].style.display = "none";
    } else {
        document.getElementsByClassName("noresult")[0].style.display = "block";
    }
});

//Sellers List
const xhttp = new XMLHttpRequest();
xhttp.onload = function () {
    var json_records = JSON.parse(this.responseText);   
        Array.from(json_records).forEach(function (element) {
            
            sellersList.add({
            id: `<a href="javascript:void(0);" class="fw-medium link-primary">#TB${element.id}</a>`,           
            sellerName: element.sellerName,                
            itemStock: element.itemStock,
            balance :element.balance,
            email: element.email, 
            phone: element.phone,
            createDate: element.createDate,           
            accountStatus: isStatus(element.accountStatus)            
            
            });
            sellersList.sort('id', { order: "desc" });
            refreshCallbacks();
        });
    
        sellersList.remove("id", `<a href="javascript:void(0);" class="fw-medium link-primary">#TB01</a>`);
}
xhttp.open("GET", "../assets/json/sellers-list.json");
xhttp.send();

isCount = new DOMParser().parseFromString(
    sellersList.items.slice(-1)[0]._values.id,
    "text/html"
);

var isValue = isCount.body.firstElementChild.innerHTML;

function isStatus(val) {
    switch (val) {
        case "Active":
            return (
                '<span class="badge bg-success-subtle text-success  text-uppercase">' +
                val +
                "</span>"
            );
        case "Inactive":
            return (
                '<span class="badge bg-danger-subtle text-danger  text-uppercase">' +
                val +
                "</span>"
            );       
    }
}

var idField = document.getElementById("id-field"),
    sellerNameField = document.getElementById("seller-name-field"),    
    itemStockField = document.getElementById("item-stock-field"),    
    balanceField = document.getElementById("balance-field"),    
    emailField = document.getElementById("email-field"),
    phoneField = document.getElementById("phone-field"),
    dateField = document.getElementById("date-field"),
    accountStatusField = document.getElementById("account-status-field"),    
    addBtn = document.getElementById("add-btn"),
    editBtns = document.getElementsByClassName("edit-item-btn"),
    removeBtns = document.getElementsByClassName("remove-item-btn");

refreshCallbacks();    

var accountStatusVal = new Choices(accountStatusField, {
    searchEnabled: false
});

document.getElementById("showModal").addEventListener("show.bs.modal", function (e) {
    if (e.relatedTarget.classList.contains("edit-item-btn")) {        
        document.getElementById("exampleModalLabel").innerHTML = "Edit Seller";
        document.getElementById("showModal").querySelector(".modal-footer").style.display = "block";
        document.getElementById("add-btn").innerHTML = "Update";
    } else if (e.relatedTarget.classList.contains("add-btn")) {
        document.getElementById("exampleModalLabel").innerHTML = "Add Seller";
        document.getElementById("showModal").querySelector(".modal-footer").style.display = "block";
        document.getElementById("add-btn").innerHTML = "Add Seller";
    } else {
        document.getElementById("exampleModalLabel").innerHTML = "List Seller";
        document.getElementById("showModal").querySelector(".modal-footer").style.display = "none";
    }
});


function refreshCallbacks() {
    // removeBtns
    if (removeBtns){
        Array.from(removeBtns).forEach(function (btn) {
            btn.addEventListener("click", function (e) {
                e.target.closest("tr").children[1].innerText;
                itemId = e.target.closest("tr").children[1].innerText;
                var itemValues = sellersList.get({
                    id: itemId,
                });
    
                Array.from(itemValues).forEach(function (x) {
                    deleteid = new DOMParser().parseFromString(x._values.id, "text/html");

                    var isElem = deleteid.body.firstElementChild;
                    var isdeleteid = deleteid.body.firstElementChild.innerHTML;
    
                    if (isdeleteid == itemId) {
                        document.getElementById("delete-record").addEventListener("click", function () {
                            sellersList.remove("id", isElem.outerHTML);
                            document.getElementById("deleteRecord-close").click();
                            Swal.fire({
                                position: 'center',
                                icon: 'success',
                                title: 'User Deleted successfully!',
                                showConfirmButton: false,
                                timer: 2000,
                                showCloseButton: true
                            });
                        });
                    }                    
                });
            });
        });
    }

    // editBtns
    if (editBtns){
        Array.from(editBtns).forEach(function (btn) {
            btn.addEventListener("click", function (e) {
                e.target.closest("tr").children[1].innerText;
                itemId = e.target.closest("tr").children[1].innerText;
                var itemValues = sellersList.get({
                    id: itemId,
                });

                Array.from(itemValues).forEach(function (x) {
                    isid = new DOMParser().parseFromString(x._values.id, "text/html");
                    var selectedid = isid.body.firstElementChild.innerHTML;

                    if (selectedid == itemId) {
                        editlist = true;
                        idField.value = selectedid;
                        sellerNameField.value = x._values.sellerName;
                        itemStockField.value = x._values.itemStock;
                        balanceField.value = x._values.balance;
                        emailField.value = x._values.email;
                        phoneField.value = x._values.phone;
                        dateField.value = x._values.createDate;

                        // statusVal
                        if (accountStatusVal) accountStatusVal.destroy();
                        accountStatusVal = new Choices(accountStatusField, {
                            searchEnabled: false
                        });
                        var val = new DOMParser().parseFromString(x._values.accountStatus, "text/html");
                        var statusSelec = val.body.firstElementChild.innerHTML;
                        accountStatusVal.setChoiceByValue(statusSelec);

                        flatpickr("#date-field", {
                            dateFormat: "d M, Y",
                            defaultDate: x._values.createDate,
                        });
                    }
                });
            });
        });
    };
};


// Add Seller
var count = 12;
var forms = document.querySelectorAll('.tablelist-form')
Array.prototype.slice.call(forms).forEach(function (form) {
    form.addEventListener('submit', function (event) {

        event.preventDefault();

        var errorMsg = document.getElementById("alert-error-msg");
        errorMsg.classList.remove("d-none");

        setTimeout(() => errorMsg.classList.add("d-none"), 2000);

        var text;

        var validRegex = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;

        if (sellerNameField.value == "") {
            text = "Please enter a seller name";
            errorMsg.innerHTML = text;
            return false;
        }else if (itemStockField.value == "") {
            text = "Please enter a item stock";
            errorMsg.innerHTML = text;
            return false;
        }else if (balanceField.value == "") {
            text = "Please enter a balance ";
            errorMsg.innerHTML = text;
            return false;
        }else if (!emailField.value.match(validRegex)) {
            text = "Please enter valid email address";
            errorMsg.innerHTML = text;
            return false;
        }else if (phoneField.value == "") {
            text = "Please enter a phone number";
            errorMsg.innerHTML = text;
            return false;
        }else if (dateField.value == "") {
            text = "Please select a date";
            errorMsg.innerHTML = text;
            return false;
        }else if (accountStatusField.value == "") {
            text = "Please select a status";
            errorMsg.innerHTML = text;
            return false;
        }
        

        if (
            sellerNameField.value !== "" &&
            itemStockField.value !== "" &&
            balanceField.value !== "" &&
            emailField.value.match(validRegex) &&
            phoneField.value !== "" && dateField.value !== "" &&
            accountStatusField.value !== "" && !editlist
        ) {
            sellersList.add({
                id: '<a href="javascript:void(0);" class="fw-medium link-primary">#TB' + count + "</a>",
                sellerName: sellerNameField.value,
                itemStock: itemStockField.value,
                balance: "$" + balanceField.value,
                email: emailField.value,
                phone: phoneField.value,
                createDate: dateField.value,
                accountStatus: isStatus(accountStatusField.value),
            });
            sellersList.sort('id', { order: "desc" });
            document.getElementById("alert-error-msg").classList.add("d-none");
            document.getElementById("close-modal").click();
            clearFields();
            refreshCallbacks();
            count++;
            Swal.fire({
                position: 'center',
                icon: 'success',
                title: 'Seller details added successfully!',
                showConfirmButton: false,
                timer: 2000,
                showCloseButton: true
            });
        } 
        else if (
            sellerNameField.value !== "" &&
            itemStockField.value !== "" &&
            balanceField.value !== "" &&
            emailField.value.match(validRegex) &&
            phoneField.value !== "" && dateField.value !== "" &&
            accountStatusField.value !== "" && editlist
        ) {
            var editValues = sellersList.get({
                id: idField.value,
            });

            Array.from(editValues).forEach(function (x) {
                isid = new DOMParser().parseFromString(x._values.id, "text/html");
                
                var selectedid = isid.body.firstElementChild.innerHTML;
                if (selectedid == itemId) {
                    x.values({
                        id: '<a href="javascript:void(0);" class="fw-medium link-primary">' + idField.value + "</a>",
                        sellerName: sellerNameField.value,
                        itemStock: itemStockField.value,
                        balance: balanceField.value,
                        email: emailField.value,
                        phone: phoneField.value,
                        createDate: dateField.value,
                        accountStatus: isStatus(accountStatusField.value),
                    });
                }
            });
            document.getElementById("alert-error-msg").classList.add("d-none");
            document.getElementById("close-modal").click();
            clearFields();
            Swal.fire({
                position: 'center',
                icon: 'success',
                title: 'Seller details updated Successfully!',
                showConfirmButton: false,
                timer: 2000,
                showCloseButton: true
            });
        }
        return true;
    })
});

// choices status
var statusInput = new Choices(document.getElementById('idStatus'), {
    searchEnabled: false,
});

statusInput.passedElement.element.addEventListener('change', function (event) {
    var statusInputValue = event.detail.value;
    sellersList.filter(function (data) {
        matchData = new DOMParser().parseFromString(
            data.values().accountStatus,
            "text/html"
        );
        var status = matchData.body.firstElementChild.innerHTML;
        var statusFilter = false;

        if (status == "All" || statusInputValue == "All") {
            statusFilter = true;
        } else {
            statusFilter = status == statusInputValue;
        }
        if (statusFilter) {
            return statusFilter;
        }
    });
    
    sellersList.update();
}, false);

function clearFields() {
    sellerNameField.value = "";
    itemStockField.value = "";
    balanceField.value = "";
    emailField.value = "";
    phoneField.value = "";
    dateField.value = "";
    accountStatusField.value = "";

    var datePicker = flatpickr("#date-field");
    datePicker.clear();

    if (accountStatusVal) accountStatusVal.destroy();
    accountStatusVal = new Choices(accountStatusField);
}

document.getElementById("showModal").addEventListener("hidden.bs.modal", function () {
    clearFields();
});

document.querySelector(".pagination-next").addEventListener("click", function () {
    document.querySelector(".pagination.listjs-pagination") ?
        document.querySelector(".pagination.listjs-pagination").querySelector(".active") ?
            document.querySelector(".pagination.listjs-pagination").querySelector(".active").nextElementSibling.children[0].click() : "" : "";
});

document.querySelector(".pagination-prev").addEventListener("click", function () {
    document.querySelector(".pagination.listjs-pagination") ?
        document.querySelector(".pagination.listjs-pagination").querySelector(".active") ?
            document.querySelector(".pagination.listjs-pagination").querySelector(".active").previousSibling.children[0].click() : "" : "";
});