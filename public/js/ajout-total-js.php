var slideIndex = 1;
var nombreMaison = 0;
var index = 0;
var nombreUtilisateur = 0;
var nombreCapteur = 0;

var utilisateurs = {};
var capteurs = {};

document.getElementById("resume").innerHTML = "Vous avez actuellement ajouté: " + nombreMaison + " maison(s).";
document.getElementById("resume2").innerHTML = "Vous avez actuellement ajouté: " + nombreUtilisateur + " utilisateur(s).";
document.getElementById("resume3").innerHTML = "Vous avez actuellement ajouté: " + nombreCapteur + " capteur(s).";
showDivs(slideIndex);

function mailRequest() {
    var users = <?php
                    $db = dbConnect();
                    $query = $db->prepare("SELECT ID FROM table_utilisateur WHERE email = ?");
                    $query->execute(array($idUser));
                ?>
}

function plusDivs(n) {
    showDivs(slideIndex += n);
}

function showDivs(n) {
    var i;
    var x = document.getElementsByClassName("slideAjout");
    if (n > x.length) {slideIndex = 1}
    if (n < 1) {slideIndex = x.length} ;
    for (i = 0; i < x.length; i++) {
        x[i].style.display = "none";
    }
    x[slideIndex-1].style.display = "block";
}

function addItemMaison(){
    var ul = document.getElementById("dynamic-list");

    var name = document.getElementById("name");
    var adresse = document.getElementById("adresse");
    var superficie = document.getElementById("superficie");

    if (isNaN(superficie.value)) {
        showError("Superficie invalide.");
    }
    else if (!(name.value == '' && adresse.value == '' && superficie.value == '')) {

        var divNew = document.createElement("div");
        divNew.setAttribute('class', "removeInline");
        divNew.setAttribute("id", index.toString())

        var removeLink = document.createElement("a");
        removeLink.setAttribute("title", "Supprimer la maison")

        var removeString = "removeItemMaison(" + index + ")"
        removeLink.setAttribute("onclick", removeString)

        var removeIcon = document.createElement("img");
        removeIcon.setAttribute("class", "removeIcon")
        removeIcon.setAttribute("width", "20");
        removeIcon.setAttribute("height", "20");
        removeIcon.setAttribute("src", "data:image/svg+xml;utf8;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iaXNvLTg4NTktMSI/Pgo8IS0tIEdlbmVyYXRvcjogQWRvYmUgSWxsdXN0cmF0b3IgMTYuMC4wLCBTVkcgRXhwb3J0IFBsdWctSW4gLiBTVkcgVmVyc2lvbjogNi4wMCBCdWlsZCAwKSAgLS0+CjwhRE9DVFlQRSBzdmcgUFVCTElDICItLy9XM0MvL0RURCBTVkcgMS4xLy9FTiIgImh0dHA6Ly93d3cudzMub3JnL0dyYXBoaWNzL1NWRy8xLjEvRFREL3N2ZzExLmR0ZCI+CjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB4bWxuczp4bGluaz0iaHR0cDovL3d3dy53My5vcmcvMTk5OS94bGluayIgdmVyc2lvbj0iMS4xIiBpZD0iQ2FwYV8xIiB4PSIwcHgiIHk9IjBweCIgd2lkdGg9IjUxMnB4IiBoZWlnaHQ9IjUxMnB4IiB2aWV3Qm94PSIwIDAgNTEwIDUxMCIgc3R5bGU9ImVuYWJsZS1iYWNrZ3JvdW5kOm5ldyAwIDAgNTEwIDUxMDsiIHhtbDpzcGFjZT0icHJlc2VydmUiPgo8Zz4KCTxnIGlkPSJjYW5jZWwiPgoJCTxwYXRoIGQ9Ik0yNTUsMEMxMTQuNzUsMCwwLDExNC43NSwwLDI1NXMxMTQuNzUsMjU1LDI1NSwyNTVzMjU1LTExNC43NSwyNTUtMjU1UzM5NS4yNSwwLDI1NSwweiBNMzgyLjUsMzQ2LjhsLTM1LjcsMzUuNyAgICBMMjU1LDI5MC43bC05MS44LDkxLjhsLTM1LjctMzUuN2w5MS44LTkxLjhsLTkxLjgtOTEuOGwzNS43LTM1LjdsOTEuOCw5MS44bDkxLjgtOTEuOGwzNS43LDM1LjdMMjkwLjcsMjU1TDM4Mi41LDM0Ni44eiIgZmlsbD0iIzAwMDAwMCIvPgoJPC9nPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+Cjwvc3ZnPgo=");

        removeLink.appendChild(removeIcon)

        divNew.appendChild(document.createTextNode("Nom: " + name.value + ". Adresse: " + adresse.value + ". Superficie: " + superficie.value));
        divNew.appendChild(removeLink)
        ul.appendChild(divNew);
        nombreMaison ++;
        index ++;
        document.getElementById("resume").innerHTML = "Vous avez actuellement ajouté: " + nombreMaison + " maison(s).";

        hideError();
    }
}

