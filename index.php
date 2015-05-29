<title>Login </title>
  <div class="container">
  <H2><font color="red"> This site is still under construction </font></H2>
        <div class="table-responsive">
        <table class="table"><center> <tbody> <tr> <td style="font-size:13px;border-top:none;">
         <p>Whtsnext is a social networking site which helps to connect the students across globe who had just finished </p><p>their 10th,12th,graduate or post graduate degrees and in the confusion about what to do next?</p><p id="high"><strong> So, here the idea is simple:</strong></p><p><ol><li>Sign up for your account for free!!</li><li>Set the preferences (10th ,12th, Graduate or Post Graduate, Professional)</li></ol></p><p>And there you go!!</p><ul><li>You can also browse, search, and contact the person from whom you want have advice for your career!</li><li>
And by this way, we are trying to minimize the confusion of students who just passed out!</li><li>
Hope this initiative may help a little bit to the students!</li></ul> 
</td><td style="background-color:lavender;border-top:none;border-radius:15px">
<form action="" name="logincheck" method="post" onsubmit="return login_check()" role="form">
<div class="form-group" >
<label for="login_here"><h2 id="high"><strong>Login Here:</strong></h2></label>
</div>
<?php
include('core/init.php');
include('header.php');
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
			$errors[]="Your account is not activated yet <br> <a href='activate_email.php'>Activate now</a>";
		
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
			header('Location: welcome.php');
			die();
		}
	}
}
if(empty($errors)==false)
{

	echo output_errors($errors);
}
?>
<div class="form-group" class="active">
<input type="text" name="uname" placeholder="Username or Email" class="form-control" autofocus>
</div>
<div class="form-group">
<input type="password" name="pwd" placeholder="Password" class="form-control">
</div>
<button type="submit" class="btn btn-primary btn-md"><span class="glyphicon glyphicon-log-in"></span>  Log in</button>&nbsp&nbsp&nbsp <a href="register.php" class="btn btn-success btn-md" role="button"><span class="glyphicon glyphicon-user"></span> Sign up</a></br></br>
<a href="forgotpassword.php" >Forgot password ? </a></form></td></tr></tbody></center></table>
</div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
 <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>




