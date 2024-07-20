<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="UTF-8">
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title> Ajouter un article</title>
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
  if (isset($_POST['ajouter'])) {
    $titre = $_POST['titre'];
    $contenu = $_POST['contenu'];
    $categorie = $_POST['categorie'];
    $image = $_FILES['image'];
    $auteur = $_POST['auteur'];
    $date = $_POST['date'];


    mysqli_query($conn, "INSERT INTO articles(titre,contenu,code_cat,date_pub,auteur) VALUES(\"$titre\",\"$contenu\",$categorie,'$date','$auteur')");
    if ($image['error'] == 0) {
      $extension = explode(".", $image['name']);
      $extension = end($extension);
      $dest = "img/articles/" . uniqid("", true) . "." . $extension;
      $img = $dest;
      move_uploaded_file($image['tmp_name'], "../" . $dest);
      mysqli_query($conn, "UPDATE articles SET image = '$dest' WHERE contenu = '$contenu' And titre = '$titre' ");
    }
    print("<script>window.location.replace('Gestion-Articles.php?success=Article bien ajoutée ')</script>");
  }
  ?>
  <section id="content" style="scroll-behavior: auto;">
    <div class="container" style="margin-left: 10em;">
      <div class="title">Ajouter un article <a href="Gestion-Articles.php"><button type="button">X</button></a></div>
      <?php if (isset($_GET['error'])) { ?>
        <div class="alert alert-danger" style="margin-top: 5px;width:600px;">
          <?php echo $_GET['error']; ?>
        </div>
      <?php } ?>
      <div class="content">
        <form method="post" enctype="multipart/form-data">
          <div class="user-details">
            <div class="input-box">
              <span class="details">Titre</span>
              <input type="text" placeholder="Titre de l'article" name="titre" required>
            </div>
            <div class="input-box">
              <span class="details">Catégorie</span>
              <select id="sel" name="categorie" required>
                <option value="">Catégories</option>
                <?php
                include "conn.php";
                $resultcat = mysqli_query($conn, "SELECT * FROM categoriearticle");
                while ($ligne = mysqli_fetch_assoc($resultcat)) {
                ?>
                  <option value="<?php echo $ligne['code_cat']; ?>"><?php echo $ligne['titre']; ?></option>
                <?php
                }
                ?>

              </select>
            </div>
            <div>
              <span id="imm">Inserer une image</span>
              <input type="file" name="image" id="fff" accept=".jpg, .jpeg, .png">
            </div>
            <div class="input-box">
              <span class="details">Auteur Article</span>
              <input type="text" placeholder="Auteur d'Article" name="auteur" required>
            </div>
            <div class="input-box">
              <span class="details">Date de publication</span>
              <input type="datetime-local" placeholder="Date de publication" name="date" required>
            </div>
            <div>
              <span id="area">Contenu de l'article</span>
              <textarea id="contenu-article" placeholder="Contenu... " cols="78" rows="8" name="contenu"></textarea>
            </div>

          </div>
          <div class="button">
            <input type="submit" name="ajouter" value="Enregistrer">
          </div>
        </form>
      </div>
    </div>
  </section>
</body>

</html>