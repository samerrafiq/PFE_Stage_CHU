<?php
		include_once("../conn.php");
		session_start();
		if(!isset($_SESSION['code_per'])) {
		    header("location: ../index.php");
		    exit();
		}
		$declr = $_GET['dec'];
		$per = $_SESSION['code_per'] ;
		$declaration = mysqli_query($conn, "SELECT * FROM declaration WHERE id_dec = $declr");
           if(mysqli_num_rows($declaration) == 0) {
                 header('location: index.php');
                 exit(); }
    	$declaration = mysqli_fetch_assoc($declaration);
    	$code_utl = $declaration['code_utl'];
    	$declarateur = mysqli_query($conn, "SELECT * FROM utilisateur WHERE code_utl = $code_utl");
    	$declarateur = mysqli_fetch_assoc($declarateur);
    						   $nom = $declarateur['nom'];
                               $prenom = $declarateur['prenom'];
                               $decryption_iv = '1234567891011121';
                               $ciphering = "AES-128-CTR";
                               $options = 0;
                               $decryption_key = "GeeksforGeeks";
                                $nom=openssl_decrypt ( $nom, $ciphering, 
                                        $decryption_key, $options, $decryption_iv);
                                $prenom=openssl_decrypt ($prenom, $ciphering, 
                                        $decryption_key, $options, $decryption_iv);
?>
<!DOCTYPE html>
<html lang="en">
  <head>
  	<title>Repondre sur une déclaration</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,700' rel='stylesheet' type='text/css'>

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<link rel="stylesheet" href="../css/stylerep.css">
	<style type="text/css">
		.x{
            padding: 3px;
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
				if(isset($_POST['envoye'])){
					$message = $_POST['message'] ; 
		mysqli_query($conn, "INSERT INTO reponse(code_utl,id_dec, code_per, content) VALUES($code_utl,$declr, $per, \"$message\")");
		$et = "Déja traité";
		mysqli_query($conn, "UPDATE declaration SET etat = '$et' WHERE id_dec = $declr");
		print("<script> window.location.replace('declaration.php?dec=$declr'); </script>");
			      $receiver = $declarateur['email'];
                  $body = "Vous avez reçu une reponse sur votre déclaration sur l'effet indésirable suivant : \n".$declaration['Effetindesirableobserve'].".";
                  $subject = "Email automatique de la part de site des déclarations des éffets indésirable.";
                  $sender = "From:rafiq.samer20@ump.ac.ma";
                  mail($receiver, $subject, $body, $sender);
				}

		?>
	<section>
		<div class="container">
			<div class="row justify-content-center" >
				<div class="col-md-12">
					<div class="wrapper">
						<div class="row no-gutters">
							<div class="col-lg-8 col-md-7 order-md-last d-flex align-items-stretch" style="min-height: 500px;">
								<div class="contact-wrap w-100 p-md-5 p-4">
									<div><h3 class="mb-4">Repondre sur une declaration</h3>
										<a href="declaration.php?dec=<?php echo $declr ; ?>"><button style="float: right;margin-top: -70px;" class="x">x</button></a>
									</div>
									<form method="POST"  name="contactForm" class="contactForm">
										<div class="row">
											<!--<div class="col-md-6"> 
												<div class="form-group">
													<label class="label" for="email">Email Address</label>
													<input type="email" class="form-control" name="email" id="email" placeholder="Email">
												</div>
											</div>-->
											<div class="col-md-12">
												<div class="form-group">
													<label class="label">Message</label>
													<textarea name="message" class="form-control" cols="30" rows="7" placeholder="Message et remarques "></textarea>
												</div>
											</div>
											<div class="col-md-12">
												<div class="form-group">
													<input type="submit" value="Envoyé" name="envoye" class="btn btn-primary">
													<div class="submitting"></div>
												</div>
											</div>
										</div>
									</form>
								</div>
							</div>
							<div class="col-lg-4 col-md-5 d-flex align-items-stretch">
								<div class="info-wrap bg-primary w-100 p-md-5 p-4">
									<h5 style="color: white;margin-left: -30px;margin-bottom: 40px;">Information sur le declarateur</h5>
				        	<div class="dbox w-100 d-flex align-items-start">
				        	  <div class="text pl-3">
					            <p style="margin-left: -20px;"><span style="font-size: 15px;">*Nom et prénom :</span><span style="color: red;font-weight: bold;">  <span style="color: red;font-weight: bold;"><?php echo $nom." ".$prenom ; ?></span></p>
					          </div>
				          </div>
				        	<div class="dbox w-100 d-flex align-items-start">
				        	  <div class="text pl-3">
					            <p style="margin-left: -20px;"><span style="font-size: 15px;">*Sexe :</span> <span style="color: red;font-weight: bold;"><?php print($declarateur['sexe'])?> </span></p>
					          </div>
				          </div>
				        	<div class="dbox w-100 d-flex align-items-start">
				        	  <div class="text pl-3">
					            <p style="margin-left: -20px;"><span style="font-size: 15px;">*Nom de la spécialité :</span><span style="color: red;font-weight: bold;overflow-wrap: break-word;"> <?php print($declaration['nomspf'])?> </span></p>
					          </div>
				          </div>
				        	<div class="dbox w-100 d-flex align-items-start">
				        	  <div class="text pl-3">
					            <p style="margin-left: -20px;"><span style="font-size: 15px;">*Effet(s) indésirable(s) observé  :</span> <span style="color: red;font-weight: bold;overflow-wrap: break-word;"><?php print($declaration['Effetindesirableobserve'])?></span> </p>
					          </div>
				          </div>
			          </div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	</body>
</html>
