<?php
session_start();
if(isset($_SESSION["email"]))
	{
 $db = new mysqli("us-cdbr-east-05.cleardb.net", "b59706ca4e953f", "7aab941f", "heroku_4db4cf2503e4bbb");
    if ($db->connect_error)
    {
        die ("Connection failed: " . $db->connect_error);
    }
$name = $_SESSION['name'];
$id = $_SESSION['id'];
$db->close();
  }
else
{
header("Location: index.php");
}
?>

<!DOCTYPE html>
<html lang = "en">
   <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
<link rel="stylesheet" type = "text/css" href="project.css">
<script src="https://kit.fontawesome.com/cb59c9bd28.js" crossorigin="anonymous"></script>
    <title>
  View groups
      </title>
  </head>
<body class = "background">
<div class = "messengerWindowsignup"> 
  <h2 class = "profileBorder">
  <tr>
  <td>
<i class="fa-solid fa-book-atlas"></i> <a href="testoverview.php" >  Take Test </a> 
    </td>
    </tr>
    <tr>
    <td>
       <?php
      echo $name;
          ?>
          </a> 
    </td>
    </tr>
  </h2>
  <table class = "messengerWindow2">
<tr>
<td colspan = "2">
 <?php echo $error;?>
</td>
</tr>
  
 <?php
	$db = new mysqli("us-cdbr-east-05.cleardb.net", "b59706ca4e953f", "7aab941f", "heroku_4db4cf2503e4bbb");
    if ($db->connect_error)
    {
        die ("Connection failed: " . $db->connect_error);
    }
$q9 = "SELECT Ranks.rankid FROM Ranks, Profile WHERE Profile.profile_id = '$id'";
$r9 = $db->query($q9);
while ( $rankrow = $r9->fetch_assoc()) {
$rankt =  $rankrow['rankid'];
$q1 = "SELECT  Groups.groupname,Groups.group_id, Groups.groupdescription, Groups.ranktag FROM Groups  WHERE Groups.ranktag LIKE '%$rankt%'";
$result = mysqli_query($db,$q1);
 while($row = mysqli_fetch_assoc($result)) {   
$groupN = $row['groupname'];
$groupD= $row['groupdescription'];
$groupI = $row['group_id'];
echo "<tr class = 'borderelement2'>";
echo "<td colspan = '2'>";
	  echo "<a href='./public/chat.php?username=$name&room=$groupN' > $groupN </a>" ;
	  echo "</td>";
	  echo "<td>";
	  echo $groupD;
	  echo "</td>";
	  echo "</tr>";
}
}
$q2 =  "SELECT Profile.type FROM Profile WHERE Profile.profile_id = '$id'";  
$resultT = mysqli_query($db,$q2);
$rowT = $resultT->fetch_assoc();
$_SESSION["type"] = $rowT["type"];
$typid = $_SESSION['type'];
if ($typid == "moderator")
{
echo "<tr>";
 echo "<td class = 'borderelement2', colspan = '2'>";
   echo "<a href='creategroup.php' > <i class='fa-solid fa-user-group'></i> Create  </a>";
  echo" </td>";
echo "</tr>";
	}
	$db->close();
?>


    </table>
  <h2 class = "profileBorder"> 
  <table>
  <tr>
  <td>
  <i class="fa-solid fa-car"></i> 
  </td>
  <td>
   <a href="logout.php"> Logout </a>
  </td>
  <td colspan = "5">
  </td>
  <td>
<i class="fa-solid fa-circle-play"></i>
  </td>
  </tr>
  </table>
  </h2>
<br>
</div>
</body>
</html>
