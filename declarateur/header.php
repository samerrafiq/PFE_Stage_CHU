
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
	<link rel="stylesheet" href="../css/linearicons.css">
	<link rel="stylesheet" href="../css/font-awesome.min.css">
	<link rel="stylesheet" href="../css/bootstrap.css">
	<link rel="stylesheet" href="../css/magnific-popup.css">
	<link rel="stylesheet" href="../css/nice-select.css">
	<link rel="stylesheet" href="../css/animate.min.css">
	<link rel="stylesheet" href="../css/jquery-ui.css">
	<link rel="stylesheet" href="../css/owl.carousel.css">
	<link rel="stylesheet" href="../css/main.css">
	<link rel="stylesheet" href="../css/style.css">
	<style type="text/css">
		.xxx:hover{
			border: 1px solid green;
			border-radius: 15px;
			padding-left: 15px; 
		}
	</style>
</head>
<header id="header" id="home"  style="max-height: 80px;">
		<div class="header-top">
			<div class="container">
				<div class="row align-items-center">
					<div id="logo" class="col-lg-6 col-sm-6 col-4 header-top-left no-padding no-margin">
						<img src="../img/about-img2.jpg" height="75" width="110" style="margin-left: -100px;
							margin-top: -20px;" />
							<img src="../img/logochu2.jpg" height="75" width="110" style="margin-left: 1150px;
							margin-top: -15px;" />
					</div>
				</div>
			</div>
		</div>
		<div class="container main-menu" style="margin-top: -50px;">
			<div class="row align-items-center justify-content-between d-flex">
				<nav id="nav-menu-container">
					<ul class="nav-menu">
<!--<li style="margin-bottom: -10px;margin-top: -7px;"><span id="logochu"><a href="../index.php"><img src="../img/logo.png" alt="" title="" style="border-radius: 10px;" /></a></span></li>-->
						<li class="menu-active"><a href="index.php">Mes declarations</a></li>
						<li class="menu-has-children"><a href="">Articles</a><ul>
				<li class="xxx"><a href="sinformer.php">S'informer</a></li>
				<li class="xxx"><a href="Articles.php">Actualité</a></li></ul>
			            </li>
			            <li><a href="formulairedeclaration.php">Déclarer</a></li>
						<li><a href="Medicaments.php">Medicaments</a></li>
						
					</ul>
				</nav><!-- #nav-menu-container -->
				<div id="commentcm">
					<a href="../deconnexion.php">Deconnexion</a>
				</div>
			</div>
		</div>
	</header>
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