<?php

/* On crée une class users qui hérite de la classe database via extends
 * La classe users va nous permettre d'accéder à la table users
 */

class users extends database {

    // Création d'attributs qui correspondent à chacun des champs de la table users

    public $id;
    public $lastname;
    public $firstname;
    public $phone;
    public $email;
    public $password;
    public $adress;
    public $birthdate;
    public $id_TypeUsers;

    // on crée une methode magique __construct()
    public function __construct() {
        // On appelle le __construct() du parent via "parent::""
        parent::__construct();
    }

    /**
     * On crée une methode qui insert un user dans la table users
     * @return type EXECUTE
     */
    public function addUser() {
        // Insertion des données du patient à l'aide d'une requête préparée avec un INSERT INTO et le nom des champs de la table
        // Insertion des valeurs des variables via les marqueurs nominatifs, ex :lastname).
        $query = 'INSERT INTO `USERS` (`lastname`, `firstname`, `phone`, `email`, `password`) VALUES (:lastname, :firstname, :phone, :email, :password)';
        $addUser = $this->dataBase->prepare($query);
        // on attribue les valeurs via bindValue et on recupère les attributs de la classe via $this
        $addUser->bindValue(':lastname', $this->lastname, PDO::PARAM_STR);
        $addUser->bindValue(':firstname', $this->firstname, PDO::PARAM_STR);
        $addUser->bindValue(':phone', $this->phone, PDO::PARAM_STR);
        $addUser->bindValue(':email', $this->email, PDO::PARAM_STR);
        $addUser->bindValue(':password', $this->password, PDO::PARAM_STR);
//        $date = DateTime::createFromFormat('d/m/Y', $this->birthdate);
//        $dateUs = $date->format('Y-m-d');
//        $addUser->bindValue(':birthdate', $dateUs, PDO::PARAM_STR);
        // on utilise la méthode execute() via un return
        return $addUser->execute();
    }

    /**
     * On crée un methode qui retourne la liste des users de la table users
     * @return type ARRAY
     */
    public function getUsersList() {
        // On met notre requète dans la variable $query qui selectionne tous les champs de la table users
        $query = 'SELECT `id`, `lastname`, `firstname`, `phone`, `email`, `id_TypeUsers` FROM `USERS` ORDER BY `lastname`';
        // On crée un objet $result qui exécute la méthode query() avec comme paramètre $query
        $result = $this->dataBase->query($query);
        // On crée un objet $resultList qui est un tableau.
        // La fonction fetchAll permet d'afficher toutes les données de la requète dans un tableau d'objet via le paramètre (PDO::FETCH_OBJ)
        $resultList = $result->fetchAll(PDO::FETCH_OBJ);
        // On retourne le resultat
        return $resultList;
    }

    /**
     * On crée un methode qui retourne un tableau qui contient les informations d'un user selon l'id de la table users
     * @return BOOLEAN
     */
    public function getUsersById() {
        $isCorrect = false;
        // On met notre requète dans la variable $query qui selectionne tous les champs de la table users l'id est egal à :id via marqueur nominatif sur id
        $query = 'SELECT `id`, `lastname`, `firstname`, DATE_FORMAT(`birthdate`, "%d/%m/%Y") AS `birthdate`, `phone`, `email`, `adress`, `id_TypeUsers` FROM `USERS` WHERE `id` = :idUser';
        // On crée un objet $findProfil qui utilise la fonction prepare avec comme paramètre $query        
        $findProfil = $this->dataBase->prepare($query);
        // on attribue la valeur via bindValue et on recupère les attributs de la classe via $this
        $findProfil->bindValue(':idUser', $this->id, PDO::PARAM_INT);
        if ($findProfil->execute()) {
            $profil = $findProfil->fetch(PDO::FETCH_OBJ);
            // if imbriqué pour hydrater les valeurs
            // si $profil est un objet(existe dans la table), on attribue directement les valeurs de l'objet $profil
            if (is_object($profil)) {
                $this->lastname = $profil->lastname;
                $this->firstname = $profil->firstname;
                $this->birthdate = $profil->birthdate;
                $this->phone = $profil->phone;
                $this->email = $profil->email;
                $this->adress = $profil->adress;
                $this->id_TypeUsers = $profil->id_TypeUsers;
                $isCorrect = true;
            }
        }
        return $isCorrect;
    }

    /**
     * On crée un methode met à jour les informations d'un user selon l'id de la table users
     * @return BOOLEAN
     */
    public function updateUserById() {
        // MAJ des données de user à l'aide d'une requête préparée avec un UPDATE et le nom des champs de la table
        // Insertion des valeurs des variables via les marqueurs nominatifs, ex :lastname).
        $query = 'UPDATE `USERS` SET `lastname` = :lastname, `firstname` = :firstname, `phone` = :phone, `email` = :email, `birthdate` = :birthdate, `adress` = :adress WHERE `id` = :idUser';
        $updateUser = $this->dataBase->prepare($query);
        // on attribue les valeurs via bindValue et on recupère les attributs de la classe via $this
        $updateUser->bindValue(':lastname', $this->lastname, PDO::PARAM_STR);
        $updateUser->bindValue(':firstname', $this->firstname, PDO::PARAM_STR);
        $updateUser->bindValue(':phone', $this->phone, PDO::PARAM_STR);
        $updateUser->bindValue(':email', $this->email, PDO::PARAM_STR);
        $date = DateTime::createFromFormat('d/m/Y', $this->birthdate);
        $dateUs = $date->format('Y-m-d');
        $updateUser->bindValue(':birthdate', $dateUs, PDO::PARAM_STR);
        $updateUser->bindValue(':adress', $this->adress, PDO::PARAM_STR);
        $updateUser->bindValue(':idUser', $this->id, PDO::PARAM_INT);
        // on utilise la méthode execute() via un return
        return $updateUser->execute();
    }

