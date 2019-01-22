<?php
// Start the session
session_start();
require_once '../controllers/AdminPageController.php';
$_SESSION["test"] = $openCollapsible;
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
                    </div>
                </nav>   
            </div>
        </header>
        <!--end navbar-->
        <div class="container-fluid center">
            <ul class="collapsible">
                <li id="colUser" class="<?= $openCollapsible ? 'active' : '' ?>">
                    <div class="collapsible-header">
                        <h2><i class="material-icons">group</i> Gestion des Clients <i class="material-icons">group</i></h2>
                    </div>
                    <div class="collapsible-body">
                        <p class="center-align"><?= $superUserOK ? 'L\'utilisateur est un superUser' : '' ?><p>
                        <p class="center-align"><?= $superUserDEL ? 'L\'utilisateur n\'est plus superUser' : '' ?><p>
                        <p class="center-align"><?= $deleteOk ? 'L\'utilisateur a été supprimé' : '' ?><p>
                            <?php if ($noMatch) { ?>
                            <p class="center-align"><?= $noMatchMessage ?></p>
                        <?php } else { ?>
                            <table class="centered highlight responsive-table">
                                <thead>
                                    <tr>
                                        <th>Nom</th>
                                        <th>Prénom</th>
                                        <th>Anniversaire</th>
                                        <th>Adresse</th>
                                        <th>Email</th>
                                        <th>Téléphone</th>
                                        <th>Modif</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($listUsers AS $users) { ?>
                                        <tr>
                                            <td><?= $users->lastname ?></td>
                                            <td><?= $users->firstname ?></td>
                                            <td><?= $users->birthdate ?></td>
                                            <td><?= $users->adress ?></td>
                                            <td><?= $users->email ?></td>
                                            <td>0<?= $users->phone ?></td>
                                            <td>
                                                <a class="btn red darken-1 collUser" href="AdminPage.php?deleteThis=<?= $users->id ?>" name="action">Delete
                                                    <i class="large material-icons right">cancel</i>
                                                </a>
                                                <?php if ($users->id_TypeUsers !== '2') { ?>
                                                    <a class="btn collUser" href="AdminPage.php?GetUserSuperUser=<?= $users->id ?>" name="action">SuperUser
                                                        <i class="large material-icons right">grade</i>
                                                    </a>
                                                <?php } else { ?>
                                                    <a class="btn collUser" href="AdminPage.php?DelSuperUser=<?= $users->id ?>" name="action">DelSuperUser</a> 
                                                <?php } ?>
                                            <td>
                                                <a  class="collUser" href="userPage.php?idUser=<?= $users->id ?>">
                                                    <i class="material-icons">person</i>
                                                </a>
                                            </td>
                                        </tr>
                                    <?php } ?><!-- fin de la boucle for each -->
                                </tbody>
                            </table>
                            <?php if ($page > 1) { ?>
                                <a href="AdminPage.php?page=<?= $page - 1 ?>" class="waves-effect waves-light btn collUser"><i class="material-icons left">arrow_back</i></a>                        
                                <?php
                            };
                            for ($pageNumber = 1; $pageNumber <= $pagesMax; $pageNumber++) {
                                ?>
                                <a href="AdminPage.php?page=<?= $pageNumber ?>" class="waves-effect waves-light btn collUser"><?= $pageNumber ?></a>
                                <?php
                            };
                            if ($page < $pagesMax) {
                                ?>
                                <a href="AdminPage.php?page=<?= $page + 1 ?>" class="waves-effect waves-light btn collUser"><i class="material-icons right">arrow_forward</i></a>
                            <?php }; ?>

                            <p>Page actuelle : <?= $page . ' / ' . $pagesMax ?></p>
                        <?php }; ?>
                        <!-- fin du if -->
                    </div>
                </li>
                <li>
                    <div class="collapsible-header">
                        <h2><i class="material-icons">spa</i> Gestion des RDV's <i class="material-icons">spa</i></h2>
                    </div>
                    <div class="collapsible-body">
                        <!--            <div class="card col m12 l6">
                                        <form id="addRDV" action="AdminPage.php" method="POST">
                                            <fieldset>
                                                <legend>Ajouter un RDV</legend>
                                                <div>
                                                    <label for="daterdv">Date du RDV</label>
                                                    <input name="daterdv" type="text" id="daterdv" required class="validate datepicker" value="<?= isset($_POST['date']) ? $_POST['date'] : ''; ?>" />
                                                </div>
                                                <div class="input-field">
                                                    <label for="idTimeRDV">Heure</label>
                                                    <select id="idTimeRDV" name="idTimeRDV">
                                                        <option value="0" disabled selected>Choix de l'heure du RDV</option>
                        <?php foreach ($showTimeRDV AS $timerdv) { ?>
                                                                                                                                                                        <option value="<?= $timerdv->timeRDV ?>"><?= $timerdv->timeRDV ?></option>
                        <?php } ?>
                                                    </select>
                                                    <p class="error"><?= isset($errorArray['idTimeRDV']) ? $errorArray['idTimeRDV'] : '' ?></p>
                                                </div>
                                                <div class="input-field">
                                                    <input name="addButton" type="submit" class="waves-effect waves-light btn teal" value="Ajouter le RDV"/>
                        <?php foreach ($errorArray AS $error) { ?>
                                                                                                                                                                    <p class="error"><?= $error ?></p>
                        <?php } ?>                            
                                                </div>
                                        </form>
                                    </div>  -->
                        <ul class="collapsible col l12">
                            <?php foreach ($listPrestations AS $prestation) { ?>
                                <li>
                                    <div class="collapsible-header">
                                        <i class="material-icons">filter_drama</i>
                                        <?= $prestation->Prestaname ?>
                                        <span class="badge">if Resa.id +1 = count!= Resa.id.length echo Resa</span></div>
                                    <div class="collapsible-body">
                                        foreach
                                        <p><?= $users->lastname ?>  <?= $users->firstname ?> <?= $users->phone ?> dateRDV.dateRDV TimeeRDV.time.RDV</p>
                                        <button class="btn red darken-1" type="submit" name="action">Annuler
                                            <i class="material-icons right">cancel</i>
                                        </button>
                                        <button class="btn" type="submit" name="action">Valider
                                            <i class="material-icons right">done</i>
                                        </button>
                                        fin foreach
                                    </div>
                                </li>
                            <?php } ?>
                        </ul>
                    </div>
                </li>
                <li>
                    <div class="collapsible-header">                        
                        <h2><i class="material-icons">lightbulb_outline</i>Gestion des Produits<i class="material-icons">lightbulb_outline</i></h2>
                    </div>
                    <div class="collapsible-body">
                        <div class="col m12 l6">
                            <form name="addCatProd" action="AdminPage.php" method="POST" >
                                <fieldset>
                                    <legend>Ajouter Catégorie</legend>
                                    <p class="center-align"><?= $addCatSuccess ? 'La catégorie est ajoutée ' : '' ?><p>
                                    <div>
                                        <label for="name">Nom : </label>
                                        <input name="name" type="text" id="name" required class="validate" value="<?= isset($_POST['name']) ? $_POST['name'] : ''; ?>" />
                                        <div>
                                            <span class="error"><?= isset($errorArray['name']) ? $errorArray['name'] : ''; ?></span>
                                        </div>
                                    </div>
                                    <input type="submit" class="btn" name="addCatProd" />
                                    <input name="updateCatButton" type="submit" class="btn" value="Modifier"/>
                                </fieldset>
                            </form>
                            <form name="insertcategory" action="AdminPage.php" method="POST">
                                <fieldset>
                                    <legend>Modifier/Supprimer</legend>
                                    <p class="center-align"><?= $productcategoryDEL ? 'La catégorie est supprimée ' : '' ?><p>
                                    <p class="center-align"><?= $upCatSuccess ? 'La catégorie est modifiée ' : '' ?><p>
                                    <ul class="collapsible">
                                        <li>
                                            <div class="collapsible-header">
                                                <i class="material-icons">filter_drama</i>
                                                Catégorie
                                            </div>
                                            <?php foreach ($showCatProd AS $productcategory) { ?>
                                                <div class="collapsible-body">
                                                    <span><?= $productcategory->name ?></span>
                                                    <a class="red darken-1" href="AdminPage.php?DeleteCatProd=<?= $productcategory->id ?>" name="action">
                                                        <i class="material-icons right">cancel</i>
                                                    </a>
                                                </div>
                                            </li>
                                        <?php } ?>
                                        <li>
                                            <div class="collapsible-header"><i class="material-icons">place</i>Produits</div>
                                            <div class="collapsible-body"><span>Lorem ipsum dolor sit amet.</span></div>
                                        </li>
                                    </ul>


                                </fieldset>
                            </form>
                        </div>


                        <form name="insertproduct" action="AdminPage.php" method="POST" class="col m12 l6">
                            <fieldset>
                                <legend>Ajouter produits</legend>
                                <div>
                                    <label for="lastname">Nom : </label>
                                    <input name="lastname" type="text" id="lastname" required class="validate" value="<?= isset($_POST['lastname']) ? $lastname : ''; ?>" />
                                    <div>
                                        <span class="error"><?= isset($errorArray['lastname']) ? $errorArray['lastname'] : ''; ?></span>
                                    </div>
                                </div>
                                <div>
                                    <label for="lastname">Image : </label>
                                    <input name="lastname" type="text" id="lastname" required class="validate" value="<?= isset($_POST['lastname']) ? $lastname : ''; ?>" />
                                    <div>
                                        <span class="error"><?= isset($errorArray['lastname']) ? $errorArray['lastname'] : ''; ?></span>
                                    </div>
                                </div>
                                <div>
                                    <label for="lastname">Description : </label>
                                    <input name="lastname" type="text" id="lastname" required class="validate" value="<?= isset($_POST['lastname']) ? $lastname : ''; ?>" />
                                    <div>
                                        <span class="error"><?= isset($errorArray['lastname']) ? $errorArray['lastname'] : ''; ?></span>
                                    </div>
                                </div>
                                <div>
                                    <label for="lastname">Prix : </label>
                                    <input name="lastname" type="text" id="lastname" required class="validate" value="<?= isset($_POST['lastname']) ? $lastname : ''; ?>" />
                                    <div>
                                        <span class="error"><?= isset($errorArray['lastname']) ? $errorArray['lastname'] : ''; ?></span>
                                    </div>
                                </div>
                                <div>
                                    <label for="lastname">Catégorie : </label>
                                    <input name="lastname" type="text" id="lastname" required class="validate" value="<?= isset($_POST['lastname']) ? $lastname : ''; ?>" />
                                    <div>
                                        <span class="error"><?= isset($errorArray['lastname']) ? $errorArray['lastname'] : ''; ?></span>
                                    </div>
                                </div>
                                <input type="submit" class="btn " name="butSendForm" />
                            </fieldset>
                        </form>
                    </div>
                </li>
            </ul>
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