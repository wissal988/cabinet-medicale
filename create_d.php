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
    $nss = $_POST['nss'];
    $categorie_service = $_POST['categorie_service'];
    $service = $_POST['service'];
    $date = $_POST['date'];
    $heure = $_POST['heure'];

    $sql =("INSERT INTO demande(nss, categorie_service, Services, date, heure) VALUES(:nss, :categorie_service, :service, :date, :heure)");
    $stmtt = $conn->prepare($sql);
    $stmtt->bindParam(':nss', $nss);
    $stmtt->bindParam(':categorie_service', $categorie_service);
    $stmtt->bindParam(':service', $service);
    $stmtt->bindParam(':date', $date);
    $stmtt->bindParam(':heure', $heure);
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
            <h1>Ajouter un demande</h1>
            <div>
            <a href="demande1.php" class="btn btn-primary">Retour</a>
            </div>
        </header>
        
        <form action="create_d.php" method="post">

            <div class="form-elemnt my-4">
                <input type="text" class="form-control" name="nss" placeholder="Numéro de patient">
            </div>

            <div class="form-elemnt my-4">
                <input type="text" class="form-control" name="categorie_service" placeholder="Categorie du service">
            </div>
           
            <div class="form-element my-4">
                <input type="text" class="form-control" name="service" placeholder="Service">
            </div>
             
            <div class="form-element my-4">
                <input type="date" class="form-control" name="date" placeholder="Date">
            </div>

            <div class="form-element my-4">
                <input type="time" class="form-control" name="heure" placeholder="Heure">
            </div>

            <div class="form-element my-4">
                <input type="submit" name="create" value="Ajouter" class="btn btn-primary">
            </div>
        </form>
        
        
    </div>
</body>
</html>
