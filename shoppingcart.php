<?php

function showShoppingcartHead(){
    echo 'Shoppingcart';
}

function showShoppingcartHeader(){
    echo 'Shoppingcart';
}

function showShoppingcartContent($data){
    print_r($_SESSION['shoppingcart']);
    echo '<div class="products">';
    foreach($_SESSION['shoppingcart'] as $productId => $quantity) {  // echo '<p> ID:' . $productId . '</p>';
        echo '<div class="product"><a href="index.php?page=detail&id=' . $productId . '">';
        echo '<h2>' . $data['products'][$productId]['name'] . '</h2>';
        echo '<img src="Images/' . $data['products'][$productId]['filename_img'] . '" alt="' . $data['products'][$productId]['name'] . '" width="60" height="80"><br>';
        echo '<p4> Hoeveelheid: ' . $quantity . '</p4>';
        echo '<p4> Subtotaal: ' . subTotal($productId, $quantity, $data['products'][$productId]['price']) . ' </p4>';
        echo '</div></a>';
    }
    echo '</div>'; 
}

?>