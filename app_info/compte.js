function openTab(evt, tabName) {
    // Declare all variables
    var i, tabcontent, tablinks;

    // Get all elements with class="tabcontent" and hide them
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }

    // Get all elements with class="tablinks" and remove the class "active"
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace("active", "");
    }

    // Search the tab matching the attribute and display it
	document.getElementById(tabName).style.display = "grid";
    evt.currentTarget.className += " active";
}

function submitForms() {	/* Fonction qui submit tous les formulaires de la page (le menu empêche l'envoi) */
	document.forms["profile_form"].submit();
	setTimeOut(function(){
		document.forms["compte_form"].submit();
	}, 5000); 
}

/* Définition des évènements "onclick" */
document.getElementById("tablink1").addEventListener("click", function(){
	openTab(event, "profile");
}); 
document.getElementById("tablink2").addEventListener("click", function(){
	openTab(event, "compte");
}); 
document.getElementById("tablink3").addEventListener("click", function(){
	openTab(event, "confidentialite");
}); 
document.getElementById("tablink4").addEventListener("click", function(){
	openTab(event, "notifications");
}); 
document.getElementsByClassName("enregistrer").addEventListener("click", function() {
	submitForms();
});

document.getElementById("tablink1").click();