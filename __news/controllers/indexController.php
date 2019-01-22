
<!--controller register-->
<?php
require_once 'models/database.php';
require_once 'models/prestations.php';

// On instancie un nouvel $prestations objet comme classe $prestations
$prestations = new prestations();

// On appel la methode getAppointmentsList dans l'objet $listAppointments
$listPrestations = $prestations->getPrestationsList();

?>
