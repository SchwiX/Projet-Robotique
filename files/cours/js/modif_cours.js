$(function() {
    $("#modif_cours_form").validate(
            {
                rules: {
                    nom_cour: {
                        required: true
                    },
                    mat_cour: {
                        required: true
                    },
                    hrs_debut: {
                        required: true
                    },
                    hrs_fin: {
                        required: true
                    }
                },
                messages: {
                    nom_cour: {
                        required: "Veuillez donner un nom au cours"
                    },
                    mat_cour: {
                        required: "Veuillez ajouter une matière au cours"
                    },
                    hrs_debut: {
                        required: "Veuillez indiquer l'heure de début"
                    },
                    hrs_fin: {
                        required: "Veuillez indiquer l'heure de fin"
                    }
                },
                
                submitHandler: function (form) {

                    $.post(
                            "./json/modif_cours.json.php?_=" + Date.now(),
                            {
                                id_cou : $("#id_cou").val(),
                                nom_cour: $("#nom_cour").val(),
                                mat_cour: $("#mat_cour").val(),
                                hrs_debut: $("#hrs_debut").val(),
                                hrs_fin: $("#hrs_fin").val(),
                                ref_prof: $("#ref_prof").val(),
                                ref_classe: $("#ref_classe").val(),
                                ref_salle: $("#ref_salle").val()

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