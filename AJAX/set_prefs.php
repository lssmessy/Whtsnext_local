<?php 
include ('../header_home.php');
include('../core/init.php');

$name=$_GET['search'];
$prefs=htmlentities($name);
$username=mysql_real_escape_string($userdata['Username']);
mysql_query("UPDATE `users` SET `Prefs`='$prefs' WHERE `Username`='$username'");
$query=mysql_query("SELECT * FROM `users` WHERE `Profession` LIKE '%".$prefs."%'");
//$rows=mysql_fetch_array($query);
if($query===false)
	{
		echo mysql_error();
		die();
		
	}
	$rows_count=mysql_num_rows($query);
	if(empty($rows)==false)
	{
		print_r($rows);
	}
	else if($rows_count > 0)
	{
		if($rows_count==1) $s='record';
		else $s='records';
	//$string = str_replace($name, '<span style="background-color:orange">'.$name.'</span>', $name);
	echo "Showing ".$rows_count." ".$s." whose profession is as <em><strong>'".$name."'</em></strong> <br></br>";
	echo '<table cellpadding="10" class="table" style="width:100%">';
	while($rows=mysql_fetch_array($query))
	{
		echo "<tr  style='border-bottom:1px solid lavender;'><td><img src='".$rows['Profile']."' height='60' width='65' /> </td>";
	echo "<td><a href=?userID=".$rows['Username'].">".ucfirst($rows['First_Name'])."
	".ucfirst($rows['Last_Name']). "</a></br></br><strong>Lives in: </strong> ".$rows['City']."<br>
	<strong>Email: </strong>".$rows['Email']." 
	<br><strong>Profession: </strong>".$rows['Profession']."<br>
	<strong>Skills: </strong>".$rows['Skills']."</td>";
	echo "<td><a class='btn btn-primary btn-sm' href='?userID=".$rows['Username']."' role='button'> View Profile </a></td></tr>";

} }
else echo " No post has been made by anyone for the selected Preference!!! ";

?>