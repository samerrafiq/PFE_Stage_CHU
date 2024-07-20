//const texts = ["Votre santé est notre priorité."];
const texts = ["Appelez ,nous écoutons.","Demandez ,nous répondons.","Déclarez ,nous agissons."];
let count = 0;
let index = 0;
let currenttext="";
let lettre="";

(function type(){
	if(count === texts.length){
		count=0;
	}
	currenttext =texts[count];
	lettre = currenttext.slice(0, ++index);
	document.querySelector(".typing").textContent = lettre;
	if(lettre.length === currenttext.length){
		count++;
		index=0;
	}
	setTimeout(type, 200);
})();