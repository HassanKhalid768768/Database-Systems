<?php 
include "connect.php";

if (isset($_GET['age'])) {
  $age = $_GET['age']; // Fix: Set the $age variable to the value provided in the URL parameter
  $sql = "SELECT post.*, category.category_name 
          FROM post 
          JOIN category ON post.category = category.category_id 
          WHERE category.age = '$age'";
  $result = mysqli_query($conn, $sql);
  
  // Get the category name from the first row of the result set
  // We assume that all rows have the same category_name since we're filtering by age
  if (mysqli_num_rows($result) > 0) {
    $catname = mysqli_fetch_assoc($result)['category_name'];
  } else {
    // If no posts were found for the specified age, set a default category name
    $catname = "Age group $age";
  }
} else {
  // If no age was specified in the URL, redirect to the index page
  header("Location: index.php");
  exit();
}
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>MedWeb -
    <?php echo $catname; ?>
  </title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font awesome icon -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"
    integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA=="
    crossorigin="anonymous" />
  <link rel="stylesheet" href="style.css">
</head>

<!-- Custom CSS -->
<style>
  .feature-card {
    border-radius: 1rem;
    box-shadow: 0 0.25rem 0.5rem rgba(0, 0, 0, 0.1);
    overflow: hidden;
    transition: transform 0.2s ease-in-out;
  }

  .feature-card-container {
    width: 100%;
    margin-bottom: 1rem;
  }

  .feature-content {
    margin-top: 10px;
    margin-left: 10px;
  }

  .feature-title {
    margin-top: 10px;
    margin-left: 10px;
  }

  .feature-description {
    margin-top: 10px;
    margin-left: 10px;
  }

  .pagination {
    display: flex;
    justify-content: center;
    list-style: none;
    margin: 2rem 0;
    padding: 0;
  }

  .pagination li {
    display: inline-block;
    margin: 0 0.5rem;
  }

  .pagination li a {
    display: inline-block;
    padding: 0.5rem 1rem;
    border-radius: 0.25rem;
    text-decoration: none;
    color: #333;
    background-color: #fff;
    border: 1px solid #ccc;
  }

  .pagination li.active a {
    color: #fff;
    background-color: #007bff;
    border-color: #007bff;
  }

  .pagination li a:hover {
    color: #fff;
    background-color: #007bff;
    border-color: #007bff;
  }

  .dropdown {
    position: relative;
    display: inline-block;
  }

  .dropdown-content {
    display: none;
    position: absolute;
    z-index: 1;
    background-color: #f9f9f9;
    min-width: 160px;
    box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
  }

  .dropdown-content a {
    color: black;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
  }

  .dropdown-content a:hover {
    background-color: #f1f1f1;
  }

  .dropdown:hover .dropdown-content {
    display: block;
  }


  .feature-card:hover {
    transform: translateY(-0.25rem);
  }

  .feature-icon-container {
    background-image: url('https://via.placeholder.com/150');
    background-repeat: no-repeat;
    background-size: cover;
    background-position: center center;
    height: 200px;
  }

  .feature-card:hover .feature-icon-container {
    background-image: url('https://via.placeholder.com/200');
  }

  .feature-icon {
    display: none;
  }

  .feature-btn-container {
    display: flex;
    justify-content: center;
    margin-top: 1rem;
    margin-bottom: 2rem;
  }

  .feature-btn {
    display: inline-block;
    border-radius: 0.25rem;
    padding: 0.5rem 1rem;
    color: #fff;
    background-color: #007bff;
    transition: background-color 0.2s ease-in-out;

  }

  .navbar-nav a.active {
    background-color: #007bff;
    color: #fff;
  }

  .feature-btn:hover {
    background-color: #0062cc;
  }
</style>

