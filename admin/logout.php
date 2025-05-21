<?php
$hostname  = "http://localhost:3000/simple-blog-page-master";
$conn = mysqli_connect("localhost","root","","news-site") or die("Connection failed : ".mysqli_connect_error());
session_start();
session_unset();
session_destroy();
header("Location: {$hostname}/login.php");
exit();
?>
