
function addElement () {

  const newSpan = document.createElement("span");
  const newContent = document.createTextNode("This does nothing");
  newSpan.appendChild(newContent);
  
  const emptyLink = document.querySelector('.fusion-one-page-text-link fusion-page-load-link');
  
  emptyLink.appendChild(newSpan);
  
}

addElement();