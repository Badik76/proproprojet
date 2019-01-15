<!--controller formulaire-->
<?php
include 'models/database.php';
include 'models/users.php';

// On instancie un nouvel $users objet comme classe patients
$users = new users();
//déclaration des regexs   
$regexName = '/^[a-zA-Zàáâãäåçèéêëìíîïðòóôõöùúûüýÿ-]+$/';
$regexBirthdate = '/^(0[1-9]|([1-2][0-9])|3[01])\/(0[1-9]|1[012])\/((19|20)[0-9]{2})$/';
$regexEmail = '/^[^\W][a-zA-Z0-9_]+(\.[a-zA-Z0-9_]+)*\@[a-zA-Z0-9_]+(\.[a-zA-Z0-9_]+)*\.[a-zA-Z]{2,6}$/'; // regex date au format yyyy-mm-dd
$regexPhoneNumber = '/^[0-9]{10,10}$/';
$regexPassword = "/^.{6,}+$/";
// créa tableau pour error
$errorArray = [];
//Initialise $addSuccess en False pour afficher l'ajout de l'user
$addSuccess = false;

//On test la valeur lastname dans l'array $_POST, si elle existe via premier if
if (isset($_POST['lastname'])) {
    // Variable lastname qui vérifie que les caractères speciaux soit converties en entité html via htmlspecialchars = protection
    $users->lastname = htmlspecialchars($_POST['lastname']);
    // On test que la variable n'est pas égale à la regeX
    if (!preg_match($regexName, $users->lastname)) {
        // je crée le message d'erreur suivant dans le tableau d'erreur
        $errorArray['lastname'] = 'Votre nom ne doit contenir que des lettres';
    }
    // Si le post lastname n'est pas rempli (donc vide)
    if (empty($users->lastname)) {
        // je crée le message d'erreur suivant dans le tableau d'erreur
        $errorArray['lastname'] = 'Champs obligatoire';
    }
}

//On test la valeur firstname dans l'array $_POST, si elle existe via premier if
if (isset($_POST['firstname'])) {
    // Variable firstname qui vérifie que les caractères speciaux soit converties en entité html via htmlspecialchars = protection
    $users->firstname = htmlspecialchars($_POST['firstname']);
    // On test que la variable n'est pas égale à la regeX
    if (!preg_match($regexName, $users->firstname)) {
        // J'affiche l'erreur
        $errorArray['firstname'] = 'Votre prénom ne doit contenir que des lettres';
    }
    // Si le post est vide
    if (empty($users->firstname)) {
        // J'affiche le message d'erreur
        $errorArray['firstname'] = 'Champs obligatoire';
    }
}
////On test la valeur birthdate dans l'array $_POST, si elle existe via premier if
//if (isset($_POST['birthdate'])) {
//    // Variable birthdate qui vérifie que les caractères speciaux soit converties en entité html via htmlspecialchars = protection
//    $users->birthdate = $_POST['birthdate'];
//    // On test que la variable n'est pas égale à la regeX
//    if (!preg_match($regexBirthdate, $users->birthdate)) {
//        // J'affiche l'erreur
//        $errorArray['birthdate'] = 'Votre date de naissance doit être de type 30/10/1985';
//    }
//    // Si le post est vide
//    if (empty($users->birthdate)) {
//        // J'affiche le message d'erreur
//        $errorArray['birthdate'] = 'Champs obligatoire';
//    }
//}
//On test la valeur phone dans l'array $_POST, si elle existe via premier if
if (isset($_POST['phone'])) {
    // Variable phone qui vérifie que les caractères speciaux soit converties en entité html via htmlspecialchars = protection
    $users->phone = htmlspecialchars($_POST['phone']);
    // On test que la variable n'est pas égale à la regeX
    if (!preg_match($regexPhoneNumber, $users->phone)) {
        // J'affiche l'erreur
        $errorArray['phone'] = 'Votre numéro de téléphone doit contenir 10 chiffres et doit être de type 0620300405';
    }
    // Si le post est vide
    if (empty($users->phone)) {
        // J'affiche le message d'erreur
        $errorArray['phone'] = 'Champs obligatoire';
    }
}
//On test la valeur email dans l'array $_POST, si elle existe via premier if
if (isset($_POST['email'])) {
    // Variable mail qui vérifie que les caractères speciaux soit converties en entité html
    $users->email = $_POST['email'];
    // On test que la variable n'est pas égale à la regeX
    if (!preg_match($regexEmail, $users->email)) {
        // J'affiche l'erreur
        $errorArray['email'] = 'Votre mail doit être du type mail@mail.com';
    }
    // Si le post est vide
    if (empty($users->email)) {
        // J'affiche le message d'erreur
        $errorArray['email'] = 'Champs obligatoire';
    }
}

//On test la valeur password dans l'array $_POST, si elle existe via premier if
if (isset($_POST['password'])) {
    // Variable password qui vérifie que les caractères speciaux soit converties en entité html via password_hash = protection
    $users->password = password_hash($_POST['password'], PASSWORD_ARGON2I);
    // On test que la variable n'est pas égale à la regex
    if (!preg_match($regexPassword, $users->password)) {
        // J'affiche l'erreur
        $errorArray['password'] = 'Mot de passe à 6 caractères minimum';
    } //puis vérif si vide
    if (empty($users->password)) {
        // J'affiche le message d'erreur
        $errorArray['password'] = 'Veuillez saisir un mot de passe';
    }
}

////On test la valeur confirm_password dans l'array $_POST, si elle existe via premier if
//if (isset($_POST['confirm_password'])) {
//    // Variable confirm_password qui vérifie que les caractères speciaux soit converties en entité html via password_hash = protection
//    $users->confirm_password = password_hash($_POST['confirm_password'], PASSWORD_ARGON2I);
//    // On test que la variable n'est pas égale à la regex
//    if (!preg_match($regexpassword, $users->confirm_password)) {
//        // J'affiche l'erreur
//        $errorArray['confirm_password'] = 'Mot de passe à 6 caractères minimum';
//    } //puis vérif si vide
//    if (empty($users->confirm_password)) {
//        // J'affiche l'erreur
//        $errorArray['confirm_password'] = 'Veuillez saisir un mot de passe';
//    }
//    if ($users->password !== $users->confirm_password) {
//        // J'affiche l'erreur
//        $errorArray['confirm_password'] = 'Mot de passe différents';
//    }
//}
//
//on vérifie que nous avons crée une entrée submit dans l'array $_POST, si présent on éxécute la méthide addPatient()
if (count($errorArray) == 0 && isset($_POST['addButton'])) {
    if (!$users->addUser()) {
        $errorArray['add'] = 'l\'envoie du formulaire à échoué';
    } else {
        $addSuccess = true;
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <title>Testouilles</title>
        <link rel="shortcut icon" href="./assets/img/doigt.png"/>
        <meta name="author" content="Badik76" />
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" />
        <link href="https://fonts.googleapis.com/css?family=Thasadith" rel="stylesheet">
        <!-- Import personnal stylesheet -->
        <link type="text/css" rel="stylesheet" href="assets/import/Materialize/css/materialize.min.css"  media="screen" />
        <!-- Import personnal stylesheet -->
        <link type="text/css" rel="stylesheet" href="./assets/css/style.css" />
        <!--Let browser know website is optimized for mobile-->
    </head>
    <body>
        <div class="container">
            <div class="card-panel">
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
                    <form id="addUser" action="/projet-pro/index2.php" method="POST">
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
        <script src="assets/import/SweetAlert/sweetalert.min.js"></script>
        <script src="assets/js/script.js"></script>       
    </body>
</html>