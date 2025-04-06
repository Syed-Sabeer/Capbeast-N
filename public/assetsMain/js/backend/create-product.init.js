/*
Template Name: Toner eCommerce + Admin HTML Template
Author: Themesbrand
Version: 1.2.0
Website: https://Themesbrand.com/
Contact: Themesbrand@gmail.com
File: Create Product init File
*/

ClassicEditor
    .create(document.querySelector('#ckeditor-classic'))
    .then(function (editor) {
        editor.ui.view.editable.element.style.height = '200px';
    })
    .catch(function (error) {
        console.error(error);
    });

var thumbnailArray = [];

// Dropzone has been added as a global variable.

var myDropzone = new Dropzone("div.my-dropzone", { 
    url: "/file/post",
    addRemoveLinks: true,
    removedfile: function (file) {
        file.previewElement.remove();

        thumbnailArray = [];
    },
});

myDropzone.on("thumbnail", function (file, dataUrl) {
    thumbnailArray.push(dataUrl);
});
var mockFile = { name: "Existing file!", size: 12345 };

// choices category input
var productCategoryInput = new Choices('#choices-category-input', {
    searchEnabled: false,
});

var editinputValueJson = sessionStorage.getItem('editInputValue');
if (editinputValueJson) {
    var editinputValueJson = JSON.parse(editinputValueJson);
    document.getElementById("formAction").value = "edit";
    document.getElementById("product-id-input").value = editinputValueJson.id;
    productCategoryInput.setChoiceByValue(editinputValueJson.category);
    myDropzone.options.addedfile.call(myDropzone, mockFile);
    myDropzone.options.thumbnail.call(myDropzone, mockFile, editinputValueJson.productImg);
    thumbnailArray.push(editinputValueJson.productImg)
    document.getElementById("product-title-input").value = editinputValueJson.productTitle;
    document.getElementById("stocks-input").value = editinputValueJson.stock;
    document.getElementById("product-price-input").value = editinputValueJson.price;
    document.getElementById("product-discount-input").value = editinputValueJson.discount;
    document.getElementById("orders-input").value = editinputValueJson.orders;
    
    // clothe-colors
    Array.from(document.querySelectorAll(".clothe-colors li")).forEach(function (subElem) {
        var nameelem = subElem.querySelector('[type="checkbox"]');
        editinputValueJson.color.map(function(subItem){
            if (subItem == nameelem.value) {
                nameelem.setAttribute("checked", "checked");
            }
        })
    })

    // clothe-size
    Array.from(document.querySelectorAll(".clothe-size li")).forEach(function (subElem) {
        var nameelem = subElem.querySelector('[type="checkbox"]');
        if(editinputValueJson.size){
            editinputValueJson.size.map(function(subItem){
                if (subItem == nameelem.value) {
                    nameelem.setAttribute("checked", "checked");
                }
            })
        }
    })
}

var forms = document.querySelectorAll('.needs-validation')
// date & time
var date = new Date().toUTCString().slice(5, 16);

var itemid = 13;
var colorsArray = [];
var sizesArray = [];

Array.prototype.slice.call(forms).forEach(function (form) {
    form.addEventListener('submit', function (event) {
        if (!form.checkValidity()) {
            event.preventDefault();
            event.stopPropagation();
        } else {
            event.preventDefault();
            var productItemID = itemid;
            var productTitleValue = document.getElementById("product-title-input").value;
            var productCategoryValue = productCategoryInput.getValue(true);
            var stockInputValue = document.getElementById("stocks-input").value;
            var orderValue = document.getElementById("orders-input").value;
            var productPriceValue = document.getElementById("product-price-input").value;
            var productDiscountVal = document.getElementById("product-discount-input").value;

            // clothe-colors
            document.querySelectorAll(".clothe-colors li").forEach(function (item) {
                if (item.querySelector("input").checked == true) {
                    var colorListVal = item.querySelector("input").value;
                    colorsArray.push(colorListVal)
                }
            });

            // clothe-size
            document.querySelectorAll(".clothe-size li").forEach(function (item) {
                if (item.querySelector("input").checked == true) {
                    var sizeListVal = item.querySelector("input").value;
                    sizesArray.push(sizeListVal)
                }
            });

            var formAction = document.getElementById("formAction").value;
            if (formAction == "add" && productCategoryValue !== "" && thumbnailArray.length > 0) {
                if (sessionStorage.getItem('inputValue') != null) {
                    var inputValueJson = JSON.parse(sessionStorage.getItem('inputValue'));
                    var newObj = {
                        "id": productItemID + 1,
                        "productImg": thumbnailArray[0],
                        "productTitle": productTitleValue,
                        "category": productCategoryValue,
                        "price": productPriceValue,
                        "discount": productDiscountVal,
                        "rating": "--",
                        "color": colorsArray,
                        "size": sizesArray,
                        "stock": stockInputValue,
                        "orders": orderValue,
                        "publish": date,
                    };
                    inputValueJson.push(newObj);
                    sessionStorage.setItem('inputValue', JSON.stringify(inputValueJson));
                } else {
                    var inputValueJson = [];
                    var newObj = {
                        'id': productItemID,
                        "productImg": thumbnailArray[0],
                        "productTitle": productTitleValue,
                        "category": productCategoryValue,
                        "price": productPriceValue,
                        "discount": productDiscountVal,
                        "rating": "--",
                        "color": colorsArray,
                        "size": sizesArray,
                        "stock": stockInputValue,
                        "orders": orderValue,
                        "publish": date,
                    };
                    inputValueJson.push(newObj);
                    sessionStorage.setItem('inputValue', JSON.stringify(inputValueJson));
                }
                window.location.replace("product-list.html");
            }else if (formAction == "edit" && productCategoryValue !== "" && thumbnailArray.length > 0) {
                var editproductId = document.getElementById("product-id-input").value;
                if (sessionStorage.getItem('editInputValue')) {
                    var editObj = {
                        "id": parseInt(editproductId),
                        "productImg": thumbnailArray[0],
                        "productTitle": productTitleValue,
                        "category": productCategoryValue,
                        "price": productPriceValue,
                        "discount": productDiscountVal,
                        "rating": editinputValueJson.rating,
                        "color": colorsArray,
                        "size": sizesArray,
                        "stock": stockInputValue,
                        "orders": orderValue,
                        "publish": editinputValueJson.publish,
                    };
                    sessionStorage.setItem('editInputValue', JSON.stringify(editObj));
                }
                window.location.replace("product-list.html");
            }else {
                console.log('Form Action Not Found.');
            }

            return false;
        }

        form.classList.add('was-validated');

    }, false)
});