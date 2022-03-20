
<?php
$validate = true;
$reg_Email = "/^\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$/";
$reg_Pswd = "/^(\S*)?\d+(\S*)?$/";

$email = "";
$error = "";
if (isset($_POST["submitted"]) && $_POST["submitted"])
{
    $email = trim($_POST["email"]);
    $password = trim($_POST["password"]);
    
    $db = new mysqli("us-cdbr-east-05.cleardb.net", "b59706ca4e953f", "7aab941f", "heroku_4db4cf2503e4bbb");
    if ($db->connect_error)
    {
        die ("Connection failed: " . $db->connect_error);
    }

 $q =  "SELECT * FROM profile WHERE email = '$email' AND password = '$password'";

       
    $r = $db->query($q);
    $row = $r->fetch_assoc();
    if($email != $row["email"] && $password != $row["password"])
    {
        $validate = false;
    }
    
    if($validate == true)
    {
        session_start();
        $_SESSION["email"] = $row["email"];
	$_SESSION["id"] = $row["profile_id"];
	$_SESSION["name"] = $row["profile_name"];
        header("Location: viewgroups.php");
        $db->close();
        exit();
    }
    else 
    {
        $error = "The email/password combination was incorrect. Login failed.";
        $db->close();
    }

}

?>

<!DOCTYPE html>
<html lang = "en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
<link rel="stylesheet" type = "text/css" href="project.css">
<script src="https://kit.fontawesome.com/cb59c9bd28.js" crossorigin="anonymous"></script>
<script src='mainpage.js'></script>
    <title>
  Main Page - "Jibbernet"
      </title>
  </head>
      <br>
<div class = "mainicon">
</div>
<div class = "messengerWindow4">
<h2 class = "maintitle" > <i class="fa-solid fa-globe"></i>  Jibbernet <i class="fa-solid fa-globe"></i> </h2>

<body class = "background">
<form id= "login" action="index.php" method ="post">
<input type="hidden" name="submitted" value="1"/>
<table class = "messengerWindow2">
      <tr>
<td colspan="2" class = "borderelements2">
<label class = "a" id="emailerror"></label>
</td>
</tr>
<tr>
        <td class = "borderelement2">    
    Profile Email:
       </td>
       <td class = "borderelement2">
        <input type="text"  name="email" id="email">
       </td>
      </tr>
 <tr>
<td colspan="2" class = "borderelements2">
<label class = "a" id="passworderror"></label>
</td>
</tr>
      <tr>
        <td class = "borderelement2">
Password:
</td> 
<td class = "borderelement2">
    <input type="text" name="password" id="password">
</td>
</tr>
<tr>
<td class = "borderelement2">
 <a href="signup.php" >Sign up <i class="fas fa-user-plus"></i> </a>
</td>
<td class = "borderelement2">
<input type="submit" value ="Login"> <i class="fas fa-user-alt"></i> 
</td>
</tr>
<tr>
</tr>
</table>
</form>
<table  class = "messengerWindow2">
<tr>
<td class = "borderelementflag">
<img class = "titleimages" src="https://upload.wikimedia.org/wikipedia/en/thumb/c/c3/Flag_of_France.svg/1280px-Flag_of_France.svg.png">
</td>
<td class = "borderelementflag">
<img class = "titleimages" src="https://upload.wikimedia.org/wikipedia/en/thumb/a/ae/Flag_of_the_United_Kingdom.svg/1200px-Flag_of_the_United_Kingdom.svg.png">
</td>
<td class = "borderelementflag">
<img class = "titleimages" src="https://upload.wikimedia.org/wikipedia/en/thumb/b/ba/Flag_of_Germany.svg/1200px-Flag_of_Germany.svg.png">
</td>
</tr>
</table>
</div>
</body>
</html>
