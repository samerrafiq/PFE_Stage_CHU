<?php
session_start();
if(!isset($_SESSION['code_utl'])) {
    header("location: ../index.php");
} 
?>
<?php 
    include "../conn.php";
    session_start();
    $code_utl = $_SESSION['code_utl'];
 $nom = $_GET['med'];
 $fr = $_GET['form'];
 $dosage = $_GET['dosage'];
 $med = mysqli_query($conn, "SELECT * FROM medicaments2014 WHERE NOM = '$nom' and FORME  = '$fr' and DOSAGE1 = $dosage"); 
 $med = mysqli_fetch_assoc($med);
?>
<!DOCTYPE html>
<html>
<head>
	<title>Medicament</title>
	<link rel="stylesheet" href="../personnel/assets/css/style.css">
	<style type="text/css">
		.titre2{
			 margin: 0px auto;
			 color: #137B07;
			 font-size: 25px;
			 margin-bottom: 30px;
			 margin-top: 10px;
		}
		.def{
			margin-left: 160px;
			font-weight: bold;
		}
		.divat{
			margin-bottom: 40px;
		}
		span{
			margin-left: 10px;
			color: red;
		}
		img{
			margin-left: 205px;
			border-radius: 10px;
			border: 2px solid red;
		}
        .myButton2 {
            background-color:#44c767;
            border-radius:8px;
            border:1px solid #18ab29;
            display:inline-block;
            cursor:pointer;
            color:#ffffff;
            font-family:Arial;
            font-size:15px;
            padding:11px 20px;
            text-decoration:none;
            text-shadow:0px 1px 0px #2f6627;
            margin-left: 1140px;
        }
        .myButton2:hover {
            background-color:#5cbf2a;
            }
        .myButton2:active {
        position:relative;
        top:1px;
          }
        .x{
            padding: 5px;
            border-radius: 4px;
            color: red;
            background-color: whitesmoke;
            cursor: pointer;
            border: 1px solid;
             width: 70px;
        }
        .x:hover{
            background-color: red;
            color: white;
        }
	</style>
</head>
<body>
	<?php 
		include "header.php" ;
	 ?>
 			<section style="background-color: whitesmoke;margin-bottom: 100px;margin-top: 90px;">
			<div class="details" style="margin-left: 50px;">
                <div class="recentOrders">
                    <div class="cardHeader">
                        <h2 style="margin-bottom: 40px;">Titre de medicament </h2>
                       <a href="Medicaments.php?med=<?php echo $med['NOM'] ;?>"> <button class="x">x</button></a>
                    </div>
                	<div class="divat">
                	<label style="font-weight: bold;" >Nom : <span><?php print($med['NOM'])?> </span></label>
                	<label class="def">Substance active : <span> <?php print($med['DCI1'])?> </span></label>
                	<label class="def" >Dosage :<span> <?php echo $med['DOSAGE1']."".$med['UNITE_DOSAGE1'];?> </span></label>
                	</div>
                	<div class="divat">
                		<label style="font-weight: bold;overflow-wrap: break-word;">Forme : <span> 
                			<?php print($med['FORME'])?> </span></label>
                	</div>
                	<div class="divat">
                		<label style="font-weight: bold;" >Présentation : <span> <?php print($med['PRESENTATION'])?></span></label>
                		<label class="def">Prix : <span><?php print($med['PRIX_BR']." DH")?></span></label>
                		<label class="def">Taux de remboursements : <span><?php print($med['TAUX_REMBOURSEMENT'])?></span></label>
                	</div>           	
                </div>
            </div>
		</section>
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