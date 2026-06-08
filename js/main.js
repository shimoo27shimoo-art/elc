// السلايدر
let currentSlideIndex = 0;
const slides = document.querySelectorAll('.slide');
const totalSlides = slides.length;

function showSlide(n) {
    const slider = document.getElementById('slider');
    if (slider) {
        slider.style.transform = `translateX(-${n * 100}%)`;
    }
    
    // تحديث النقاط
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

// تغيير الشريحة تلقائياً كل 5 ثواني
if (totalSlides > 0) {
    setInterval(nextSlide, 5000);
}

// تأثيرات التمرير
document.addEventListener('DOMContentLoaded', function() {
    // إضافة تأثيرات التمرير للعناصر
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -100px 0px'
    };

    const observer = new IntersectionObserver(function(entries) {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.style.opacity = '1';
                entry.target.style.transform = 'translateY(0)';
            }
        });
    }, observerOptions);

    document.querySelectorAll('.news-card, .gallery-item, .stat-card').forEach(el => {
        el.style.opacity = '0';
        el.style.transform = 'translateY(20px)';
        el.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
        observer.observe(el);
    });
});

// التحقق من النماذج
function validateForm(formId) {
    const form = document.getElementById(formId);
    if (!form) return true;

    const inputs = form.querySelectorAll('input[required], textarea[required], select[required]');
    let isValid = true;

    inputs.forEach(input => {
        if (!input.value.trim()) {
            input.style.borderColor = '#e74c3c';
            isValid = false;
        } else {
            input.style.borderColor = '#e0e0e0';
        }
    });

    return isValid;
}