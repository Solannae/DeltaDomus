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
            popuptext.innerHTML += elt.children[i].innerText + " <label class='switch'><input type='checkbox' checked><span class='slider round'></span></label><br>";
        }
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
