$(function () {

    $("#connexion_form").validate(
            {
                debug: true,
                rules: {
                    mail_per: {
                        required: true,
                        email: true
                    },
                    password: "required"
                },

                messages: {
                    mail_per: {
                        required: "Votre adresse e-mail est indispensable à la connexion",
                        email: "Votre adresse e-mail doit avoir le format suivant : name@domain.com"
                    },
                    password: "Veuillez saisir votre mot de passe",
                },
                submitHandler: function (form) {
                    $.post(
                            "./json/login.json.php?_=" + Date(),
                            {
                                mail_per: $("#mail_per").val(),
                                password_per: $("#password_per").val()
                            },
                            function (data, status) {
                                //console.log("test");
                                if (data.message) {
                                    console.log(data.message.texte);
                                    message(data.message.texte, data.message.type);
                                }
                                if (data.reponse === true) {
                                    message("logué", "success");
                                    window.location.assign("index.php");
                                }
                            },
                            'json'
                            )
                }
            }
    );
});