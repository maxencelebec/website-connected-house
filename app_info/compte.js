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

document.getElementById("tablink1").click();