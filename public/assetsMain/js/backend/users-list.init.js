



var perPage = 10;
var editlist = false;

var options = {
    valueNames: [
        "id",
        "user_name",
        "email_id",
        "date",        
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


var usersList = new List("usersList", options).on("updated", function (list) {
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
    usersImg = document.getElementById("users-img-field"),
    userNameField = document.getElementById("user-name-field"),    
    emailField = document.getElementById("email-field"),
    dateField = document.getElementById("date-field"),
    accountStatusField = document.getElementById("account-status-field"),    
    addBtn = document.getElementById("add-btn")
    editBtn = document.getElementById("edit-btn")
    editBtns = document.getElementsByClassName("edit-item-btn");
    removeBtns = document.getElementsByClassName("remove-item-btn")

refreshCallbacks();    

var accountStatusVal = new Choices(accountStatusField, {
    searchEnabled: false
});
document.getElementById("showModal").addEventListener("show.bs.modal", function (e) {
    if (e.relatedTarget.classList.contains("edit-item-btn")) {        
        document.getElementById("exampleModalLabel").innerHTML = "Edit User";
        document.getElementById("showModal").querySelector(".modal-footer").style.display = "block";
        document.getElementById("add-btn").innerHTML = "Update";
    } else if (e.relatedTarget.classList.contains("add-btn")) {
        document.getElementById("exampleModalLabel").innerHTML = "Add User";
        document.getElementById("showModal").querySelector(".modal-footer").style.display = "block";
        document.getElementById("add-btn").innerHTML = "Add User";
    } else {
        document.getElementById("exampleModalLabel").innerHTML = "List User";
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
                var itemValues = usersList.get({
                    id: itemId,
                });
    
                Array.from(itemValues).forEach(function (x) {
                    deleteid = new DOMParser().parseFromString(x._values.id, "text/html");
                    
                    var isElem = deleteid.body.firstElementChild;
                    var isdeleteid = deleteid.body.firstElementChild.innerHTML;
    
                    if (isdeleteid == itemId) {
                        document.getElementById("delete-record").addEventListener("click", function () {
                            usersList.remove("id", isElem.outerHTML);
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
                var itemValues = usersList.get({
                    id: itemId,
                });

                Array.from(itemValues).forEach(function (x) {
                    isid = new DOMParser().parseFromString(x._values.id, "text/html");
                    var selectedid = isid.body.firstElementChild.innerHTML;
                    if (selectedid == itemId) {
                        editlist = true;
                        idField.value = selectedid;

                        var userName = new DOMParser().parseFromString(x._values.user_name, "text/html");
                        
                        var userImgVal = userName.body.querySelector(".user-profile-img").src;
                        usersImg.src = userImgVal;

                        var userNameVal = userName.body.querySelector(".user_name").innerHTML;
                        userNameField.value = userNameVal;

                        emailField.value = x._values.email_id;                        
                        dateField.value = x._values.date;                       

                        
                        // statusVal
                        if (accountStatusVal) accountStatusVal.destroy();
                        accountStatusVal = new Choices(accountStatusField, {
                            searchEnabled: false
                        });
                        val = new DOMParser().parseFromString(x._values.status, "text/html");
                        var statusSelec = val.body.firstElementChild.innerHTML;
                        accountStatusVal.setChoiceByValue(statusSelec);

                        flatpickr("#date-field", {
                            dateFormat: "d M, Y",
                            defaultDate: x._values.date,
                        });
                        
                    }
                });
            });
        });
    };
};


//Add User

var count = 11;
var forms = document.querySelectorAll('.tablelist-form')
Array.prototype.slice.call(forms).forEach(function (form) {
    form.addEventListener('submit', function (event) {

        event.preventDefault();

        var errorMsg = document.getElementById("alert-error-msg");
        errorMsg.classList.remove("d-none");

        setTimeout(() => errorMsg.classList.add("d-none"), 2000);

        var text;

        if (userNameField.value == "") {
            text = "Please enter User name";
            errorMsg.innerHTML = text;
            return false;
        }else if (emailField.value == "") {
            text = "Please enter User email";
            errorMsg.innerHTML = text;
            return false;
        }else if (dateField.value == "") {
            text = "Please select a date";
            errorMsg.innerHTML = text;
            return false;
        }else if (accountStatusField.value == "") {
            text = "Please select a account status";
            errorMsg.innerHTML = text;
            return false;
        }


        if (
            userNameField.value !== "" &&
            emailField.value !== "" &&            
            dateField.value !== "" &&
            accountStatusField.value !== "" && !editlist
        )
        {
            usersList.add({
               id: `<a href="javascript:void(0);" class="fw-medium link-primary">${count}</a>`,
                user_name: '<div class="d-flex align-items-center gap-2">\
                <div class="flex-shrink-0"><img src="'+usersImg.src+'" alt="" class="avatar-xs rounded-circle user-profile-img"></div>\
                <div class="flex-grow-1 ms-2 user_name">'+userNameField.value+'</div>\
                </div>',  
                email_id: emailField.value,
                date: dateField.value,
                status: isStatus(accountStatusField.value)
            });
            usersList.sort('id', { order: "desc" });
            document.getElementById("alert-error-msg").classList.add("d-none");
            document.getElementById("close-modal").click();
            clearFields();
            refreshCallbacks();
            count++;
            Swal.fire({
                position: 'center',
                icon: 'success',
                title: 'User added successfully!',
                showConfirmButton: false,
                timer: 2000,
                showCloseButton: true
            });
        }
         else if (
            userNameField.value !== "" &&
            emailField.value !== "" &&            
            dateField.value !== "" &&
            accountStatusField.value !== "" && editlist
        ) {
            var editValues = usersList.get({
                id: idField.value,
            });

            Array.from(editValues).forEach(function (x) {
                isid = new DOMParser().parseFromString(x._values.id, "text/html");
                var selectedid = isid.body.firstElementChild.innerHTML;
                if (selectedid == itemId) {
                    x.values({
                        id: '<a href="javascript:void(0);" class="fw-medium link-primary">' + idField.value + "</a>",
                        user_name: '<div class="d-flex align-items-center gap-2">\
                        <div class="flex-shrink-0"><img src="'+usersImg.src+'" alt="" class="avatar-xs rounded-circle user-profile-img"></div>\
                        <div class="flex-grow-1 ms-2 user_name">'+userNameField.value+'</div>\
                        </div>', 
                        email_id: emailField.value,
                        date: dateField.value,                        
                        status: isStatus(accountStatusField.value),
                    });
                }
            });
            document.getElementById("alert-error-msg").classList.add("d-none");
            document.getElementById("close-modal").click();
            clearFields();
            Swal.fire({
                position: 'center',
                icon: 'success',
                title: 'User updated Successfully!',
                showConfirmButton: false,
                timer: 2000,
                showCloseButton: true
            });
        }
        return true;
    })
}
);


const xhttp = new XMLHttpRequest();
xhttp.onload = function () {
    var json_records = JSON.parse(this.responseText);    
   
        Array.from(json_records).forEach(function (element) {
            
            usersList.add({
            id: `<a href="javascript:void(0);" class="fw-medium link-primary">#VZ${element.id}</a>`,
            user_name: '<div class="d-flex align-items-center gap-2">\
            <div class="flex-shrink-0"><img src="'+element.user_name[0]+'" alt="" class="avatar-xs rounded-circle user-profile-img"></div>\
            <div class="flex-grow-1 ms-2 user_name">'+element.user_name[1]+'</div>\
            </div>',            
            // user_name: element.user_name,            
            email_id: element.email_id,
            date: element.date,           
            status: isStatus(element.status)
            });
            usersList.sort('id', { order: "desc" });
            refreshCallbacks();
        });
    
    usersList.remove("id", `<a href="javascript:void(0);" class="fw-medium link-primary">#VZ001</a>`);
}
xhttp.open("GET", "../assets/json/users-list.json");
xhttp.send();

isCount = new DOMParser().parseFromString(
    usersList.items.slice(-1)[0]._values.id,
    "text/html"
);

var isValue = isCount.body.firstElementChild.innerHTML;

function isStatus(val) {
    switch (val) {
        case "Active":
            return (
                '<span class="badge bg-success-subtle text-success ">' +
                val +
                "</span>"
            );
        case "Inactive":
            return (
                '<span class="badge bg-danger-subtle text-danger ">' +
                val +
                "</span>"
            );       
    }
}

function clearFields() {
    userNameField.value = "";
    emailField.value = "";
    dateField.value = "";
    accountStatusField.value = "";

    if (accountStatusVal) accountStatusVal.destroy();
    accountStatusVal = new Choices(accountStatusField);

    document.getElementById("users-img-field").src = "../assets/images/users/user-dummy-img.jpg";

    document.getElementById("users-image-input").value = "";
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

// brandLogo image
document.querySelector("#users-image-input").addEventListener("change", function () {
    var preview = document.querySelector("#users-img-field");
    var file = document.querySelector("#users-image-input").files[0];
    var reader = new FileReader();
    reader.addEventListener("load", function () {
        preview.src = reader.result;
    }, false);
    if (file) {
        reader.readAsDataURL(file);
    }
});