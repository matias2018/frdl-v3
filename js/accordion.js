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
//       setTimeout(function(){ rotator.classList.remove('show'); }, 500);
//     }
//   })
// }

const faq = document.querySelectorAll('.faq');

faq.forEach((faqItem) => {
  alert('this is the wrong');
  faqItem.addEventListener('click', function() {
    const rotator = this.querySelector('.faq-rotator');
    const panel = this.nextElementSibling;
    const allPanels = document.querySelectorAll('.answer');

    // Close all panels except the one being clicked
    allPanels.forEach((panel) => {
      if (panel !== this.nextElementSibling && panel.classList.contains('show')) {
        panel.classList.remove('show');
        panel.previousElementSibling.classList.remove('show');
      }
    });

    // Toggle the clicked panel
    this.classList.toggle('show');
    panel.classList.toggle('show');

    if (panel.classList.contains('show')) {
      rotator.classList.add('show');
    } else {
      setTimeout(() => {
        rotator.classList.remove('show');
      }, 500);
    }
  });
});
