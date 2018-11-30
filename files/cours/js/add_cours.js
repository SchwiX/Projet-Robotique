$(function () {
    $("#add_cours_from").validate(
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
                                nom_per: $("#nom_cou").val(),
                                prenom_per: $("#mat").val(),
                                mail_per: $("#heure_debut").val(),
                                pass_per: $("#heure_fin").val()

                            },
                            function result(data, status) {
                                //Ajoute le message
                                message(data.message.texte, data.message.type);

                                //reset le form si ok
                                if (data.reponse) {
                                    $("#add_cours_form").trigger("reset");
                                }
                            }
                    );

                }
            }


    )


});