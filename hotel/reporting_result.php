<?php
  // Initialiser la session
  session_start();
  // Vérifiez si l'utilisateur est connecté, sinon redirigez-le vers la page de connexion
  if(!isset($_SESSION["username"])){
    header("Location: login.php");
    exit(); 
  }
?>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Liste des réparations</title>
        
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
        
        <div class="outer-div">
    
        <?php    
            $id_rapport = $_GET['id_rep'];
            switch($id_rapport) {
                case 1:
        ?>	
       	<h3 class="border-bottom center pb-3 mb-4" style="text-align: center; color:white;">Liste des clients</h3>
		    <table>
		        
		           
        				<th scope="col">Genre</th>
        				<th scope="col">Prénom</th>
        				<th scope="col">Nom</th>
        				<th scope="col">Adresse 1</th>
        				<th scope="col">Adresse 2</th>
        				<th scope="col">Adresse 3</th>
        				<th scope="col">Code postal</th>
        				<th scope="col">Ville</th>
        				<th scope="col">Pays</th>
        				<th scope="col">N° téléphone</th>
        				<th scope="col">Email</th>
			       
			        
                    <?php 
                        include_once "./config.php";
                        $query = $pdo->query("
                        SELECT gender_name, 
                        cust_first_name,
                        cust_last_name,
                        cust_address1,
                        cust_address2,
                        cust_address3,
                        cust_zipcode,
                        cust_city_name,
                        name_country,
                        cust_phone_num,
                        cust_email 
                        FROM neil_customer 
                        INNER JOIN neil_gender ON neil_customer.cust_gender_id = neil_gender.gender_id  
                        INNER JOIN neil_country ON neil_customer.cust_country_id = neil_country.country_id");
                        
                        while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
                    ?>
			    
			    
			   
    			    <tr>
        				<td><?=$row["gender_name"] ?></td>
        				<td><?=$row["cust_first_name"] ?></td>
        				<td><?=$row["cust_last_name"] ?></td>
        				<td><?=$row["cust_address1"] ?></td>
        				<td><?=$row["cust_address2"] ?></td>
        				<td><?=$row["cust_address3"] ?></td>
        				<td><?=$row["cust_zipcode"] ?></td>
        				<td><?=$row["cust_city_name"] ?></td>
        				<td><?=$row["name_country"] ?></td>
        				<td><?=$row["cust_phone_num"] ?></td>
        				<td><?=$row["cust_email"] ?></td>
    			    </tr>
    			    <?php 
    				    }
    			    ?>
    		
            </table>
            
            
            <?php 	
                    break;
                    case 2:
            ?>
		    <h3 class="border-bottom center pb-3 mb-4" style="text-align: center; color:white;">Liste des chambres</h3>
		    <table>
        				<th scope="col">Pays</th>
        				<th scope="col">Hotel</th>
        				<th scope="col">Description</th>
        				<th scope="col">Num Pers</th>
        				<th scope="col">Prix</th>
        				<th scope="col">Surface</th>
        				<th scope="col">Handicapé</th>
        				<th scope="col">VIP</th>
        				<th scope="col">Fumeur</th>
        				<th scope="col">Animaux</th>
    			    
    			    
    			    <?php 
        			    include_once "./config.php";
        			    $query = $pdo->query("
        				SELECT                         
        					  name_country,
        					  htl_name,
        					  room_description,
        					  num_people,
        					  price_room,
        					  surface,			  
        					  REPLACE(REPLACE(handicap, 1, 'O'),0,'N') as ch_handicap,
        					  REPLACE(REPLACE(vip, 1, 'O'),0,'N') as ch_vip,
        					  REPLACE(REPLACE(smoking, 1, 'O'),0,'N') as ch_smoking,
        					  REPLACE(REPLACE(animals, 1, 'O'),0,'N') as ch_animals
        				FROM neil_room
        				INNER JOIN neil_hotel ON neil_room.htl_id = neil_hotel.htl_id
        				INNER JOIN neil_typeroom ON neil_room.typeroom_id= neil_typeroom.typeroom_id
        				INNER JOIN neil_country ON neil_hotel.htl_country_id = neil_country.country_id");
        
        				while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
        
        			?>
                
                    <tr>
        				<td><?=$row["name_country"] ?></td>
        				<td><?=$row["htl_name"] ?></td>
        				<td><?=$row["room_description"] ?></td>
        				<td><?=$row["num_people"] ?></td>
        				<td><?=$row["price_room"] ?></td>
        				<td><?=$row["surface"] ?></td>
        				<td><?=$row["ch_handicap"] ?></td>                
        				<td><?=$row["ch_vip"] ?></td>
        				<td><?=$row["ch_smoking"] ?></td>
        				<td><?=$row["ch_animals"] ?></td>
        		    </tr>
        		    <?php 
				        }
			        ?>
			
		    </table>
		    
		    
		    <?php 	  
    		        break;
                    case 3:
            ?>
		    <h3 class="border-bottom center pb-3 mb-4" style="text-align: center; color:white;">Liste des réservations</h3>    
		    <table>
        				<th scope="col">Pays</th>
        				<th scope="col">Hotel</th>
        				<th scope="col">Prénom</th>
        				<th scope="col">Nom</th>
        				<th scope="col">Date arrivée</th>
        				<th scope="col">Date départ</th>
        				<th scope="col">N° personne</th>
        				<th scope="col">Paiement</th>
        				<th scope="col">Type</th>
        				<th scope="col">N° Chambre</th>
        				<th scope="col">Nom employé</th>
    			    
    
    			    <?php 
        			    include_once "./config.php";
        			    $query = $pdo->query("
        			    SELECT
        					  name_country,
        					  htl_name,
        					  cust_first_name,
        					  cust_last_name,
        					  arrival,
        					  departure,
        					  numPeople,
        					  total_payment,
        					  payment_type,
        					  room_id,			
        					  staff_last_name 
        				FROM neil_booking
        				INNER JOIN neil_customer ON neil_booking.cust_id = neil_customer.cust_id
        				INNER JOIN neil_paymenttype ON neil_booking.payment_id= neil_paymenttype.payment_id
        				INNER JOIN neil_hotel ON neil_booking.htl_id= neil_hotel.htl_id
        				INNER JOIN neil_country ON neil_hotel.htl_country_id = neil_country.country_id
        				INNER JOIN neil_staff ON neil_booking.staff_id = neil_staff.staff_id;");
        
                    	while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
    			   ?>
    			
    			    <tr>
        				<td><?=$row["name_country"] ?></td>
        				<td><?=$row["htl_name"] ?></td>
        				<td><?=$row["cust_first_name"] ?></td>
        				<td><?=$row["cust_last_name"] ?></td>
        				<td><?=$row["arrival"] ?></td>
        				<td><?=$row["departure"] ?></td>
        				<td><?=$row["numPeople"] ?></td>
        				<td><?=$row["total_payment"] ?></td>
        				<td><?=$row["payment_type"] ?></td>
        				<td><?=$row["room_id"] ?></td>
        				<td><?=$row["staff_last_name"] ?></td>
    			    </tr>
    			    <?php 
    				    }
    			    ?>
		    </table>	
		    
		    
		    <?php 	  
		            break;
                    case 4:
            ?>
            <h3 class="border-bottom center pb-3 mb-4" style="text-align: center; color:white;">Liste des checkouts</h3>
		     
		    <table>
    			
                    <th scope="col">Pays</th>
                    <th scope="col">Hotel</th>
                    <th scope="col">Prénom</th>
                    <th scope="col">Nom</th>
                    <th scope="col">Date arrivée</th>
                    <th scope="col">Date départ</th>
                    <th scope="col">N° personne</th>
                    <th scope="col">Paiement</th>
                    <th scope="col">Type</th>
                    <th scope="col">N° Chambre</th>
                    <th scope="col">Nom employé</th>
                    <th scope="col">Date/heure départ</th>
                    <th scope="col">Statut</th>            
                    
    
    			    <?php 
        			    include_once "./config.php";
        			    $query = $pdo->query("
        				SELECT
        					  name_country,
        					  htl_name,
        					  cust_first_name,
        					  cust_last_name,
        					  arrival,
        					  departure,
        					  numPeople,
        					  total_payment,
        					  payment_type,
        					  room_id,			
        					  staff_last_name, 
        					  checktime,
        					  status_type
        				FROM neil_checkout
        				INNER JOIN neil_booking ON neil_checkout.booking_id = neil_booking.booking_id
        				INNER JOIN neil_statuscheckout ON neil_checkout.status_id = neil_statuscheckout.status_id
        				INNER JOIN neil_customer ON neil_booking.cust_id = neil_customer.cust_id
        				INNER JOIN neil_paymenttype ON neil_booking.payment_id= neil_paymenttype.payment_id
        				INNER JOIN neil_hotel ON neil_booking.htl_id= neil_hotel.htl_id
        				INNER JOIN neil_country ON neil_hotel.htl_country_id = neil_country.country_id
        				INNER JOIN neil_staff ON neil_booking.staff_id = neil_staff.staff_id;");
        				
        				while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
                    ?>
    			
    			    <tr>
    			       <td><?=$row["name_country"] ?></td>
    			       <td><?=$row["htl_name"] ?></td>
    			       <td><?=$row["cust_first_name"] ?></td>
    			       <td><?=$row["cust_last_name"] ?></td>
    			       <td><?=$row["arrival"] ?></td>
    			       <td><?=$row["departure"] ?></td>
    			       <td><?=$row["N° personne"] ?></td> 
    			       <td><?=$row["total_payment"] ?></td>
    			       <td><?=$row["room_id"] ?></td>
    			       <td><?=$row["staff_last_name"] ?></td>
    			       <td><?=$row["checktime"] ?></td>
    			       <td><?=$row["status_type"] ?></td>
    			    </tr>
    			    <?php 
    				    }
    			    ?>
            </table>
            
            
            
            <?php 	  
                    break;
                    case 5:
            ?>
   		    <h3 class="border-bottom center pb-3 mb-4" style="text-align: center; color:white;">Liste des chambres avec avec des réparations</h3>
    		<table>
     		
					<th scope="col">Pays</th>
					<th scope="col">Hotel</th>
					<th scope="col">N° chamb</th>
					<th scope="col">Type Chamb</th>
					<th scope="col">Date constat</th>
					<th scope="col">Statut répar</th>
					<th scope="col">Date répar</th>
					<th scope="col">Montant</th>

				    <?php
    				    include_once "./config.php";
    				    $query = $pdo->query("
    					SELECT                         
    						  name_country,
    						  htl_name,
    						  num_room,
    						  room_description,
    						  dates_review,	 
    						  repair_status,
    						  dates_repair,		        
    						  amount_repair
    
    					FROM neil_room
    					INNER JOIN neil_hotel ON neil_room.htl_id = neil_hotel.htl_id
    					INNER JOIN neil_typeroom ON neil_room.typeroom_id = neil_typeroom.typeroom_id
    					INNER JOIN neil_country ON neil_hotel.htl_country_id = neil_country.country_id
    					INNER JOIN neil_repair ON neil_room.htl_id = neil_repair.htl_id and neil_room.room_id = neil_repair.room_id;");
    
    					while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
				    ?>
			
				    <tr>
    					<td><?=$row["name_country"] ?></td>
    					<td><?=$row["htl_name"] ?></td>
    					<td><?=$row["num_room"] ?></td>
    					<td><?=$row["room_description"] ?></td>
    					<td><?=$row["dates_review"] ?></td>
    					<td><?=$row["repair_status"] ?></td>
    					<td><?=$row["dates_repair"] ?></td>
    					<td><?=$row["amount_repair"] ?></td>
				    </tr>
				    <?php 
					    }
				    ?>
    		</table>
    		
    		
    		
    		<?php
    		        break;
                    case 6:
            ?>
            <h3 class="border-bottom center pb-3 mb-4" style="text-align: center; color:white;">Liste des employés</h3>	
		    <table>
			   
					<th scope="col">Hotel</th>
					<th scope="col">Genre</th>
					<th scope="col">Prénom</th>
					<th scope="col">Nom</th>
					<th scope="col">Adresse 1</th>                
					<th scope="col">Adresse 2</th>                   
					<th scope="col">Adresse 3</th> 
					<th scope="col">Code postal</th>                 
					<th scope="col">Ville</th>
					<th scope="col">Pays</th>
					<th scope="col">N° Télé</th>
					<th scope="col">Email</th>
					<th scope="col">Rôle</th> 
					<th scope="col">Salaire</th>
					<th scope="col">Date contrat</th>
					<th scope="col">Fin contrat</th>
			    
				    <?php 
    				    include_once "./config.php";
    				    $query = $pdo->query("
    					SELECT
    						   htl_name,
    						   gender_name,
    						   staff_first_name,
    						   staff_last_name,
    						   staff_address1,
    						   staff_address2,
    						   staff_address3,
    						   staff_zipcode,
    						   staff_city_name,
    						   name_country,
    						   staff_phone_num,
    						   staff_email,
    						   role_name,
    						   salary,			   
    						   dates_recruitment,
    						   dates_end_contract
    					FROM neil_staff
    					INNER JOIN neil_gender ON neil_staff.staff_gender_id = neil_gender.gender_id 
    					INNER JOIN neil_hotel ON neil_staff.htl_id = neil_hotel.htl_id 
    					INNER JOIN neil_country ON neil_staff.staff_country_id = neil_country.country_id
    					INNER JOIN neil_role ON neil_staff.staff_role_id = neil_role.role_id;");
    
    					while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
				   ?>
			
				    <tr>
    					<td><?=$row["htl_name"] ?></td>
    					<td><?=$row["gender_name"] ?></td>
    					<td><?=$row["staff_first_name"] ?></td>
    					<td><?=$row["staff_last_name"] ?></td>
    					<td><?=$row["staff_address1"] ?></td>
    					<td><?=$row["staff_address2"] ?></td>
    					<td><?=$row["staff_address3"] ?></td> 
    					<td><?=$row["staff_zipcode"] ?></td>
    					<td><?=$row["staff_city_name"] ?></td>
    					<td><?=$row["name_country"] ?></td>
    					<td><?=$row["staff_email"] ?></td>
    					<td><?=$row["role_name"] ?></td>
    					<td><?=$row["salary"] ?></td>
    					<td><?=$row["dates_recruitment"] ?></td>  
    					<td><?=$row["dates_end_contract"] ?></td>    
				    </tr>
				    <?php 
					    }
				    ?>
			</table>	
			
			
			
			    
            <?php 
                    break;
                    case 7:
            ?>
		    <h3 class="border-bottom center pb-3 mb-4" style="text-align: center; color:white;">Liste des fournisseurs</h3>	
			<table>
					<th scope="col">Société</th>
					<th scope="col">Siren</th>
					<th scope="col">Adresse 1</th>                
					<th scope="col">Adresse 2</th>                   
					<th scope="col">Adresse 3</th> 
					<th scope="col">Code postal</th>                 
					<th scope="col">Ville</th>
					<th scope="col">Pays</th>
					<th scope="col">Nom Contact</th>
					<th scope="col">N° Télé</th>
					<th scope="col">Email</th>
				    
				    
				    <?php 
    				    include_once "./config.php";
    				    $query = $pdo->query("
    					SELECT
    						   pvd_name,
    						   siren,
    						   pvd_address1,
    						   pvd_address2,
    						   pvd_address3,
    						   pvd_zipcode,
    						   pvd_city_name,
    						   name_country,
    						   pvd_contact_name,
    						   pvd_phone_num,
    						   pvd_email
    					FROM neil_provider
    					INNER JOIN neil_country ON neil_provider.pvd_country_id = neil_country.country_id;	");
    
    			  while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
    
                    ?>
			
				    <tr>
    					<td><?=$row["pvd_name"] ?></td>
    					<td><?=$row["siren"] ?></td>
    					<td><?=$row["pvd_address1"] ?></td>
    					<td><?=$row["pvd_address2"] ?></td>
    					<td><?=$row["pvd_address2"] ?></td>
    					<td><?=$row["pvd_zipcode"] ?></td>
    					<td><?=$row["pvd_city_name"] ?></td>
    					<td><?=$row["name_country"] ?></td>
    					<td><?=$row["pvd_contact_name"] ?></td>
    					<td><?=$row["pvd_phone_num"] ?></td>
    					<td><?=$row["pvd_email"] ?></td> 
				    </tr>
				    <?php 
					    }
				    ?>
			</table>
			
			
			
			<?php 
			        break;
                    case 8:
            ?>
		    <h3 class="border-bottom center pb-3 mb-4" style="text-align: center; color:white;">Dépenses par prestataire</h3>	
		    <table>
    				<th scope="col">Société</th>
    				<th scope="col">Ref. produit</th>
    				<th scope="col">Descrip. produit</th>
    				<th scope="col">Prix</th>                
    				<th scope="col">Quantité</th> 
    				<th scope="col">Total</th>
    			    
    			    <?php 
        			    include_once "./config.php";
        			    $query = $pdo->query("
        				SELECT
        					  pvd_name,   
        					  reference,
        					  description_product,	
        					  price_product,
        					  quantity,
        					  quantity*price_product as total
        
        				FROM neil_htlpurchase, neil_product, neil_provider
        
        				where  neil_htlpurchase.product_id = neil_product.product_id and neil_product.pvd_id = neil_provider.pvd_id
        				GROUP BY pvd_name");
        
        				while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
    			   ?>
			   
    			    <tr>
        				<td><?=$row["pvd_name"] ?></td>
        				<td><?=$row["reference"] ?></td>
        				<td><?=$row["description_product"] ?></td>
        				<td><?=$row["price_product"] ?></td>
        				<td><?=$row["quantity"] ?></td>
        				<td><?=$row["total"] ?></td> 
        			</tr>
    			    <?php 
    				    }
    			    ?>
		    </table>
		    
		    
		    
		    
           <?php 
           		    break;
                    case 9:
           ?>
            <h3 class="border-bottom center pb-3 mb-4" style="text-align: center; color:white;">Liste des hotels en France</h3>		     
		    <table>
    				<th scope="col">Hotel</th>
    				<th scope="col">Adresse 1</th>
    				<th scope="col">Adresse 2</th>
    				<th scope="col">Adresse 3</th>
    				<th scope="col">Code postal</th>
    				<th scope="col">Ville</th>
    				<th scope="col">Pays</th>
    				<th scope="col">Télé contact</th>
    				<th scope="col">Email Contact</th>
    			    
    			    <?php 
        				include_once "./config.php";
        				$query = $pdo->query("
        				SELECT
        
        					   htl_name,
        					   htl_address1,
        					   htl_address2,
        					   htl_address3,
        					   htl_zipcode,
        					   htl_city_name,
        					   name_country,
        					   htl_phone_contact,
        					   htl_email_contact
        
        				FROM neil_hotel
        				INNER JOIN neil_country ON neil_hotel.htl_country_id = neil_country.country_id
        				WHERE name_country = 'France';");
        
        			    while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
    			   ?>
    
    			    <tr>
        				<td><?=$row["htl_name"] ?></td>
        				<td><?=$row["htl_address1"] ?></td>
        				<td><?=$row["htl_address2"] ?></td>
        				<td><?=$row["htl_address3"] ?></td>
        				<td><?=$row["htl_zipcode"] ?></td>
        				<td><?=$row["htl_city_name"] ?></td>
        				<td><?=$row["name_country"] ?></td>
        				<td><?=$row["htl_phone_contact"] ?></td>
        				<td><?=$row["htl_email_contact"] ?></td>
    			    </tr>
    			    <?php 
    				    }
    			    ?>
		    </table>
		    
		    
		    
		    
            <?php 
                    break;
                    case 10:
            ?>
		    <h3 class="border-bottom center pb-3 mb-4" style="text-align: center; color:white;">Liste des achats de fourniture par hotel</h3>		     
		    <table>
    				<th scope="col">Pays</th>
    				<th scope="col">Hotel</th>
    				<th scope="col">Réf. produit 1</th>
    				<th scope="col">Descrip produit 2</th>
    				<th scope="col">Date achat</th>
    				<th scope="col">Quantité</th>
    				<th scope="col">Prix</th>
    				<th scope="col">Total</th>
    			    
    			    <?php 
        				include_once "./config.php";
        				$query = $pdo->query("
        				SELECT
        					  name_country,
        					  htl_name,
        					  reference,
        					  description_product,
        					  dates_purchase,
        					  quantity,
        					  price_product,
        					  quantity*price_product as total
        				FROM neil_htlpurchase
        				INNER JOIN neil_hotel ON neil_htlpurchase.htl_id = neil_hotel.htl_id
        				INNER JOIN neil_country ON neil_hotel.htl_country_id = neil_country.country_id
        				INNER JOIN neil_product ON neil_htlpurchase.product_id = neil_product.product_id
        				GROUP BY htl_name;");
        
        				while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
    			   ?>
    		
    			    <tr>
    				    <td><?=$row["name_country"] ?></td>
        				<td><?=$row["htl_name"] ?></td>
        				<td><?=$row["reference"] ?></td>
        				<td><?=$row["description_product"] ?></td>
        				<td><?=$row["dates_purchase"] ?></td>
        				<td><?=$row["quantity"] ?></td>
        				<td><?=$row["price_product"] ?></td>
        				<td><?=$row["total"] ?></td>
			        </tr>
    			    <?php 
    				    }
    			    ?>
            </table>
            
            
            
            <?php 
                    break;
       	            case 11:
            ?>
		    <h3 class="border-bottom center pb-3 mb-4" style="text-align: center; color:white;">Calcul du stock par hotel</h3>			     
		    <table>
    				<th scope="col">Pays</th>
    				<th scope="col">Hotel</th>
    				<th scope="col">Réf. produit 1</th>
    				<th scope="col">Descrip produit 2</th>
    				<th scope="col">Total achat</th>
    				<th scope="col">Inventaire</th>
    				<th scope="col">Stock</th>
    			  
    			    <?php 
        				include_once "./config.php";
        				$query = $pdo->query("
        				SELECT
        					  name_country,
        					  htl_name,
        					  reference,
        					  description_product,			
        					  sum(neil_htlpurchase.quantity) as total_achat,
        					  sum(neil_inventory.quantity) as total_inventaire,
        					  sum(neil_htlpurchase.quantity) - sum(neil_inventory.quantity) as stock
        
        				FROM neil_htlpurchase
        				INNER JOIN neil_hotel ON neil_htlpurchase.htl_id = neil_hotel.htl_id
        				INNER JOIN neil_country ON neil_hotel.htl_country_id = neil_country.country_id
        				INNER JOIN neil_product ON neil_htlpurchase.product_id = neil_product.product_id
        				INNER JOIN neil_inventory ON neil_htlpurchase.htl_id = neil_inventory.htl_id and neil_htlpurchase.product_id = neil_inventory.product_id
        				GROUP BY htl_name;");
        
        				while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
        			?>
        	
    			    <tr>
        				<td><?=$row["name_country"] ?></td>
        				<td><?=$row["htl_name"] ?></td>
        				<td><?=$row["reference"] ?></td>
        				<td><?=$row["description_product"] ?></td>
        				<td><?=$row["total_achat"] ?></td>
        				<td><?=$row["total_inventaire"] ?></td>
        				<td><?=$row["stock"] ?></td>
    			    </tr>
    			    <?php 
    				    }
    			    ?>
    		</table>
    		
    		
    		
    		
    		<?php 	
      		        break;
                    case 12:
            ?>
		    <h3 class="border-bottom center pb-3 mb-4" style="text-align: center; color:white;">Chiffre d'affaire par pays</h3>  
	        <table>
    				<th scope="col">Pays</th>
    				<th scope="col">Chiffre affaire</th>

    			    <?php 
        				include_once "./config.php";
        				$query = $pdo->query("
        				SELECT
        					  name_country,
        					  sum(total_payment) as total_chiffreaffaire
        
        				FROM neil_booking
        				INNER JOIN neil_hotel ON neil_booking.htl_id= neil_hotel.htl_id
        				INNER JOIN neil_country ON neil_hotel.htl_country_id = neil_country.country_id
        				GROUP BY name_country;");
        				while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
                    ?>
    		
    			    <tr>
    			       <td><?=$row["name_country"] ?></td>
    			       <td><?=$row["total_chiffreaffaire"] ?></td>
    			    </tr>
    			    <?php 
    				    }
    			    ?>
		    </table>
		    
		    
		    
           <?php
           	        break;
                    case 13:
           ?>		     
           <h3 class="border-bottom center pb-3 mb-4" style="text-align: center; color:white;">Chiffre d'affaire par hotel 2022/2023</h3>		    
		   <table>
    				<th scope="col">Pays</th>
    				<th scope="col">Hotel</th>
    				<th scope="col">Chiffre affaire</th>
    			   
    			    <?php 
        				include_once "./config.php";
        				$query = $pdo->query("
        				SELECT 
        					  name_country,
        					  htl_name,
        					  sum(total_payment) as total_chiffreaffaire
        
        				FROM neil_booking
        				INNER JOIN neil_hotel ON neil_booking.htl_id= neil_hotel.htl_id
        				INNER JOIN neil_country ON neil_hotel.htl_country_id = neil_country.country_id
        				WHERE neil_booking.arrival BETWEEN '2022-01-01 00:00:00' AND '2023-12-31 23:59:59' GROUP BY htl_name;");
        
        				while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
        			?>
    		
    			    <tr>
    			        <td><?=$row["name_country"] ?></td>
    			        <td><?=$row["htl_name"] ?></td>
    			        <td><?=$row["total_chiffreaffaire"] ?></td>
    			    </tr>
    			    <?php 
    				    }
    			    ?>
            </table>
            
            <?php 		    
                }
            ?>	    
            <button type="button" class="btn btn-dark mb-2" onclick="history.back();">Retour</button>
        </div>
    </body>
</html>


















