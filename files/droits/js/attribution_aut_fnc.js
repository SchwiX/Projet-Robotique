$(function () {
    $(".auth").click(function () {
        if ($(this).is(":checked")) {
            console.log("Attribution de l'autorisation : " + $(this).attr("id_aut") + " pour la fonction : " + $(this).attr("id_fnc"));
        } else {
            console.log("Retrait de l'autorisation :" + $(this).attr("id_aut") + " pour la fonction " + $(this).attr("id_fnc"));
        }

        $(this).parent().append("<img class=\"loading\" src=\"./../icones/loading.gif\" height=38px>");
        $(this).css("display", "none");

        $.post(
                "./json/add_del_aut_fnc.json.php?_=" + Date.now(),
                {
                    id_aut: $(this).attr("id_aut"),
                    id_fnc: $(this).attr("id_fnc"),
                    status: $(this).is(":checked"),
                    id_auth: $(this).attr("id")
                },
                function (data, status) {
                    message(data.message.texte, data.message.type);

                    if (data.operation == "add") {
                        $('#' + data.id_auth).parent().css("background", "lightgreen");
                    } else {
                        $('#' + data.id_auth).parent().css("background", "#F99494");
                    }

                    $("#" + data.id_auth).siblings('.loading').remove();
                    $("#" + data.id_auth).css("display", "block");
                }
        );
    });
});