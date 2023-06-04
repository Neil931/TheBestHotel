<?php
  // Initialiser la session
  session_start();
  // Vérifiez si l'utilisateur est connecté, sinon redirigez-le vers la page de connexion
  if(!isset($_SESSION["username"])){
    header("Location: login.php");
    exit(); 
  }
?>

<!DOCTYPE html>
<html lang="fr">
    <head>
	    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Client - enregistrement</title>
        
        <!--  Stylesheet -->
        <link href="css/style.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    </head>
    
    <body style="text-align: center;">
        <!-- Menu -->
        <ul class="menu">
            <li>
                <a href="index.php">Accueil</a>
            </li>
            <li>
                <a href="clientreservation.php">Réservation</a>
            </li>
            <li>
                <a href="fournisseurs.php">Fournisseurs</a>
            </li>
            <li>
                <a href="employes.php">Employés</a>
            </li>
            <li>
                <a href="reporting.php">Reporting</a>
            </li>
            <li>
                <a href="logout.php">Déconnexion</a>
            </li>
        </ul>
      
        <div class="conteneurindex">
          <?php
    	      include_once "./config.php";
    	      // requête pour obtenir le nom de l'hotel sur la base du staff_id
              $query = $pdo->query("
                          SELECT 
                          neil_hotel.htl_id,
                          htl_name,
                          staff_gender_id,
                          staff_first_name,
                          staff_last_name   
                          FROM neil_hotel,
                          neil_staff,
                          neil_users 
                          WHERE neil_staff.staff_id = neil_users.staff_id and 
                          neil_hotel.htl_id = neil_staff.htl_id and 
                          neil_staff.staff_id = '". $_SESSION['staff_id'] ."'");
                          
              $row = $query->fetch(PDO::FETCH_ASSOC);
               
              if ($row) {
                  $_SESSION['htl_id'] = $row['htl_id'];
                  $_SESSION['htl_name'] = $row['htl_name']; 
              }  
           ?>
           <span class="largecaract"><?=$row["htl_name"] ?><BR><BR><BR><BR><?=$row["staff_first_name"] ?>&nbsp;&nbsp;<?=$row["staff_last_name"] ?></span>
        </div>
    </body>
</html>
