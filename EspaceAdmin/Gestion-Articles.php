
<?php
session_start();
if(!isset($_SESSION['code_adm'])) {
    header("location: ../index.php");
} 
?><?php 
    include "conn.php";
    $result = "";
    $msg ="";
    if(!isset($_GET['nom'])){
        $msg = "La table des articles est vide.";
        $result = mysqli_query($conn, "SELECT * FROM articles ORDER BY code_art DESC");
    }else{
      $msg = "Mot clé introuvable.";
      $nom=$_GET['nom'];
      $result = mysqli_query($conn, "SELECT * FROM articles WHERE titre like '%$nom%' ");
    }
?>
<!DOCTYPE html>
<html>
<head>
	<title>Gestion des articles</title>
	<meta charset="UTF-8"/>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/styletab.css">
</head>
<body>
	<?php include "Nav-Articles.php" ?>
	<section id="content">
    <div class="All">
      <?php if (isset($_GET['success'])) { ?>
        <div  class="alert alert-success" style="margin-top: 5px;width:600px;">
        <?php echo $_GET['success']; ?>
    </div>
    <?php } ?>
    <?php if (isset($_GET['error'])) { ?>
        <div class="alert alert-danger" style="margin-top: 5px;width:700px;">
        <?php echo $_GET['error']; ?>
      </div>
  <?php } ?>
  <a href="FormulaireAjouterArt.php"><button class="Ajt" >Ajouter un article</button></a>
	<?php if (mysqli_num_rows($result)) { ?>
  <table style="margin-bottom: 40px; max-width: 1000px;">
    <thead>
      <tr>
        <th>Titre</th>
        <th>Categorie</th>
        <th>image d'article</th>
        <th>Commentaires</th>
	      <th>Date de publication</th>
	      <th colspan="3" class="text-center">Action</th>
      </tr>
    </thead>
    <tbody>
  <?php
        $i = 0;
        while($rows = mysqli_fetch_assoc($result)){
          $i++;
          ?>
  <tr>
 <?php
	$rqt= "SELECT titre FROM categoriearticle where code_cat = ".$rows['code_cat']."";
	$res=mysqli_query($conn,$rqt);
	$cat= mysqli_fetch_assoc($res);
  $rqt2 = "SELECT count(*) FROM commentaire where code_art = ".$rows['code_art']."";
  $res2 = mysqli_query($conn,$rqt2);
  $com = mysqli_fetch_assoc($res2);
 ?>
	<td style="overflow: hidden;text-overflow: ellipsis;max-width: 180px;"><?=$rows['titre']?></td>
	<td><?=$cat['titre']?></td>
  <td><img src="<?php print("../".$rows['image']);?>" width="100"  height="50" style="border-radius: 10px;"></td>
  <td><?=$com['count(*)'];?></td>
	<td><?=$rows['date_pub']?></td>
  <!--ajoueter une page  article pour l'admin -->
   <td><a href="../publique/article.php?article=<?=$rows['code_art']?>"><button style="background-color:purple;border-color:purple;" class="Mod">Aperçu</button> </a></td>
  <td> <a href="FormulaireModiferArt.php?code_adm=<?=$rows['code_art']?>"><button class="Mod">Modifier</button></a></td>
  <td><a onclick="supp(<?php echo$rows['code_art'] ;?>)"><button class="Sup">Supprimer</button></a></td>
  </tr>
  <?php } ?>
    </tbody>
  </table>
  <?php }else{ ?><div class="alert alert-dark" style="margin-top: 5px;width:600px;" ><?php echo $msg ;?>
  </div> <?php } ?>
  </div>
  </section>
  <script type="text/javascript">
    function supp(id){
      if(confirm("Voulez-vous supprimer ce article ?")){
          window.location.href='supprimerart.php?code_anc='+id;
        }
      }
  </script>
  <script src="js/script.js"></script>
</body>
</html>
