<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Colorlib Templates">
    <meta name="author" content="Colorlib">
    <meta name="keywords" content="Colorlib Templates">

    <!-- Title Page-->
    <title>Au Register Forms by Colorlib</title>
    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    

    <!-- Main CSS-->
    <link href="../css/main55.css" rel="stylesheet" media="all">
</head>
            <!-- start header -->
                <?php include"header.php" ?>
             <!-- end header -->

<body>
    <div class="page-wrapper bg-gra-02 p-t-130 p-b-100 font-poppins" >
        <div class="wrapper wrapper--w680">
            <div class="card card-4">
                <div class="card-body">
                    <h2 class="title">Inscription</h2>
                    <form method="POST">
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Nom</label>
                                    <input class="input--style-4" type="text" name="first_name" style="width: 200px;">
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Prénom</label>
                                    <input class="input--style-4" type="text" name="last_name">
                                </div>
                            </div>
                        </div>
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Ville</label>
                                    <input class="input--style-4" type="text" name="last_name">
                                </div>
                            </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Sexe</label>
                                    <div class="p-t-10">
                                        <label class="radio-container m-r-45">Homme
                                            <input type="radio" checked="checked" name="gender">
                                            <span class="checkmark"></span>
                                        </label>
                                        <label class="radio-container">Femme
                                            <input type="radio" name="gender">
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Email</label>
                                    <input class="input--style-4" type="email" name="email">
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Telephone</label>
                                    <input class="input--style-4" type="text" name="phone">
                                </div>
                            </div>
                        </div>
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Mot de passe</label>
                                    <input class="input--style-4" type="password" name="pass">
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Confirmer le mot de passe</label>
                                    <input class="input--style-4" type="password" name="cpass">
                                </div>
                            </div>
                        </div>
                        <div class="p-t-15">
                            <button class="btn btn--radius-2 btn--blue" type="submit">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

   
   

</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>
<!-- end document-->