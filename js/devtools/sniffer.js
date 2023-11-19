/** STICKY SNIFFER */
let parent = document.querySelector('.sticky').parentElement;

while (parent) {
    const hasOverflow = getComputedStyle(parent).overflow;
    if (hasOverflow !== 'visible') {
        console.log('hasOverflow, parent', hasOverflow, parent);
    } else {
      console.log('NO hasOverflow, parent', hasOverflow, parent);
    }
    parent = parent.parentElement;
}