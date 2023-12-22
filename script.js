$(document).ready(function () {
    $("#enregistrerDonnees").click(function () {
        // Récupérer les données du formulaire
        var nom = $("#nom").val();
        var age = $("#age").val();

        // Créer un objet avec les données à envoyer à PHP
        var donneesAEnvoyer = {
            nom: nom,
            age: age
        };

        // Utilisation d'AJAX pour envoyer les données à PHP
        $.ajax({
            type: "POST",
            url: "traitement.php", // Spécifier le fichier PHP de traitement
            data: donneesAEnvoyer,
            success: function (reponse) {
                // Gérer la réponse du serveur PHP ici
                console.log(reponse);
            },
            error: function (erreur) {
                // Gérer les erreurs ici
                console.error("Erreur AJAX: " + erreur.statusText);
            }
        });
    });
});

