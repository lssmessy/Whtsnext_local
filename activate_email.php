<div class='container'>
<?php include('core/init.php');
login_redirect();
include 'header.php';
if(empty($_POST)==false)
{	
	$email=$_POST['email'];
	if(empty($email)==true)
	{
		$errors[]="Email can't be blank";
	}
	
	else if(filter_var($_POST['email'],FILTER_VALIDATE_EMAIL)==false)
		{
			$errors[]="Please enter a valid email";
		}
	else if(email_exists($_POST['email'])===false)
	{
		$errors[]="Email id '<strong>".$email."</strong>' is not registered with us!!";
	}
	else if(is_active($email)==true)
	{
		$errors[]="This email id is already Active!!";
	}

}
if(isset($_GET['success']))
{
	echo "Activation link has been sent to '<strong>".$_GET['email']."</strong>'!";
	exit();
}
else if(empty($errors)==true && empty($_POST)==false)
{
		$register_data=array(
		'Email'      =>$_POST['email'],
		'Email_Code'  =>md5($_POST['email']+ microtime()));
		email_active_again($register_data);
		header('Location: /activate_email.php?success&email='.$_POST['email'].'');
	exit();
}
if(empty($errors)==false or empty($_POST)==true)
{
?>
<form role="form" action="" method="post">
<div class="form-group">
<label for="email"><h3> Enter your registered email address *: </h3></label>
<?php 
	echo output_errors($errors);
?>
</div>
<div class="form-group ">
<input type="email" name="email" size="35" autofocus />
</div>
<input type="submit" value="Submit" class="btn btn-success">&nbsp &nbsp
 <input type="button" value="Cancel" onclick="location.href ='/index.php'" class="btn btn-default">
</form>
<?php }?>
</div>