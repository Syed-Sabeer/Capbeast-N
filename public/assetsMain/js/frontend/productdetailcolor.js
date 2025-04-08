document.querySelectorAll(".color-option").forEach(option => {
    option.addEventListener("click", function() {
        document.querySelectorAll(".color-option").forEach(el => el.classList.remove("active"));
        this.classList.add("active");
    });
});

document.querySelectorAll(".size-option").forEach(option => {
    option.addEventListener("click", function() {
        document.querySelectorAll(".size-option").forEach(el => el.classList.remove("active"));
        this.classList.add("active");
    });
});


document.addEventListener("DOMContentLoaded", function () {
    const colorOptions = document.querySelectorAll(".color-option");
    const mainImage = document.getElementById("mainImage");
    const addToCartBtn = document.querySelector(".add-to-cart-btn");

    if (colorOptions.length > 0) {
        let defaultColor = colorOptions[0]; // Select first color by default
        defaultColor.classList.add("active");
        mainImage.src = defaultColor.getAttribute("data-image");
        // addToCartBtn.setAttribute("data-color-id", defaultColor.getAttribute("data-color-id"));
    }

    colorOptions.forEach(option => {
        option.addEventListener("click", function () {
            // Remove 'active' from all colors and set selected one
            colorOptions.forEach(el => el.classList.remove("active"));
            this.classList.add("active");

            // Update the main image
            mainImage.src = this.getAttribute("data-image");

            // Update the color ID in the Add to Cart button
            // addToCartBtn.setAttribute("data-color-id", this.getAttribute("data-color-id"));
        });
    });
});
