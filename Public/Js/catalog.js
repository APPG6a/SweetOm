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