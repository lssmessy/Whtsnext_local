<?php
function approved($user,$friend)
{
$user=mysql_real_escape_string($user);
$friend=mysql_real_escape_string($friend);
$find=mysql_query("SELECT * FROM users WHERE `Username`='$user'");
$friend1=mysql_query("SELECT * FROM users WHERE `Username`='$friend'");
$row=mysql_fetch_array($find);
$row_fr=mysql_fetch_array($friend1);
if(empty($row['Request_Ids'])==false)
	{
	$ids=explode(",",$row['Request_Ids']);
	$ids1=explode(",",$row['Sent_Ids']);
	}
	else {$ids=$row['Request_Ids'];$ids1=$row['Sent_Ids'];}
	for($i=0; $i<sizeof($ids); $i++)
	{
		for($j=0; $j<sizeof($ids1); $j++)
		{
		if($ids[$i]==$ids1[$j])
		$name=$ids[$i];		
		$reqs=mysql_query("SELECT `Username` FROM users WHERE Sent_Ids LIKE '%".$name."%'");
		$row2=mysql_fetch_array($reqs);
		}
	}
	print_r($row2);
	die();

}

function sent_count($user)
{
	$user=mysql_real_escape_string($user);
	$check2=mysql_query("SELECT * FROM users WHERE `Username`='$user'");
	$row2=mysql_fetch_array($check2);
	if(empty($row2['Sent_Ids'])==false)
	{
	$ids=explode(",",$row2['Sent_Ids']);
	return sizeof($ids);
	}
	else {
	$ids= 0; 
	return $ids;
	}
	
	
}
function requests_count($user)
{
	$user=mysql_real_escape_string($user);
	$check2=mysql_query("SELECT * FROM users WHERE `Username`='$user'");
	$row2=mysql_fetch_array($check2);
	if(empty($row2['Request_Ids'])==false)
	{
	$ids=explode(",",$row2['Request_Ids']);
	return sizeof($ids);
	}
	else {
	$ids= 0 ; 
	return $ids;
	}
	
}
function show_user($userId)
{
	$user=mysql_real_escape_string($userId);
	$check=mysql_query("SELECT * FROM users WHERE `Username`='$user'");
	if($check===false)
	{
	echo mysql_error();
	
	}
	$row=mysql_fetch_array($check);
	$count=mysql_num_rows($check);
	if($count==0)
	{
		return 0;
	}
	else return $row;
	
}
function requests($user,$random,$sender)
{
	$match=false;
	$user=mysql_real_escape_string($user);
	$random=mysql_real_escape_string($random);
	$check=mysql_query("SELECT * FROM users WHERE `Username`='$user'");
	$check1=mysql_query("SELECT * FROM users WHERE `Username`='$sender'");
	if($check===false || $check1===false)
	{
	echo mysql_error();
	
	}
	$row=mysql_fetch_array($check);
	$row1=mysql_fetch_array($check1);
	if(empty($row['Request_Ids'])==false){	$ids=explode(",",$row['Request_Ids']);}
	else {$ids=0;}
	if(empty($row1['Sent_Ids'])==false){	$ids1=explode(",",$row1['Sent_Ids']);}
	else $ids1=0;
	if($ids!=0 || $ids1!=0)
	{
	for($i=0; $i<sizeof($ids); $i++)
	{
		for($j=0; $j<sizeof($ids1); $j++)
		{
			if($ids[$i]==$ids1[$j])
			{
				echo "You've already sent request to <strong>".$row['Username']."</strong><br>Please wait until <strong>".$row['Username']."</strong> approves your request!!";
				$match=true;
				break;
			}
			$match=false;
		}
		
	}
	
	}
if($match==false){	
	if(empty($row['Request_Ids'])==false)
	{
	$arr=array($row['Request_Ids'],$random);
	$rand=implode(",",$arr);
	mysql_query("UPDATE users SET `Request_Ids`='$rand' WHERE `Username`='$user'");
	}
	if(empty($row1['Sent_Ids'])==false)
	{
	$arr1=array($row1['Sent_Ids'],$random);
	$rand1=implode(",",$arr1);
	mysql_query("UPDATE users SET `Sent_Ids`='$rand1' WHERE `Username`='$sender'");
	}
	if(empty($row['Request_Ids'])==true){mysql_query("UPDATE users SET `Request_Ids`='$random' ,`Common`='$random' WHERE `Username`='$user'");}
	if(empty($row1['Sent_Ids'])==true){mysql_query("UPDATE users SET `Sent_Ids`='$random' ,`Common`='$random' WHERE `Username`='$sender'");}
	
	$check2=mysql_query("SELECT * FROM users WHERE `Username`='$user'");
	$check3=mysql_query("SELECT * FROM users WHERE `Username`='$sender'");
	$row2=mysql_fetch_array($check2);
	$row3=mysql_fetch_array($check3);
	echo "Your request is sent to <strong>".$row2['Username']."";
}		
}

