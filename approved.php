<?php 
if(isset($_GET['connected_with']))
{
$friend=$_GET['connected_with'];
approved($userdata['Username'],$friend);
}
?>