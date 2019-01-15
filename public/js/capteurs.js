var pannels = document.getElementsByClassName('piece-pannel');
for (var i = 0 ; i < pannels.length; i++) {
    pannels[i].addEventListener('click', function (event) {
        // console.log(event);
        if (event.target.className == "piece-pannel-sub") {
            var elt = event.target.parentElement;
        } else {
            var elt = event.target;
        }
        document.getElementById('popup-title').innerHTML = elt.childNodes[0].data.trim();
        var popuptext = document.getElementById('popup-text');
        for (var i = 0 ; i < elt.children.length; i++) {
            popuptext.innerHTML += elt.children[i].innerText + "<br>";
        }
        document.getElementById('light').style.display='block';
        document.getElementById('fade').style.display='block';
    });
}

document.getElementById('fade').addEventListener('click', function (event) {
    document.getElementById('popup-text').innerHTML = '';
    document.getElementById('light').style.display='none';
    document.getElementById('fade').style.display='none';
});
