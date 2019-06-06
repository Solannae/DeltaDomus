var slideIndex = 0;
var index = 0;
var nombreUtilisateur = 0;
var nombreCapteur = 0;
var nombrePiece = 0;

var utilisateurs = {};
var capteurs = {};
var pieces = {};
var slides = document.getElementsByClassName("slideAjout");
var listPiece = document.getElementById("roomSelect");

document.getElementById("resumeUtilisateur").innerHTML = "Vous avez actuellement ajouté: " + nombreUtilisateur + " utilisateur(s).";
document.getElementById("resumeCapteur").innerHTML = "Vous avez actuellement ajouté: " + nombreCapteur + " capteur(s).";
document.getElementById("resumePiece").innerHTML = "Vous avez actuellement ajouté: " + nombreCapteur + " pièce(s).";
showDivs(slideIndex);



function plusDivs(n) {
    showDivs(slideIndex += n);
}

function showDivs(n) {
    if (n > slides.length) {slideIndex = 0}
    if (n < 0) {slideIndex = slides.length} ;
    for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
    }
    slides[slideIndex].style.display = "block";
}

// function addItemUtilisateur(){
//     var ul = document.getElementById("dynamic-list2");
//
//     var nom = document.getElementById("nom");
//     var prenom = document.getElementById("prenom");
//     var email = document.getElementById("email");
//     var statut = document.getElementById("statut");
//     var password = document.getElementById("mdp");
//
//     if (!(nom.value == '' && prenom.value == '' && email.value == '' && password.value == '')) {
//
//         var divNew = document.createElement("div");
//         divNew.setAttribute('class', "removeInline");
//         divNew.setAttribute("id", index.toString())
//
//         var removeLink = document.createElement("a");
//         removeLink.setAttribute("title", "Supprimer l'utilisateur")
//
//         var removeString = "removeItemUtilisateur(" + index + ")"
//         removeLink.setAttribute("onclick", removeString)
//
//         var removeIcon = document.createElement("img");
//         removeIcon.setAttribute("class", "removeIcon")
//         removeIcon.setAttribute("width", "20");
//         removeIcon.setAttribute("height", "20");
//         removeIcon.setAttribute("src", "data:image/svg+xml;utf8;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iaXNvLTg4NTktMSI/Pgo8IS0tIEdlbmVyYXRvcjogQWRvYmUgSWxsdXN0cmF0b3IgMTYuMC4wLCBTVkcgRXhwb3J0IFBsdWctSW4gLiBTVkcgVmVyc2lvbjogNi4wMCBCdWlsZCAwKSAgLS0+CjwhRE9DVFlQRSBzdmcgUFVCTElDICItLy9XM0MvL0RURCBTVkcgMS4xLy9FTiIgImh0dHA6Ly93d3cudzMub3JnL0dyYXBoaWNzL1NWRy8xLjEvRFREL3N2ZzExLmR0ZCI+CjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB4bWxuczp4bGluaz0iaHR0cDovL3d3dy53My5vcmcvMTk5OS94bGluayIgdmVyc2lvbj0iMS4xIiBpZD0iQ2FwYV8xIiB4PSIwcHgiIHk9IjBweCIgd2lkdGg9IjUxMnB4IiBoZWlnaHQ9IjUxMnB4IiB2aWV3Qm94PSIwIDAgNTEwIDUxMCIgc3R5bGU9ImVuYWJsZS1iYWNrZ3JvdW5kOm5ldyAwIDAgNTEwIDUxMDsiIHhtbDpzcGFjZT0icHJlc2VydmUiPgo8Zz4KCTxnIGlkPSJjYW5jZWwiPgoJCTxwYXRoIGQ9Ik0yNTUsMEMxMTQuNzUsMCwwLDExNC43NSwwLDI1NXMxMTQuNzUsMjU1LDI1NSwyNTVzMjU1LTExNC43NSwyNTUtMjU1UzM5NS4yNSwwLDI1NSwweiBNMzgyLjUsMzQ2LjhsLTM1LjcsMzUuNyAgICBMMjU1LDI5MC43bC05MS44LDkxLjhsLTM1LjctMzUuN2w5MS44LTkxLjhsLTkxLjgtOTEuOGwzNS43LTM1LjdsOTEuOCw5MS44bDkxLjgtOTEuOGwzNS43LDM1LjdMMjkwLjcsMjU1TDM4Mi41LDM0Ni44eiIgZmlsbD0iIzAwMDAwMCIvPgoJPC9nPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+Cjwvc3ZnPgo=");
//
//         removeLink.appendChild(removeIcon);
//
//         divNew.appendChild(document.createTextNode("Nom: " + nom.value + ". Prénom: " + prenom.value + ". Email: " + email.value + ". Statut: " + statut.value));
//         divNew.appendChild(removeLink)
//         ul.appendChild(divNew);
//
//         // utilisateurs[index] = [nom.value, prenom.value, email.value, password.value, statut.value];
//         utilisateurs[index] = [nom.value, prenom.value, email.value, password.value];
//
//         nombreUtilisateur ++;
//         index ++;
//         document.getElementById("resume2").innerHTML = "Vous avez actuellement ajouté: " + nombreUtilisateur + " utilisateur(s).";
//     }
// }

