<?php
$target_dir = "uploads/";
$validate = true;
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
 $error = "";
$reg_Email = "/^\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$/";
$reg_Pswd = "/^(\S*)?\d+(\S*)?$/";
$reg_User="/\W/g";
$email = "";


 if (isset($_POST["submitted"]) && $_POST["submitted"])
{
    $email = trim($_POST["email"]);
    $username = trim($_POST["username"]);
    $password = trim($_POST["password"]); 
 //$photo = basename($_FILES["fileToUpload"]["name"]);
//$photo = trim($photo);
     $db = new mysqli("us-cdbr-east-05.cleardb.net", "b59706ca4e953f", "7aab941f", "heroku_4db4cf2503e4bbb");
    if ($db->connect_error)
    {
$error = "connection failure";
        die ("Connection failed: " . $db->connect_error);
    }
    
    $q1 = "SELECT * FROM User WHERE email = '$email'";
    $r1 = $db->query($q1);

    // if the email address is already taken.
    if($r1->num_rows > 0)
    {
        $validate = false;
    }
    else
    {
        $emailMatch = preg_match($reg_Email, $email);
        if($email == null || $email == "" || $emailMatch == false)
        {
            $validate = false;
        }
        
              
        $pswdLen = strlen($password);
        $pswdMatch = preg_match($reg_Pswd, $password);
        if($password == null || $password == "" || $pswdLen < 8 || $pswdMatch == false)
        {
            $validate = false;
        }

        $userMatch = preg_match($reg_User, $username);
        if($username == null || $username == "")
        {
            $validate = false;
        }
    }

    if($validate == true)
    {
$id = "image_id";
	// $q2 = "INSERT INTO Image476(image_url) VALUES ('$photo')";
        $r31259104 = $db->query($q2);
      $q3 ="INSERT INTO Profile (email, profile_name, password, type) VALUES ('$email', '$username','$password','member')";
        $r3 = $db->query($q3);
        
        if ($r3 === true)
        {		
            header("Location: index.php");
            $db->close();
            exit();
        }
    }
    else
    {
        $error = "going";
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
<script src='signup.js'></script>
    <title>
     Sign Up 
      </title>
  </head>
<body class = "background">
<div class = "messengerWindowsignup"> 
<h2> Sign Up <i class="fas fa-user-plus"></i> </h2>
<form id = "signup" method = "post" enctype="multipart/form-data">
<input type="hidden" name="submitted" value="1"/>
  <table class = "messengerWindow2">
<tr>
<td colspan = "2">
 <?php echo $error;?>
</td>
</tr>
      <tr>
        <td class = "borderelement2">    
   <i class="fa-solid fa-envelope"></i>  Email:
       </td>
      <td class = "borderelement2" id = "emailborder">
<label class = "a" id = "emailbordermes"></label>
<br> 
        <input type="text" id="email"  name="email">
       </td>
      </tr>
      <tr>
         <td class = "borderelement2">
Profile Name:
</td> 
    <td class = "borderelement2" id = "usernameborder">
<label class = "a"  id = "usernamebordermes"></label>
<br> 
    <input type="text" id="username" name="username">
</td>
</tr>

<tr> 
   <td class = "borderelement2">
    Password:
<br>
 *contains 8 characters with one non-letter*
    </td>
    <td class = "borderelement" id = "passwordborder">
<label class = "a"  id = "passwordbordermes"></label>
<br> 
    <input type="password"  name="password" id= "password">
</td>
</tr>
<tr>
    <td class = "borderelement2">
    Confirm Password:
  </td>
 <td class = "borderelement2" id = "passwordconfirmborder">
<label class = "a" id = "passwordconfirmbordermes"></label>
<br> 
    <input type="password" name="passwordconfirm" id = "passwordconfirm"> 
</td> 
</tr>

    </table>
  <h2> 
       <a href="index.php" >Back  </a>   
      <input type="submit" value ="Sign Up"> 
  </h2>
  </form>
<br>
</div>
</body>
</html>
