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
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js">
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
                <a href="fournisseurs.php">Fournisseur</a>    
            </li>        
            <li>
                <a href="employes.php">Employés</a>      
            <li>
    	        <a href="reporting.php">Reporting</a>
            </li>   
             <li>
    	        <a href="logout.php">Déconnection</a>
            </li>     
        </ul>
        
        <div class="row">
            <div class="col-sm-2"></div>
            <div class="col-sm-8" style="background-color: white;">  
               
         
                        <h3 style="text-align: center;">Confirmation - réservation</h3>
    		            <h3 style="text-align: center;"><?= $_SESSION['htl_name']?></h3>
                        <hr class="my-1" style="background-color: #C0C0C0; border-width: 2px;">     
                        
                		    <?php 
                			include_once"config.php";                
                			$vbooking_id = $_GET['booking_id'];     
                			
                            $query = $pdo->query("SELECT * FROM neil_customer,neil_gender,neil_country,neil_booking,neil_room,neil_paymenttype,neil_typeroom WHERE booking_id= '$vbooking_id' AND neil_customer.cust_gender_id = neil_gender.gender_id AND neil_customer.cust_country_id = neil_country.country_id AND neil_booking.cust_id = neil_customer.cust_id AND neil_booking.room_id = neil_room.room_id and neil_booking.payment_id = neil_paymenttype.payment_id AND neil_room.typeroom_id=neil_typeroom.typeroom_id;");
                			
                            $row = $query->fetch(PDO::FETCH_ASSOC);                			

                		    ?>
                
                			Client : &nbsp; <?=$row["gender_name"] ?>&nbsp;<?=$row["cust_first_name"] ?>&nbsp;<?=$row["cust_first_name"] ?><BR>
                			Adresse 1 : &nbsp;<?=$row["cust_address1"]?><BR>
                			Adresse 2 : &nbsp;<?=$row["cust_address2"]?><BR>
                			Adresse 3 : &nbsp;<?=$row["cust_address3"]?><BR>
                			Code Postal/ville :&nbsp; <?=$row["cust_zipcode"]?>&nbsp;<?=$row["cust_city_name"] ?> &nbsp; - &nbsp; <?=$row["name_country"] ?><BR>
                			Télé :&nbsp;<?=$row["cust_phone_num"] ?>&nbsp;&nbsp;&nbsp;&nbsp; email : &nbsp;<?=$row["cust_email"] ?><BR><BR><BR>
                		
                		   <table>
                		     <tr>     
                		    	<td>Date arrivée : &nbsp;<?=date('d/m/Y', strtotime($row["arrival"]))?></td>  
                			    <td>Date de départ : &nbsp;<?=date('d/m/Y', strtotime($row["departure"]))?></td>
                			 </tr>   
                             <tr>     
                		    	<td>Nombre de personne : &nbsp;<?=$row["numPeople"]?></td> 
                			    <td>N° chambre : &nbsp;<?=$row["num_room"]?></td>
                			 </tr>
                			 <tr> 
                    			<td>Type chambre : &nbsp;<?=$row["room_description"]?></td> 
                    			<td>Superficie : &nbsp;<?=$row["surface"] ?></td>
                    		 </tr> 	
                    	     <tr> 		
                    			<td>Chambre VIP :  &nbsp;<?=str_replace("0", "Non",str_replace("1", "Oui", $row["vip"])) ?></td> 			
                    			<td>Chambre Fumeur :  &nbsp;<?=str_replace("0", "Non",str_replace("1", "Oui", $row["smoking"])) ?></td>
                    		 </tr> 
                    		 <tr> 	
                    			<td>Animaux autorisés :  &nbsp;<?=str_replace("0", "Non",str_replace("1", "Oui", $row["animals"]))?></td>
                    			<td>Prix nuité :  &nbsp;<?=$row["price_room"] ?></td>
                    		 </tr> 
                    		 <tr> 	
                    			<td>Nombre de jours : &nbsp;<?=((strtotime($row["departure"]) - strtotime($row["arrival"]))/86400)?></td>
                    			<td>Montant total :  &nbsp;<?=$row["total_payment"] ?>&nbsp;EUR</td>
                    		 </tr> 
                    		 <tr> 	
                    			<td>Type paiement :  &nbsp;<?=$row["payment_type"] ?></td>
                    		 </tr> 
                		 </table>	    
                			    
            </div>		    
         </div>

    </body>
</html>
