
<?php
require_once '../controllers/registerController.php';
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
        <div class="container">
            <div id="AddUser" class="card-panel">
                <?php if ($addSuccess) { ?>
                    <h2> Patient enregistré ! </h2>
                <?php } else { ?>                       
                    <!--<div class="row">
                        <div class="input-field col s12 l8 offset-l2">
                            input id="birthdate" name="birthdate" type="text" class="validate datepicker" />
                            <label for="birthdate">Date de naissance (ex: 23/05/2000). <span class="error"><?= isset($errorArray['birthdate']) ? $errorArray['birthdate'] : '' ?></span></label>
                        </div>
                        </div>-->                                   
                    <!-- form inscription-->
                    <form id="addUser" action="register.php" method="POST">
                        <fieldset>
                            <legend>Inscription</legend>
                            <div>
                                <label for="lastname">Nom : (DelaMolleFesse)</label>
                                <div>
                                    <span class="error"><?= isset($errorArray['lastname']) ? $errorArray['lastname'] : ''; ?></span>
                                </div>
                                <input name="lastname" type="text" id="lastname" required class="validate" value="<?= isset($_POST['lastname']) ? $_POST['lastname'] : ''; ?>" pattern="[a-zA-Zàáâãäåçèéêëìíîïðòóôõöùúûüýÿ-]+"  />
                            </div>
                            <div>
                                <label for="firstname">Prénom : (ex: Jean-Edouard)</label>
                                <div>
                                    <span class="error"><?= isset($errorArray['firstname']) ? $errorArray['firstname'] : ''; ?></span>
                                </div>
                                <input name="firstname" type="text" id="firstname" required class="validate" value="<?= isset($_POST['firstname']) ? $_POST['firstname'] : ''; ?>" pattern="[a-zA-Zàáâãäåçèéêëìíîïðòóôõöùúûüýÿ-]+" />
                            </div>
                            <div>
                                <label for="phone">Numéro de téléphone : (ex: 0602030405)</label>
                                <div>
                                    <span class="error"><?= isset($errorArray['phone']) ? $errorArray['phone'] : '' ?></span>
                                </div>
                                <input id="phone" name="phone" type="tel" class="validate" required pattern="((\+)33|0)[1-9](\d{2}){4}" value="<?= isset($_POST['phone']) ? $_POST['phone'] : ''; ?>" />
                            </div>
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
                                <!--<label for="confirm_password">Confirmer Mot de Passe : </label>
                                    <input name="confirm_password" type="password" id="confirm_password" required class="validate" pattern=".{6,}+" value="<?= isset($_POST['confirm_password']) ? $confirm_password : ''; ?>" />
                                    <div>
                                    <span class="error">
                                <?= isset($errorArray['confirm_password']) ? $errorArray['confirm_password'] : ''; ?>
                                </span>
                                                                </div>                        -->
                            </div>
                            <div class="modal-footer">
                                <input name="addButton" type="submit" class="waves-effect waves-light btn teal" value="ENREGISTRER"/> <!--ng disabled permet de cacher le bouton si champ pas rempli-->
                                <div>
                                    <span class="error"><?= isset($errorArray['add']) ? $errorArray['add'] : '' ?></span>
                                </div>  
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