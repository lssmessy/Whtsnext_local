<?php

$myerror="Sorry, Facing connection issues..";
mysql_connect('localhost','root','root') or die($myerror);
mysql_select_db('accounts') or die($myerror);

?>