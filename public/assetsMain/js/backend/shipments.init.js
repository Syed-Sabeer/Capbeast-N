/*
Template Name: Toner - Admin & Dashboard Template
Author: Themesbrand
Version: 1.2.0
Website: https://Themesbrand.com/
Contact: Themesbrand@gmail.com
File: shipments list init File
*/


var perPage = 10;
var editlist = false;

//Table
var options = {
    valueNames: [
        "id",
        "shipment_no",
        "customer_name",
        "supplier",
        "location",
        "order_date",
        "arrival_date",
        "status",
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

// Init list
var shipmentsList = new List("shipmentsList", options).on("updated", function (list) {
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

const xhttp = new XMLHttpRequest();
xhttp.onload = function () {
    var json_records = JSON.parse(this.responseText);
    Array.from(json_records).forEach(function (element) {
        shipmentsList.add({
            id: '<a href="javascript:void(0);" class="fw-medium link-primary">#TBT' + element.id + '</a>',
            shipment_no: '<a href="javascript:void(0);" class="text-reset">#' + element.shipment_no + '</a>',
            customer_name: element.customer_name,
            supplier: element.supplier,
            location: element.location,
            order_date: element.order_date,
            arrival_date: element.arrival_date,
            status: isStatus(element.status)
        });
        shipmentsList.sort('id', { order: "desc" });
        refreshCallbacks();
    });
    shipmentsList.remove("id", `<a href="javascript:void(0);" class="fw-medium link-primary">#TBSC2830</a>`);
}
xhttp.open("GET", "../assets/json/shipments.json");
xhttp.send();

function isStatus(val) {
    switch (val) {
        case "Pending":
            return (
                '<span class="badge bg-warning-subtle text-warning ">' +
                val +
                "</span>"
            );
        case "Delivered":
            return (
                '<span class="badge bg-success-subtle text-success ">' +
                val +
                "</span>"
            );
        case "Shipping":
            return (
                '<span class="badge bg-info-subtle text-info ">' +
                val +
                "</span>"
            );
        case "Pickups":
            return (
                '<span class="badge bg-secondary-subtle text-secondary ">' + val + "</span>"
            );
        case "Returns":
            return (
                '<span class="badge bg-primary-subtle text-primary ">' +
                val +
                "</span>"
            );
        case "Pending":
            return (
                '<span class="badge bg-warning-subtle text-warning ">' +
                val +
                "</span>"
            );
        case "Out Of Delivery":
            return (
                '<span class="badge bg-danger-subtle text-danger ">' +
                val +
                "</span>"
            );
    }
}

var idField = document.getElementById("orderId"),
    shipmentNoField = document.getElementById("shipmentNo"),
    customerNameField = document.getElementById("customerName-field"),
    supplierNameField = document.getElementById("supplierName-field"),
    orderDateField = document.getElementById("orderDate-field"),
    arrivalDateField = document.getElementById("arrivalDate-field"),
    locationField = document.getElementById("locationSelect"),
    statusField = document.getElementById("statusSelect"),
    addBtn = document.getElementById("add-btn")
    editBtn = document.getElementById("edit-btn"),
    removeBtns = document.getElementsByClassName("remove-item-btn"),
    editBtns = document.getElementsByClassName("edit-item-btn");


refreshCallbacks();

var locationVal = new Choices(locationField,{
    searchEnabled: false,
});
var statusVal = new Choices(statusField,{
    searchEnabled: false,
});

var count = 13;

document.getElementById("createModal").addEventListener("show.bs.modal", function (e) {
    if (e.relatedTarget.classList.contains("edit-item-btn")) {
        document.getElementById("modal-id").style.display = "block";
        document.getElementById("exampleModalLabel").innerHTML = "Edit Shipping Info";
        document.getElementById("add-btn").innerHTML = "Update";
    } else if (e.relatedTarget.classList.contains("add-btn")) {
        document.getElementById("modal-id").style.display = "none";
        document.getElementById("exampleModalLabel").innerHTML = "Create Shipping";
        document.getElementById("add-btn").innerHTML = "Add Shipping";
    } else {
        document.getElementById("exampleModalLabel").innerHTML = "List Shipping ";
    }
});


function refreshCallbacks() {
    // removeBtns
    if (removeBtns){
        Array.from(removeBtns).forEach(function (btn) {
            btn.addEventListener("click", function (e) {
                e.target.closest("tr").children[0].innerText;
                itemId = e.target.closest("tr").children[0].innerText;
                var itemValues = shipmentsList.get({
                    id: itemId,
                });
    
                Array.from(itemValues).forEach(function (x) {
                    var deleteid = new DOMParser().parseFromString(x._values.id, "text/html");

                    var isElem = deleteid.body.firstElementChild;
                    var isdeleteid = deleteid.body.firstElementChild.innerHTML;
    
                    if (isdeleteid == itemId) {
                        document.getElementById("delete-record").addEventListener("click", function () {
                            shipmentsList.remove("id", isElem.outerHTML);
                            document.getElementById("deleteRecord-close").click();
                            Swal.fire({
                                position: 'center',
                                icon: 'success',
                                title: 'Shipping record Deleted successfully!',
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
                e.target.closest("tr").children[0].innerText;
                itemId = e.target.closest("tr").children[0].innerText;
                var itemValues = shipmentsList.get({
                    id: itemId,
                });

                Array.from(itemValues).forEach(function (x) {
                    var isid = new DOMParser().parseFromString(x._values.id, "text/html");
                    var selectedid = isid.body.firstElementChild.innerHTML;  
                    
                    var ship_no = new DOMParser().parseFromString(x._values.shipment_no, "text/html");

                    
                    if (selectedid == itemId) {                        
                        editlist = true;
                        document.getElementById("orderID").value = selectedid;
                        shipmentNoField.value = ship_no.body.firstElementChild.innerHTML;
                        customerNameField.value = x._values.customer_name;
                        supplierNameField.value = x._values.supplier;
                        orderDateField.value = x._values.order_date;
                        arrivalDateField.value = x._values.arrival_date;

                        // locationVal
                        if(locationVal) locationVal.destroy();
                        var locationValue = new Choices(locationField,{
                            searchEnabled: false,
                        });
                        locationValue.setChoiceByValue(x._values.location);

                        // statusVal
                        if (statusVal) statusVal.destroy();
                        statusVal = new Choices(statusField, {
                            searchEnabled: false
                        });
                        val = new DOMParser().parseFromString(x._values.status, "text/html");
                        var statusSelec = val.body.firstElementChild.innerHTML;
                        statusVal.setChoiceByValue(statusSelec);
                        flatpickr("#orderDate-field", {
                            dateFormat: "d M, Y",
                            defaultDate: x._values.order_date,
                        });

                        flatpickr("#arrivalDate-field", {
                            dateFormat: "d M, Y",
                            defaultDate: x._values.arrival_date,
                        });
                    }
                });
            });
        });
    };
};

var forms = document.querySelectorAll('.tablelist-form')
Array.prototype.slice.call(forms).forEach(function (form) {
    form.addEventListener('submit', function (event) {

        event.preventDefault();

        var errorMsg = document.getElementById("alert-error-msg");
        errorMsg.classList.remove("d-none");

        setTimeout(() => errorMsg.classList.add("d-none"), 2000);

        var text;

        if (customerNameField.value == "") {
            text = "Please enter a customer name";
            errorMsg.innerHTML = text;
            return false;
        } else if (supplierNameField.value == "") {
            text = "Please enter a supplier name";
            errorMsg.innerHTML = text;
            return false;
        } else if (orderDateField.value == "") {
            text = "Please select a order date";
            errorMsg.innerHTML = text;
            return false;
        } else if (arrivalDateField.value == "") {
            text = "Please select a arrival date";
            errorMsg.innerHTML = text;
            return false;
        } else if (locationField.value == "") {
            text = "Please select a location";
            errorMsg.innerHTML = text;
            return false;
        } else if (statusField.value == "") {
            text = "Please select a status";
            errorMsg.innerHTML = text;
            return false;
        }
        if (
            customerNameField.value !== "" &&
            supplierNameField.value !== "" &&
            orderDateField.value !== "" &&
            arrivalDateField.value !== "" &&
            locationField.value !== "" &&
            statusField.value !== "" && !editlist
        ) {
            shipmentsList.add({
                id: '<a href="javascript:void(0);" class="fw-medium link-primary">#TBT' + count + "</a>",
                shipment_no: '<a href="javascript:void(0);" class="text-reset">#TBSN15414524986</a>',
                customer_name: customerNameField.value,
                supplier: supplierNameField.value,
                location: locationField.value,
                order_date: orderDateField.value,
                arrival_date: arrivalDateField.value,
                status: isStatus(statusField.value),
            });

            shipmentsList.sort('id', { order: "desc" });
            document.getElementById("alert-error-msg").classList.add("d-none");
            document.getElementById("close-createmodal").click();
            clearFields();
            refreshCallbacks();
            count++;
            Swal.fire({
                position: 'center',
                icon: 'success',
                title: 'Shipping record inserted successfully!',
                showConfirmButton: false,
                timer: 2000,
                showCloseButton: true
            });
        }else if (
            customerNameField.value !== "" &&
            supplierNameField.value !== "" &&
            orderDateField.value !== "" &&
            arrivalDateField.value !== "" &&
            locationField.value !== "" &&
            statusField.value !== "" && editlist
        ){
            var editValues = shipmentsList.get({
                id: document.getElementById("orderID").value,
            });

            Array.from(editValues).forEach(function (x) {
                isid = new DOMParser().parseFromString(x._values.id, "text/html");
                var selectedid = isid.body.firstElementChild.innerHTML;
                if (selectedid == itemId) {
                    x.values({
                        id: '<a href="javascript:void(0);" class="fw-medium link-primary">' + document.getElementById("orderID").value + "</a>",
                        shipment_no: '<a href="javascript:void(0);" class="text-reset">' + shipmentNoField.value + "</a>",
                        customer_name: customerNameField.value,
                        supplier: supplierNameField.value,
                        location: locationField.value,
                        order_date: orderDateField.value,
                        arrival_date: arrivalDateField.value,
                        status: isStatus(statusField.value),
                    });
                }
            });
            document.getElementById("alert-error-msg").classList.add("d-none");
            document.getElementById("close-createmodal").click();
            clearFields();
            Swal.fire({
                position: 'center',
                icon: 'success',
                title: 'Shipping record updated Successfully!',
                showConfirmButton: false,
                timer: 2000,
                showCloseButton: true
            });
        }
        return true;
    })
});

function filterData() {
    var isstatus = document.getElementById("idStatus").value;
    var pickerVal = document.getElementById("demo-datepicker").value;

    var date1 = pickerVal.split(" to ")[0];
    var date2 = pickerVal.split(" to ")[1];

    shipmentsList.filter(function (data) {
        matchData = new DOMParser().parseFromString(
            data.values().status,
            "text/html"
        );
        var status = matchData.body.firstElementChild.innerHTML;
        var statusFilter = false;
        var dateFilter = false;

        if (status == "all" || isstatus == "all") {
            statusFilter = true;
        } else {
            statusFilter = status == isstatus;
        }


        if (
            new Date(data.values().order_date) >= new Date(date1) &&
            new Date(data.values().order_date) <= new Date(date2)
        ) {
            dateFilter = true;
        } else {
            dateFilter = false;
        }


        if (statusFilter && dateFilter) {
            return statusFilter && dateFilter;
        } else if (statusFilter && pickerVal == "") {
            return statusFilter;
        } else if (dateFilter) {
            return dateFilter;
        }
    });
    shipmentsList.update();
}

function clearFields() {
    // idField.value = "";
    shipmentNoField.value = "";
    customerNameField.value = "";
    supplierNameField.value = "";

    var orderDField = flatpickr("#orderDate-field");
    orderDField.clear();

    var arrivalDField = flatpickr("#arrivalDate-field");
    arrivalDField.clear();

    if (locationVal) locationVal.destroy();
    locationVal = new Choices(locationField,{
        searchEnabled: false,
    });

    if (statusVal) statusVal.destroy();
    statusVal = new Choices(statusField,{
        searchEnabled: false,
    });
}

document.getElementById("createModal").addEventListener("hidden.bs.modal", function () {
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