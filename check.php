<?php
include('core/init.php');
login_redirect();
if(empty($_POST)===false)
{
	$username=$_POST['uname'];
	$password=$_POST['pwd'];

	if(empty($username)|| empty($password))
	{
		$errors[]='Username/Password can\'t be blank';
		
	}
		else if(!user_exists($username))
		{
	        $errors[]="User does not exist";
		
		}

		else if(!user_active($username))
		{
			$errors[]="Your account is not activated yet";
		
		}
	else
	{
		$login=login($username,$password);
		
		if($login===false)
		{
			$errors[]="Username/Password does not match";
		
		}
		else
		{
			
			$_SESSION['user_id']=$login;
			$_SESSION['user_name']=$username;
			$cookie_alive=set_cookie($username);
			header('Location: /welcome.php');
			exit();
		}
	}
}
if(empty($errors)==false)
{

	echo output_errors($errors);
}
?>