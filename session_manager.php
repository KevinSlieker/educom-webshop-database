<?php
function doLoginUser($name) {
    $_SESSION['login'] = $name;
    $_SESSION['shoppingcart'] = array();  // productid en quantity
}
 
function isUserLoggedIn() {
    return isset($_SESSION['login']);
}
 
function getLoggedInUserName() {
     return $_SESSION['login'];
}
 
function doLogoutUser() {
    unset($_SESSION['login']);
}

function getShoppingcart(){
   return $_SESSION['shoppingcart'];
}

function addToShoppingcart($productId, $quantity){
   $_SESSION['shoppingcart'][$productId] = $quantity;
}

function removeFromShoppingcart($productId){
   unset($_SESSION['shoppingcart'][$productId]);
}

?>