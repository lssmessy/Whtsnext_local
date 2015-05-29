<?php
header('Content-Type: text/xml');
echo '<?xml version="1.0" encoding="UTF-8" standalone="yes"?>';
echo '<response>';
	$food=$_GET['food'];
	$food_list=array('pizza','pavbhaji','samosa','vadapav');
	if(in_array($food,$food_list))
	{	
		echo "Wolla!! '".$food."' is at our shop!!";
	}
	else if(empty($food))
		echo "Enter something to search";
		
	else echo "We don't have '".$food."' at our shop";

echo '</response>';
?>