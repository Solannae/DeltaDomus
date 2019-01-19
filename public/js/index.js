let menuToggle = document.querySelector('.toggle-menu');
let firstLine = document.querySelector('.first');
let secondLine = document.querySelector('.second');
let thirdLine = document.querySelector('.third');
let menu = document.querySelector('#main-nav');
var x = false;
document.getElementById('main-nav').style.display = "none";


menuToggle.addEventListener('click', (e) => {
    e.preventDefault();
    firstLine.classList.toggle('rotate-first');
    secondLine.classList.toggle('hide-second');
    thirdLine.classList.toggle('rotate-third');
    menu.classList.toggle('display-menu');
    if (!window.x) {
        document.getElementById('main-nav').style.display = "flex";
    } else {
        document.getElementById('main-nav').style.display = "none";
    }
    x = !x;
});

var animateButton = function(e) {

    e.preventDefault;
    e.target.classList.remove('animate');
    e.target.classList.add('animate');
    setTimeout(function() {
        e.target.classList.remove('animate');
    }, 700);
};

var bubblyButtons = document.getElementsByClassName("bubbly-button");

for (var i = 0; i < bubblyButtons.length; i++) {
    bubblyButtons[i].addEventListener('click', animateButton, false);
}
