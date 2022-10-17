<?php


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
    echo "Connected";


$sql = "INSERT INTO users (name, email, password) VALUES ('John Doe', 'john@example.com', 'John123')";
    
if (mysqli_query($conn, $sql)) {
      echo "New record created successfully";
    } else {
      echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

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

mysqli_close($conn);

/*






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