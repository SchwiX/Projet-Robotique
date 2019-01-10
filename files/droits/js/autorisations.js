$(function () {


    $("#add_autorisation_form").validate(
            {
                rules: {
                    nom_aut: {
                        required: true,
                        minlength: 10
                    },
                    code_aut: {
                        required: true,
                        rangelength: [3, 4]
                    },
                    desc_adm_aut: {
                        required: true,
                        minlength: 20
                    },
                    desc_usr_aut: {
                        required: true,
                        minlength: 20
                    }

                },
                messages: {
                    nom_aut: {
                        required: "Un nom d'autorisation est indispensable",
                        minlength: "Le nom d'autorisation doit être composé de 10 caractères au minimum"
                    },
                    code_aut: {
                        required: "Une abréviation d'autorisation est indispensable",
                        rangelength: "L'abréviation d'autorisation doit être composé de 3 à 4 caractères"
                    },
                    desc_adm_aut: {
                        required: "Une description d'autorisation est indispensable",
                        minlength: "La description d'autorisation administrateur doit être composé de 20 caractères au minimum"
                    },
                    desc_usr_aut: {
                        required: "Une description d'autorisation est indispensable",
                        minlength: "La description d'autorisation utilisateur doit être composé de 20 caractères au minimum"
                    }
                },
                submitHandler: function (form) {

                    $.post(
                            "./json/add_autorisation.json.php?_=" + Date.now(),
                            {
                                nom_aut: $("#nom_aut").val(),
                                code_aut: $("#code_aut").val(),
                                desc_adm_aut: $("#desc_adm_aut").val(),
                                desc_usr_aut: $("#desc_usr_aut").val()

                            },
                            function result(data, status) {
                                //Ajoute le message
                                message(data.message.texte, data.message.type);

                                //reset le form si ok
                                if (data.reponse) {
                                    window.location.reload();
                                }
                            }
                    )

                }
            }
    );

    $("#del_autorisation_form").validate(
            {
                rules: {
                    aut: {
                        required: true
                    }

                },
                messages: {
                    nom_aut: {
                        required: "Une fonction est indispensable"
                    }
                },
                submitHandler: function (form) {

                    $.post(
                            "./json/del_autorisation.json.php?_=" + Date.now(),
                            {
                                nom_aut: $("#del_aut").val(),
                                code_aut: $("option:selected").attr('code_aut')

                            },
                            function result(data, status) {
                                //Ajoute le message
                                message(data.message.texte, data.message.type);

                                //reset le form si ok
                                if (data.reponse) {
                                    window.location.reload();
                                }
                            }
                    );

                }
            }
    );


});