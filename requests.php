<Title> Requests</title>
<?php if(isset($_GET['user_']))
{
	$i = 0;
	$req_id = mt_rand(1,9);
	do {
    $req_id .= mt_rand(0, 9);
	} while(++$i < 5);
	
	$username=$_GET['user_'];
	requests($username,$req_id,$userdata['Username']);
	
}
if(isset($_GET['show_reqs']))
{
	echo "<h1>Received Requests </h1>";	
	include ('AJAX/show_reqs.php');		
}
else if(isset($_GET['sent_req']))
{
	echo "<h1>Sent Requests </h1>";	
	include ('AJAX/show_sent.php');		
}

?>
