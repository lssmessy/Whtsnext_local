<?php
function email($to,$subject,$body)
{
	$headers = "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
$headers.='From : admin@gmail.com';

	mail($to,$subject,$body,$headers);
}

function login_redirect()
{
	if(logged_in()==true)
	{
	header('Location: welcome.php');
	exit();
	}
	
}
function protect_page(){
if(logged_in()==false)
{
	echo "You dont seems to be logged in or registered!! <a href='index.php'>Log in </a>";
	exit();
}
}
function array_sanitize(&$items)
{
	$items=mysql_real_escape_string($items);
}
function sanitize($data)
{
	return mysql_real_escape_string($data);
}
function output_errors($errors)
{
	echo '<li style="font-size:14px; color:red;">'.implode('</li><li id="error_li" style="font-size:14px;color:red;">',$errors).'</li>';
}
?>