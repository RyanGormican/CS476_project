<?php
session_start();
if(isset($_SESSION["email"])) {
 $db = new mysqli("us-cdbr-east-05.cleardb.net", "b59706ca4e953f", "7aab941f", "heroku_4db4cf2503e4bbb");
    if ($db->connect_error) {
        die ("Connection failed: " . $db->connect_error);
    }
    $name = $_SESSION['name'];
    $id = $_SESSION['id'];

    $room = $_GET['b'];

    // CREATE TABLE IF NOT EXISTS Messages (
    //     idMessages INT NOT NULL AUTO_INCREMENT,
    //     user_id INT,        
    //     text TEXT,        
    //     message_date DATETIME,    
    //     profilename VARCHAR(25),
    //     groupedid INT,
    //     PRIMARY KEY (idMessages),
    // );

    $db->close();
}
else
{
header("Location: index.php");
}
?>