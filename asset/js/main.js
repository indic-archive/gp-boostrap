// JavaScript Document
function animateValue(obj, start, end, duration) {
  let startTimestamp = null;
  const step = (timestamp) => {
    if (!startTimestamp) startTimestamp = timestamp;
    const progress = Math.min((timestamp - startTimestamp) / duration, 1);
    obj.innerHTML = Math.floor(progress * (end - start) + start).toLocaleString('en-IN');
    if (progress < 1) {
      window.requestAnimationFrame(step);
    }
  };
  window.requestAnimationFrame(step);
}

(function($){
  $( document ).ready(function() {
    // Animate the numbers in home page.
    $('.counts .theNum').each(function( index ) {
      animateValue(this, 1, this.innerHTML, 1000);
    });
  });
})(jQuery);
  

