$(function() {
    $("#add_cours_form").validate(
            {
                rules: {
                    nom_cou: {
                        required: true
                    },
                    mat: {
                        required: true
                    },
                    heure_debut: {
                        required: true
                    },
                    heure_fin: {
                        required: true
                    }
                },
                messages: {
                    nom_cou: {
                        required: "Veuillez donner un nom au cours"
                    },
                    mat: {
                        required: "Veuillez ajouter une matière au cours"
                    },
                    heure_debut: {
                        required: "Veuillez indiquer l'heure de début"
                    },
                    heure_fin: {
                        required: "Veuillez indiquer l'heure de fin"
                    }
                },
                
                submitHandler: function (form) {

                    $.post(
                            "./json/add_cours.json.php?_=" + Date.now(),
                            {
                                nom_cou: $("#nom_cou").val(),
                                mat: $("#mat").val(),
                                heure_debut: $("#heure_debut").val(),
                                heure_fin: $("#heure_fin").val(),
                                ref_prof: $("#ref_prof").val(),
                                ref_classe: $("#ref_classe").val(),
                                ref_salle_classe: $("#ref_salle_classe").val()

                            },
                            function result(data, status) {
                                //Ajoute le message
                                message(data.message.texte, data.message.type);

                                //reset le form si ok
                                if (data.reponse) {
                                    $("#add_cours_form").trigger("reset");
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