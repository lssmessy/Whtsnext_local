<?php
include('core/init.php');
//
if(empty($_POST)===false)
{
	$username=$_POST['uname'];
	$password=$_POST['pwd'];

	if(empty($username) || empty($password))
	{
		$errors=array( 'Enter username/password correctly..Go to <a href="index.php"> Login page</a>');
		echo $errors[0];
	}
		else if(!user_exists($username))
		{
	        $errors=array( "User does not exist..please register to login!! Go to <a href='index.php'> Login page</a>");
		echo $errors[0];
		}

		else if(!user_active($username))
		{
			$errors=array( "Your account is not activated yet..Go to <a href='index.php'> Login page</a>");
		echo $errors[0];
		}
	else
	{
		$login=login($username,$password);
		
		if($login===false)
		{
			$errors=array("Username/Password combination does not match..Go to <a href='index.php'> Login page</a>!!");
		echo $errors[0];
		}
		else
		{
			
			$_SESSION['user_id']=$login;
			$_SESSION['user_name']=$username;
			$cookie_alive=set_cookie($username);
			header('Location: welcome.php');
			exit();
		}
	}
}
?>