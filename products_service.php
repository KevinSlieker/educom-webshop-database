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

function addAction($nextpage, $productId, $name, $action, $button){
     if (isUserLoggedIn()){
          echo '<action="index.php" method="post">';
          echo '<form>';
          echo '<input type="hidden" name="action" value="' . $action . '">';
          echo '<input type="hidden" name="id" value="' . $productId . '">';
          echo '<input type="hidden" name="name" value="' . $name . '">';
          echo '<input type="hidden" name="page" value="' . $nextpage . '">';
          echo '<button>' . $button . '</button>';
          echo '</form>';
     }

}

function handleActions(){
     $action = getPostVar("action");
     switch($action) {
          case "addToShoppingcart":
               $productId = getPostVar("id");
               $quantity = getPostVar("quantity");
               addToShoppingcart($productId, $quantity);
               break;
          case "removeFromShoppingcart":
               $productId = getPostVar("id");
               removeFromShoppingcart($productId);
               break;
     }

}
?>