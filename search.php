
<!--<form class="form" action="" method="post" name="search_name">-->
<div class="form-group">
<h2> Search </h2>
</div>
<div class="form-group">
<em><input type="search" class="form-control" placeholder="Enter a name, email, city or skill to search for..." id="search_text" oninput="search();" onsearch="search();" autofocus /></em>
</div>
<!--<button type="button" class="btn btn-primary" role="button" id="search" > Search </button>&nbsp &nbsp
<button type="button" class="btn btn-default" role="button" id="clear"> Clear </button>-->
<br>
<div id="result"></div>
<script src="http://code.jquery.com/jquery-1.11.2.min.js" ></script>
<script type="text/JavaScript">
function search()
{
	str=document.getElementById("search_text").value;
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
    document.getElementById("result").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","AJAX/name.php?search="+str,true);
xmlhttp.send();
}
</script>