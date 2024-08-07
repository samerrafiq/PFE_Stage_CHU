<?php
session_start();
if(!isset($_SESSION['code_adm'])) {
		header("location: ../index.php");
} 
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- Boxicons -->
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
	<!-- My CSS -->
	<link rel="stylesheet" href="css/mystyle.css">
	<link rel="stylesheet" href="css/card.css">

	<title>Accueil Admin</title>
</head>
<body>
	<!-- SIDEBAR -->
	<section id="sidebar">
		<a href="index.php" class="brand">
			<i class='bx bx-reflect-vertical'></i>
			<span class="text">Espace Admin</span>
		</a>
		<ul class="side-menu top">
			<li class="active" >
				<a href="index.php">
					<i class='bx bxs-dashboard' ></i>
					<span class="text">Statistiques</span>
				</a>
			</li>
			<li>
				<a href="Gestion-administrateurs.php">
					<i class='bx bx-table'></i>
					<span class="text">Administrateurs</span>
				</a>
			</li>
			<li>
				<a href="Gestion-Personnels.php">
					<i class='bx bx-table'></i>
					<span class="text">Personnels</span>
				</a>
			</li>
			<li>
				<a href="Gestion-Categories.php">
					<i class='bx bx-table'></i>
					<span class="text">Categories</span>
				</a>
			</li>
			<li>
				<a href="Gestion-Declarateurs.php">
					<i class='bx bx-table'></i>
					<span class="text">Declarateurs</span>
				</a>
			</li>
			<li>
				<a href="Gestion-Articles.php">
					<i class='bx bx-table'></i>
					<span class="text">Articles</span>
				</a>
			</li>
			<li>
				<a href="Gestion-Commentaires.php">
					<i class='bx bx-table'></i>
					<span class="text">Commentaires</span>
				</a>
			</li>
			<li>
			<a href="Gestion-Bloquer.php" >
					<i class='bx bx-table'></i>
					<span class="text">Debloquer</span>
				</a>
			</li>
			<li>
				<a href="Gestion-Contact.php">
					<i class='bx bxs-message-dots' ></i>
					<span class="text">Messages</span>
				</a>
			</li>
		</ul>
		<ul class="side-menu">
			<li>
				<a href="../deconnexion.php" class="logout">
					<i class='bx bxs-log-out-circle' ></i>
					<span class="text">Se deconnecter</span>
				</a>
			</li>
		</ul>
	</section>
	<!-- SIDEBAR -->

	<section id="content">
		<!-- NAVBAR -->
		<nav>
			<i class='bx bx-menu' ></i>

			<form action="#" style="visibility: hidden;">
				<div class="form-input">
					<input type="search" placeholder="Search...">
					<button type="submit" class="search-btn"><i class='bx bx-search' ></i></button>
				</div>
			</form >


		</nav>
		<!-- NAVBAR -->
			</section>
	<!-- CONTENT -->



<section id="content">
	
	</div>
	<section class="CardContainer">
		<div class="card">
			<h2>Administrateurs</h2><br>
			<a href="GAdmins.php"></a>
		</div>
		<div class="card">
			<h2>Messages </h2><br>
			<a href="Messages.php"></a>
		</div>
		<div class="card">
			<h2>Utilisateurs</h2><br>
			<a href="Troqueur.php"></a>
		</div>
	</section>
	
</section>
<script src="js/script.js"></script>
</body>
</html>
