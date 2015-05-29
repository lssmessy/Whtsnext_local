<?php
include('core/init.php');
$removed=remove_pic($user_id,$userdata['Profile']);
header('Location: /welcome.php');
exit();

?>