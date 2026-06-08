// السلايدر
let currentSlideIndex = 0;
const slides = document.querySelectorAll('.slide');
const totalSlides = slides.length;

function showSlide(n) {
    const slider = document.getElementById('slider');
    if (slider) {
        slider.style.transform = `translateX(-${n * 100}%)`;
    }
    const dots = document.querySelectorAll('.slider-dot');
    dots.forEach((dot, index) => {
        dot.classList.toggle('active', index === n);
    });
}

function currentSlide(n) {
    currentSlideIndex = n;
    showSlide(currentSlideIndex);
}

function nextSlide() {
    currentSlideIndex = (currentSlideIndex + 1) % totalSlides;
    showSlide(currentSlideIndex);
}

if (totalSlides > 0) {
    setInterval(nextSlide, 5000);
}
