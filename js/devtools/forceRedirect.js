const active = document.querySelectorAll('.nav-item');

var navItems = document.getElementsByClassName("nav-item");

for (var i = 0; i < navItems.length; i++) {
  navItems[i].addEventListener("click", function(e) {
    var current = document.getElementsByClassName("active");

    // If there's no active class
    if (current.length > 0) {
      current[0].className = current[0].className.replace(" active", "");
    }

    // Add the active class to the current/clicked button
    // wait a bit and redirect
    this.className += " active";
    e.preventDefault();
    openBurgerMenu();
    setTimeout(function () {
      window.location.href = current[0].childNodes[0].href;
   }, 750);

  });
}