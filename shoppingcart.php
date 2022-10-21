<?php

function showShoppingcartHead(){
    echo 'Shoppingcart';
}

function showShoppingcartHeader(){
    echo 'Shoppingcart';
}

function showShoppingcartContent($data){
    var_dump($data['shoppingcartproducts']);
    echo '<div class="products">';
    foreach($data['shoppingcartproducts'] as $product) {  // echo '<p> ID:' . $productId . '</p>';
        echo '<div class="product"><a href="index.php?page=detail&id=' . $product['productId'] . '">';
        echo '<h2>' . $product['name'] . '</h2>';
        echo '<img src="Images/' . $product['filename_img'] . '" alt="' . $product['name'] . '" width="60" height="80"><br>';
        echo '<p4> Hoeveelheid: ' . $product['quantity'] . '</p4><br>';
        echo '<p4> Subtotaal: &euro;' . $product['subtotal'] . ' </p4>';
        echo '</a>' . PHP_EOL;
        addAction('shoppingcart', $product['productId'], $product['name'], TRUE, 'addToShoppingcart', "Add to shoppingcart");
        addAction('shoppingcart', $product['productId'], $product['name'], FALSE, 'removeFromShoppingcart', "Remove from shoppingcart");
        echo '</div>';
    }
    echo '<p4>Totaal: &euro;' . $data['total'] .  '</p4>';
    echo '</div>'; 
}

?>