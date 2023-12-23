<?php
// Connexion à la base de données MySQL
$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = 'essai';

$conn = mysqli_connect($servername, $username, $password, $dbname);

// Vérification de la connexion
if (!$conn) {
    die('Erreur de connexion à la base de données: ' . mysqli_connect_error());
}

// Récupération des données du formulaire
$username = $_POST['username'];
$password = $_POST['password'];

// Requête pour vérifier les identifiants
$query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
$result = mysqli_query($conn, $query);

// Vérification du résultat de la requête
if (mysqli_num_rows($result) > 0) {
    echo 'success';
} else {
    echo 'error';
}

// Fermeture de la connexion à la base de données
mysqli_close($conn);
?>
