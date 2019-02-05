
<!--controller login-->
<?php
require_once '../models/database.php';
require_once '../models/users.php';

// On instancie un nouvel $users objet comme classe patients
$users = new users();

//déclaration des regexs   
$regexEmail = '/^[^\W][a-zA-Z0-9_]+(\.[a-zA-Z0-9_]+)*\@[a-zA-Z0-9_]+(\.[a-zA-Z0-9_]+)*\.[a-zA-Z]{2,6}$/'; // regex date au format yyyy-mm-dd
$regexPassword = "/^.{6,}+$/";

// créa tableau pour error
$errorArray = [];

//Initialise $logSuccess en False pour afficher la connexion de l'user
$logSuccess = false;


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


if (count($errorArray) == 0 && isset($_POST['logButton'])) {
    if (!$users->logUser()) {
        $errorArray['add'] = 'La connexion à échoué';
    } else {
        $logSuccess = true;
    }
}
?>
