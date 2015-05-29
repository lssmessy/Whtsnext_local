<?php
session_start();
session_destroy();
setcookie('username','$cookie',time()-60,"","","");
header('Location: /3space_local');

?>