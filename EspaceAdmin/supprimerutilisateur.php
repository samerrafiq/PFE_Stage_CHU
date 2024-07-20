<?php
include "conn.php";
if(isset($_GET['code_trq'])) {
    $id = $_GET['code_trq'];
    $email = mysqli_query($conn, "SELECT email FROM utilisateur WHERE code_utl = $id");
    $email = mysqli_fetch_assoc($email)['email'];
	$sql ="INSERT INTO bloquer(email) VALUES('$email')";
	$result = mysqli_query($conn, $sql);
	$sql = "DELETE FROM utilisateur WHERE code_utl = $id";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        header("Location:Gestion-Declarateurs.php?success=Utilisateur bien supprimé");
    } else {
        header("Location: Gestion-Declarateurs.php?error=Utilisateur n'est pas bien supprimé");
    }
} else {
	header("Location:Gestion-Declarateurs.php?error=Utilisateur n'est pas bien supprimé");
}
