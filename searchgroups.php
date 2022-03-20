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
  Search Groups
      </title>
  </head>
<body class = "background">
<div class = "messengerWindowsignup"> 
  <h2>
 <i class="fa-solid fa-magnifying-glass"></i>  Search Groups <i class="fa-solid fa-magnifying-glass"></i>
  </h2>
  <form id = "searchgroups" action="searchgroups.php" method = "post" enctype="multipart/form-data">
<input type="hidden" name="submitted" value="1"/>
  <table class = "messengerWindow2">
<tr>
<td colspan = "2">
 <?php echo $error;?>
</td>
</tr>
  <tr>
        <td class = "borderelement2" colspan = "2">   
    <i class="fa-solid fa-language"></i> Language Type:
<label class = "a"  id = "typebordermes"></label>
<select name="language" >
  <option value="Empty"></option>
  <option value="English">English</option>
  <option value="French">French</option>
  <option value="German">German</option>
</select>
</td>
<td class = "borderlement2" colspan = "5" rowspan = "5">
 <table  class = "borderelement2">
        <tr>
       <td>
      <img class = "groupimages" src="https://upload.wikimedia.org/wikipedia/en/thumb/b/ba/Flag_of_Germany.svg/1200px-Flag_of_Germany.svg.png">
       </td>
       <td>
       Group name
       </td>
       <td>
       # Members
       </td>
       <td>
       "Description"
       </td>
       <td>
       <a href="viewgroups.php" > <i class="fa-solid fa-check"></i> Join </a>
       </td>
       </tr>
       </table>
        <table  class = "borderelement2">
        <tr>
       <td>
      <img class = "groupimages" src="https://upload.wikimedia.org/wikipedia/en/thumb/b/ba/Flag_of_Germany.svg/1200px-Flag_of_Germany.svg.png">
       </td>
       <td>
       Group name
       </td>
       <td>
       # Members
       </td>
       <td>
       "Description"
       </td>
       <td>
       <a href="viewgroups.php" > <i class="fa-solid fa-check"></i> Join </a>
       </td>
       </tr>
       </table>
        <table  class = "borderelement2">
        <tr>
       <td>
      <img class = "groupimages" src="https://upload.wikimedia.org/wikipedia/en/thumb/b/ba/Flag_of_Germany.svg/1200px-Flag_of_Germany.svg.png">
       </td>
       <td>
       Group name
       </td>
       <td>
       # Members
       </td>
       <td>
       "Description"
       </td>
       <td>
       <a href="viewgroups.php" > <i class="fa-solid fa-check"></i> Join </a>
       </td>
       </tr>
       </table>
        <table  class = "borderelement2">
        <tr>
       <td>
      <img class = "groupimages" src="https://upload.wikimedia.org/wikipedia/en/thumb/b/ba/Flag_of_Germany.svg/1200px-Flag_of_Germany.svg.png">
       </td>
       <td>
       Group name
       </td>
       <td>
       # Members
       </td>
       <td>
       "Description"
       </td>
       <td>
       <a href="viewgroups.php" > <i class="fa-solid fa-check"></i> Join </a>
       </td>
       </tr>
       </table>
        <table  class = "borderelement2">
        <tr>
       <td>
      <img class = "groupimages" src="https://upload.wikimedia.org/wikipedia/en/thumb/b/ba/Flag_of_Germany.svg/1200px-Flag_of_Germany.svg.png">
       </td>
       <td>
       Group name
       </td>
       <td>
       # Members
       </td>
       <td>
       "Description"
       </td>
       <td>
       <a href="viewgroups.php" > <i class="fa-solid fa-check"></i> Join </a>
       </td>
       </tr>
       </table>
      </td>
       </tr>
      <tr>
      <td class = "borderelement2" colspan = "2">
   <i class="fa-solid fa-book"></i>  Profiency:
<label class = "a"  id = "profiencybordermes"></label>
   <select name="profiencyfrom" >
  <option value="Empty"></option>
  <option value="Beginner">Beginner</option>
  <option value="Intermediate">Intermediate</option>
  <option value="Novice">Novice</option>
  <option value="Expert">Expert</option>
  <option value="Scholar">Scholar</option>
</select>
to 
   <select name="profiencyto" >
  <option value="Empty"></option>
  <option value="Beginner">Beginner</option>
  <option value="Intermediate">Intermediate</option>
  <option value="Novice">Novice</option>
  <option value="Expert">Expert</option>
  <option value="Scholar">Scholar</option>
</select>
</td>
</tr>
<tr>
   <td class = "borderelement2" colspan = "2">
<i class="fa-solid fa-hashtag"></i> of Members  <input type="number" id="membersfrom" name = "membersfrom" class = "numwidth" >  to    <input type="number" class = "numwidth" id="membersfrom" name = "membersfrom" > 
</td>
</tr>
<tr> 
<td class = "borderelement2" colspan = "2">
 <i class="fa-solid fa-signature"></i> Group Name      <input type="text" id="groupname"  name="name">
 </td>
</tr>
<tr>
 <td class = "borderelement2" id = "searchborder" colspan = "2">
  <a href="searchgroups.php" > <i class="fa-solid fa-magnifying-glass"></i>     <input type="submit" value ="Search">   </a>   
</td> 
</tr>

    </table>
  <h2> 
    <a href="viewgroups.php" > <i class="fa-solid fa-car"></i> Back </a>
  </h2>
<br>
</form>
</div>
</body>
</html>
