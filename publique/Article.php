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
    header('location: ../declarateur/Article.php');
    exit();
}
session_destroy();
//

?>

<!DOCTYPE html>
<html lang="zxx" class="no-js">
<head>
    <title>Article</title>
    <link rel="shortcut icon" type="x-icon" href="../img/about-img.jpg" />
    <style type="text/css">
       span{
        text-decoration: none;
       }
    </style>
</head> 

<body> 
     <!-- start header -->
                <?php include"header.php" ?>
    <!-- end header -->
    <?php 
        include "../conn.php" ;
    $code_art = $_GET['article'];

    mysqli_query($conn, "UPDATE articles SET nbv = nbv + 1 WHERE code_art = $code_art ");
    $article = mysqli_query($conn, "SELECT * FROM articles WHERE code_art = $code_art");
           if(mysqli_num_rows($article) == 0) {
                 header('location: index.php');
                 exit(); }
    $article = mysqli_fetch_assoc($article);
    $categorie = mysqli_query($conn, "SELECT titre FROM categoriearticle WHERE code_cat = ".$article['code_cat']);
    $categorie = mysqli_fetch_assoc($categorie)['titre'];
    $code_anc = $article['code_art'];
    $rqt2 = "SELECT count(*) FROM commentaire where code_art = ".$article['code_art']."";
    $res2 = mysqli_query($conn,$rqt2);
    $com = mysqli_fetch_assoc($res2);
    ?>
    <!-- Start post-content Area -->
<section class="post-content-area single-post-area" style="margin-top: 20px;">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 posts-list">
                    <div class="single-post row">
                        <div class="col-lg-12">
                            <div class="feature-img">
                                <img class="img-fluid" src="<?php print("../".$article["image"]);?>" alt="">
                            </div>
                        </div>
                        <div class="col-lg-3  col-md-3 meta-details">
                            <ul class="tags">
                                <li><a href="articles.php"><?php print($categorie);?></a></li>
                            </ul>
                            <div class="user-details row">
                                <p class="user-name col-lg-12 col-md-12 col-6"><a href="#">Mark wiens</a> <span
                                        class="lnr lnr-user"></span></p>
<p class="date col-lg-12 col-md-12 col-6"><a href="#"><?php print(explode(" ", $article['date_pub'])[0])?></a> <span
                                        class="lnr lnr-calendar-full"></span></p>
                                <p class="view col-lg-12 col-md-12 col-6"><a href="#">
                                    <?=$article['nbv']." Vue" ;?></a> <span
                                        class="lnr lnr-eye"></span></p>
                                <p class="comments col-lg-12 col-md-12 col-6"><a href="#"><?= $com['count(*)']." Commentaires" ;?></a> <span
                                        class="lnr lnr-bubble"></span></p>

                            </div>
                        </div>
                        <div class="col-lg-9 col-md-9">
                            <a class="posts-title" href="#">
                                <h3 style="overflow-wrap: break-word;"><?php print($article['titre'])?></h3>
                            </a>
                            <p class="excert" style="overflow-wrap: break-word;">
                                <?php print($article['contenu'])?>
                            </p>
                            
                        </div>
                        <div class="col-lg-12">
                            
                        </div>
                    </div>

            
            <?php
    $resultcomment = mysqli_query($conn, "SELECT * FROM commentaire WHERE code_art = $code_art");
    if(mysqli_num_rows($resultcomment)) {
    ?>
        <div class="comments-area">
                        <h4><?= $com['count(*)']." Commentaires" ;?></h4>
                            <div class="comment-list">
                        
                 <?php
                         while($cmnt = mysqli_fetch_assoc($resultcomment)){
            $resultprofile = mysqli_query($conn, "SELECT * FROM utilisateur WHERE code_utl = ".$cmnt['code_utl']);
                                $trq = mysqli_fetch_assoc($resultprofile);
                                $timecmnt = explode(" ",$cmnt['date_pub'])[1];
                                $timecmnt = explode(":", $timecmnt);
                                $timecmnt = $timecmnt[0].":".$timecmnt[1];
                                $datecmnt = explode(" ",$cmnt['date_pub'])[0];
                ?>
                            <div class="single-comment justify-content-between d-flex">
                                <div class="user justify-content-between d-flex">
                                    <div class="thumb">
                                        <img src="img/blog/c1.jpg" alt="">
                                    </div>
                                    <div class="desc">
                        <?php

                               $nom = $trq['nom'];
                               $prenom = $trq['prenom'];
                               $decryption_iv = '1234567891011121';
                               $ciphering = "AES-128-CTR";
                               $options = 0;
                               $decryption_key = "GeeksforGeeks";
                                $nom=openssl_decrypt ( $nom, $ciphering, 
                                        $decryption_key, $options, $decryption_iv);
                                $prenom=openssl_decrypt ($prenom, $ciphering, 
                                        $decryption_key, $options, $decryption_iv);
                   
                             ?>
                <h5 style="overflow-wrap: break-word;max-width: 600px;"><a><?php print($nom." ".$prenom." : <span>".$cmnt['content']."<span>");?></a></h5>
                <p class="date"><?php print($datecmnt." à ".$timecmnt);?></p>
                                        
                                            
                                        
                                        <hr  width="600">
                                    </div>
                                </div>
                            </div>
                            <?php
            }
            ?>
                        </div>
                    </div>
       <?php
    }
