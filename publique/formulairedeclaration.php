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
    header('location: ../declarateur/formulairedeclaration.php');
    exit();
}
session_destroy();
//

?>
<html>

<head>
  <meta name="viewport" content="width=device-width,initial-scale=1">
 <!-- <link rel="stylesheet" href="qfc-dark.css"> 
  <link rel="stylesheet" href="../css/qfc-light.css"> -->
  <link rel="shortcut icon" type="x-icon" href="../img/about-img.jpg" />

</head>
     <!-- start header -->
                <?php  include"header.php" ?>
    <!-- end header -->

    <?php 
       $res="";
       $resuxx ="";
       $res2 = "";
      if(isset($_POST['envoye'])){
         $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $ciphering = "AES-128-CTR";
        $iv_length = openssl_cipher_iv_length($ciphering);
        $options = 0;
        $encryption_iv = '1234567891011121';
        $encryption_key = "GeeksforGeeks";
        $crynom = openssl_encrypt($nom, $ciphering,
                    $encryption_key, $options, $encryption_iv);
        $cryprenom = openssl_encrypt($prenom, $ciphering,
                    $encryption_key, $options, $encryption_iv);
        $age = $_POST['age'];
        $poid = $_POST['poid'];
        $antecedents = $_POST['antecedents'];
        $ville = $_POST['ville'];
        $tel = $_POST['tel'];
        $email = $_POST['email'];
        $sexe = $_POST['sexe'];
        $nomspecialite = $_POST['nomspecialite'];
        $presentation = $_POST['presentation'];
        $prescription = $_POST['prescription'];
        $dateD = $_POST['dateD'];
        $dateF = $_POST['dateF'];
        $indication = $_POST['indication'];
        $dateSrv = $_POST['dateSrv'];
        $signesCL = $_POST['signesCL'];
        $effets = $_POST['effets'];
        $duree = $_POST['duree'];
        $delai = $_POST['delai'];
        $gravite = $_POST['gravite'];
        $password = $_POST['password'];$cpassword = $_POST['cpass'];
        $crypass =  password_hash($password, PASSWORD_DEFAULT);
        $service = $_POST['service'];
        $readministration = $_POST['readministration'];
        $recidive = $_POST['recidive'];
        $exams = $_POST['exams'];
        $traitement = $_POST['traitement'];
        $evolution = $_POST['evolution'];
        $posologie = $_POST['posologie'];
        $deja = mysqli_query($conn,"SELECT * from utilisateur where email = \"$email\"") ;
        $deja = mysqli_fetch_assoc($deja);
        if($password == $cpassword){
        $res0 = mysqli_query($conn,"INSERT INTO utilisateur(nom, prenom, sexe, ville,telephone,email,password) VALUES(\" $crynom\", \"$cryprenom\",\"$sexe\" , \"$ville\", \"$tel\", \"$email\",\"$crypass\")") ;
        $resuxx = mysqli_query($conn, "SELECT code_utl FROM utilisateur ORDER BY code_utl DESC");
        $resuxx = mysqli_fetch_assoc($resuxx)['code_utl'];
        $res = mysqli_query($conn, "INSERT INTO declaration(code_utl,age, poid, Antecedents,nomspf,indication,presentation,prescription,date_debut,date_fin,date_servenu,duree,delai_servenu,Signescliniquesobserves,Effetindesirableobserve,gravite,Readministration,recidive,Bilansbiologiques,Traitementcorrecteur,Service,evolution,posologie) VALUES($resuxx,$age, $poid, \"$antecedents\", \"$nomspecialite\", \" $indication\", \"$presentation\", \"$prescription\", \"$dateD\", \"$dateF\", \"$dateSrv\", \"$duree\", \"$delai\", \"$signesCL\", \" $effets\", \"$gravite\", \"$readministration\", \"$recidive\", \"$exams\", \"$traitement\", \"$service\", \"$evolution\",\"$posologie\")"); 
        $res2 = mysqli_query($conn, "SELECT id_dec FROM declaration ORDER BY date_pub DESC");
        $res2 = mysqli_fetch_assoc($res2)['id_dec'];}
           else {
            echo "<script> alert(\"Confirmer bien votre mot de passe.\")</script>";
            print("<script>window.location.replace('formulairedeclaration.php')</script>");
          }
          $image_prod = $_FILES['image_prod'];
        if($image_prod['error'] == 0) {
            $extension = explode(".", $image_prod['name']);
            $extension = end($extension);
            $dest = "img/declaration/produit/".uniqid("", true).".".$extension;
            $img = $dest;
            move_uploaded_file($image_prod['tmp_name'], "../".$dest);
            mysqli_query($conn, "UPDATE declaration SET img_prod = '$dest' WHERE id_dec = $res2");
        } 
        $imageEFF = $_FILES['imageEFF'];
        if($imageEFF['error'] == 0) {
            $extension = explode(".", $imageEFF['name']);
            $extension = end($extension);
            $dest = "img/declaration/effets/".uniqid("", true).".".$extension;
            $img = $dest;
            move_uploaded_file($imageEFF['tmp_name'], "../".$dest);
            mysqli_query($conn, "UPDATE declaration SET img_eff = '$dest' WHERE id_dec = $res2 ");
        } 
      
        if($res0){
          echo "<script> alert(\"Votre declaration va etre traité le plustot possible, verifier votre email regulairement.\")</script>";
                  $receiver = $email;
                  $body = "Vous pouvez faire le suivi a votre déclaration en utilisant l'identifiant suivant : \n -Email : ".$email."\n -Mot de passe : ".$password."\n====================================================";
                  $subject = "Email automatique de la part de site des déclarations des éffets indésirable.";
                  $sender = "From:rafiq.samer20@ump.ac.ma";
                  mail($receiver, $subject, $body, $sender);
                session_start();
                $_SESSION['code_utl'] = $resuxx;
                header('location: ../declarateur/index.php');
                exit();
                  }
        }
    ?>
