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
     
        <title>Enregistrement fournisseur</title>        
        <!--  Stylesheet -->
        <link href="css/style.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    </head>
    
    <body>
        <ul class="menu">
            <li><a href="index.php">Accueil</a></li>
            <li><a href="clientreservation.php">Réservation</a></li>    
            <li><a href="fournisseurs.php">Fournisseurs</a></li>        
            <li><a href="employes.php">Employés</a></li>
            <li><a href="reporting.php">Reporting</a></li>   
            <li><a href="logout.php">Déconnection</a></li>      
        </ul>


        <div class="row">
            <div class="col-sm-2"></div>
            <div class="col-sm-8" style="background-color: white;">  
         
                        <h3 style="text-align: center;">Enregistrement fournisseur validé</h3>
    		            <h3 style="text-align: center;"><?= $_SESSION['htl_name']?></h3>
                        <hr class="my-1" style="background-color: #C0C0C0; border-width: 2px;">  

      
                        <?php 
                            include_once"config.php";
                            
                            $vpvd_id = $_GET['pvd_id'];
                            $query = $pdo->query("SELECT pvd_name, siren, pvd_address1, pvd_address2, pvd_address3, pvd_zipcode, pvd_city_name, name_country, pvd_contact_name, pvd_phone_num, pvd_email FROM neil_provider, neil_country WHERE pvd_id = '$vpvd_id' AND neil_provider.pvd_country_id = neil_country.country_id;");
                            $row = $query->fetch(PDO::FETCH_ASSOC);
                       
                            if ($row) {
                                      
                        ?>

                        <table>
                         <tr>   
                            <td>Société:</td>
                            <td><?=$row["pvd_name"] ?></td>
                         <tr>
                         <tr>   
                            <td>Siren:</td>
                            <td><?=$row["siren"] ?></td>
                         <tr>                             
                         </tr>        
                            <td>Adresse 1:</td>
                            <td><?=$row["pvd_address1"] ?></td>
                         <tr>
                         </tr>                            
                            <td>Adresse 2:</td>
                            <td><?=$row["pvd_address2"] ?></td>
                         <tr>
                         </tr>                           
                            <td>Adresse 3:</td>
                            <td><?=$row["pvd_address3"] ?></td>
                         <tr>
                         </tr>                           
                            <td>Code postal</td>
                            <td><?=$row["pvd_zipcode"] ?></td>
                         <tr>
                         </tr>                           
                            <td>Ville:</td>
                            <td><?=$row["pvd_city_name"] ?></td>
                         <tr>
                         </tr>                            
                            <td>Pays:</td>
                            <td><?=$row["name_country"] ?></td>
                          <tr>
                          </tr>                           
                            <td>Nom du contact:</td>
                            <td><?=$row["pvd_contact_name"] ?></td>
                         <tr>
                         </tr>                            
                            <td>Numéro de téléphone:</td>
                            <td><?=$row["pvd_phone_num"] ?></td>
                         <tr>
                         </tr>                          
                            <td>Adresse email:</td>
                            <td><?=$row["pvd_email"] ?></td>
                         </tr>
                       
                       </table>
                    <?php 
                        }   
                    ?>
            </div>
        </div>    
    </body>
</html>


