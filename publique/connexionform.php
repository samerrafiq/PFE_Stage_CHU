<?php

 include "../conn.php" ;
 //
session_start();
if(isset($_SESSION['code_per'])) {
    header("location: ../personnel/index.php");
    exit();
}
if(isset($_SESSION['code_adm'])) {
    header('location: ../EspaceAdmin/index.php');
    exit();
}
if(isset($_SESSION['code_utl'])) {
    header('location: ../declarateur/index.php');
    exit();
}
session_destroy();
//

?>
<?php
    $nom = "";
    $prenom = "";
    $email_reg = "";
    $password_reg = "";
    if(isset($_POST['button-connecte'])) {
        $email = $_POST['email'];
        $password = $_POST['pass'];
        $result_adm = mysqli_query($conn, "SELECT * FROM administrateurs WHERE email = '$email'");
        $result_per = mysqli_query($conn, "SELECT * FROM personnels WHERE email = '$email'");
        $result_utl = mysqli_query($conn, "SELECT * FROM utilisateur WHERE email = '$email'");
        if(mysqli_num_rows($result_adm) > 0) {
            $ligne = mysqli_fetch_assoc($result_adm);
            if(password_verify($password, $ligne['password'])) {
                session_start();
                $_SESSION['code_adm'] = $ligne['code_adm'];
                header('location: ../EspaceAdmin/index.php');
                exit();
            }
        }if(mysqli_num_rows($result_per) > 0) {
            $ligne = mysqli_fetch_assoc($result_per);
            if(password_verify($password, $ligne['password'])) {
                session_start();
                $_SESSION['code_per'] = $ligne['code_per'];
                header('location: ../personnel/index.php');
                exit();
            }
        } 
         if(mysqli_num_rows($result_utl) > 0) {
            $ligne = mysqli_fetch_assoc($result_utl);
            if(password_verify($password, $ligne['password'])) {
                session_start();
                $_SESSION['code_utl'] = $ligne['code_utl'];
                header('location: ../declarateur/index.php');
                exit();
            }
        }
     }
    ?>
<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Connexion</title>
  <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">


<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

</head>
<body>
	<!-- start header -->
                <?php include"header.php" ?>
    <!-- end header -->
<link rel="stylesheet" href="../css/style44.css">
<div class="box-form" style="margin-top: 100px;">
	<div class="left">
		<div class="overlay" style="background-image: url(../img/about-img.jpg);background-repeat: no-repeat;margin-left: 120px;border-top-left-radius: 10px;border-bottom-left-radius: 10px;width: 500px;">
		<h3>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</h3>
		<p >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </p>
		</div>
	</div>
		<div class="right">
		<h1>Connexion</h1>
		<p>Vous n'avez pas de compte? <a href="#">Créez votre compte</a> cela prend moins d'une minute.</p>
		<form method="post" >
		<div class="inputs">
			<input type="email" placeholder="Email" name="email">
			<br>
			<input type="password" placeholder="Mot de passe" name="pass">
		</div>
			
			<br>
			
			<br>
			<input type="submit" value="Login" style="cursor: pointer;" name="button-connecte">
	</div>
	</form>
</div>
<!-- partial -->
   <script src="../js/vendor/jquery-2.2.4.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
            <script src="../js/vendor/bootstrap.min.js"></script>           
            <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBhOdIF3Y9382fqJYt5I_sswSrEw5eihAA"></script>
            <script src="../js/easing.min.js"></script>         
            <script src="../js/hoverIntent.js"></script>
            <script src="../js/superfish.min.js"></script>  
            <script src="../js/jquery.ajaxchimp.min.js"></script>
            <script src="../js/jquery.magnific-popup.min.js"></script>  
            <script src="../js/jquery-ui.js"></script>          
            <script src="../js/owl.carousel.min.js"></script>                       
            <script src="../js/jquery.nice-select.min.js"></script>                         
            <script src="../js/mail-script.js"></script>    
            <script src="../js/main.js"></script>
</body>
</html>
