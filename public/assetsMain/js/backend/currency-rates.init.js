var perPage = 10;
var editlist = false;

var options = {
    valueNames: [
        "id",
        "currencyName",
        "usd",
        "type",        
        "exchangeRate",
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

var currencyRatesList = new List("currencyRatesList", options).on("updated", function (list) {
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



var idField = document.getElementById("id-field"),
exchangeRateField = document.getElementById("exchangeRate-field"),
currencyNameField = document.getElementById("currencyName-field"),
typeField = document.getElementById("type-field"),
currencyAmountField = document.getElementById("currencyAmount-field"),
addBtn = document.getElementById("add-btn")
editBtn = document.getElementById("edit-btn"),
removeBtns = document.getElementsByClassName("remove-item-btn"),
editBtns = document.getElementsByClassName("edit-item-btn");


refreshCallbacks();    

var typeVal = new Choices(typeField);

document.getElementById("showModal").addEventListener("show.bs.modal", function (e) {
    if (e.relatedTarget.classList.contains("edit-item-btn")) {        
        document.getElementById("exampleModalLabel").innerHTML = "Edit Currency";
        document.getElementById("showModal").querySelector(".modal-footer").style.display = "block";
        document.getElementById("add-btn").innerHTML = "Update Currency";
    } else if (e.relatedTarget.classList.contains("add-btn")) {
        document.getElementById("exampleModalLabel").innerHTML = "Add Currency";
        document.getElementById("showModal").querySelector(".modal-footer").style.display = "block";
        document.getElementById("add-btn").innerHTML = "Add Currency";
    } else {
        document.getElementById("exampleModalLabel").innerHTML = "List Currency";
        document.getElementById("showModal").querySelector(".modal-footer").style.display = "none";
    }
});

//Add Currency
var count = 12;
var forms = document.querySelectorAll('.tablelist-form')
Array.prototype.slice.call(forms).forEach(function (form) {
    form.addEventListener('submit', function (event) {

        event.preventDefault();

        var errorMsg = document.getElementById("alert-error-msg");
        errorMsg.classList.remove("d-none");

        setTimeout(() => errorMsg.classList.add("d-none"), 2000);

        var text;

        if (exchangeRateField.value == "") {
            text = "Please enter a customer name";
            errorMsg.innerHTML = text;
            return false;
        }else if (currencyNameField.value == "") {
            text = "Please select a products";
            errorMsg.innerHTML = text;
            return false;
        }else if (typeField.value == "") {
            text = "Please select a type value";
            errorMsg.innerHTML = text;
            return false;
        }else if (currencyAmountField.value == "") {
            text = "Please select a delivery date";
            errorMsg.innerHTML = text;
            return false;
        }


        if (
            exchangeRateField.value !== "" &&
            currencyNameField.value !== "" &&
            typeField.value !== "" &&
            currencyAmountField.value !== ""  && !editlist
        ) {
            currencyRatesList.add({
                id: `<a href="javascript:void(0);" class="fw-medium link-primary">${count}</a>`,
                usd: exchangeRateField.value,
                currencyName: currencyNameField.value,
                type:  isType(typeField.value),
                exchangeRate: currencyAmountField.value,
            });
            currencyRatesList.sort('id', { order: "desc" });
            document.getElementById("alert-error-msg").classList.add("d-none");
            document.getElementById("close-modal").click();
            clearFields();
            refreshCallbacks();
            count++;
            Swal.fire({
                position: 'center',
                icon: 'success',
                title: 'Currency added successfully!',
                showConfirmButton: false,
                timer: 2000,
                showCloseButton: true
            });
        } 
        else if (
            exchangeRateField.value !== "" &&
            currencyNameField.value !== "" &&
            typeField.value !== "" &&
            currencyAmountField.value !== ""  && editlist
        ) {
            var editValues = currencyRatesList.get({
                id: idField.value,
            });

            Array.from(editValues).forEach(function (x) {
                isid = new DOMParser().parseFromString(x._values.id, "text/html");
                var selectedid = isid.body.firstElementChild.innerHTML;
                if (selectedid == itemId) {
                    x.values({
                        id: '<a href="javascript:void(0);" class="fw-medium link-primary">' + idField.value + "</a>",
                        usd: exchangeRateField.value,
                        currencyName: currencyNameField.value,
                        type: isType(typeField.value),
                        exchangeRate: currencyAmountField.value,                        
                    });
                }
            });
            document.getElementById("alert-error-msg").classList.add("d-none");
            document.getElementById("close-modal").click();
            clearFields();
            Swal.fire({
                position: 'center',
                icon: 'success',
                title: 'Currency updated Successfully!',
                showConfirmButton: false,
                timer: 2000,
                showCloseButton: true
            });
        }
        return true;
    })
});

function refreshCallbacks() {
    // removeBtns
    if (removeBtns){        
        Array.from(removeBtns).forEach(function (btn) {                        
            btn.addEventListener("click", function (e) {
                e.target.closest("tr").children[0].innerText;
                itemId = e.target.closest("tr").children[0].innerText;
                var itemValues = currencyRatesList.get({
                    id: itemId,
                });                
                

                Array.from(itemValues).forEach(function (x) {
                    deleteid = new DOMParser().parseFromString(x._values.id, "text/html");
                    
                    var isElem = deleteid.body.firstElementChild;
                    var isdeleteid = deleteid.body.firstElementChild.innerHTML; 
                    if (isdeleteid == itemId) {                        
                        document.getElementById("delete-record").addEventListener("click", function () {
                            
                            currencyRatesList.remove("id", isElem.outerHTML);
                            document.getElementById("deleteRecord-close").click();
                            Swal.fire({
                                position: 'center',
                                icon: 'success',
                                title: 'Currency Deleted successfully!',
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

    //editBtns
    if (editBtns){
        Array.from(editBtns).forEach(function (btn) {
            btn.addEventListener("click", function (e) {
                e.target.closest("tr").children[0].innerText;
                itemId = e.target.closest("tr").children[0].innerText;
                var itemValues = currencyRatesList.get({
                    id: itemId,
                });

                Array.from(itemValues).forEach(function (x) {
                    isid = new DOMParser().parseFromString(x._values.id, "text/html");
                    var selectedid = isid.body.firstElementChild.innerHTML;
                    
                    if (selectedid == itemId) {
                        editlist = true;
                        idField.value = selectedid;
                        exchangeRateField.value = x._values.usd;
                        currencyNameField.value = x._values.currencyName;
                        currencyAmountField.value = x._values.exchangeRate;
                        
                        // TypeVal
                        if (typeVal) typeVal.destroy();
                        typeVal = new Choices(typeField, {
                            searchEnabled: false
                        });
                        val = new DOMParser().parseFromString(x._values.type, "text/html");
                        var typeSelec = val.body.innerHTML;
                        typeVal.setChoiceByValue(typeSelec);                        
                    }
                });
            });
        });
    };
};

const xhttp = new XMLHttpRequest();
xhttp.onload = function () {
    var json_records = JSON.parse(this.responseText);  
   
        Array.from(json_records).forEach(function (element) {
            currencyRatesList.add({
            id: `<a href="javascript:void(0);" class="fw-medium link-primary">#TB${element.id}</a>`,
            currencyName: element.currencyName,         
            usd: element.usd,
            type: isType(element.type),
            exchangeRate: element.exchangeRate,   
            });
            currencyRatesList.sort('id', { order: "desc" });
            refreshCallbacks();
        });
    
    currencyRatesList.remove("id", `<a href="javascript:void(0);" class="fw-medium link-primary">#TB01</a>`);
}
xhttp.open("GET", "../assets/json/currency-rates.json");
xhttp.send();

function isType(val) {
    switch (val) {
        case "Euro (€)":
            return (                
                val                
            );
        case "Yuan (¥)":
            return (                
                val                
        );
        case "AFN (؋)":
        return (                
            val                
        );
        case "CAD ($)":
        return (                
            val                
        );
        case "DKK (Kr)":
        return (                
            val                
        );
        case "EGP (E£)":
        return (                
            val                
        );   
        case "CAD ($)":
        return (                
            val                
        );
        case "KES (K)":
        return (                
            val                
        );
        case "GBP (£)":
        return (                
            val                
        ); 
        case "COP ($)":
        return (                
            val                
        );     
    }
}

function clearFields() {
    exchangeRateField.value = "";
    currencyNameField.value = "";
    currencyAmountField.value = "";

    if (typeVal) typeVal.destroy();
    typeVal = new Choices(typeField);
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