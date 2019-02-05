<!--controller register-->
<?php
require_once '../models/database.php';
require_once '../models/productcategory.php';
require_once '../models/products.php';

// On instancie un nouvel $productcategory objet comme classe productcategory
$productcategory = new productcategory();
// On instancie un nouvel $products objet comme classe products
$products = new products();

// j'attribue la valeur du valeur $_GET à l'attribue idProdCat de l'objet $users et l'attribue idUser de l'objet $daterdv
if (isset($_GET['id_ProductCategory'])) {
    $products->id_ProductCategory = $_GET['id_ProductCategory'];
    $productcategory->id = $_GET['id_ProductCategory'];
};

// On appel la methode showCatProd dans l'objet $showCatProd
$showCatProd = $productcategory->showCatProd();
// On appel la methode showProduct dans l'objet $showProd
$showProd = $products->showProduct();
// On appel la methode getProductByIdCat dans l'objet $findCatProd
$findProd = $products->getProductByIdCat();


?>