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

function addAction($nextpage, $productId = NULL, $name, $addquantity = FALSE, $action, $button){
     if (isUserLoggedIn()){
          echo '<form action="index.php" method="post">';
          echo '<input type="hidden" name="action" value="' . $action . '">';
          echo '<input type="hidden" name="id" value="' . $productId . '">';
          echo '<input type="hidden" name="name" value="' . $name . '">';
          echo '<input type="hidden" name="page" value="' . $nextpage . '">';
          if ($addquantity == TRUE) {
               $cart = getShoppingcart();
               $quantity = (1 + getArrayVar($cart, $productId, 0));
               echo '<input type="hidden" name="quantity" value="' . $quantity . '">';
               }
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


function getShoppingcartProducts() {
     $shoppingcartproducts = array();
     $total = 0;
     $genericErr= "";
     try {
          $shoppingcart = getShoppingcart();
          $products = getAllProducts();

          foreach ($shoppingcart as $productId => $quantity) {
               $product = getArrayVar($products, $productId, NULL);
          
          $subtotal = number_format((float)($quantity * $product['price']), 2);
          $shoppingcartproduct = array ('productId' => $productId, 'quantity' => $quantity, 'subtotal' => $subtotal, 
          'price' => $product['price'], 'name' => $product['name'], 'filename_img' => $product['filename_img']);
          $shoppingcartproducts[] = $shoppingcartproduct;
          $total += $subtotal;
          }
     }     catch (Exception $e) {
          $genericErr = "Sorry, kan geen producten laten zien op dit moment.";  // <-- foutmelding voor de user
          logToServer("GetAllProducts failed  " . $e -> getMessage() );
     }
     return array ("shoppingcartproducts" => $shoppingcartproducts, "total" => number_format((float)($total), 2), "genericErr" => $genericErr);
}

?>