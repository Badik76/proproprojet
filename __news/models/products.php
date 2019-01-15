<?php

/* On crée une class products qui hérite de la classe database via extends
 * La classe products va nous permettre d'accéder à la table products
 */

class products extends database {

    // Création d'attributs qui correspondent à chacun des champs de la table products

    public $id;
    public $name;
    public $image;
    public $description;
    public $id_ProductCategory;
    
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
