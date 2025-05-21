<?php 
include "header.php";
include('connect.php');

if($_SESSION['user_role'] == '0')
{
   header("Location: {$hostname}/post.php");
}
if(isset($_GET['id'])) {
    $category_id = $_GET['id'];
    // fetch category data from the database
    $query = "SELECT * FROM category WHERE category_id = $category_id";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
} else {
    // if no category id is provided, redirect to the category list page
    header("Location: {$hostname}/category.php");
}

if(isset($_POST['submit'])) {
    $category_id = $_POST['cat_id'];
    $category_name = $_POST['cat_name'];
    $age = $_POST['age']; // get the age value from the form

    // update category data in the database
    $query = "UPDATE category SET category_name = '$category_name', age = $age WHERE category_id = $category_id";
    $result = mysqli_query($conn, $query);

    if($result) {
        // if category data is updated successfully, redirect to the category list page
        header("Location: {$hostname}/category.php");
    } else {
        // if an error occurs, display an error message
        echo "<div class='alert alert-danger'>Category data could not be updated. Please try again.</div>";
    }
}

mysqli_close($conn);
?>
  <div id="admin-content">
      <div class="container">
          <div class="row">
              <div class="col-md-12">
                  <h1 class="adin-heading"> Update Category</h1>
              </div>
              <div class="col-md-offset-3 col-md-6">
                  <form action="" method ="POST">
                      <div class="form-group">
                          <input type="hidden" name="cat_id"  class="form-control" value="<?php echo $row['category_id']; ?>">
                      </div>
                      <div class="form-group">
                          <label>Category Name</label>
                          <input type="text" name="cat_name" class="form-control" value="<?php echo $row['category_name']; ?>" required>
                      </div>
                      <div class="form-group">
                          <label>Age</label>
                          <input type="number" name="age" class="form-control" value="<?php echo $row['age']; ?>" required>
                      </div>
                      <input type="submit" name="submit" class="btn btn-primary" value="Update" required />
                  </form>
                </div>
              </div>
            </div>
          </div>
<?php include "footer.php"; ?>
