
const slider = document.querySelector('.slider');
const slides = slider.querySelectorAll('.slide');

let counter = 1;
const slideWidth = slides[0].clientWidth;

setInterval(() => {
  slider.style.transition = 'transform 0.5s ease-in-out';
  slider.style.transform = `translateX(-${counter * slideWidth}px)`;
  counter++;
}, 5000);

slider.addEventListener('transitionend', () => {
  if (counter >= slides.length) {
    slider.style.transition = 'none';
    counter = 1;
    slider.style.transform = `translateX(-${counter * slideWidth}px)`;
  }
});