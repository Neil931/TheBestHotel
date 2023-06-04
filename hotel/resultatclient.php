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
<html>
<html lang="fr">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        
        <title>Enregistrement employé</title>        
        <!--  Stylesheet -->
        <link href="css/style.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    </head>

    <body>
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
	            <a href="logout.php">Déconnection</a>
            </li>      
        </ul>
        
        <div class="titre"><h3>Enregistrement client validé</h3></div> 
        <div class="employe">
      
            <?php 
                include_once"config.php";
                $vcust_id = $_GET['cust_id'];
                $sql=mysqli_query($conn,"SELECT gender_name, cust_first_name, cust_last_name, cust_address1, cust_address2, cust_address3,cust_zipcode,cust_city_name,name_country, cust_phone_num, cust_email FROM neil_customer,neil_gender,neil_country WHERE cust_id= '$vcust_id' AND neil_customer.cust_gender_id = neil_gender.gender_id AND neil_customer.cust_country_id = neil_country.country_id;");
                $row=mysqli_fetch_assoc($sql);          
            ?> 
            
            <div id="left">
                Civilité:<BR>
                Prénom:<BR>
                Nom:<BR>
                Adresse 1:<BR>
                Adresse 1:<BR>
                Adresse 1:<BR>
                Code postal:<BR>
                Ville:<BR>
                Pays:<BR>
                Numéro de téléphone:<BR>
                Email:<BR>               
            </div>
            
            <div id="right">
                <p>
                    <?=$row["gender_name"] ?><BR>
        		    <?=$row["cust_first_name"] ?><BR>
        		    <?=$row["cust_last_name"] ?><BR>
        		    <?=$row["cust_address1"] ?><BR>
        		    <?=$row["cust_address2"] ?><BR>
        		    <?=$row["cust_address3"] ?><BR>
        		    <?=$row["cust_zipcode"] ?><BR>
        		    <?=$row["cust_city_name"] ?><BR>
        		    <?=$row["name_country"] ?><BR>
        		    <?=$row["cust_phone_num"] ?><BR>
        		    <?=$row["cust_email"] ?><BR>
                </p>
    		</div>
        </div>
    </body>
</html>
