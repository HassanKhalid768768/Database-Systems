<?php
// include the header file
include('header.php');
// include the database connection file
include('connect.php');

// fetch all categories from the database
// fetch all categories from the database
$query = "SELECT * FROM category";
$result = mysqli_query($conn, $query);

// add an "Add Category" button
echo "<div class='text-center mb-3'><a href='add-category.php' class='btn btn-primary'>Add Category</a></div>";

// check if any categories were found
if(mysqli_num_rows($result) > 0) {
    // start the table
    echo "<table class='table'>";
    // add the table header
    echo "<thead><tr><th>Category ID</th><th>Category Name</th><th>Age</th><th>Number of Posts</th><th>Edit</th><th>Delete</th></tr></thead>";
    // start the table body
    echo "<tbody>";
    // loop through each category and create a table row
    while($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td class='category-id'>" . $row['category_id'] . "</td>";
        echo "<td>" . $row['category_name'] . "</td>";
        echo "<td>" . $row['age'] . "</td>";
        echo "<td>" . $row['post'] . "</td>";
        echo "<td class='edit'><a href='update-category.php?id=" . $row['category_id'] . "'><i class='fa fa-edit'></i></a></td>";
        echo "<td class='delete'><a href='delete-category.php?id=" . $row['category_id'] . "'><i class='fa fa-trash-o'></i></a></td>";
        echo "</tr>";
    }
    // end the table body
    echo "</tbody>";
    // end the table
    echo "</table>";
} else {
    // if no categories were found, display a message
    echo "<p>No categories found.</p>";
}

// close the database connection
mysqli_close($conn);

// include the footer file
include('footer.php');
?>