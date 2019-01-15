<?php

/* On crée une class resa qui hérite de la classe database via extends
 * La classe resa va nous permettre d'accéder à la table RESA
 */

class resa extends database {

    // Création d'attributs qui correspondent à chacun des champs de la table resa

    public $id;
    public $NbmReservation;
    public $id_Prestations;
    
    // on crée une methode magique __construct()
    public function __construct() {
        // On appelle le __construct() du parent via "parent::""
        parent::__construct();
    }


    public function __destruct() {
        // On appelle le destruct du parent
        parent::__destruct();
    }

}
