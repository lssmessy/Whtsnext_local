
<title>Profile</title>
<?php 
if(empty($_POST)==false)
{
	$required=array('fname','lname');
	foreach($_POST as $key=>$value)
	{
		if(in_array($key,$required)==true && empty($value))
		{
		$errors[]="All * marked fields are required !";
		break 1;
		}
		
	}	
}
?> 
<?php if(empty($errors)==false) 
{
	echo output_errors($errors);
	
}
?>
<table class="table borderless" border='0' cellpadding="2">
<tbody><tr><td><h1>Profile
<a href="#" id="edit" role="button"> (Edit) </a></h1> 
<div id="show_msg" ><span style="background-color:#5CB85C; border-radius:5px; color:white; padding:5px;">Your changes has been successfully saved! </span></div>
</td></tr>
<form  onsubmit="update_profile();" method="post"><tr><td>
<div class="form-group">
<label for='first_name'>First name : </label></td><td><label id='f_name' style="color:rgb(129, 129, 129); font-family: helvetica, arial, sans-serif; font-weight:none; font-size: 18px;"><?php echo $userdata['First_Name'];?></label>
<input type="text" id="fname" name="fname" value="<?php echo $userdata['First_Name'];?>" class="form-control" hidden>
</div>
</td></tr>
<tr><td>
<div class="form-group">
<label for='last_name'>Last name : </label></td><td><label id='l_name' style="color:rgb(129, 129, 129); font-family: helvetica, arial, sans-serif; font-weight:none; font-size: 18px;"><?php echo $userdata['Last_Name'];?></label>
<input type="text" name="lname" id="lname" value="<?php echo $userdata['Last_Name'];?>" class="form-control" hidden>
</div>
</td></tr>
<tr><td>
<div class="form-group">
<label for='city'>City : </label></td><td><label id='c_ity' style="color:rgb(129, 129, 129); font-family: helvetica, arial, sans-serif; font-weight:none; font-size: 18px;"><?php echo $userdata['City'];?></label>
<input type="text" id="city"value="<?php echo $userdata['City'];?>" class="form-control">
</div>
</td></tr>
<tr><td>
<div class="form-group">
<label for='country'>Country : </label></td><td><label id='c_ountry'style="color:rgb(129, 129, 129); font-family: helvetica, arial, sans-serif; font-weight:none; font-size: 18px;"><?php echo $userdata['Country'];?></label>
<input type="text" id="country"value="<?php echo $userdata['Country'];?>" class="form-control">
</div>
</td></tr>
<tr><td>
<div class="form-group">
<label for='profession'>Profession : </label></td><td><label id='p_rof'style="color:rgb(129, 129, 129); font-family: helvetica, arial, sans-serif; font-weight:none; font-size: 18px;"><?php echo $userdata['Profession'];?></label>
<input type="text" id="profession"value="<?php echo $userdata['Profession'];?>" class="form-control" >
</div>
</td></tr>
<tr><td>
<div class="form-group">
<label for='skills'>Skills : </label></td><td><label id='s_kills'style="color:rgb(129, 129, 129); font-family: helvetica, arial, sans-serif; font-weight:none; font-size: 18px;"><?php echo $userdata['Skills'];?></label>
<input type="text" id="skills"value="<?php echo $userdata['Skills'];?>" class="form-control" >
</div>
</td></tr>
<tr><td>
<div class="form-group">
<label for='email'>Email : </label></td><td><label id='e_mail'style="color:rgb(129, 129, 129); font-family: helvetica, arial, sans-serif; font-weight:none; font-size: 18px;"><?php echo $userdata['Email'];?></label>
<input type="text" id="email" value="<?php echo $userdata['Email'];?>" class="form-control" disabled>
</div>
</td></tr>
<tr><td></td><td>
<input type="submit" value="Save Changes" class="btn btn-success" id="save" > &nbsp &nbsp 
<input type="button" value="Cancel" class="btn btn-default" id="cancel">
</td></tr></form>
</tbody>
</table>   
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
   <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
   <script type="text/javascript" src="JS/myjs.js"></script>