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
        // Insertion des données du rdv à l'aide d'une requête préparée avec un INSERT INTO et le nom des champs de la table 
        // Insertion des valeurs des variables via les marqueurs nominatifs, ex :dateRDV).
        $query = 'INSERT INTO `USERS` (`dateRDV`, `id_USERS`, `id_Prestations`, `id_TimeRDV`, `id_RESA`) VALUES (:dateRDV, :id_USERS, :id_Prestations, :id_TimeRDV, :id_RESA)';
        $addRDV = $this->dataBase->prepare($query);
        // on attribue les valeurs via bindValue et on recupère les attributs de la classe via $this
        $addRDV->bindValue(':dateRDV', $this->dateRDV, PDO::PARAM_STR);
        $addRDV->bindValue(':id_USERS', $this->id_USERS, PDO::PARAM_STR);
        $addRDV->bindValue(':id_Prestations', $this->id_Prestations, PDO::PARAM_STR);
        $addRDV->bindValue(':id_TimeRDV', $this->mail, PDO::PARAM_STR);
        $addRDV->bindValue(':id_RESA', $this->mail, PDO::PARAM_BOOL);
        // on utilise la méthode execute() via un return
        return $addRDV->execute();
    }

    /**
     * On crée un methode qui retourne la liste des rdv de la table daterdv
     * @return type ARRAY
     */
    public function showRDV() {
        // On met notre requète dans la variable $query qui selectionne tous les champs de la table Produits
        $query = 'SELECT `USERS`.`lastname`, `USERS`.`firstname`, `USERS`.`phone`, `DateRDV`.`dateRDV`,`TimeRDV`.`timeRDV` FROM `DateRDV` INNER JOIN `USERS` ON `DateRDV`.`id_USERS` = `USERS`.`id` INNER JOIN `Prestations` ON `DateRDV`.`id_Prestations` = `Prestations`.`id` INNER JOIN `TimeRDV` ON `DateRDV`.`id_TimeRDV` = `TimeRDV`.`id` INNER JOIN `RESA` ON `DateRDV`.`id_Resa` = `RESA`.`id` ORDER BY `DateRDV`.`id_Prestations`';
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
