//modify for my usage - scroll down only

console.log('scroll down bar loaded');

let scrollPos = 150;
const bar = document.querySelector('#bar');
const barFront =  document.querySelector('.bar-outer');

function checkPosition() {
  let windowY = window.scrollY;

    bar.classList.add('is-hidden');
    //bar.classList.remove('is-visible'); 
    barFront.classList.add('is-hidden');
    //barFront.classList.remove('is-visible');

  scrollPos = windowY;
}

//window.addEventListener('scroll', checkPosition);
function debounce(func, wait = 10, immediate = true) {
    let timeout;
    return function() {
      let context = this, args = arguments;
      let later = function() {
        timeout = null;
        if (!immediate) func.apply(context, args);
      };
      let callNow = immediate && !timeout;
      clearTimeout(timeout);
      timeout = setTimeout(later, wait);
      if (callNow) func.apply(context, args);
    };
  };
  
  window.addEventListener('scroll', debounce(checkPosition));