<?php

function showWebshopHead(){
    echo "Webshop";
}

function showWebshopHeader() {
    echo "Webshop";
}

function showWebshopContent($data) {
    echo '<div class="products">';
    foreach($data['products'] as $product) {
    echo '<a href="index.php?page=detail&id=' . $product['id'] . '">';
    echo '<h2>' . $product['name'] . '</h2>';
    echo '<img src="Images/' . $product['filename_img'] . '" alt="' . $product['name'] . '" width="60" height="80"><br>';
    echo '<p1>' . $product['price'] . '</p1></a>';
    }
    echo '</div>';  
}
?>