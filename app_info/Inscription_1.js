var valid_check=false;

//fonction qui effectue des controles sur le nom et le mail
function control(control) {
    var test = document.getElementById(control).value;
        if (test==1) {
            valid_check = false;
        }
        else {
            valid_check = true;
        }
}


var validation = document.getElementById('envoie');
validation.addEventListener('click',f_valid);
//fonction empéchant l'envoie du formulaire si tous les champs ne sont pas correctement remplis
function f_valid(e) {
    if (valid_check==false){
        e.preventDefault();
        document.getElementById('erreur').innerText="Veuillez accepter les CGU";
    }
}
