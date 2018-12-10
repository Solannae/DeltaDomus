document.addEventListener("DOMContentLoaded", function (event) {
    var url_string = window.location.href;
    var url = new URL(url_string);
    var c = url.searchParams.get("failed_login");
    if (c == 'true') {
        document.getElementById("error_message").style.visibility = "visible";
        document.getElementById("error_message").textContent = "Identifiants invalides.";
    }
});