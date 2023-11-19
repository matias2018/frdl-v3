
// As soon as the user scrolls down 1px from the top of the document, resize the navbar's and the logo's height
window.onscroll = function() {scrollFunction()};
const blue = document.querySelector('.blue');

function scrollFunction() {
  /* console.log(document.documentElement.scrollTop); */
  if (document.documentElement.scrollTop) {
    document.querySelector(".navbar").style.height = "110px";
    document.querySelector(".navbar").style.paddingTop = "20px";
    document.querySelector(".navbar").style.paddingBottom = "20px";
    document.querySelector(".navbar").classList.add('blue');
    document.querySelector(".navbar").classList.add('sticky');
    document.getElementsByTagName('body')[0].style.paddingTop="90px";
  } else {
    document.querySelector(".navbar").style.height = "150px";
    document.querySelector(".navbar").classList.remove('sticky');
    document.querySelector(".navbar").classList.remove('blue');
    document.getElementsByTagName('body')[0].style.paddingTop="0px";
  }
}


/* function get_screen_resolution() {
  let myScreenHeight = window.screen.availHeight
  let myScreenWidth = window.screen.availWidth

  const display = document.querySelector('.title');
  display.innerHTML = 'my resolution- H:' + myScreenHeight + ' W:' + myScreenWidth + '<br>' + 'my viewport- H:' + window.innerHeight + ' W ' + window.innerWidth;
}

get_screen_resolution(); */

/* https://codepen.io/marco_fugaro/pen/MwBWwW */