<?php 
require_once('config.php');
$querry = "select * from user";
$result = mysqli_query($con,$querry);

$sqlt = "SELECT COUNT(*) as total_elements FROM user";
$resultt = mysqli_query($con, $sqlt);
$rowt = mysqli_fetch_assoc($resultt);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="rendez-vous-style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <title>demande</title>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
    </head>
<body>

<div class="sidebar">
        <div class="logo"></div>

        <ul class="menu">
            <li>
                <a href="rendez-vous.php">
                <i class='bx bxs-calendar'></i>   
                <span>Rendez-vous</span>
                </a> 
            </li>
            <li>
                <a href="demande1.php">
                <i class='bx bxs-archive-in'></i>
                <span>Demandes</span> 
                </a>
            </li>
            <li>
                <a href="patient.php">
                <i class='bx bx-group'></i>    
                <span>Patients</span> 
                </a>
            </li>
            <li>
                <a href="statistique.php">
                <i class='bx bxs-bar-chart-alt-2'></i>   
                <span>Statistique</span> 
                </a>
            </li>
            <li>
                <a href="loginresponsable.php" class="logout">
                <i class='bx bx-log-out'></i>    
                <span>Deconnecter</span> 
                </a>
            </li>
        </ul>
    </div>

    



    <div class="main--content">
    <div class="header--wrapper">
        <div class="header--title">
            <h2>La liste des Patients</h2>
        </div>
        
        <div class="user--info">
            <img src="user-circle-solid-24.png" alt="">
            <div class="row">
            <div class="col-md-12">
            
                    <div class="card-body">
                        <div class="row">
                            <div style="display:contents;"class="col-md-7">

                                <form action="patient.php" method="POST">
                                    <div class="input-group mb-3">
                                        <input style="width: 340px;top: 10px;" type="text" name="search" required value="" class="form-control" placeholder="Entrer Nss">
                                        <button style="top: 10px;" type="submit" class="btn btn-primary" name="recherche">Recherche</button>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

       
    </div>

    <div class="tabular--wrapper">
            <h3 class="main--title">Resultat du recherche patient:</h3>
            <div class="table-container">
                <table>
                    <thead>
                        <tr>
                        <th>Numéro de securité social</th>
                        <th>Nom patient</th>
                        <th>Sexe</th>
                        <th>Age</th>
                        <th>Habitat</th>
                        <th>Telephone</th>
                        <th>Adresse e-mail</th>
                        <th>Condition chronique</th>
                        <th>Traitement suivi</th>
                        </tr>
                    </thead>
                    <tbody>
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
                   if (isset($_POST["recherche"])) {
                   $nss = $_POST["search"];
                   $sthh = $conn->prepare("SELECT * FROM user WHERE Nss LIKE '%$nss%'");
                   $sthh->setFetchMode(PDO::FETCH_ASSOC);
                   $sthh->execute();
                   $resultats = $sthh->fetchAll();
    
                ?>
    <?php foreach ($resultats as $rows) { ?>
        <tr>
            <td><?php echo $rows['Nss']; ?></td>
            <td><?php echo $rows['nom']; ?></td>
            <td><?php echo $rows['sexe']; ?></td>
            <td><?php echo $rows['age']; ?></td>
            <td><?php echo $rows['adresse']; ?></td>
            <td><?php echo $rows['num']; ?></td>
            <td><?php echo $rows['email']; ?></td>
            <td><?php echo $rows['Chronic_Conditions']; ?></td>
            <td><?php echo $rows['traitement']; ?></td>   
            
        </tr>
    
    <?php } }
    
?>




                    </tbody>
                    
                </table>
            </div>
        </div>
            




    


    <div class="tabular--wrapper">
        <div class="table-container">
            <table>
                <thead>
                    <tr>
                        
                        <th>Numéro de securité social</th>
                        <th>Nom patient</th>
                        <th>Sexe</th>
                        <th>Age</th>
                        <th>Habitat</th>
                        <th>Telephone</th>
                        <th>Adresse e-mail</th>
                        <th>Condition chronique</th>
                        <th>Traitement suivi</th>
                        
                    </tr>
                </thead>
                <?php 
                while($row = mysqli_fetch_assoc($result)) {
                ?>
                <tbody>
                    <tr class="data-row">   
                    
                        <td><?php echo $row['Nss']; ?></td>
                        <td><?php echo $row['nom']; ?></td>
                        <td><?php echo $row['sexe']; ?></td>
                        <td><?php echo $row['age']; ?></td>
                        <td><?php echo $row['adresse']; ?></td>
                        <td><?php echo $row['num']; ?></td>
                        <td><?php echo $row['email']; ?></td>
                        <td><?php echo $row['Chronic_Conditions']; ?></td>
                        <td><?php echo $row['traitement']; ?></td>                         
                        
                        
                        
                    </tbody>
                    
                <?php }?>        
                    </tr>
                </tbody>
                <tfoot>
                    <td colspan="9">Nombre des patients: <?php echo $rowt['total_elements']?></td>
                </tfoot>
            </table>
        </div>
    </div>

</body>
</html>        
