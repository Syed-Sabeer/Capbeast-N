

var perPage = 10;
var editlist = false;

var options = {
    valueNames: [
        "id",
        "discount",
        "couponTitle",
        "code",        
        "productType",
        "startDate",
        "endDate",        
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


var couponsList = new List("couponsList", options).on("updated", function (list) {
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


//load json records
const xhttp = new XMLHttpRequest();
xhttp.onload = function () {
    var json_records = JSON.parse(this.responseText);  
        Array.from(json_records).forEach(function (element) {
            couponsList.add({
            id: `<a href="javascript:void(0);" class="fw-medium link-primary">#TB${element.id}</a>`,
            discount: `<h5 class="mb-0 fs-16">${element.discount}</h5>`,         
            couponTitle: element.couponTitle,
            code: element.code,         
            startDate: element.startDate,
            endDate: element.endDate,
            productType:isProductType(element.productType),
            status: isStatus(element.status),
            });
            couponsList.sort('id', { order: "desc" });
            refreshCallbacks();
        });
    
        couponsList.remove("id", `<a href="javascript:void(0);" class="fw-medium link-primary">#TB01</a>`);
}
xhttp.open("GET", "../assets/json/coupons-list.json");
xhttp.send();

var idField = document.getElementById("id-field"),
couponTitleField = document.getElementById("couponTitle-field"),
codeField = document.getElementById("code-field"),
productTypeField = document.getElementById("productType-field"),
startDateField = document.getElementById("startdate-field"),
endDateField = document.getElementById("enddate-field"),
discountField = document.getElementById("discount-field"),
statusField = document.getElementById("status-Field")
addBtn = document.getElementById("add-btn")
editBtn = document.getElementById("edit-btn"),
removeBtns = document.getElementsByClassName("remove-item-btn"),
viewBtns = document.getElementsByClassName("view-item-btn"),
editBtns = document.getElementsByClassName("edit-item-btn");

refreshCallbacks();

var productTypeVal = new Choices(productTypeField)
var statusVal = new Choices(statusField);

document.getElementById("showModal").addEventListener("show.bs.modal", function (e) {
    if (e.relatedTarget.classList.contains("edit-item-btn")) {
        document.getElementById("exampleModalLabel").innerHTML = "Update Coupon";
        document.getElementById("showModal").querySelector(".modal-footer").style.display = "block";
        document.getElementById("add-btn").innerHTML = "Update Coupon";
    } else if (e.relatedTarget.classList.contains("add-btn")) {
        document.getElementById("exampleModalLabel").innerHTML = "Add Coupen";
        document.getElementById("showModal").querySelector(".modal-footer").style.display = "block";
        document.getElementById("add-btn").innerHTML = "Add Coupen";
    } else {
        document.getElementById("exampleModalLabel").innerHTML = "List Order";
        document.getElementById("showModal").querySelector(".modal-footer").style.display = "none";
    }
});

//Add Coupon
var count = 13;
var forms = document.querySelectorAll('.tablelist-form')
Array.prototype.slice.call(forms).forEach(function (form) {
    form.addEventListener('submit', function (event) {
        
        event.preventDefault();

        var errorMsg = document.getElementById("alert-error-msg");
        errorMsg.classList.remove("d-none");

        setTimeout(() => errorMsg.classList.add("d-none"), 2000);

        var text;

        if (couponTitleField.value == "") {
            text = "Please enter a coupon title";
            errorMsg.innerHTML = text;
            return false;
        }else if (codeField.value == "") {
            text = "Please enter a code";
            errorMsg.innerHTML = text;
            return false;
        }else if (productTypeField.value == "") {
            text = "Please select a product type";
            errorMsg.innerHTML = text;
            return false;
        }else if (startDateField.value == "") {
            text = "Please select a start date";
            errorMsg.innerHTML = text;
            return false;
        }else if (endDateField.value == "") {
            text = "Please select a end date";
            errorMsg.innerHTML = text;
            return false;
        }else if (discountField.value == "") {
            text = "Please enter discount";
            errorMsg.innerHTML = text;
            return false;
        }else if (statusField.value == "") {
            text = "Please select a delivery status";
            errorMsg.innerHTML = text;
            return false;
        }


        if (
            couponTitleField.value !== "" &&
            codeField.value !== "" &&
            productTypeField.value !== "" &&            
            startDateField.value !== "" &&
            endDateField.value !== "" && 
            discountField.value !== "" &&
            statusField.value !== "" && !editlist
        ) {
            couponsList.add({
                id: '<a href="javascript:void(0);" class="fw-medium link-primary">#TB' + count + "</a>",
                couponTitle: couponTitleField.value,
                code: codeField.value,
                productType: productTypeField.value,
                startDate: startDateField.value,
                endDate: endDateField.value,
                discount: `<h5 class="mb-0 fs-16">${discountField.value}</h5>`,
                status: isStatus(statusField.value),
            });
            couponsList.sort('id', { order: "desc" });
            document.getElementById("alert-error-msg").classList.add("d-none");
            document.getElementById("close-modal").click();
            clearFields();
            refreshCallbacks();
            count++;
            Swal.fire({
                position: 'center',
                icon: 'success',
                title: 'Coupon added successfully!',
                showConfirmButton: false,
                timer: 2000,
                showCloseButton: true
            });
        } else if (
            couponTitleField.value !== "" &&
            codeField.value !== "" &&
            productTypeField.value !== "" &&
            startDateField.value !== "" &&
            endDateField.value !== "" && statusField.value !== "" &&
            discountField.value !== "" && editlist
        ) {
            var editValues = couponsList.get({
                id: idField.value,
            });
            Array.from(editValues).forEach(function (x) {
                isid = new DOMParser().parseFromString(x._values.id, "text/html");
                var selectedid = isid.body.firstElementChild.innerHTML;
                if (selectedid == itemId) {
                    x.values({                        
                        id: '<a href="javascript:void(0);" class="fw-medium link-primary">#TB' + idField.value + "</a>",
                        couponTitle: couponTitleField.value,
                        code: codeField.value,
                        productType: productTypeField.value,
                        startDate: startDateField.value,
                        endDate: endDateField.value,
                        discount: `<h5 class="mb-0 fs-16">${discountField.value}</h5>`,
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

function refreshCallbacks() {
    if (removeBtns){        
        Array.from(removeBtns).forEach(function (btn) {                        
            btn.addEventListener("click", function (e) {
                e.target.closest("tr").children[0].innerText;
                itemId = e.target.closest("tr").children[0].innerText;
                var itemValues = couponsList.get({
                    id: itemId,
                });                
                

                Array.from(itemValues).forEach(function (x) {
                    deleteid = new DOMParser().parseFromString(x._values.id, "text/html");
                    
                    var isElem = deleteid.body.firstElementChild;
                    var isdeleteid = deleteid.body.firstElementChild.innerHTML; 
                    if (isdeleteid == itemId) {                        
                        document.getElementById("delete-record").addEventListener("click", function () {
                            
                            couponsList.remove("id", isElem.outerHTML);
                            document.getElementById("deleteRecord-close").click();
                            Swal.fire({
                                position: 'center',
                                icon: 'success',
                                title: 'Coupon deleted successfully!',
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
                var itemValues = couponsList.get({
                    id: itemId,
                });

                Array.from(itemValues).forEach(function (x) {
                    isid = new DOMParser().parseFromString(x._values.id, "text/html");
                    var selectedid = isid.body.firstElementChild.innerHTML;
                    
                    if (selectedid == itemId) {
                        editlist = true;
                        idField.value = selectedid;
                        couponTitleField.value = x._values.couponTitle;
                        codeField.value = x._values.code;

                        //discount 
                        discountVal =  new DOMParser().parseFromString(x._values.discount, "text/html");
                        discountField.value = discountVal.body.firstElementChild.innerHTML


                        // statusVal
                        if (statusVal) statusVal.destroy();
                        statusVal = new Choices(statusField, {
                            searchEnabled: false
                        });
                        val = new DOMParser().parseFromString(x._values.status, "text/html");
                        var statusSelec = val.body.firstElementChild.innerHTML;
                        statusVal.setChoiceByValue(statusSelec);       
                        


                        // productnameVal
                        if (productTypeVal) productTypeVal.destroy();
                        productTypeVal = new Choices(productTypeField, {
                            searchEnabled: false,
                        });
                        var selectedproduct = x._values.productType;
                        productTypeVal.setChoiceByValue(selectedproduct);

                        flatpickr("#startdate-field", {
                            dateFormat: "d M, Y",
                            defaultDate: x._values.startDate,
                        });

                        flatpickr("#enddate-field", {
                            dateFormat: "d M, Y",
                            defaultDate: x._values.endDate,
                        });
                    }
                });
            });
        });
    };


    //View button
    if(viewBtns){
    Array.from(viewBtns).forEach(function (btn) {
        btn.addEventListener("click", function (e) {
           
            e.target.closest("tr").children[0].innerText;
            itemId = e.target.closest("tr").children[0].innerText;
            var itemValues = couponsList.get({
                id: itemId,
            });

            Array.from(itemValues).forEach(function (x) {
                isid = new DOMParser().parseFromString(x._values.id, "text/html");                
                var selectedid = isid.body.firstElementChild.innerHTML;
                console.log("isid",selectedid)
                if (selectedid == itemId) {
                    var codeBlock = `
                <div class="offcanvas-header bg-warning-subtle">
                        <h5 class="offcanvas-title" id="couponDetails">${x._values.couponTitle}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                    </div>
                <div class="offcanvas-body">
                <div>
                    <img src="../assets/images/ecommerce/offer-banner.jpg" alt="" class="img-thumbnail">
                </div>
                <div class="mt-3">
                    <div class="table-responsive">
                        <table class="table table-borderless">
                            <tr>
                                <td><span class="text-muted">Use Code</span></td>
                                <td><span class="fw-medium">${x._values.code}</span></td>
                            </tr>
                            <tr>
                                <td><span class="text-muted">Discount</span></td>
                                <td><span class="fw-medium text-uppercase">${new DOMParser().parseFromString(x._values.discount, "text/html").body.firstElementChild.innerHTML}</span></td>
                            </tr>
                            <tr>
                                <td><span class="text-muted">Start Date</span></td>
                                <td><span class="fw-medium">09 Dec, 2022</span></td>
                            </tr>
                            <tr>
                                <td><span class="text-muted">END Date</span></td>
                                <td><span class="fw-medium">${x._values.endDate}</span></td>
                            </tr>
                            <tr>
                                <td><span class="text-muted">Product Type</span></td>
                                <td><span class="fw-medium">${x._values.productType}</span></td>
                            </tr>
                            <tr>
                                <td><span class="text-muted">Status</span></td>
                                <td>${x._values.status}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>`;
                    document.getElementById('couponDetails').innerHTML = codeBlock;
                }

            });
        });
    });
}
};

function isStatus(val) {
    switch (val) {
        case "Active":
            return (
                '<span class="badge bg-success-subtle text-success  text-uppercase">' +
                val +
                "</span>"
         );
        case "Expired":
            return (
                '<span class="badge bg-danger-subtle text-danger  text-uppercase">' +
                val +
                "</span>"
            );
    }
}

function isProductType(val) {
    switch (val) {
        case "Headphones":
            return (               
                val                
            );
        case "Watch":
            return (                
                val                
            );
        case "Furniture":
            return (               
                val                
            );
        case "Clothing":
            return (                
                val                
            );    
        case "Footwear":
            return (                
                val                
            );   
        case "Lighting":
            return (                
                val                
            );     
        case "Beauty & Personal Care":
            return (                
                val                
            );   
        case "Books":
            return (                
                val                
        );
        case "Other Accessories":
            return (                
                val                
        );                                                 
    }
}

function clearFields() {
    couponTitleField.value = "";
    codeField.value = "";
    startDateField.value = "";
    endDateField.value = "";
    discountField.value = "";

    if (productTypeVal) productTypeVal.destroy();
    productTypeVal = new Choices(productTypeField);

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