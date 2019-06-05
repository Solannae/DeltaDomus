

var slideIndex = 0;
showSlides();
addSystem();


var allSpans = document.getElementsByClassName("system");
for (span of allSpans) {
    var image = span.getElementsByTagName("img")[0];
    var title = span.getElementsByTagName("h4")[0]
    var description = span.getElementsByTagName('p')[0]

    changeable(title);
    changeable(description);
    deleteSpan(span.getElementsByClassName("deleteButton")[0]);
}

function showSlides() {
    var i;
    var slides = document.getElementsByClassName("mySlides");
    var dots = document.getElementsByClassName("dot");
    for (i = 0; i < slides.length; i++) {
       slides[i].style.display = "none";
    }
    slideIndex++;
    if (slideIndex > slides.length) {slideIndex = 1}
    for (i = 0; i < dots.length; i++) {
        dots[i].className = dots[i].className.replace("active", "");
    }
    slides[slideIndex-1].style.display = "block";
    setTimeout(showSlides, 3000); // Change image every 2 seconds
}

function addSystem() {
    var addButton = document.getElementById("add");

    addButton.addEventListener('click', function() {
        var newSystem = document.createElement("span");
        newSystem.classList.add("system");

        var image = document.createElement("img");
        image.setAttribute("src", "public/assets/imageCapteur/photo.svg");

        var title = document.createElement("h4");
        title.innerHTML = "Nouveau capteur";
        changeable(title);

        var description = document.createElement("p");
        description.innerHTML = "Description du système";
        changeable(description);

        var buttonToDelete = document.createElement("button");
        buttonToDelete.className = "deleteButton";
        buttonToDelete.innerHTML = "Supprimer";
        deleteSpan(buttonToDelete);

        newSystem.appendChild(image);
        newSystem.appendChild(title);
        newSystem.appendChild(description);
        newSystem.appendChild(buttonToDelete);
        this.parentNode.insertBefore(newSystem, this);
    });
}

function changeable(element) {
        element.addEventListener('click', function() {
            var content = this.innerText;
            var type = this.tagName;

            var input = document.createElement("textarea");
            input.setAttribute("rows", "10");
            input.innerHTML = content;

            this.parentNode.replaceChild(input, this);
            input.focus();

            input.addEventListener('blur', function(e) {
                var content = this.value;

                var paragraph = document.createElement(type);
                paragraph.innerText = content;

                this.parentNode.replaceChild(paragraph, this);
                changeable(paragraph);
            });

            input.addEventListener('change', function() {

            });
        });
}

function deleteSpan(element) {
    element.addEventListener('click', function() {
        var spanParent = this.parentNode;
        spanParent.parentNode.removeChild(spanParent);
    })
}

function save() {
    allSpans = document.getElementsByClassName('system');
    var systems = new Array();
    for (span of allSpans) {
        systems.push({
            id: span.getAttribute("id"),
            image: span.getElementsByTagName("img")[0].getAttribute("src"),
            title: span.getElementsByTagName("h4")[0].innerText,
            description: span.getElementsByTagName("p")[0].innerText
        });
    }

    $.ajax({
        url:"index.php?action=saveSystems",
        method:"POST",
        data:{test:systems},
        dataType:"text",
        success:callbackSuccess
    });
}

callbackSuccess = function(data)
{
    location.reload();
}

document.getElementById("save").addEventListener('click', save);
