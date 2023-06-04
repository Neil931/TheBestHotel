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
        <title>Client - employés</title>
        
        <!--  Stylesheet -->
        <link href="css/style.css" rel="stylesheet">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
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
                
                <form name="myForm" onsubmit="return validateForm()" action="./enregistdata.php" method="POST" style="background-color:#AAE0CA; ">
                    <div> 
                        <h3 style="text-align: center;font-family: Verdana;color: #445950;">Employés - enregistrement</h3>
                        <hr class="my-1" style="background-color: #C0C0C0; border-width: 2px;">
                    </div> 
                   
                    <input type="hidden" name="id_enregist" value="emp">

                    <div class="form-group row my-0">
                         <div class="col-sm-1"></div>
                        <label class="col-sm-2 align-self-center">Genre:</label>
                        <div class="col-sm-3">
                            <label class="mb-0 mr-3 align-self-center">
                                <input type="radio" class="mr-1" name="i_gender_id" value="1" required> M.
                                <input type="radio" class="mr-1" name="i_gender_id" value="2" required> Mme
                                <input type="radio" class="mr-1" name="i_gender_id" value="3" required> Mle
                            </label>
                        </div>
                    </div>
                    
                    <div class="form-group row my-0">
                         <div class="col-sm-1"></div>
                         <label class="col-sm-2 align-self-center" for="last_name">Nom:</label>
                        <div class="col-sm-3">
                            <input type="text" maxlength="25" size="25" name="s_last_name" class="form-control" id="last_name" placeholder="Nom" required>
                        </div>                
                        
                        <label class="col-sm-1 align-self-center" for="first_name">Prénom:</label>
                        <div class="col-sm-3">
                            <input type="text" maxlength="25" size="25" name="s_first_name" class="form-control" id="first_name" placeholder="Prénom" required >
                        </div>
                    </div>
                    <div class="form-group row my-0">
                        <div class="col-sm-1"></div>
                        <label class="col-sm-2 align-self-center" for="adresse1">Adresse 1:</label>
                        <div class="col-sm-6">
                            <input type="text" maxlength="35" size="35" name="s_adresse1" class="form-control" id="adresse1" placeholder="Adresse 1" required>
                        </div>
                    </div> 
            
                    <div class="form-group row my-0">
                        <div class="col-sm-1"></div>
                        <label class="col-sm-2 align-self-center" for="adresse2">Adresse 2 :</label>
                        <div class="col-sm-6">
                          <input type="text" maxlength="35" size="35" name="s_adresse2" class="form-control" id="adresse2" placeholder="Adresse 2">
                        </div>
                    </div> 
            
                    <div class="form-group row my-0">
                        <div class="col-sm-1"></div>
                        <label class="col-sm-2 align-self-center" for="adresse3">Adresse 3 :</label>
                        <div class="col-sm-6">
                          <input type="text" maxlength="35" size="35" name="s_adresse3" class="form-control" id="adresse3" placeholder="Adresse 3">
                        </div>
                    </div> 
                    
                    <div class="form-group row my-0">
                        <div class="col-sm-1"></div>
                        <label class="col-sm-2 align-self-center" for="zipcode">code postal :</label>
                        <div class="col-sm-3">
                          <input type="number" maxlength="7" size="7" name="i_zipcode" class="form-control" id="zipcode" placeholder="Code postal" required>
                        </div>
                         <div class="col-sm-1"></div>
                        <label class="col-sm-1 align-self-center" for="city_name">Ville :</label>
                        <div class="col-sm-3">
                          <input type="text" maxlength="25" size="25" name="s_city_name" class="form-control" id="city_name" placeholder="Ville :" required>
                        </div>   
                    </div> 
            
                    <div class="form-group row my-0">
                        <div class="col-sm-1"></div>
                        <label class="col-sm-2 align-self-center"for="country_name">Pays :</label>
                        <div class="col-sm-3">
                            <?php
                                include_once "./config.php";
                                echo '<select name="i_country_id" class="form-control">';
                                
                                $query = $pdo->query('SELECT country_id, name_country FROM neil_country ORDER BY name_country ASC');
                                while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
                                    echo "<option value=".$row['country_id']."> ".$row['name_country']." </option>";
                                }                 
                            
                                echo '</select>';
                            ?>
                        </div>
                    </div> 
                    
                    <div class="form-group row my-1">
                        <div class="col-sm-1"></div>
                        <label class="col-sm-2 align-self-center" for="phone">Numéro mobile :</label>
                        <div class="col-sm-3">
                            <input type="text" maxlength="12" size="12" name="s_phone_num" class="form-control" id="phone" placeholder="Téléphone" required>
                        </div>
                        <div class="col-sm-1"></div>
                        <label class="col-sm-1 align-self-center" for="Email"> Email :</label>
                        <div class="col-sm-3">
                            <input type="email" maxlength="30" size="30" name="s_email" class="form-control" id="Email" placeholder="Adresse email">
                        </div>
                    </div> 
            
            	    <div class="form-group row my-1">
                		<div class="col-sm-1"></div>
                		<label class="col-sm-2 align-self-center" for="htl_name">Hotel :</label>
                		<div class="col-sm-3">
                			  <?php
                				include_once "./config.php";
                			    echo'<select name="i_htl_id" class="form-control">';
                			    $query = $pdo->query('SELECT htl_id, htl_name FROM neil_hotel ORDER BY htl_name ASC');
                			    while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
                					    echo"<option value=".$row[htl_id]."> ".$row[htl_name]." </option>";
                				     }         
                				     echo'</select>';
                
                				?>   
                		</div>
                		
                		<div class="col-sm-1"></div>
                		<label class="col-sm-1 align-self-center" for="role_id">Emploi :</label>
                		<div class="col-sm-3"> 
                			  <?php
                				include_once "./config.php";
                			    echo'<select name="i_role_id" class="form-control">';
                			    $query = $pdo->query('SELECT role_id, role_name FROM neil_role ORDER BY role_name ASC;');
                			    while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
                					    echo"<option value=".$row[role_id]."> ".$row[role_name]." </option>";
                				     }               
                			    echo'</select>';
                				?>   
                		</div>   
            	    </div>  
            	    
            	    <div class="form-group row my-2">
                		<div class="col-sm-1"></div>
                		<label class="col-sm-2 align-self-center" for="salary">Salaire :</label>
                		<div class="col-sm-3">
                		    <input type="number" pattern="\d{1,5}" style="overflow: hidden;" name="d_salary" class="form-control" id="salary" placeholder="Salaire" required>
                		</div>
            	    </div>                 
    
            	    <div class="form-group row my-2">
                		<div class="col-sm-1"></div>
                		<label class="col-sm-2 align-self-center" for="dates_recruitment">Date de recrutement :</label>
                		<div class="col-sm-2">
                		    <input type="date" name="d_dates_recruitment" class="form-control" id="dates_recruitment" placeholder="dates_recruitment" required>
                		</div>
                		<div class="col-sm-1"></div>
                		<label class="col-sm-2 align-self-center" for="dates_end_contract">Date de fin de contrat :</label>
                		<div class="col-sm-2">
                		    <input type="date" name="d_dates_end_contract" class="form-control" id="dates_recruitment" placeholder="dates_end_contract">
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

