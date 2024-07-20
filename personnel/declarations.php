<?php 
    include_once("../conn.php");
    session_start();
   if(!isset($_SESSION['code_per'])) {
            header("location: ../index.php");
            exit();
        }

?>
<!DOCTYPE html>
<html lang="en">
<?php 
    include "../conn.php";
    $result = "";
    $msg ="";
    if(!isset($_GET['nom'])){
        $msg = "La table des declarations est vide.";
        $result = mysqli_query($conn, "SELECT * FROM declaration where etat = 'Non traité' ORDER BY id_dec DESC");
    }else{
      $msg = "Mot clé introuvable.";
      $nom=$_GET['nom'];
 $result = mysqli_query($conn, "SELECT * FROM declaration WHERE CONCAT(Effetindesirableobserve, age,nomspf, prenom,nom,Service,ville) like '%$nom%' ");
    }
?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Responsive Admin Dashboard | Korsat X Parmaga</title>
    <!-- ======= Styles ====== -->
    <link rel="stylesheet" href="assets/css/style.css">
</head>
 
<body>
    <!-- =============== Navigation ================ -->
    <div class="container">
        <div class="navigation">
            <ul>
                <li>
                    <a href="#">
                        <span class="icon">
                            <ion-icon name=""></ion-icon>
                        </span>
                        <span class="title">Espace Personnel</span>
                    </a>
                </li>

                <li >
                    <a href="index.php">
                        <span class="icon">
                            <ion-icon name="home-outline"></ion-icon>
                        </span>
                        <span class="title">Accueil</span>
                    </a>
                </li>

                <li  class="hovered">
                    <a href="declarations.php">
                        <span class="icon">
                            <ion-icon name="people-outline"></ion-icon>
                        </span>
                        <span class="title">Declarations utlisateurs</span>
                    </a>
                </li>
                <li >
                    <a href="#">
                        <span class="icon">
                            <ion-icon name="chatbubble-outline"></ion-icon>
                        </span>
                        <span class="title">Contacter l'administrateur</span>
                    </a>
                </li>

                <li>
                    <a href="../deconnexion.php">
                        <span class="icon">
                            <ion-icon name="log-out-outline"></ion-icon>
                        </span>
                        <span class="title">Deconnexion</span>
                    </a>
                </li>
            </ul>
        </div>

        <!-- ========================= Main ==================== -->
        <div class="main">
            <div class="topbar">
                <div class="toggle">
                    <ion-icon name="menu-outline"></ion-icon>
                </div>

                <div class="search">
                    <form action="declarations.php?key=$_POST['nom'] method="post">
                    <label>
                        <input type="search" placeholder="Chercher une declaration" name="nom" >
                        <ion-icon name="search-outline"></ion-icon>
                    </label>
                    </form>
                </div>

                <div class="user">
                    
                </div>
            </div>


            <!-- ================ Order Details List ================= -->
            <div class="details">
                <div class="recentOrders">
                    <div class="cardHeader">
                        <h2>Declarations</h2>
                    </div>
                    <?php if (mysqli_num_rows($result)) { ?>
                    <table>
                        <thead>
                            <tr>
                                <td >Antecedents</td>
                                <td >Produit</td>
                                <td >Effets</td>
                                <td >Consulter</td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
        $i = 0;
        while($rows = mysqli_fetch_assoc($result)){
          $i++;
          ?>
                            <tr>
                                <td><?php echo $rows['Antecedents']; ?></td>
                                <td><?php echo $rows['nomspf']; ?></td>
                                <td><?php echo $rows['Effetindesirableobserve']; ?></td>
                                <td><a href="declaration.php?dec=<?php echo $rows['id_dec'] ;?>"><span class="status inProgress">Consulter</span></a></td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>

    <!-- =========== Scripts =========  -->
    <script src="assets/js/main.js"></script>

    <!-- ====== ionicons ======= -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>

</html>