<!--controller formulaire-->
<?php
$errorArray = []; // créa tableau pour error                                 
$regexlastname = "/^[a-zA-ZÄ-ÿ\- ]+$/"; //regex
$regexfirstname = "/^[a-zA-ZÄ-ÿ\- ]+$/";
$regexemail = "/^[a-z0-9.-]+@[a-z0-9.-]+\.[a-z]{2,6}+$/";
$regexphone = "/^((\+)33|0)[1-9](\d{2}){4}+$/";
$regexpassword = "/^.{6,}+$/";


if (isset($_POST['lastname'])) { // test le lastname
    $lastname = htmlspecialchars($_POST['lastname']);
    if (!preg_match($regexlastname, $lastname)) { //vérif regex
        $errorArray['lastname'] = swal('Seulement des lettres');
    } //puis vérif si vide
    if (empty($lastname)) {
        $errorArray['lastname'] = swal('Veuillez saisir un Nom');
    }
}

if (isset($_POST['firstname'])) { // test le firstname
    $firstname = htmlspecialchars($_POST['firstname']);
    if (!preg_match($regexfirstname, $firstname)) { //vérif regex
        $errorArray['firstname'] = swal('Seulement des lettres');
    } //puis vérif si vide
    if (empty($firstname)) {
        $errorArray['firstname'] = swal('Veuillez saisir un Prénom');
    }
}
if (isset($_POST['email'])) { // test lemail
    $email = htmlspecialchars($_POST['email']);
    if (!preg_match($regexemail, $email)) { //vérif regex
        $errorArray['email'] = swal('Email incorrect');
    } //puis vérif si vide
    if (empty($email)) {
        $errorArray['email'] = swal('Veuillez saisir un Email');
    }
}

if (isset($_POST['phone'])) { // test le phone
    $phone = htmlspecialchars($_POST['phone']);
    if (!preg_match($regexphone, $phone)) { //vérif regex
        $errorArray['phone'] = swal('Téléphone incorrect');
    } //puis vérif si vide
    if (empty($phone)) {
        $errorArray['phone'] = swal('Veuillez saisir un numéro de Téléphone');
    }
}

if (isset($_POST['password'])) { // test le psw
    $password = htmlspecialchars($_POST['password']);
    if (!preg_match($regexpassword, $password)) { //vérif regex
        $errorArray['password'] = swal('Mot de passe à 6 caractères minimum');
    } //puis vérif si vide
    if (empty($password)) {
        $errorArray['password'] = swal('Veuillez saisir un mot de passe');
    }
}
if (isset($_POST['confirm_password'])) { // test le pwr-confirm
    $confirm_password = htmlspecialchars($_POST['confirm_password']);
    if (!preg_match($regexpassword, $confirm_password)) { //vérif regex
        $errorArray['confirm_password'] = swal('Mot de passe à 6 caractères minimum');
    } //puis vérif si vide
    if (empty($confirm_password)) {
        $errorArray['confirm_password'] = swal('Veuillez saisir un mot de passe');
    }
    if ($password !== $confirm_password) {
        $errorArray['confirm_password'] = swal('Mot de passe différents');
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
        <link type="text/css" rel="stylesheet" href="./assets/css/style.css" />
        <!--Let browser know website is optimized for mobile-->
    </head>
    <body>
        <form id="inscription" method="post" action="user.php">
            <fieldset>
                <legend class="black-text">Inscription</legend>
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
                    <label for="email">Email : </label>
                    <input name="email" type="email" id="email" required class="validate" value="<?= isset($_POST['email']) ? $email : ''; ?>" />
                    <div>
                        <span class="error"><?= isset($errorArray['email']) ? $errorArray['email'] : ''; ?></span>
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
                    <label for="password">Mot de Passe : </label>
                    <input name="password" type="password" id="password" required class="validate" value="<?= isset($_POST['password']) ? $password : ''; ?>" />
                    <div>
                        <span class="error"><?= isset($errorArray['password']) ? $errorArray['password'] : ''; ?></span>
                    </div>  
                    <label for="confirm_password">Confirmer Mot de Passe : </label>
                    <input name="confirm_password" type="password" id="confirm_password" required class="validate" value="<?= isset($_POST['confirm_password']) ? $confirm_password : ''; ?>" />
                    <div>
                        <span class="error"><?= isset($errorArray['confirm_password']) ? $errorArray['confirm_password'] : ''; ?></span>
                    </div>                        
                </div>
                <div class="modal-footer">
                    <input type="submit" class="btn " name="butSendForm" /> <!--ng disabled permet de cacher le bouton si champ pas rempli-->
                </div>
            </fieldset>
        </form>
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