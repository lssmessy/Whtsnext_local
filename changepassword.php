
 <!--<div id="register_tab"> -->
<?php
include "core/init.php";
include 'header.php';
protect_page();
if(empty($_POST)==false)
{
	$required=array('current_pass','pass_new','pass_new_again');
	foreach($_POST as $key=>$value)
	{
		if(empty($value)==true && in_array($key,$required)==true)
		{
			$errors[]="Fields marked with * are required ";
			break 1;
		}
	}
	if(md5($_POST['current_pass'])!=$userdata['Password'])
	{
		$errors[]="Your current password is wrong!";
	}
	else {
		if(strlen($_POST['pass_new'])<6)
		{
			$errors[]="Your password length must be greater than 6 characters!";
		}
		else if($_POST['pass_new']!=$_POST['pass_new_again'])
		{
			$errors[]="Your new passwords do not match!";
		}
		
	}
	
}
?>
<div class="container">
<title>Change Password</title>
<h1>Change Password:</h1>
<?php 
if(isset($_GET['success']))
{
	echo "Your password has been successfully changed..<a href='welcome.php'>Home</a>";
}
else{
	if(empty($_POST)==false && empty($errors)==true)
	{
		change_password($user_id,$_POST['pass_new']);
		header('Location: changepassword.php?success');
	}
	else if(empty($errors)==false)
{
	echo output_errors($errors);
}
?>
<form action="" method="post">
<ul class="nav">
		<li>Current Password *:</li>
		<input type="password" name="current_pass"><br>
		<li>New Password *:</li>
		<input type="password" name="pass_new"><br>
		<li>Re-type new Password *:</li>
		<li><input type="password" name="pass_new_again"></li><br>
		<input type="submit" value="Change Password" class=" btn btn-primary" id="register_btn">
		<input type="button" value="Cancel" class=" btn btn-default" onclick="location.href ='welcome.php'" id="register_btn">
</ul>
</form><!--</div>-->
<?php }?>
</div>