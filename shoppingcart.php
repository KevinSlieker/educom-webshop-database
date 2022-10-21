<?php

function showShoppingcartHead(){
    echo 'Shoppingcart';
}

function showShoppingcartHeader(){
    echo 'Shoppingcart';
}

function showShoppingcartContent($data){
    echo '<div class="products">';
    if (!empty($data['shoppingcartproducts'])){
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
    } else {
        echo '<p4>Je shoppingcart is nog leeg.</p4>';
    }
    echo '</div>'; 
}

?>