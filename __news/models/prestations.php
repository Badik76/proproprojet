<?php

/* On crée une class prestations qui hérite de la classe database via extends
 * La classe prestations va nous permettre d'accéder à la table prestations
 */

class prestations extends database {

    // Création d'attributs qui correspondent à chacun des champs de la table prestations
    // (et on les initialise par rapport à leurs types.)
    public $id;
    public $prestaname;
    public $descirption;
    public $image;

    // on crée une methode magique __construct()
    public function __construct() {
        // On appelle le __construct() du parent via "parent::""
        parent::__construct();
    }

    /**
     * On crée une methode qui insert une presta dans la table prestation
     * @return type EXECUTE
     */
    public function addPrestation() {
        // Insertion des données du patient à l'aide d'une requête préparée avec un INSERT INTO et le nom des champs de la table
        // Insertion des valeurs des variables via les marqueurs nominatifs, ex :lastname).
        $query = 'INSERT INTO `Prestations` (`Prestaname`, `description`, `image`) VALUES (:prestaname, :description, :image)';
        $addPrestation = $this->dataBase->prepare($query);
        // on attribue les valeurs via bindValue et on recupère les attributs de la classe via $this
        $addPrestation->bindValue(':prestaname', $this->prestaname, PDO::PARAM_STR);
        $addPrestation->bindValue(':description', $this->description, PDO::PARAM_STR);
        $addPrestation->bindValue(':image', $this->description, PDO::PARAM_STR);
        // on utilise la méthode execute() via un return
        return $addPrestation->execute();
    }

    /**
     * On crée un methode qui retourne la liste des prestations de la table prestations
     * @return type ARRAY
     */
    public function getPrestationsList() {
        // On met notre requète dans la variable $query qui selectionne tous les champs de la table prestations
        $query = 'SELECT `id`, `Prestaname`, `description`, `image` FROM `Prestations` ORDER BY `id`';
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
    public function getPrestationById() {
        $isCorrect = false;
        // On met notre requète dans la variable $query qui selectionne tous les champs de la table users l'id est egal à :id via marqueur nominatif sur id
        $query = 'SELECT `id`, `Prestaname`, `description` FROM `Prestations` WHERE `id` = :idPresta';
        // On crée un objet $findProfil qui utilise la fonction prepare avec comme paramètre $query        
        $findPresta = $this->dataBase->prepare($query);
        // on attribue la valeur via bindValue et on recupère les attributs de la classe via $this
        $findPresta->bindValue(':idPresta', $this->id, PDO::PARAM_INT);
        if ($findPresta->execute()) {
            $presta = $findPresta->fetch(PDO::FETCH_OBJ);
            // if imbriqué pour hydrater les valeurs
            // si $profil est un objet(existe dans la table), on attribue directement les valeurs de l'objet $profil
            if (is_object($presta)) {
                $this->prestaname = $presta->prestaname;
                $this->description = $presta->description;
                $isCorrect = true;
            }
        }
        return $isCorrect;
    }

    /**
     * On crée un methode met à jour les informations d'un user selon l'id de la table users
     * @return BOOLEAN
     */
    public function updatePrestationById() {
        // MAJ des données de user à l'aide d'une requête préparée avec un UPDATE et le nom des champs de la table
        // Insertion des valeurs des variables via les marqueurs nominatifs, ex :lastname).
        $query = 'UPDATE `Prestations` SET `Prestaname` = :prestaname, `description` = :description, `image` = :image WHERE `id` = :idPresta';
        $updatePresta = $this->dataBase->prepare($query);
        // on attribue les valeurs via bindValue et on recupère les attributs de la classe via $this
        $updatePresta->bindValue(':prestaname', $this->prestaname, PDO::PARAM_STR);
        $updatePresta->bindValue(':description', $this->description, PDO::PARAM_STR);
        $updatePresta->bindValue(':image', $this->image, PDO::PARAM_STR);
        // on utilise la méthode execute() via un return
        return $updatePresta->execute();
    }

    /**
     * On crée un methode qui supprime une ligne de la table ainsi que les lignes de la table appointments associée
     * Contrôle de la QUERY via un commit et rollback
     * @return EXECUTE QUERY
     */
    public function deletePrestation() {
        // on met en place les attributs du PDO $dataBase avec ATTR_ERRMODE et ERRMODE_EXCEPTION pour genérer des message en cas d'erreur
        $this->dataBase->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        try {
            // On démarre notre transaction sur notre PDO dataBase
            $this->dataBase->beginTransaction();
            // On crée notre requête pour effacer les rendez-vous
            $deletePrestaQuery = 'DELETE FROM `Prestations` WHERE `id` = :idPresta';
            // on prépare la requete avec un marqueur nominatif qui récuperera la valeur de l'idUser  
            $deletePrestation = $this->dataBase->prepare($deletePrestaQuery);
            $deletePrestation->bindValue(':idPresta', $this->id, PDO::PARAM_INT);
            // on execute la requete pour effacer le ou les rendez-vous
            $deletePrestation->execute();
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
