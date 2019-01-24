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
        <title>Projet pro</title>
        <link rel="shortcut icon" href="./assets/img/doigt.png"/>
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
                        <a href="index.php" class="brand-logo"><i class="fas fa-home"></i></a>
                        <ul id="nav-mobile" class="right hide-on-med-and-down">
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
                    </div>
                </nav>   
            </div>
            <!--end navbar-->
        </header>
        <!--carou-->
        <section class="carousel carousel-slider center" >
            <ul class="slides">
                <div class="carousel-item" href="#one!">
                    <li>
                        <div class="carousel-fixed-item center">
                            <h2>Le REIKI pour tous</h2>
                            <p>Efficace est pas cher, c'est le reiki que je préfère</p>
                        </div>
                        <img src="./assets/img/carou1.jpeg" class="responsive-img" alt="carou1" title="REIKI" id="slide1"/>
                    </li>
                </div>
                <div class="carousel-item" href="#two!">
                    <li>
                        <div class="carousel-fixed-item center">
                            <h2>Des Pierres et des Bijoux</h2>
                            <p>Tout est fait main par mes p'tits soiins</p>
                        </div>
                        <img src="./assets/img/carou2.jpeg" class="responsive-img" alt="carou2" title="BIJOUX" id="slide2"/>
                    </li>
                </div>
                <div class="carousel-item" href="#three!">
                    <li>
                        <div class="carousel-fixed-item center">
                            <h2>Prenez soin de vous</h2>
                            <p>Je suis là pour ça</p>
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
                                <img src="./assets/img/<?= $prestation->image ?>">
                                <span class="card-title"><?= $prestation->Prestaname ?></span>
                                <a class="btn-floating halfway-fab waves-effect waves-light backgroundcolor modal-trigger" href="#modal"><i class="material-icons">add</i></a>
                            </div>
                            <div class="card-content">
                                <p class="truncate"><?= $prestation->description ?></p>
                            </div>
                        </div>
                    </div>
                <div id="modal1" class="modal">
    <div class="modal-content datepicker">
      <h4>Modal Header</h4>
      <p>A bunch of text</p>
    </div>
    <div class="modal-footer">
      <a href="#!" class="modal-close waves-effect waves-green btn-flat">Agree</a>
    </div>
  </div>
                <?php } ?>
            </div>
        </div>
        <!--end  prestation-->

        <!-- créer en dessus card avec les coms laissés -->
        <div id="endCom" class="row">
            <h2 class="center">Vos Avis</h2>
            foreach
            <div class="col s12 m4 l4">
                <div class="card horizontal">
                    <div class="card-stacked">
                        <div class="card-content">
                            <p>Ceci sera le premier et seul commentaire $comment->comment</p>
                        </div>
                        <div class="card-action">
                            <a href="#">$comment->id_USERS</a>
                        </div>
                    </div>
                </div>
            </div>
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