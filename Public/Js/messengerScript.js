
var listeTypeSms = document.getElementsByClassName("choose");
var smsEcrit = document.getElementById("smsEcrit");
smsEcrit
var smsEnvoye = document.getElementById("smsEnvoye")
var smsRecu = document.getElementById("smsRecu");
document.getElementById("typeMessage").textContent = "";
document.getElementById("typeMessage").appendChild(smsEcrit);

for( var i = 0; i<listeTypeSms.length ; i++ ){
	listeTypeSms[i].addEventListener("click",function(e){
		if (e.target.id === "ecrit") {

			document.getElementById("typeMessage").textContent = "";
			document.getElementById("typeMessage").appendChild(smsEcrit);
			console.log("1");
		}

		if (e.target.id === "envoye") {

			document.getElementById("typeMessage").textContent = "";
			document.getElementById("typeMessage").appendChild(smsEnvoye);
		}

		if (e.target.id === "recu") {
			document.getElementById("typeMessage").textContent = "";
			document.getElementById("typeMessage").appendChild(smsRecu);
			
		}


	});
}