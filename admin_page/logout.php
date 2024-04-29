<?php 
session_Start();
$_SESSION = array();
session_destroy();

echo "<script>window.open('login.php','_self')</script>";
//header('Location: http://localhost/paul-capstone-project/')
?>



?>