$(function () {
    $("#add_per_from").validate(
            {
                rules: {
                    nom_per: {
                        required: true
                    },
                    prenom_per: {
                        required: true
                    },
                    mail_per: {
                        required: true
                    },
                    pass_per: {
                        required: true
                    },
                    pass_conf_per: {
                        required: true
                    }
                },
                messages: {
                    nom_per: {
                        required: "Le nom est obligatoir"
                    },
                    prenom_per: {
                        required: "Le prenom est obligatoir"
                    },
                    mail_per: {
                        required: "Le mail est obligatoir"
                    },
                    pass_per: {
                        required: "Le mot de passe est obligatoir"
                    },
                    pass_conf_per: {
                        required: true
                    }
                },
                
                submitHandler: function (form) {

                    $.post(
                            "./json/add_personne.json.php?_=" + Date.now(),
                            {
                                nom_per: $("#nom_per").val(),
                                prenom_per: $("#prenom_per").val(),
                                mail_per: $("#mail_per").val(),
                                pass_per: $("#pass_per").val(),
                                pass_conf_per: $("#pass_conf_per").val()

                            },
                            function result(data, status) {
                                //Ajoute le message
                                message(data.message.texte, data.message.type);

                                //reset le form si ok
                                if (data.reponse) {
                                    $("#add_examen_form").trigger("reset");
                                }
                            }
                    );

                }
            }


    )


});