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
     die("Connection failed: " . mysqli_connect_error());
    }
    return $conn;
}

function closeDatabase($conn){
    mysqli_close($conn);
}

function saveUser($email,$name,$password) {
    $conn = connectDatabase();

    $sql = "INSERT INTO users (name, email, password) VALUES ('$name', '$email', '$password')";
    
    if (!mysqli_query($conn, $sql)) {
          echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    closeDatabase($conn);
} 

function findUserByEmail($email){
    $conn = connectDatabase();
    $user = NULL;
    $sql = "SELECT user_ID, name, email, password FROM users WHERE email = '$email'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0 ){
        $user = mysqli_fetch_assoc($result);
    }

    closeDatabase($conn);
    return $user;

/*    
	$file = fopen('users/users.txt', 'r');
	$user = NULL;
	$line = fgets($file);

    while (!feof($file)) {
        $line = fgets($file);
        $explode = explode('|', $line);
        if ($explode[0] == $email) {
            $user = array("email" => $explode[0], "name"=> $explode[1], "password"=> $explode[2]);
        }
    }
    fclose($file);
    return $user;
*/
}
/*




    $sql = "SELECT user_ID, name, email FROM users";
    $result = mysqli_query($conn, $sql);
    
    if (mysqli_num_rows($result) > 0) {
        // output data of each row
        while($row = mysqli_fetch_assoc($result)) {
            echo "id: " . $row["user_ID"]. " - Name: " . $row["name"]. " " . $row["email"]. "<br>";
        }
    } else {
        echo "0 results";
    }




$sql = "INSERT INTO MyGuests (firstname, lastname, email)
VALUES ('John', 'Doe', 'john@example.com')";

if (mysqli_query($conn, $sql)) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
*/

?>