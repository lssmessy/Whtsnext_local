<?php
session_start();
//error_reporting(0);

require 'database/connection.php';
require 'functions/general.php';
require 'functions/users.php';

if(logged_in()){
	$user_id=$_SESSION['user_id'];
$userdata=user_data($user_id,'Username','Password',
'First_Name',
'Last_Name','Email','Profile','Gender','change_pwd','recovery_code','City','Country','Profession','Skills','Request_Ids','Sent_Ids');
if(user_active($userdata['Username'])===false)
{
	session_destroy();
	header('Location: index.php');
}
}
$errors=array();

?>