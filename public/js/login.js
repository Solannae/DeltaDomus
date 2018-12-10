document.addEventListener("DOMContentLoaded", function (event) {
    var url_string = window.location.href;
    var url = new URL(url_string);
    var c = url.searchParams.get("failed_login");
    if (c == 'true')
        document.getElementById("failed_login").style.visibility = "visible";
});