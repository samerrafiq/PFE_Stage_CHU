
<?php

 include "../conn.php" ;
 //
session_start();
if(isset($_SESSION['code_per'])) {
    header("location: ../personnel/index.php");
    exit();
}
if(isset($_SESSION['code_adm'])) {
    header('location: ../EspaceAdmin/index.php');
    exit();
}
if(isset($_SESSION['code_utl'])) {
    header('location: ../declarateur/index.php');
    exit();
}
session_destroy();
//

?>
<!DOCTYPE html>
<html lang="zxx" class="no-js">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Connexion</title>
    <link rel="shortcut icon" type="x-icon" href="../img/about-img.jpg" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"
        integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous" />


    <!-- CSS============================================= -->
    <link rel="stylesheet" href="../css/connexionform.css">
    <style>
a{
    text-decoration: none;
}
.css-button {
    font-family: Arial;
    color: #ffffff;
    font-size: 15px;
    border-radius: 18px;
    border: 0px #268a16 dotted;
    background: linear-gradient(180deg, #77d42a 5%, #5cb811 100%);
    text-shadow: 1px 1px 1px #aade7c;
    box-shadow: inset 1px 1px 2px 0px #c9efab;
    cursor: pointer;
    display: inline-flex;
    align-items: center;
    margin-right: 30px;
}
.css-button:hover {
    background: linear-gradient(180deg, #5cb811 5%, #77d42a 100%);
}
.css-button-icon {
    padding: 7px 10px;
    border-right: 1px solid rgba(255, 255, 255, 0.16);
    box-shadow: rgba(0, 0, 0, 0.14) -1px 0px 0px inset;
}
.css-button-icon svg {
    vertical-align: middle;
    position: relative;
}
.css-button-text {
    padding: 7px 15px;
}

</style>
</head>
<?php
    $nom = "";
    $prenom = "";
    $email_reg = "";
    $password_reg = "";
    if(isset($_POST['button-connecte'])) {
        $email = $_POST['mail-login'];
        $password = $_POST['pass-login'];
        $result_adm = mysqli_query($conn, "SELECT * FROM administrateurs WHERE email = '$email'");
        $result_per = mysqli_query($conn, "SELECT * FROM personnels WHERE email = '$email'");
        $result_utl = mysqli_query($conn, "SELECT * FROM utilisateur WHERE email = '$email'");
        if(mysqli_num_rows($result_adm) > 0) {
            $ligne = mysqli_fetch_assoc($result_adm);
            if(password_verify($password, $ligne['password'])) {
                session_start();
                $_SESSION['code_adm'] = $ligne['code_adm'];
                header('location: ../EspaceAdmin/index.php');
                exit();
            }
        }else if(mysqli_num_rows($result_per) > 0) {
            $ligne = mysqli_fetch_assoc($result_per);
            if(password_verify($password, $ligne['password'])) {
                session_start();
                $_SESSION['code_per'] = $ligne['code_per'];
                header('location: ../personnel/index.php');
                exit();
            }
        } 
        else if(mysqli_num_rows($result_utl) > 0) {
            $ligne = mysqli_fetch_assoc($result_utl);
            if(password_verify($password, $ligne['password'])) {
                session_start();
                $_SESSION['code_utl'] = $ligne['code_utl'];
                header('location: ../declarateur/index.php');
                exit();
            }
        }
     }
    ?>
<body>
    <style type="text/css">
        .x{
            padding: 5px;
            border-radius: 4px;
            color: red;
            background-color: whitesmoke;
            cursor: pointer;
            border: 1px solid;
            width: 70px;
            margin-left: 1080px;
            margin-bottom: -500px;
            z-index: 9999999999999999999999999999999999999999999999999999999;
        }
        .x:hover{
            background-color: red;
            color: white;
        }
    </style>
    <div> 
      <a href="../index.php"><button class="x" >x</button></a>
    </div>
    <div class="container" style="width: 500px;margin-left: 200px;margin-top: 10px;">
        <div class="signin-signup">

            <!-- sign in form  -->
            <form action="" class="sign-in-form" method="post">
                 
                <h2 class="titre">
                    Connexion

                </h2>
                <div class="input-field">
                    <i class="fa fa-user"></i>
                    <input type="email" placeholder="Email" name="mail-login" required>
                </div>
                <div class="input-field">
                    <i class="fa fa-lock"></i>
                    <input type="password" placeholder="Mot de passe" name="pass-login" required>

                </div>
                <input type="submit" name="button-connecte" value="connexion" class="btn">
                <p class="account-text">Crée un compte? <a href="#" id="sign-up-btn2">Inscrption</a></p>
            </form>
        </div>
    </div>
</body>

</html>