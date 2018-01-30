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

var slideIndex = 1;
openSensors(slideIndex);


function openSensors(n) {
    var i;
    var capteurType = document.getElementsByClassName("capteurType");
    var typeLinks = document.getElementsByClassName("typeLinks");
    for (i = 0; i < capteurType.length; i++) {
        capteurType[i].style.display = "none";
    }
    for (i = 0; i < typeLinks.length; i++) {
        typeLinks[i].className = typeLinks[i].className.replace(" active", "");
    }
    capteurType[n-1].style.display = "block";
    typeLinks[n-1].className += " active";
}