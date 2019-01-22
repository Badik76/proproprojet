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

    
    /**
     * On crée un methode qui retourne la liste des prestations de la table prestations
     * @return type ARRAY
     */
    public function ShowTimeRDV() {
        // On met notre requète dans la variable $query qui selectionne tous les champs de la table prestations
        $query = 'SELECT `timeRDV` FROM `TimeRDV` ORDER BY `id`';
        // On crée un objet $result qui exécute la méthode query() avec comme paramètre $query
        $result = $this->dataBase->query($query);
        // On crée un objet $resultList qui est un tableau.
        // La fonction fetchAll permet d'afficher toutes les données de la requète dans un tableau d'objet via le paramètre (PDO::FETCH_OBJ)
        $resultList = $result->fetchAll(PDO::FETCH_OBJ);
        // On retourne le resultat
        return $resultList;
    }

    public function __destruct() {
        // On appelle le destruct du parent
        parent::__destruct();
    }

}
