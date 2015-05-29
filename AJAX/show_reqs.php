<?php 
	
	$user=mysql_real_escape_string($userdata['Username']);
	$check=mysql_query("SELECT * FROM users WHERE `Username`='$user'");
	if($check===false)
	{
	echo mysql_error();
	}
	$row=mysql_fetch_array($check);
	if(empty($row['Request_Ids'])==false)
	{
	$ids=explode(",",$row['Request_Ids']);
	echo '<table cellpadding="10" class="table">';
	for($i=0; $i<sizeof($ids); $i++)
	{
		
		$name=$ids[$i];
		
		$reqs=mysql_query("SELECT * FROM users WHERE Sent_Ids LIKE '%".$name."%'");
		if($reqs===false)
	{
	echo mysql_error();
	}
		
		$rows=mysql_fetch_array($reqs);
		echo "<tr  style='border-bottom:1px solid lavender;'><td><img src='".$rows['Profile']."' height='60' width='65' /> </td>";
	echo "<td><a href=?userID=".$rows['Username'].">".ucfirst($rows['First_Name'])."
	".ucfirst($rows['Last_Name']). "</a></br></br><strong>Lives in: </strong> ".$rows['City']."<br>
	<strong>Email: </strong>".$rows['Email']." 
	<br><strong>Profession: </strong>".$rows['Profession']."<br>
	<strong>Skills: </strong>".$rows['Skills']."</td>";
	echo "<td><a class='btn btn-success btn-sm' href='?approved&connected_with=".$rows['Username']."' role='button'> Approve </a></td>";
	echo "<td><button class='btn btn-danger btn-sm'> Reject </button></td></tr>";
		}
		echo "</table>";
		}
		else echo "<strong>No requests received to you!!</strong>";
	?>
	