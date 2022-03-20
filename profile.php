<?php

?>


<!DOCTYPE html>
<html lang = "en">
   <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
<link rel="stylesheet" type = "text/css" href="assignment.css">
<script src="https://kit.fontawesome.com/cb59c9bd28.js" crossorigin="anonymous"></script>
<script src='signup.js'></script>
    <title>
     Profile
      </title>
  </head>
<body class = "background">
<div class = "messengerWindowsignup"> 
<h2> </h2>
<input type="hidden" name="submitted" value="1"/>
  <table class = "messengerWindow2">
<tr>
<td colspan = "3">
 <?php echo $error;?>
</td>
</tr>
      <tr>
        <td class = "borderelement2" colspan = "1">
        <img class = "groupimages" src="https://upload.wikimedia.org/wikipedia/en/thumb/b/ba/Flag_of_Germany.svg/1200px-Flag_of_Germany.svg.png">    
       </td>
      <td class = "borderelement2" colspan = "2" >
      <table>
      <tr>
      <td>
      USERNAME 
      </td>
      </tr>
      <tr>
      <td>
      JOINED ON "DATE"
      </td>
      </tr>
      </table>
       </td>
      </tr>
      <tr>
         <td class = "borderelement2" colspan = "3">
Language Profencies
<table class = "messengerWindow2">
<tr>
<td class = "borderelement2">
<img class = "groupimages" src="https://upload.wikimedia.org/wikipedia/en/thumb/c/c3/Flag_of_France.svg/1280px-Flag_of_France.svg.png">
</td>
<td class = "borderelement2">
<img class = "groupimages" src="https://upload.wikimedia.org/wikipedia/en/thumb/a/ae/Flag_of_the_United_Kingdom.svg/1200px-Flag_of_the_United_Kingdom.svg.png">
</td>
<td class = "borderelement2">
<img class = "groupimages" src="https://upload.wikimedia.org/wikipedia/en/thumb/b/ba/Flag_of_Germany.svg/1200px-Flag_of_Germany.svg.png">
</td>
</tr>
<tr>
<td class = "borderelement2">
Title
</td>
<td class = "borderelement2">
Title
</td>
<td class = "borderelement2">
Title
</td>
</tr>
</table>
</td>
</tr>
<tr>
<td class = "borderelement2"  colspan = "3">
<table class = "messengerWindow2">
<tr>
<td  class = "borderelement2">
About me
</td>
</tr>
<tr>
<td  class = "borderelement2">
<p class = "profiletext"> Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. </p>
</td>
</tr>
</table>
</td>
</tr>
<tr> 
   <td class = "borderelement2" colspan = "3">
    Featured Groups
    <table class = "messengerWindow2">
<tr>
<td class = "borderelement2">
<img class = "groupimages" src="https://upload.wikimedia.org/wikipedia/en/thumb/c/c3/Flag_of_France.svg/1280px-Flag_of_France.svg.png">
</td>
<td class = "borderelement2">
<img class = "groupimages" src="https://upload.wikimedia.org/wikipedia/en/thumb/a/ae/Flag_of_the_United_Kingdom.svg/1200px-Flag_of_the_United_Kingdom.svg.png">
</td>
<td class = "borderelement2">
<img class = "groupimages" src="https://upload.wikimedia.org/wikipedia/en/thumb/b/ba/Flag_of_Germany.svg/1200px-Flag_of_Germany.svg.png">
</td>
</tr>
<tr>
<td class = "borderelement2">
Group Name 
</td>
<td class = "borderelement2">
Group Name 
</td>
<td class = "borderelement2">
Group Name 
</td>
</tr>
</table>
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
       <a href="viewgroups.php" >  Back  </a>   
  </td>
  </tr>
  </table>
  </h2>
<br>
</div>
</body>
</html>
