$(function() {
    $("#aff_cours_form").validate(
            {
                rules: {
                    order: {
                        required: true
                    }
                },
                messages: {
                    order: {
                        required: "Veuillez choisir un filtre"
                    }
                },
                
                submitHandler: function (form) {

                    $.post(
                            "./../affichage_cours.php",
                            {
                                order: $("#order").val()
                            },
                            function result(data, status) {
                                //Ajoute le message
                                message(data.message.texte, data.message.type);

                                //reset le form si ok
                                if (data.reponse) {
                                    $("#aff_cours_form").trigger("reset");
                                }
                                
                                //Ajoute le message
                                $("#alert .message").html(data.message.texte);
                                $("#alert").addClass("alert-"+data.message.type);
                                $("#alert").css("display", "block");
                            }
                    );

                }
            }


    )


});