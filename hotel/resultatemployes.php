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
            <li><a href="index.php">Accueil</a></li>
            <li><a href="clientreservation.php">Réservation</a></li>    
            <li><a href="fournisseurs.php">Fournisseurs</a></li>        
            <li><a href="employes.php">Employés</a>
            <li><a href="reporting.php">Reporting</a></li>   
            <li><a href="logout.php">Déconnection</a></li>      
        </ul>
        

        <div class="row">
            <div class="col-sm-2"></div>
            <div class="col-sm-8" style="background-color: white;">  
         
                        <h3 style="text-align: center;">Enregistrement employé validé</h3>
    		            <h3 style="text-align: center;"><?= $_SESSION['htl_name']?></h3>
                        <hr class="my-1" style="background-color: #C0C0C0; border-width: 2px;">  

         
                        <?php 
                            include_once"config.php";
                            $vStaff_id = $_GET['staff_id'];
                            $query = $pdo->query("SELECT htl_name, gender_name, staff_first_name, staff_last_name, staff_address1, staff_address2, staff_address3, staff_zipcode, staff_city_name, name_country, staff_phone_num, staff_email, role_name, salary, dates_recruitment, dates_end_contract FROM neil_staff,neil_hotel, neil_gender, neil_country, neil_role WHERE Staff_id = '$vStaff_id' and neil_staff.staff_gender_id = neil_gender.gender_id and neil_staff.htl_id = neil_hotel.htl_id and neil_staff.staff_country_id = neil_country.country_id and neil_staff.staff_role_id = neil_role.role_id;");
                            $row = $query->fetch(PDO::FETCH_ASSOC);
                       
                        if ($row) {
                            
                        ?>

                        <table>
                         <tr>   
                            <td>Nom de l'hotel:</td>
                            <td><?=$row["htl_name"] ?></td>
                         <tr>
                         </tr>        
                            <td>Genre:</td>
                            <td><?=$row["gender_name"] ?></td>
                         <tr>
                         </tr>                            
                            <td>Prénom:</td>
                            <td><?=$row["staff_first_name"] ?></td>
                         <tr>
                         </tr>                           
                            <td>Nom:</td>
                            <td><?=$row["staff_last_name"] ?></td>
                         <tr>
                         </tr>                           
                            <td>Adresse 1</td>
                            <td><?=$row["staff_address1"] ?></td>
                         <tr>
                         </tr>                           
                            <td>Adresse 2:</td>
                            <td><?=$row["staff_address2"] ?></td>
                         <tr>
                         </tr>                            
                            <td>Adresse 3:</td>
                            <td><?=$row["staff_address3"] ?></td>
                          <tr>
                          </tr>                           
                            <td>Code postal:</td>
                            <td><?=$row["staff_zipcode"] ?></td>
                         <tr>
                         </tr>                            
                            <td>Ville:</td>
                            <td><?=$row["staff_city_name"] ?></td>
                         <tr>
                         </tr>                          
                            <td>Pays:</td>
                            <td><?=$row["name_country"] ?></td>
                         <tr>
                         </tr>                            
                            <td>Numéro de téléphone:</td>
                            <td><?=$row["staff_phone_num"] ?></td>
                         <tr>
                         </tr>                           
                            <td>Email:</td>
                            <td><?=$row["staff_email"] ?></td>
                         <tr>
                         </tr>                            
                            <td>Emploi:</td>
                            <td><?=$row["role_name"] ?></td>
                         <tr>
                         </tr>                          
                            <td>Salaire:</td>
                            <td><?=$row["salary"] ?></td>
                         <tr>
                         </tr>                            
                            <td>Date de recrutement:</td>
                            <td><?=$row["dates_recruitment"] ?></td>
                         <tr>
                         </tr>                           
                            <td>Date de sortie:</td> 
                            <td><?=$row["dates_end_contract"] ?></td>
                         </tr> 
                       
                       </table>
                    <?php 
                        }   
                    ?>
            </div>
        </div>    
    </body>
</html>
