<?php
include "connect.php";
if(empty($_FILES['new-image']['name'])) {
    $file_name = $_POST['old_image'];
} else {
    $error = array();
    $file_name = $_FILES['new-image']['name'];
    $file_size = $_FILES['new-image']['size'];
    $file_tmp = $_FILES['new-image']['tmp_name'];
    $file_type = $_FILES['new-image']['type'];
    $file_name_parts = explode('.', $file_name);
    $file_ext = strtolower(end($file_name_parts));
    $extension = array("jpeg","jpg","png");

    if(in_array($file_ext,$extension) === false) {
        $error[] = "This extnsion file is not allowed,Please choose JPG or PNG file";
    }
    if($file_size > 2097152) {
        $error[] = "File size must be under 2MB.";
    }
    if(empty($error) == true) {
        move_uploaded_file($file_tmp,"upload/".$file_name);
    } else {
        print_r($error);
        die();
    }
}

$post_title = mysqli_real_escape_string($conn, $_POST["post_title"]);
$postdesc = mysqli_real_escape_string($conn, $_POST["postdesc"]);
$category = mysqli_real_escape_string($conn, $_POST["category"]);
$sql = "UPDATE post SET title='{$post_title}',description='{$postdesc}',category='{$category}',post_img='{$file_name}' WHERE post_id='{$_POST["post_id"]}'";

$result = mysqli_query($conn,$sql);
if($result) {
    header("location: {$hostname}/post.php");
} else {
    echo "Query failed";
}
?>
