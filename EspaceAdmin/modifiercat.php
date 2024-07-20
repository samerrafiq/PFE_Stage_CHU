<?php
if (isset($_GET['code_cat'])) {
	include "conn.php";

	$code_cat= $_GET['code_cat'];

	$sql = "SELECT * FROM categoriearticle WHERE code_cat=$code_cat";
   	 $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
    	$row = mysqli_fetch_assoc($result);
    }else {
    	header("Location: Gestion-Categories.php?error=Catégorie introuvable");
    }
}else if(isset($_POST['modifiercat'])){
    include "conn.php";
	$titre= $_POST['titre'];
	$code_cat = $_POST['code_cat'];
      $duplicate = mysqli_query($conn,"select * from categoriearticle where titre='$titre'") ;
    if(mysqli_num_rows($duplicate) <1) {
        $sql = "UPDATE categoriearticle SET titre='$titre' WHERE code_cat=$code_cat";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            header("Location:Gestion-Categories.php?success=La catégorie est bien modifiée");
        }else {
            header("Location:Gestion-Categories.php?error=La catégorie n'est pas bien modifiée");
        }
    } else {
        header("Location:Gestion-Categories.php?error=Le titre : ".$titre." n'est pas modifier car il est deja utilisé");
    }
} else {
	header("Location: Gestion-Categories.php");
}
