<?php

if(isset($_GET['code_ctn'])){
   include "conn.php";


	$id = $_GET['code_ctn'];

	$sql = "DELETE FROM contact
	        WHERE code_ctn=$id";
   $result = mysqli_query($conn, $sql);
   if ($result) {
   	  header("Location:Gestion-Contact.php?success=Message bien supprimé");
   }else {
      header("Location: Gestion-Contact.php?error=Message bien supprimé");
   }

}else {
	header("Location:Gestion-Contact.php");
}
