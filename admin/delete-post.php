<?php

include"connect.php";
$post_id = $_GET['id'];
$catid = $_GET['catid'];
$sql = "DELETE FROM post WHERE post_id = {$post_id};";
$sql .="UPDATE category SET post = post-1 WHERE category_id = {$catid}";


if(mysqli_multi_query($conn,$sql))
{
    header("Location: {$hostname}/post.php");
}
else
{
    echo"<p style = 'color:red;test-align:center;margin : 10px 0;'> Cannot delete Post Record.</p>";
}
?>