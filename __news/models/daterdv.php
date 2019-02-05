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
        $query = 'INSERT INTO `DateRDV` ( `dateRDV`, `id_USERS`, `id_Prestations`, `id_TimeRDV`) VALUES (:dateRDV, :id_USERS, :id_Prestations, :id_TimeRDV)';
        $addRDV = $this->dataBase->prepare($query);
//        $date = DateTime::createFromFormat('d/m/Y', $this->dateRDV);
//        $dateUs = $date->format('Y-m-d');
        $addRDV->bindValue(':dateRDV', $this->dateRDV, PDO::PARAM_STR);
        $addRDV->bindValue(':id_USERS', $this->id_USERS, PDO::PARAM_STR);
        $addRDV->bindValue(':id_Prestations', $this->id_Prestations, PDO::PARAM_STR);
        $addRDV->bindValue(':id_TimeRDV', $this->id_TimeRDV, PDO::PARAM_STR);
        // on utilise la méthode execute() via un return
        return $addRDV->execute();
    }

    /**
     * On crée un methode qui retourne la liste des rdv de la table daterdv
     * @return type ARRAY -> WARNING -> is_object ?
     */
    public function showRDV() {
        // On met notre requète dans la variable $query qui selectionne tous les champs de la table Produits
        $query = 'SELECT `DateRDV`.`id`, `DateRDV`.`id_Prestations`,`DateRDV`.`id_USERS`, `USERS`.`lastname`, `USERS`.`firstname`, `USERS`.`phone`, `DateRDV`.`dateRDV`,`TimeRDV`.`timeRDV`, `Prestations`.`id`, `Prestations`.`Prestaname` '
                . 'FROM `DateRDV` '
                . 'INNER JOIN `USERS` ON `DateRDV`.`id_USERS` = `USERS`.`id` '
                . 'INNER JOIN `Prestations` ON `DateRDV`.`id_Prestations` = `Prestations`.`id` '
                . 'INNER JOIN `TimeRDV` ON `DateRDV`.`id_TimeRDV` = `TimeRDV`.`id` '
                . 'WHERE `DateRDV`.`id_Prestations` = `Prestations`.`id` '
                . 'ORDER BY `DateRDV`.`id_Prestations`';
        // On crée un objet $result qui exécute la méthode query() avec comme paramètre $query
        $showresult = $this->dataBase->query($query);
        // On crée un objet $resultList qui est un tableau.
        // La fonction fetchAll permet d'afficher toutes les données de la requète dans un tableau d'objet via le paramètre (PDO::FETCH_OBJ)
        $resultList = $showresult->fetchAll(PDO::FETCH_OBJ);
        // On retourne le resultat
        return $resultList;
    }

    /**
     * On crée un methode qui retourne un tableau qui contient les informations d'un rdv selon l'idPresta de la table daterdv
     * @return BOOLEAN
     */
    public function getRDVByidUser() {
        // On met notre requète dans la variable $query qui selectionne tous les champs de la table users l'id est egal à :id via marqueur nominatif sur id
        $query = 'SELECT `DateRDV`.`id`, `DateRDV`.`id_USERS`,`DateRDV`.`id_TimeRDV`, `DateRDV`.`id_Prestations`, DATE_FORMAT(`DateRDV`.`dateRDV`, "%d/%m/%Y") AS `dateRDV`,`TimeRDV`.`timeRDV`, `Prestations`.`Prestaname` '
                . 'FROM `DateRDV` '
                . 'INNER JOIN `USERS` ON `DateRDV`.`id_USERS` = `USERS`.`id` '
                . 'INNER JOIN `Prestations` ON `DateRDV`.`id_Prestations` = `Prestations`.`id` '
                . 'INNER JOIN `TimeRDV` ON `DateRDV`.`id_TimeRDV` = `TimeRDV`.`id` '
                . 'WHERE `id_USERS` = :idUser AND `DateRDV`.`dateRDV` > NOW()';
        // On crée un objet $findProfil qui utilise la fonction prepare avec comme paramètre $query        
        $result = $this->dataBase->prepare($query);
        // on attribue la valeur via bindValue et on recupère les attributs de la classe via $this
        $result->bindValue(':idUser', $this->id_USERS, PDO::PARAM_INT);
        $result->execute();
        // On crée un objet $resultList qui est un tableau.
        // La fonction fetchAll permet d'afficher toutes les données de la requète dans un tableau d'objet via le paramètre (PDO::FETCH_OBJ)
        $resultList = $result->fetchAll(PDO::FETCH_OBJ);
        return $resultList;
    }

    public function getRDVByid() {
        $rdvFind = false;
        // On met notre requète dans la variable $query qui selectionne tous les champs de la table users l'id est egal à :id via marqueur nominatif sur id
        $query = 'SELECT `DateRDV`.`id`, `DateRDV`.`id_USERS`,`DateRDV`.`id_TimeRDV`, `DateRDV`.`id_Prestations`, DATE_FORMAT(`DateRDV`.`dateRDV`, "%d/%m/%Y") AS `dateRDV`,`TimeRDV`.`timeRDV`, `Prestations`.`Prestaname` '
                . 'FROM `DateRDV` '
                . 'INNER JOIN `USERS` ON `DateRDV`.`id_USERS` = `USERS`.`id` '
                . 'INNER JOIN `Prestations` ON `DateRDV`.`id_Prestations` = `Prestations`.`id` '
                . 'INNER JOIN `TimeRDV` ON `DateRDV`.`id_TimeRDV` = `TimeRDV`.`id` '
                . 'WHERE id_USERS = :idUser';
        // On crée un objet $findProfil qui utilise la fonction prepare avec comme paramètre $query        
        $result = $this->dataBase->prepare($query);
        $result->bindValue(':idUser', $this->id_USERS, PDO::PARAM_INT);
        if ($result->execute()) {
            $profil = $result->fetch(PDO::FETCH_OBJ);
            // if imbriqué pour hydrater les valeurs
            // si $profil est un objet(existe dans la table), on attribue directement les valeurs de l'objet $profil
            if (is_object($profil)) {
                $this->id_USERS = $profil->id_USERS;
                $this->id = $profil->id;
                $this->Prestaname = $profil->Prestaname;
                $this->timeRDV = $profil->timeRDV;
                $this->dateRDV = $profil->dateRDV;
                $this->id_Prestations = $profil->id_Prestations;
                $this->id_TimeRDV = $profil->id_TimeRDV;
                $rdvFind = true;
            }
        }
        return $rdvFind;
    }

    /**
     * On crée un methode qui supprime une ligne de la table ainsi que les lignes de la table appointments associée
     * Contrôle de la QUERY via un commit et rollback
     * @return EXECUTE QUERY
     */
    public function deleteRDVbyID() {
        // on met en place les attributs du PDO $dataBase avec ATTR_ERRMODE et ERRMODE_EXCEPTION pour genérer des message en cas d'erreur
        $this->dataBase->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        try {
            $this->dataBase->beginTransaction();
            // On crée notre requête pour effacer le user
            $deleteUserQuery = 'DELETE FROM `DateRDV` WHERE `id` = :id';
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

    /**
     * On crée un methode qui supprime une ligne de la table ainsi que les lignes de la table appointments associée
     * Contrôle de la QUERY via un commit et rollback
     * @return EXECUTE QUERY
     */
    public function deleteRDVbyIDUSER() {
        // on met en place les attributs du PDO $dataBase avec ATTR_ERRMODE et ERRMODE_EXCEPTION pour genérer des message en cas d'erreur
        $this->dataBase->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        try {
            $this->dataBase->beginTransaction();
            // On crée notre requête pour effacer le user
            $deleteUserQuery = 'DELETE FROM `DateRDV` WHERE `id_USERS` = :idUser';
            // on prépare la requete avec un marqueur nominatif qui récuperera la valeur de l'id  
            $deleteUser = $this->dataBase->prepare($deleteUserQuery);
            $deleteUser->bindValue(':idUser', $this->id_USERS, PDO::PARAM_INT);
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

        /*
         * Création d'une méthode qui validera le rdv.
         */
        public function putRDVvalidate() {
        // Insertion des données du patient à l'aide d'une requête préparée avec un INSERT INTO et le nom des champs de la table
        // Insertion des valeurs des variables via les marqueurs nominatifs, ex :lastname).
        $query = 'UPDATE `DateRDV` SET `validate` = 1 WHERE `id`=:id';
        $putRDVvalidate = $this->dataBase->prepare($query);
        // on attribue les valeurs via bindValue et on recupère les attributs de la classe via $this
        $putRDVvalidate->bindValue(':id', $this->id, PDO::PARAM_INT);
        // on utilise la méthode execute() via un return
        return $putRDVvalidate->execute();
    }
    
    
    public function __destruct() {
        // On appelle le destruct du parent
        parent::__destruct();
    }

}
