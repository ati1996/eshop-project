var username=document.getElementById("username");
var password=document.getElementById("password");
var email=document.getElementById("email");
var submit=document.getElementById("submit");

username.onmouseover=function(){
	username.style.backgroundColor= "#F9EA45"; 
 };
username.onmouseout=function(){
	username.style.backgroundColor= "#F7ED7C"; 
 };

password.onmouseover=function(){
	password.style.backgroundColor= "#F9EA45"; 
 };
password.onmouseout=function(){
	password.style.backgroundColor= "#F7ED7C"; 
 };

email.onmouseover=function(){
	email.style.backgroundColor= "#F9EA45"; 
 };
email.onmouseout=function(){
	email.style.backgroundColor= "#F7ED7C"; 
 };

submit.onmouseover=function(){
	submit.style.backgroundColor= "#5A5A5A"; 
 };
submit.onmouseout=function(){
	submit.style.backgroundColor= "#373636"; 
 };

submit.addEventListener("click",handle);

function handle(e)
{
	e.preventDefault();
	var temp_username = username.value;
	var temp_password = password.value;
	var temp_email = email.value;
	var reemail=/^[a-z0-9]+\@+[a-z]+\.+[a-z]/;
	if(reemail.test(temp_email))
	{
		$.ajax({
			type : "POST" ,
			url : "register.php" ,
			data : "username="+temp_username+"&password="+temp_password+"&email="+temp_email ,
			success : function(data){
				$("#massege").html(data);
			}
		});
	}
	else
	{
		alert("emil is invalid");
	}
}
























