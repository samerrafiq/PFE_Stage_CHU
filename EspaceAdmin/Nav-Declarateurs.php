<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- Boxicons -->
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
	<!-- My CSS -->
	<link rel="stylesheet" href="css/mystyle.css">
	<style type="text/css">
		#sidebar{
			overflow: hidden
		}
	</style>
</head>
<body>


	<!-- SIDEBAR -->
	<section id="sidebar">
		<a href="index.php" class="brand" style="text-decoration: none;">
			<i class='bx bx-reflect-vertical'></i>
			<span class="text" style="text-decoration: none;">Espace Admin</span>
		</a>
		<ul class="side-menu top">
			
			<li>
				<a href="index.php" style="text-decoration: none;">
					<i class='bx bxs-dashboard' ></i>
					<span class="text" style="text-decoration: none;">Statistiques</span>
				</a>
			</li>
			<li >
				<a href="Gestion-administrateurs.php" style="text-decoration: none;">
					<i class='bx bx-table'></i>
					<span class="text" style="text-decoration: none;">Administrateurs</span>
				</a>
			</li>
			<li>
				<a href="Gestion-Personnels.php" style="text-decoration: none;">
					<i class='bx bx-table'></i>
					<span class="text" style="text-decoration: none;">Personnels</span>
				</a>
			</li>
			<li>
				<a href="Gestion-Categories.php" style="text-decoration: none;">
					<i class='bx bx-table'></i>
					<span class="text" style="text-decoration: none;">Categories</span>
				</a>
			</li>
			<li class="active">
				<a href="Gestion-Declarateurs.php" style="text-decoration: none;">
					<i class='bx bx-table'></i>
					<span class="text" style="text-decoration: none;">Declarateurs</span>
				</a>
			</li>
			<li>
				<a href="Gestion-Articles.php" style="text-decoration: none;">
					<i class='bx bx-table'></i>
					<span class="text" style="text-decoration: none;">Articles</span>
				</a>
			</li>
			<li >
				<a href="Gestion-Commentaires.php" style="text-decoration: none;">
					<i class='bx bx-table'></i>
					<span class="text" style="text-decoration: none;">Commentaires</span>
				</a>
			</li>
			<li>
			<a href="Gestion-Bloquer.php" style="text-decoration: none;">
					<i class='bx bx-table'></i>
					<span class="text" style="text-decoration: none;">Debloquer</span>
				</a>
			</li>
			<li>
				<a href="Gestion-Contact.php" style="text-decoration: none;">
					<i class='bx bxs-message-dots' ></i>
					<span class="text" style="text-decoration: none;">Messages</span>
				</a>
			</li>
		</ul>
		<ul class="side-menu">
			<li>
				<a href="../deconnexion.php" class="logout" style="text-decoration: none;">
					<i class='bx bxs-log-out-circle' ></i>
					<span class="text" style="text-decoration: none;">Se deconnecter</span>
				</a>
			</li>
		</ul>
	</section>
	<!-- SIDEBAR -->
	<section id="content">
		<!-- NAVBAR -->
		<nav>
			<i class='bx bx-menu' ></i>
			<form action="Gestion-Declarateurs.php?key=$_POST['nom'] method="post" >
				<div class="form-input">
					<input type="search" name="nom" placeholder="Chercher utlisateur">
					<button type="submit" class="search-btn"><i class='bx bx-search' ></i></button>
				</div>
			</form>
		</nav>
		<!-- NAVBAR -->
	</section>
	<!-- CONTENT -->
	<script src="js/script.js"></script>
</body>
</html>
