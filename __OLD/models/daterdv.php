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
    
    public function addDaterdv() {
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

    /**
     * On crée un methode qui retourne la liste des users de la table users
     * @return type ARRAY
     */
    public function getDatesrdvList() {
        // On met notre requète dans la variable $query qui selectionne tous les champs de la table users
        $query = 'SELECT `id`, `lastname`, `firstname`, DATE_FORMAT(`birthdate`, "%d/%m/%Y") AS `birthdate`, `phone`, `mail` FROM `USERS` ORDER BY `lastname`';
        // On crée un objet $result qui exécute la méthode query() avec comme paramètre $query
        $result = $this->dataBase->query($query);
        // On crée un objet $resultList qui est un tableau.
        // La fonction fetchAll permet d'afficher toutes les données de la requète dans un tableau d'objet via le paramètre (PDO::FETCH_OBJ)
        $resultList = $result->fetchAll(PDO::FETCH_OBJ);
        // On retourne le resultat
        return $resultList;
    }

    
    public function deleteDatesrdv() {
        // on met en place les attributs du PDO $dataBase avec ATTR_ERRMODE et ERRMODE_EXCEPTION pour genérer des message en cas d'erreur
        $this->dataBase->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        try {
            // On démarre notre transaction sur notre PDO dataBase
            $this->dataBase->beginTransaction();
            // On crée notre requête pour effacer les rendez-vous
            $deleteAppointmentsQuery = 'DELETE FROM `DateRDV` WHERE `idUser` = :idUser';
            // on prépare la requete avec un marqueur nominatif qui récuperera la valeur de l'idUser  
            $deleteAppointments = $this->dataBase->prepare($deleteAppointmentsQuery);
            $deleteAppointments->bindValue(':idUser', $this->id, PDO::PARAM_INT);
            // on execute la requete pour effacer le ou les rendez-vous
            $deleteAppointments->execute();
            // On crée notre requête pour effacer le user
            $deleteUserQuery = 'DELETE FROM `USERS` WHERE `id` = :id';
            // on prépare la requete avec un marqueur nominatif qui récuperera la valeur de l'id  
            $deleteUser = $this->dataBase->prepare($deleteUserQuery);
            $deleteUser->bindValue(':id', $this->id, PDO::PARAM_INT);
            // on execute la requete pour effacer le user
            $deleteUser->execute();
            // si tout s'est bien déroule on valide la transaction via un commit
            $this->dataBase->commit();
        } catch (Exception $errorMessage) { // en cas d'erreur on stock le message dans $errorMessage
            // Si erreur, on annule la transaction via un rollback
            $this->dataBase->rollback();
            echo 'Erreur : ' . $errorMessage->getMessage(); // On affiche le message d'erreur avec la methode getMessage
        }
    }
    
    public function __destruct() {
        // On appelle le destruct du parent
        parent::__destruct();
    }

}
