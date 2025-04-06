(() => {
    document.querySelectorAll(".color-slider-container").forEach((container) => {
        const colorSlider = container.querySelector(".color-slider");
        const leftArrow = container.querySelector(".arrow.left");
        const rightArrow = container.querySelector(".arrow.right");
        const scrollStep = 80; // Adjust as needed

        function slide(direction) {
            let maxScroll = colorSlider.scrollWidth - colorSlider.clientWidth;
            let newScroll = colorSlider.scrollLeft + direction * scrollStep;

            if (newScroll <= 0) newScroll = 0;
            if (newScroll >= maxScroll) newScroll = maxScroll;

            colorSlider.scrollTo({ left: newScroll, behavior: "smooth" });

            setTimeout(toggleArrows, 300);
        }

        function toggleArrows() {
            let maxScroll = colorSlider.scrollWidth - colorSlider.clientWidth;
            let currentScroll = Math.ceil(colorSlider.scrollLeft);

            leftArrow.classList.toggle("disabled", currentScroll <= 0);
            rightArrow.classList.toggle("disabled", currentScroll >= maxScroll);
        }

        leftArrow.addEventListener("click", () => slide(-1));
        rightArrow.addEventListener("click", () => slide(1));
        colorSlider.addEventListener("scroll", toggleArrows);
        toggleArrows();
    });
})();
