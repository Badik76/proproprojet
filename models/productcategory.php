<?php

/* On crée une class productcategory qui hérite de la classe database via extends
 * La classe productcategory va nous permettre d'accéder à la table productcategory
 */

class productcategory extends database {

    // Création d'attributs qui correspondent à chacun des champs de la table productcategory
    // (et on les initialise par rapport à leurs types.)
    public $productCategory_id;
    public $productCategory_name;

    // on crée une methode magique __construct()
    public function __construct() {
        // On appelle le __construct() du parent via "parent::""
        parent::__construct();
    }

    /**
     * On crée une methode qui insert une category dans la table productcategory
     * @return type EXECUTE
     */
    public function addCatProd() {
        // Insertion des données du patient à l'aide d'une requête préparée avec un INSERT INTO et le nom des champs de la table
        // Insertion des valeurs des variables via les marqueurs nominatifs, ex :lastname).
        $query = 'INSERT INTO `octopus_productCategory` (`productCategory_name`)'
                . 'VALUES (:productCategory_name)';
        $addCatProd = $this->dataBase->prepare($query);
        // on attribue les valeurs via bindValue et on recupère les attributs de la classe via $this
        $addCatProd->bindValue(':productCategory_name', $this->productCategory_name, PDO::PARAM_STR);
        return $addCatProd->execute();
    }
    
    /* Création d'une fonction showCatProd pour afficher les données de la table ProductCategory
     * @return type ARRAY
     */

    public function showCatProd() {
        // On met notre requète dans la variable $query qui selectionne tous les champs de la table users
        $query = 'SELECT `productCategory_id`, `productCategory_name`'
                . 'FROM `octopus_productCategory`';
        // On crée un objet $result qui exécute la méthode query() avec comme paramètre $query
        $result = $this->dataBase->query($query);
         // On crée un objet $resultList qui est un tableau.
        // La fonction fetchAll permet d'afficher toutes les données de la requète dans un tableau d'objet via le paramètre (PDO::FETCH_OBJ)
        $showCatProd = $result->fetchAll(PDO::FETCH_OBJ);
        // On retourne le resultat
        return $showCatProd;
    }

     public function updateCatProd() {
        // MAJ des données de user à l'aide d'une requête préparée avec un UPDATE et le nom des champs de la table
        // Insertion des valeurs des variables via les marqueurs nominatifs, ex :lastname).
        $query = 'UPDATE `octopus_productCategory`'
                . 'SET `productCategory_name` = :productCategory_name'
                . 'WHERE `productCategory_id`=:productCategory_id';
        $updateCatProd = $this->dataBase->prepare($query);
        // on attribue les valeurs via bindValue et on recupère les attributs de la classe via $this
        $updateCatProd->bindValue(':productCategory_id', $this->productCategory_id, PDO::PARAM_INT);
        $updateCatProd->bindValue(':productCategory_name', $this->productCategory_name, PDO::PARAM_STR);
                // on utilise la méthode execute() via un return
        return $updateCatProd->execute();
    }
    
        public function deleteCatProd() {
        // on met en place les attributs du PDO $dataBase avec ATTR_ERRMODE et ERRMODE_EXCEPTION pour genérer des message en cas d'erreur
        $this->dataBase->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        try {
            $this->dataBase->beginTransaction();
            // On crée notre requête pour effacer le user
            $deleteCatProdQuery = 'DELETE FROM `octopus_productCategory` WHERE `productCategory_id` = :productCategory_id';
            // on prépare la requete avec un marqueur nominatif qui récuperera la valeur de l'id  
            $deleteCatProd = $this->dataBase->prepare($deleteCatProdQuery);
            $deleteCatProd->bindValue(':productCategory_id', $this->productCategory_id, PDO::PARAM_INT);
            // on execute la requete pour effacer le user
            $deleteCatProd->execute();
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
