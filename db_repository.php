<?php

function connectDatabase(){

$servername = "localhost";
$username = "Kevins_WebShopUser";
$password = "GebruikerWebShop";
$dbname = "kevins_webshop";

// Create connection

$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection

    if (!$conn) {
        throw new Exception("Cannot connect with the database." . mysqli_connect_error());
    }
    return $conn;
}

function closeDatabase($conn){
    mysqli_close($conn);
}

function saveUser($email,$name,$password) {
    $conn = connectDatabase();
    try {
        $name = mysqli_real_escape_string($conn, $name);
        $email = mysqli_real_escape_string($conn, $email);
        $password = mysqli_real_escape_string($conn, $password);        

        $sql = "INSERT INTO users (name, email, password) VALUES ('$name', '$email', '$password')";
    
        if (!mysqli_query($conn, $sql)) {
         throw new Exception("Query failed, SQL: " . $sql . "Error: " . mysqli_error($conn));
        }
    }
 // waar moet de catch nu en hoe zit het dan met all mijn errers voor fout email en password?
    finally {
    closeDatabase($conn);
    }
} 

function findUserByEmail($email){
    $conn = connectDatabase();
    $user = NULL;
    try {
        $email = mysqli_real_escape_string($conn, $email);
        $sql = "SELECT user_ID, name, email, password FROM users WHERE email = '$email'";
        $result = mysqli_query($conn, $sql);
        if ($result == false) {
        throw new Exception("Query failed, SQL: " . $sql . "Error: " . mysqli_error($conn));
        }
        if (mysqli_num_rows($result) > 0 ){
        $user = mysqli_fetch_assoc($result);
        }
        return $user;
    }
    finally {
    closeDatabase($conn);
    }
    

}
?>