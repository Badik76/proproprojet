<?php
// Start the session
session_start();
require_once '../controllers/registerController.php';
?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <title>Wellness Reiki</title>
        <link rel="shortcut icon" href="../assets/img/logo.png"/>
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
                        <a href="../index.php"><img src="../assets/img/logo.png" class="logo left" alt="logo" title="logo" /></a>
                        <ul id="left-nav" class="left hide-on-med-and-down">
                            <li>Wellness Reiki</li>
                        </ul>  
                        <ul id="right-nav" class="right hide-on-med-and-down">
                            <li><a href="product.php">Produits</a></li>
                            <li><a href="userPage.php">Mes RDVs</a></li>
                            <li><a href="AdminPage.php">PanelAdmin</a></li>
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
                        <ul class="right hide-on-med-and-up show-on-medium-and-down">
                            <li><a data-target="slide-out" class="sidenav-trigger"><i class="material-icons">menu</i></a></li>
                        </ul>
                    </div>
                </nav>   
            </div>
            <ul id="slide-out" class="sidenav">          
                <li><a class="subheader"><img  id="logonavmob" src="../assets/img/logo.png">Wellness Reiki</a></li>
                <li><div class="divider"></div></li>
                <li><a href="../index.php"><i class="material-icons">home</i>Accueil</a></li>
                <li><a href="product.php"><i class="material-icons">lightbulb</i>Produits</a></li>
                <li><a href="userPage.php"><i class="material-icons">spa</i>Mes RDVs</a></li>
                <li><a href="AdminPage.php"><i class="material-icons">dashboard</i>Panel Admin</a></li>
                <li><div class="divider"></div></li>
                <li><a class="subheader">Espace personnel</a></li>
                <li><div class="divider"></div></li>
                <li><a class="waves-effect" href="register.php"><i class="material-icons">add</i> Inscription</a></li>
                <li><a class="waves-effect" href="login.php"><i class="material-icons">input</i> Connexion</a></li>
            </ul>        
            <!--end navbar-->
        </header>    
        <div class="container">
            <div id="AddUser" class="card-panel">
                <?php if ($addSuccess) { ?>
                    <h2> Patient enregistré ! </h2>
                    <a href="../index.php">Retour</a>
                <?php } else { ?>                             
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