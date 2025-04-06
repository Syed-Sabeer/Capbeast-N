document.addEventListener("DOMContentLoaded", function () {
    const minusBtn = document.querySelector(".input-step .minus");
    const plusBtn = document.querySelector(".input-step .plus");
    const quantityInput = document.querySelector(".input-step .product-quantity1");

    if (minusBtn && plusBtn && quantityInput) {
        minusBtn.addEventListener("click", function () {
            let currentValue = parseInt(quantityInput.value);
            console.log("Minus clicked. Current value:", currentValue);
            if (currentValue > 1) {
                quantityInput.value = currentValue - 1;
                console.log("New value:", quantityInput.value);
            }
        });

        plusBtn.addEventListener("click", function () {
            let currentValue = parseInt(quantityInput.value);
            console.log("Plus clicked. Current value:", currentValue);
            if (currentValue < 100) {
                quantityInput.value = currentValue + 1;
                console.log("New value:", quantityInput.value);
            }
        });
    } else {
        console.error("One or more elements (minusBtn, plusBtn, quantityInput) were not found.");
    }
});
