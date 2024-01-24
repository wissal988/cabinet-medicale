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
if (isset($_POST['edit'])){
    $id_demande = $_POST['id'];
    $nss = $_POST['nss'];
    $categorie_service = $_POST['categorie_service'];
    $service = $_POST['service'];
    $date = $_POST['date'];
    $heure = $_POST['heure'];

    $sql = "UPDATE demande SET nss = :nss, categorie_service = :categorie_service, Services = :service,  date = :date, heure = :heure WHERE id_demande = :id_demande";

    $stmtt = $conn->prepare($sql);
    $stmtt->bindParam(':id_demande', $id_demande);
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
    <title>Modifier une demande</title>

     <style>
        body {
    background-color: #f8f9fa;
    font-family: Arial, sans-serif;
}

header {
    border-bottom: 1px solid #ccc;
    padding-bottom: 10px;
    margin-bottom: 20px;
}

h1 {
    font-size: 2em;
    color: #333;
}

.container {
    max-width: 600px;
    margin: 0 auto;
}


        .form-element {
            margin-bottom: 20px;
        }

input[type="text"] {
    width: 100%;
    padding: 10px;
    border-radius: 5px;
    border: 1px solid #ccc;
}

input[type="submit"] {
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    background-color: #007bff;
    color: #fff;
    cursor: pointer;
}

input[type="submit"]:hover {
    background-color: #0056b3;
}



     </style>



</head>
<body>
    <div class="container ">
    <header class="d-flex ">

    
            <h1>Modifier une demande</h1>
     
            
        </header>
        
            <?php 
            
                if (isset($_GET["id"])) {
                $id = $_GET["id"];
                include("config.php");
                $sql = "SELECT * FROM demande WHERE id_demande = $id";
                $result = mysqli_query($con,$sql);
                $row = mysqli_fetch_array($result);
            ?>


           <form action="edit_d.php?id=<?php echo $row['id_demande']; ?>" method="post">


            <div class="form-elemnt my-4">
                <input type="text" class="form-control" name="nss" placeholder="Nss:" value="<?php echo $row["nss"]; ?>">
            </div>

            <div class="form-elemnt my-4">
                <input type="text" class="form-control" name="categorie_service" placeholder="Categorie du service:" value="<?php echo $row["categorie_service"]; ?>">
            </div>
            
            <div class="form-elemnt my-4">
                <input type="text" class="form-control" name="service" placeholder="Service:" value="<?php echo $row["Services"]; ?>">
            </div>

            <div class="form-elemnt my-4">
                <input type="text" class="form-control" name="date" placeholder="Date:" value="<?php echo $row["date"]; ?>">
            </div>
            
            <div class="form-elemnt my-4">
                <input type="text" class="form-control" name="heure" placeholder="Heure:" value="<?php echo $row["heure"]; ?>">
            </div>

            <input type="hidden" name="id" value="<?php echo $row["id_demande"]; ?>" >
            <div class="form-element">
                <input type="submit" name="edit" value="modifier" class="btn">
            </div>


            </form> 


                <?php
                 }else{
                    echo "<h3>demande n'existe pas</h3>";
                }
                ?>

          
    </div>
</body>
</html>
