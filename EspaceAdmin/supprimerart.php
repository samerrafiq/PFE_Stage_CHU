<?php

if(isset($_GET['code_anc'])){
    include "conn.php";
    $id = $_GET['code_anc'];
    $result = mysqli_query($conn, "DELETE FROM articles WHERE code_art=$id");
    if($result) {
        header("Location:Gestion-Articles.php?success=Article bien supprimée");
    } else {
        header("Location:Gestion-Articles.php?error=Article pas bien supprimée");
    }
} else {
    header("Location:Gestion-Articles.php");
}
