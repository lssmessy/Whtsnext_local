<title>New Password</title>
<div id="register_tab">
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
	<ul>
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
		<li> <input type="submit" value="Change password"id="register_btn" > </li><br>
	</ul>
</form>
<?php 	}
}
else echo "Something went wrong";
?>
</div>
