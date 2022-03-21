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
 if(isset($_GET['a']) ){
    $_SESSION['info']=$_GET['a'];
 }
  if(isset($_GET['b']) ){
    $_SESSION['info2']=$_GET['b'];
 }
$languagename =  $_SESSION['info'];
$languagedif = $_SESSION['info2'];
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
    Test 
      </title>
  </head>
<body class = "background">
  <form action = "testquiz.php" method= "post">
<div class = "messengerWindowsignup"> 
<h2> <i class="fa-solid fa-book-atlas"></i></h2>
<input type="hidden" name="submitted" value="1"/>
  <table class = "messengerWindow2"> 
<?php

  $db = new mysqli("us-cdbr-east-05.cleardb.net", "b59706ca4e953f", "7aab941f", "heroku_4db4cf2503e4bbb");
    if ($db->connect_error)
    {
        die ("Connection failed: " . $db->connect_error);
    }

//$answer1 = $_POST[1];
//$answer2 = $_POST[2]; 
//$answer3 = $_POST[3]; 
//$answer4 = $_POST[4]; 
//$answer5 = $_POST[5]; 
//$answer6 = $_POST[6]; 
//$answer7 = $_POST[7]; 
//$answer8 = $_POST[8]; 
//$answer9 = $_POST[9]; 
//$answer10 = $_POST[10]; 
$correctanswer = 0;
$message = "";
if (isset($_POST["submitted"]) && $_POST["submitted"]){
  for ($loop = 1; $loop<= 10; $loop++){
  $question = $loop . "question";
  $rightquestion = $question . "win";
  $rightword = $_POST[$rightquestion];
  $anst = $_POST[$loop];
    if ( isset($_POST[$rightquestion]) && !empty($_POST[$rightquestion]))
    {
      $correctanswer++;
   // $message = $message . "Question " . $loop . "was correct!" . "\n";
    }
    else
    {
   //     $message = $message . "Question " . $loop . "was not correct!" . "\n";
    }
  }
$totalscore = $correctanswer / 10;
$needright = 6;
//echo '<script type="text/javascript">alert("'.$correctanswer.'");</script>';
if ($correctanswer >= $needright)
{
//  $message = $message . "Congratulations you passed and your rank has now increased!";
    $ranking2 = $languagedif; 
    $q10 = "UPDATE RANKS SET Ranks.rankid= '$ranking2' WHERE Ranks.profile_id = '$id' AND Ranks.ranklanguage = '$languagename'";
     $updatequery = mysqli_query($db,$q10);
echo "<script>alert('Congratulations you passed and your rank has now increased!);window.location.href='testoverview.php;</script>";
    }
else
{
  echo "<script>alert('To bad you did not pass the test! Your rank remains the same');window.location.href='testoverview.php';</script>";
//  $message = $message . "To bad you did not pass the test! Your rank remains the same.";
}


}
$q1 = "SELECT DISTINCT Vocab.vocabword, Vocab.vocabtranslateword, Verbs.verbword, Verbs.verbtranslateword FROM Vocab, Verbs WHERE Vocab.vocabtag LIKE '%$languagedif%' AND Verbs.verbtag LIKE '%$languagedif%'  ORDER BY RAND() LIMIT 10";
$result = mysqli_query($db,$q1);
   
