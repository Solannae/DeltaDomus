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
				popuptext.innerHTML += elt.children[i].innerText.split("=")[0] + " = " + "<span id='value-capt'>" + captValue + "</span>" + "<input type='range' min='0' max='150' value='" + captValue + "' class='slider-temp' oninput='updateInput(this.value)' style='float:right'><br>";
			}
            else if (elt.children[i].attributes[1].value == 2) {
                if (elt.children[i].attributes[2].value == 1)
                    var text =  "<label class='switch'><input type='checkbox' name='checkbox' checked><span class='slider round'></span></label><br>"
                else {
                    var text =  "<label class='switch'><input type='checkbox'><span class='slider round'></span></label><br>"
                }
                popuptext.innerHTML += elt.children[i].innerText + text;
            }
        }
		// popuptext.innerHTML += "<button type='button' class='bubbly-button' style='font-size:0.7em; align'>Submit</button>"
		popuptext.innerHTML += "<div id='buttonDiv' style='display: flex;align-items: center;justify-content: center;'><input type='submit' class='bubbly-button' style='font-size:0.7em' value='Submit'></div>"
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
