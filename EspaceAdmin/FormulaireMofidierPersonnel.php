<?php
session_start();
if(!isset($_SESSION['code_adm'])) {
    header("location: ../index.php");
} 
?>
<?php include 'scriptmodifierpersonnel.php'; ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title> Modifier un admin </title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/styleForm.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
<body>
	<?php include 'Nav-Administrateurs.php'?>
<section id="content">
  <div class="container">
    <div class="title">Modifier un personnel<a href="Gestion-Personnels.php">
      <button type="button">X</button></a></div>
    <?php if (isset($_GET['error'])) { ?>
		    <div class="alert alert-danger" style="margin-top: 5px;;width:600px;">
			  <?php echo $_GET['error']; ?>
			</div>
	<?php } ?>
    <div class="content">
      <form  method="post" action="scriptmodifierpersonnel.php">
        <div class="user-details">
          <div class="input-box">
            <span class="details">Nom</span>
            <input type="text" value="<?=$row['nom'] ?>" placeholder="Nom" name="nom" required>
          </div>
          <div class="input-box">
            <span class="details">prenom</span>
            <input type="text" value="<?=$row['prenom'] ?>" placeholder="Prénom" name="prenom" required>
          </div>
          <div class="input-box">
            <span class="details">Email</span>
            <input type="text" value="<?=$row['email'] ?>"  placeholder="email"  name="email"required>
          </div>
          <div class="input-box">
            <span class="details">telephone</span>
            <input type="text" value="<?=$row['telephone'] ?>" placeholder="télephone" name="telephone" 
            pattern="[0-0]{1}[5-7]{1}[0-9]{8}" title="le numero ne respect pas le format" required>
          </div>
          <div class="input-box">
            <span class="details">Profession</span>
            <input type="text" value="<?=$row['profession'] ?>" placeholder="Profession" name="Profession" required> <br>
          </div>
          <div class="input-box">
            <span class="details">Mot de passe</span>
            <input type="Password"  placeholder="Enter le mot de passe" name="password" required>
          </div>
	       <input type="text"
		          name="code_adm"
		          value="<?=$row['code_per']?>"
		          hidden >
          <div class="input-box">
            <span class="details">Confirmer le mot de passe</span>
            <input type="password" placeholder="Confirmer le mot de passe" name="cpasswd" required>
          </div>
        </div>
        <div class="button">
          <input type="submit" name="modifier" value="Engistrer">
        </div>
      </form>
    </div>
  </div>
</section>
</body>
</html>