function check_user($user)
{
	$user=mysql_real_escape_string($user);
	mysql_query("SELECT Request_ids FROM users WHERE `Username`='$user'");
}

function update_default($pic,$email)
{
	mysql_query("UPDATE `users` SET Profile='$pic' WHERE Email='$email'");
}

function is_active($email)
{	
	$email=mysql_real_escape_string($email);
	$check=mysql_query("SELECT COUNT(`ID`) FROM users WHERE `Email`='$email' AND `Active`=0");
	if(mysql_result($check,0)==1){
	return false;
	}
	else{
	return true;
	}
}

function email_active_again($register_data)
{
	$head_text="<body style='background-color:lavender; border-radius:5px; border:1px solid lavender;'>
	<p style='background:#3B5998; padding:20px;font:bold; font-size:30px'><a href='whtsnext.com/3space_local' style=' text-decoration:none;decoration:none;color:white;'>Whtsnext</a></p></br>";
	$email=$register_data['Email'];
	$Email_Code=$register_data['Email_Code'];
	mysql_query("UPDATE `users` SET Email_Code='$Email_Code' WHERE Email='$email'");
	$mail=email($register_data['Email'],"Activation link",
	$head_text."Hey, <em><strong>".ucfirst($data['First_Name'])."</strong></em> <br><br>
	Please click on the below link to Activate your account: <br><br>
	<a href=http://whtsnext.com/3space_local/activate.php?Email=".$register_data['Email']."&Email_Code=".$register_data['Email_Code']. ">Click here </a> <br> or copy-paste <br> 
	http://whtsnext.com/3space_local/activate.php?Email=".$register_data['Email']."&Email_Code=".$register_data['Email_Code']. "
	<br> 
	<br><br>
	<strong><a href=http://whtsnext.com/3space_local><h2> -team whtsnext </h2></a></strong></body>"
	);
}

function recover_check($email,$recovery_code)
{
	$email=mysql_real_escape_string($email);
	$check=mysql_query("SELECT COUNT(`ID`) FROM `users` WHERE Email='$email' AND recovery_code='$recovery_code'");
	if(mysql_result($check,0)==1){
	//mysql_query("UPDATE `users` SET `change_pwd`=1 WHERE `Email`='$email'");
	return true;
	}
	else return false;
}

function recover_password($password,$email)
{
	$email=mysql_real_escape_string($email);
	$password=md5($password);
	$recovery_code=md5($email + microtime());
	mysql_query("UPDATE `users` SET `Password`='$password',`change_pwd`=1,`recovery_code`='$recovery_code' WHERE `Email`='$email'");
	
	
}

function reset_password($email)
{
	$head_text="<body style='background-color:lavender; border-radius:5px; border:1px solid lavender;'>
	<p style='background:#3B5998; padding:20px;font:bold; font-size:30px'><a href='whtsnext.com/3space_local' style=' text-decoration:none;decoration:none;color:white;'>Whtsnext</a></p></br>";
	$email=mysql_real_escape_string($email);
	//$new_password=md5(substr($email,0,10));
	$recovery_code=md5($email+microtime());
	mysql_query("UPDATE `users` SET recovery_code='$recovery_code',change_pwd=0 WHERE Email='$email'");
	$userdata=mysql_query("SELECT * FROM `users` WHERE Email='$email'");
	$data=mysql_fetch_assoc($userdata);
	$mail=email($email,"Password Reset",
	$head_text."Hey, <em><strong>".ucfirst($data['First_Name'])."</strong></em> <br> <br>
	Please <a href=http://whtsnext.com/3space_local/newpassword.php?Email=".$email."&recovery_code=".$recovery_code.">Click here</a>
	(or copy-paste below link ) to set new password for your account:<br><br>
	http://whtsnext.com/3space_local/newpassword.php?Email=".$email."&recovery_code=".$recovery_code."
	<br><br>
	<strong><a href=http://whtsnext.com/3space_local><h2> -team whtsnext </h2></a></strong></body>
	"
	);
}

