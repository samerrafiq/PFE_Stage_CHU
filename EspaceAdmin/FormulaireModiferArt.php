<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="UTF-8">
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Modifier un article</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="css/styleFormArt.css">
  <!-- Tinymce Link -->

  <script src="https://cdn.tiny.cloud/1/tphpe4nr45ctp4i4rqezz1bphk5jg3886y9yg44gzdr6b4k1/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
  <script>
    tinymce.init({
      selector: '#contenu-article'


    });
  </script>
  <!-- end Tinymce -->
  <style type="text/css">
    textarea {
      border-radius: 10px;
      padding-left: 15px;
      border: 1px solid #ccc;
      border-bottom-width: 2px;
      display: inline;
      width: 100%;
      margin-bottom: 10px;
    }

    textarea:focus {
      border-color: #9b59b6 !important;
      outline: none !important;
    }

    #sel {
      height: 45px;
      width: 100%;
      outline: none;
      font-size: 16px;
      border-radius: 5px;
      padding-left: 15px;
      border: 1px solid #ccc;
    }

    #area {
      display: block;
      font-weight: 500;
      margin-bottom: 5px;
    }

    #imm {
      display: block;
      font-weight: 500;
      margin-bottom: 5px;
    }

    #fff {
      padding: 10px;
      background-color: #ccc;
      width: 100%;
      border-radius: 10px;
    }
  </style>
</head>

<body>

  <?php include 'Nav-Articles.php' ?>

  <?php
  include "conn.php";
  if (isset($_POST['modifier'])) {
  }
  ?>
  <section id="content" style="scroll-behavior: auto;">
    <div class="container" style="margin-left: 10em;">
      <div class="title">Modifer un article <a href="Gestion-Articles.php"><button type="button">X</button></a></div>
      <?php if (isset($_GET['error'])) { ?>
        <div class="alert alert-danger" style="margin-top: 5px;width:600px;">
          <?php echo $_GET['error']; ?>
        </div>
      <?php } ?>
      <div class="content">
        <form method="post" enctype="multipart/form-data">
          <div class="user-details">
            <?php
            $update_id = $_GET['code_adm'];
            $update = mysqli_query($conn, "SELECT * FROM articles WHERE code_art = '$update_id'") or die('query failed');
            if (mysqli_num_rows($update) > 0) {
              while ($fetch_update = mysqli_fetch_assoc($update)) {
            ?>
                <div class="input-box">
                  <span class="details">Titre</span>
                  <input type="text" placeholder="Titre de l'article" name="titre" value="<?php echo $fetch_update['titre']; ?>">
                </div>
                <div class="input-box">
                  <span class="details">Catégorie</span>
                  <select id="sel" name="categorie" required>
                    <option value="">Catégories</option>
                    <?php
                    include "conn.php";
                    $resultcat = mysqli_query($conn, "SELECT * FROM categoriearticle");
                    while ($ligne = mysqli_fetch_assoc($resultcat)) {
                      if ($fetch_update['code_cat'] == $ligne['code_cat']) {
                        echo  '<option value="' . $ligne['code_cat'] . '" selected >' . $ligne['titre'] . '</option>';
                      } else {
                        echo  '<option value="' . $ligne['code_cat'] . '">' . $ligne['titre'] . '</option>';
                      }
                    }
                    ?>

                  </select>
                </div>
                <div>
                  <span id="imm">Inserer une image</span>
                  <input type="hidden" name="ancienne_image" value="<?php echo $fetch_update['image']; ?>">

                  <input type="file" name="image" id="fff" accept=".jpg, .jpeg, .png">
                </div>
                <div class="input-box">
                  <span class="details">Auteur Article</span>
                  <input type="text" placeholder="Auteur d'Article" name="auteur" value="<?php echo $fetch_update['auteur']; ?>">
                </div>
                <div class="input-box">
                  <span class="details">Date de publication</span>
                  <input type="datetime-local" placeholder="Date de publication" name="date" required>
                </div>
                <div>
                  <span id="area">Contenu de l'article</span>
                  <textarea placeholder="Contenu... " cols="78" rows="8" name="contenu" id="contenu-article">
              <?php echo $fetch_update['contenu']; ?>
              </textarea>
                </div>

          </div>
          <div class="button">
            <input type="submit" name="modifier" value="Modifier">

          </div>


        </form>
    <?php
              }
            } else {
              header('Location:Gestion-Articles.php?error=requet impossible');
            }
    ?>
      </div>
    </div>
    <?php
    include "conn.php";
    if (isset($_POST['modifier'])) {
      $titre = $_POST['titre'];
      $contenu = $_POST['contenu'];
      $categorie = $_POST['categorie'];
      $auteur = $_POST['auteur'];
      $date = $_POST['date'];


      $modifier =  mysqli_query($conn, "UPDATE articles SET code_cat='$categorie',titre='$titre',contenu='$contenu',date_pub='$date',auteur='$auteur' WHERE code_art='$update_id'") or die('query failed');
      if ($modifier) {
        header('Location:Gestion-Articles.php?confirmation=Modification avec succés');
      }
      $ancienne_image = $_POST['ancienne_image'];

      $image = $_FILES['image'];

      if (!empty($image)) {

        $extension = explode(".", $image['name']);
        $extension = end($extension);
        $dest = "img/articles/" . uniqid("", true) . "." . $extension;
        $img = $dest;
        move_uploaded_file($image['tmp_name'], "../" . $dest);
        mysqli_query($conn, "UPDATE articles SET image = '$dest' WHERE code_art='$update_id'");
        unlink('../' . $ancienne_image);
      }
    }
    ?>
  </section>
</body>

</html>