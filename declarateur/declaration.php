<?php 
    include "../conn.php" ;
    session_start();
    if(!isset($_SESSION['code_utl'])) {
            header("location: ../index.php");
            exit();
        }
    $dec = $_GET['dec'];
    $declaration = mysqli_query($conn, "SELECT * FROM declaration WHERE id_dec = $dec");
    $utilisateur = mysqli_query($conn, "SELECT * FROM utilisateur WHERE code_utl = $dec");
           if(mysqli_num_rows($declaration) == 0) {
                 header('location: index.php');
                 exit(); }
    $declaration = mysqli_fetch_assoc($declaration);
    $code_utl = $declaration['code_utl'];
    $utilisateur = mysqli_query($conn, "SELECT * FROM utilisateur WHERE code_utl = $code_utl");
    $utilisateur = mysqli_fetch_assoc($utilisateur);
    ?>
<!DOCTYPE html>
<html>
<head>
	<title>Declration</title>
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
        .mod {
            box-shadow:inset 0px 1px 0px 0px #fff6af;
            background:linear-gradient(to bottom, #ffec64 5%, #ffab23 100%);
            background-color:#ffec64;
            border-radius:10px;
            border:1px solid #ffaa22;
            display:inline-block;
            cursor:pointer;
            color:#333333;
            font-family:Arial;
            font-size:15px;
            font-weight:bold;
            padding:6px 20px;
            text-decoration:none;
            text-shadow:0px 1px 0px #ffee66;
        }
        .mod:hover {
            background:linear-gradient(to bottom, #ffab23 5%, #ffec64 100%);
            background-color:#ffab23;
        }
        .mod:active {
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
        .supp {
            box-shadow:inset 0px 1px 0px 0px #f29c93;
            background:linear-gradient(to bottom, #fe1a00 5%, #ce0100 100%);
            background-color:#fe1a00;
            border-radius:6px;
            border:1px solid #d83526;
            display:inline-block;
            cursor:pointer;
            color:#ffffff;
            font-family:Arial;
            font-size:15px;
            font-weight:bold;
            padding:6px 11px;
            text-decoration:none;
            text-shadow:0px 1px 0px #b23e35;
        }
        .supp:hover {
            background:linear-gradient(to bottom, #ce0100 5%, #fe1a00 100%);
            background-color:#ce0100;
        }
        .supp:active {
            position:relative;
            top:1px;
        }

	</style>
</head>
<body>
		<section style="background-color: whitesmoke;margin-bottom: 100px;">
			<div class="details" style="margin-left: 50px;">
                <div class="recentOrders">
                    <?php 
                               $nom = $utilisateur['nom'];
                               $prenom = $utilisateur['prenom'];
                               $decryption_iv = '1234567891011121';
                               $ciphering = "AES-128-CTR";
                               $options = 0;
                               $decryption_key = "GeeksforGeeks";
                                $nom=openssl_decrypt ( $nom, $ciphering, 
                                        $decryption_key, $options, $decryption_iv);
                                $prenom=openssl_decrypt ($prenom, $ciphering, 
                                        $decryption_key, $options, $decryption_iv);
                    ?>
                    <div class="cardHeader">
                        <h2>Déclaration de <?php echo $nom." ".$prenom; ?> </h2>
                       <a href="index.php"> <button class="x">x</button></a>
                    </div>
                	<label class="titre2">Mes informations</label>
                	<div class="divat">
                	<label style="font-weight: bold;" >Nom : <span><?php print($nom)?> </span></label>
                	<label class="def">Prénom : <span> <?php print($prenom)?> </span></label>
                	<label class="def" >Age : <span> <?php print($declaration['age'])?> </span></label>
                	<label class="def">Poid :<span> <?php print($declaration['poid'])?> </span></label>
                	</div>
                	<div class="divat">
                	<label style="font-weight: bold;">Ville : <span> <?php print($utilisateur['ville'])?></span></label>
                	<label class="def">Sexe : <span><?php print($utilisateur['sexe'])?></span></label>	
                	<label class="def">Tel : <span> <?php print($utilisateur['telephone'])?></span></label>
                	<label class="def">Email : <span> <?php print($utilisateur['email'])?> </span></label>
                	</div>
                	<div class="divat">
                		<label style="font-weight: bold;overflow-wrap: break-word;">Antécedents : <span> 
                			<?php print($declaration['Antecedents'])?> </span></label>
                	</div>
                	<hr style="margin-bottom: 15px;">
                	<label class="titre2">Informations du produit</label>
                	<div class="divat">
                		<label style="font-weight: bold;" >Nom de la specialité : <span> <?php print($declaration['nomspf'])?></span></label>
                		<label class="def">Indication : <span><?php print($declaration['indication'])?></span></label>
                		<label class="def">Posologie : <span><?php print($declaration['posologie'])?></span></label>
                	</div>
                	<div class="divat">
                		<label style="font-weight: bold;">Date debut : <span><?php print(explode(" ", $declaration['date_debut'])[0])?></span></label>
                		<label class="def">Date Fin : <span> <?php print(explode(" ", $declaration['date_fin'])[0])?></span></label>
                	</div>
                	<div class="divat">
                		<label style="font-weight: bold;overflow-wrap: break-word;">Présentation : <span> <?php print($declaration['presentation'])?></span></label>
                	</div>
                	<div class="divat">
                		<label style="font-weight: bold;overflow-wrap: break-word;">Prescription : <span> <?php print($declaration['prescription'])?> </span></label>
                	</div>
                	<div class="divat">
                		<label style="font-weight: bold;">Image du produit : <br> <span> 
                			<img src="<?php print("../".$declaration["img_prod"]);?>" width="300" height="250"></span></label>
                	</div>
                	<hr style="margin-bottom: 15px;">
                	<label class="titre2">Description de l'effets indésirable </label>
                	<div class="divat">
                		<label style="font-weight: bold;" >Date de servenu : <span><?php print(explode(" ", $declaration['date_servenu'])[0])?></span></label>
                		<label class="def">Delai de servenu : <span><?php print($declaration['delai_servenu'])?></span></label>
                		<label class="def">Durée de l'effet : <span><?php print($declaration['duree'])?></span></label>
                	</div>
                	<div class="divat">
                		<label style="font-weight: bold;overflow-wrap: break-word;">Signes cliniques observés : <span> <?php print($declaration['Signescliniquesobserves'])?>  </span></label>
                	</div>
                	<div class="divat">
                		<label style="font-weight: bold;overflow-wrap: break-word;">Effet(s) indésirable(s) observé : <span> <?php print($declaration['Effetindesirableobserve'])?>  </span></label>
                	</div>
                	<div class="divat">
                		<label style="font-weight: bold;">Image de l'effets : <br> <span> 
                			<img src="<?php print("../".$declaration["img_eff"]);?>" width="300" height="250"></span></label>
                	</div>
                	<div class="divat">
                		<label style="font-weight: bold;" >Gravité : <span><?php print($declaration['gravite'])?></span></label>
                		<label class="def">Réadministration : <span><?php print($declaration['Readministration'])?></span></label>
                		<label style="font-weight: bold; margin-left: 100px;">Si oui,l'événement indésirable récidive-t-il ? : <span><?php print($declaration['recidive'])?></span></label>
                	</div>
                	<div class="divat">
                		<label style="font-weight: bold;overflow-wrap: break-word;">Examens effectués en rapport avec l’effet suspecté : <span><?php print($declaration['Bilansbiologiques'])?> </span></label>
                	</div>
                	<div class="divat">
                		<label style="font-weight: bold;overflow-wrap: break-word;">Traitement correcteur éventuel : <span><?php print($declaration['Traitementcorrecteur'])?> </span></label>
                	</div>
                	<div class="divat">
                		<label style="font-weight: bold;" >Evolution : <span><?php print($declaration['evolution'])?></span></label>
                		<label class="def">Service consérné : <span><?php print($declaration['Service'])?></span></label>
                		<label class="def">Etat : <span><?php print($declaration['etat'])?></span></label>
                	</div>
                    <div style="margin-left: 1070px;">
                        <a  onclick="supp(<?php echo $declaration['id_dec'] ;?>)" class="supp">Supprimer</a>
                    </div>
                </div>
            </div>
		</section>
        <script type="text/javascript">
            function supp(id){
        if(confirm("Voulez-vous supprimer cette déclaration?")){
          window.location.href='supprimerdec.php?code_ctn='+id;
        }
      }
        </script>
</body>
</html>
