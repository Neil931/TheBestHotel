<?php
include_once "./config.php";

    $id_enre = $_POST['id_enregist'];
    
    switch ($id_enre) {
    
    case cli:
		$gender_id=$_POST["i_gender_id"];
		$first_name=$_POST["s_first_name"];
		$last_name=$_POST["s_last_name"];
		$address1=$_POST["s_adresse1"];
		$address2=$_POST["s_adresse2"];
		$address3=$_POST["s_adresse3"];
		$zipcode=$_POST["i_zipcode"];
		$city_name=$_POST["s_city_name"];
		$country_id=$_POST["i_country_id"];
		$phone_num=$_POST["s_phone_num"];
		$email=$_POST["s_email"];

        $sql="Insert into neil_customer(cust_gender_id,cust_first_name,cust_last_name,cust_address1,cust_address2,cust_address3,cust_zipcode,cust_city_name,cust_country_id,cust_phone_num,cust_email) values('$gender_id','$first_name','$last_name','$address1','$address2','$address3','$zipcode','$city_name','$country_id','$phone_num','$email')";


       try {
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql="Insert into neil_customer(cust_gender_id,cust_first_name,cust_last_name,cust_address1,cust_address2,cust_address3,cust_zipcode,cust_city_name,cust_country_id,cust_phone_num,cust_email) values('$gender_id','$first_name','$last_name','$address1','$address2','$address3','$zipcode','$city_name','$country_id','$phone_num','$email')";

        $pdo->exec($sql);
        
	    //retourne le dernier customer_id  inséré
        $query = $pdo->query('SELECT MAX(cust_id) as maxscust_id FROM neil_customer');
        $row = $query->fetch(PDO::FETCH_ASSOC);
        
		    //envoi de la page résulatat de l'insert et on transmet l'dentifiant de l'employé
		    header('location: ./reservation.php?cust_id=' . $row["maxscust_id"]);  
        } catch (PDOException $e) {
            echo "Erreur d'insertion : " . $e->getMessage();
        }

		  break;
		 
	    case emp:	
		
		$staff_htl_id=$_POST["i_htl_id"];
		$staff_gender_id=$_POST["i_gender_id"];
		$staff_first_name=$_POST["s_first_name"];
		$staff_last_name=$_POST["s_last_name"];
		$staff_address1=$_POST["s_adresse1"];
		$staff_address2=$_POST["s_adresse2"];
		$staff_address3=$_POST["s_adresse3"];
		$staff_zipcode=$_POST["i_zipcode"];
		$staff_city_name=$_POST["s_city_name"];
		$staff_country_id=$_POST["i_country_id"];
		$staff_phone_num=$_POST["s_phone_num"];
		$staff_email=$_POST["s_email"];
		$staff_role_id=$_POST["i_role_id"];
		$salary=$_POST["d_salary"];
		$dates_recruitment=$_POST["d_dates_recruitment"];
		$dates_end_contract=$_POST["d_dates_end_contract"];


       try {
         $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "Insert into neil_staff(htl_id,staff_gender_id,staff_first_name,staff_last_name,staff_address1,staff_address2,staff_address3,staff_zipcode,staff_city_name,staff_country_id,staff_phone_num,staff_email,staff_role_id,salary,dates_recruitment,dates_end_contract) values('$staff_htl_id','$staff_gender_id','$staff_first_name','$staff_last_name','$staff_address1','$staff_address2','$staff_address3','$staff_zipcode','$staff_city_name','$staff_country_id','$staff_phone_num','$staff_email','$staff_role_id','$salary','$dates_recruitment','$dates_end_contract')";

        $pdo->exec($sql);
        
	    //retourne le dernier staff_id  inséré
        $query = $pdo->query('SELECT MAX(staff_id) as maxstaffid FROM neil_staff');
        $row = $query->fetch(PDO::FETCH_ASSOC);
        
		//envoi de la page résulatat de l'insert et on transmet l'dentifiant de l'employé

		 header('location: ./resultatemployes.php?staff_id=' . $row["maxstaffid"]);
        } catch (PDOException $e) {
            echo "Erreur d'insertion : " . $e->getMessage();
        }
                 break;
                 
	    case fourn:	
		$societe=$_POST["s_societe"];
		$siren=$_POST["s_siren"];
		$address1=$_POST["s_adresse1"];
		$address2=$_POST["s_adresse2"];
		$address3=$_POST["s_adresse3"];
		$zipcode=$_POST["i_zipcode"];
		$city_name=$_POST["s_city_name"];
		$country_id=$_POST["i_country_id"];
		$contactname=$_POST["s_contact"];
		$phone_num=$_POST["s_phone_num"];
		$email=$_POST["s_email"];

       try {
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql="Insert into neil_provider(pvd_name,siren,pvd_address1,pvd_address2,pvd_address3,pvd_zipcode,pvd_city_name,pvd_country_id,pvd_contact_name,pvd_phone_num,pvd_email) values('$societe','$siren','$address1','$address2','$address3','$zipcode','$city_name','$country_id','$contactname','$phone_num','$email')";

        $pdo->exec($sql);
        
	    //retourne le dernier staff_id  inséré
        $query = $pdo->query('SELECT MAX(pvd_id) as maxspvd_id FROM neil_provider');
        $row = $query->fetch(PDO::FETCH_ASSOC);
        
		    //envoi de la page résulatat de l'insert et on transmet l'dentifiant de l'employé
		     header('location: ./resultatfournissseur.php?pvd_id=' . $row["maxspvd_id"]);  
		     
        } catch (PDOException $e) {
            echo "Erreur d'insertion : " . $e->getMessage();
        }

    
          break;
                 
	case res: 
	
		session_start();

		$room = explode(";", $_POST["i_room"]);
		$cust_id=$_POST["i_cust_id"];
		$date_arrive=$_POST["d_date_arrive"];
		$date_depart=$_POST["d_date_depart"];
		$numPeople=$_POST["i_num_personne"];
		$total_payment=((strtotime($date_depart) - strtotime($date_arrive))/86400)*$room[1];
		$payment_id=$_POST["i_paiement_id"];
		$room_id=$room[0];
		$htl_id=$_SESSION['htl_id'];
		$staff_id= $_SESSION['staff_id'];

       try {
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql="Insert into neil_booking(cust_id,arrival,departure,numPeople,total_payment,payment_id,room_id,htl_id,staff_id) values('$cust_id','$date_arrive','$date_depart','$numPeople','$total_payment','$payment_id','$room_id','$htl_id','$staff_id')";

        $pdo->exec($sql);
        
	    //retourne le dernier booking_id  inséré
        $query = $pdo->query('SELECT MAX(booking_id) as maxsbooking FROM neil_booking');
        $row = $query->fetch(PDO::FETCH_ASSOC);
        
		     //envoi de la page résulatat de l'insert et on transmet l'dentifiant de résevation
		    header('location: ./confirmationreserv.php?booking_id=' . $row["maxsbooking"]);  
		     
        } catch (PDOException $e) {
            echo "Erreur d'insertion : " . $e->getMessage();
        }

	     break;
	         
	    default:
              echo "JE SUIS DANS LE default!";
              break;         
	         
	         
	}         
	    
?>