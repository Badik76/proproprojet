
<!--controller login-->
<?php
require_once '../models/database.php';
require_once '../models/users.php';

// On instancie un nouvel $users objet comme classe patients
$users = new users();

// j'attribue la valeur du valeur $_GET à l'attribue id de l'objet $patients et l'attribue idPatients de l'objet $appointments
if (isset($_GET['idUser'])) {
    $users->id = $_GET['idUser'];
//    $appointments->idUser = $_GET['idUser'];    
}

/* on execute la méthode getProfilById qui va hydrater les valeurs dans patients
 * elle va également nous retourner un boolean qui nous indiquera si la requête s'est bien executée
 */
$userIsFind = $users->getUsersById();

//déclaration des regexs   
$regexName = '/^[a-zA-Zàáâãäåçèéêëìíîïðòóôõöùúûüýÿ-]+$/';
$regexBirthdate = '/^(0[1-9]|([1-2][0-9])|3[01])\/(0[1-9]|1[012])\/((19|20)[0-9]{2})$/';
$regexEmail = '/^[^\W][a-zA-Z0-9_]+(\.[a-zA-Z0-9_]+)*\@[a-zA-Z0-9_]+(\.[a-zA-Z0-9_]+)*\.[a-zA-Z]{2,6}$/'; // regex date au format yyyy-mm-dd
$regexPhoneNumber = '/^[0-9]{10,10}$/';
$regexPassword = "/^.{6,}+$/";

// créa tableau pour error
$errorArray = [];

//Initialise $addSuccess en False pour afficher message
$addSuccess = false;
//Initialise $HadAppointments en False pour afficher message
$noRDV = false;
/* on crée un variable $deleteOk qu'on initialise à false
 * cette variable va nous permettre d'afficher un message lors de la suppression d'un patient
 */
$deleteOk = false;

/* on test que $_GET['deleteThis'] n'est pas vide
 * si non vide, on attribue à $patients id la valeur du get avec un htmlspecialchars pour la protection
 * et on applique la methode deletePatientAndAppointmentsById pour effacer le patient
 */
if (!empty($_GET['deleteThis'])) {
    $users->id = htmlspecialchars($_GET['deleteThis']);
    $users->deleteUser();
    $deleteOk = true;
}
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

//On test la valeur birthdate dans l'array $_POST, si elle existe via premier if
if (isset($_POST['birthdate'])) {
    // Variable birthdate qui vérifie que les caractères speciaux soit converties en entité html via htmlspecialchars = protection
    $users->birthdate = $_POST['birthdate'];
    // On test que la variable n'est pas égale à la regeX
    if (!preg_match($regexBirthdate, $users->birthdate)) {
        // J'affiche l'erreur
        $errorArray['birthdate'] = 'Votre date de naissance doit être de type 30/10/1985';
    }
}

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
//on vérifie que nous avons crée une entrée submit dans l'array $_POST, si présent on éxécute la méthide updateUserById()

if (count($errorArray) == 0 && isset($_POST['updateButton'])) {
//    $date = DateTime::createFromFormat('d/m/Y', $_POST['birthdate']);
//    $dateUs = $date->format('Y-m-d');
//    $users->date = $dateUS. ' ' . $_POST['birthdate'];
    if (!$users->updateUserById()) {
        $errorArray['update'] = 'La mise à jour à échoué';
    } else {
        $addSuccess = true;
    }
}

////on compte l'array $appointmentsList pour savoir s'il est vide, si vide on donne la valeur true à $NoAppointment
//if (count($appointmentsList) == 0){
//    $noAppointments = true;
//}
?>