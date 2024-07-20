<?php

if(isset($_GET['code_cat'])){
   include "conn.php";
	$id = $_GET['code_cat'];
	$sql = "DELETE FROM categoriearticle WHERE code_cat=$id";
   $result = mysqli_query($conn, $sql);
   if ($result) {
      header("Location:Gestion-Categories.php?success=Catégorie bien supprimée");
   } else {
      header("Location: Gestion-CategoriesCategorie.php?error=Catégorie bien supprimée");
   }
} else {
	header("Location: Gestion-Categories.php");
}
