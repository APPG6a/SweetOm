function showSlides(n) {
  var i;
  var slides = document.getElementsByClassName("deliveryGrouped");
  var links = document.getElementsByClassName("userDeliveryInfo");

  for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";  
  }
  for (i = 0; i < links.length; i++) {
      if(i!=n-1){
        links[i].style.display = "none";
      }
      
  }
  slides[n-1].style.display = "block";  
}
function goBack(){
  var slides = document.getElementsByClassName("deliveryGrouped");
  var links = document.getElementsByClassName("userDeliveryInfo");
  for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";  
  }
  for (i = 0; i < links.length; i++) {
      links[i].style.display = "table-row";
  }
}