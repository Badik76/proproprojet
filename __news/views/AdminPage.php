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
<div class="container-fluid row center">
    <h2><i class="material-icons">spa</i> Gestion des RDV's <i class="material-icons">spa</i></h2>
            <div class="card col m12 l6">
                <button class="datepicker">calendar</button>
                <button class="timepicker">heure</button>
            </div>   


    <ul class="collapsible col m12 l6">
        <li> FOREACH
            <div class="collapsible-header">
                <i class="material-icons">filter_drama</i>
                Prestations.Prestaname
                <span class="new badge">if Resa.id +1 = count!= Resa.id.length echo Resa</span></div>
            <div class="collapsible-body"><p>Users.name users.firstname users.phone dateRDV.dateRDV TimeRDV.time.RDV</p>
                <button class="btn red darken-1" type="submit" name="action">Annuler
                    <i class="material-icons right">cancel</i>
                </button>
                <button class="btn" type="submit" name="action">Valider
                    <i class="material-icons right">done</i>
                </button>
            </div>
        </li>
        <li>
            <div class="collapsible-header">
                <i class="material-icons">place</i>
                Prestations.Prestaname
                <span class="badge">1</span></div>
            <div class="collapsible-body"><p>Lorem ipsum dolor sit amet.</p></div>
        </li>
        <li>
            <div class="collapsible-header"><i class="material-icons">whatshot</i>
                Prestations.Prestaname
            </div>
            <div class="collapsible-body"><span>Lorem ipsum dolor sit amet.</span></div>
        </li>
    </ul>

</div>

<div class="container-fluid row center">
    <h2><i class="material-icons">lightbulb_outline</i>Gestion des Produits<i class="material-icons">lightbulb_outline</i></h2>

    <div class="col m12 l6">
        <form name="insert" action="AdminPage.php" method="POST" >
            <fieldset>
                <legend>Ajouter Catégorie</legend>
                <div>
                    <label for="lastname">Nom : </label>
                    <input name="lastname" type="text" id="lastname" required class="validate" value="<?= isset($_POST['lastname']) ? $lastname : ''; ?>" />
                    <div>
                        <span class="error"><?= isset($errorArray['lastname']) ? $errorArray['lastname'] : ''; ?></span>
                    </div>
                </div>
                <input type="submit" class="btn " name="butSendForm" />
            </fieldset>
        </form>
        <form name="insertcategory" action="AdminPage.php" method="POST">
            <fieldset>
                <legend>Modifier/Supprimer</legend>
                <ul class="collapsible">
                    <li>
                        <div class="collapsible-header"><i class="material-icons">filter_drama</i>Catégorie</div>
                        <div class="collapsible-body"><span>Lorem ipsum dolor sit amet.</span></div>
                    </li>
                    <li>
                        <div class="collapsible-header"><i class="material-icons">place</i>Produits</div>
                        <div class="collapsible-body"><span>Lorem ipsum dolor sit amet.</span></div>
                    </li>
                </ul>
                <button class="btn red darken-1" type="submit" name="action">Delete
                    <i class="material-icons right">cancel</i>
                </button>
                <button class="btn" type="submit" name="action">Upgrade
                    <i class="material-icons right">autorenew</i>
                </button>
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
<div class="container-fluid center">
    <h2><i class="material-icons">group</i> Gestion des Clients <i class="material-icons">group</i></h2>
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
            <!--            foreach-->
            <tr>
                <td>users.name</td>
                <td>users.firstname</td>
                <td>users.birthday</td>
                <td>users.adress</td>
                <td>users.email</td>
                <td>users.phone</td>
                <td>
                    <button class="btn red darken-1" type="submit" name="action">Delete
                        <i class="large material-icons right">cancel</i>
                    </button>
                    <button class="btn" type="submit" name="action">SuperUser
                        <i class="large material-icons right">grade</i>
                    </button>
                </td>
            </tr>
        </tbody>
    </table>
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