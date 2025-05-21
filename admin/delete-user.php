<?php

include"connect.php";
$userid = $_GET['id'];

$sql = "DELETE FROM user WHERE user_id = {$userid}";
if(mysqli_query($conn,$sql))
{
    header("Location: {$hostname}/users.php");
}
else
{
    echo"<p style = 'color:red;test-align:center;margin : 10px 0;'> Cannot delete User Record.</p>";
}
mysqli_close($conn);
?>