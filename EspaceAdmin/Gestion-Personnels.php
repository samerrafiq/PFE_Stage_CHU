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
        $msg = "La table personnels est vide.";
        $result = mysqli_query($conn, "SELECT * FROM personnels ORDER BY code_per DESC");
    }else{
      $msg = "Mot clé introuvable.";
      $nom=$_GET['nom'];
      $result = mysqli_query($conn, "SELECT * FROM personnels WHERE CONCAT(nom, prenom, email, profession) like '%$nom%' ");
    }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8"/>
    <title>Gestion personnels</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/styletab.css">
  </head>
  <body>
  <?php include "Nav-Personnels.php" ?>
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
  <a href="FormulaireAjouterPersonnel.php"><button class="Ajt" >Ajouter</button></a>
  <?php if (mysqli_num_rows($result)) { ?>
  <table style="margin-bottom: 40px; max-width: 1000px;">
    <thead>
      <tr>
        <th>N°</th>
        <th>Nom</th>
        <th>prenom</th>
        <th>Email</th>
        <th>Profession</th>
        <th colspan="2" class="text-center" >Action</th>
      </tr>
    </thead>
    <tbody>
  <?php
        $i = 0;
        while($rows = mysqli_fetch_assoc($result)){
          $i++;
          ?>
      <tr>
        <td><?=$i?></td>
        <td><?=$rows['nom']?></td>
        <td><?=$rows['prenom']?></td>
        <td><?php echo $rows['email']; ?></td>
        <td><?php echo $rows['profession']; ?></td>
        <td> <a href="FormulaireMofidierPersonnel.php?code_adm=<?=$rows['code_per']?>"><button class="Mod">Modifier</button></a></td>
        <td> <a onclick="supp(<?php echo $rows['code_per'] ;?>)"><button class="Sup">Supprimer</button></a></td>
      </tr>
  <?php } ?>
    </tbody>
  </table>
  <?php }else{ ?><div class="alert alert-dark" style="margin-top: 5px;width:600px;"><?php echo $msg ;?>
  </div> <?php } ?>
  </div>
  </section>
    <script type="text/javascript">
      function supp(id){
        if(confirm("Voulez vous supprimer ce personnel ?")){
          window.location.href='supprimerpersonnels.php?code_adm=' + id;
        }
      }
    </script>
   </body>
</html>
