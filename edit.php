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
    $num_patient = $_POST['num_patient'];
    $date_r = $_POST['date_r'];
    $heure_r = $_POST['heure_r'];
    $id_rep = $_POST['id_rep'];
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];

    $sql =("UPDATE rendez_vous SET date_r = :date_r, heure_r = :heure_r, id_rep = :id_rep, nom = :nom, prenom = :prenom WHERE num_patient = :num_patient");
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
    <title>Modifier rendez-vous</title>

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

    
            <h1>Modifier rendez-vous</h1>
     
            
        </header>
        
            <?php 
            
            if (isset($_GET["id"])) {
                $id = $_GET["id"];
                include("config.php");
                $sql = "SELECT * FROM rendez_vous WHERE id = $id";
                $result = mysqli_query($con,$sql);
                $row = mysqli_fetch_array($result);
                ?>


           <form action="edit.php?id=<?php echo $row['id']; ?>" method="post">
            <div class="form-elemnt my-4">
                <input type="text" class="form-control" name="num_patient" placeholder="num_patient:" value="<?php echo $row["num_patient"]; ?>">
            </div>

            <div class="form-elemnt my-4">
                <input type="text" class="form-control" name="date_r" placeholder="date:" value="<?php echo $row["date_r"]; ?>">
            </div>
            
            <div class="form-elemnt my-4">
                <input type="text" class="form-control" name="heure_r" placeholder="heure:" value="<?php echo $row["heure_r"]; ?>">
            </div>

            <div class="form-elemnt my-4">
                <input type="text" class="form-control" name="id_rep" placeholder="id_rep:" value="<?php echo $row["id_rep"]; ?>">
            </div>
            
            <div class="form-elemnt my-4">
                <input type="text" class="form-control" name="nom" placeholder="heure:" value="<?php echo $row["nom"]; ?>">
            </div>

            <div class="form-elemnt my-4">
                <input type="text" class="form-control" name="prenom" placeholder="date:" value="<?php echo $row["prenom"]; ?>">
            </div>


            <input type="hidden" name="id" value="<?php echo $row["id"]; ?>" >
            <div class="form-element">
                <input type="submit" name="edit" value="modifie" class="btn">
            </div>


            </form> 


                <?php
                 }else{
                    echo "<h3>Patient n'existe pas</h3>";
                }
                ?>

          
    </div>
</body>
</html>