function reset_password_tifin($email)
{
	$head_text="<body style='background-color:lavender; border-radius:5px; border:1px solid lavender;'>
	<p style='background:#3B5998; padding:20px;font:bold; font-size:30px'><a href='whtsnext.com/3space_local' style=' text-decoration:none;decoration:none;color:white;'>Whtsnext</a></p></br>";
	$email=mysql_real_escape_string($email);
	//$new_password=md5(substr($email,0,10));
	$recovery_code=md5($email+microtime());
	mysql_query("UPDATE `tifins` SET recovery_code='$recovery_code',change_pwd=0 WHERE Email='$email'");
	$userdata=mysql_query("SELECT * FROM `tifins` WHERE Email='$email'");
	$data=mysql_fetch_assoc($userdata);
	$mail=email($email,"Password Reset",
	$head_text."Hey, <em><strong>".ucfirst($data['Username'])."</strong></em> <br> <br>
	Please <a href=http://whtsnext.com/3space_local/newpassword.php?Email=".$email."&recovery_code=".$recovery_code.">Click here</a>
	(or copy-paste below link ) to set new password for your account:<br><br>
	http://whtsnext.com/3space_local/newpassword.php?Email=".$email."&recovery_code=".$recovery_code."
	<br><br>
	<strong><a href=http://whtsnext.com/3space_local><h2> -team whtsnext </h2></a></strong></body>
	"
	);
}


function remove_pic($user_id,$file_temp)
{
	$user_id=(int)$user_id;
	unlink($file_temp);
	$query=mysql_query("UPDATE `users` SET `Profile`='' WHERE `ID`=$user_id");
	
	 
}


function change_profie_pic($user_id,$file_temp,$file_extn)
{
	$user_id=(int)$user_id;
	$file_path='images/profile/'.substr(md5($file_temp + time()),0,10).'.'.$file_extn;
	move_uploaded_file($file_temp,$file_path);
	$file_path=mysql_real_escape_string($file_path);
	mysql_query("UPDATE `users` SET `Profile`='$file_path' WHERE `ID`=$user_id");
	
}

function activate($email,$email_code)
{
	
	$email=mysql_real_escape_string($email);
	$email_code=mysql_real_escape_string($email_code);
	$check=mysql_query("SELECT COUNT(`ID`) FROM users WHERE `Email`='$email' AND `Email_Code`='$email_code' AND `Active`=0");
	if(mysql_result($check,0)==1){
	mysql_query("UPDATE `users` SET `Active`=1 WHERE `Email`='$email'");
	return true;
	}
	else{
	return false;
	}
	
}
function change_password($user_id,$password)
{
	$user_id=(int)$user_id;
	$password=md5($password);
	mysql_query("UPDATE `users` SET `Password`='$password' WHERE `ID`=$user_id");
}
function register_user($register_data)
{
	$head_text="<body style='background-color:lavender; border-radius:5px; border:1px solid lavender;'>
	<p style='background:#3B5998; padding:20px;font:bold; font-size:30px'><a href='whtsnext.com/3space_local' style=' text-decoration:none;decoration:none;color:white;'>Whtsnext</a></p></br>";
	array_walk($register_data,'array_sanitize');
	$pass=$register_data['Password'];
	$register_data['Password']=md5($register_data['Password']);
	$fields='`'.implode('`,`',array_keys($register_data)).'`';
	$data='\''.implode('\',\'',$register_data).'\'';
	mysql_query("INSERT INTO `users` ($fields) VALUES ($data)");
	$mail=email($register_data['Email'],"Confirm your registration",
	$head_text."Hey, <strong>".ucfirst($register_data['First_Name'])."</strong> <br><br>
	
	<h1>Welcome to <strong>'WhtsNext'</strong> student's network!</h1><br><br>
	Click on following link to Activate your account:<br><br>
	<a href=http://whtsnext.com/3space_local/activate.php?Email=".$register_data['Email']."&Email_Code=".$register_data['Email_Code']. ">Click here to Activate</a><br><br>
	Please use following credentials to login after successful activation:<br><br>
	Username: <em>".$register_data['Username']."</em><br><br>
	Password: <em>".$pass."</em><br><br> 
	<br><br><br>
	<strong><a href=http://whtsnext.com/3space_local><h2> -team whtsnext </h2></a></strong></body>"
	);
	
}
function register_user_tifin($register_data)
{
	
	array_walk($register_data,'array_sanitize');
	$pass=$register_data['Password'];
	$register_data['Password']=md5($register_data['Password']);
	$fields='`'.implode('`,`',array_keys($register_data)).'`';
	$data='\''.implode('\',\'',$register_data).'\'';
	$check=mysql_query("INSERT INTO `tifins` ($fields) VALUES ($data)");
	/* $mail=email($register_data['Email'],"Confirm your registration",
	"Hey, <strong>".ucfirst($register_data['First_Name'])."</strong> <br><br>
	
	<h1>Welcome to <strong>'WhtsNext'</strong> student's network!</h1><br><br>
	Click on following link to Activate your account:<br><br>
	<a href=http://whtsnext.com/3space_local/activate.php?Email=".$register_data['Email']."&Email_Code=".$register_data['Email_Code']. ">Click here to Activate</a><br><br>
	Please use following credentials to login after successful activation:<br><br>
	Username: <em>".$register_data['Username']."</em><br><br>
	Password: <em>".$pass."</em><br><br> 
	<br><br><br>
	<h2>-team whtsnext<h2>"
	); */
	return true;
}

