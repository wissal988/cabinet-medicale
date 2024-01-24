<?php 
require_once('config.php');
$querry = "select * from demande";
$result = mysqli_query($con,$querry);




$querry_v = "select * from demande_v";
$result_v = mysqli_query($con,$querry_v);


$sqlt = "SELECT COUNT(*) as total_elements FROM demande";
$resultt = mysqli_query($con, $sqlt);
$rowt = mysqli_fetch_assoc($resultt);

$sqlt1 = "SELECT COUNT(*) as total_elements1 FROM demande_v";
$resultt1 = mysqli_query($con, $sqlt1);
$rowt1 = mysqli_fetch_assoc($resultt1);

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
    <script>
    function togglePopup(id_d) {
      document.getElementById("popup1-" + id_d).classList.toggle("active");
      document.querySelector("#popup1-" + id_d + " .close-btn").addEventListener("click", function() {
        document.querySelector("#popup1-" + id_d).classList.remove("active");
      });
    }
  </script>
<style>
    .filter-select {
        padding: 8px 12px;
        font-size: 16px;
        border: 1px solid #ccc;
        border-radius: 4px;
        background-color: #fff;
        color: #333;
        outline: none; 
    }

</style>


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
            <h2>La liste des Demandes</h2>
        </div>
        
        <div class="user--info">
            <img src="user-circle-solid-24.png" alt="">
            <a href="create_d.php" class="btn btn-primary">Ajouter une demande</a>
            <a href="patient.php" class="btn btn-primary">Rechercher un patient</a>
        </div>

       
    </div>

    


    <div class="tabular--wrapper">
        <div class="table-container">
            <table>
                <thead>
                    <tr>
                        
                        <th>Numéro de securité social</th>
                        <th>Categorie du service</th>
                        <th>Service</th>
                        <th>Date</th>
                        <th>heure</th>
                        <th>Traitement</th>
                        <th>Vérification</th>
                        <th>Modification</th>
                        
                    </tr>
                </thead>

                
                
                <?php 
                while($row = mysqli_fetch_assoc($result)) {
                ?>
                <tbody>
                    <tr class="data-row">   
                    
                        <td><?php echo $row['nss']; ?></td>
                        <td><?php echo $row['categorie_service']; ?></td>
                        <td><?php echo $row['Services']; ?></td>
                        <td><?php echo $row['date']; ?></td>
                        <td><?php echo $row['heure']; ?></td>                        
                        <td><button  class="button-style" onclick="togglePopup(<?php echo $row['id_demande']; ?>)">Traiter</button></td>
                        
                        <td><form action="verifie.php" method="post">
                        <input type="hidden" name="num_patient" value="<?php echo $row['nss']; ?>">
                        <input type="hidden" name="categorie" value="<?php echo $row['categorie_service']; ?>">
                        <input type="hidden" name="service" value="<?php echo $row['Services']; ?>">
                        <input type="hidden" name="date" value="<?php echo $row['date']; ?>">
                        <input type="hidden" name="heure" value="<?php echo $row['heure']; ?>">
                        <input type="hidden" name="id" value="<?php echo $row['id_demande']; ?>">
                        <input type="submit" name="verifie" value="Ajouter" class="btn btn-primary" onclick="return confirm('Êtes-vous sûr de bien vouloir ajouter cet élément?')">
                        </form></td>  
                        <td><a href="edit_d.php?id=<?php echo $row['id_demande']; ?>" class="edit-btn">Modifier</a></td>
                        </tr>
                    </tbody>
                    
                        
                    </tr>
                </tbody>
                <div class="popup1" id="popup1-<?php echo $row['id_demande']; ?>">
                    <div class="close-btn">&times;</div>
                    <div class="form"><form action="demande1.php" method="post">
                        <label for="service">Num_demande:</label>
                        <input type="text" id="id_d" name="id_d"  value="<?php echo $row['id_demande'];?>"><br><br>
                        <label for="nss">Num_patient:</label>
                        <input type="text" id="nss" name="nss"  value="<?php echo $row['nss'];?>"><br><br>
                        <label for="categorie_service">Categorie du service demandé :</label>
                        <input type="text" id="categorie_service" name="categorie_service"  value="<?php echo $row['categorie_service'];?>">
                        <br><br><br>
                        <label style="color:#000;"for="service" >Le service demandée :</label>
                        <input type="text" id="service" name="service"  value="<?php echo $row['Services'];?>"><br><br><br>

                        <label style="color:#000;"for="date" >La date demandée :</label>
                        <input type="text" id="date" name="date" value="<?php echo $row['date'];?>"><br><br><br>
                        <label style="color:#000;"for="heure" >L'heure demandée :</label>
                        <input type="text" id="heure" name="heure" value="<?php echo $row['heure'];?>"><br><br><br>
                        <input type="hidden" name="nss" value="<?php echo $row['nss'];?>">
                        <div class="envoi"><input type="submit" value="Recherche" name="recherche" style="width:100%;height:40px;border:none;font-size:16px;background:rgba(113, 99, 186, 255);color:#f5f5f5;border-radius:10px;cursor:pointer;"></div>
                    </form></div>
                    </div>
                <?php 
                }
                ?>
                <tfoot>
                    <td colspan="9">Nombre de demande: <?php echo $rowt['total_elements']?></td>
                </tfoot>
            </table>
        </div>


        <div class="tabular--wrapper">
            <h3 class="main--title">Resultat du traitement recherche:</h3>
            <div class="table-container">
                <table>
                    <thead>
                        <tr>
                            <th>Num_medecin</th>
                            <th>Nom</th>
                            <th>Prenom</th>
                            <th>Specialite</th>
                            <th>action</th>
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
                   $num_patient = $_POST["nss"];
                   $id_d = $_POST["id_d"];
                   $service = $_POST["categorie_service"];
                   $date = $_POST["date"];
                   $heure = $_POST["heure"];
    
                    if ($service == 'Medical') {
                        $sthh = $conn->prepare("SELECT * FROM medecin WHERE id NOT IN (SELECT id_rep FROM rendez_vous WHERE date_r = :date AND heure_r = :heure)");
                    } else if ($service == 'Paramedical') {
                        $sthh = $conn->prepare("SELECT * FROM infermier WHERE id NOT IN (SELECT id_rep FROM rendez_vous WHERE date_r = :date AND heure_r = :heure)");
                    }


                    $sthh->setFetchMode(PDO::FETCH_ASSOC);
                    $sthh->bindParam(':date', $date);
                    $sthh->bindParam(':heure', $heure);
                    $sthh->execute();
                    $resultats = $sthh->fetchAll();

    
                ?>
    <?php foreach ($resultats as $rows) { ?>
        <tr>
            <td><?php echo $rows['id']; ?></td>
            <td><?php echo $rows['nom']; ?></td>
            <td><?php echo $rows['prenom']; ?></td>
            <td><?php echo $rows['specialite']; ?></td>
            <td>
                <form action="demande1.php" method="post">
                    <input type="hidden" value="<?php echo $service; ?>" name="service">
                    <input type="hidden" value="<?php echo $num_patient; ?>" name="num_patient">
                    <input type="hidden" value="<?php echo $date; ?>" name="date">
                    <input type="hidden" value="<?php echo $heure; ?>" name="heure">
                    <input type="hidden" value="<?php echo $rows['id']; ?>" name="id">
                    <input type="hidden" value="<?php echo $rows['nom']; ?>" name="nom">
                    <input type="hidden" value="<?php echo $rows['prenom']; ?>" name="prenom">
                    <button class="button-style" type="submit" name="selectionner">Sélectionner</button>
                    <input type="hidden" value="<?php echo $rows['id']; ?>" name="id_selectionne">
                </form>
            </td>
        </tr>

    <?php } }
        if (isset($_POST['selectionner'])) {
            $num_patient = $_POST['num_patient'];
            $id_selectionne = $_POST['id_selectionne'];
            $datee = $_POST['date'];
            $heure = $_POST['heure'];
            $nom = $_POST['nom'];
            $prenom = $_POST['prenom'];

            $sql = ("INSERT INTO rendez_vous(num_patient, date_r, heure_r, id_rep, nom, prenom) VALUES(:num_patient, :datee, :heure, :id, :nom, :prenom)");
            $stmtt = $conn->prepare($sql);
            $stmtt->bindParam(':num_patient', $num_patient);
            $stmtt->bindParam(':datee', $datee);
            $stmtt->bindParam(':heure', $heure);
            $stmtt->bindParam(':id', $id_selectionne);
            $stmtt->bindParam(':nom', $nom);
            $stmtt->bindParam(':prenom', $prenom);
            $stmtt->execute();
        }
    