<body>
  <div class="qfc-container" style="margin-top: 50px;" id="mainform">
    <h2>Déclarer un effet indesirable &nbsp;&nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;  أبلغ عن أثر جانبي</h2>
    <label style="color: green;font-weight: bold;margin-left: 300px;"> Informations sur le patient  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp; معلومات المريض</label>
    <form method="post" enctype="multipart/form-data">
      <div>
        <!-- -->
        <div style="display: flex;">
        <div>
            <input placeholder="Nom        اللقب " type="text" name="nom" required style="width: 200px; margin-right: 40px; ">
        </div>  
        <div>
            <input placeholder="Prénom      الاسم " type="text" name="prenom" required style="width: 200px; margin-right: 40px;">
        </div>
        <div>
            <input placeholder="Age      العمر" type="number" name="age" required style="width: 200px; margin-right: 40px;">
        </div>
         <div>
            <input placeholder="Poid     االوزن " type="number" name="poid" required style="width: 200px; margin-right: 40px;">
        </div>
        </div>
        <!-- -->
        <!-- -->
        <div style="display: flex;">
        <div>
            <input placeholder="Ville     االمدينة " type="text" name="ville" required style="width: 200px; margin-right: 40px;">
        </div>
        <div>
            <input placeholder="Tel    الهاتف " type="tel" name="tel" required pattern="[0-0]{1}[5-7]{1}[0-9]{8}" title="le numero ne respect pas le format" style="width: 350px; margin-right: 40px;">
        </div>
        <div>
            <input placeholder="Email        بريد إلكتروني " type="email" name="email" required style="width: 350px; margin-right: 40px;">
        </div>
        </div>
        <div style="display: flex;">
        <div style="margin-right: 120px;">
          <label>Sexe   &nbsp;&nbsp;  الجنس   </label>
          <div>
            <label>
                        <input type="radio" name="sexe" value="homme" >Masculin &nbsp;&nbsp; دكر 
                        </label>
          </div>
          <div>
            <label>
                            <input type="radio" name="sexe" value="femme">féminin &nbsp;&nbsp; أنثى
                        </label>
          </div>
        </div>
        <div>
          <label>Antécedents  &nbsp;&nbsp; خلفية</label>
          <div>
            <textarea placeholder="" name="antecedents" style="width: 600px; margin-right: 40px;" required></textarea>
          </div>
        </div> </div>
        <hr style="margin-top: 20px;margin-bottom: 50px;">
        <!-- -->
        <label style="color: green;font-weight: bold;margin-left: 330px;margin-top: 20px;margin-bottom: 20px;">Information produit  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp; معلومات المنتج </label>
        <div style="display: flex;">
        <div>
            <input placeholder="Nom de la spécialité       لاسم التخصص "  type="text" name="nomspecialite" required style="width: 280px; margin-right: 40px; ">
        </div>  
        <div>
            <input placeholder="Indication      دلالة " type="text" required name="indication" style="width: 230px; margin-right: 40px;margin-left: 100px;">
        </div>
        <div>
            <input placeholder="Posologie      الجرعة" type="text" required name="posologie" style="width: 230px; margin-right: 40px;margin-left: 80px;">
        </div>
        </div>
        <!-- -->
        <!-- -->
        <div style="display: flex;">
        <div>
          <label>Présentation  &nbsp;&nbsp; عرض</label>
          <div>
            <textarea placeholder="presentation" name="presentation" style="width: 400px; margin-right: 40px;" required></textarea>
          </div>
        </div> 
        <div>
            <label>Date Début  &nbsp;&nbsp; تاريخ البداية</label>
            <input type="date" name="dateD" required style="width: 230px; margin-right: 40px;" >
        </div>
        <div>
            <label>Date Fin  &nbsp;&nbsp; تاريخ الانتهاء</label>
            <input  type="date" name="dateF" required style="width: 230px; margin-right: 40px;">
        </div>
        </div>

        <div style="display: flex;">
        <div>
          <label>Prescription  &nbsp;&nbsp; إرشادات</label>
          <div>
            <textarea placeholder="" name="prescription" style="width: 400px; margin-right: 40px;" required></textarea>
          </div>
        </div> 
        <div>
          <label style="margin-left: 60px;">Insrér une image du produit &nbsp;&nbsp;&nbsp;&nbsp;  أدخل صورة المنتج</label>
          <div>
            <input type="file" name="image_prod" style="width: 300px;margin-left: 60px;" >
          </div>
        </div>
        </div>
        <hr style="margin-top: 20px;margin-bottom: 30px;">
        <label style="color: green;font-weight: bold;margin-left: 290px;">Description de l'effets indésirable  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;  وصف التأثير الجانبي </label>
         <div style="display: flex;margin-top: 20px;">
          <div>
            <label>Date de survenue &nbsp;&nbsp; تاريخ حدوثها </label>
            <input  type="date"  name="dateSrv" required style="width: 230px; margin-right: 40px;">
        </div>
        <div>
          <label style="margin-left: 120px;">Signes cliniques observés  &nbsp;&nbsp; العلامات السريرية لوحظت</label>
          <div>
            <textarea placeholder="" name="signesCL" style="width: 600px; margin-right: 40px;margin-left: 120px;" required></textarea>
          </div>
        </div> 
        </div>
        <div style="display: flex;">
        <div>
          <label>Effet(s) indésirable(s) observé  &nbsp;&nbsp; لوحظت آثار ضارة</label>
          <div>
            <textarea placeholder="" name="effets" style="width: 600px; margin-right: 5px;" required></textarea>
          </div>
        </div> 
        <div>
          <label style="margin-left: 60px;">Insrér une image de l'effet &nbsp;&nbsp;  إدراج صورة التأثير  </label>
          <div>
            <input type="file" name="imageEFF" style="width: 300px;margin-left: 60px;">
          </div>
        </div>
        </div>
        <div style="display: flex;">
        <div>
            <input placeholder="Durée de l'effet(j)      مدة التأثير " type="text" name="duree" required style="width: 200px; margin-right: 40px; ">
        </div>  
        <div>
            <input placeholder="Délai de survenue      حان الوقت للبدء " type="text" name="delai" required style="width: 240px; margin-right: 40px;margin-left: 120px;">
        </div>
        <div>
          <select id style="width: 200px; margin-right: 40px;margin-left: 120px;" name="gravite" required>
                        <option disabled selected value="">Gravité &nbsp;&nbsp; الجاذبية</option>
                        <option value="Décès">Décès </option>
                        <option value="Mise en jeu du pronostic vital">Mise en jeu du pronostic vital</option>
                        <option value="Hospitalisation">Hospitalisation</option>
                        <option value="Incapacité">Incapacité</option>
          </select>
        </div>
        </div>
        <div style="display: flex;">
           <div style="margin-right: 120px;">
          <label>Réadministration    &nbsp;&nbsp;  إعادة الإدارة   </label>
          <div>
            <label>
                        <input type="radio" name="readministration" required value="oui">Oui &nbsp;&nbsp; نعم   
                        </label>
          </div>
          <div>
            <label>
                            <input type="radio" name="readministration" required value="non">Non &nbsp;&nbsp; لا
                        </label>
          </div>
        </div>
         <div style="margin-right: 120px;">
          <label>Si oui,l'événement indésirable récidive-t-il ? &nbsp;  إذا كانت الإجابة بنعم ، فهل يتكرر الحدث الضار؟  </label>
          <div>
            <label>
                        <input type="radio" name="recidive"  required value="oui">Oui &nbsp;&nbsp; نعم  
                        </label>
          </div>
          <div>
            <label>
                            <input type="radio" name="recidive"  required value="non">Non &nbsp;&nbsp; لا
                        </label>
          </div>
        </div>
        </div>
           <div>
          <label>Examens effectués en rapport avec l’effet suspecté 
            &nbsp;&nbsp;   تم إجراء الفحوصات فيما يتعلق بالتأثير المشتبه به</label>
          <div>
            <textarea placeholder="" name="exams" style="width: 600px; margin-right: 40px;" required></textarea>
          </div>
        </div> 
        <div>
          <label>Traitement correcteur éventuel  &nbsp;&nbsp; العلاج التصحيحي الممكن  </label>
          <div>
            <textarea placeholder="" name="traitement" style="width: 600px; margin-right: 40px;" required></textarea>
          </div>
        </div> 
        <div style="display: flex;">
        <div>
          <select id style="width: 400px; margin-right: 40px;" name="evolution" required>
                       <option disabled selected value="">Evolution  &nbsp;&nbsp; تطور</option>
                       <option value="Guérison sans séquelle">Guérison sans séquelle</option>
                       <option value="Guérison avec séquelle">Guérison avec séquelles</option>
                       <option value="Décès dû à l'effet">Décès dû à l'effet</option>
                       <option value="Décès sans rapport avec l'effet">Décès sans rapport avec l'effet</option>
                       <option value="Décès auquel l’effet a pu contribuer">Décès auquel l’effet a pu contribuer</option>
                       <option value="Inconnue" >Inconnue</option>
          </select>
        </div>
        <div>
          <select id style="width: 400px; margin-right: 40px;margin-left: 160px;" name="service" required>
                        <option disabled selected value="">Service conserné &nbsp;&nbsp; الخدمة المعنية</option>
                        <option value="Pharmacien">Pharmacien</option>
                        <option value="Dentiste">Dentiste</option>
                        <option value="Infirmier">Infirmier</option>
                        <option value="Sage-femme">Sage-femme</option>
                        <option value="Autre">Autre</option>
          </select>
        </div>
        </div>
         <hr style="margin-top: 20px;margin-bottom: 50px;">
          <div style="display: flex;margin-left: 160px;">
        <div>
            <input placeholder="Mot de passe        كلمة السر " type="password" name="password" required style="width: 300px; margin-right: 60px; ">
        </div>  
        <div>
            <input placeholder="Confirmer le mot de passe     تأكيد كلمة السر " type="password" name="cpass" required style="width: 300px; margin-left: 60px;">
        </div>
        </div>
        <div style="margin-left: 400px;padding: 15px;">
          <button type="submit" name="envoye" >Envoyé &nbsp;&nbsp; ارسال</button>
        </div>
      </div>
    </form>
  </div>
