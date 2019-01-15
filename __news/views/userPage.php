<?php
// Start the session
session_start();
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

        <div class="container-fluid row center">


            <!--    FOREACH-->
            <div class="col m12 l6">
                <div class="card">         
                    <div class="card-title groundcolor"><h2><i class="material-icons">spa</i> Mon prochain RDV <i class="material-icons">spa</i></h2></div>
                    <div class="card-content">
                        <table class="centered highlight responsive-table">
                            <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>Heure</th>
                                </tr>
                            </thead>

                            <tbody>
                                <tr>
                                    <td>DateRDV.date.RDV</td>
                                    <td>TimeRDV.timeRDV</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="card-action">
                        <button class="btn red darken-1" type="submit" name="action">Delete
                            <i class="material-icons right">cancel</i>
                        </button>
                        <button class="btn" type="submit" name="action">Upgrade
                            <i class="material-icons right">autorenew</i>
                        </button>
                    </div>
                </div>
                <div class="card">         
                    <div class="card-title groundcolor"><h2><i class="material-icons">spa</i> Mes anciens RDV <i class="material-icons">spa</i></h2></div>
                    <div class="card-content">
                        <table class="centered highlight responsive-table">
                            <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>Heure</th>
                                </tr>
                            </thead>
                            FOREACH
                            <tbody>
                                <tr>
                                    <td>DateRDV.date.RDV</td>
                                    <td>TimeRDV.timeRDV</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="card col m12 l6"> 
                <div class="card-title groundcolor"><h2><i class="material-icons">group</i> Mon Profil <i class="material-icons">group</i></h2></div>
                <p>TypeUsers.name if superusers = icon grade</p>
                <div class="card-content">
                    <form id="inscription" method="post" action="userPage.php">
                        <fieldset>
                            <legend>Mise à Jour</legend>
                            <div>
                                <label for="lastname">Nom : </label>
                                <input name="lastname" type="text" id="lastname" required class="validate" value="<?= isset($_POST['lastname']) ? $lastname : ''; ?>" />
                                <div>
                                    <span class="error"><?= isset($errorArray['lastname']) ? $errorArray['lastname'] : ''; ?></span>
                                </div>
                            </div>
                            <div>
                                <label for="firstname">Prénom : </label>
                                <input name="firstname" type="text" id="firstname" required class="validate" value="<?= isset($_POST['firstname']) ? $firstname : ''; ?>" />
                                <div>
                                    <span class="error"><?= isset($errorArray['firstname']) ? $errorArray['firstname'] : ''; ?></span>
                                </div>
                            </div>
                            <div>
                                <label for="phone">Téléphone : </label>
                                <input name="phone" type="tel" id="phone" required class="validate" value="<?= isset($_POST['phone']) ? $phone : ''; ?>" />
                                <div>
                                    <span class="error"><?= isset($errorArray['phone']) ? $errorArray['phone'] : ''; ?></span>
                                </div>                        
                            </div>
                            <div>
                                <label for="email">Email : </label>
                                <input name="email" type="email" id="email" required class="validate" value="<?= isset($_POST['email']) ? $email : ''; ?>" />
                                <div>
                                    <span class="error"><?= isset($errorArray['email']) ? $errorArray['email'] : ''; ?></span>
                                </div>                        
                            </div>
                        </fieldset>
                    </form>
                </div>
                <div class="card-action">
                    <button class="btn red darken-1" type="submit" name="actiondel">Delete
                        <i class="material-icons right">cancel</i>
                    </button>
                    <button class="btn" type="submit" name="actionup">Upgrade
                        <i class="material-icons right">autorenew</i>
                    </button>
                    <p class="badge red-text text-darken-1">Cette action est irreversible.</p>
                </div>
            </div>
        </div>
        <!--coryright-->
        <div class="container-fluid rem10">
            2018 - Made by Badik 🖕 with <i class="fas fa-heart red-text rem10"></i>
        </div>
        <!--end coryright-->
        <!--Scripts-->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.7.5/angular.min.js"></script>
        <script src="../assets/import/Materialize/js/materialize.min.js"></script>
        <script src="../assets/import/SweetAlert/sweetalert.min.js"></script>
        <script src="../assets/js/script.js"></script>
    </body>
</html>