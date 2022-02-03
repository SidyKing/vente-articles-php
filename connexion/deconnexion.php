<?php 
session_start();
session_destroy();
header("location:..\pages\identification.php");
exit();
?>

