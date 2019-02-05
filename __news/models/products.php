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

    /**
     * On crée une methode qui insert un products dans la table products
     * @return type EXECUTE
     */
    public function addProduct() {
        // Insertion des données du produit à l'aide d'une requête préparée avec un INSERT INTO et le nom des champs de la table
        // Insertion des valeurs des variables via les marqueurs nominatifs, ex :name).
        $query = 'INSERT INTO `Products` (`name`, `image`, `description`, `id_ProductCategory`) VALUES (:name, :image, :description, :id_ProductCategory)';
        $addProduct = $this->dataBase->prepare($query);
        // on attribue les valeurs via bindValue et on recupère les attributs de la classe via $this
        $addProduct->bindValue(':name', $this->name, PDO::PARAM_STR);
        $addProduct->bindValue(':image', $this->image, PDO::PARAM_STR);
        $addProduct->bindValue(':description', $this->description, PDO::PARAM_STR);
        $addProduct->bindValue(':id_ProductCategory', $this->id_ProductCategory, PDO::PARAM_INT);
        // on utilise la méthode execute() via un return
        return $addProduct->execute();
    }

    /**
     * On crée un methode qui retourne la liste des produits de la table Produits
     * @return type ARRAY
     */
    public function showProduct() {
        // On met notre requète dans la variable $query qui selectionne tous les champs de la table Produits
        $query = 'SELECT `id`, `name`, `image`, `description`, `id_ProductCategory` FROM `Products` ORDER BY `id_ProductCategory`';
        // On crée un objet $result qui exécute la méthode query() avec comme paramètre $query
        $result = $this->dataBase->query($query);
        // On crée un objet $resultList qui est un tableau.
        // La fonction fetchAll permet d'afficher toutes les données de la requète dans un tableau d'objet via le paramètre (PDO::FETCH_OBJ)
        $resultList = $result->fetchAll(PDO::FETCH_OBJ);
        // On retourne le resultat
        return $resultList;
    }

    /**
     * On crée un methode qui retourne un tableau qui contient les informations d'un produit selon l'id_ProductCategory de la table products
     * @return BOOLEAN
     */
    public function getProductByIdCat() {
        
        // On met notre requète dans la variable $query qui selectionne tous les champs de la table users l'id est egal à :id via marqueur nominatif sur id
        $query = 'SELECT `id`, `name`, `image`, `description`, `id_ProductCategory` FROM `Products` WHERE `id_ProductCategory` = :id_ProductCategory  ORDER BY `id_ProductCategory`';
        // On crée un objet $findProfil qui utilise la fonction prepare avec comme paramètre $query        
        $findProduct = $this->dataBase->prepare($query);
        // on attribue la valeur via bindValue et on recupère les attributs de la classe via $this
        $findProduct->bindValue(':id_ProductCategory', $this->id_ProductCategory, PDO::PARAM_INT);
        $findProduct->execute();
        $products = $findProduct->fetchAll(PDO::FETCH_OBJ);
        return $products;         
    }

    public function updateProd() {
        // MAJ des données de user à l'aide d'une requête préparée avec un UPDATE et le nom des champs de la table
        // Insertion des valeurs des variables via les marqueurs nominatifs, ex :name).
        $query = 'UPDATE `Products` SET `name`=:name, `image`=:image, `description`=:description, `id_ProductCategory`= :id_ProductCategory  WHERE `id`= :idProd';
        $updateProd = $this->dataBase->prepare($query);
        // on attribue les valeurs via bindValue et on recupère les attributs de la classe via $this
        $updateProd->bindValue(':idProd', $this->id, PDO::PARAM_INT);
        $updateProd->bindValue(':name', $this->name, PDO::PARAM_STR);
        $updateProd->bindValue(':image', $this->image, PDO::PARAM_STR);
        $updateProd->bindValue(':description', $this->description, PDO::PARAM_STR);
        $updateProd->bindValue(':id_ProductCategory', $this->id_ProductCategory, PDO::PARAM_STR);
        // on utilise la méthode execute() via un return
        return $updateProd->execute();
    }

    public function deleteProd() {
        // on met en place les attributs du PDO $dataBase avec ATTR_ERRMODE et ERRMODE_EXCEPTION pour genérer des message en cas d'erreur
        $this->dataBase->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        try {
            $this->dataBase->beginTransaction();
            // On crée notre requête pour effacer le produit
            $deleteProdQuery = 'DELETE FROM `Products` WHERE `id` = :id';
            // on prépare la requete avec un marqueur nominatif qui récuperera la valeur de l'id  
            $deleteProd = $this->dataBase->prepare($deleteProdQuery);
            $deleteProd->bindValue(':id', $this->id, PDO::PARAM_INT);
            // on execute la requete pour effacer le produits
            $deleteProd->execute();
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
