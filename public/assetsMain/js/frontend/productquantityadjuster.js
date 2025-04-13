

    document.addEventListener("DOMContentLoaded", function () {
        const minusBtn = document.querySelector(".input-step .minus");
        const plusBtn = document.querySelector(".input-step .plus");
        const quantityInput = document.querySelector(".input-step .product-quantity1");

        const discountInfo = document.getElementById("discount-info");
        const nextTierInfo = document.getElementById("next-tier-info");

        const discountedPriceEl = document.getElementById("discounted-price");
        const originalPriceEl = document.getElementById("original-price");
        const percentOffEl = document.getElementById("percent-off");

        function updatePriceDisplay(qty, discount) {
            if (discount > 0) {
                const discountedPrice = (sellingPrice - (sellingPrice * discount / 100)).toFixed(2);
                discountedPriceEl.textContent = `$${discountedPrice}`;
                originalPriceEl.style.display = 'inline';
                percentOffEl.textContent = `(${discount}% off)`;
            } else {
                discountedPriceEl.textContent = `$${sellingPrice.toFixed(2)}`;
                originalPriceEl.style.display = 'none';
                percentOffEl.textContent = '';
            }
        }

        function updateDiscountDisplay(qty) {
            let currentDiscount = 0;
            let nextTier = null;

            for (let i = 0; i < volumeDiscounts.length; i++) {
                const tier = volumeDiscounts[i];
                if (qty >= tier.quantity) {
                    currentDiscount = tier.discount;
                } else if (!nextTier) {
                    nextTier = tier;
                }
            }

            discountInfo.textContent = currentDiscount > 0
                ? `You got ${currentDiscount}% discount!`
                : `No discount applied`;

            if (nextTier) {
                const remaining = nextTier.quantity - qty;
                nextTierInfo.textContent = `Buy ${remaining} more to get ${nextTier.discount}% off!`;
            } else {
                nextTierInfo.textContent = '';
            }

            updatePriceDisplay(qty, currentDiscount);
        }

        if (minusBtn && plusBtn && quantityInput) {
            minusBtn.addEventListener("click", function () {
                let currentValue = parseInt(quantityInput.value);
                if (currentValue > 1) {
                    currentValue -= 1;
                    quantityInput.value = currentValue;
                    updateDiscountDisplay(currentValue);
                }
            });

            plusBtn.addEventListener("click", function () {
                let currentValue = parseInt(quantityInput.value);
                if (currentValue < 100) {
                    currentValue += 1;
                    quantityInput.value = currentValue;
                    updateDiscountDisplay(currentValue);
                }
            });

            // Initialize on load
            updateDiscountDisplay(parseInt(quantityInput.value));
        } else {
            console.error("One or more elements (minusBtn, plusBtn, quantityInput) were not found.");
        }
    });
