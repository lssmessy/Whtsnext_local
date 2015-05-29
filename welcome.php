<?php 
include('core/init.php');
include ('header_home.php');
if(logged_in()===false){
header('Location: /index.php');
exit();
}
?>
  <div class="container">
  <div class="table-responsive">
  <table class="table" id="tab_line"><tbody><tr><td style='width:170px; border-top:none;'>
  <div style="height:200px; width:175px;border-radius:5px;margin-right: 30px;">
 <?php if(isset($_GET['userID']))
 {
	$userId=$_GET['userID'];
	if(trim(empty($userId))==true)
	{
	echo "Sorry, Not a valid input";
	}
	else{
	$image=show_user($userId);
	if($image!=0)
	{
	echo "<img src=/".$image['Profile']." alt=".$image['Profile']." class='img img-responsive' style='width:100%; border-radius:5px;'/><br><br>";
	echo ucfirst($image['First_Name'])." ".ucfirst($image['Last_Name'])."<br><strong> Lives in </strong><br>";
	
	echo ucfirst($image['City']).",".ucfirst($image['Country'])."<br>";
	echo "<title>".ucfirst($image['First_Name'])." ".ucfirst($image['Last_Name'])." </title> <br>";
	
	if(empty($userdata['Request_Ids'])==false)
	{	
		$recv=explode(',',$userdata['Request_Ids']);
		$sent=explode(',',$image['Sent_Ids']);
		for($i=0; $i<sizeof($recv); $i++)
		{
			for($j=0; $j<sizeof($sent); $j++)
			{
				if($recv[$i]==$sent[$j])
				{
					// echo "<a class='btn btn-success btn-sm' href='?approved&connected_with=".$image['Username']."' role='button'> Approve </a><br>";
					// echo "<button class='btn btn-danger btn-sm'> Reject </button>";
					
					echo "<button class='btn btn-success btn-sm' onclick=location.href='?approved&connected_with=".$image['Username']."' style='width:100%;'> Approve </button></br>";
					echo "&nbsp &nbsp <button class='btn btn-danger btn-sm' style='width:100%;'> Reject </button></br>";
					
					break;
				}
				else 
				{
					echo "<button class='btn btn-primary btn-sm' onclick=location.href='?requests&success&user_=".$image['Username']."' style='width:100%;'> Send Request </button></br>";
					echo "&nbsp &nbsp <button class='btn btn-success btn-sm' style='width:100%;'> Want Advice? </button></br>";
					break;
				}
			}
		}
		
					
	}
	
	
	
	}
	else echo "<strong>Profile Not found</strong>";
	}
 }
 else  include 'profile_check.php';?> 
</div>

</td>
<td style="width:50%;border-top:none;">
<?php if(isset($_GET['home'])==true)
{ include'home.php';
echo '<title>Home</title>';
}
else if(isset($_GET['profile'])==true)
{ include'profile.php';
echo '<title>Profile</title>';
}

else if(isset($_GET['browse'])==true)
{include'browse.php';
echo '<title>Browse</title>';
}

else if(isset($_GET['search'])==true)
{include'search.php';
echo '<title>Search</title>';
}
else if(isset($_GET['idea'])==true)
{include'idea.php';
echo '<title>Idea</title>';
}
else if(isset($_GET['requests'])==true)
{include'requests.php';
echo '<title>Requests</title>';
}
else if(isset($_GET['approved'])==true)
{include'approved.php';
echo '<title>Requests</title>';
}
else if(isset($_GET['success'])==true)
{include'search.php';
echo '<title>Search</title>';
}
else 
{include'home.php';
echo '<title>Home</title>';}
?>
</td>
<td style="border-top:none; "><center>

<p><a href= "javascript:void(0);" onclick="location.href='/changepassword.php'">Change Password</a></p>
<p>Currently we have <?php echo user_count();?> Active <?php echo user_count()==1 ? "user":"users";?>!</p> 
</center></td></tr><tbody></table>
</div>
</div>
</body>
</html>

