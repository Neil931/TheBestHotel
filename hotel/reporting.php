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
        <title>Reporting</title>
        
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
        
        <div class="row">
            <div class="col-sm-3"></div>
            
            <div class="col-sm-6 custom-css">
           
                <ul>
                    <li><a href="reporting_result.php?id_rep=1"><p class="classP"><p class="classP">Liste des clients</a></p></li>
                    <li><a href="reporting_result.php?id_rep=2"><p class="classP">Liste des chambres</a></p></li>
                    <li><a href="reporting_result.php?id_rep=3"><p class="classP">Liste des réservations</a></p></li>
                    <li><a href="reporting_result.php?id_rep=4"><p class="classP">Liste des checkouts</a></p></li>
                    <li><a href="reporting_result.php?id_rep=5"><p class="classP">Liste des chambres avec avec des réparations</a></p></li>
                    <li><a href="reporting_result.php?id_rep=6"><p class="classP">Liste des employés</a></p></li>
                    <li><a href="reporting_result.php?id_rep=7"><p class="classP">Liste des fournisseurs</a></p></li>
                    <li><a href="reporting_result.php?id_rep=8"><p class="classP">Dépenses par prestataire</a></p></li>
                    <li><a href="reporting_result.php?id_rep=9"><p class="classP">Liste des hotels en France</a></p></li>
                    <li><a href="reporting_result.php?id_rep=10"><p class="classP">Liste des achats de fourniture par hotel</a></p></li>
                    <li><a href="reporting_result.php?id_rep=11"><p class="classP">Calcul du stock par hotel</a></p></li>
                    <li><a href="reporting_result.php?id_rep=12"><p class="classP">Chiffre d'affaire par pays</a></p></li>
                    <li><a href="reporting_result.php?id_rep=13"><p class="classP">Chiffre d'affaire par hotel 2022/2023</h3>	    
	
                </ul>

            </div>
        </div>
    </body>
</html>

