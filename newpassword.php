<title>New Password</title>
<div class="container">
<?php
include('core/init.php');
login_redirect();
include 'header.php';

if(empty($_POST)===false)
{
		$required=array('password','confirm_password');
		
		foreach($_POST as $key=>$value)
		{	
		if(empty($value) and in_array($key,$required)===true)//if value=empty and in array each $required element as key should have value 
		{
		$errors[]="Fields marked with * are required";
		break 1;
		}
		}
		
		if(strlen($_POST['password'])<6)
		{	
			$errors[]="Password length should be at least 6 characters";
		}
		if($_POST['password']!=$_POST['confirm_password'])
		{
			$errors[]="Passwords do not match";
		}
	//echo output_errors($errors);
}

?>

<form action="" method="post"> 
	<ul class="nav">
		<h2>Change Password:</h2>
<?php 
if(isset($_GET['Email'],$_GET['recovery_code'])==true)
{
	
	$email=trim($_GET['Email']);
	$recovery_code=trim($_GET['recovery_code']);
	
	if(email_exists($email)==false)
	{
		echo "<li style='color:red'>Email id for this account is not registered with us! <a href='register.php'>Register Now!</a> </li>";
	}
	else if(recover_check($email,$recovery_code)==false)
	{
		echo "<li style='color:red'>This activation link is expired or something is wrong !</li>";
	}
	/*else if(empty($errors)==false)
		{
		echo output_errors($errors);

		}*/
	
	else 
		{
			if(empty($_POST)==false && empty($errors)==true)
			{
			$password=$_POST['password'];
			$istrue=recover_password($password,$email);
			$headers = "MIME-Version: 1.0\r\n";
			$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
			$headers.= 'From: Whtsnext Admin <admin@whtsnext.com>' . "\r\n";
			
			mail($email, "Password changed for your account",
			"<body style='background-color:lavender; border-radius:5px; border:1px solid lavender;'>
			<p>Password for this account has been changed recently. If that wasn't you then please write 
			back us at admin@whtsnext.com</p> <br><br>	
			<strong><a href=http://whtsnext.com/3space_local><h2> -Team Whtsnext </h2></a></strong></body>
			",$headers);
			echo "Your password has been successfully changed..Please <a href='index.php'>Login now</a></br>";
			exit();
			}
		else if(empty($errors)==false)
		{
		echo output_errors($errors);
		}
		?>
		<li> <input type="password" name="password" placeholder="New Password"> </li><br>
		<li> <input type="password" name="confirm_password" placeholder="Confirm Password"> </li><br>
		<li> <input type="submit" value="Change password" class=" btn btn-primary" id="register_btn" > 
		<input type="button" value="Cancel" class=" btn btn-default" onclick="location.href ='index.php'" id="register_btn">
		</li>
		<br>
	</ul>
</form>
<?php 	}
}
else echo "Something went wrong";
?>
</div>
