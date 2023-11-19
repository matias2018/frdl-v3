const statsSection = document.querySelector('.stats');

const options = { 
  root: null,
  thershold: .25,
  rootMargin: "-100px"
};

topPos = statsSection.offsetTop;

const observer = new IntersectionObserver(function(entries, observer) {
  entries.forEach(entry => {
    /* console.log('entry', entry.isIntersecting) */
    /* entry.target.classList.toggle('showing') */
    if(entry.isIntersecting) {
      count()
    } else {
      return
    }
  })
}, options)

observer.observe(statsSection)


function count() {
  const counters = document.querySelectorAll('.counter');
  const speed = 1000;

  counters.forEach(counter => {
    const updateCount = () => {
      const target = +counter.getAttribute('data-target')
      const count = +counter.innerText;

      const inc = target / speed;

      if(count >= target) {
        count.innerText = Math.ceil(target);
      } else {
        
        counter.innerText = Math.ceil(count + inc);
        setTimeout(updateCount, 1);
      }
    }

    updateCount();
  })
}
