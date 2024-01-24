
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="rendez-vous-style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <title>Envoyer un Email</title>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://cdn.jsdelivr.net/npm/@emailjs/browser@3/dist/email.min.js"></script>

    <style>
      body {
        font-family: Arial, sans-serif;
        
      }

      h1 {
        text-align: center;
      }

      label {
        display: block;
        margin-top: 8px;
      }

      input[type="text"],
      textarea {
        width: 100%;
        padding: 8px;
        margin-top: 5px;
        margin-bottom: 10px;
        border-radius: 5px;
        border: 1px solid #ccc;
        box-sizing: border-box;
      }

      textarea {
        resize: vertical;
      }

      button {
        padding: 10px 20px;
        background-color: #007bff;
        color: white;
        border: none;
        border-radius: 5px;
        cursor: pointer;
      }

      button:hover {
        background-color: #0056b3;
      }

      #message,#subject {
    width: 15%;
    padding: 8px;
    margin-top: 5px;
    margin-bottom: 10px;
    border-radius: 5px;
    border: 1px solid #ccc;
   
  }

  #message,#subject:hover {
    border-color: #0056b3;
  }

  /* Styling for options */
  #message,#subject option {
    background-color: white;
    color: black;
  }

  /* Hover state for options */
  #message,#subject option:hover {
    background-color: #f0f0f0;
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
                <a href="demande.php">
                <i class='bx bxs-archive-in'></i>
                <span>Demandes</span> 
                </a>
            </li>
            <li>
                <a href="#">
                <i class='bx bxs-chat'></i>    
                <span>Avis-patients</span> 
                </a>
            </li>
            <li>
                <a href="#" class="logout">
                <i class='bx bx-log-out'></i>    
                <span>Deconnecter</span> 
                </a>
            </li>
        </ul>
    </div>

    



    <div class="main--content">
    <div class="header--wrapper">
        <div class="header--title">
            <h2>Envoyer un Email</h2>
        </div>
        
        <div class="user--info">
            <img src="user.JPG" alt="">
        </div>
    </div>
    
    
      <label for="sendername" >Nom d'Expéditeur</label>
      <input type="text" id="sendername" value="MediomeServices">
    
      <label for="to">Destinataire (Email)</label>
      <input type="text" id="to">
      
      
      <label for="replyto">Expéditeur (Email)</label>
      <input type="text" id="replyto" value="rafikmouaici2003@gmail.com">

      <label for="subject">Sujet</label>
         <select id="subject">
          <option value="confirmée">Confirmée</option>
          <option value="annulée">Annulée</option>
           </select>


      <label for="message">Message</label>
      <select id="message">
          <option value="Votre demande est confirmée">Confirmée</option>
          <option value="Votre demande est annulée à cause de l'indisponibilité d'un médecin ou un infirmier">Annulée</option>
           </select><br><br><br>
        
          


      <button type="button"  onclick="sendMail();"><a href="demande1.php" style="color: white;" >Envoyer</a></button>
    
      
      

    


      <script>



        function sendMail(){
          (function(){
            emailjs.init("JzUZcGqGkghBvlmsz"); // Account Public Ke
          })();
  
          var params = {
            sendername: document.querySelector("#sendername").value,
            to: document.querySelector("#to").value,
            subject: document.querySelector("#subject").value,
            replyto: document.querySelector("#replyto").value,
            message: document.querySelector("#message").value,
          };
  
          var serviceID = "service_rafik"; // Email Service ID
          var templateID = "template_hfrw2o9"; // Email Template ID
  
          emailjs.send(serviceID, templateID, params)
          .then( res => {
              alert("Email sent successfully!!")
          })
          .catch();
        }
      </script>


   
</div> 
</body>
</html>

                   