<?php
session_start();
if(!isset($_SESSION['code_adm'])) {
    header("location: ../index.php");
} 
?>
<?php 
include "conn.php";
    $result = "";
    $msg ="";
    if(!isset($_GET['nom'])){
        $msg = "La table commentaire est vide.";
        $result = mysqli_query($conn, "SELECT * FROM commentaire ORDER BY code_cnt DESC");
    }else{
      $msg = "Mot clé introuvable.";
      $nom=$_GET['nom'];
      $result = mysqli_query($conn, "SELECT * FROM commentaire WHERE content like '%$nom%'");
    }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    	<meta charset="UTF-8"/>
    	<title>Gestion commentaire</title>
    	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
   	<link rel="stylesheet" href="css/styletab.css">
  </head>
  <body>

       <?php include "Nav-Commentaires.php" ?>
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
  <?php if (mysqli_num_rows($result)) { ?>
  <table style="margin-bottom: 40px; max-width: 1000px;">
    <thead>
      <tr>
        <th>Nom utlisateur</th>
        <th>Titre Article</th>
        <th>Commentaire</th>
        <th>Date</th>
        <th colspan="2" >Action</th>
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
	$rqt= "SELECT titre FROM articles where code_art = ".$rows['code_art']."";
	$res=mysqli_query($conn,$rqt);
	$ann= mysqli_fetch_assoc($res);
	$rqt2= "SELECT nom FROM utilisateur where code_utl = ".$rows['code_utl']."";
	$res2=mysqli_query($conn,$rqt2);
	$trq= mysqli_fetch_assoc($res2);
 	?>
        <td><?=$trq['nom']?></td>
        <td><?=$ann['titre']?></td>
        <td><?=$rows['content']?></td>
        <td><?php echo $rows['date_pub']; ?></td>
         <td><a onclick="supp(<?php echo$rows['code_cnt'] ;?>)"><button class="Sup">Supprimer</button></a></td>
      </tr>
  <?php } ?>
    </tbody>
  </table>
  <?php }else{ ?><div class="alert alert-dark" style="margin-top: 5px;width:600px;" ><?php echo $msg ;?>
  </div> <?php } ?>
  </div>
  </section>
   <script type="text/javascript">
    function supp(id) {
        if(confirm("Voulez vous supprimer ce commentaire?")){
            window.location.href='supprimercom.php?commentaire=' + id;
        }
    }
  </script>
   </body>
</html>
