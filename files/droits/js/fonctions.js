$(function () {


    $("#add_fonction_form").validate(
            {
                rules: {
                    nom_fnc: {
                        required: true,
                        minlength: 5
                    },
                    abr_fnc: {
                        required: true,
                        minlength: 3
                    },
                    desc_fnc: {
                        required: true,
                        minlength: 20
                    }

                },
                messages: {
                    nom_fnc: {
                        required: "Un nom de fonction est indispensable",
                        minlength: "Le nom de la fonction doit être composé de 5 caractères au minimum"
                    },
                    abr_fnc: {
                        required: "Une abréviation de fonction est indispensable",
                        minlength: "L'abréviation de la fonction doit être composé de 3 caractères au minimum"
                    },
                    desc_fnc: {
                        required: "Une description de fonction est indispensable",
                        minlength: "La description de la fonction doit être composé de 20 caractères au minimum"
                    }
                },
                submitHandler: function (form) {

                    $.post(
                            "./json/add_fonction.json.php?_=" + Date.now(),
                            {
                                nom_fnc: $("#nom_fnc").val(),
                                abr_fnc: $("#abr_fnc").val(),
                                desc_fnc: $("#desc_fnc").val()

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

    $("#del_fonction_form").validate(
            {
                rules: {
                    fnc: {
                        required: true
                    }

                },
                messages: {
                    nom_fnc: {
                        required: "Une fonction est indispensable"
                    }
                },
                submitHandler: function (form) {

                    $.post(
                            "./json/del_fonction.json.php?_=" + Date.now(),
                            {
                                id_fnc: $("#del_fnc").val()

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