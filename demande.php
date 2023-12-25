<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "medidom";

try {
    // Connexion à la base de données
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo '<script>alert("La connexion a échoué : ' . $e->getMessage() . '")</script>';
}

if (isset($_POST['Send'])) {
    $Nss = $_POST['Nss'];
    $nom = $_POST['nom'];
    $sexe = $_POST['sexe'];
    $age = $_POST['age'];
    $adresse = $_POST['adresse'];
    $num = $_POST['num'];
    $email = $_POST['email'];
    $Chronic_Conditions = $_POST['Chronic_Conditions'];
    $traitement = $_POST['traitement'];

    // Vérifier si tous les champs sont remplis
    if (empty($Nss) || empty($nom)|| empty($sexe) || empty($age) || empty($adresse) ||empty($num) || empty($email) || empty($Chronic_Conditions)|| empty($traitement)) {
        echo '<script>alert("Veuillez remplir tous les champs.")</script>';
    }else {

            try {
                // Préparation et exécution de la requête d'insertion
                $sql = "INSERT INTO user (Nss, nom,sexe, age,adresse, num, email,Chronic_Conditions,traitement) VALUES (:Nss, :nom,:sexe,:age,:adresse, :num, :email,:Chronic_Conditions,:traitement)";
                $stmt = $conn->prepare($sql);
                $stmt->bindParam(':Nss', $Nss);
                $stmt->bindParam(':nom', $nom);
                $stmt->bindParam(':sexe', $sexe);
                $stmt->bindParam(':age', $age);
                $stmt->bindParam(':adresse', $adresse);
                $stmt->bindParam(':num', $num);
                $stmt->bindParam(':email', $email);
				$stmt->bindParam(':Chronic_Conditions', $Chronic_Conditions);
                $stmt->bindParam(':traitement', $traitement);
                $stmt->execute();
				echo'<script>alert("Information inserted successfully")</script>';
            } catch (PDOException $e) {
				if ($e->getCode() == '23000') {
				echo '<script>alert("You are already Registred")</script>';
				} else {
				echo '<script>alert("Unable to process data. Error: ' . $e->getMessage() . '")</script>';
						}
            }
        }
		
    }


// Sélection des données de la table 'user'
$query = 'SELECT * FROM user';
$stmt = $conn->query($query);

$data = array();
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $data[] = $row;
}

// Encodage des données en JSON
$json = json_encode($data);

// Envoyer les données JSON au client (décommentez les lignes ci-dessous si nécessaire)
// header('Content-Type: application/json');
// echo $json;
?>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "medidom";

try {
    // Connexion à la base de données
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo '<script>alert("La connexion a échoué : ' . $e->getMessage() . '")</script>';
}

if (isset($_POST['Save'])) {
	$nss = $_POST['nss'];
    $categorie_service = $_POST['categorie_service'];
    $Services = $_POST['Services'];
    $date = $_POST['date'];
    $heure = $_POST['heure'];

    // Vérifier si tous les champs sont remplis
    if (empty($nss)||empty($date) ||empty($heure)) {
        echo '<script>alert("Veuillez remplir tous les champs.")</script>';
    }else {
           

            try {
                // Préparation et exécution de la requête d'insertion
                $sql = "INSERT INTO demande (nss, categorie_service,Services, date, heure) VALUES (:nss,:categorie_service,:Services,:date,:heure) ";
                $stmt = $conn->prepare($sql);
				$stmt->bindParam(':nss', $nss);
                $stmt->bindParam(':categorie_service', $categorie_service);
                $stmt->bindParam(':Services', $Services);
                $stmt->bindParam(':date', $date);
                $stmt->bindParam(':heure', $heure);
                $stmt->execute();
				} catch (PDOException $e) {
				// Check if the error is related to a foreign key constraint violation
				if ($e->getCode() == '23000') {
				echo '<script>alert("Please enter your information first.")</script>';
				} else {
				echo '<script>alert("Unable to process data. Error: ' . $e->getMessage() . '")</script>';
    }
}
        }
}		
    


// Sélection des données de la table 'demande'
$query = 'SELECT * FROM demande';
$stmt = $conn->query($query);

$data = array();
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $data[] = $row;
}

// Encodage des données en JSON
$json = json_encode($data);

// Envoyer les données JSON au client (décommentez les lignes ci-dessous si nécessaire)
// header('Content-Type: application/json');
// echo $json;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="demande.css">
    <title>Book Appointment</title>
</head>

<body>

    <div class="container" id="container">
        <div class="form-container sign-up">
		<form action="" method="post">
		<input type="number" name="nss" placeholder="Social Security Number">
		<label for="categorie_service">Service categories</label>
		<select name="categorie_service" id="categorie_service" onchange="toggleServices()">
		<option value="Medical">Medical</option>
        <option value="Paramedical">Paramedical</option>
		</select>
		<label for="Medical_Services">Services</label>
		<select name="Services" id="Medical_Services">
		<option value="cardiology">Cardiology</option>
		<option value="pediatrics">Pediatrics</option>
		<option value="rheumatology">Rheumatology</option>
		<option value="General Medicine">General Medicine</option>
		<option value="phsychiatre">psychiatry</option>
		</select>
		<label for="Paramedical_Services" style="display: none;">Paramedical Services:</label>
		<select name="Services" id="Paramedical_Services">
		<option value="Rehabilitation Services">Rehabilitation Services</option>
		<option value="Dressing Change">Dressing Change</option>
		<option value="post-operative follow-up">post-operative follow-up</option>
		</select>
		<label>Consultation Date:</label>
		<input type="date" name="date">
		<label>Consultation Time:</label>
		<input type="time" name="heure">
		<div class="buttons">
		<input type="reset" value="Effacer">
		<input name="Save" type="submit" value="Save">
		</div>
		
		
		
		</form>
        </div>
        <div class="form-container sign-in">
            <form action="" method="post">
                <h1>Enter Your Information</h1>
            <span> If you are not Registred</span>
			<input type="number" name="Nss" placeholder="Social Security Number">
			<input type="text" name="nom" placeholder="Full Name">
			<select name="sexe">
			<option value="female">Female</option>
			<option value="male">Male</option>
			 </select>
			<input type="number" name="age" placeholder="Age">
			<input type="text" name="adresse" placeholder="Address">
			<input type="tel" name="num" placeholder="Phone Number" maxlength="10" >
			<input type="email" name="email" placeholder="Email">
			<input type="text" name="Chronic_Conditions" placeholder="Chronic Conditions">
			<input type="text" name="traitement" placeholder="Medical Treatment Used">
			<div class="btn"><button name="Send">Send</button></div>

			
            </form>
        </div>
        <div class="toggle-container">
            <div class="toggle">
                <div class="toggle-panel toggle-left">
                    <h1></h1>
					<img src="medidom1.png" >
                    <p><b>If you are not registred enter your personal details to be able to send your book Appointment<br> HERE! <i class="fas fa-arrow-left"></i></b></p>
                    <button class="hidden" id="login">Enter Your Informations</button>
                </div>
                <div class="toggle-panel toggle-right">
                    <h1>Welcome To Medidom Services</h1>
					<img src="medidom1.png">
                     <p><b>If you are registred send your book Appointment <br> HERE! <i class="fas fa-arrow-right"></i></b></p>
                    <button class="hidden" id="register">Book Appointment</button>
                </div>
            </div>
        </div>
    </div>

    <script src="demande.js"></script>
</body>

</html>