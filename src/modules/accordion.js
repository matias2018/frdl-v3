// const faq = document.querySelectorAll('.faq');

// let f;

// for(f = 0; f < faq.length; f++ ) {
//   faq[f].addEventListener('click', function(){
//     var rotator = this.childNodes[1];
//     let panel = this.nextElementSibling;
//     this.classList.toggle('show');
//     panel.classList.toggle('show');
    
//     if (panel.classList.contains('show')) {
//       rotator.classList.add('show');
//     } else {
//       rotator.classList.remove('show');
//     }
//   })
// }

const faq = document.querySelectorAll('.faq');
const panel = document.querySelectorAll('.answer');
const grotators = document.querySelectorAll('.faq-rotator');
// let currentRotator = get all elements with both classes .rotator and .show
let currentRotator;

faq.forEach((faqItem) => {
  faqItem.addEventListener('click', function() {
    const rotator = this.querySelector('.faq-rotator');
    currentRotator = document.querySelector('.faq-rotator.show');
    const panel = this.nextElementSibling;
    const allPanels = document.querySelectorAll('.answer');

    // Close all panels except the one being clicked
    allPanels.forEach((panel) => {
      if (panel !== this.nextElementSibling && panel.classList.contains('show')) {
        panel.classList.remove('show');
        panel.previousElementSibling.classList.remove('show');
        // Close the panel's rotator
        currentRotator.classList.remove('show');
      }
    });

    // Toggle the clicked panel
    this.classList.toggle('show');
    panel.classList.toggle('show');

    if (panel.classList.contains('show')) {
      rotator.classList.add('show');
    } else {
      rotator.classList.remove('show');
    }
  });
});

panel.forEach(function(panel) {
  panel.addEventListener('click', function() {
    this.classList.toggle('show');
    this.previousElementSibling.classList.toggle('show');
    grotators.forEach((rotator) => {
      rotator.classList.remove('show');
    });
  });
});
