
var perPage = 10;
var editlist = false;

//Table
var options = {
    valueNames: [
        "id",
        "customer_name",
        "product_name",
        "amount",
        "order_date",
        "delivery_date",
        "payment_method",
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
var orderList = new List("orderList", options).on("updated", function (list) {
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
        orderList.add({
            id: '<a href="javascript:void(0);" class="fw-medium link-primary">#TBT' + element.id + '</a>',
            customer_name: element.customer_name,
            product_name: element.product_name,
            amount: element.amount,
            order_date: element.order_date,
            delivery_date: element.delivery_date,
            payment_method: element.payment_method,
            status: isStatus(element.status)
        });
        orderList.sort('id', { order: "desc" });
        refreshCallbacks();
    });
    orderList.remove("id", `<a href="javascript:void(0);" class="fw-medium link-primary">#TBT42101</a>`);
}
xhttp.open("GET", "../assets/json/orders-list.init.json");
xhttp.send();

isCount = new DOMParser().parseFromString(
    orderList.items.slice(-1)[0]._values.id,
    "text/html"
);

var isValue = isCount.body.firstElementChild.innerHTML;

function isStatus(val) {
    switch (val) {
        case "Delivered":
            return (
                '<span class="badge bg-success-subtle text-success  text-uppercase">' +
                val +
                "</span>"
            );
        case "Cancelled":
            return (
                '<span class="badge bg-danger-subtle text-danger  text-uppercase">' +
                val +
                "</span>"
            );
        case "Inprogress":
            return (
                '<span class="badge bg-secondary-subtle text-secondary  text-uppercase">' +
                val +
                "</span>"
            );
        case "Pickups":
            return (
                '<span class="badge bg-info-subtle text-info  text-uppercase">' + val + "</span>"
            );
        case "Returns":
            return (
                '<span class="badge bg-primary-subtle text-primary  text-uppercase">' +
                val +
                "</span>"
            );
        case "Pending":
            return (
                '<span class="badge bg-warning-subtle text-warning  text-uppercase">' +
                val +
                "</span>"
            );
    }
}

var idField = document.getElementById("orderId"),
customerNameField = document.getElementById("customername-field"),
productNameField = document.getElementById("productname-field"),
createDateField = document.getElementById("createdate-field"),
deliveryDateField = document.getElementById("deliverydate-field"),
amountField = document.getElementById("amount-field"),
paymentField = document.getElementById("payment-field"),
statusField = document.getElementById("delivered-status"),
addBtn = document.getElementById("add-btn")
editBtn = document.getElementById("edit-btn"),
removeBtns = document.getElementsByClassName("remove-item-btn"),
editBtns = document.getElementsByClassName("edit-item-btn");

refreshCallbacks();

var paymentVal = new Choices(paymentField,{
    searchEnabled: false,
});
var statusVal = new Choices(statusField,{
    searchEnabled: false,
});
var productnameVal = new Choices(productNameField,{
    searchEnabled: false,
});

document.getElementById("showModal").addEventListener("show.bs.modal", function (e) {
    if (e.relatedTarget.classList.contains("edit-item-btn")) {
        document.getElementById("modal-id").style.display = "block";
        document.getElementById("exampleModalLabel").innerHTML = "Edit Order";
        document.getElementById("showModal").querySelector(".modal-footer").style.display = "block";
        document.getElementById("add-btn").innerHTML = "Update";
    } else if (e.relatedTarget.classList.contains("add-btn")) {
        document.getElementById("modal-id").style.display = "none";
        document.getElementById("exampleModalLabel").innerHTML = "Add Order";
        document.getElementById("showModal").querySelector(".modal-footer").style.display = "block";
        document.getElementById("add-btn").innerHTML = "Add Order";
    } else {
        document.getElementById("exampleModalLabel").innerHTML = "List Order";
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
                var itemValues = orderList.get({
                    id: itemId,
                });
    
                Array.from(itemValues).forEach(function (x) {
                    deleteid = new DOMParser().parseFromString(x._values.id, "text/html");
    
                    var isElem = deleteid.body.firstElementChild;
                    var isdeleteid = deleteid.body.firstElementChild.innerHTML;
    
                    if (isdeleteid == itemId) {
                        document.getElementById("delete-record").addEventListener("click", function () {
                            orderList.remove("id", isElem.outerHTML);
                            document.getElementById("deleteRecord-close").click();
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
                var itemValues = orderList.get({
                    id: itemId,
                });

                Array.from(itemValues).forEach(function (x) {
                    isid = new DOMParser().parseFromString(x._values.id, "text/html");
                    var selectedid = isid.body.firstElementChild.innerHTML;
                    if (selectedid == itemId) {
                        
                        editlist = true;
                        idField.value = selectedid;
                        customerNameField.value = x._values.customer_name;
                        productNameField.value = x._values.product_name;
                        amountField.value = x._values.amount;
                        createDateField.value = x._values.order_date;
                        deliveryDateField.value = x._values.delivery_date;
                        amountField.value = x._values.amount;

                        // paymentVal
                        if (paymentVal) paymentVal.destroy();
                        paymentVal = new Choices(paymentField, {
                            searchEnabled: false
                        });
                        var selected = x._values.payment_method;
                        paymentVal.setChoiceByValue(selected);

                        // productnameVal
                        if (productnameVal) productnameVal.destroy();
                        productnameVal = new Choices(productNameField, {
                            searchEnabled: false,
                        });
                        var selectedproduct = x._values.product_name;
                        productnameVal.setChoiceByValue(selectedproduct);

                        // statusVal
                        if (statusVal) statusVal.destroy();
                        statusVal = new Choices(statusField, {
                            searchEnabled: false
                        });
                        val = new DOMParser().parseFromString(x._values.status, "text/html");
                        var statusSelec = val.body.firstElementChild.innerHTML;
                        statusVal.setChoiceByValue(statusSelec);

                        flatpickr("#createdate-field", {
                            dateFormat: "d M, Y",
                            defaultDate: x._values.order_date,
                        });

                        flatpickr("#deliverydate-field", {
                            dateFormat: "d M, Y",
                            defaultDate: x._values.delivery_date,
                        });
                    }
                });
            });
        });
    };
};

var count = 13;
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
        }else if (productNameField.value == "") {
            text = "Please select a products";
            errorMsg.innerHTML = text;
            return false;
        }else if (createDateField.value == "") {
            text = "Please select a order date";
            errorMsg.innerHTML = text;
            return false;
        }else if (deliveryDateField.value == "") {
            text = "Please select a delivery date";
            errorMsg.innerHTML = text;
            return false;
        }else if (amountField.value == "") {
            text = "Please enter a amount";
            errorMsg.innerHTML = text;
            return false;
        }else if (paymentField.value == "") {
            text = "Please select a payment method";
            errorMsg.innerHTML = text;
            return false;
        }else if (statusField.value == "") {
            text = "Please select a delivery status";
            errorMsg.innerHTML = text;
            return false;
        }


        if (
            customerNameField.value !== "" &&
            productNameField.value !== "" &&
            createDateField.value !== "" &&
            deliveryDateField.value !== "" &&
            amountField.value !== "" && statusField.value !== "" &&
            paymentField.value !== "" && !editlist
        ) {
            orderList.add({
                id: '<a href="javascript:void(0);" class="fw-medium link-primary">#TBT' + count + "</a>",
                customer_name: customerNameField.value,
                product_name: productNameField.value,
                amount: "$" + amountField.value,
                order_date: createDateField.value,
                delivery_date: deliveryDateField.value,
                payment_method: paymentField.value,
                status: isStatus(statusField.value),
            });
            orderList.sort('id', { order: "desc" });
            document.getElementById("alert-error-msg").classList.add("d-none");
            document.getElementById("close-modal").click();
            clearFields();
            refreshCallbacks();
            count++;
            Swal.fire({
                position: 'center',
                icon: 'success',
                title: 'Order inserted successfully!',
                showConfirmButton: false,
                timer: 2000,
                showCloseButton: true
            });
        } else if (
            customerNameField.value !== "" &&
            productNameField.value !== "" &&
            createDateField.value !== "" &&
            deliveryDateField.value !== "" &&
            amountField.value !== "" && statusField.value !== "" &&
            paymentField.value !== "" && editlist
        ) {
            var editValues = orderList.get({
                id: idField.value,
            });

            Array.from(editValues).forEach(function (x) {
                isid = new DOMParser().parseFromString(x._values.id, "text/html");
                var selectedid = isid.body.firstElementChild.innerHTML;
                if (selectedid == itemId) {
                    x.values({
                        id: '<a href="javascript:void(0);" class="fw-medium link-primary">' + idField.value + "</a>",
                        customer_name: customerNameField.value,
                        product_name: productNameField.value,
                        order_date: createDateField.value,
                        delivery_date: deliveryDateField.value,
                        amount: amountField.value,
                        payment: paymentField.value,
                        status: isStatus(statusField.value),
                    });
                }
            });
            document.getElementById("alert-error-msg").classList.add("d-none");
            document.getElementById("close-modal").click();
            clearFields();
            Swal.fire({
                position: 'center',
                icon: 'success',
                title: 'Order updated Successfully!',
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
    var payment = document.getElementById("idPayment").value;
    var pickerVal = document.getElementById("demo-datepicker").value;

    var date1 = pickerVal.split(" to ")[0];
    var date2 = pickerVal.split(" to ")[1];

    orderList.filter(function (data) {
        matchData = new DOMParser().parseFromString(
            data.values().status,
            "text/html"
        );
        var status = matchData.body.firstElementChild.innerHTML;
        var statusFilter = false;
        var paymentFilter = false;
        var dateFilter = false;

        if (status == "all" || isstatus == "all") {
            statusFilter = true;
        } else {
            statusFilter = status == isstatus;
        }

        if (data.values().payment == "all" || payment == "all") {
            paymentFilter = true;
        } else {
            paymentFilter = data.values().payment == payment;
        }

        if (
            new Date(data.values().order_date) >= new Date(date1) &&
            new Date(data.values().order_date) <= new Date(date2)
        ) {
            dateFilter = true;
        } else {
            dateFilter = false;
        }

        if (statusFilter && paymentFilter && dateFilter) {
            return statusFilter && paymentFilter && dateFilter;
        } else if (statusFilter && paymentFilter && pickerVal == "") {
            return statusFilter && paymentFilter;
        } else if (paymentFilter && dateFilter && pickerVal == "") {
            return paymentFilter && dateFilter;
        }
    });
    orderList.update();
}

function clearFields() {
    idField.value = "";
    customerNameField.value = "";
    productNameField.value = "";
    createDateField.value = "";
    deliveryDateField.value = "";
    amountField.value = "";
    paymentField.value = "";

    var createDField = flatpickr("#createdate-field");
    createDField.clear();

    var deliveryDField = flatpickr("#deliverydate-field");
    deliveryDField.clear();

    if (paymentVal) paymentVal.destroy();
    paymentVal = new Choices(paymentField);

    if (productnameVal) productnameVal.destroy();
    productnameVal = new Choices(productNameField);

    if (statusVal) statusVal.destroy();
    statusVal = new Choices(statusField);
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