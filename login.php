<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "artculinaire";

try {
    // Connexion à la base de données
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo '<script>alert("La connexion a échoué : ' . $e->getMessage() . '")</script>';
}

if (isset($_POST['Inscrire'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $password2 = $_POST['password2'];

    // Vérifier si tous les champs sont remplis
    if (empty($username) || empty($email) || empty($password) || empty($password2)) {
        echo '<script>alert("Veuillez remplir tous les champs.")</script>';
    } else {
        if ($password !== $password2) {
            echo '<script>alert("Les mots de passe ne correspondent pas.")</script>';
        } else {
            // Hachage du mot de passe
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);

            try {
                // Préparation et exécution de la requête d'insertion
                $sql = "INSERT INTO users (username, email, password) VALUES (:username, :email, :password)";
                $stmt = $conn->prepare($sql);
                $stmt->bindParam(':username', $username);
                $stmt->bindParam(':email', $email);
                $stmt->bindParam(':password', $hashed_password);
                $stmt->execute();
				header("Location: login.php");
            } catch (PDOException $e) {
                echo '<script>alert("Impossible de traiter les données. Erreur : ' . $e->getMessage() . '")</script>';
            }
        }
    }
}

// Sélection des données de la table 'users'
$query = 'SELECT * FROM users';
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
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "artculinaire";

try {
    // Connexion à la base de données
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo '<script>alert("La connexion a échoué : ' . $e->getMessage() . '")</script>';
}

if (isset($_POST['Connexion'])) {
    if (!empty($_POST['username']) && !empty($_POST['password'])) {
        $username = htmlspecialchars($_POST['username']);
        $password = $_POST['password'];

        $recupUser = $conn->prepare('SELECT * FROM users WHERE username=?');
        $recupUser->execute(array($username));

        if ($recupUser->rowCount() > 0) {
            $userData = $recupUser->fetch();
            if (password_verify($password, $userData['password'])) {
                $_SESSION['username'] = $username;
                $_SESSION['password'] = $userData['password'];
                $_SESSION['id'] = $userData['id'];
                // Rediriger vers la page spécifique de l'utilisateur
                header("Location: user.php");
            } else {
                echo '<script>alert("Votre mot de passe ou nom d\'utilisateur est incorrect")</script>';
            }
        } else {
            echo '<script>alert("Votre mot de passe ou nom d\'utilisateur est incorrect")</script>';
        }
    } else {
        echo '<script>alert("Veuillez compléter les champs....")</script>';
    }
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Connexion/Inscription</title>
  <link href="https://cdn.lineicons.com/4.0/lineicons.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.5.0/css/flag-icon.min.css">
  <link rel="stylesheet" href="login.css">
</head>
<body>
            <ul class="language-switcher">			   
			<div class="language">
			<a href="loginarb.php">
            <div class="flag-icon language-icon">
			<i class="flag-icon flag-icon-sa"></i>
            </div>
            <span class="language-text text">Arabe</span>
			</a>
			</div>
			<div class="language">
			 <a href="#">
            <div class="flag-icon language-icon">
           <i class="flag-icon flag-icon-fr"></i>
            </div>
            <span class="language-text text">Français</span>
			</a>
			</div>
			</ul>
  <div class="container" id="container">

    <div class="form-container register-container">
      <form action="" method="post">
        <h1>Inscription.</h1>
        <input type="text" id="username" name="username" placeholder="Utilisateur" >
        <input type="email" id="email" name="email" placeholder="Email" >
        <input type="password" id="password" name="password" placeholder="Mot de passe" >
        <input type="password"  id="password2" name="password2" placeholder="Confirmez votre mot de passe">
        <button type="submit" name="Inscrire">Inscrire</button>
        <span>Ou utilisez votre compte</span>
        <div class="social-container">
          <a href="#" class="social"><i class="lni lni-facebook-fill"></i></a>
          <a href="#" class="social"><i class="lni lni-google"></i></a>
        </div>
      </form>
    </div>

    <div class="form-container login-container">
      <form action="" method="POST">
        <h1>Connexion.</h1>
         <input type="text" placeholder="Nom d'Utilisateur" id="username" name="username">
		 <input type="password" placeholder="Mot de passe" id="password" name="password">
        <div class="content">
          <div class="pass-link">
            <a href="#">Oublier le mot de passe </a>
          </div>
        </div>
        <button type="submit" name="Connexion">Connexion</button>
        <span>Ou Utilisez votre compte</span>
        <div class="social-container">
          <a href="#" class="social"><i class="lni lni-facebook-fill"></i></a>
          <a href="#" class="social"><i class="lni lni-google"></i></a>
         
        </div>
      </form>
    </div>

    <div class="overlay-container">
      <div class="overlay">
        <div class="overlay-panel overlay-left">
          <h1 class="title">Bonjour <br> Les Amis</h1>
          <p>Si vous avez un compte, Connectez-vous la</p>
          <button class="ghost" id="login">Connexion
            <i class="lni lni-arrow-left login"></i>
          </button>
        </div>
        <div class="overlay-panel overlay-right">
          <h1 class="title">Commencez votre <br>Journé maintenant</h1>
          <p>Si vous n'avez pas un compte , Rejoignez-nous et Commencez votre Journé.</p>
          <button class="ghost" id="register">Inscription
            <i class="lni lni-arrow-right register"></i>
          </button>
        </div>
      </div>
    </div>      

  </div>
  

  <script src="script.js"></script>

</body>
</html>