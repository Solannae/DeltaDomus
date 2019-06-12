var pannels = document.getElementsByClassName('piece-pannel');
for (var i = 0 ; i < pannels.length; i++) {
    // ajoute un EventListener à tous les elt de class piece-pannel
    pannels[i].addEventListener('click', function (event) {
        if (event.target.className == "piece-pannel-sub") {
            var elt = event.target.parentElement;
        } else {
            var elt = event.target;
        }
        document.getElementById('popup-title').innerHTML = elt.childNodes[0].data.trim();
        var popuptext = document.getElementById('popup-text');
        for (var i = 0 ; i < elt.children.length; i++) {
			if (elt.children[i].attributes[1].value == 1) {
				captValue = elt.children[i].attributes.donnee_capteur.value;
				popuptext.innerHTML += elt.children[i].innerText.split("=")[0] + " = " + "<span id='value-capt'>" + captValue + "</span>" + "<input type='range' min='0' max='150' value='" + captValue + "' class='slider-temp' oninput='updateInput(this.value)' style='float:right'><br><br><br>";
			}
            else if (elt.children[i].attributes[1].value == 2) {
                if (elt.children[i].attributes[2].value == 1)
                    var text =  "<label class='switch'><input type='checkbox' checked><span class='slider round'></span></label><br><br><br>"
                else {
                    var text =  "<label class='switch'><input type='checkbox'><span class='slider round'></span></label><br><br><br>"
                }
                popuptext.innerHTML += elt.children[i].innerText + text;
            }
            else if (elt.children[i].attributes[1].value == 12) {
                var text = "<button type='button' class='bubbly-button' onclick='moteurSensUn()'>Sens 1</button><button type='button' class='bubbly-button' onclick='moteurSensDeux()'>Sens 2</button><button type='button' class='bubbly-button' onclick='moteurStop()'>Stop</button>";
                popuptext.innerHTML += "Moteur: " + text;
            }
        }
		// popuptext.innerHTML += "<button type='button' class='bubbly-button' style='font-size:0.7em; align'>Submit</button>"
		popuptext.innerHTML += "<div id='buttonDiv' style='display: flex;align-items: center;justify-content: center;'><button type='button' class='bubbly-button' style='font-size:0.7em'>Submit</button></div>"
        // affiche le popup
        document.getElementById('light').style.display='block';
        document.getElementById('fade').style.display='block';
    });
}

// lorsqu'on clique en dehors du popup, cela ferme le popup
document.getElementById('fade').addEventListener('click', function (event) {
    document.getElementById('popup-text').innerHTML = '';
    document.getElementById('light').style.display='none';
    document.getElementById('fade').style.display='none';
});

function updateInput(value){
    document.getElementById("value-capt").innerHTML = value;
}

function moteurSensUn() {
    fetch('http://projets-tomcat.isep.fr:8080/appService/?ACTION=COMMAND&TEAM=003E&TRAME=1003E1301000101251B');
}

function moteurSensDeux() {
    fetch('http://projets-tomcat.isep.fr:8080/appService/?ACTION=COMMAND&TEAM=003E&TRAME=1003E1301000201251B');
}

function moteurStop() {
    fetch('http://projets-tomcat.isep.fr:8080/appService/?ACTION=COMMAND&TEAM=003E&TRAME=1003E1301000301251B');
}
