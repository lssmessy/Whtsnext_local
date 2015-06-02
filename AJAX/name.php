<?php 
include ('../header_home.php');
include('../core/init.php');

	$name=$_GET['search'];
	$GLOBALS['match']=false;
	
	if(trim($name)=='')
	{}
	else
	{
	require '../core/database/connection.php';
	$query=mysql_query("
	SELECT * 
	FROM users
	WHERE (First_Name LIKE '%".$name."%') OR (Last_Name LIKE '%".$name."%') OR (City LIKE '%".$name."%') OR (Email LIKE '%".$name."%') OR (Profession LIKE '%".$name."%') OR (Skills LIKE '%".$name."%')");
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
	echo "Found ".$rows_count." ".$s." matching with <em><strong>'".$name."'</em></strong> <br>";
	echo '<table cellpadding="10" class="table">';
	while($rows=mysql_fetch_array($query))
	{
	
	$fname=str_replace($name, '<span style="background-color:orange">'.$name.'</span>', $rows['First_Name']); 
	$lname=str_replace($name, '<span style="background-color:orange">'.$name.'</span>', $rows['Last_Name']); 
	$city=str_replace($name, '<span style="background-color:orange">'.$name.'</span>', $rows['City']); 
	$email=str_replace($name, '<span style="background-color:orange">'.$name.'</span>', $rows['Email']); 
	$profession=str_replace($name, '<span style="background-color:orange">'.$name.'</span>', $rows['Profession']); 
	$skills=str_replace($name, '<span style="background-color:orange">'.$name.'</span>', $rows['Skills']);
	if($rows['Email']==$userdata['Email'])
{
		echo "<tr  style='border-bottom:1px solid lavender;'><td><img src='".$rows['Profile']."' height='60' width='65' /> </td>";
	echo "<td><a href='?profile'>".ucfirst($fname)."
	".ucfirst($lname). "(You Only)</a></br></br><strong>Lives in: </strong> ".$city."<br>
	<strong>Email: </strong>".$email." 
	<br><strong>Profession: </strong>".$profession."<br>
	<strong>Skills: </strong>".$skills."</td>";
	echo "<td><a class='btn btn-success btn-sm' href='?profile=".$rows['Username']."' role='button'> View Profile </a></td></tr>";
}	
	/* if(empty($userdata['Request_Ids'])==false && $match==true)
	{	
		$recv=explode(',',$userdata['Request_Ids']);
		$sent=explode(',',$rows['Sent_Ids']);
		for($i=0; $i<sizeof($recv); $i++)
		{
			for($j=0; $j<sizeof($sent); $j++)
			{
				if($recv[$i]==$sent[$j])
				{
					echo "<tr  style='border-bottom:1px solid lavender;'><td><img src='".$rows['Profile']."' height='60' width='65' /> </td>";
					echo "<td><a href=?userID=".$rows['Username'].">".ucfirst($rows['First_Name'])."
					".ucfirst($rows['Last_Name']). "</a></br></br><strong>Lives in: </strong> ".$rows['City']."<br>
					<strong>Email: </strong>".$rows['Email']." 
					<br><strong>Profession: </strong>".$rows['Profession']."<br>
					<strong>Skills: </strong>".$rows['Skills']."</td>";
					echo "<td><a class='btn btn-success btn-sm' href='?approved&connected_with=".$rows['Username']."' role='button'> Approve </a></td>";
					echo "<td><button class='btn btn-danger btn-sm'> Reject </button></td></tr>";
					$GLOBALS['match']=true;
					break;
				}
				
			}
		}
		
					
	}
	 */
	else {
	echo "<tr  style='border-bottom:1px solid lavender;'><td><img src='".$rows['Profile']."' height='60' width='65' /> </td>";
	echo "<td><a href=?userID=".$rows['Username'].">".ucfirst($fname)."
	".ucfirst($lname). "</a></br></br><strong>Lives in: </strong> ".$city."<br>
	<strong>Email: </strong>".$email." 
	<br><strong>Profession: </strong>".$profession."<br>
	<strong>Skills: </strong>".$skills."</td>";
	echo "<td><a class='btn btn-primary btn-sm' href='?userID=".$rows['Username']."' role='button'> Send Request </a></td>";
	echo "<td><a class='btn btn-success btn-sm' href='?userID=".$rows['Username']."' role='button'> View Profile </a></td></tr>";
	}
	}
	echo "</table>";
	}
	else 
	{			
		 echo "No records found for <em><strong>'".$name."'</em></strong>";
	}


}
?>