<style>
  a {
    color :#00bcd4;
    text-decoration: none;
  }
@import url('https://fonts.googleapis.com/css?family=Roboto');
@import url("https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css");
body {
    --main-bg-color: white;
    background: var(--main-bg-color);
}

.qfc-container {
  --form-theme-color: #00bcd4;
  --form-bg-color: white;
  --input-text-color: black;
  --button-hover: #4e5050;
  --input-bg-gray: #E2E5E5;
  border: 4px solid var(--form-theme-color);
  /* border-top: 7px solid var(--form-theme-color); */
  font-size: 1em;
  font-family: 'Roboto', sans-serif;
  background-color: var(--form-bg-color);
  padding: 35px;
  width: 80%;
  margin: 30px auto;
  margin-top: 30px;
}

.qfc-container ::-webkit-input-placeholder {
  /* Chrome/Opera/Safari */
  color: var(--input-text-color);
}

.qfc-container ::-moz-placeholder {
  /* Firefox 19+ */
  color: var(--input-text-color);
}

.qfc-container :-ms-input-placeholder {
  /* IE 10+ */
  color: var(--input-text-color);
}

.qfc-container :-moz-placeholder {
  /* Firefox 18- */
  color: var(--input-text-color);
}

.qfc-container input {
  width: 200px;
  display: block;
  border: none;
  padding: 12px !important;
  border-bottom: solid 1px var(--form-theme-color);
  -webkit-transition: all 0.3s cubic-bezier(0.64, 0.09, 0.08, 1);
  transition: all 0.3s cubic-bezier(0.64, 0.09, 0.08, 1);
  background-repeat: no-repeat;
  color: var(--input-text-color);
}