function removeItemMaison(itemId){
    var ul = document.getElementById("dynamic-list");
    var removed = document.getElementById(itemId.toString());
    ul.removeChild(removed);
    nombreMaison --;
    document.getElementById("resume").innerHTML = "Vous avez actuellement ajouté: " + nombreMaison + " maison(s).";
}

function addItemUtilisateur(){
    var ul = document.getElementById("dynamic-list2");

    var nom = document.getElementById("nom");
    var prenom = document.getElementById("prenom");
    var email = document.getElementById("email");
    var statut = document.getElementById("statut");
    var password = document.getElementById("mdp");

    if (!(nom.value == '' && prenom.value == '' && email.value == '' && password.value == '')) {

        var divNew = document.createElement("div");
        divNew.setAttribute('class', "removeInline");
        divNew.setAttribute("id", index.toString())

        var removeLink = document.createElement("a");
        removeLink.setAttribute("title", "Supprimer l'utilisateur")

        var removeString = "removeItemUtilisateur(" + index + ")"
        removeLink.setAttribute("onclick", removeString)

        var removeIcon = document.createElement("img");
        removeIcon.setAttribute("class", "removeIcon")
        removeIcon.setAttribute("width", "20");
        removeIcon.setAttribute("height", "20");
        removeIcon.setAttribute("src", "data:image/svg+xml;utf8;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iaXNvLTg4NTktMSI/Pgo8IS0tIEdlbmVyYXRvcjogQWRvYmUgSWxsdXN0cmF0b3IgMTYuMC4wLCBTVkcgRXhwb3J0IFBsdWctSW4gLiBTVkcgVmVyc2lvbjogNi4wMCBCdWlsZCAwKSAgLS0+CjwhRE9DVFlQRSBzdmcgUFVCTElDICItLy9XM0MvL0RURCBTVkcgMS4xLy9FTiIgImh0dHA6Ly93d3cudzMub3JnL0dyYXBoaWNzL1NWRy8xLjEvRFREL3N2ZzExLmR0ZCI+CjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB4bWxuczp4bGluaz0iaHR0cDovL3d3dy53My5vcmcvMTk5OS94bGluayIgdmVyc2lvbj0iMS4xIiBpZD0iQ2FwYV8xIiB4PSIwcHgiIHk9IjBweCIgd2lkdGg9IjUxMnB4IiBoZWlnaHQ9IjUxMnB4IiB2aWV3Qm94PSIwIDAgNTEwIDUxMCIgc3R5bGU9ImVuYWJsZS1iYWNrZ3JvdW5kOm5ldyAwIDAgNTEwIDUxMDsiIHhtbDpzcGFjZT0icHJlc2VydmUiPgo8Zz4KCTxnIGlkPSJjYW5jZWwiPgoJCTxwYXRoIGQ9Ik0yNTUsMEMxMTQuNzUsMCwwLDExNC43NSwwLDI1NXMxMTQuNzUsMjU1LDI1NSwyNTVzMjU1LTExNC43NSwyNTUtMjU1UzM5NS4yNSwwLDI1NSwweiBNMzgyLjUsMzQ2LjhsLTM1LjcsMzUuNyAgICBMMjU1LDI5MC43bC05MS44LDkxLjhsLTM1LjctMzUuN2w5MS44LTkxLjhsLTkxLjgtOTEuOGwzNS43LTM1LjdsOTEuOCw5MS44bDkxLjgtOTEuOGwzNS43LDM1LjdMMjkwLjcsMjU1TDM4Mi41LDM0Ni44eiIgZmlsbD0iIzAwMDAwMCIvPgoJPC9nPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+Cjwvc3ZnPgo=");

        removeLink.appendChild(removeIcon);

        divNew.appendChild(document.createTextNode("Nom: " + nom.value + ". Prénom: " + prenom.value + ". Email: " + email.value + ". Statut: " + statut.value));
        divNew.appendChild(removeLink)
        ul.appendChild(divNew);

        // utilisateurs[index] = [nom.value, prenom.value, email.value, password.value, statut.value];
        utilisateurs[index] = [nom.value, prenom.value, email.value, password.value];

        nombreUtilisateur ++;
        index ++;
        document.getElementById("resume2").innerHTML = "Vous avez actuellement ajouté: " + nombreUtilisateur + " utilisateur(s).";
    }
}

