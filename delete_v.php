<?php
if (isset($_GET["id_v"])) {
    include("config.php");
    $id = $_GET["id_v"]; 

   
    $sql = "DELETE FROM demande_v WHERE id_demande_v = $id";
    if (mysqli_query($con, $sql)) {
        session_start();
        $_SESSION["delete"] = "Supprimé avec succès !";
        header("Location: demande1.php");
        exit(); 
    } else {
        die("Quelque chose s'est mal passé");
    }
} else {
    echo "L'ID n'existe pas dans l'URL";
}



?>