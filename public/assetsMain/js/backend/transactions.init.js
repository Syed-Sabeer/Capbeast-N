var perPage = 10;
var editlist = false;

var options = {
    valueNames: [
        "id",
        "vatId",
        "clientName",
        "cleintEmail",
        "type",
        "transactionID",
        "amount",        
        "paymentMethod",
        "transactionDate",    
        "status"
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


var transactionsList = new List("transactionsList", options).on("updated", function (list) {
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
    clientNameField = document.getElementById("clientName-field"),
    clientEmailField = document.getElementById("cleintEmail-field"),
    typeField = document.getElementById("type-field"),
    transactionIDField = document.getElementById("transactionID-field"),
    vatField = document.getElementById("vatID-field"),
    amountField = document.getElementById("amount-field"),
    paymentMethodField = document.getElementById("paymentMethod-field"),
    transactionDateField = document.getElementById("transactionDate-field"),  
    statusField = document.getElementById("statusSelect"),
    addBtn = document.getElementById("add-btn"),
    viewBtns = document.getElementsByClassName("view-item-btn"),
    editBtn = document.getElementById("edit-btn");

refreshCallbacks();


var typeVal = new Choices(typeField,{
    searchEnabled: false,
});
var statusVal = new Choices(statusField,{
    searchEnabled: false,
});



const values = [
    {
        value: 'American Express',
        label: '<img src="../assets/images/ecommerce/payment/american-express.png" class="avatar-xxs me-1"/> American Express',
        id: 1
    },
    {
        value: 'PayPal',
        label: '<img src="../assets/images/ecommerce/payment/paypal.png" class="avatar-xxs me-1"/> American PayPal',
        id: 2
    },
    {
        value: 'Discover',
        label: '<img src="../assets/images/ecommerce/payment/discover.png" class="avatar-xxs me-1"/> Discover',
        id: 3
    },
    {
        value: 'Visa Credit/Debit',
        label: '<img src="../assets/images/ecommerce/payment/visa.png" class="avatar-xxs me-1"/> Visa Credit/Debit',
        id: 4
    }
]
  
var paymentElement = document.querySelector('#paymentMethod-field');
var paymentMethodVal = new Choices(paymentElement, {
choices: values,
searchEnabled: false,
});


//Add Transaction
var count = 11;
var forms = document.querySelectorAll('.tablelist-form')
Array.prototype.slice.call(forms).forEach(function (form) {
    form.addEventListener('submit', function (event) {
        event.preventDefault();

        var errorMsg = document.getElementById("alert-error-msg");
        errorMsg.classList.remove("d-none");

        setTimeout(() => errorMsg.classList.add("d-none"), 2000);

        var text;
        var validRegex = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;

        if (clientNameField.value == "") {
            text = "Please enter Client name";
            errorMsg.innerHTML = text;
            return false;
        }else if (!clientEmailField.value.match(validRegex)) {
            text = "Please enter valid email address";
            errorMsg.innerHTML = text;
            return false;
        }else if (typeField.value == "") {
            text = "Please select a type";
            errorMsg.innerHTML = text;
            return false;
        }else if (transactionIDField.value == "") {
            text = "Please enter a transaction ID";
            errorMsg.innerHTML = text;
            return false;
        }else if (vatField.value == "") {
            text = "Please enter Vat ID";
            errorMsg.innerHTML = text;
            return false;
        }else if (amountField.value == "") {
            text = "Please select a type";
            errorMsg.innerHTML = text;
            return false;
        }else if (paymentMethodField.value == "") {
            text = "Please Select Payment Method";
            errorMsg.innerHTML = text;
            return false;
        }else if (transactionDateField.value == "") {
            text = "Please select transaction date";
            errorMsg.innerHTML = text;
            return false;    
        }else if (statusField.value == "") {
            text = "Please select transaction";
            errorMsg.innerHTML = text;
            return false;
        }

        if (
            clientNameField.value !== "" &&
            clientEmailField.value !== "" &&            
            typeField.value !== "" &&
            transactionIDField.value !== "" &&
            vatField.value !== "" &&            
            amountField.value !== "" &&
            paymentMethodField.value !== "" &&
            transactionDateField.value !== "" &&            
            statusField.value !== "" && !editlist
        )
        {
            transactionsList.add({
                id: `<a href="javascript:void(0);" class="fw-medium link-primary">${count}</a>`,
                clientName : clientNameField.value,
                cleintEmail: clientEmailField.value,
                type:isTypeIcon(typeField.value),
                transactionID:`<a href="#!" class="fw-medium">${transactionIDField.value}</a>`,
                vatId : vatField.value,
                amount : amountField.value,
                paymentMethod: isPaymentMethod(paymentMethodField.value) ,   
                transactionDate: transactionDateField.value,
                status: isStatus(statusField.value)
            });
            transactionsList.sort('id', { order: "desc" });
            document.getElementById("alert-error-msg").classList.add("d-none");
            document.getElementById("close-modal").click();
            clearFields();
            refreshCallbacks();
            count++;
            Swal.fire({
                position: 'center',
                icon: 'success',
                title: 'Transaction added successfully!',
                showConfirmButton: false,
                timer: 2000,
                showCloseButton: true
            });
        }
        
        return true;
    })
}
);

//load json records
const xhttp = new XMLHttpRequest();
xhttp.onload = function () {
    var json_records = JSON.parse(this.responseText);  
        Array.from(json_records).forEach(function (element) {
            transactionsList.add({                
            id: `<a href="javascript:void(0);" class="fw-medium link-primary">#TB${element.id}</a>`,
            vatId: element.vatId,
            clientName:  element.clientName,
            cleintEmail:  element.cleintEmail,
            type:isTypeIcon(element.type),
            transactionID : `<a href="#!" class="fw-medium">${element.transactionID}</a>`,
            amount : element.amount,
            paymentMethod: '<div class="d-flex align-items-center gap-2">\
                            <div class="flex-shrink-0">\
                                <img src="'+element.paymentMethod[0]+'" alt="" class="avatar-xs object-fit-cover paycard-image">\
                            </div>\
                            <div class="flex-grow-1">\
                                <h6 class="mb-0 paycard">'+element.paymentMethod[1] +'</h6>\
                            </div>\
                        </div>',                    
            transactionDate: element.transactionDate,         
            status: isStatus(element.status)
            });
            transactionsList.sort('id', { order: "desc" });
            refreshCallbacks();
        });
    
    transactionsList.remove("id", `<a href="javascript:void(0);" class="fw-medium link-primary">#TB01</a>`);
}
xhttp.open("GET", "../assets/json/transactions-list.json");
xhttp.send();


function refreshCallbacks() {
    
    //View button
    if(viewBtns){
    Array.from(viewBtns).forEach(function (btn) {        
        btn.addEventListener("click", function (e) {
            e.target.closest("tr").children[0].innerText;
            itemId = e.target.closest("tr").children[0].innerText;
            
            var itemValues = transactionsList.get({
                id: itemId,
            });
            Array.from(itemValues).forEach(function (x) {
                isid = new DOMParser().parseFromString(x._values.id, "text/html");
                var selectedid = isid.body.firstElementChild.innerHTML;
                var isTransID = new DOMParser().parseFromString(x._values.transactionID, "text/html");
                var isTransIDVal = isTransID.body.firstElementChild.innerHTML;   
                var isPaymethod = new DOMParser().parseFromString(x._values.paymentMethod, "text/html");
                var payCardimg = isPaymethod.body.querySelector(".paycard-image").src;
                var payCard = isPaymethod.body.querySelector(".paycard").innerHTML;  
                if (selectedid == itemId) {
                    var codeBlock = `<div class="table-responsive table-card">
                        <table class="table table-borderless align-middle">
                            <tr>
                                <td style="width: 150px;">
                                    <span class="text-muted text-uppercase">Transaction ID</span>
                                </td>
                                <td>
                                    <span class="fw-semibold">${isTransIDVal}</span>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <span class="text-muted text-uppercase">Date</span>
                                </td>
                                <td>
                                    <span class="fw-semibold">${x._values.transactionDate}</span>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <span class="text-muted text-uppercase">VAT ID:</span>
                                </td>
                                <td>
                                    <span class="fw-semibold">${x._values.vatId}</span>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <span class="text-muted text-uppercase">Client Name</span>
                                </td>
                                <td>
                                    <span class="fw-semibold">${x._values.clientName}</span>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <span class="text-muted text-uppercase">Email ID</span>
                                </td>
                                <td>
                                    <div class="fw-semibold">${x._values.cleintEmail}</div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <span class="text-muted text-uppercase">Amount</span>
                                </td>
                                <td>
                                    <span class="fw-semibold">${x._values.amount}</span>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <span class="text-muted text-uppercase">Payment Method</span>
                                </td>
                                <td>
                                    <div class="d-flex align-items-center gap-2">
                                        <div class="flex-shrink-0">
                                            <img src="${payCardimg}" alt="" class="avatar-xs object-fit-cover">
                                        </div>
                                        <div class="flex-grow-1">
                                            <h6 class="mb-0">${payCard}</h6>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <span class="text-muted text-uppercase">Status</span>
                                </td>
                                <td>
                                    ${x._values.status}
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div class="mt-3 hstack gap-2">
                        <button type="button" class="btn btn-soft-danger w-100">Download Receipt</button>
                        <button type="button" class="btn btn-soft-secondary w-100">All Statement</button>
                    </div>`;
                    document.getElementById('transactionDetails').innerHTML = codeBlock;
                }
            });
        });
    });
}
};

function isTypeIcon(val) {
    switch (val) {
        case "up":
            return (
                '<i class="bx bx-trending-' + val + ' align-middle text-success"></i>'
            );
            
        case "down":
            return (
                '<i class="bx bx-trending-' + val + ' align-middle text-danger"></i>'
        );     
    }
}

function isStatus(val) {
    switch (val) {
        case "Successful":
            return (
                '<span class="badge bg-success-subtle text-success ">' +
                val +
                "</span>"
            );
        case "Pending":
            return (
                '<span class="badge bg-warning-subtle text-warning ">' +
                val +
                "</span>"
        );     
        case "Denied":
            return (
                '<span class="badge bg-danger-subtle text-danger ">' +
                val +
                "</span>"
        );  
    }
}

function isPaymentMethod(value){
    switch(value){
        case "American Express":
            return(
                `<div class="d-flex align-items-center gap-2">
                    <div class="flex-shrink-0">
                        <img src="../assets/images/ecommerce/payment/american-express.png" alt="" class="avatar-xs object-fit-cover paycard-image">
                    </div>
                    <div class="flex-grow-1">
                        <h6 class="mb-0 paycard">${value}</h6>
                    </div>
                </div>`
            )
        case "PayPal":
            return(
                `<div class="d-flex align-items-center gap-2">
                    <div class="flex-shrink-0">
                        <img src="../assets/images/ecommerce/payment/paypal.png" alt="" class="avatar-xs object-fit-cover paycard-image">
                    </div>
                    <div class="flex-grow-1">
                        <h6 class="mb-0 paycard">${value}</h6>
                    </div>
                </div>`
            )     
        case "Discover":
            return(
                `<div class="d-flex align-items-center gap-2">
                    <div class="flex-shrink-0">
                        <img src="../assets/images/ecommerce/payment/discover.png" alt="" class="avatar-xs object-fit-cover paycard-image">
                    </div>
                    <div class="flex-grow-1">
                        <h6 class="mb-0 paycard">${value}</h6>
                    </div>
                </div>`
            ) 
        case "Visa Credit/Debit":
            return(
                `<div class="d-flex align-items-center gap-2">
                    <div class="flex-shrink-0">
                        <img src="../assets/images/ecommerce/payment/visa.png" alt="" class="avatar-xs object-fit-cover paycard-image">
                    </div>
                    <div class="flex-grow-1">
                        <h6 class="mb-0 paycard">${value}</h6>
                    </div>
                </div>`
            )          
    }
}

function clearFields() {
    clientNameField.value = "";
    clientEmailField.value = "";
    transactionIDField.value = "";
    vatField.value = "";
    amountField.value = "";
    transactionDateField.value = "";

    if (typeVal) typeVal.destroy();
    typeVal = new Choices(typeField);

    if (statusVal) statusVal.destroy();
    statusVal = new Choices(statusField);

    if (paymentMethodVal) paymentMethodVal.destroy();
    paymentMethodVal = new Choices(paymentElement, {
        choices: values,
        searchEnabled: false,
     });
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


function filterData() {
    var isstatus = document.getElementById("idStatus").value;
    var pickerVal = document.getElementById("demo-datepicker").value;

    var date1 = pickerVal.split(" to ")[0];
    var date2 = pickerVal.split(" to ")[1];

    transactionsList.filter(function (data) {
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
            new Date(data.values().transactionDate) >= new Date(date1) &&
            new Date(data.values().transactionDate) <= new Date(date2)
        ) {
            dateFilter = true;
        } else {
            dateFilter = false;
        }

        if (statusFilter && dateFilter) {
            return statusFilter && dateFilter;
        } else if (statusFilter &&  pickerVal == "") {
            return statusFilter;
        } else if (dateFilter && pickerVal !== "") {
            return  dateFilter;
        }
    });
    transactionsList.update();
}