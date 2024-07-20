<?php
session_start();
if(!isset($_SESSION['code_adm'])) {
    header("location: ../index.php");
} 
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title> Ajouter un administrateur </title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="css/styleForm.css">
   </head>
<body>

	<?php include 'Nav-Administrateurs.php'?>

	<?php
if (isset($_POST['ajouter'])) {
  include "conn.php";
  $nom = $_POST['nom'];
  $prenom = $_POST['prenom'];
  $email = $_POST['email'];
  $tel = $_POST['Tel'];
  $passwd = $_POST['passwd'];
  $cpasswd =$_POST['cpasswd'];
  $duplicate = mysqli_query($conn,"SELECT * FROM administrateurs WHERE email = '$email'") ;
  if(mysqli_num_rows($duplicate) <= 0) {
    if($passwd == $cpasswd && strlen($passwd) >= 6) {
      $passwd = password_hash($passwd, PASSWORD_DEFAULT);
      $sql = "INSERT INTO administrateurs (nom, prenom, email, password, telephone) VALUES('$nom', '$prenom', '$email', '$passwd', '$tel')";
      $result = mysqli_query($conn, $sql);
      if ($result) {
        header("Location: Gestion-administrateurs.php?success=Administrateur est bien enregistré ");
      } else {
        header("Location: Gestion-administrateurs.php?error=Administrateur n'est pas bien enregistré");
      }
    } else {
      header("Location: FormulaireAjouterAdmin.php?error=Votre mot de passe est faible ou n'est pas confirmer correctement");
    }
  } else{
    header("Location: FormulaireAjouterAdmin.php?error=E-mail déja utilisé");
  }
}
?>
<section id="content">  
  <div class="container" style="margin-left: 10em;">
    <div class="title">Ajouter un administrateur  <a href="Gestion-administrateurs.php"><button type="button">X</button></a></div>
    <?php if (isset($_GET['error'])) { ?>
		    <div class="alert alert-danger" style="margin-top: 5px;width:600px;">
			  <?php echo $_GET['error']; ?>
			</div>
	 <?php } ?>
    <div class="content">
      <form  method="post" >
        <div class="user-details">
          <div class="input-box">
            <span class="details">Nom</span>
            <input type="text" placeholder="Nom" name="nom" required>
          </div>
          <div class="input-box">
            <span class="details">Prénom</span>
            <input type="text" placeholder="Prénom" name="prenom" required>
          </div>
          <div class="input-box">
            <span class="details">Email</span>
            <input type="email" placeholder="Email" name="email"required>
          </div>
          <div class="input-box">
            <span class="details">Telephone</span>
            <input type="text" placeholder="Téléphone" name="Tel" pattern="[0-0]{1}[5-7]{1}[0-9]{8}" title="le numero ne respect pas le format" required>
          </div>
          <div class="input-box">
            <span class="details">Mot de passe</span>
            <input type="Password" placeholder="Mot de passe" name="passwd" required>
          </div>
          <div class="input-box">
            <span class="details">Confirmer le mot de passe</span>
            <input type="password" placeholder="Confirmer le mot de passe" name="cpasswd" required>
          </div>
        </div>
        <div class="button">
          <input type="submit" name="ajouter" value="Engistrer">
        </div>
      </form>
    </div>
  </div>
</section>
</body>
</html>