function user_count()
{
	$query=mysql_query("SELECT COUNT(`ID`) FROM users WHERE Active=1");
	return mysql_result($query,0);
	
}
function user_data($user_id)
{
	$data=array();
	$num_of_args=func_num_args();
	$get_args=func_get_args();
	if($num_of_args > 1)
	{
		unset($get_args[0]);
		$fields='`'.implode('`,`',$get_args).'`';
		
		$data=mysql_fetch_assoc(mysql_query("SELECT $fields FROM users WHERE ID=$user_id"));
		return $data;
		
	}
}
function logged_in(){
	return (isset($_SESSION['user_id'])) ? true : false;
}
function user_exists($username){
	$username=sanitize($username);
	$query=mysql_query("SELECT COUNT(`ID`) FROM users WHERE (Username='$username' OR `Email`='$username')");
	return (mysql_result($query,0)==1) ? true : false;
}
function user_exists_tifin($username){
	$username=sanitize($username);
	$query=mysql_query("SELECT * FROM tifins WHERE (Username='$username' OR `Email`='$username')");
	$row=mysql_num_rows($query);
	if($row>0)
		return true;
	else
		false;
}
function email_exists($email){
	$email=sanitize($email);
	$query=mysql_query("SELECT COUNT(`ID`) FROM `users` WHERE Email='$email'");
	return (mysql_result($query,0)==1) ? true : false;
}
function email_exists_tifin($email){
	$email=sanitize($email);
	$query=mysql_query("SELECT * FROM `tifins` WHERE Email='$email'");
	$row=mysql_num_rows($query);
	if($row>0)
		return true;
	else
		false;
}

function user_active($username){
	$username=sanitize($username);
	$query=mysql_query("SELECT COUNT(`ID`) FROM users WHERE (Username='$username' OR `Email`='$username') AND Active=1 ");
	return (mysql_result($query,0)==1) ? true : false;
}
function user_id_func($username){
	$username=sanitize($username);
	$query=mysql_query("SELECT `ID`FROM users WHERE (Username='$username' OR `Email`='$username')");
	return (mysql_result($query,0,'ID'));
}
function login($username,$password)
{
	$user_id=user_id_func($username);
	$username=sanitize($username);
	$password=md5($password);
	$query=mysql_query("SELECT COUNT(`ID`) FROM users WHERE (Username='$username' OR `Email`='$username') AND Password='$password' ");
	return (mysql_result($query,0)==1) ? $user_id : false;
}
function login_tifin($username,$password)
{
	$user_id=user_id_func($username);
	$username=sanitize($username);
	$password=md5($password);
	$query=mysql_query("SELECT * FROM tifins WHERE (Username='$username' OR `Email`='$username') AND Password='$password' ");
	$row=mysql_num_rows($query);
	if($row>0)
		return true;
	else
		false;
}
function set_cookie($cookie)
{
	setcookie('username','$cookie',time()+300,"","","");
	
}

?>