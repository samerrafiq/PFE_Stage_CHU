<?php
include "conn.php";
if (isset($_GET['code_adm'])) {
	$code_adm= $_GET['code_adm'];
	$sql = "SELECT * FROM personnels WHERE code_per=$code_adm";
  $result = mysqli_query($conn, $sql);
  if(mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
  } else {
    header("Location: Gestion-Personnels.php?error=personnel introuvable");
  }
} else if(isset($_POST['modifier'])){
  $nom = $_POST['nom'];
  $prenom = $_POST['prenom'];
  $email = $_POST['email'];
  $tel = $_POST['telephone'];
  $passwd = $_POST['password'];
  $code_adm = $_POST['code_adm'];
  $Profession = $_POST['Profession'];
  $cpasswd = $_POST['cpasswd'];
  $duplicate = mysqli_query($conn, "SELECT * FROM personnels WHERE email = '$email'") ;
  if(mysqli_num_rows($duplicate) < 2) {
    if($passwd == $cpasswd && strlen($passwd) >= 6) {
      $passwd = password_hash($passwd, PASSWORD_DEFAULT);
      $sql = "UPDATE personnels SET nom='$nom', profession = '$Profession',password = '$passwd', telephone = '$tel', prenom = '$prenom', email = '$email' WHERE code_per = $code_adm";
      $result = mysqli_query($conn, $sql);
      if ($result) {
        header("Location:Gestion-Personnels.php?success=Personnel est bien modifié");
      } else {
        header("Location:Gestion-Personnels.php?error=Administrateur n'est pas bien modifié");
      }
    } else {
      header("Location:Gestion-Personnels.php?error=Admin ".$nom." n'est pas modifier car le mot de passe est faible ou n'est pas confirmer correctement");
    }
  } else {
    header("Location:Gestion-Personnels.php?error=Admin ".$nom." n'est pas modifier car Email deja utilisé");
  }
} else {
	header("Location: Gestion-Personnels.php");
}
?>