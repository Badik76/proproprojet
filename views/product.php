<?php
// Start the session
session_start();
require_once '../controllers/productController.php';
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
        <div class="container-fluid center">
            <div class="row">
                <h2 class="soft-white">Notre catalogue</h2>
                <div class="row" id="categoryproductList">
                    <?php foreach ($showCatProd as $productcategory) { ?>
                        <a href="product.php?productCategory_id=<?= $productcategory->productCategory_id ?>" class="waves-effect waves-dark btn backgroundcolor white-text"><?= $productcategory->productCategory_name ?></a>
                    <?php } ?>
                </div> 
                <div class="row">
                    <?php
                    foreach ($findProd as $products) {
                        ?>
                        <div class="col s12 m6 l4">
                            <div class="card">
                                <div class="card-image">
                                    <img class="responsive-img-products" src="../assets/img/<?= $products->products_image ?>" alt="<?= $products->products_description ?>" />
                                </div>
                                <p class="center-align card-title truncate dark-blue-text rem13"><?= $products->products_name ?></p>
                                <div class="divider"></div>
                                <div class="card-content">
                                    <p><span class="badge backgroundcolor white-text"><?= $products->productCategory_id ?></span></p><br /><br />
                                    <p class="truncate"><?= $products->products_description ?></p>
                                </div>
                                <div class="divider"></div>
                                <div class="card-content">
                                    <div class="row">
                                        <div class="col s6">
                                            <a class="hide btn addNewProductInCart right waves-effect waves-light dark-blue tooltipped btn-floating" data-position="top" data-tooltip="Ajouter au panier" data-item-name="${products[prods].product}"><i class="material-icons">add_shopping_cart</i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                    ?>                    
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