.qfc-container input:focus,
input:valid {
  box-shadow: none;
  outline: none;
  background-position: 0 0;
}

.qfc-container input::-webkit-input-placeholder {
  font-family: 'roboto', sans-serif;
  -webkit-transition: all 0.3s ease-in-out;
  transition: all 0.3s ease-in-out;
}

.qfc-container input:focus::-webkit-input-placeholder,
input:valid::-webkit-input-placeholder {
  color: var(--form-theme-color);
  font-size: 11px;
  -webkit-transform: translateY(-20px);
  transform: translateY(-20px);
  visibility: visible !important;
}

.qfc-container h1 {
  font-size: 112px;
  font-weight: 300;
  letter-spacing: -5px;
  line-height: 128px;
}

.qfc-container h2 {
  font-size: 26px;
  line-height: 64px;
}

.qfc-container h3 {
  font-size: 45px;
  line-height: 64px;
}

.qfc-container h4 {
  font-size: 34px;
  line-height: 52px;
}

.qfc-container h5 {
  font-size: 24px;
  line-height: 44px;
}

.qfc-container h6 {
  font-size: 20px;
  font-weight: 600;
  line-height: 44px;
}

.qfc-container h1,
h2,
h3,
h4,
h5,
h6 {
  text-decoration: none;
  position: relative;
  margin: 15px 0 0;
  font-weight: 400;
}

