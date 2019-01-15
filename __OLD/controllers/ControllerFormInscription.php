<!--controller formulaire-->
<?php
$errorArray = []; // créa tableau pour error                                 
$regexlastname = "/^[a-zA-ZÄ-ÿ\- ]+$/"; //regex
$regexfirstname = "/^[a-zA-ZÄ-ÿ\- ]+$/";
$regexemail = "/^[a-z0-9.-]+@[a-z0-9.-]+\.[a-z]{2,6}$/";
$regexphone = "/^((\+)33|0)[1-9](\d{2}){4}$/";
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
    $lastname = htmlspecialchars($_POST['firstname']);
    if (!preg_match($regexfirstname, $firstname)) { //vérif regex
        $errorArray['firstname'] = swal('Seulement des lettres');
    } //puis vérif si vide
    if (empty($firstname)) {
        $errorArray['firstname'] = swal('Veuillez saisir un Prénom');
    }
}
if (isset($_POST['email'])) { // test lemail
    $lastname = htmlspecialchars($_POST['email']);
    if (!preg_match($regexemail, $email)) { //vérif regex
        $errorArray['email'] = swal('Email incorrect');
    } //puis vérif si vide
    if (empty($email)) {
        $errorArray['firstname'] = swal('Veuillez saisir un Email');
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