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
    if (!window.x ) {
        document.getElementById('main-nav').style.display = "flex";
    } else {
        document.getElementById('main-nav').style.display = "none";
    }
    x = !x;
});
