
<!--controller register-->
<?php
require_once 'models/database.php';
require_once 'models/users.php';

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