.qfc-container h1:not(.no-underline):after,
.qfc-container h2:not(.no-underline):after,
.qfc-container h3:not(.no-underline):after,
.qfc-container h4:not(.no-underline):after,
.qfc-container h5:not(.no-underline):after,
.qfc-container h6:not(.no-underline):after {
  content: '';
  position: relative;
  display: block;
  bottom: 0;
  margin-bottom: 31px;
  width: 100%;
  border: 1px solid var(--form-theme-color);
}

.qfc-container .no-underline+h1,
.qfc-container .no-underline+h2,
.qfc-container .no-underline+h3,
.qfc-container .no-underline+h4,
.qfc-container .no-underline+h5,
.qfc-container .no-underline+h6 {
  margin-top: 0;
}

.qfc-container input[type="checkbox"] {
  margin-left: 0px;
  display: inline-block;
  position: relative;
  -webkit-appearance: none;
  height: 2em;
  width: 4em;
  border-radius: 1.5em;
  background-color: var(--input-bg-gray);
  border: none;
  background-clip: padding-box;
  color: #919FAF;
  vertical-align: middle;
}

.qfc-container input[type="checkbox"]::before {
  content: "";
  position: absolute;
  left: 0;
  top: 0;
  bottom: 0;
  right: 50%;
  background-color: white;
  border-radius: 100%;
  border: 2px solid transparent;
  -webkit-transition: all 0.5s ease;
  transition: all 0.5s ease;
  background-clip: padding-box;
  z-index: 2;
}

