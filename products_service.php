<?php

function getWebshopProducts() {
    $products = array();
    $genericErr = "";
    try {
         $products = getAllProducts();
    }
    catch (Exception $e) {
         $genericErr = "Sorry, kan geen producten laten zien op dit moment.";  // <-- foutmelding voor de user
         logToServer("GetAllProducts failed  " . $e -> getMessage() );
    } 
     return array("products" => $products, "genericErr" => $genericErr);
}



function getProductDetails($productId) {
    $product = NULL;
    $genericErr = "";
    try {
         $product = findProductById($productId);
    }
    catch (Exception $e) {
         $genericErr = "Sorry, kan geen details laten zien op dit moment.";  // <-- foutmelding voor de user
         logToServer("findProductById failed  " . $e -> getMessage() );
    } 
     return array("product" => $product, "genericErr" => $genericErr);

}
?>