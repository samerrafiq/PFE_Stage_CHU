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
    header('location: ../declarateur/contact.php');
    exit();
}
session_destroy();
//

?>
	<!DOCTYPE html>
	<html lang="zxx" class="no-js">
			<head>
				<title>Conractez-nous</title>
				<link rel="shortcut icon" type="x-icon" href="../img/about-img.jpg" />
			</head>
			<!-- start header -->
			  	<?php include"header.php" ?>
			 <!-- end header -->

			<!-- start banner Area -->
			<section class="banner-area relative about-banner" id="home" style="max-height: 250px;">	
				<div class="overlay overlay-bg"></div>
				<div class="container">				
					<div class="row d-flex align-items-center justify-content-center">
						<div class="about-content col-lg-12" style="margin-top: -30px;">
							<h1 class="text-white">
								Contactez-nous				
							</h1>	
						<p class="text-white link-nav"><a href="index.html">Accueil </a>  <span class="lnr lnr-arrow-right"></span>  <a href="contact.html"> Contactez-nous</a></p>
						</div>	
					</div>
				</div>
			</section>
			<!-- End banner Area -->				  
				<!-- start script -->
	<?php

    if(isset($_GET['email']))
    {
    	include '../conn.php' ;
		$email = $_GET['email'];
        $sujet = $_GET['sujet'];
        $message = $_GET['message'];
        $result = mysqli_query($conn, "INSERT INTO contact(email, sujet, message) VALUES('$email', '$sujet', '$message')");
        if($result) {
           echo "<script>alert(\"Message envoyé\")</script>";
        }
      print("<script>window.location.replace('contact.php')</script>");
    }
	?>
			<!-- Start contact-page Area -->
			<section class="contact-page-area section-gap">
				<div class="container">
					<div class="row">
						<!--	<div class="map-wrap" style="width:100%; height: 445px;" id="map"></div> -->
						<div class="col-lg-4 d-flex flex-column address-wrap">
							<div class="single-contact-address d-flex flex-row">
								<div class="icon">
									<span class="lnr lnr-home"></span>
								</div>
								<div class="contact-details">
									<h5>BP 4806 Oujda Universite 60049 Oujda، Oujda</h5>
								</div>
							</div>
							<div class="single-contact-address d-flex flex-row">
								<div class="icon">
									<span class="lnr lnr-phone-handset"></span>
								</div>
								<div class="contact-details">
									<h5>00 (958) 9865 562(numero vert !!)</h5>
									<p>temps du srevice</p>
								</div>
							</div>
							<div class="single-contact-address d-flex flex-row">
								<div class="icon">
									<span class="lnr lnr-envelope"></span>
								</div>
								<div class="contact-details">
									<h5>email@chu.com</h5>
								</div>
							</div>														
						</div>
						<div class="col-lg-8">
					<form class="form-area " id="myForm" method="get" class="contact-form text-right"   onsubmit="return true;" >
								<div class="row">	
									<div class="col-lg-6 form-group">
									<input name="email" placeholder="Votre email" 
									pattern="[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{1,63}$" 
									class="common-input mb-20 form-control" required type="email">
									
									<input name="sujet" placeholder="Sujet" class="common-input mb-20 form-control" required type="text">
									</div>
									<div class="col-lg-6 form-group">
										<textarea class="common-textarea form-control" name="message" placeholder="Message" required></textarea>				
									</div>
									<div class="col-lg-12">
										<div class="alert-msg" style="text-align: left;"></div>
										<button type="submit" id="btnn" class="genric-btn primary circle" style="float: right;" name="envoyer" 
									onclick="sub();" >Envoyer</button>
											<script type="text/javascript">
												function sub() {
													var btn = document.getElementById('btnn') ;
													var form = document.getElementById('myForm') ;
													if(true){
														form.submit();
													}
													
												}
											</script>
									</div>
								</div>
						</form>	
						</div>
					</div>
				</div>	
			</section>
			<!-- End contact-page Area -->

			<!-- start footer Area -->		
			<?php include "footer.php" ?>
			<!-- End footer Area -->

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