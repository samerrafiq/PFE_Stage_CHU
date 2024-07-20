<?php
session_start();
if(!isset($_SESSION['code_utl'])) {
    header("location: ../index.php");
} 
?>
<?php 
    include "../conn.php";
    $code_utl = $_SESSION['code_utl'];
?>

<!DOCTYPE html>
<html lang="zxx" class="no-js">

<head>
    <title>Actualité</title>
    <link rel="shortcut icon" type="x-icon" href="../img/about-img.jpg" />
    <link rel="stylesheet" href="../css/styleHeadArticles.css">
</head>

<body>
    <!-- start header -->
                <?php include"header.php" ?>
    <!-- end header -->

    <!-- start banner Area -->
<div style="margin-top: 70px;max-width: 1000px;" >
<ul class="nav" style="margin-left: 250px;">
    <li>
        <a href="">Filtrer les articles : </a>
    </li>
    <li id="search">
        <div class="rechercher-bar">
            <form method="POST" style="margin-top:5px;">
                <input type="text" placeholder="Rechercher un article..." class="input" name="titre">
                <select name="categorie" id="categorie" style="">
                    <option value="" selected>Catégories</option>
                    <?php
                    include "../conn.php";
                    $resultcat = mysqli_query($conn, "SELECT * FROM categoriearticle");
                    while($ligne = mysqli_fetch_assoc($resultcat))
                    {
                    ?>
                        <option value="<?php print($ligne['code_cat']);?>"><?php print($ligne['titre']);?></option>
                    <?php
                    }
                    ?>
                </select>
                <button type="submit" class="input" name="submit">Chercher</button>
            </form>
        </div>
    </li>
</ul>
</div>
    <!-- End banner Area -->
    <!-- Start blog Area -->
    <section class="blog-area section-gap" id="blog" style="margin-top: -100px;">
        <div class="container">
    <?php
        $categorie = "";
        $keywords = "";
        if(isset($_POST['categorie']))
            $categorie = trim($_POST['categorie']);
        if(isset($_POST['titre']))
            $keywords = trim($_POST['titre']);
        if(isset($_GET['titre']))
            $keywords = trim($_GET['titre']);
        if(isset($_GET['categorie']))
            $categorie = trim($_GET['categorie']);

        $result = mysqli_query($conn, "SELECT * FROM articles WHERE titre LIKE '%$keywords%' AND code_cat LIKE '%$categorie%'");
        $result_total = mysqli_num_rows($result);
        $result_per_page = 10; // nombre des articles par page
        $pages_number = ceil($result_total / $result_per_page); // nombre des pages
        $page = !isset($_GET['page']) ? 1 : $_GET['page'];
        $starting_limit_number = ($page - 1) * $result_per_page; // nombre de début des articles
         $result = mysqli_query($conn, "SELECT code_art, titre, image, date_pub FROM articles WHERE titre LIKE '%$keywords%' AND code_cat LIKE '%$categorie%' LIMIT $starting_limit_number, $result_per_page"); 

    for($i = 1; $i <= 4; ++$i)
        {
    ?>
            <div class="row">
                <?php
            for($index = 1; $index <= 10; $index++)
            {
        $article = mysqli_fetch_assoc($result);
        if(!$article) break;
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
                        <img class="img-fluid" src="<?php echo "../$image";?>" alt="">
                    </div>
                    <p class="date"><?php echo explode(" ", $date)[0];?></p>
                    <a href="article.php?article=<?php print($code_art);?>">
                        <h4 style="overflow: hidden;text-overflow: ellipsis;"><?php echo $title;?></h4>
                    </a>
                    <div class="meta-bottom d-flex justify-content-between">
                        <p><span ></span> </p>
            <p><span class="lnr lnr-bubble"></span> <?= $com['count(*)']." Commentaires" ;?></p>
                    </div>
                </div>
                <?php
            } ?>
            </div>
            </div>
        <?php
        } 
        ?>
        </div>
        <!-- page des articles -->

        <div class="page-index" style="margin-left: 300px;margin-top: 40px;">
            <!--start script-->
            <?php 
            if($result_per_page >= 10)
            {
                for($page = 1; $page <= $pages_number; ++$page)
                {
            ?>
                    <a href="articles.php?page=<?php echo $page;?>" ><Button style="border-radius: 10px;background-color:#01FA7D;padding: 5px;width: 20px;" ><?php echo $page;?></Button></a>
            <?php
                }
            }
            ?>
            <!-- end script -->
        </div>

        <!-- page des articles -->
    </section>
    <!-- End blog Area -->
    <!-- footer -->
            <?php include "footer.php" ?>
     <!-- footer -->
     
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