.qfc-container input[type="checkbox"]::after {
  position: absolute;
  left: 0.675em;
  top: 0.35em;
  font-family: "Ionicons";
  content: "\f122\f12a";
  letter-spacing: 0.75em;
  z-index: 1;
}

.qfc-container label {
  font-weight: 400;
}

.qfc-container input[type="checkbox"]:focus,
input[type="radio"]:focus {
  color: white;
  border: none;
  border-color: transparent;
  background-color: #919FAF;
}

.qfc-container input[type="checkbox"]:checked {
  color: white;
  background-color: var(--form-theme-color);
  border-color: transparent;
}

.qfc-container input[type="checkbox"]:checked::before {
  -webkit-transform: translateX(100%);
  transform: translateX(100%);
}

.qfc-container form {
  padding-top: 20px;
}

.qfc-container div {
  margin-top: 5px;
  margin-bottom: 15px;
}

.qfc-container input[type="radio"] {
  width: 30px;
  display: inline-block;
}

.qfc-container input,
select {
  border: none;
  border-bottom: 1px solid var(--form-theme-color);
  color: var(--input-text-color);
  font-family: sans-serif;
  font-weight: 500;
  font-size: 1em;
  border-radius: 0;
  line-height: 22px;
  display: block;
  padding: 5px;
  width: 60%;
  -webkit-box-sizing: border-box;
  -moz-box-sizing: border-box;
  -ms-box-sizing: border-box;
  box-sizing: border-box;
}

.qfc-container textarea {
  border: none;
  border-bottom: 2px solid var(--form-theme-color);
  color: var(--input-text-color);
  font-weight: 500;
  font-size: 1em;
  border-radius: 0;
  line-height: 22px;
  display: block;
  padding: 5px;
  width: 100%;
  -webkit-box-sizing: border-box;
  -moz-box-sizing: border-box;
  -ms-box-sizing: border-box;
  box-sizing: border-box;
}

.qfc-container input:focus,
textarea:focus,
select:focus {
  border-bottom: 3px solid var(--form-theme-color);
  color: var(--form-theme-color);
  font-weight: 600;
  outline: none;
}

.qfc-container input[type='radio']:after {
  width: 20px;
  height: 20px;
  border-radius: 100px;
  margin-left: 4px;
  position: relative;
  background-color: white;
  content: '';
  display: inline-block;
  visibility: visible;
  border: 5px solid var(--input-bg-gray);
}

