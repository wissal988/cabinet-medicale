<?php 
include('config.php');




if (isset($_POST["edit"])) {
    $num_patient = mysqli_real_escape_string($con, $_POST["num_patient"]);
    $date_r = mysqli_real_escape_string($con, $_POST["date_r"]);
    $heure_r = mysqli_real_escape_string($con, $_POST["heure_r"]);
    $id_rep = mysqli_real_escape_string($con, $_POST["nom"]);
    $nom = mysqli_real_escape_string($con, $_POST["id_rep"]);
    $prenom = mysqli_real_escape_string($con, $_POST["prenom"]);
    $sqlUpdate = "UPDATE rendez_vous SET num_patient = '$num_patient', date_r = '$date_r', heure_r = '$heure_r', id_rep = '$id_rep', nom = '$nom', prenom = '$prenom' WHERE id='$id'";
    if(mysqli_query($con,$sqlUpdate)){
        session_start();
        $_SESSION["update"] = "Updated Successfully!";
        header("Location:rendez-vous.php");
    }else{
        die("Something went wrong");
    }
}
?>