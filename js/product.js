const slides = document.getElementsByClassName('image-holder');
const leftArrow = document.querySelector('.slider-container .left-arrow');
const rightArrow = document.querySelector('.slider-container .right-arrow');
const captionText = document.querySelector('.caption-holder .caption-text');
const dotsContainer = document.getElementsByClassName('dots-container')[0];
const dots = [];
let sliderIndex = 0;

captionText.href = slides[0].querySelector('.caption-text').getAttribute('href');

(function initSlider() {
  slides[sliderIndex].style.opacity = 1;
  captionText.innerText = slides[sliderIndex].querySelector('.caption-text').innerText;

  for (let i = 0; i < slides.length; i++) {
    const dot = document.createElement('span');
    dot.classList.add('dot');
    dot.setAttribute('onClick', `moveSlide(${i})`);
    dotsContainer.append(dot);
    dots.push(dot);
  }

  dots[sliderIndex].classList.add('active');
}());

function moveSlide(n) {
  let index = n;

  let slideTextClass = '';
  const moveSlideClass = {
    forCurrent: '',
    forNext: '',
  };

  if (index > sliderIndex) {
    if (index >= slides.length) {
      index = 0;
    }
    moveSlideClass.forCurrent = 'move-left-current-slide';
    moveSlideClass.forNext = 'move-left-next-slide';
    slideTextClass = 'slide-text-from-top';
  } else if (n < sliderIndex) {
    if (index < 0) {
      index = slides.length - 1;
    }
    moveSlideClass.forCurrent = 'move-right-current-slide';
    moveSlideClass.forNext = 'move-right-next-slide';
    slideTextClass = 'slide-text-from-bottom';
  }

  if (index !== sliderIndex) {
    const current = slides[sliderIndex];
    const next = slides[index];
    for (let i = 0; i < slides.length; i++) {
      slides[i].className = 'image-holder';
      slides[i].style.opacity = 0;
      dots[i].classList.remove('active');
    }
    current.classList.add(moveSlideClass.forCurrent);
    next.classList.add(moveSlideClass.forNext);

    dots[index].classList.add('active');
    sliderIndex = index;
  }

  captionText.style.display = 'none';
  captionText.className = `caption-text ${slideTextClass}`;
  captionText.href = slides[index].querySelector('.caption-text').getAttribute('href');
  captionText.innerText = slides[index].querySelector('.caption-text').innerText;
  captionText.style.display = 'block';
}

function plusSlides(n) {
  moveSlide(sliderIndex + n);
}

leftArrow.addEventListener('click', plusSlides.bind(null, -1));
rightArrow.addEventListener('click', plusSlides.bind(null, 1));
