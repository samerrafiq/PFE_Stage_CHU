<?php

include "conn.php";
if(isset($_GET['email'])) {
	$email = $_GET['email'];
    $result = mysqli_query($conn, "DELETE FROM bloquer WHERE email = '$email'");
    if ($result) {
        header("Location:Gestion-Bloquer.php?success=Troqueur bien débloqué");
    } else {
        header("Location: Gestion-Bloquer.php?error=Troqueur pas bien débloqué");
    }
} else {
	header("Location: Gestion-Bloquer.php");
}
?>
