

const mainImage = document.getElementById('mainImage');
const thumbnails = document.querySelectorAll('.thumbnail');
const colorDropdown = document.getElementById('beanie-color');
let currentIndex = 0;

// Change the main image based on the clicked thumbnail
function changeImage(element) {
    mainImage.src = element.src;
    thumbnails.forEach(thumbnail => thumbnail.classList.remove('active'));
    element.classList.add('active');
    currentIndex = Array.from(thumbnails).indexOf(element);

    // Synchronize the dropdown with the selected image
    const colorId = element.dataset.colorId;
    if (colorId) {
        colorDropdown.value = colorId;
    }
}

// Change the main image when navigating through the slider
function changeSlide(direction) {
    currentIndex += direction;
    if (currentIndex < 0) {
        currentIndex = thumbnails.length - 1;
    } else if (currentIndex >= thumbnails.length) {
        currentIndex = 0;
    }
    changeImage(thumbnails[currentIndex]);
}

// Change the image when selecting a color from the dropdown
colorDropdown.addEventListener('change', () => {
    const selectedColorId = colorDropdown.value;
    const targetThumbnail = Array.from(thumbnails).find(thumbnail => thumbnail.dataset.colorId ==
        selectedColorId);
    if (targetThumbnail) {
        changeImage(targetThumbnail);
    }
});

document.getElementById('patchLength').addEventListener('input', function() {
    const patchLength = parseFloat(this.value);
    const errorElement = document.getElementById('patchLengthError');
    if (isNaN(patchLength) || patchLength < 1 || patchLength > 4) {
        errorElement.style.display = 'block';
    } else {
        errorElement.style.display = 'none';
    }
});

document.getElementById('patchHeight').addEventListener('input', function() {
    const patchHeight = parseFloat(this.value);
    const errorElement = document.getElementById('patchHeightError');
    if (isNaN(patchHeight) || patchHeight > 2.5) {
        errorElement.style.display = 'block';
    } else {
        errorElement.style.display = 'none';
    }
});

function validateColorCode(input, index) {
    const value = input.value;
    const errorElement = document.getElementById(`colorError${index}`);

    if (value.length !== 4 || isNaN(value)) {
        errorElement.style.display = 'block';
    } else {
        errorElement.style.display = 'none';
    }
}

    document.addEventListener('DOMContentLoaded', function () {
        const options = document.querySelectorAll('.printing-option');

        options.forEach(option => {
            option.addEventListener('click', function () {
                // Remove 'selected' class from all options
                options.forEach(opt => opt.classList.remove('selected'));

                // Add 'selected' class to the clicked option
                this.classList.add('selected');
            });
        });
    });
