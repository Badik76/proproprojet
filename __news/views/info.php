<?php
// Start the session
session_start();
require_once '../controllers/AdminPageController.php';
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

                <div class="container-fluid ">
            <h2 class="center">Wellness Reiki vous propose</h2>
            <div class="row">
                <div class="col s12 m6 l6 center">
                    <ul class="collapsible">
                        <li>
                            <div class="collapsible-header"><h4 class="backgroundcolor-text center"><i class="large material-icons backgroundcolor-text">domain</i>Description de la séance à domicile</h4></div>
                            <div class="collapsible-body"><span class="backgroundcolor-text">Pendant une séance de soin énergétique, vous êtes habillé et allongé sur une table de massage. <br />
                                    Vous bénéficierez entre 45 min minutes et 1 heure des bienfaits de l’énergie qui vous sera transmise.<br /> 
                                    En tant que praticien, je vais agir sur les différentes parties du corps, de la tête aux pieds, par apposition des mains, ceci pendant plusieurs minutes sur vos différents centres énergétiques pour les ré-harmoniser.<br />
                                    Je diffuse l'énergie qui accroît les capacités de l'organisme à se soigner lui-même.<br />
                                    Par ce fait cette énergie va renforcer tout traitement médical, mais en aucun cas ne se substituera à celui-ci.<br /> 
                                    Les effets peuvent perdurer de 24 à 72 heures après la séance.<br /> 
                                    Pendant votre séance, vous pouvez vous laisser aller, sereinement, tout au long du déroulement, généralement dans une ambiance musicale douce et relaxante. <br /> 
                                    Après la séance, il est souhaitable de partager ce que l’on a vécu durant la séance et de donner ses impressions.<br />
                                    Pensez à vous hydrater en buvant de l'eau pour faciliter le processus d’élimination durant la semaine qui suit.</span></div>
                        </li>
                    </ul>              
                </div>
                <div class="col s12 m6 l6 center">
                    <ul class="collapsible">
                        <li>   
                            <div class="collapsible-header"><h4 class="backgroundcolor-text center"><i class="large material-icons backgroundcolor-text">leak_add</i>Description de la séance à distance</h4></div>
                            <div class="collapsible-body"><p class="backgroundcolor-text">L'énergie de Reiki peut être orientée efficacement vers n'importe qui et n'importe où dans le monde. 
                                        Une séance de Reiki à distance dure environ 30 minutes. Il est nécessaire de prendre rendez-vous et de choisir un horaire ensemble. <br />
                                        La personne qui va recevoir la séance à distance pourra chez elle, trouver un endroit au calme, sur son lit ou dans un fauteuil, s’y installer confortablement et se relaxer. 
                                        Un traitement de Reiki à distance libère et aide les personnes vivant un état de stress ou de fatigue profonde ou passagère. Il apporte, également, un bien-être sur le plan physique et le plan émotionnel. <br />
                                        Ce travail à distance, très intense, peut rapidement apporter un état de bien-être et de sérénité. 
                                        Le Reiki agit sur différents plans : Physique, Emotionnel et Spirituel.<br /> Par ce travail, il y a de grands allégements au niveau des douleurs physiques et des malaises psychiques mais il arrive, bien souvent, que l’état physique ne va s’améliorer que lorsque la personne aura libéré ses tristesses, ses peurs et ses souffrances anciennes. Il est, donc, important, d’accepter les transformations intérieures qui peuvent intervenir durant un traitement. <br />
                                        Après la séance, il est souhaitable de partager ce que l’on a vécu durant la séance et de donner ses impressions. Chaque séance peut être différente dans le ressenti… Pour cela, il est possible de m'écrire par mail, vous serez toujours bienvenus...</p></div>
                        </li>                         
                    </ul>

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