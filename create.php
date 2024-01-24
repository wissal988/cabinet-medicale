<?php 
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "responsable";

try{
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username,$password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
}
catch (PDOException $e){
    echo"la connection a echoue" . $e->getMessage();
}
if (isset($_POST['create'])){
    $num_patient = $_POST['num_patient'];
    $date_r = $_POST['date_r'];
    $heure_r = $_POST['heure_r'];
    $id_rep = $_POST['id_rep'];
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];

    $sql =("INSERT INTO rendez_vous(num_patient, date_r, heure_r, id_rep, nom, prenom) VALUES(:num_patient, :date_r, :heure_r, :id_rep, :nom, :prenom)");
    $stmtt = $conn->prepare($sql);
    $stmtt->bindParam(':num_patient', $num_patient);
    $stmtt->bindParam(':date_r', $date_r);
    $stmtt->bindParam(':heure_r', $heure_r);
    $stmtt->bindParam(':id_rep', $id_rep);
    $stmtt->bindParam(':nom', $nom);
    $stmtt->bindParam(':prenom', $prenom);
    $stmtt->execute();
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <title>Ajouter un rendez-vous</title>
</head>
<body>
    <div class="container my-5">
    <header class="d-flex justify-content-between my-4">
            <h1>Ajouter un rendez-vous</h1>
            <div>
            <a href="rendez-vous.php" class="btn btn-primary">Retour</a>
            </div>
        </header>
        
        <form action="create.php" method="post">

            <div class="form-elemnt my-4">
                <input type="text" class="form-control" name="num_patient" placeholder="Numéro depatient">
            </div>

            <div class="form-elemnt my-4">
                <input type="date" class="form-control" name="date_r" placeholder="Date">
            </div>
           
            <div class="form-element my-4">
                <input type="time" class="form-control" name="heure_r" placeholder="Heure">
            </div>
             
            <div class="form-element my-4">
                <input type="text" class="form-control" name="id_rep" placeholder="Numero representent">
            </div>

            <div class="form-element my-4">
                <input type="text" class="form-control" name="nom" placeholder="Nom representent">
            </div>

            <div class="form-element my-4">
                <input type="text" class="form-control" name="prenom" placeholder="Prenom representent">
            </div>

            <div class="form-element my-4">
                <input type="submit" name="create" value="Ajouter" class="btn btn-primary">
            </div>
        </form>
        
        
    </div>
</body>
</html>
