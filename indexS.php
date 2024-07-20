<?php

session_start();
if(isset($_SESSION['code_trq'])) {
	header("location: utilisateur/index.php");
    exit();
}
if(isset($_SESSION['code_adm'])) {
	header('location: EspaceAdmin/index.php');
    exit();
}
session_destroy();
//

?>

<!DOCTYPE html>
<html lang="zxx" class="no-js">

<head>
	<!-- Mobile Specific Meta -->
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!-- Favicon-->
	<link rel="shortcut icon" type="x-icon" href="img/about-img.jpg" />



	<!-- Author Meta -->
	<meta name="author" content="colorlib">
	<!-- Meta Description -->
	<meta name="description" content="">
	<!-- Meta Keyword -->
	<meta name="keywords" content="">
	<!-- meta character set -->
	<meta charset="UTF-8">
	<!-- Site Title -->
	<title>Site de déclaration des effets indesirable.</title>

	<link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet">
	<!--=====================================CSS============================================= -->
	<link rel="stylesheet" href="css/linearicons.css">
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="css/magnific-popup.css">
	<link rel="stylesheet" href="css/nice-select.css">
	<link rel="stylesheet" href="css/animate.min.css">
	<link rel="stylesheet" href="css/jquery-ui.css">
	<link rel="stylesheet" href="css/owl.carousel.css">
	<link rel="stylesheet" href="css/main.css">
	<link rel="stylesheet" href="css/style.css">
	<style type="text/css">
		.xxx:hover{
			border: 1px solid green;
			border-radius: 15px;
			padding-left: 15px; 
		}
		.myButton {
		box-shadow:inset 0px 0px 2px 0px #ffffff;
		background:linear-gradient(to bottom, #f9f9f9 5%, #e9e9e9 100%);
		background-color:#f9f9f9;
		border-radius:18px;
		border:1px solid #dcdcdc;
		display:inline-block;
		cursor:pointer;
		color:#260726;
		font-family:Arial;
		font-size:14px;
		font-weight:bold;
		padding:9px 15px;
		text-decoration:none;
		text-shadow:0px 1px 0px #ffffff;
		}
		.myButton:hover {
		background:linear-gradient(to bottom, #e9e9e9 5%, #f9f9f9 100%);
		background-color:#e9e9e9;
		}
		.myButton:active {
		position:relative;
		top:1px;
		}
		.txt {
		   overflow: hidden;
		   text-overflow: ellipsis;
		   display: -webkit-box;
		   -webkit-line-clamp: 2; /* number of lines to show */
		   -webkit-box-orient: vertical;
		}
	</style>
</head>
<!-- -->
<body>
	<header id="header" id="home" style="max-height: 80px;">
		<div class="header-top">
			<div class="container">
				<div class="row align-items-center">
					<div id="logo" class="col-lg-6 col-sm-6 col-4 header-top-left no-padding no-margin">
						<img src="img/about-img2.jpg" height="75" width="110" style="margin-left: -100px;
							margin-top: -20px;" />
							<img src="img/logochu2.jpg" height="75" width="110" style="margin-left: 1150px;
							margin-top: -15px;" />
					</div>
				</div>
			</div>
		</div>
		<div class="container main-menu" style="margin-top: -40px;" >
			<div class="row align-items-center justify-content-between d-flex">
				<nav id="nav-menu-container">
					<ul class="nav-menu">
<!--<li style="margin-bottom: -10px;margin-top: -7px;"><span id="logochu"><a href="index.html"><img src="img/logo.png" alt="" title="" style="border-radius: 10px;" /></a></span></li>-->
						<li class="menu-active"><a href="index.php">Accueil</a></li>
						<li class="menu-has-children"><a href="">Articles</a><ul>
				<li class="xxx"><a href="publique/sinformer.php">S'informer</a></li>
				<li class="xxx"><a href="publique/Articles.php">Actualité</a></li></ul>
			            </li>
			            <li><a href="publique/formulairedeclaration.php">Déclarer</a></li>
						<li><a href="publique/Medicaments.php">Medicaments</a></li>
						<li><a href="#apprp">À propos de nous</a></li>
					</ul>
				</nav><!-- #nav-menu-container -->
				<div id="commentcm">
					<a href="publique/connexionform.php">Connexion</a>
				</div>
			</div>
		</div>
	</header>
	<!-- #header -->

	<!-- start banner Area -->
	<section class="banner-area relative" id="home" style="max-height:530px; margin-top: 70px;">
		<div class="overlay overlay-bg"><img src=""></div>
		<div class="container">
			<div class="row fullscreen d-flex justify-content-center align-items-center">
				<div class="banner-content col-lg-9 col-md-12 ">
					<h1 style="margin-top: -200px;">Déclarer un effet indésirable</h1><br>
					<p style="color: white;font-size: 30px;" class="typing" >
						
					</p><br><br>
					<a href="publique/formulairedeclaration.php" ><button class="myButton">Déclarer un effet</button></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					<a href="#commentcamarche"><button class="myButton">Comment ça marche ?</button></a>
				</div>
			</div>
		</div>
	</section>
	<!-- End banner Area -->

	<!-- Comment ca marche Area -->
	<section class="service-area section-gap" style="margin-left: 180px; " id="commentcamarche">
		<div class="container">
			<div class="row d-flex justify-content-center">
				<div class="col-md-12 pb-40 header-text text-center">
					<h1 class="pb-10" style="margin-left: -50px;"> Comment faire une déclaration ? </h1>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-3 col-md-6" >
					<div class="single-service" style="padding-bottom: 74px;">
						<h2 style="text-align: center;">1</h2>
						
							<h4 style="text-align: center;cursor: pointer;">Accéder a la page de declaration</h4>
						
						<p style="text-indent: 30px; text-align: justify;">
							Vous pouvez aller sur la page de déclaration en cliquant simplement sur le bouton "Déclarer un effet" situé en haut.
						</p>
					</div>
				</div>

				<div class="col-lg-3 col-md-6" style="margin-left: 80px; margin-right: 80px">
					<div class="single-service">
						<h2 style="text-align: center;">2</h2>
						
							<h4 style="text-align: center;cursor: pointer;">Remplire le formulaire attentivement</h4>
						
						<p style="text-indent: 30px; text-align: justify;">
							Remplir le formulaire du déclaration, mais prêtez attention à l'information que vous fournissez car elle sera utilisée pour vous offrir une solution ou pour améliorer votre expérience avec un médicament.
						</p>
					</div>
				</div>

				<div class="col-lg-3 col-md-6">
					<div class="single-service">
						<h2 style="text-align: center;">3</h2>
						
							<h4 style="text-align: center;cursor: pointer;">Attendez une répense à votre déclaration</h4>
						
						<p style="text-indent: 30px; text-align: justify;">
							Après la déclaration, un retour sera envoyé dans les meilleurs délais par un spécialiste.
                            Si vous êtes inscrit vous le trouverez dans l'espace de messagerie sinon dans votre email.
						</p>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- End comment ca marche Area -->

	<!-- Start services Area -->
	<section class="feature-area section-gap" style="margin-top: -170px;">
		<div class="container">
			<div class="row d-flex justify-content-center">
				<div class="menu-content pb-60 col-lg-8">
					<div class="title text-center">
						<h1 class="mb-10">Nos services</h1>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-6 col-md-6">
					<div class="single-feature d-flex flex-row">
						<div class="icon">
							<span class="lnr lnr-bullhorn"></span>
						</div>
						<div class="details">
							<h4>Déclarer un effet indésirable</h4>
							<p>
								Nous vous permettons de faire des déclarations sur les effects indesirables liés à votre consommation d'un medicament particulière, d'une plante ou bien d'un dispositif médicale.
							</p>
						</div>
					</div>
				</div>
				<div class="col-lg-6 col-md-6">
					<div class="single-feature d-flex flex-row">
						<div class="icon">
							<span class="lnr lnr-eye"></span>
						</div>
						<div class="details">
							<h4>Suivi du declaration</h4>
							<p>
								Nous vous offrons le service de répondre à vos déclarations et de fournir des solutions aux problèmes.
							</p>
						</div>
					</div>
				</div>
				<div class="col-lg-6 col-md-6">
					<div class="single-feature d-flex flex-row">
						<div class="icon">
							<span class="lnr lnr-diamond"></span>
						</div>
						<div class="details">
							<h4>informations et Actualité</h4>
							<p>
								Nous vous proposons un ensemble d'articles pédagogiques sur l'intoxication et comment y faire face, ainsi que les derniers articles et événements dans le domaine de la santé.
							</p>
						</div>
					</div>
				</div>
				<div class="col-lg-6 col-md-6">
					<div class="single-feature d-flex flex-row">
						<div class="icon">
							<span class="lnr lnr-heart-pulse"></span>
						</div>
						<div class="details">
							<h4>Médicamants</h4>
							<p>
								Nous vous permettons aussi de recherhé dans la liste des médicaments comercialisé au maroc et avoir des informations eux.
							</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- End feature Area -->

	<!-- Start home-about Area -->
	<section class="home-about-area section-gap relative" id="apprp">
		<div class="container">
			<div class="row align-items-center justify-content-end">
				<div class="col-lg-6 no-padding home-about-right">
					<h1 class="text-white">
						Qui sommes-nous ?
					</h1>
					<p>
						Infromations seront demandé depuis CHU Infromations seront demandé depuis CHU Infromations seront demandé depuis CHU Infromations seront demandé depuis CHU Infromations seront demandé depuis CHU Infromations seront demandé depuis CHU Infromations seront demandé depuis CHU Infromations seront demandé depuis CHU.
					</p>
					<div class="row no-gutters">
						<div class="single-services col">
							<p style="margin-left: 220px;margin-top: 30px;"> 
								<!--<a href="publique/apropos.php" class="myButton">Découvrir</a>-->
							</p>
						</div>
						
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- End home-about Area -->

	


	 ?>
	<!-- Start blog Area -->
	<section class="blog-area section-gap" id="blog">
		<div class="container">
			<div class="row d-flex justify-content-center">
				<div class="menu-content pb-70 col-lg-8">
					<div class="title text-center">
						<h1 class="mb-10">Actualités</h1>
					</div>
				</div>
			</div>
			<div class="row">
				<?php 
		include "conn.php";
		$result = mysqli_query($conn, "SELECT code_art, titre, image, date_pub FROM articles ORDER BY date_pub DESC");
		if(mysqli_num_rows($result) > 0)
		{
			$index = 1;
			while($article = mysqli_fetch_assoc($result) and $index <= 4)
			{
				$index++;
				$image = $article['image'];
				$title = $article['titre'];
				$date = $article['date_pub'];
				$code_art = $article['code_art'];
				$rqt2 = "SELECT count(*) FROM commentaire where code_art = ".$article['code_art']."";
  				$res2 = mysqli_query($conn,$rqt2);
  				$com = mysqli_fetch_assoc($res2);
		?>
				<div class="col-lg-3 col-md-6 single-blog">
					<div class="thumb">
						<img class="img-fluid" src="<?php echo $image;?>" alt="">
					</div>
					<p class="date"><?php echo explode(" ", $date)[0];?></p>
					<a href="publique/article.php?article=<?php print($code_art);?>">
						<h4 class="txt" style="overflow-wrap: break-word;"><?php echo $title;?></h4>
					</a>
					<div class="meta-bottom d-flex justify-content-between">
						<p> </p>
			<p><span class="lnr lnr-bubble"></span> <?= $com['count(*)']." Commentaires" ;?></p>
					</div>
				</div>
				<?php
			} ?>
			</div>
			</div>
	    <div class="voir-plus" ><form method="post" action="publique/Articles.php"><Button >Voir plus</Button></form></div>
		<?php
		} else {
			echo "<h1 style=''>Aucune article trouvé.</h1>";
		}
		?>
		</div>
	</section>
	<!-- End blog Area -->

	<!-- start footer Area -->
	<footer class="footer-area section-gap" style="max-height: 340px;">
		<div class="container">
			<div class="row">
				<div class="col-lg-6  col-md-6">
					<div class="single-footer-widget newsletter">
						<h6>Newsletter</h6>
						<p>Vous pouvez nous faire confiance. nous n'envoyons que des notifications sur les articles, pas un seul spam.</p>
						<div id="mc_embed_signup">
							<form target="_blank" novalidate="true"
								action="https://spondonit.us12.list-manage.com/subscribe/post?u=1462626880ade1ac87bd9c93a&amp;id=92a4423d01"
								method="get" class="form-inline">

								<div class="form-group row" style="width: 100%">
									<div class="col-lg-8 col-md-12">
										<input name="EMAIL" placeholder="Votre address email"
											onfocus="this.placeholder = ''"
											onblur="this.placeholder = 'Votre address email '" required="" type="email">
										<div style="position: absolute; left: -5000px;">
											<input name="b_36c4fd991d266f23781ded980_aefe40901a" tabindex="-1" value=""
												type="text">
										</div>
									</div>

									<div class="col-lg-4 col-md-12">
										<button class="nw-btn primary-btn">S'abonner<span
												class="lnr lnr-arrow-right"></span></button>
									</div>
								</div>
								<div class="info"></div>
							</form>
						</div>
					</div>
				</div>
				<div class="col-lg-2  col-md-6" >
					<div class="single-footer-widget">
						<h6>Accés rapide</h6>
						<ul class="footer-nav">
							<li><a href="publique/formulairedeclaration.php">Déclarer</a></li>
							<li><a href="publique/Articles.php">Actualité</a></li>
							<li><a href="publique/Medicaments.php">Médicaments</a></li>
							<li><a href="publique/legal.php">Mention légal</a></li>
						</ul>
					</div>
				</div>
				<div class="col-lg-4  col-md-6">
					<div class="single-footer-widget mail-chimp" style="margin-left: 120px;margin-top: 50px;">
						<a href="publique/contact.php"><button style="background-color: green;padding: 15px;border-radius: 15px;cursor: pointer;border:none;"><h6 class="mb-20" style="margin-bottom: -2px;" >Contactez-nous</h6></button></a>	
						<!--
						<a href="tel:+060000000">
							<span class="lnr lnr-phone-handset"></span>&nbsp;&nbsp;060000000</a>
						<br>
						<a href="mailto:support@colorlib.com">
							<span class="lnr lnr-envelope"></span>&nbsp;&nbsp;Email@chu.ma</a>
						-->	
					</div>
				</div>
				<p style="margin-left: 400px;margin-top: 40px;">Copyright © Royaume du Maroc / Ministère de la Santé </p>
			</div>

			
		</div>
	</footer>
	<!-- End footer Area -->
	<script type="text/javascript">
		var prevScrollpos = window.pageYOffset;
		window.onscroll = function() {
				var currentScrollPos = window.pageYOffset;
				  if (prevScrollpos > currentScrollPos) {
				    document.getElementById("logo").style.visibility = "visible";
				  } else {
				    document.getElementById("logo").style.visibility = "hidden";
				  }
				  prevScrollpos = currentScrollPos;
				}
	</script>
	<script src="js/vendor/jquery-2.2.4.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
		integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
		crossorigin="anonymous"></script>
	<script src="js/vendor/bootstrap.min.js"></script>
	<script type="text/javascript"
	src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBhOdIF3Y9382fqJYt5I_sswSrEw5eihAA"></script>
	<script src="js/easing.min.js"></script>
	<script src="js/hoverIntent.js"></script>
	<script src="js/superfish.min.js"></script>
	<script src="js/jquery.ajaxchimp.min.js"></script>
	<script src="js/jquery.magnific-popup.min.js"></script>
	<script src="js/jquery-ui.js"></script>
	<script src="js/owl.carousel.min.js"></script>
	<script src="js/jquery.nice-select.min.js"></script>
	<script src="js/mail-script.js"></script>
	<script src="js/main.js"></script>
	<script src="js/type.js"></script>
</body>

</html>