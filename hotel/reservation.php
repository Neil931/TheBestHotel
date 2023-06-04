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
        <title>Client - réservation</title>
        
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
          <div class="col-sm-1"></div>
          <div class="col-sm-10">     
                <form name="myForm" onsubmit="return validateForm()" action="./enregistdata.php" method="POST" style="background-color: #AAE0CA;">
                    <div> 
                        <h3 style="text-align: center;font-family: Verdana;color: #445950;">Client - réservation - <?= $_SESSION['htl_name']?></h3>
                        <hr class="my-1" style="background-color: #C0C0C0; border-width: 2px;">  
                    </div> 
                    
                    <input type="hidden" name="id_enregist" value="res">   
                    
                    <div class="form-group row">
                        <div class="col-sm-1"></div>
                        <div class="col-md-8">
      
                		    <?php 
                			include_once"config.php";  
                			$cust_id =  $_GET['cust_id'];
                            $query = $pdo->query("SELECT gender_name, cust_first_name, cust_last_name, cust_address1, cust_address2, cust_address3,cust_zipcode,cust_city_name,name_country, cust_phone_num, cust_email FROM neil_customer,neil_gender,neil_country WHERE cust_id= '$cust_id' AND neil_customer.cust_gender_id = neil_gender.gender_id AND neil_customer.cust_country_id = neil_country.country_id;");
                                        
                            $row = $query->fetch(PDO::FETCH_ASSOC);
                		    ?>
                            <p class="classP">
                			Client : &nbsp; <?=$row["gender_name"] ?>&nbsp;<?=$row["cust_first_name"] ?>&nbsp;<?=$row["cust_first_name"] ?><BR>
                			Adresse 1 : &nbsp;<?=$row["cust_address1"] ?><BR>
                			Adresse 2 : &nbsp;<?=$row["cust_address2"] ?><BR>
                			Adresse 3 : &nbsp;<?=$row["cust_address3"] ?><BR>
                			Code Postal/ville :&nbsp; <?=$row["cust_zipcode"] ?>&nbsp;<?=$row["cust_city_name"] ?> &nbsp; - &nbsp; <?=$row["name_country"] ?><BR>
                			Télé :&nbsp;<?=$row["cust_phone_num"] ?>&nbsp;&nbsp;&nbsp;&nbsp; email : &nbsp;<?=$row["cust_email"] ?><p>
                			
                			<input id="cust_id" type=hidden name="i_cust_id" value=" <?= $cust_id ?> ">
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <div class="col-sm-1"></div>
                        <label class="col-sm-3" for="num_personne"><h6 style="text-align: left;">Nombre de personne:</h6></label>
                        <div class="col-sm-1">
                            <input type="number" name="i_num_personne" class="form-control" id="num_personne" placeholder="" required >
                        </div>
	                </div>   
	                
	                <div class="form-group row">
	                    <div class="col-sm-1"></div>         
	                    <div class="col-sm-8"> 
		                    <h6 style="text-align: left;">Sélectionez une chambre disponible</h6>
        	            </div>         
                   </div> 
                   
                   <div class="form-group row">
                       <div class="col-sm-1"></div>
                       <div class="col-md-10"> 
                            <?php
                                include_once "./config.php";
                                $vhtl_id = $_SESSION['htl_id'];
                                echo '<select size="5" name="i_room" style="width: 100%;">';
                                echo '<optgroup label="&nbsp;&nbsp;&nbsp;&nbsp;N° Chambre&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Type&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Nbre Personne&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Prix&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Surperficie&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Handicapé&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;VIP&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Fumeur&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Animaux&nbsp;&nbsp;&nbsp;&nbsp;">';
                            
                                $query = $pdo->query("SELECT DISTINCT neil_room.room_id,num_room, room_description,num_people, price_room,surface,REPLACE(REPLACE(handicap, 1, 'O'),0,'N') as ch_handicap,REPLACE(REPLACE(vip, 1, 'O'),0,'N') as ch_vip,REPLACE(REPLACE(smoking, 1, 'O'),0,'N') as ch_smoking,REPLACE(REPLACE(animals, 1, 'O'),0,'N') as ch_animals 
                                                    FROM neil_room,neil_typeroom, neil_booking,neil_checkout 
                                                    WHERE 
                                                    neil_booking.booking_id = neil_checkout.booking_id and 
                                                    neil_booking.room_id = neil_room.room_id and
                                                    neil_room.typeroom_id=neil_typeroom.typeroom_id and 
                                                    neil_room.htl_id ='$vhtl_id'
                                                    ORDER BY room_id ASC;");
                                
                                
                                 while ($row = $query->fetch(PDO::FETCH_ASSOC)) {			    
                            
                                    echo '<option value="' . $row['room_id'] . ';' . $row['price_room'] . '">';
                                    echo  '&emsp;&emsp;' .  $row['num_room'] . '&emsp;&emsp;&emsp;&emsp;&emsp;&emsp; ' .  $row['room_description']  . '&emsp;&emsp; &emsp;&emsp;&emsp;&emsp;' .  $row['num_people'] . '&emsp;&emsp; &emsp;&emsp;&emsp;&emsp;' . $row['price_room'] . '&emsp;&emsp;&emsp;&emsp; ' .  $row['surface'] . '&emsp;&emsp;&emsp;&emsp;&emsp;' .  $row['ch_handicap'] . '&emsp;&emsp;&emsp;&emsp;&emsp;' .  $row['ch_vip'] . '&emsp;&emsp;&emsp;&emsp;&emsp;' .  $row['ch_smoking'] . '&emsp;&emsp;&emsp;&emsp;&nbsp;' .  $row['ch_animals'];
                                    echo '</option>';
                                }
                                echo'</optgroup>';
                                echo'</select>';
                            ?>	
                        </div>
                    </div>	
                    
                    <div class="form-group row">
                        <div class="col-sm-1"></div>
                        <label class="col-sm-1 align-self-center" for="date_arrive">Arrivée:</label>
                        <div class="col-sm-22">
                            <input type="date" name="d_date_arrive" class="form-control" id="date_arrive" placeholder="Date d'arrivée" required >
	                    </div>
	                    
	                    <div class="col-sm-1"></div>
	                    <label class="col-sm-1 align-self-center" for="date_depart">Départ:</label>
	                    <div class="col-sm-2">
	                        <input type="date" name="d_date_depart" class="form-control" id="date_depart" placeholder="Date de départ" required >
                        </div>
                        <label class="col-sm-1 align-self-center" for="type_paiement">Réglement:</label>
                        <div class="col-sm-2">
               	       		<?php
                    	       		include_once "./config.php";
                	       
                	                 echo'<select name="i_paiement_id" class="form-control">';
                	                 $query = $pdo->query("SELECT payment_id,payment_type FROM neil_paymenttype ORDER BY payment_type ASC;"); 
                    	       		 while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
                    	       
                    	       		 echo"<option value=".$row[payment_id]."> ".$row[payment_type]." </option>";
                    	       		         }
                    	       		 echo'</select>';
                	    	?>  
       	                </div>     
	                </div> 
	                
                    <hr class="my-1" style="background-color: #C0C0C0; border-width: 2px;">
                    <div class="form-group row">
                        <div class="col-sm-8"></div>
                        <div class="col-sm-2 ">
                             <input type="reset" class="btn btn-secondary" value="Supprimer">
                        </div>
                        <div class="col-sm-2">
                             <input type="submit" class="btn btn-success" value="Valider">                      
                        </div>
                    </div>
                            
                    <div class="form-group row">
                           <div class="col-sm-9 offset-sm-3">
                    </div>
                    
                </form>   
            </div>
        </div>
    </body>
</html>

