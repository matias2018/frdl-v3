/* Mobile Menu */
const mobileMenu = document.querySelector('.navbar-desktop');
const toggleButton = document.querySelector('.burger-menu');
const bar = document.querySelector('.bar');
const theMenu = document.querySelector('.nav-items');
const theBody = document.body;
let menuOpen = false; 

toggleButton.addEventListener("click", openBurgerMenu)


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

function selectNavColor() {
  const blue = document.querySelector('.blue');
  const nav = document.querySelector('#navbar');
  const logo = document.querySelector('.custom-logo');

  if(blue) {
    nav.classList.add('blueNavbar');
  } else {
    logo.src="https://frdlbe.on-pages.com/wp-content/uploads/2021/11/Logo_FRDL-01-BW-02.png";
    nav.classList.remove('blueNavbar');
  }

}

selectNavColor();