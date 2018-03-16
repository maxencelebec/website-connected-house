function change(){
	document.getElementById("fenetre").style.opacity="1";
	document.getElementById("fenetre").style.fontSize="30px";
	document.getElementById("fenetre").style.visibility="visible";
	document.getElementById("fenetre").style.width="40%";
	document.getElementById("fenetre").style.height="50%";
	document.getElementById("site").style.opacity="0.3";
	document.getElementById("fenetre").style.padding="0px";
}

function fermer(){
	document.getElementById("fenetre").style.opacity="0";
	document.getElementById("fenetre").style.fontSize="0px";
	document.getElementById("fenetre").style.visibility="hidden";
	document.getElementById("site").style.opacity="1";
	document.getElementById("fenetre").style.width="0px";
	document.getElementById("fenetre").style.height="0px";
}

function mode_eco(){
	document.getElementById("case2222").style.border="#2cc872 solid 2px";
	document.getElementById("case2223").style.border="#2cc872 solid 0px";
	document.getElementById("case2224").style.border="#2cc872 solid 0px";	
}
function mode_moyen(){
	document.getElementById("case2222").style.border="#2cc872 solid 0px";
	document.getElementById("case2223").style.border="#2cc872 solid 2px";
	document.getElementById("case2224").style.border="#2cc872 solid 0px";
}
function mode_max(){
	document.getElementById("case2222").style.border="#2cc872 solid 0px";
	document.getElementById("case2223").style.border="#2cc872 solid 0px";
	document.getElementById("case2224").style.border="#2cc872 solid 2px";
}

function eau(){
	document.getElementById("triangle1").style.gridRow="1/2";
}
function temperature(){
	document.getElementById("triangle1").style.gridRow="2/3";
}
function consommation(){
	document.getElementById("triangle1").style.gridRow="3/4";
}

