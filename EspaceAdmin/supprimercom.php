<?php

if(isset($_GET['commentaire'])){
    include "conn.php";
	$id = $_GET['commentaire'];

	$sql = "DELETE FROM commentaire WHERE code_cnt = $id";
    $result = mysqli_query($conn, $sql);
    if ($result) {
   	    header("Location:Gestion-Commentaires.php?success=Commentaire bien supprimé");
    } else {
        header("Location:Gestion-Commentaires.php?error=Commentaire pas bien supprimé");
    }

}else {
	header("Location:Gestion-Commentaires.php");
}
