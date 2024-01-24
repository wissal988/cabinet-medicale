<?php
if (isset($_GET["id"])) {
include("config.php");
$id = $_GET["id"];
$sql = "DELETE FROM rendez_vous WHERE id=$id";
if(mysqli_query($con,$sql)){
    session_start();
    $_SESSION["delete"] = "Book Deleted Successfully!";
    header("Location:rendez-vous.php");
}else{
    die("Something went wrong");
}
}else{
    echo "patient n'existe pas";
}



?>