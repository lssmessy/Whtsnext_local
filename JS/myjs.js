$(document).ready(function(){//profile page

$('#show_pref').hide();
$("#show_msg").hide();
$("#fname").hide();
$("#lname").hide();
$("#city").hide();
$("#country").hide();
$("#profession").hide();
$("#skills").hide();
$("#email").hide();
$("#save").hide();
$("#cancel").hide();

$("#edit").on('click',function(){
	//$("#show_msg").fadeIn(1000);
	$("#fname").show();
	$("#lname").show();
$("#city").show();
$("#country").show();
$("#email").show();
$("#profession").show();
$("#skills").show();
$("#save").show();
$("#cancel").show();


$("#f_name").hide();
$("#l_name").hide();
$("#e_mail").hide();
$("#c_ountry").hide();
$("#c_ity").hide();
$("#p_rof").hide();
$("#s_kills").hide();
	});

$("#save").on('click',function(){
	$("#show_msg").fadeIn(1000);
	$("#fname").show();
setTimeout(function() {
    $("#show_msg").fadeOut(1000);
}, 2000);		
	
	});
$("#cancel").on('click',function(){
	//$("#show_msg").fadeIn(1000);
	$("#show_msg").hide();
$("#fname").hide();
$("#lname").hide();
$("#city").hide();
$("#country").hide();
$("#email").hide();
$("#save").hide();
$("#cancel").hide();
$("#profession").hide();
$("#skills").hide();

$("#f_name").show();
$("#l_name").show();
$("#e_mail").show();
$("#c_ountry").show();
$("#c_ity").show();
$("#p_rof").show();
$("#s_kills").show();

	});
});

function update_profile()//profile update check
{
var first=document.getElementByName['fname'].value;
var last=document.getElementById['lname'].value;
if(first=='')
{
	alert('Firstname can\'t be blank');
	return false;
}
else if(last=='')
{
	alert('Username can\'t be blank');
	return false;
}
else 
return true;
}
function set_pref()//set preferences
{
$("#pref").text($( "#sel1" ).val()); 
$("#first").hide();
 $("#show_pref").slideDown(500);
 $("#show_pref").fadeOut(4000);
 $("#posts").text("Showing results for the selected preference");
 update_pref();
}
function update_pref()
{
	str=document.getElementById("sel1").value;
	var xmlhttp;    
/*if ($.trim(str)=="")
  {
  document.getElementById("search_text").innerHTML="";
  return;
  }*/
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("posts").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","/AJAX/set_prefs.php?search="+str,true);
xmlhttp.send();
}

