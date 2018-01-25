showNextSlides(0);
function showNextSlides(n) {
  var i;
  var slides = document.getElementsByClassName("mySlide");
  var next = document.getElementsByClassName("next");

  for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";  
  }
  for (i = 0; i < next.length; i++) {
      next[i].className = next[i].className.replace(" active", "");
  }
  slides[n].style.display = "block";  
  next[n].className += " active";
}
function showPreventSlides(n){
 showNextSlides(n-1);
}