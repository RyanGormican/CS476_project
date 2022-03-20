<?php
session_start();
if(isset($_SESSION["email"]))
	{
 $db = new mysqli("us-cdbr-east-05.cleardb.net", "b59706ca4e953f", "7aab941f", "heroku_4db4cf2503e4bbb");
    if ($db->connect_error)
    {
        die ("Connection failed: " . $db->connect_error);
    }
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
    Test Overview
      </title>
  </head>
<body class = "background">
<div class = "messengerWindowsignup"> 
<h2 class = "borderelement2"> <i class="fa-solid fa-book-atlas"></i> Choose a Test <i class="fa-solid fa-book-atlas"></i> </h2>
<input type="hidden" name="submitted" value="1"/>
  <table class = "messengerWindow2"> 
<?php
 $db = new mysqli("us-cdbr-east-05.cleardb.net", "b59706ca4e953f", "7aab941f", "heroku_4db4cf2503e4bbb");
    if ($db->connect_error)
    {
        die ("Connection failed: " . $db->connect_error);
    }
$q1 = "SELECT  Language.languagename, Language.languagetag FROM Language";
$result = mysqli_query($db,$q1);
echo "<tr class = 'borderelement2'>";
 while($row = mysqli_fetch_assoc($result)) {
echo "<table class = 'messengerWindow2'>";
echo "<tr class = 'borderelement2'>";
$coolid = $row['languagetag'];
$coolname =$row['languagename'];
echo "<td>";
echo "$coolname";
echo "</td>";
$q9 = "SELECT Ranks.rankid FROM Ranks, Profile WHERE Profile.profile_id = '$id' AND Ranks.profile_id = Profile.profile_id AND Ranks.ranklanguage = '$coolname'";
$r9 = $db->query($q9);
$rankrow = $r9->fetch_assoc();
echo "<td>";
echo "Your ranking is currently " . $rankrow["rankid"] ;
echo "</td>";
$test = $rankrow["rankid"];
$num = substr($test, -1);
for ($i = 1; $i<5; $i++)
{
  $dif;
   echo "<td>";
  if ($i == 1)
  {
  $dif = "Intermediate";
  }
  else if($i == 2)
  {
     $dif = "Novice";
  }
  else if($i == 3)
  {
    $dif = "Expert";
  }
  else if($i == 4)
  {
    $dif = "Scholar";
  }
if ($num < $i)
{
$tag = $i;
$cooltag = $coolid . $tag;
            echo "<a href='testquiz.php?a=$coolname&b=$cooltag' >  $dif   </a>";
}
	echo "</td>";
}
  echo "</tr>";
   echo "</table>";
}
echo "</tr>";
mysqli_close($db);
?>
    
  </table>
  <h2> 
  <table class = "borderelement2noborder">
  <tr>
  <td>
   <i class="fa-solid fa-car"></i> 
   </td>
   <td>
       <a href="viewgroups.php" >  Back  </a>   
  </td>
  </tr>
  </table>
  </h2>
<br>
</div>
</body>
</html>
