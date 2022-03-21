<?php
session_start();
if(isset($_SESSION["email"])) {

    $id = $_SESSION['id'];
    $text = $_POST['text'];
    $time = date('Y-m-d H:i:s');
    $name = $_SESSION['name'];
    $group_id = 
    
    $db = new mysqli("us-cdbr-east-05.cleardb.net", "b59706ca4e953f", "7aab941f", "heroku_4db4cf2503e4bbb");
    if ($db->connect_error) {
        die ("Connection failed: " . $db->connect_error);
    }

    $q = "INSERT INTO messages (Text, Time, profilename, groupedid) VALUES ('$text', '$time', '$name', '$group_id');";
    $result = $db->query($q);

    $db->close();
}
else
{
header("Location: index.php");
}
?>