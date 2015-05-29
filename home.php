<title>Home</title>
<form role="form">
<div class="form-group" id='first'>
<label for="select-list">Set your preference:</label>
	<select class="form-control" id="sel1">
		<option value='10th Graduate'>10th Graduate</option>
		<option value='12th Graduate'>12th Graduate</option>
		<option value='Diploma Graduate'>Diploma Graduate</option>
		<option value='B.E(Bachelor of Engineering) Graduate'>B.E(Bachelor of Engineering) Graduate</option>
		<option value='M.E (Master of Engineering) Graduate'>M.E (Master of Engineering) Graduate</option>
		<option value='Professional'>Professional</option>
		<option value='Other'>Other</option>
		<option value='None'>None</option>
	</select>
	<br>

<button class="btn btn-primary" type="button" id="post1" 
onclick='set_pref();'>
Submit</button>
<button class="btn btn-default" type="button" id="cancel" style="display:inline-block;">Cancel</button></div>
<span style='background-color:#428bca; color:white; padding:5px; border-radius:5px;' id='show_pref'><em> Your preference has been set to '<strong><span id='pref'></span></strong>'</em></span>
<div class="form-group">
	<h3><label for="wall">Write something:</label></h3>
	<em><textarea class="form-control" rows="2" cols="40" id="wall" placeholder="Write something which you want to share..."></textarea></em>
</div>
<input type="button" value="Post" class="btn btn-primary"/>
<button class="btn btn-default" type="submit" id="post" >Cancel</button>
</form>
<br>

<br>
<table ><tr><td style='width:100%; border-radius:10px;'>  <p  id='posts' style='padding:10px'></p></td></tr></table>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
   <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
   <script type="text/javascript" src="JS/myjs.js"></script>