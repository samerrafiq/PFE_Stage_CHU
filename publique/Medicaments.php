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
    header('location: ../declarateur/Medicaments.php');
    exit();
}
session_destroy();
//

?>

<<?php 
	 	include "../conn.php" ;
	 	$result = " ";
	 	$nom = "";
        if(!isset($_POST['chercher'])){
        /*	if(isset($_GET['med'])){
        		$nom = $_GET['med'];
        		$result = mysqli_query($conn, "SELECT * FROM medicaments2014 WHERE NOM LIKE '%$nom%'");
        	}else{*/
        		$result = mysqli_query($conn, "SELECT * FROM medicaments2014 ");
        	//}
         
        }
        else {
         $nom = $_POST['nom'];
         $result = mysqli_query($conn, "SELECT * FROM medicaments2014 WHERE NOM LIKE '%$nom%'"); 
        }
?>
<!DOCTYPE html>
<html>
<head>
	<title>Medicaments</title>
	<style type="text/css">
		.ccc{
			 outline: none;
			 padding-left: 5px; 
			 border :1px solid green;
			 border-radius: 6px;
			 width: 300px;
			 height: 40px;
		}
		input[type="text"]::placeholder {  
                padding-left: 10px; 
            } 
        .formx{
        	margin-left: 700px;
        }
        .btt{
        	height: 40px;
        	border-radius: 6px;
        	cursor: pointer;
        	outline: none;
        	border-color: green;
        	background-color: #44E631;
        	color:#ffffff;
        }
        .btt:hover{
        	color: #44E631;
        	background-color: #ffffff;
        }
	</style>
</head>
<body>
	<?php 
		 include  "header.php" ;
	 ?>
     <section style="margin-top: 67px;margin-left: 112px;background-color: whitesmoke;height: 60px;margin-right: 112px;padding: 10px;border-bottom-right-radius: 10px;border-bottom-left-radius: 10px; ">
     	<form class="formx" method="post">
     	<input type="text" name="nom" placeholder="Nom du medicament" class="ccc" required>
     	<input type="submit" value="Chercher" class="btt" name="chercher">
     	</form>
     </section>
      <?php
            for($index = 1; $index <= 10; $index++)
            { 
       ?>
	 <section style="margin-top: 20px;margin-left: 20px;display: flex;padding-left: 60px;"> 
	 	 <?php
            for($index2 = 1; $index2 <= 4; $index2++)
            { 
            	$med = mysqli_fetch_assoc($result);
            	if(!$med) break;
            	if(!$med) break;?>
		<div class="card text-white bg-success mb-3" style="max-width: 18rem;margin-left: 10px;width: 300px;min-height: 220px;">
		  <div class="card-header"><a href="Medicament.php?med=<?php echo $med['NOM'] ;?>&form=<?php echo $med['FORME'] ;?>&dosage=<?php echo $med['DOSAGE1'] ;?>"  style="border: 1px solid white;padding: 5px;color:white">Voir plus</a></div>
		  <div class="card-body">
		    <h5 class="card-title"><?= $med['NOM'] ;?></h5>
		    <p class="card-text">Forme : <?= $med['FORME'] ;?></p>
		    <p class="card-text">Presentation : <?= $med['PRESENTATION'] ;?></p>
		  </div>
		</div>
		<?php
        } 
        ?>
	</section>
	 <?php
        } 
        ?>



	 <?php 
		include "footer.php" ;
	?>

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