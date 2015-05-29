<?php 
include('core/init.php');
include ('header_home.php');
if(logged_in()===false){
header('Location: /index.php');
exit();
}
if(isset($_GET['user']))
{
	$user=htmlentities($_GET['user']);
	check_user($user);
	
}
?>
  <div class="container">
  <div class="table-responsive">
  <table class="table" id="tab_line"><tbody><tr><td style='width:170px; border-top:none;'>
  <div style="height:200px; width:175px;border-radius:5px;margin-right: 30px;">
 <?php include 'profile_check.php';?> 
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
else 
{include'home.php';
echo '<title>Home</title>';}
?>
</td>
<td style="border-top:none; "><center>

<p><a href= "javascript:void(0);" onclick="location.href='changepassword.php'">Change Password</a></p>
<p>Currently we have <?php echo user_count();?> Active <?php echo user_count()==1 ? "user":"users";?>!</p> 
</center></td></tr><tbody></table>
</div>
</div>
</body>
</html>

