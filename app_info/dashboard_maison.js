function change() {
    document.getElementById("fenetre").style.fontSize = "30px";
    document.getElementById("fenetre").style.visibility = "visible";
    document.getElementById("fenetre").style.width = "93vw";
    document.getElementById("fenetre").style.height = "98vh";
    document.getElementById("fenetre").style.padding = "0px";
}
function selectimage() {
    document.getElementById("selectphoto").style.fontSize = "30px";
    document.getElementById("selectphoto").style.visibility = "visible";
    document.getElementById("selectphoto").style.width = "50vw";
    document.getElementById("selectphoto").style.height = "50vh";
    document.getElementById("selectphoto").style.padding = "0px";
}
function changemaphab(){
    document.getElementById("fenetre").style.fontSize="30px";
    document.getElementById("fenetre").style.visibility="visible";
    document.getElementById("fenetre").style.width="93vw";
    document.getElementById("fenetre").style.height="98vh";
    document.getElementById("fenetre").style.padding="0px";
}

function fermer(){
	document.getElementById("fenetre").style.fontSize="0px";
	document.getElementById("fenetre").style.visibility="hidden";
	document.getElementById("fenetre").style.width="0px";
	document.getElementById("fenetre").style.height="0px";
}

function fermerselectimage(){
    document.getElementById("selectphoto").style.fontSize="0px";
    document.getElementById("selectphoto").style.visibility="hidden";
    document.getElementById("selectphoto").style.width="0px";
    document.getElementById("selectphoto").style.height="0px";
}

function mode_eco(){
	document.getElementById("eco_mode").style.boxShadow= "0 0 0 3px #2cc872";
	document.getElementById("moyen_mode").style.boxShadow= "0px 4px 20px #212122";
	document.getElementById("max_mode").style.boxShadow= "0px 4px 20px #212122";	

}
function mode_moyen(){
	document.getElementById("eco_mode").style.boxShadow= "0px 4px 20px #212122";
	document.getElementById("moyen_mode").style.boxShadow= "0 0 0 3px #2cc872";
	document.getElementById("max_mode").style.boxShadow= "0px 4px 20px #212122";
}
function mode_max(){
	document.getElementById("eco_mode").style.boxShadow= "0px 4px 20px #212122";
	document.getElementById("moyen_mode").style.boxShadow= "0px 4px 20px #212122";
	document.getElementById("max_mode").style.boxShadow= "0 0 0 3px #2cc872";
}






