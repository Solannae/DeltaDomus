function showError(text, id = "error_message") {
    document.getElementById(id).style.visibility = "visible";
    document.getElementById(id).textContent = text;
}

function hideError(id = "error_message") {
    document.getElementById(id).style.visibility = "hidden";
    document.getElementById(id).textContent = "";
}