<?php
// Start the session
session_start();
require_once 'controllers/indexController.php';
?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <title>Wellness Reiki</title>
        <link rel="shortcut icon" href="./assets/img/logo.png"/>
        <meta name="author" content="Badik76" />
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" />
        <link href="https://fonts.googleapis.com/css?family=Thasadith" rel="stylesheet">
        <!--Import materialize.css-->
        <link type="text/css" rel="stylesheet" href="./assets/import/Materialize/css/materialize.min.css"  media="screen" />
        <!-- Import personnal stylesheet -->
        <link type="text/css" rel="stylesheet" href="./assets/css/style.css" />
        <!--Let browser know website is optimized for mobile-->
    </head>
    <body>
        <!--navbar-->
        <header>
            <div class="navbar-fixed">
                <nav class="backgroundcolor">
                    <div class="nav-wrapper">
                        <a href="index.php"><img src="./assets/img/logo.png" class="logo left" alt="logo" title="logo" /></a>
                        <ul id="left-nav" class="left hide-on-med-and-down">
                            <li>Wellness Reiki</li>
                        </ul>                        
                        <ul id="right-nav" class="right hide-on-med-and-down">
                            <li><a href="views/product.php">Produits</a></li>
                            <li><a href="views/userPage.php">Mes RDVs</a></li>
                            <li><a href="views/AdminPage.php">Panel Admin</a></li>
                            <li><a class="dropdown-trigger" href="#!" data-target="dropdown1">Espace Client<i class="material-icons right">arrow_drop_down</i></a></li>
                            <!-- Dropdown Structure -->
                        </ul>
                        <ul id="dropdown1" class="dropdown-content">
                            <li><a class="waves-effect waves-light" href="views/register.php">Inscription</a>
                            </li>
                            <li class="divider"></li>
                            <li><a class="waves-effect waves-light" href="views/login.php">Connexion</a>
                            </li>
                        </ul>                    
                        <ul class="right hide-on-med-and-up show-on-medium-and-down">
                            <li><a data-target="slide-out" class="sidenav-trigger"><i class="material-icons">menu</i></a></li>
                        </ul>
                    </div>
                </nav>                
            </div>
            <ul id="slide-out" class="sidenav">     
                <li><a class="subheader"><img  id="logonavmob" src="assets/img/logo.png">Wellness Reiki</a></li>
                <li><div class="divider"></div></li>
                <li><a href="index.php"><i class="material-icons">home</i>Accueil</a></li>
                <li><a href="views/product.php"><i class="material-icons">lightbulb</i>Produits</a></li>
                <li><a href="views/userPage.php"><i class="material-icons">spa</i>Mes RDVs</a></li>
                <li><a href="views/AdminPage.php"><i class="material-icons">dashboard</i>Panel Admin</a></li>
                <li><div class="divider"></div></li>
                <li><a class="subheader">Espace personnel</a></li>
                <li><div class="divider"></div></li>
                <li><a class="waves-effect" href="views/register.php"><i class="material-icons">add</i> Inscription</a></li>
                <li><a class="waves-effect" href="views/login.php"><i class="material-icons">input</i> Connexion</a></li>
            </ul>

            <!--end navbar-->
        </header>
        <!--carou-->
        <section class="carousel carousel-slider center" >
            <ul class="slides">
                <div class="carousel-item" href="#one!">
                    <li>
                        <div class="carousel-fixed-item center">
                            <h2>Wellness Reiki</h2>
                            <p>Découvert et développé à partir de 1922 par Mikao Usui, le Reiki est une technique de relaxation japonaise qui se pratique par apposition des mains.
                                <br />Ainsi pendant une séance de Reiki, en tant que praticien énergéticien, je canalise l'énergie environnante et vous la transmets en positionnant mes mains sur différentes parties de votre corps (notamment sur les centres énergétiques, les "chakras" pour les hindous). Cette énergie va ensuite se diriger sur les endroits de votre corps qui en ont le plus besoin.</p>
                        </div>
                        <img src="./assets/img/carou1.jpeg" class="responsive-img" alt="carou1" title="REIKI" id="slide1"/>
                    </li>
                </div>
                <div class="carousel-item" href="#two!">
                    <li>
                        <div class="carousel-fixed-item center">
                            <h2>Des Effets Ressentis</h2>
                            <p>Les effets bénéfiques (calme, détente, libération des tensions, blocages, etc.…) se font généralement ressentir dès la première séance.
                                   <br />Les effets sont tant au niveau du mental, des émotions que du physique. En dénouant les blocages énergétiques et émotionnels, il est possible que des émotions refoulées réapparaissent. Il est important d'accepter ces sentiments et émotions.
                                <br />Sachez que cela agit toujours pour votre bien-être en développant le processus d'auto-guérissons.</p>
                        </div>
                        <img src="./assets/img/carou2.jpeg" class="responsive-img" alt="carou2" title="BIJOUX" id="slide2"/>
                    </li>
                </div>
                <div class="carousel-item" href="#three!">
                    <li>
                        <div class="carousel-fixed-item center">
                            <h2>L'auto-guérisson</h2>
                            <p>Une séance ressource, détend, libère les blocages énergétiques, renforce le système immunitaire, diminue la douleur et élimine les toxines du corps.
                                <br />Il est évident que rien n'est imposé, ni figé ! Toutes les décisions seront libres et prises par vous !</p>
                        </div>
                        <img src="./assets/img/carou3.jpeg" class="responsive-img" alt="carou3" title="COUCOU" id="slide3"/>
                    </li>
                </div>
            </ul>
        </section>
        <!--end carou-->
            <!-- prestation-->
            <div class="container-fluid ">
                <h2 class="center">Mes Prestations</h2>
                <div class="row">
                    <?php foreach ($listPrestations AS $prestation) { ?>
                        <div class="col s12 m4 l4">
                            <div class="card">
                                <div class="card-image">
                                    <img src="./assets/img/<?= $prestation->prestations_image ?>">
                                    <span class="card-title"><?= $prestation->prestations_name ?></span>
                                    <!-- Modal Trigger AddRDVbyPresta -->
                                    <a class="btn-floating halfway-fab waves-effect waves-light backgroundcolor modal-trigger" href="#modalID<?= $prestation->prestations_id ?>"><i class="material-icons">add</i></a>
                                </div>
                                <div class="card-content">
                                    <p class="truncate"><?= $prestation->prestations_description ?></p>
                                </div>
                            </div>
                        </div>
                        <!-- Modal Structure AddCat-->
                        <div id="modalID<?= $prestation->prestations_id ?>" class="modal">
                            <div class="modal-content">
                                <form id="addRDV" action="index.php?prestations_id=<?= $prestation->prestations_id ?>" method="POST">
                                    <fieldset>
                                        <legend>Prendre un RDV <?= $prestation->prestations_name ?></legend>
                                        <p class="center-align"><?= $addRDVSuccess ? 'Le rdv est enregistré' : '' ?><p>
                                        <p><?= $prestation->prestations_description ?></p>
                                        <div>
                                            <label for="dateRDV_dateRDV">Date du RDV</label>
                                            <input name="dateRDV_dateRDV" type="text" id="dateRDV_dateRDV" required class="validate datepicker" value="<?= isset($_POST['dateRDV_dateRDV']) ? $_POST['dateRDV_dateRDV'] : ''; ?>" />
                                        </div>
                                        <div class="input-field">
                                            <label for="timeRDV_id">Heure</label>
                                            <select id="timeRDV_id" name="timeRDV_id">
                                                <option value="0" disabled selected>Choix de l'heure du RDV</option>
                                                <?php foreach ($showTimeRDV AS $timerdv) { ?>
                                                    <option value="<?= $timerdv->timeRDV_id ?>"><?= $timerdv->timeRDV_timeRDV ?></option>
                                                <?php } ?>
                                            </select>
                                            <p class="error"><?= isset($errorArray['timeRDV_id']) ? $errorArray['timeRDV_id'] : '' ?></p>
                                        </div>
                                        <div class="input-field">
                                            <label for="users_id">Users</label>
                                            <select id="users_id" name="users_id">
                                                <option value="0" disabled selected>Choix du Users</option>
                                                <?php foreach ($listUsers AS $users) { ?>
                                                    <option value="<?= $users->users_id ?>"><?= $users->users_lastname . ' ' . $users->users_firstname ?></option>
                                                <?php } ?>
                                            </select>
                                            <p class="error"><?= isset($errorArray['users_id']) ? $errorArray['users_id'] : '' ?></p>
                                        </div>
                                        <div class="input-field">
                                            <input name="addButton" type="submit" class="waves-effect waves-light btn teal" value="Ajouter le RDV"/>
                                            <?php foreach ($errorArray AS $error) { ?>
                                                <p class="error"><?= $error ?></p>
                                            <?php } ?>                            
                                        </div>
                                    </fieldset>
                                </form>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
            <!--end  prestation-->

            <!-- créer en dessus card avec les coms laissés -->
            <div id="endCom" class="row">
                <h2 class="center">Vos Avis</h2>
                <?php foreach ($commentsList AS $comments) { ?>
                <div class="col s12 m4 l4">
                    <div class="card horizontal">
                        <div class="card-stacked">    
                            <div class="card-content">
                                <p><?= $comments->comments_comment ?></p>
                            </div>
                            <div class="card-action">
                                <a href="#"><?= $comments->users_firstname ?>  <?= $comments->users_lastname ?> <?= $comments->dateRDV_dateRDV ?> <?= $comments->prestations_name ?></a>
                            </div>
                        </div>
                    </div>
                </div>
                <?php } ?>
            </div>
            <!-- end avis -->
            <!--coryright-->
            <div class="container-fluid rem10">
                2018 - Made by Badik 🖕 with <i class="fas fa-heart red-text rem10"></i>
            </div>
            <!--end coryright-->
            <!--Scripts-->
            <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
            <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.7.5/angular.min.js"></script>
            <script src="assets/import/Materialize/js/materialize.min.js"></script>
            <script src="assets/import/SweetAlert/sweetalert.min.js"></script>
            <script src="assets/js/script.js"></script>
    </body>
</html>