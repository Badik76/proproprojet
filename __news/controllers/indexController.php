
<!--controller register-->
<?php
require_once 'models/database.php';
require_once 'models/prestations.php';
require_once 'models/daterdv.php';

// On instancie un nouvel $prestations objet comme classe $prestations
$prestations = new prestations();
// On instancie un nouvel $prestations objet comme classe $prestations
$daterdv = new daterdv();

// On appel la methode getAppointmentsList dans l'objet $listAppointments
$listPrestations = $prestations->getPrestationsList();
// On appel la methode getAppointmentsList dans l'objet $listAppointments
$resultList = $daterdv->showRDV();


?>
