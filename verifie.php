<?php
include("config.php");


if (isset($_POST["verifie"])) {
        $num_patient_v = mysqli_real_escape_string($con, $_POST["num_patient"]);
        $categorie_service_v = mysqli_real_escape_string($con, $_POST["categorie"]);
        $service_v = mysqli_real_escape_string($con, $_POST["service"]);
        $date_v = mysqli_real_escape_string($con, $_POST["date"]);
        $heure_v = mysqli_real_escape_string($con, $_POST["heure"]); 
    // Insert data into demande_v table
    $sqlInsert = "INSERT INTO demande_v (nss_v, categorie_service_v, Services_v, date_v, heure_v) VALUES ('$num_patient_v','$categorie_service_v','$service_v','$date_v','$date_v')"; 

    if(mysqli_query($con, $sqlInsert)) {

        $id = mysqli_real_escape_string($con, $_POST["id"]);

        $sqlDelete = "DELETE FROM demande WHERE id_demande = '$id'";

        if(mysqli_query($con, $sqlDelete)) {
            session_start();
            $_SESSION["verifie"] = "Added and Deleted Successfully!";
            header("Location:mail.php");
            exit(); 
        } else {
            die("Deletion failed");
        }
    } else {
        die("Insertion failed");
    }
}


?>