function removeItemUtilisateur(itemId){
    var ul = document.getElementById("dynamic-list-utilisateur");
    var removed = document.getElementById(itemId.toString());
    ul.removeChild(removed);

    delete utilisateurs[itemId.toString()];

    nombreUtilisateur --;
    document.getElementById("resumeUtilisateur").innerHTML = "Vous avez actuellement ajouté: " + nombreUtilisateur + " utilisateurs(s).";
}

// function addItemCapteur(){
//     var ul = document.getElementById("dynamic-list3");
//
//     var sensor = document.getElementById("sensorTypeSelect");
//     var room = document.getElementById("roomSelect");
//
//     var divNew = document.createElement("div");
//     divNew.setAttribute('class', "removeInline");
//     divNew.setAttribute("id", index.toString())
//
//     var removeLink = document.createElement("a");
//     removeLink.setAttribute("title", "Supprimer le capteur")
//
//     var removeString = "removeItemCapteur(" + index + ")"
//     removeLink.setAttribute("onclick", removeString)
//
//     var removeIcon = document.createElement("img");
//     removeIcon.setAttribute("class", "removeIcon")
//     removeIcon.setAttribute("width", "20");
//     removeIcon.setAttribute("height", "20");
//     removeIcon.setAttribute("src", "data:image/svg+xml;utf8;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iaXNvLTg4NTktMSI/Pgo8IS0tIEdlbmVyYXRvcjogQWRvYmUgSWxsdXN0cmF0b3IgMTYuMC4wLCBTVkcgRXhwb3J0IFBsdWctSW4gLiBTVkcgVmVyc2lvbjogNi4wMCBCdWlsZCAwKSAgLS0+CjwhRE9DVFlQRSBzdmcgUFVCTElDICItLy9XM0MvL0RURCBTVkcgMS4xLy9FTiIgImh0dHA6Ly93d3cudzMub3JnL0dyYXBoaWNzL1NWRy8xLjEvRFREL3N2ZzExLmR0ZCI+CjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB4bWxuczp4bGluaz0iaHR0cDovL3d3dy53My5vcmcvMTk5OS94bGluayIgdmVyc2lvbj0iMS4xIiBpZD0iQ2FwYV8xIiB4PSIwcHgiIHk9IjBweCIgd2lkdGg9IjUxMnB4IiBoZWlnaHQ9IjUxMnB4IiB2aWV3Qm94PSIwIDAgNTEwIDUxMCIgc3R5bGU9ImVuYWJsZS1iYWNrZ3JvdW5kOm5ldyAwIDAgNTEwIDUxMDsiIHhtbDpzcGFjZT0icHJlc2VydmUiPgo8Zz4KCTxnIGlkPSJjYW5jZWwiPgoJCTxwYXRoIGQ9Ik0yNTUsMEMxMTQuNzUsMCwwLDExNC43NSwwLDI1NXMxMTQuNzUsMjU1LDI1NSwyNTVzMjU1LTExNC43NSwyNTUtMjU1UzM5NS4yNSwwLDI1NSwweiBNMzgyLjUsMzQ2LjhsLTM1LjcsMzUuNyAgICBMMjU1LDI5MC43bC05MS44LDkxLjhsLTM1LjctMzUuN2w5MS44LTkxLjhsLTkxLjgtOTEuOGwzNS43LTM1LjdsOTEuOCw5MS44bDkxLjgtOTEuOGwzNS43LDM1LjdMMjkwLjcsMjU1TDM4Mi41LDM0Ni44eiIgZmlsbD0iIzAwMDAwMCIvPgoJPC9nPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+Cjwvc3ZnPgo=");
//
//     removeLink.appendChild(removeIcon)
//
//     divNew.appendChild(document.createTextNode("Type de capteur: " + sensor.value + ". Salle: " + room.value ));
//     divNew.appendChild(removeLink)
//     ul.appendChild(divNew);
//
//     capteurs[index] = [sensor.value, room.value];
//
//     nombreCapteur ++;
//     index ++;
//     document.getElementById("resume3").innerHTML = "Vous avez actuellement ajouté: " + nombreCapteur + " capteur(s).";
// }

