<?php

if(isset($_GET['code_ctn'])){
   include "../conn.php";


	$id = $_GET['code_ctn'];

	$sql = "DELETE FROM declaration
	        WHERE id_dec=$id";
   $result = mysqli_query($conn, $sql);
   if ($result) {
   	  header("Location:index.php");
   }else {
      header("Location: index.php");
   }

}else {
	header("Location:index.php");
}
