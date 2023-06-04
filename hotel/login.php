<!DOCTYPE html>
<html>
<html lang="fr">
    <head>
	    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Client - enregistrement</title>
        
        <!--  Stylesheet -->
        <link href="css/style.css" rel="stylesheet">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js">
    </head>
    
    <body>
        <?php
            require('config.php');
            session_start();
            
            if (isset($_POST['username'])){
                $username = $_POST['username'];
                $password = $_POST['password'];
                
                $query = $pdo->prepare("SELECT * FROM neil_users WHERE username=:username AND password=:password");
                $query->bindParam(':username', $username);
                $query->bindParam(':password', hash('sha1', $password));
                $query->execute();
                $result = $query->fetch(PDO::FETCH_ASSOC);
                
                if ($result) {
                    $_SESSION['username'] = $result['username'];
                    $_SESSION['staff_id'] = $result['staff_id'];
                    header("Location: index.php");
                    exit();
                } else {
                    $message = "Le nom d'utilisateur ou le mot de passe est incorrect.";
                }
            }
        ?>
        
        <form class="boxlogin" action="" method="post" name="login">
            <h1 class="box-logo box-title">TheBestHotel</h1>
            <h1 class="box-title">Connexion</h1>
            
            <input type="text" class="box-input" name="username" placeholder="Nom d'utilisateur" value="admin">
            <input type="password" class="box-input" name="password" placeholder="Mot de passe" value ="matrix">
            <input type="submit" value="Connexion " name="submit" id="submit">

            <?php if (! empty($message)) { ?>
                <p class="errorMessage"><?php echo $message; ?></p>
            <?php } ?>
        </form>
    </body>
</html>




























