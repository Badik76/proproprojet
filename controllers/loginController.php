
<!--controller login-->
<?php
require_once '../models/database.php';
require_once '../models/users.php';

// On instancie un nouvel $users objet comme classe patients
$users = new octopus_users();

//déclaration des regexs   
$regexEmail = '/^[^\W][a-zA-Z0-9_]+(\.[a-zA-Z0-9_]+)*\@[a-zA-Z0-9_]+(\.[a-zA-Z0-9_]+)*\.[a-zA-Z]{2,6}$/'; // regex date au format yyyy-mm-dd
$regexPassword = "/^.{6,}+$/";

// créa tableau pour error
$errorArray = [];

//Initialise $logSuccess en False pour afficher la connexion de l'user
$logSuccess = false;


//On test la valeur email dans l'array $_POST, si elle existe via premier if
if (isset($_POST['users_email'])) {
   $users_email = htmlspecialchars($_POST['users_email']);
    // Si le post est vide
    if (empty($users_email)) {
        // J'affiche le message d'erreur
        $errorArray['users_email'] = 'Veuillez saisir votre email pour vous connecter';
    }
}



//vérification du password pour connexion session
if (count($errorArray) == 0 && isset($_POST['logButton'])) {
    $infoUser = $users->verifUser($users_email);
    var_dump($infoUser);       
   }


?>
