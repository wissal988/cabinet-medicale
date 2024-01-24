<?php


if(isset($_POST['submit'])){

   $username = $_POST['username'];
   $pass = $_POST['password'];
   
if( $username == "responsable" && $pass == "123456"){
   
         header('location:demande1.php');

   } 
     
   else{
      $error[] = "Mot de passe ou Nom d'utilisateur incorrecte";
   }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>login form</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="style.css">

</head>
<body>
   
<div class="form-container">

   <form action="" method="post">
      <h3>Connectez-vous</h3>
      <?php
      if(isset($error)){
         foreach($error as $error){
            echo '<span class="error-msg">'.$error.'</span>';
         };
      };
      ?>
      <div class="form">
      <input type="text" name="username" required placeholder="Nom d'utilisateur">
      <input type="password" name="password" required placeholder="Mot de passe">
      <input type="submit" name="submit" value="Connecter" class="form-btn">
    </div>
   </form>

</div>

</body>
</html>