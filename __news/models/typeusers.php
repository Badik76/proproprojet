<?php

/* On crée une class users qui hérite de la classe database via extends
 * La classe users va nous permettre d'accéder à la table users
 */

class typeUsers extends database {

    // Création d'attributs qui correspondent à chacun des champs de la table users
    // (et on les initialise par rapport à leurs types.)
    public $id;
    public $name;

    // on crée une methode magique __construct()
    public function __construct() {
        // On appelle le __construct() du parent via "parent::""
        parent::__construct();
    }

   
    
    public function putUserSuperUser() {
        // Insertion des données du patient à l'aide d'une requête préparée avec un INSERT INTO et le nom des champs de la table
        // Insertion des valeurs des variables via les marqueurs nominatifs, ex :lastname).
        $query = 'INSERT INTO `USERS` (`lastname`, `firstname`, `phone`, `mail`, `birthdate`) VALUES (:lastname, :firstname, :phone, :mail, :birthdate)';
        $addUser = $this->dataBase->prepare($query);
        // on attribue les valeurs via bindValue et on recupère les attributs de la classe via $this
        $addUser->bindValue(':lastname', $this->lastname, PDO::PARAM_STR);
        $addUser->bindValue(':firstname', $this->firstname, PDO::PARAM_STR);
        $addUser->bindValue(':phone', $this->phone, PDO::PARAM_STR);
        $addUser->bindValue(':mail', $this->mail, PDO::PARAM_STR);
        $date = DateTime::createFromFormat('d/m/Y', $this->birthdate);
        $dateUs = $date->format('Y-m-d');
        $addUser->bindValue(':birthdate', $dateUs, PDO::PARAM_STR);
        // on utilise la méthode execute() via un return
        return $addUser->execute();
    }

   
    public function __destruct() {
        // On appelle le destruct du parent
        parent::__destruct();
    }

}