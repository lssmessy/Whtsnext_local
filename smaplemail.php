<?php
$headers="From: Admin@whtsnext.com \r\n";
$headers.="MIME-Version: 1.0\r\n";
$headers.="Content-Type: text/html\r\n";
$link="http://betawhtsnext.weby.biz";
$message="<html> 
<body> 
<div style='margin-bottom:40px; padding:10px; background-color:#FFCC00; text-decoration:none;'><a href='http://www.whatsnext.com/'><h2>WhtsNext?</h2></a></div>
Hey there..this is just a test mail from me
<table style='background-color:orange'>
<tr><td>Email:</td><input type='text'></tr>
<tr><td>Password:</td> <input type='password'></tr>
</table>
</body></html>";

$check=mail('priteshptl84@gmail.com','HTML mail to you',$message,$headers);
if($check==true) echo "mail is sent";
else echo "mail failed";
 ?>