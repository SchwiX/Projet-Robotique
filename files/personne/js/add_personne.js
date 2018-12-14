$(function () {
    $("#add_per_from").validate({
            rules: {
                nom_per: {
                    required: true
                },
                prenom_per: {
                    required: true
                },
                mail_per: {
                    required: true
                }
            },
            messages: {
                nom_per: {
                    required: "Le nom est obligatoire"
                },
                prenom_per: {
                    required: "Le prenom est obligatoire"
                },
                mail_per: {
                    required: "Le mail est obligatoire"
                }
            },

            submitHandler: function (form) {

                $.post(
                    "./json/add_personne.json.php?_=" + Date.now(), {
                        nom_per: $("#nom_per").val(),
                        prenom_per: $("#prenom_per").val(),
                        date_per: $("#date_per").val(),
                        tel_per: $("#tel_per").val(),
                        addr_per: $("#addr_per").val(),
                        lieu_per: $("#lieu_per").val(),
                        npa_per: $("#npa_per").val(),
                        mail_per: $("#mail_per").val(),
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
