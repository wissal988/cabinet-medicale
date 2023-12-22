<?php
// Récupérer les données envoyées depuis JavaScript
$nom = $_POST['nom'];
$age = $_POST['age'];

// Se connecter à la base de données (vous devez remplacer les informations de connexion)
$connexion = new mysqli('localhost', 'root', '', 'ajax');

// Vérifier la connexion
if ($connexion->connect_error) {
    die("Échec de la connexion à la base de données: " . $connexion->connect_error);
}

// Préparer la requête SQL pour insérer les données
$requete = "INSERT INTO infos (nom, age) VALUES ('$nom', $age)";

// Exécuter la requête
if ($connexion->query($requete) === TRUE) {
    echo "Données enregistrées avec succès";
} else {
    echo "Erreur lors de l'enregistrement des données: " . $connexion->error;
}

// Fermer la connexion à la base de données
$connexion->close();
?>