function removeItemCapteur(itemId){
    var ul = document.getElementById("dynamic-list-capteur");
    var removed = document.getElementById(itemId.toString());
    ul.removeChild(removed);

    delete capteurs[itemId.toString()];

    nombreCapteur --;
    document.getElementById("resumeCapteur").innerHTML = "Vous avez actuellement ajouté: " + nombreCapteur + " capteur(s).";
}

function removeItemPiece(itemId){
    var ul = document.getElementById("dynamic-list-piece");
    var removed = document.getElementById(itemId.toString());
    ul.removeChild(removed);
    var pieceInList = document.getElementById("p"+itemId.toString());
    listPiece.removeChild(pieceInList);
    delete capteurs[itemId.toString()];

    var capteurList = document.getElementById("dynamic-list-capteur").children;
    for (k = 0; k < capteurList.length; k++) {
        if (capteurList[k].getAttribute("salle") == "p"+itemId.toString()) {
            capteurList[k].parentNode.removeChild(capteurList[k]);
            k--;
            nombreCapteur--;
        }
    }

    nombrePiece --;
    document.getElementById("resumePiece").innerHTML = "Vous avez actuellement ajouté: " + nombrePiece + " pièce(s).";
}

function addItem(itemType){
    var group = slides[slideIndex];
    var contents = group.getElementsByClassName("content")[0].children;

    var divNew = document.createElement("div");
    divNew.setAttribute('class', "removeInline");
    divNew.setAttribute("id", index.toString())

    var removeLink = document.createElement("a");

    var removeIcon = document.createElement("img");
    removeIcon.setAttribute("class", "removeIcon");
    removeIcon.setAttribute("width", "20");
    removeIcon.setAttribute("height", "20");
    removeIcon.setAttribute("src", "data:image/svg+xml;utf8;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iaXNvLTg4NTktMSI/Pgo8IS0tIEdlbmVyYXRvcjogQWRvYmUgSWxsdXN0cmF0b3IgMTYuMC4wLCBTVkcgRXhwb3J0IFBsdWctSW4gLiBTVkcgVmVyc2lvbjogNi4wMCBCdWlsZCAwKSAgLS0+CjwhRE9DVFlQRSBzdmcgUFVCTElDICItLy9XM0MvL0RURCBTVkcgMS4xLy9FTiIgImh0dHA6Ly93d3cudzMub3JnL0dyYXBoaWNzL1NWRy8xLjEvRFREL3N2ZzExLmR0ZCI+CjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB4bWxuczp4bGluaz0iaHR0cDovL3d3dy53My5vcmcvMTk5OS94bGluayIgdmVyc2lvbj0iMS4xIiBpZD0iQ2FwYV8xIiB4PSIwcHgiIHk9IjBweCIgd2lkdGg9IjUxMnB4IiBoZWlnaHQ9IjUxMnB4IiB2aWV3Qm94PSIwIDAgNTEwIDUxMCIgc3R5bGU9ImVuYWJsZS1iYWNrZ3JvdW5kOm5ldyAwIDAgNTEwIDUxMDsiIHhtbDpzcGFjZT0icHJlc2VydmUiPgo8Zz4KCTxnIGlkPSJjYW5jZWwiPgoJCTxwYXRoIGQ9Ik0yNTUsMEMxMTQuNzUsMCwwLDExNC43NSwwLDI1NXMxMTQuNzUsMjU1LDI1NSwyNTVzMjU1LTExNC43NSwyNTUtMjU1UzM5NS4yNSwwLDI1NSwweiBNMzgyLjUsMzQ2LjhsLTM1LjcsMzUuNyAgICBMMjU1LDI5MC43bC05MS44LDkxLjhsLTM1LjctMzUuN2w5MS44LTkxLjhsLTkxLjgtOTEuOGwzNS43LTM1LjdsOTEuOCw5MS44bDkxLjgtOTEuOGwzNS43LDM1LjdMMjkwLjcsMjU1TDM4Mi41LDM0Ni44eiIgZmlsbD0iIzAwMDAwMCIvPgoJPC9nPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+Cjwvc3ZnPgo=");

    removeLink.appendChild(removeIcon);

    if (itemType == "user") {
        removeLink.setAttribute("title", "Supprimer l'utilisateur");
        removeLink.setAttribute("onclick", "removeItemUtilisateur(" + index + ")");

        if (statut.value == 1)
            divNew.appendChild(document.createTextNode("Nom : " + nom.value + ". Prénom : " + prenom.value + ". Email : " + email.value + ". Statut : Parent"));
        else
            divNew.appendChild(document.createTextNode("Nom : " + nom.value + ". Prénom : " + prenom.value + ". Email : " + email.value + ". Statut : Enfant"));
        utilisateurs[index] = [nom.value, prenom.value, email.value, statut.value];
        nombreUtilisateur ++;
        group.getElementsByClassName("resume")[0].innerHTML = "Vous avez actuellement ajouté: " + nombreUtilisateur + " utilisateur(s).";
    }
    else if (itemType == "capteur") {
        removeLink.setAttribute("title", "Supprimer le capteur");
        removeLink.setAttribute("onclick", "removeItemCapteur(" + index + ")");
        divNew.setAttribute("salle", roomSelect.children[roomSelect.selectedIndex].getAttribute("id"));
        divNew.appendChild(document.createTextNode("Type de capteur: " + sensorTypeSelect.value + ". Salle: " + roomSelect.value ));
        capteurs[index] = [sensorTypeSelect.value, roomSelect.value];
        nombreCapteur ++;
        group.getElementsByClassName("resume")[0].innerHTML = "Vous avez actuellement ajouté: " + nombreCapteur + " capteur(s).";
    }
    else if (itemType == "piece") {
        removeLink.setAttribute("title", "Supprimer la pièce");
        removeLink.setAttribute("onclick", "removeItemPiece(" + index + ")");
        divNew.setAttribute("name", nomPiece.value);
        divNew.appendChild(document.createTextNode("Nom: " + nomPiece.value + ". Superficie: " + superficiePiece.value ));
        pieces[index] = [nomPiece.value, superficiePiece.value];
        nombrePiece ++;
        group.getElementsByClassName("resume")[0].innerHTML = "Vous avez actuellement ajouté: " + nombrePiece + " pièce(s).";

        var optionPiece = document.createElement("option");
        optionPiece.setAttribute("value", nomPiece.value);
        optionPiece.setAttribute("id", "p" + index.toString());
        optionPiece.innerText = nomPiece.value;
        listPiece.appendChild(optionPiece);
    }

    divNew.appendChild(removeLink)
    group.getElementsByClassName("dynamic-list")[0].appendChild(divNew);

    index ++;
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
}

