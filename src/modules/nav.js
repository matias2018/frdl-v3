
/* Mobile Menu */
const mobileMenu = document.querySelector('.navbar-desktop');
const toggleButton = document.querySelector('.burger-menu');
const bar = document.querySelector('.bar');
const theMenu = document.querySelector('.nav-items');
const theBody = document.body;
let menuOpen = false; 

toggleButton.addEventListener("click", openBurgerMenu);


function openBurgerMenu(e) {
  e.preventDefault();
  menuOpen = !menuOpen;
  if(menuOpen == true) {
    mobileMenu.style.left = "0"
    toggleButton.classList.add('opened');
    theMenu.classList.add('opened');
    theBody.classList.add('overflow-hidden');
  } else {
    mobileMenu.style.left = "-100%"
    toggleButton.classList.remove('opened');
    theMenu.classList.remove('opened');
    theBody.classList.remove('overflow-hidden');
  }
}

/* function selectNavColor() {
  const blue = document.querySelector('.blue');
  const blueNavBar = document.querySelector('.blueNavbar');
  const whiteNav = document.querySelector('.whiteNavbar');
  const nav = document.querySelector('#navbar');
  const logo = document.querySelector('.logo');

  if(blue) {
    if(!whiteNav) {
      nav.classList.add('blueNavbar');
    } else {
      nav.classList.remove('whiteNavbar');
      nav.classList.add('blueNavbar');
    }
  } else {
    if (blueNavBar) {
      nav.classList.remove('blueNavbar');
      nav.classList.add('whiteNavbar');
    }
    logo.src="http://localhost:10022/wp-content/uploads/2021/11/Logo_FRDL-01-BW-02.png";
  }

}

selectNavColor(); */