function removeItemUtilisateur(itemId){
    var ul = document.getElementById("dynamic-list2");
    var removed = document.getElementById(itemId.toString());
    ul.removeChild(removed);

    delete utilisateurs[itemId.toString()];

    nombreUtilisateur --;
    document.getElementById("resume2").innerHTML = "Vous avez actuellement ajouté: " + nombreUtilisateur + " utilisateurs(s).";
}

function addItemCapteur(){
    var ul = document.getElementById("dynamic-list3");

    var sensor = document.getElementById("sensorTypeSelect");
    var room = document.getElementById("roomSelect");

    var divNew = document.createElement("div");
    divNew.setAttribute('class', "removeInline");
    divNew.setAttribute("id", index.toString())

    var removeLink = document.createElement("a");
    removeLink.setAttribute("title", "Supprimer le capteur")

    var removeString = "removeItemCapteur(" + index + ")"
    removeLink.setAttribute("onclick", removeString)

    var removeIcon = document.createElement("img");
    removeIcon.setAttribute("class", "removeIcon")
    removeIcon.setAttribute("width", "20");
    removeIcon.setAttribute("height", "20");
    removeIcon.setAttribute("src", "data:image/svg+xml;utf8;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iaXNvLTg4NTktMSI/Pgo8IS0tIEdlbmVyYXRvcjogQWRvYmUgSWxsdXN0cmF0b3IgMTYuMC4wLCBTVkcgRXhwb3J0IFBsdWctSW4gLiBTVkcgVmVyc2lvbjogNi4wMCBCdWlsZCAwKSAgLS0+CjwhRE9DVFlQRSBzdmcgUFVCTElDICItLy9XM0MvL0RURCBTVkcgMS4xLy9FTiIgImh0dHA6Ly93d3cudzMub3JnL0dyYXBoaWNzL1NWRy8xLjEvRFREL3N2ZzExLmR0ZCI+CjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB4bWxuczp4bGluaz0iaHR0cDovL3d3dy53My5vcmcvMTk5OS94bGluayIgdmVyc2lvbj0iMS4xIiBpZD0iQ2FwYV8xIiB4PSIwcHgiIHk9IjBweCIgd2lkdGg9IjUxMnB4IiBoZWlnaHQ9IjUxMnB4IiB2aWV3Qm94PSIwIDAgNTEwIDUxMCIgc3R5bGU9ImVuYWJsZS1iYWNrZ3JvdW5kOm5ldyAwIDAgNTEwIDUxMDsiIHhtbDpzcGFjZT0icHJlc2VydmUiPgo8Zz4KCTxnIGlkPSJjYW5jZWwiPgoJCTxwYXRoIGQ9Ik0yNTUsMEMxMTQuNzUsMCwwLDExNC43NSwwLDI1NXMxMTQuNzUsMjU1LDI1NSwyNTVzMjU1LTExNC43NSwyNTUtMjU1UzM5NS4yNSwwLDI1NSwweiBNMzgyLjUsMzQ2LjhsLTM1LjcsMzUuNyAgICBMMjU1LDI5MC43bC05MS44LDkxLjhsLTM1LjctMzUuN2w5MS44LTkxLjhsLTkxLjgtOTEuOGwzNS43LTM1LjdsOTEuOCw5MS44bDkxLjgtOTEuOGwzNS43LDM1LjdMMjkwLjcsMjU1TDM4Mi41LDM0Ni44eiIgZmlsbD0iIzAwMDAwMCIvPgoJPC9nPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+Cjwvc3ZnPgo=");

    removeLink.appendChild(removeIcon)

    divNew.appendChild(document.createTextNode("Type de capteur: " + sensor.value + ". Salle: " + room.value ));
    divNew.appendChild(removeLink)
    ul.appendChild(divNew);

    capteurs[index] = [sensor.value, room.value];

    nombreCapteur ++;
    index ++;
    document.getElementById("resume3").innerHTML = "Vous avez actuellement ajouté: " + nombreCapteur + " capteur(s).";
}

function removeItemCapteur(itemId){
    var ul = document.getElementById("dynamic-list3");
    var removed = document.getElementById(itemId.toString());
    ul.removeChild(removed);

    delete capteurs[itemId.toString()];

    nombreCapteur --;
    document.getElementById("resume3").innerHTML = "Vous avez actuellement ajouté: " + nombreCapteur + " capteur(s).";
}

function finalise() {
    plusDivs(1);
    document.getElementById("final-resume").innerHTML = "";
    var res = document.getElementsByClassName("removeInline");
    var ul = document.getElementById("final-resume");
    for (var elt of res) {
        var divNew = document.createElement("div");
        divNew.appendChild(document.createTextNode(elt.innerText));
        ul.appendChild(divNew);
    }
    var input_utilisateur = document.getElementById('input_utilisateur');
    var input_capteur = document.getElementById('input_capteur');

    input_utilisateur.value = Object.values(utilisateurs);
    input_capteur.value = Object.values(capteurs);
}