echo "<table class = 'messengerWindow2'>";
$questionnumbered = 0;
 while($row = mysqli_fetch_assoc($result)) {
{
 $questionnumbered++;
  $questionnumber = $questionnumbered;
  $questionid = $questionnumber . "question";
  $num = substr($languagedif, -1);
$otheranswers = 5;
    $randomnum = rand(0,1);
if ($randomnum == 0 )
{
  $temp = $otheranswers +1;
  $word = $row['vocabword'];
  $position = rand(1, 10);
  $translateword = $row['vocabtranslateword'];
  echo "<tr class = 'borderelement2'>";
echo "<td>";
  echo "What does " . $word . " mean? "  ;
  echo "</td>";
  echo "</tr>";
echo "<tr class = 'borderelement2'>";
  $q2 = "SELECT DISTINCT Vocab.vocabtranslateword,  Verbs.verbtranslateword FROM Vocab, Verbs WHERE Vocab.vocabtag LIKE '%$languagedif%' AND Verbs.verbtag LIKE '%$languagedif%' AND Vocab.vocabtranslateword <> '$translateword' AND Verbs.verbtranslateword <> '$translateword' ORDER BY RAND() LIMIT 10";
$result2 = mysqli_query($db,$q1);
$count = 1;
  while($row2 = mysqli_fetch_assoc($result2)) {
  if ($count == $position)
  {
$temp = $translateword;
    $questionid = $questionid . "win";
$questionnumber2 = $questionnumbered . "win";
   echo "<td>";
   echo "<input type='radio' id='$questionid' name=' $questionnumber2' value='$translateword'>";
  echo " " . $temp . " ";
   echo "</td>";
$count++;
  }
  else
  {
    $randomnum2 = rand(0,1);
  if ($randomnum2 == 0 )
{
   echo "<td>";
$temp2 = $row2["vocabtranslateword"];
 echo "<input type='radio' id='$questionid' name='$questionnumbered' value='$temp2'>";
 echo " " . $temp2 . " ";
   echo "</td>";
}
  else if ($randomnum2 == 1)
  {
     echo "<td>";
$temp2 = $row2["verbtranslateword"];
   echo "<input type='radio' id='$questionid' name='$questionnumbered' value='$temp2'>";
  echo " " . $temp2 . " ";
      echo "</td>";
  }
$count++;
}
}
}
else if ($randomnum == 1)
{
  $temp = $otheranswers +1;
  $verb = $row['verbword'];
  $position = rand(1, 10);
  $translateword = $row['verbtranslateword'];
  echo "<tr class = 'borderelement2'>";
echo "<td>";
  echo "What does " . $verb . " mean? "  ;
  echo "</td>";
  echo "</tr>";
echo "<tr class = 'borderelement2'>";
  $q2 = "SELECT DISTINCT Vocab.vocabtranslateword,  Verbs.verbtranslateword FROM Vocab, Verbs WHERE Vocab.vocabtag LIKE '%$languagedif%' AND Verbs.verbtag LIKE '%$languagedif%' AND Vocab.vocabtranslateword <> '$translateword' AND Verbs.verbtranslateword <> '$translateword' ORDER BY RAND() LIMIT 10";
$result2 = mysqli_query($db,$q1);
$count = 1;
  while($row2 = mysqli_fetch_assoc($result2)) {
  if ($count == $position)
  {
$temp = $translateword;
  echo "<td>";
     $questionid = $questionid . "win";
    $questionnumber2 = $questionnumbered . "win";
   echo "<input type='radio' id='$questionid' name='$questionnumber2' value='$translateword'>";
 echo " " . $temp . " ";
   echo "</td>";
$count++;
  }
  else
  {
    $randomnum2 = rand(0,1);
  if ($randomnum2 == 0 )
{
 echo "<td>";
$temp2 = $row2["vocabtranslateword"];
 echo "<input type='radio' id='$questionid' name='$questionnumbered' value='$temp2'>";
 echo " " . $temp2 . " ";
   echo "</td>";
}
  else if ($randomnum2 == 1)
  {
   echo "<td>";
	  $temp2 = $row2["verbtranslateword"];
   echo "<input type='radio' id='$questionid' name='$questionnumbered' value='$temp2'>";
 echo " " . $temp2 . " ";
   echo "</td>";
  }
$count++;
}
}
}
}
  echo "</tr>";
}
   echo "</table>";

echo "</tr>";
mysqli_close($db);
?>
    <tr>
      <input type = "submit" name="submit">
</form>
      </td>
      </td>
    </tr>
  </table>
  <h2> 
  <table class = "borderelement2noborder">
  <tr>
  <td>
   <i class="fa-solid fa-car"></i> 
   </td>
   <td>
       <a href="testoverview.php" >  Back  </a>   
  </td>
  </tr>
  </table>
  </h2>
<br>
</div>
</body>
</html>
   
