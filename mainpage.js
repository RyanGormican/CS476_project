window.onload=function(){
document.getElementById("login").addEventListener("submit", validateLogin, false);
};
function validateLogin(event)
{
var email = document.forms.login.email.value;
var emailcheck =  /^\w+[._-]?\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$/; 
var password = document.forms.login.password.value;
var errorclear = true;
document.getElementById("emailerror").innerHTML="";
document.getElementById("passworderror").innerHTML="";

if (email == "")
{
errorclear = false;
document.getElementById("emailerror").innerHTML="Email field is empty";
}
else if (emailcheck.test(email) == false)
{
errorclear = false; 
document.getElementById("emailerror").innerHTML="Email address in the wrong format. Example: username@somewhere.sth";
}

if (password == "")
{
errorclear = false; 
document.getElementById("passworderror").innerHTML="Password field is empty";
}
else if (password.length <8)
{
errorclear = false; 
document.getElementById("passworderror").innerHTML="Password must be 8 characters or more";
}
else if (password.indexOf(' ') >=0)
{
errorclear= false; 
document.getElementById("passworderror").innerHTML="Password must not contain any spaces";
}
if (errorclear == true)
{
// document.getElementById("loginsucess").innerHTML=
//"Login Succesfull! Here is the information" + "<br>" +" Email: " +email+"<br>"+"Password: "+password;
     } 
if (errorclear == false)
{
event.preventDefault();
 //document.getElementById("loginsucess").innerHTML="";
     } 
}
