$(function () {
    $("#add_per_form").validate(
        {
            rules: {
                nom_per: {
                    required: true
                },
                prenom_per: {
                    required: true
                },
                date_per: {
                    required: true
                },
                tel_per: {
                    required: true
                },
                adresse_per: {
                    required: true
                }, 
                lieu_per: {
                    required: true
                },
                npa_per: {
                    required: true
                },
                mail_per: {
                    email: true,
                    required: true
                },
                pass_per: {
                    required: true
                },
                conf_pass_per:{
                    required: true,
                    equalTo: "#pass_per"
                }
            },
            messages: {
                nom_per: {
                    required: "Le nom est obligatoire"
                },
                prenom_per: {
                    required: "Le prenom est obligatoire"
                },
                date_per: {
                    required: "La date est obligatoire"
                },
                tel_per: {
                    required: "Le téléphone est obligatoire"
                },
                adresse_per: {
                    required: "L'adresse est obligatoire"
                },
                lieu_per: {
                    required: "Le lieu est obligatoire"
                },
                npa_per: {
                    required: "L'npa est obligatoire"
                },
                mail_per: {
                    email: "Doit être un mail",
                    required: "Le mail est obligatoire"
                },
                pass_per: {
                    required: "Le mot de passe est obligatoire"
                },
                conf_pass_per:{
                    required: "La confirmation mot de passe est obligatoire",
                    equalTo: "Ne correspond pas au mot de passe entré"
                }
                
            },

            submitHandler: function (form) {

                $.post(
                    "./json/add_personne.json.php?_=" + Date.now(), {
                        nom_per: $("#nom_per").val(),
                        prenom_per: $("#prenom_per").val(),
                        adresse_per: $("#adresse_per").val(),
                        lieu_per: $("#lieu_per").val(),
                        npa_per: $("#npa_per").val(),
                        mail_per: $("#mail_per").val(),
                        pass_per: $("#pass_per").val(),
                        date_per: $("#date_per").val(),
                        tel_per: $("#tel_per").val()
                    },
                    function result(data, status) {
                        //Ajoute le message
                        message(data.message.texte, data.message.type);

                        //reset le form si ok
                        /*if (data.reponse) {
                            $("#add_examen_form").trigger("reset");
                        }*/
                    }
                );
            }
        }
    )
});
