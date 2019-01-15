<?php

/* On crée une class timerdv qui hérite de la classe database via extends
 * La classe timerdv va nous permettre d'accéder à la table TimeRDV
 */

class timerdv extends database {

    // Création d'attributs qui correspondent à chacun des champs de la table TimeRDV

    public $id;
    public $timeRDV;
    
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
