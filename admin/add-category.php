<?php 
include "header.php";
include 'connect.php';

if($_SESSION['user_role'] == '0')
{
   header("Location: {$hostname}/post.php");
}

if(isset($_POST['submit'])) {
    $category_name = $_POST['category_name'];
    $age = $_POST['age'];

    // check if category already exists in the database
    $query = "SELECT * FROM category WHERE LOWER(category_name) = LOWER('$category_name')";
    $result = mysqli_query($conn, $query);

    if(mysqli_num_rows($result) > 0) {
        // if category already exists, display an error message
        echo "<div class='alert alert-danger'>Category already exists.</div>";
    } else {
        // insert new category into the database
        $query = "INSERT INTO category (category_name, age) VALUES ('$category_name', '$age')";
        $result = mysqli_query($conn, $query);

        if($result) {
            // if category is added successfully, redirect to the category list page
            header("Location: {$hostname}/category.php");
        } else {
            // if an error occurs, display an error message
            echo "<div class='alert alert-danger'>Category could not be added. Please try again.</div>";
        }
    }
}

mysqli_close($conn);
?>

<div id="admin-content">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="admin-heading">Add New Disease</h1>
            </div>
            <div class="col-md-offset-3 col-md-6">
                <form action="" method ="POST">
                    <div class="form-group">
                        <label>Category Name</label>
                        <input type="text" name="category_name" class="form-control" placeholder="Category Name" required>
                    </div>
                    <div class="form-group">
                        <label>Age</label>
                        <input type="number" name="age" class="form-control" placeholder="Age" required>
                    </div>
                    <input type="submit" name="submit" class="btn btn-primary" value="Save" required />
                </form>
            </div>
        </div>
    </div>
</div>

<?php include "footer.php"; ?>
