<?php

/* On crée une class daterdv qui hérite de la classe database via extends
 * La classe daterdv va nous permettre d'accéder à la table daterdv
 */

class daterdv extends database {

    // Création d'attributs qui correspondent à chacun des champs de la table daterdv
    
    public $id;
    public $dateRDV;
    public $id_USERS;
    public $id_Prestations;
    public $id_TimeRDV;
    public $id_RESA;
    
    // on crée une methode magique __construct()
    public function __construct() {
        // On appelle le __construct() du parent via "parent::""
        parent::__construct();
    }

    /**
     * On crée une methode qui insert une date dans la table daterdv
     * @return type EXECUTE
     */
    
    public function addRDV() {
        // Insertion des données du patient à l'aide d'une requête préparée avec un INSERT INTO et le nom des champs de la table
        // Insertion des valeurs des variables via les marqueurs nominatifs, ex :lastname).
        $query = 'INSERT INTO `USERS` (`dateRDV`, `id_USERS`, `id_Prestations`, `id_TimeRDV`, `id_RESA`) VALUES (:dateRDV, :id_USERS, :id_Prestations, :id_TimeRDV, :id_RESA)';
        $addRDV = $this->dataBase->prepare($query);
        // on attribue les valeurs via bindValue et on recupère les attributs de la classe via $this
        $addRDV->bindValue(':dateRDV', $this->dateRDV, PDO::PARAM_STR);
        $addRDV->bindValue(':id_USERS', $this->id_USERS, PDO::PARAM_INT);
        $addRDV->bindValue(':id_Prestations', $this->id_Prestations, PDO::PARAM_INT);
        $addRDV->bindValue(':id_TimeRDV', $this->mail, PDO::PARAM_INT);
        $addRDV->bindValue(':id_RESA', $this->mail, PDO::PARAM_BOOL);
        // on utilise la méthode execute() via un return
        return $addUser->execute();
    }

    
    public function __destruct() {
        // On appelle le destruct du parent
        parent::__destruct();
    }

}
