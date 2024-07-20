<?php
session_start();
if(!isset($_SESSION['code_utl'])) {
    header("location: ../index.php");
} 
?>
<?php 
    include "../conn.php";
    session_start();
    $code_utl = $_SESSION['code_utl'];
    $result = mysqli_query($conn, "SELECT * FROM declaration where code_utl = $code_utl ORDER BY date_pub DESC");
?>
<!DOCTYPE html>
<html>
<head>
	<title>Espace declarateur</title>
  <style>
                            * {
                      font-family: sans-serif; /* Change your font family */
                    }

                    .content-table {
                      border-collapse: collapse;
                      margin: 25px 0;
                      margin-left: 40px;
                      font-size: 0.9em;
                      min-width: 400px;
                      border-radius: 5px 5px 0 0;
                      overflow: hidden;
                      box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
                      min-width: 80%;
                    }

                    .content-table thead tr {
                      background-color: #009879;
                      color: #ffffff;
                      text-align: left;
                      font-weight: bold;
                    }

                    .content-table th,
                    .content-table td {
                      padding: 12px 15px;

                    }
                    td{
                        height: 80px;
                    }
                    .content-table tbody tr {
                      border-bottom: 1px solid #dddddd;
                    }

                    .content-table tbody tr:nth-of-type(even) {
                      background-color: #f3f3f3;
                    }

                    .content-table tbody tr:last-of-type {
                      border-bottom: 2px solid #009879;
                    }

                    .content-table tbody tr.active-row {
                      font-weight: bold;
                      color: #009879;
                    }
                    .rep {
                    box-shadow: 0px 10px 14px -7px #3e7327;
                    background:linear-gradient(to bottom, #77b55a 5%, #72b352 100%);
                    background-color:#77b55a;
                    border-radius:4px;
                    border:1px solid #4b8f29;
                    display:inline-block;
                    cursor:pointer;
                    color:#ffffff;
                    font-family:Arial;
                    font-size:13px;
                    font-weight:bold;
                    padding:6px 12px;
                    text-decoration:none;
                    text-shadow:0px 1px 0px #5b8a3c;
                }
                .rep:hover {
                    background:linear-gradient(to bottom, #72b352 5%, #77b55a 100%);
                    background-color:#72b352;
                }
                .rep:active {
                    position:relative;
                    top:1px;
                }
                .cons {
                    box-shadow: 0px 1px 0px 0px #f0f7fa;
                    background:linear-gradient(to bottom, #33bdef 5%, #019ad2 100%);
                    background-color:#33bdef;
                    border-radius:6px;
                    border:1px solid #057fd0;
                    display:inline-block;
                    cursor:pointer;
                    color:#ffffff;
                    font-family:Arial;
                    font-size:15px;
                    font-weight:bold;
                    padding:6px 11px;
                    text-decoration:none;
                    text-shadow:0px -1px 0px #5b6178;
                }
                .cons:hover {
                    background:linear-gradient(to bottom, #019ad2 5%, #33bdef 100%);
                    background-color:#019ad2;
                }
                .cons:active {
                    position:relative;
                    top:1px;
                }
    </style>
</head>
<body>
	<?php 
			include "header.php" ;
	?>
        <section style="margin-top: 120px;padding-left: 110px;">
            <?php if (mysqli_num_rows($result)) { ?>
              <H2>Le suivi des déclarations : </H2>
            <table class="content-table">
                  <thead>
                        <tr>
                          <th>N°</th>
                          <th>Nom du médicament</th>
                          <th>Effet indesirable</th>
                          <th>Etat du déclartation</th>
                          <th colspan="2" >Actions</th>
                        </tr>
                  </thead>
                  <tbody>
                    <?php
        $i = 0;
        while($rows = mysqli_fetch_assoc($result)){
          $i++;
          ?>
                        <tr>
                          <td><?php echo $i; ?></td>
                          <td><?php echo $rows['nomspf']; ?></td>
                          <td><?php echo $rows['Effetindesirableobserve']; ?></td>
                          <td><?php echo $rows['etat']; ?></td>                          
                          <td><a href="declaration.php?dec=<?php echo $rows['id_dec'];?>" class="cons">Consulter</a></td>
                          <td><a href="reponse.php?dec=<?php echo $rows['id_dec']; ?>" class="rep">Voir la reponse</a></td>
                        </tr>
                         <?php } ?>
                  </tbody >
        </table>
        <?php } else{  ?>
            <h3 style="margin-left: 360px;margin-top: 300px;">Vous n'avez fait aucun declaration.</h3> ;
        <?php }  ?>
        </section >



<!-- End contact-page Area -->

<!-- start footer Area -->
<!-- End footer Area -->


	<?php 
		 // include "footer.php" ;
	?>
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