    /**
     * On crée un methode qui supprime une ligne de la table ainsi que les lignes de la table appointments associée
     * Contrôle de la QUERY via un commit et rollback
     * @return EXECUTE QUERY
     */
    public function deleteUser() {
        // on met en place les attributs du PDO $dataBase avec ATTR_ERRMODE et ERRMODE_EXCEPTION pour genérer des message en cas d'erreur
        $this->dataBase->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        try {
            $this->dataBase->beginTransaction();
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

    /**
     * On crée un methode qui va effectuer une recherche de users dans la table users
     * @return ARRAY
     */
    public function findUsersBySearch($search) {
        // On met notre requète dans la variable $query qui selectionne tous les champs de la table users
        // On utilise un LIKE qui nous permettra d'afficher la liste selon un critère non précis
        $query = 'SELECT `id`, `lastname`, `firstname`, DATE_FORMAT(`birthdate`, "%d/%m/%Y") AS `birthdate`, `phone`, `adress`, `email`, `id_TypeUsers` FROM `USERS` WHERE `lastname` LIKE :search ORDER BY `lastname`';
        // On crée un objet $result qui exécute la méthode query() avec comme paramètre $query
        $result = $this->dataBase->prepare($query);
        // nous attribuons au marqueur nominatif search la valeur de $search
        $result->bindValue(':search', '%' . $search . '%', PDO::PARAM_STR);
        $result->execute();
        // On crée un objet $resultList qui est un tableau.
        // La fonction fetchAll permet d'afficher toutes les données de la requète dans un tableau d'objet via le paramètre (PDO::FETCH_OBJ)
        $resultList = $result->fetchAll(PDO::FETCH_OBJ);
        // On retourne le resultat
        return $resultList;
    }

    /**
     * On crée un methode qui va effectuer une recherche d'users dans la table users selon un début et une limite
     * @return ARRAY
     */
    // Création d'une function GetSomeUsers avec 2 paramètres de fonction $debut et $limit
    public function GetSomeUsers($start, $limit) {
        // On met notre requète dans la variable $query qui selectionne tous les champs de la table users
        // On utilise LIMIT et OFFSET qui nous permettra d'afficher la liste via une pagination
        $query = 'SELECT `id`, `lastname`, `firstname`, DATE_FORMAT(`birthdate`, "%d/%m/%Y") AS `birthdate`, `phone`, `adress`, `email`, `id_TypeUsers` FROM `USERS` ORDER BY `lastname` LIMIT :limit OFFSET :start';
        // On crée un objet $result qui exécute la méthode query() avec comme paramètre $query
        $result = $this->dataBase->prepare($query);
        // nous attribuons au marqueur nominatif limit et start leurs valeurs respectifs via les paramètres de fonction
        $result->bindValue(':start', $start, PDO::PARAM_INT);
        $result->bindValue(':limit', $limit, PDO::PARAM_INT);
        $result->execute();
        // On crée un objet $resultList qui est un tableau.
        // La fonction fetchAll permet d'afficher toutes les données de la requète dans un tableau d'objet via le paramètre (PDO::FETCH_OBJ)
        $resultList = $result->fetchAll(PDO::FETCH_OBJ);
        // On retourne le resultat
        return $resultList;
    }

    /**
     * On crée un methode qui va calculer le nombre de ligne de la table users
     * @return ARRAY contenant la valeur du nombre de ligne dans le champ totalRows
     */
    public function GetNumberTotalRows() {
        // on crée un requête pour calculer le nombre total de ligne de la table users
        $query = 'SELECT COUNT(`id`) AS `totalRows` FROM `USERS`';
        $totalRows = $this->dataBase->query($query);
        $result = $totalRows->fetch(PDO::FETCH_OBJ);
        return $result;
    }

    public function putUserSuperUser() {
        // Insertion des données du patient à l'aide d'une requête préparée avec un INSERT INTO et le nom des champs de la table
        // Insertion des valeurs des variables via les marqueurs nominatifs, ex :lastname).
        $query = 'UPDATE `USERS` SET `id_TypeUsers` = 2 WHERE `id`=:id';
        $putUserSuperUser = $this->dataBase->prepare($query);
        // on attribue les valeurs via bindValue et on recupère les attributs de la classe via $this
        $putUserSuperUser->bindValue(':id', $this->id, PDO::PARAM_INT);
        // on utilise la méthode execute() via un return
        return $putUserSuperUser->execute();
    }

    public function delSuperUser() {
        // Insertion des données du patient à l'aide d'une requête préparée avec un INSERT INTO et le nom des champs de la table
        // Insertion des valeurs des variables via les marqueurs nominatifs, ex :lastname).
        $query = 'UPDATE `USERS` SET `id_TypeUsers` = 3 WHERE `id`=:id';
        $putUserSuperUser = $this->dataBase->prepare($query);
        // on attribue les valeurs via bindValue et on recupère les attributs de la classe via $this
        $putUserSuperUser->bindValue(':id', $this->id, PDO::PARAM_INT);
        // on utilise la méthode execute() via un return
        return $putUserSuperUser->execute();
    }

    public function __destruct() {
        // On appelle le destruct du parent
        parent::__destruct();
    }

}