<body>
  <header>
    <nav class="navbar">
      <div class="container">
        <a href="index.php" class="navbar-brand">MedWeb System</a>
        <div class="navbar-nav">
          <a href="index.php">Home</a>
          <div class="dropdown">
            <button class="dropbtn active">Disease</button>
            <div class="dropdown-content">
            <?php
              $sql = "SELECT * FROM category";
              $result = mysqli_query($conn, $sql);
              if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                  $active_class = ($row['category_name'] == $catname) ? 'active' : '';
                  echo '<a href="category.php?age=' . $row["age"] . '" class="' . $active_class . '">' . $row["category_name"] . '</a>';
                }
              } else {
                echo "<p>No categories found.</p>";
              }
              mysqli_close($conn);
              ?>
            </div>
          </div>
          <a href="contact.php">Contact</a>
          <a href="about.php">About</a>
          <a href="login.php">Login</a>
        </div>
      </div>
    </nav>
    <div class="banner">
      <div class="container">
        <h1 class="banner-title">
          Disease-Name:
          <?php echo $catname; ?>
        </h1>
      </div>
    </div>
  </header>
  <section class="design" id="design">
    <div class="container">
      <div class="title">
        <h2>Recent Med &amp; Blogs</h2>
        <p>recent med &amp; disease on the blog</p>
      </div>

      <div class="design-content">
        <?php
        include "connect.php";
        $limit = 5;

        if (isset($_GET['page'])) {
          $page = trim($_GET['page']);
          $page = (int) filter_var($page, FILTER_SANITIZE_NUMBER_INT);
        } else {
          $page = 1;
        }

        $offset = ($page - 1) * $limit;

        $sql = "SELECT post.post_id, post.title, post.description, post.post_date, category.category_name, user.username, post.category, post.post_img
        FROM post 
        LEFT JOIN category ON post.category = category.category_id 
        LEFT JOIN user ON post.author = user.user_id
        WHERE post.category = (SELECT category_id FROM category WHERE category_name = '{$catname}')
        ORDER BY post.post_id DESC LIMIT {$limit} OFFSET {$offset}";
        $result = mysqli_query($conn, $sql) or die("Query Failed");
        if (mysqli_num_rows($result) > 0) {
          while ($row = mysqli_fetch_assoc($result)) {
            ?>
            <div class="feature-card-container">
              <div class="feature-card">
                <div class="feature-icon-container"
                  style="background-image: url('admin/upload/<?php echo $row['post_img']; ?>');">
                  <img class="feature-icon" src="admin/upload/<?php echo $row['post_img']; ?>"
                    alt="<?php echo $row['title']; ?>">
                </div>
                <div class="feature-content">
                  <h5 class="feature-title">
                    <?php echo $row['title']; ?>
                  </h5>
                  <p class="feature-description">
                    <?php echo substr($row['description'], 0, 100) . "..."; ?>
                  </p>
                  <div class="feature-meta">
                    <span class="feature-author">
                      <?php echo $row['username']; ?>
                    </span>
                    <span class="feature-date">
                      <?php echo $row['post_date']; ?>
                    </span>
                    <span class="feature-category">
                      <?php echo $row['category_name']; ?>
                    </span>
                  </div>
                  <div class="feature-btn-container">
                    <a href="single.php?id=<?php echo $row['post_id']; ?>
                    " class="feature-btn">Read More</a>
                  </div>
                </div>
              </div>
            </div>
            <?php
          }
        } else {
          echo "No posts found";
        }
        ?>


        <?php $sql1 = "SELECT * FROM post
JOIN category ON post.category = category.category_name
WHERE category.category_name = '$catname'";
        $result1 = mysqli_query($conn, $sql1) or die("Query Failed");

        if (mysqli_num_rows($result1) > 0) {
          $total_records = mysqli_num_rows($result1);

          $total_page = ceil($total_records / $limit);
          echo '<ul class="pagination admin-pagination">';
          if ($page > 1) {
            echo '<li><a href="index.php?cid=' . $category_id . 'page=' . ($page - 1) . '">Prev</a></li>';
          }
          for ($i = 1; $i <= $total_page; $i++) {
            $active = "";
            if (isset($_GET['page']) && $_GET['page'] == $i) {
              $active = "active";
            }
            echo '<li class="' . $active . '"><a href="index.php?cid=' . $category_id . 'page=' . $i . '">' . $i . '</a></li>';
          }
          if ($total_page > 1 && $page != $total_page) {
            echo '<li><a href="index.php?cid=' . $category_id . 'page=' . ($page + 1) . '">Next</a></li>';
          }
          echo '</ul>';
        }
        ?>
      </div>
    </div>
  </section>
  <!-- end of design -->
  <section class="about" id="about">
    <div class="container">
      <div class="about-content">
        <div>
          <img src="images/about-bg.jpg" alt="">
        </div>
        <div class="about-text">
          <div class="title">
            <h2>Catherine Doe</h2>
            <p>Medicine & Cure is my passion</p>
          </div>
          <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Id totam voluptatem saepe eius ipsum nam provident
            sapiente, natus et vel eligendi laboriosam odit eos temporibus impedit veritatis ut, illo deserunt illum
            voluptate quis beatae quod. Necessitatibus provident dicta consectetur labore!</p>
          <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsam corrupti natus, eos quia recusandae
            voluptatem veniam modi officiis minima provident rem sint porro fuga quos tempora ea suscipit vero velit sed
            laudantium eaque necessitatibus maxime!</p>
        </div>
      </div>
    </div>
  </section>

  <footer>
    <div class="container">
      <p>Copyright © MedWeb System.
        <br>All rights reserved.
      </p>
    </div>
  </footer>

</body>

</html>