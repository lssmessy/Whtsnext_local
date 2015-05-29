<title>forgot password?</title>
<div class="container"> 
<div id="register_tab">
<?php
include "core/init.php";
login_redirect();
include 'header.php';
if(empty($_POST)===false)
{
	$required=array('email');
	//$_SESSION['email']=$_POST['email'];
	foreach ($_POST as $key=>$value)
{
	if(empty($value) && in_array($key,$required)==true)
	{
		$errors[]="* Email can't be blank ";
		break 1;
	}
	if(email_exists($_POST['email'])===false)
		{
			$email=htmlentities($_POST['email']);
			$errors[]="<p>* Email id '".$_POST['email']."' is not registered with us!! <a href='register.php'>Register Now</a></p>";
		}
	else if(filter_var($_POST['email'],FILTER_VALIDATE_EMAIL)==false)
		{
			$errors[]="* Please enter a valid email";
		}
}	
}?>
<form action="" method="post"> 
<ul class="nav">
<h1>Forgot Password?</h1>
<?php
if(isset($_GET['success']))
{
		$domain=explode('@',$_GET['email']);
		echo "We've sent a link to '<strong> ".$_GET['email']."' </strong> email address for setting a new password!! <a href='http://www.$domain[1]'> Check now </a></br>";
		echo "[Note]: Please check your '<strong>[SPAM/JUNK]</strong>' folder if mail doesn't came in your Inbox!!";
		
}
else {
if(empty($errors)==true && empty($_POST)===false)
{
	$reset_pwd=reset_password($_POST['email']);
	header('Location: forgotpassword.php?success&email='.$_POST['email'].'');
	exit();
}
else if(empty($errors)==false)
{
	echo output_errors($errors);
}
?>

<li> Enter your registered email address *: </li><br/>
<li><input type="email" name="email" style="padding:5px;" size="30">
</li></br>
<li><input type="submit" value="Submit" class=" btn btn-primary" id="register_btn">
 <input type="button" value="Cancel" class=" btn btn-default" onclick="location.href ='welcome.php'" id="register_btn">
</li> 
</form></div></div>
<?php }?>