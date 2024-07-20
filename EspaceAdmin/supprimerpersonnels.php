<?php

include "conn.php";
if(isset($_GET['code_adm'])) {
    $code_adm = $_GET['code_adm'];
    $result = mysqli_query($conn, "DELETE FROM personnels WHERE code_per = $code_adm");
    if ($result) {
        header("Location:Gestion-Personnels.php?success=Personnel bien supprimé");
    } else {
        header("Location: Gestion-Personnels.php?error=Personnel bien supprimé");
    }
} else {
    header("Location:Gestion-Personnels.php");
}

?>