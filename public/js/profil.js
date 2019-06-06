var idUser = document.getElementById("idUser").innerText;

showForm = function() {
    entering.disabled = true;

    var main = document.getElementById('placeholder');

    var resetBackground = document.createElement("div");
    main.appendChild(resetBackground);

    var form = document.createElement("form");
    form.setAttribute("action", "index.php?action=resetPassword");
    form.setAttribute("method", "post");
    resetBackground.appendChild(form);

    var oldPassword = document.createElement("input");
    oldPassword.setAttribute("type", "password");
    oldPassword.setAttribute("placeholder", "Mot de passe actuel");
    oldPassword.setAttribute("name", "oldPassword");
    form.appendChild(oldPassword);

    var newPassword = document.createElement("input");
    newPassword.setAttribute("type", "password");
    newPassword.setAttribute("placeholder", "Nouveau mot de passe");
    newPassword.setAttribute("name", "newPassword");
    form.appendChild(newPassword);

    var confirmPassword = document.createElement("input");
    confirmPassword.setAttribute("type", "password");
    confirmPassword.setAttribute("placeholder", "Confirmez le mot de passe");
    form.appendChild(confirmPassword);

    var errorText = document.createElement("label");
    form.appendChild(errorText);

    var submit = document.createElement("button");
    submit.innerText = "Sauvegarder";
    submit.classList.add("bubbly-button");
    submit.addEventListener('click', function() {
        var newPassword = form.children[1];
        var confirmPassword = form.children[2];

        if (newPassword.value != confirmPassword.value || newPassword.value == "") {
            errorText.innerText = "Veuillez confimer le mot de passe";
            event.preventDefault();
        }
    });
    form.appendChild(submit);
};




var entering = document.getElementById('resetPassword');
entering.addEventListener('click', showForm);