.qfc-container input[type='radio']:checked:after {
  width: 20px;
  height: 20px;
  border-radius: 100px;
  position: relative;
  background-color: var(--form-theme-color);
  content: '';
  display: inline-block;
  visibility: visible;
  border: 5px solid var(--input-bg-gray);
}

.qfc-container textarea {
  height: 10em;
}

.qfc-container select {
  margin-top: 5px;
  background: white;
  -webkit-appearance: none;
  -moz-appearance: none;
  background-position: right 50%;
  background-repeat: no-repeat;
  background-image: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAA4AAAAMCAYAAABSgIzaAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAAyJpVFh0WE1MOmNvbS5hZG9iZS54bXAAAAAAADw/eHBhY2tldCBiZWdpbj0i77u/IiBpZD0iVzVNME1wQ2VoaUh6cmVTek5UY3prYzlkIj8+IDx4OnhtcG1ldGEgeG1sbnM6eD0iYWRvYmU6bnM6bWV0YS8iIHg6eG1wdGs9IkFkb2JlIFhNUCBDb3JlIDUuMC1jMDYwIDYxLjEzNDc3NywgMjAxMC8wMi8xMi0xNzozMjowMCAgICAgICAgIj4gPHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50YXgtbnMjIj4gPHJkZjpEZXNjcmlwdGlvbiByZGY6YWJvdXQ9IiIgeG1sbnM6eG1wPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvIiB4bWxuczp4bXBNTT0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wL21tLyIgeG1sbnM6c3RSZWY9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9zVHlwZS9SZXNvdXJjZVJlZiMiIHhtcDpDcmVhdG9yVG9vbD0iQWRvYmUgUGhvdG9zaG9wIENTNSBNYWNpbnRvc2giIHhtcE1NOkluc3RhbmNlSUQ9InhtcC5paWQ6NDZFNDEwNjlGNzFEMTFFMkJEQ0VDRTM1N0RCMzMyMkIiIHhtcE1NOkRvY3VtZW50SUQ9InhtcC5kaWQ6NDZFNDEwNkFGNzFEMTFFMkJEQ0VDRTM1N0RCMzMyMkIiPiA8eG1wTU06RGVyaXZlZEZyb20gc3RSZWY6aW5zdGFuY2VJRD0ieG1wLmlpZDo0NkU0MTA2N0Y3MUQxMUUyQkRDRUNFMzU3REIzMzIyQiIgc3RSZWY6ZG9jdW1lbnRJRD0ieG1wLmRpZDo0NkU0MTA2OEY3MUQxMUUyQkRDRUNFMzU3REIzMzIyQiIvPiA8L3JkZjpEZXNjcmlwdGlvbj4gPC9yZGY6UkRGPiA8L3g6eG1wbWV0YT4gPD94cGFja2V0IGVuZD0iciI/PuGsgwQAAAA5SURBVHjaYvz//z8DOYCJgUxAf42MQIzTk0D/M+KzkRGPoQSdykiKJrBGpOhgJFYTWNEIiEeAAAMAzNENEOH+do8AAAAASUVORK5CYII=);
}

.qfc-container button,
input[type='button'],
input[type='reset'],
input[type='submit'] {
  font-family: inherit;
  line-height: 0;
  font-size: .8em;
  padding: 0;
  width: 86px;
  height: 36px;
  border: 0;
  cursor: pointer;
  background-color: var(--form-theme-color);
  color: white;
  -webkit-transition: all 0.3s;
  -moz-transition: all 0.3s;
  transition: all 0.3s;
  font-weight: 600;
  text-transform: uppercase;
}

.qfc-container select[multiple] {
  background: none;
}

.qfc-container button:hover,
input[type='button']:hover,
input[type='reset']:hover,
input[type='submit']:hover {
  background: var(--button-hover);
  transition: all .3s;
}

@media screen and (max-width: 900px) {
  .qfc-container {
      width: 70%;
  }
  .qfc-container input,
  select {
      width: 100%;
  }
}
</style>
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
</html>
