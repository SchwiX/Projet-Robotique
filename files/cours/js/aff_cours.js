$(function() {
    $("#del_form").validate(
            {
                rules: {
                    id_cou: {
                        required: false
                    }
                },
                messages: {
                    
                },
                
                submitHandler: function (form) {

                    $.post(
                            "./json/aff_cours.json.php?_=" + Date.now(),
                            {
                                id_cou: $("#id_cou").val()
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