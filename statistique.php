
        <?php 
require_once('config.php');

$querry = "SELECT id_rep, nom, prenom, COUNT(*) AS nombre_occurrences FROM rendez_vous GROUP BY id_rep, nom, prenom";
$result = mysqli_query($con, $querry);

$querryt = "SELECT Services_v, COUNT(*) AS nombre_occurrences FROM demande_v GROUP BY Services_v";
$resultt = mysqli_query($con, $querryt);

// Vérifier si la requête s'est exécutée avec succès
if ($resultt) {
    // Formatage des données
    $labels = array();
    $data = array();
    while ($rowtt = mysqli_fetch_assoc($resultt)) {
        $labels[] = $rowtt['Services_v'];
        $data[] = $rowtt['nombre_occurrences'];
    }
} else {
    echo "La requête a échoué : " . mysqli_error($con);
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Statistique</title>
    <link rel="stylesheet" href="rendez-vous-style.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
   
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
                <h2>Statistiques</h2>
            </div>
            <div class="user--info">
                 <img src="user-circle-solid-24.png" alt="">
            </div>
        </div>
        <div class="tabular--wrapper">
            <h3 class="main--title">Nombre des rendez-vous par chaque representant:</h3>
            <div class="table-container">
            <table>
             <thead>
               <tr>
               <th>ID_representant</th>
               <th>Nom</th>
               <th>Prenom</th>
               <th>N rendez-vous:</th>
               </tr>
             </thead>
             <tbody>
             <?php
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    if (isset($row['id_rep'])) {
                    echo "<td>" . $row['id_rep'] . "</td>";}
                    echo "<td>" . $row['nom'] . "</td>";
                    echo "<td>" . $row['prenom'] . "</td>";
                    echo "<td>" . $row['nombre_occurrences'] . "</td>";
                    echo "</tr>";
                 }
                ?>
           </tbody>
           </table>
            </div>
        </div>
        <div class="tabular--wrapper">
            <h3 class="main--title">Difference entre les services demandés:</h3>
            <div class="table-container">
              <canvas id="myChart"></canvas>
            </div>
        </div>
    </div>
    
</body>
</html>
<script>
    // Initialisation du graphe
    var ctx = document.getElementById('myChart').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: <?php echo json_encode($labels); ?>,
            datasets: [{
                label: 'Nombre d\'occurrences',
                data: <?php echo json_encode($data); ?>,
                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                borderColor: 'rgba(75, 192, 192, 1)',
                borderWidth: 1
            }]
        },
        options: {
            // Vos options de graphe ici
        }
    });
</script>