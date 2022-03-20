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
$named = $_SESSION['name'];
$db->close();
 if(isset($_GET['a']) ){
    $_SESSION['info']=$_GET['a'];
 }
$name = $_GET['b'];
$room = $_GET['a'];
 }
else
{
header("Location: index.php");
}
?>


<?php
if (isset($_POST['submit'])){
$db = new mysqli("us-cdbr-east-05.cleardb.net", "b59706ca4e953f", "7aab941f", "heroku_4db4cf2503e4bbb");
 
    if ($db->connect_error)
    {
        die ("Connection failed: " . $db->connect_error);
    }
  
$message = mysqli_real_escape_string(
      $db, $_REQUEST['text']);
date_default_timezone_set('America/Regina');
$theTime=date('y-m-d h:ia');

$q1 = "INSERT INTO messages (profilename, time,text,groupedid) VALUES ('$named', '$theTime', '$message', '$room')";
if(mysqli_query($db, $q1)){
} 
else{
    echo "Message was unable to be processed.";
}
 // Close connection
mysqli_close($db);
}
?>
<html>
<head>
   <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
<link rel="stylesheet" type = "text/css" href="project.css">
<script src="https://kit.fontawesome.com/cb59c9bd28.js" crossorigin="anonymous"></script>
<body class = "background">
<div> 
<style>
	
*{
    box-sizing:border-box;
}
#container{
 width:500px;
    height:700px;
    background:: rgba(196, 164, 132);
    margin:0 auto;
    font-size:0;
    border-radius:5px;
    overflow:hidden;
       color: gold;
    font-family: "Helvetica";
}
main .message{
    padding:10px;
    color: gold;
    text-align:left;
    background-color:rgba(196, 164, 132);
    line-height:20px;
    margin-left:15px;
    max-width:90%;
    display:inline-block;
    border-radius:5px;
    clear:both;
}
main{
    width:500px;
    height:700px;
    display:inline-block;
    font-size:15px;
    vertical-align:top;
}
main header{
    height:100px;
    padding:30px 20px 30px 40px;
    background-color:#622569;  
}
main header > *{
    display:inline-block;
    vertical-align:top;
}
main header img:first-child{
    width:24px;
    margin-top:8px;
}  
main header img:last-child{
    width:24px;
    margin-top:8px;
}
main header div{
    margin-left:90px;
    margin-right:90px;
}
main header h2{
    font-size:25px;
    margin-top:5px;
    text-align:center;
    color:#FFFFFF;  
}
main .inner_div{
    padding-left:0;
    margin:0;
    list-style-type:none;
    position:relative;
    overflow:auto;
    height:500px;
    background : rgba(196, 164, 132);
    background-position:center;
    background-repeat:no-repeat;
    background-size:cover;
    position: relative;
    border-top:2px solid #fff;
    border-bottom:2px solid #fff;   
}
main .triangle{
    width: 0;
    height: 0;
    border-style: solid;
    border-width: 0 8px 8px 8px;
    border-color: transparent transparent
      #58b666 transparent;
    margin-left:20px;
    clear:both;
}
main .triangle1{
    width: 0;
    height: 0;
    border-style: solid;
    border-width: 0 8px 8px 8px;
    border-color: transparent
      transparent #6fbced transparent;
    margin-right:20px;
    float:right;
    clear:both;
}
main .message1{
    padding:10px;
    color:#000;
    margin-right:15px;
    background-color:#6fbced;
    line-height:20px;
    max-width:90%;
    display:inline-block;
    text-align:left;
    border-radius:5px;
    float:right;
    clear:both;
}
 
main footer{
    height:150px;
    padding:20px 30px 10px 20px;
    background-color:#622569;
}
main footer .input1{
    resize:none;
    border:100%;
    display:block;
    width:120%;
    height:55px;
    border-radius:3px;
    padding:20px;
    font-size:13px;
    margin-bottom:13px;
}
main footer textarea{
    resize:none;
    border:100%;
    display:block;
    width:140%;
    height:55px;
    border-radius:3px;
    padding:20px;
    font-size:13px;
    margin-bottom:13px;
    margin-left:20px;
}
main footer .input2{
    resize:none;
    border:100%;
    display:block;
    width:40%;
    height:55px;
    border-radius:3px;
    padding:20px;
    font-size:13px;
    margin-bottom:13px;
    margin-left:100px;
    color:white;
    text-align:center;
    background-color:black;
    border: 2px solid white; 
}
main footer textarea::placeholder{
    color:#ddd;
}

 
</style>
<body onload="show_func()">
<div id="container">
    <main>
	   
                <h4> <?php echo $name ?> </h4>
<script>
function show_func(){
 
 var element = document.getElementById("chathist");
    element.scrollTop = element.scrollHeight;
  
 }
 </script>
 <?php
echo "<form id='myform' action='group.php?a=$room&b=$name' method='POST' >";
?>
<div class="inner_div" id="chathist">
<?php
$db = new mysqli("us-cdbr-east-05.cleardb.net", "b59706ca4e953f", "7aab941f", "heroku_4db4cf2503e4bbb");
 
$q1 = "SELECT * FROM messages WHERE messages.groupedid = '$room'";
 $run = $db->query($q1);
 while($row = mysqli_fetch_assoc($run)) {
if ($row['profilename'] == $id)
{
echo"<div id='message1' class='message2'>";
 echo $row['Text']; 
 echo "<br/>";
 echo "<div>";
 echo $row['profilename']; 
echo "@";
  echo $row['Time'];
echo "</div>";
echo "</div>";
echo "<br/>";
echo "<br/>";	
}
else{
echo"<div id='message1' class='message1'>";
 echo $row['Text']; 
 echo "<br/>";
 echo "<div>";
 echo $row['profilename']; 
echo "@";
  echo $row['Time'];
echo "</div>";
echo "</div>";
echo "<br/>";
echo "<br/>";
}
 }
	?>


</div>
        <table>
        <tr>
           <td>
            <textarea id="text" name="text"
                rows='2' cols='40'
                placeholder="Write your message in the chat box here">
            </textarea>
	</td>
           <td>
            <input class="input2" type="submit"
            id="submit" name="submit" value="send">
           </td>               
        </tr>
        </table>               
</form>
</main>   
</div>
	</div>
</body>
</html>
