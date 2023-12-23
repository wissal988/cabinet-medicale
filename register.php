<?php 
// Récupérer les données du formulaire 
$username = $_POST['username']; 
$email = $_POST['email']; 
$password = $_POST['password']; 
 
// Effectuer les validations nécessaires 
 
// Connexion à la base de données MySQL 
$servername = "localhost"; 
$dbUsername = "root"; 
$dbPassword = ""; 
$dbName = "essai"; 
 
$conn = new mysqli($servername, $dbUsername, $dbPassword, $dbName); 
 
// Vérifier la connexion 
if ($conn->connect_error) { 
    die("Erreur de connexion à la base de données : " . $conn->connect_error); 
} 
 
// Insérer les données dans la table des utilisateurs 
$sql = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$password')"; 
 
if ($conn->query($sql) === TRUE) { 
    echo "Inscription réussie !"; 
} else { 
    echo "Erreur lors de l'inscription : " . $conn->error; 
} 
 
// Fermer la connexion à la base de données 
$conn->close(); 
?>