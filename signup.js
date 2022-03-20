window.onload=function(){
document.getElementById("signup").addEventListener("submit", validateSignup, false);
};
function validateSignup(event)
{
var email = document.forms.signup.email.value;
var username = document.forms.signup.username.value;
//var picture = document.forms.signup.picture.value;
var password = document.forms.signup.password.value;
var passwordconfirm = document.forms.signup.passwordconfirm.value;
var fullvalidate = false;
var signupelement = ["emailborder", "usernameborder", "pictureborder", "passwordborder", "passwordconfirmborder"];
var signupelementwrong = ["email", "username", "picture", "password", "passwordconfirm"];
for(var i=0; i<5; i++)
{
signupelementwrong[i] = true;
}
var emailcheck =  /^\w+[._-]?\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$/; 
if (email == "")
{
signupelementwrong[0] = true;
document.getElementById("emailbordermes").innerHTML="Email field is empty";
}
else if (emailcheck.test(email) == false)
{
signupelementwrong[0] = true; 
document.getElementById("emailbordermes").innerHTML="Email address in the wrong format. Example: username@somewhere.sth";
}
else if (emailcheck.test(email) == true)
{
signupelementwrong[0] = false;
}
var usernamecheck =/\W/g;
var nonword =  "" + username.match(usernamecheck);
console.log(nonword);
if (username.length == 0)
{
signupelementwrong[1] = true;
document.getElementById("usernamebordermes").innerHTML="Profile name field is empty.";
}
else if(username.indexOf(' ') >=0 || nonword != "null" && username.length != 0) 
{
signupelementwrong[1] = true;
document.getElementById("usernamebordermes").innerHTML="Your profile name must not contain any spaces or non-word characters";
}
else
{
signupelementwrong[1] = false;
}


signupelementwrong[2] = false;

	var passwordcheck = /^(\S*)?\d+(\S*)?$/;
if (password.length == 0)
{
signupelementwrong[3] = true;
	document.getElementById("passwordbordermes").innerHTML="Password field is Empty";
}
else if (passwordcheck.test(password) == false || password.length != 8)
{
signupelementwrong[3] = true;
document.getElementById("passwordbordermes").innerHTML="Not correct password format";
}

if(passwordconfirm.length == 0)
{
signupelementwrong[4] = true;
document.getElementById("passwordconfirmbordermes").innerHTML="Password confirm field is Empty";
}
else
if(passwordconfirm != password) 
{
signupelementwrong[4] = true;
document.getElementById("passwordbordermes").innerHTML="Make sure password and confirm password match";
document.getElementById("passwordconfirmbordermes").innerHTML="Make sure password and confirm password match";
}



if (password.length == 8 && passwordcheck.test(password) == true )
{
signupelementwrong[3] = false;
}
if( password == passwordconfirm && password.length > 0 && passwordconfirm.length > 0 )
{
signupelementwrong[4] = false;
}



for(var j=0; j<5; j++)
{
if(signupelementwrong[j] == true)
{
var changeclass = signupelement[j];
 document.getElementById(changeclass).className = "borderelementerror"; 
fullvalidate = false;
}
else if(signupelementwrong[j] == false && j != 2)
{
var mes = signupelement[j] + "mes";
document.getElementById(signupelement[i]).className = "borderelement2";
document.getElementById(mes).innerHTML = "";
}
}
if(signupelementwrong[0] == false && signupelementwrong[1] == false && signupelementwrong[2] == false && signupelementwrong[3] == false && signupelementwrong[4] == false)
{
fullvalidate = true;
}

if(fullvalidate == false){
// document.getElementById("signupsucess").innerHTML = ""; 
event.preventDefault();
}
}
