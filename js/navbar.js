const navbar = document.getElementsByTagName('header')[0];
const sticky = navbar.offsetTop;
window.addEventListener('scroll', () => {
  if (window.pageYOffset >= sticky) {
    navbar.classList.add('sticky');
  } else {
    navbar.classList.remove('sticky');
  }
});

if (window.innerWidth <= 991) {
  const nav = document.querySelector('header nav');
  const navToggler = document.querySelector('header .menu-toggle');
  const item = document.querySelector('header nav ul li.sub-menu');
  let signalToggle = 0;
  let signalActive = 0;

  navToggler.addEventListener('click', () => {
    if (signalToggle === 0) {
      nav.classList.add('active');
      signalToggle = 1;
    } else {
      nav.classList.remove('active');
      signalToggle = 0;
    }
  });

  item.addEventListener('click', () => {
    if (signalActive === 0) {
      item.classList.add('active');
      signalActive = 1;
    } else {
      item.classList.remove('active');
      signalActive = 0;
    }
  });
}

const pagination = document.querySelectorAll(
  'nav>.pagination>.page-item>.page-link',
);
const param = window.location.search.split('?')[1];
if (param) {
  const currentPage = Number(param.split('=')[1]);
  for (let i = 0; i < pagination.length; i++) {
    pagination[i].addEventListener('click', () => {
      pagination[i].classList.remove('active');
    });
  }
  pagination[currentPage + 1].classList.add('active');
}
