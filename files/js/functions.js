function message(message, type) {

    if (message !== '') {
        // Réinitialise l'élément alert (reset)
        $("#alert").attr("class", "").addClass("alert");

        // Initialise le  type de boîte (danger, warning, success, ...)
        $("#alert").addClass("alert-" + type);

        //Ajoute le message
        $("#alert .message").html(message);

        //Affiche
        $("#alert").css("display", "block");
    } else {
        $("#alert").css("display", "none");
    }
}