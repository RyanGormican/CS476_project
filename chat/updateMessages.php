<?php
session_start();
if(isset($_SESSION["email"])) {
 $db = new mysqli("us-cdbr-east-05.cleardb.net", "b59706ca4e953f", "7aab941f", "heroku_4db4cf2503e4bbb");
    if ($db->connect_error) {
        die ("Connection failed: " . $db->connect_error);
    }

    $name = $_SESSION['name'];
    $id = $_SESSION['id'];
    $room = $_GET['a'];

    $q = "SELECT * FROM Messages WHERE room = $room;";

    $result = $db->query($q); 
    $jsonArray = array();
    while ($row = $result->fetch_assoc()) {
        $jsonArray[] = $row;
    }
    echo json_encode($jsonArray);
   

    $db->close();
}
else {
    header("Location: index.php");
}
?>