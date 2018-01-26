var slideIndex= 1;
showSlides(slideIndex);

function showSlides(n) {
  var i;
  var slides = document.getElementsByClassName("mySlide");
  var links = document.getElementsByClassName("link");

  for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";  
  }
  for (i = 0; i < links.length; i++) {
      links[i].className = links[i].className.replace(" active", "");
  }
  slides[n-1].style.display = "block";  
  links[n-1].className += " active";
}

function openContentR(n){
	var i;
	var allContents = document.getElementsByClassName("aContentReceived");
	var allMessagesReceived = document.getElementsByClassName("aMessageReceived");
	for(i = 0; i<allContents.length; i++) {
		allContents[i].style.height = "0";
	}
	for(i=0; i<allMessagesReceived.length; i++){
		allMessagesReceived[i].style.display = "none";
	}
	allMessagesReceived[n-1].style.display = "flex";
	allContents[n-1].style.height = "40%";
}
function openContentS(n){
	var i;
	var allContents = document.getElementsByClassName("aContentSent");
	var allMessagesSent = document.getElementsByClassName("aMessageSent");
	for(i = 0; i<allContents.length; i++) {
		allContents[i].style.height = "0";
	}
	for(i=0; i<allMessagesSent.length; i++){
		allMessagesSent[i].style.display = "none";
	}
	allMessagesSent[n-1].style.display = "flex";
	allContents[n-1].style.height = "40%";
}

function goBackS(){
	var allContents = document.getElementsByClassName("aContentSent");
	var allMessagesSent = document.getElementsByClassName("aMessageSent")
	for(i = 0; i<allContents.length; i++) {
		allContents[i].style.height = "0";
	}
	for(i=0; i<allMessagesSent.length; i++){
		allMessagesSent[i].style.display = "flex";
	}
}
function goBackR(){
	var allContents = document.getElementsByClassName("aContentReceived");
	var allMessagesReceived = document.getElementsByClassName("aMessageReceived")
	for(i = 0; i<allContents.length; i++) {
		allContents[i].style.height = "0";
	}
	for(i=0; i<allMessagesReceived.length; i++){
		allMessagesReceived[i].style.display = "flex";
	}
}
