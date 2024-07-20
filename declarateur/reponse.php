<?php
session_start();
if(!isset($_SESSION['code_utl'])) {
    header("location: ../index.php");
} 
?>
<?php 
    include "../conn.php";
    $dec = $_GET['dec'];
    $code_per = " ";
    $code_utl = " ";
    $personel = " ";
    $utilisateur = " ";
    $declaration =" ";
    $reponse = mysqli_query($conn, "SELECT * FROM reponse where id_dec = $dec");
     if(mysqli_num_rows ( $reponse ) > 0){
    $reponse = mysqli_fetch_assoc($reponse);
    $content = $reponse['content'];
    $code_per = $reponse['code_per'];
    $code_utl = $reponse['code_utl'];
    $personel = mysqli_query($conn, "SELECT * FROM personnels where code_per = $code_per");
    $personel = mysqli_fetch_assoc($personel);
    $utilisateur = mysqli_query($conn, "SELECT * FROM utilisateur where code_utl = $code_utl");
    $utilisateur = mysqli_fetch_assoc($utilisateur);
    $declaration = mysqli_query($conn, "SELECT * FROM declaration WHERE id_dec = $dec");
    $declaration = mysqli_fetch_assoc($declaration);
    }
 ?>
<!DOCTYPE html>
<html>
    <head>
        <style>
        body{font-family: arial; font-size: 10pt;}
        img{display: block;  width: 300px; margin: auto; margin-bottom: 5%;}
        h2{font-family:arial; font-size: 10pt; padding-left: 10px; color: #383838;}
        li{line-height: 1em; margin-bottom: 12px;}
        span{color: blue;}
        .wrapper{width: 90%; margin: 20px auto; }
        .end { padding-top:4%; }
        p .box { padding-top:5%; }
        .box {margin: 30px;
            background-color: #ffffff;
            border: 1px solid black;
            opacity: 0.8;
            padding: 20px;
            filter: alpha(opacity=60);}
        .box-bottom {
            padding-left: 40px;
            padding-right: 40px;}
        @media screen and (min-width: 600px) {
            .wrapper{width: 60%; margin: 20px auto;} 
            p .box{
                padding-top:2%;
            }
            .end {
                padding-top:4%;
            }
        }
        </style>
    </head>
    <body>
        <?php 
            include "header.php" ;
        ?>
            
         <?php   if($reponse){ ?> 
        <div class="wrapper" style="margin-top: 80px;">
            <div class="box">
                    <img src="../img/about-img.jpg" alt="Logo" height="300">
                    <div>
                        <?php 
                            if(isset($utilisateur['nom'])){
                               $nom = $utilisateur['nom'];
                               $prenom = $utilisateur['prenom'];
                               $decryption_iv = '1234567891011121';
                               $ciphering = "AES-128-CTR";
                               $options = 0;
                               $decryption_key = "GeeksforGeeks";
                                $nom=openssl_decrypt ( $nom, $ciphering, 
                                        $decryption_key, $options, $decryption_iv);
                                $prenom=openssl_decrypt ($prenom, $ciphering, 
                                        $decryption_key, $options, $decryption_iv);}
                    ?>
                        <h4 class="end" style="text-align: left;">Bonjour <?php 
                            if(isset($nom) && isset($prenom)){
                           echo $nom." ".$prenom; }?>,</h4>
                        <?php if(isset($declaration['Effetindesirableobserve']) && isset($personel['nom'])){ ?>
                        <p> Vous avez reçu une reponse consernant l'effet indésirable suivant : <span> <?php print($declaration['Effetindesirableobserve'])?> </span> , Par <span> <?php echo $personel['nom']." ".$personel['prenom']; ?> </span>,<?php echo $personel['profession']; ?></p>
                         <?php } else{  ?>
                            <p>Votre déclaration est en traitment ,une reponse va étre delivré le plus tot possible.</p><?php }  ?>
                            <?php 
                             if(isset($content)){  ?>
                <p style="font-weight: bold;"><?php  echo $content;?>.</p><?php }?>
                        <p class="end"><i>Merci de faire confiance a notre service.</i></p>
                    </div>
            </div>
            <div class="box-bottom">
                <p>Copyright © Royaume du Maroc / Ministère de la Santé</p>
            </div>
        </div>
    <?php } ?>
        <script src="../js/vendor/jquery-2.2.4.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="../js/vendor/bootstrap.min.js"></script>
        <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBhOdIF3Y9382fqJYt5I_sswSrEw5eihAA"></script>
        <script src="../js/easing.min.js"></script>
        <script src="../js/hoverIntent.js"></script>
        <script src="../js/superfish.min.js"></script>
        <script src="../js/jquery.ajaxchimp.min.js"></script>
        <script src="../js/jquery.magnific-popup.min.js"></script>
        <script src="../js/jquery-ui.js"></script>
        <script src="../js/owl.carousel.min.js"></script>
        <script src="../js/jquery.nice-select.min.js"></script>
        <script src="../js/mail-script.js"></script>
        <script src="../js/main.js"></script>
    </body>
</html>