<?php

function showDetailHead($data){
    echo $data['product']['name'];
}

function showDetailHeader($data) {
    echo $data['product']['name'];
}

function showDetailContent($data) {
    echo '<div class="detail">';
    echo '<h2>' . $data['product']['name'] . '</h2>';
    echo '<img src="Images/' . $data['product']['filename_img'] . '" alt="' . $data['product']['name'] . '" width="150 height="300"><br><br>';
    echo '<p4>Bechrijving: ' . $data['product']['description'] . '</p4><br><br>';
    echo '<p5>' . $data['product']['price'] . '</p5></a>';
    addAction('webshop', $data['product']['id'], $data['product']['name'], 'addToShoppingcart', "Add to shoppingcart");
    echo '</div>';  
}
?>