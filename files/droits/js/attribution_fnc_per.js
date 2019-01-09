$(function () {
    $(".auth").click(function () {
        if ($(this).is(":checked")) {
            console.log("Activation de la fonction " + $(this).attr("id_fnc") + " pour la personne " + $(this).attr("id_per"));
        } else {
            console.log("Desctivation de la fonction " + $(this).attr("id_fnc") + " pour la personne " + $(this).attr("id_per"));
        }

        /* Remplace la checkbox pendant le traitemenr */
        $(this).parent().append("<img class=\"loading\" src=\"./../icones/loading.gif\" height=38px>");
        $(this).css("display", "none");

        $.post(
            "./json/add_del_fnc_per.json.php?_="+Date.now(),
            {
                id_per:$(this).attr("id_per"),
                id_fnc:$(this).attr("id_fnc"),
                status:$(this).is(":checked"),
                id_auth:$(this).attr("id")
            },
            function(data,status){
                if(data.operation == "add"){
                    $("#"+data.id_auth).parent().css("background","lightgreen");
                }else{
                    $("#"+data.id_auth).parent().css("background","#F99494");
                }
            }
        );
    });

    //affiche l'en-tête lorsque l'on scrolle
    $(window).scroll(function () {
        if ($(this).scrollTop() > 130) {
            if ($(".tab_en-tete").html() == '') {
                create_entete();
            }
        } else {
            $(".tab_en-tete").html("");
        }
    });

    //réaffiche l'en-tête lorsque l'on bouge la page
    $(window).resize(function () {
        if ($(this).scrollTop() > 130) {
            create_entete();
        } else {
            $(".tab_en-tete").html("");
        }
    });

    //affiche l'en-tête
    function create_entete() {
        $(".tab_en-tete").html("");//vide la div d'en-tête

        $('.tab_en-tete').append("<table class=\"table table-bordered\"><tbody><tr></tr></tbody></table>");//Ajout le tableau
        $(".firstLine th").each(function () {
            $('.tab_en-tete table tbody tr').append('<th class="en-tete" style="width:' + ($(this).width() + 18) + 'px;">' + $(this).html() + '</th>');
        });
    }
});