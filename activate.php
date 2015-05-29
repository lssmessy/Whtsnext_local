<div class='container'>
<?php
include('core/init.php');
login_redirect();
include 'header.php';
if(isset($_GET['great'])==true)
{
?>
<h1> Congratulations..!!!</h1>

<?php
echo "<p>Your account has been successfully activated!!<a href='/'>Log in now</a></p>";
}
else if(isset($_GET['Email'],$_GET['Email_Code'])==true)
{
	$email=trim($_GET['Email']);
	$email_code=trim($_GET['Email_Code']);
	if(email_exists($email)==false)
	{
		$errors[]="Email id for this account is not registered with us! <a href='register.php'>Register Now!</a>";
	}
	else if(activate($email,$email_code)==false)
	{
		$errors[]="We have some problems in activating your account!";
		
	}
	if(empty($errors)==false)
	{
		?>
		<h2>Oopss...</h2>
		<?php
		echo output_errors($errors);
	}
	else
	{
		echo "in activate suceess loop";
		header('Location: /activate.php?great');
	}
}
else
{
	header('Location : /index.php');
	exit();
}
?>
</div>
<title>Activation</title>