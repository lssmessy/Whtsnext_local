<?php
if(isset($_FILES['profile'])==true)
{
	if(empty($_FILES['profile']['name'])==true)
	echo "please choose a file";
	else 
	{
	$allowed=array('jpg','jpeg','png','gif');
	
	$file_name=$_FILES['profile']['name'];//name of the file situated in 'profile' folder
	$file_extn=strtolower(end(explode('.',$file_name)));//end() is used to take last element of the array and exlode will show number of elements separated by '.'
	//strtolower is used because some times images have extensions in CAPITALS.so to compare with lower, we are doing this 
	$file_temp=$_FILES['profile']['tmp_name'];//temporary file name
	$file_size=$_FILES['file']['size'];
	$max_size=1000000;
	if(in_array($file_extn,$allowed)==true && $file_size<=$max_size)
	{
		change_profie_pic($user_id,$file_temp,$file_extn);
		header('Location:/welcome.php');
	
	
	//allowed to upload
	}
	else
	{
		echo "Incorrect file type or file is too large. allowed type are :";
		echo implode(',',$allowed);
		
		
	}
	}
	echo '<form action="" method="post" enctype="multipart/form-data"><br/>
<input type="file" name="profile" class="btn btn-default" style="width:100%; height=50px;" ><br/>
<button class="form-control btn btn-primary" type="submit" id="post" ><span class=" glyphicon glyphicon-upload"></span> Upload</button></form><br/>';
}
else if(empty($userdata['Profile'])==false  && $userdata['Profile']!='images/male.png' && $userdata['Profile']!='images/female.png')
{
	echo "<img src=".$userdata['Profile']." alt=".$userdata['First_Name']." class='img img-responsive' style='width:100%; border-radius:5px;'/> </br></br>";
	echo '<form action="removed.php" method="post" onSubmit="return remove_pic()"">
	<button class="form-control btn btn-danger" type="submit" id="post" ><span class="glyphicon glyphicon-trash"></span> Remove Picture</button> </br></form><br>';
	
}

else{
	if($userdata['Gender']=='male')
	{
	$userdata['Profile']='images/male.png';
	$pic=$userdata['Profile'];
	$email=$userdata['Email'];
	update_default($pic,$email);
	echo "<img src='".$userdata['Profile']."' alt='no image' class='img img-responsive' style='width:100%;border-radius:5px;'/></br>";
	}
else if($userdata['Gender']=='female')
{ 
$userdata['Profile']='images/female.png';
	$pic=$userdata['Profile'];
	$email=$userdata['Email'];
	update_default($pic,$email);
echo "<img src='".$userdata['Profile']."' alt='no image' class='img img-responsive' style='width:100%; height:100%;border-radius:5px;'/></br>";}

echo '<form action="" method="post" enctype="multipart/form-data"> <input type="file" name="profile" class="btn btn-default" style="width:100%; height=50px;" /></br>
<button class="form-control btn btn-primary" type="submit" id="post" ><span class=" glyphicon glyphicon-upload"></span> Upload</button></br></form></br>';
}

echo '<a href="welcome.php?profile" style="color:orange"><strong>'.ucfirst($userdata['First_Name']).' '.ucfirst($userdata['Last_Name']).'</strong></a><br/><br>';

echo "<strong>Username: </strong>".$userdata['Username']."<br>";
echo "<strong>Lives In: </strong><br>".ucfirst($userdata['City']).",".ucfirst($userdata['Country'])."<br/> <br/>";
?>

<a href='#'>Messages</a><br>
<a href='#'>Connected with</a><br>
<a href="?requests&show_reqs=true&user=<?php echo $userdata['Username'];?>">Requests Received(<?php echo "<font color=green>".requests_count($userdata['Username'])."</font>";?>)</a><br>
<a href='?requests&sent_req=true&user=<?php echo $userdata['Username'];?>'>Requests Sent(<?php echo "<font color=red>".sent_count($userdata['Username'])."</font>";?>)</a><br>