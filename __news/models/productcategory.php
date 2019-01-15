<?php

/* On crée une class productcategory qui hérite de la classe database via extends
 * La classe productcategory va nous permettre d'accéder à la table productcategory
 */

class productcategory extends database {

    // Création d'attributs qui correspondent à chacun des champs de la table productcategory
    // (et on les initialise par rapport à leurs types.)
    public $id;
    public $name;
    
    // on crée une methode magique __construct()
    public function __construct() {
        // On appelle le __construct() du parent via "parent::""
        parent::__construct();
    }

   /* Création d'une fonction
    * 
    */
    

    public function __destruct() {
        // On appelle le destruct du parent
        parent::__destruct();
    }

}