?>




                    </tbody>
                    
                </table>
            </div>
        </div>
            




    </div><br><br><br><br>


    <div class="header--wrapper">
        <div class="header--title">
            <h2>La liste des Demandes vérifiées</h2>
        </div>
        
        
    </div>

    <div class="tabular--wrapper">
        <div class="table-container">
            <table>
                <thead style="background-color: lightgreen;">
                    <tr>
                        
                        <th>Numéro de securite sociale:</th>
                        <th>Categorie du service</th>
                        <th>Service</th>
                        <th>Date</th>
                        <th>Heure</th>
                        <th></th>
                        
                    </tr>
                </thead>

                <?php 
                while($rowv = mysqli_fetch_assoc($result_v)) {
                ?>
                <tbody>
                    <tr class="data-row">   
                        <td><?php echo $rowv['nss_v']; ?></td>
                        <td><?php echo $rowv['categorie_service_v']; ?></td>
                        <td><?php echo $rowv['Services_v']; ?></td>
                        <td><?php echo $rowv['date_v']; ?></td>
                        <td><?php echo $rowv['heure_v']; ?></td>
                        <td><a href="delete_v.php?id_v=<?php echo $rowv['id_demande_v']; ?>" class="delete-btn"  >Delete</a></td>

                    </tr>
                </tbody>
                <?php 
                }
                ?>
                <tfoot>
                    <td colspan="9">Nombre des demandes verifiées: <?php echo $rowt1['total_elements1']?></td>
                </tfoot>
            </table>
        </div>


</div>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
   <script>
    function tooglePopup(id_d) {
  document.getElementById("popup1-" + id_d).classList.toggle("active");
  document.querySelector("#popup1-" + id_d + " .close-btn").addEventListener("click", function() {
    document.querySelector("#popup1-" + id_d).classList.remove("active");
  });
}
</script>

</body>
</html>

                   