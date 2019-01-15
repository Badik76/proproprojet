<?php
require_once '../controllers/loginController.php';
?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <title>Projet pro</title>
        <link rel="shortcut icon" href="../assets/img/doigt.png"/>
        <meta name="author" content="Badik76" />
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" />
        <link href="https://fonts.googleapis.com/css?family=Thasadith" rel="stylesheet">
        <!--Import materialize.css-->
        <link type="text/css" rel="stylesheet" href="../assets/import/Materialize/css/materialize.min.css"  media="screen" />
        <!-- Import personnal stylesheet -->
        <link type="text/css" rel="stylesheet" href="../assets/css/style.css" />
        <!--Let browser know website is optimized for mobile-->
    </head>
    <body>
        <!--navbar-->
        <header>
            <div class="navbar-fixed">
                <nav class="backgroundcolor">
                    <div class="nav-wrapper">
                        <a href="../index.php" class="brand-logo"><i class="fas fa-home"></i></a>
                        <ul id="nav-mobile" class="right hide-on-med-and-down">
                            <li><a href="product.php">Produits</a></li>
                            <li><a href="userPage.php">Mes RDVs</a></li>
                            <li><a class="dropdown-trigger" href="#!" data-target="dropdown1">Espace Client<i class="material-icons right">arrow_drop_down</i></a></li>
                            <!-- Dropdown Structure -->
                        </ul>
                        <ul id="dropdown1" class="dropdown-content">
                            <li><a class="waves-effect waves-light" href="register.php">Inscription</a>
                            </li>
                            <li class="divider"></li>
                            <li><a class="waves-effect waves-light" href="login.php">Connexion</a>
                            </li>
                        </ul>
                    </div>
                </nav>   
            </div>
        </header>
        <!--end navbar-->    
        <div id="logUser" class="card-panel">
            <?php if ($logSuccess) { ?>
                <h2> Connexion établie ! </h2>
            <?php } else { ?>
                <form  action="register.php" method="POST">
                    <fieldset>
                        <legend>Connexion</legend>
                        <div>
                            <label for="email">Email : (ex: mail@mail.fr)</label>
                            <div>
                                <span class="error"><?= isset($errorArray['email']) ? $errorArray['email'] : ''; ?></span>
                            </div>   
                            <input name="email" type="email" id="mail" required class="validate"  value="<?= isset($_POST['email']) ? $_POST['email'] : '' ?>" />
                        </div>
                        <div>
                            <label for="password">Mot de Passe : </label>
                            <input name="password" type="password" id="password" required class="validate" pattern=".{6,}+" value="" />
                            <div>
                                <span class="error"><?= isset($errorArray['password']) ? $errorArray['password'] : ''; ?></span>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <label for="remember">Se souvenir de moi ? </label>
                            <input type="checkbox" checked="checked" name="remember" id="remember" class="filled-in" />
                            <input type="submit" class="btn" name="logButton" />
                        </div>
                    </fieldset>
                </form>
            <?php } ?>
        </div>
        <!-- fin formulaire inscription-->
        <div class="container-fluid rem10">
            2018 - Made by Badik 🖕 with <i class="fas fa-heart red-text rem10"></i>
        </div>
        <!--end coryright-->
        <!--Scripts-->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.7.5/angular.min.js"></script>
        <script src="../assets/import/SweetAlert/sweetalert.min.js"></script>
        <script src="../assets/js/script.js"></script>       
    </body>
</html>