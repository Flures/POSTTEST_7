const body = document.body;
const darkModeToggle = document.getElementById("dark-mode-toggle");
const prevButton = document.getElementById("prev-button");
const nextButton = document.getElementById("next-button");
const productSlider = document.querySelector(".product-slider");

// init slide index
let currentSlide = 0;

// menambah event toggle darkmode dengan click
darkModeToggle.addEventListener("click", () => {
    body.classList.toggle("dark-mode");
});

// mengecek apakah ada prev dan next button agar tidak conflict dengan about us
if (prevButton && nextButton) {
    // menambah event pada saat button di click
    prevButton.addEventListener("click", () => {
        if (currentSlide > 0) {
            currentSlide--;
            updateSliderPosition();
        }
    });

    nextButton.addEventListener("click", () => {
        const numSlides = document.querySelectorAll(".product-card-container").length;
        if (currentSlide < numSlides - 1) {
            currentSlide++;
            updateSliderPosition();
        }
    });

    // Mengupdate Posisi slider sesuai dengan posisi slider sekarang
    function updateSliderPosition() {
        const sliderWidth = document.querySelector(".product-slider").offsetWidth;
        const numSlides = document.querySelectorAll(".product-card-container").length;
        const slideWidth = document.querySelector(".product-card-container").offsetWidth;
        const gapWidth = (sliderWidth - (slideWidth*numSlides)) / numSlides
        const newPosition = currentSlide * slideWidth + currentSlide* gapWidth;
        productSlider.style.transform = `translateX(${-newPosition}px)`;
    }
}

const buyButtons = document.querySelectorAll(".cta-button");
buyButtons.forEach((button) => {
    button.addEventListener("click", () => {
        const productName = button.parentElement.querySelector("h3").textContent;
        const confirmation = confirm(`Apakah Anda yakin ingin membeli ${productName}?`);
        if (confirmation) {
            alert(`Anda telah membeli ${productName}`);
        } else {
            alert("Pembelian dibatalkan");
        }
    });
});