const slider = document.getElementById("categorySlider");
        let autoScrollInterval;
        const cards = document.querySelectorAll(".category-card");

        // Function to scroll the slider
        function scrollSlider(amount) {
            slider.scrollBy({
                left: amount,
                behavior: "smooth"
            });
        }

        // Auto-scroll function
        function autoScroll() {
            if (!document.querySelector(".category-card.active")) {
                if (slider.scrollLeft + slider.clientWidth >= slider.scrollWidth) {
                    slider.scrollTo({
                        left: 0,
                        behavior: "smooth"
                    });
                } else {
                    slider.scrollBy({
                        left: 200,
                        behavior: "smooth"
                    });
                }
            }
        }

        // Start auto-scroll
        autoScrollInterval = setInterval(autoScroll, 4000);

        // Function to center the active card
        function centerActiveCard(card) {
            const cardRect = card.getBoundingClientRect();
            const sliderRect = slider.getBoundingClientRect();
            const offset = cardRect.left - sliderRect.left - (sliderRect.width / 2) + (cardRect.width / 2);
            slider.scrollBy({
                left: offset,
                behavior: "smooth"
            });
        }

        // Handle card selection
        cards.forEach(card => {
            card.addEventListener("click", () => {
                document.querySelector(".category-card.active")?.classList.remove("active");
                card.classList.add("active");

                // Stop auto-scroll when a card is active
                clearInterval(autoScrollInterval);

                // Center the selected card
                centerActiveCard(card);
            });
        });