function confirm() {
    if (!mainNom.value || !mainPrenom.value || !mainEmail.value || !mdp.value || !mdp2.value) {
        //Erreur champs non renseigné
        slides[0].getElementsByClassName('error')[0].innerText = "Veuillez remplir tous les champs";
        slideIndex = 0;
        showDivs(0);
    }
    else if (mdp.value != mdp2.value) {
        //Mots de passe différents
        slides[0].getElementsByClassName('error')[0].innerText = "Confirmez le mot de passe";
        slideIndex = 0;
        showDivs(0);
    }
    // else if () {
    //     //Pas mail
    //     slides[0].getElementsByClassName('error')[0].innerText = "Renseignez une adresse email valide";
    //     slideIndex = 0;
    //     showDivs(0);
    // }
    else if (!nomHouse.value || !adresse.value || !superficie.value){
        slides[1].getElementsByClassName('error')[0].innerText = "Veuillez remplir tous les champs";
        slideIndex = 1;
        showDivs(1);
    }
    // else if () {
        //Superficie pas en int
        //     slides[1].getElementsByClassName('error')[0].innerText = "Renseignez une adresse valide";
        //     slideIndex = 1;
        //     showDivs(1);
    // }



    var all = {"mainUser" : [mainNom.value, mainPrenom.value, mainEmail.value, mdp.value, mdp2.value],
    "house" : [nomHouse.value, adresse.value, superficie.value],
    "users" : utilisateurs,
    "rooms": pieces,
    "sensors": capteurs};

    $.ajax({
        url:"index.php?action=addTotal",
        method:"POST",
        data:{infos:all},
        dataType:"text",
        success:callbackSuccess
    });
}

callbackSuccess = function(data)
{
}
