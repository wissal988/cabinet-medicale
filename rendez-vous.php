<?php 
require_once('config.php');
$querry = "select * from rendez_vous";
$result = mysqli_query($con,$querry);

$sqlt = "SELECT COUNT(*) as total_elements FROM rendez_vous";
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
    <title>programme</title>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
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
            <h2>La liste des rendez-vous</h2>
        </div>
        
        <div class="user--info">
            <img src="user-circle-solid-24.png" alt="">
            <a href="create.php" class="btn btn-primary">Ajouter un rendez-vous</a>
        </div>

       
    </div>

   
    <div class="tabular--wrapper">
        <div class="table-container">
            <table>
                <thead>
                    <tr>
                        
                        <td>Numéro de patient</td>
                        <td>Date</td>
                        <td>Heure</td>
                        <td>ID_representant</td>
                        <td>Nom</td>
                        <td>Prenom</td>
                        <td></td>
                        <td></td>
                    </tr>
                </thead>

                <?php 
                while($row = mysqli_fetch_assoc($result)) {
                ?>
                <tbody>
                    <tr>   
                        
                        <td><?php echo $row['num_patient']; ?></td>
                        <td><?php echo $row['date_r']; ?></td>
                        <td><?php echo $row['heure_r']; ?></td>
                        <td><?php echo $row['id_rep']; ?></td>
                        <td><?php echo $row['nom']; ?></td>
                        <td><?php echo $row['prenom']; ?></td>
                        <td><a href="edit.php?id=<?php echo $row['id']; ?>" class="edit-btn">Edit</a></td>
                        <td><a href="delete.php?id=<?php echo $row['id']; ?>" class="delete-btn"  onclick="return confirm('Êtes-vous sûr de bien vouloir supprimer cet élément?')">Delete</a></td>
                    </tr>
                </tbody>
                <?php 
                }
                ?>
                <tfoot>
                    <td colspan="8">Nombre des rendez_vous: <?php echo $rowt['total_elements']?></td>
                </tfoot>
            </table>
        </div>
    </div>
</div>
</body>
</html>

                   