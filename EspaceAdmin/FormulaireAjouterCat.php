<?php
session_start();
if(!isset($_SESSION['code_adm'])) {
    header("location: ../index.php");
} 
?>
<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title> Ajouter une categorie </title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/styleForm.css">
  </head>
<body>
		<?php include "Nav-Categories.php"; ?>
    <?php
if (isset($_POST['ajoutercat'])) {
  include "conn.php";

  $titre= $_POST['titre'];
  $duplicate = mysqli_query($conn,"select * from categoriearticle where titre='$titre'") ;
  if(mysqli_num_rows($duplicate) <= 0) {
      $sql = "INSERT INTO categoriearticle (titre) VALUES('$titre')";
       $result = mysqli_query($conn, $sql);
       if ($result) {
          header("Location: Gestion-Categories.php?success=Catégorie est bien engistrée");
       }else {
          header("Location: Gestion-Categories.php?error=Catégorie n'est pas bien engistrée");
      }
  } else{
    header("Location: FormulaireAjouterCat.php?error=titre deja utilisé");
  }
}
?>
	<section id="content">
  <div class="container">
    <div class="title">Ajouter une categorie  <a href="Gestion-Categories.php"><button type="button">X</button></a></div>
    <?php if (isset($_GET['error'])) { ?>
      <div class="alert alert-danger" style="margin-top: 5px; width:600px;">
      <?php echo $_GET['error']; ?>
			</div>
	<?php } ?>
    <div class="content">
      <form  method="post" >
        <div class="user-details">
          <div class="input-box">
            <span class="details">Titre</span>
            <input type="text" placeholder="Titre de catégorie" name="titre" required>
          </div>
        </div>
        <div class="button">
          <input type="submit" name="ajoutercat" value="Enregistrer">
        </div>
      </form>
    </div>
  </div>
</section>
</body>
</html>