?>
                </div>
               
        <div class="col-lg-4 sidebar-widgets">
                <div class="widget-wrap">
                        <div class="single-sidebar-widget popular-post-widget">
                            <h4 class="popular-title">Articles similaire</h4>
        <?php 
            $postsimilaire =  mysqli_query($conn, "SELECT * FROM articles WHERE code_cat = ".$article['code_cat']);
               if(mysqli_num_rows($postsimilaire) > 0)
        {
            $index = 1;
            while($postsimilaires = mysqli_fetch_assoc($postsimilaire) and $index <= 4)
            {
                $index++;
                $image = $postsimilaires['image'];
                $title = $postsimilaires['titre'];
                $date = $postsimilaires['date_pub'];
                $code_art = $postsimilaires['code_art'];
        ?>
                            <div class="popular-post-list">
                                <div class="single-post-list d-flex flex-row align-items-center">
                                    <div class="thumb">
                                        <img class="img-fluid" src="<?php echo "../$image";?>" style="max-width: 100px; max-height: 100px; border-radius: 5px;">
                                    </div>
                                    <div class="details">
                                        <a href="article.php?article=<?php print($code_art);?>">
                                    <h6 style="overflow-wrap: break-word;"><?php echo $title;?></h6>
                                        </a>
                                        <p><?php echo explode(" ", $date)[0];?></p>
                                    </div>
                                </div>
                            </div>
                        <?php
            } 
        }?>

       
                        <div class="single-sidebar-widget post-category-widget">
                            <h4 class="category-title">Catégories</h4>
                            <ul class="cat-list">
                               <?php
                                $resultcat = mysqli_query($conn, "SELECT * FROM categoriearticle");
                                while($ligne = mysqli_fetch_assoc($resultcat))
                                    {
                                $rqt3 = "SELECT count(*) FROM articles where code_cat = ".$ligne['code_cat']."";
                                $res3 = mysqli_query($conn,$rqt3);
                                $nbrart = mysqli_fetch_assoc($res3); 
                                ?>
                                <li>
                                    <a href="Articles.php?categorie=<?=$ligne['code_cat']?>" class="d-flex justify-content-between">
                                        <p><?php print($ligne['titre']);?></p>
                                        <p><?= $nbrart['count(*)'];?></p>
                                    </a>
                                </li>
                            <?php
                            }
                            ?>
                            </ul>
                        </div>
                        <div class="single-sidebar-widget newsletter-widget">
                            <h4 class="newsletter-title">Newsletter</h4>
                            <p>
                                Vous pouvez nous faire confiance. nous n'envoyons que des notifications sur les articles, pas un seul spam.
                            </p>
                            <div class="form-group d-flex flex-row">
                                <div class="col-autos">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text"><i class="fa fa-envelope"
                                                    aria-hidden="true"></i>
                                            </div>
                                        </div>
                                        <input type="text" class="form-control" id="inlineFormInputGroup"
                                            placeholder="Email">
                                    </div>
                                </div>
                                <a href="#" class="bbtns">S'abonner</a>
                            </div>
                            <p class="text-bottom">
                               Vous pouvez vous désabonner à tout moment
                            </p>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End post-content Area -->


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