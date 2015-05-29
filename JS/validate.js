function remove_pic(){
var f=confirm("Are you sure want to remove?");
if(f==true)
{
	return true;
}
else return false;
}
function check()//Register page validation
{
var user=document.forms['details']['username'].value;
var pass=document.forms['details']['password'].value;
var pass1=document.forms['details']['password_again'].value;
var fname=document.forms['details']['firstname'].value;
var bday=document.forms['details']['birthday'].value;
var email=document.forms['details']['email'].value;

if(user=='')
{
	alert('Username can\'t be blank');
	return false;
}
else if(pass=='')
{
	alert('Password can\'t be blank');
	return false;
}
else if(pass.length<6)
{
	alert('Password length must be greater than 6!');
	return false;
}
else if(pass!=pass1)
{
	alert('Passwords doesn\'t match');
	return false;
}
else if(fname=='')
{
	alert('First name can\'t be blank');
	return false;
}
else if(bday=='')
{
	alert('Birthday can\'t be blank');
	return false;
}
else if(email=='')
{
	alert('Email name can\'t be blank');
	return false;
}
else 
return true;

}
function login_check()//login page check
{
var user=document.forms['logincheck']['uname'].value;
var pass=document.forms['logincheck']['pwd'].value;
var len=pass.length;
if(user=='')
{
	alert('Username / Email can\'t be blank');
	return false;
}
else if(pass=='')
{
	alert('Password can\'t be blank');
	return false;
}
else if(len<6)
{
	alert('Ooopss..Password is too small!!');
	return false;
}
}


