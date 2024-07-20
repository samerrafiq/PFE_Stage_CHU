<?php

include "conn.php";
if(isset($_GET['code_adm'])) {
    $code_adm = $_GET['code_adm'];
    $result = mysqli_query($conn, "DELETE FROM administrateurs WHERE code_adm = $code_adm");
    if ($result) {
        header("Location:Gestion-administrateurs.php?success=Administrateur bien supprimé");
    } else {
        header("Location: Gestion-administrateurs.php?error=Administrateur bien supprimé");
    }
} else {
    header("Location:Gestion-administrateurs");
}

?>
