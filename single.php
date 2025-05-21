<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Medicinal Blog</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="style.css">
  <style>
    .post-header {
      position: relative;
      height: 500px;
      overflow: hidden;
    }
    
    .dropbtn {
    font-family: var(--Quicksand);
    font-size: 1.5rem;
    border: none;
    outline: none;
    color: white;
    background-color: transparent;
    cursor: pointer;
    padding: 0.5rem 1rem;
    text-transform: uppercase;
    font-weight: 700;
    letter-spacing: 1px;
    transition: background-color 0.2s ease;
    }
    .post-image {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      object-fit: cover;
    }

    .post-container {
      max-width: 1000px;
      margin: 0 auto;
      margin: 20px;
      padding: 20px;
      border: 1px solid #fff;
      background-color: #fff;
      border-radius: 10px;
    }

    .post-content {
      margin: 20px;
      padding: 20px;
      background-color: #fff;
      box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.1);
      border-radius: 10px;
    }

    .post-image {
      max-width: 100%;
      margin-bottom: 10px;
      border-radius: 10px;
      box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.1);
    }


    .post-header-overlay {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background-image: linear-gradient(to right,
          <?php echo getRandomColor(); ?>
          ,
          <?php echo getRandomColor(); ?>
        );
      opacity: 0.7;
      z-index: 1;
    }

    .post-title {
      position: absolute;
      bottom: 50px;
      left: 50px;
      color: #fff;
      font-size: 48px;
      z-index: 2;
    }

    .post {
      margin: 20px;
      padding: 20px;
      border: 1px solid #ddd;
      border-radius: 5px;
      background-color: #0000;
      box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.1);
      max-width: 1200px;
    }

    .post-image {
      max-width: 100%;
      margin-bottom: 10px;
      border-radius: 5px;
      box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.1);
    }

    .post-category {
      font-size: 14px;
      color: #888;
      margin-bottom: 10px;
    }

    .post-date {
      font-size: 16px;
      color: #888;
      margin-bottom: 20px;
    }

    .post-description {
      font-size: 20px;
      line-height: 1.5;
      color: #ccc;
    }

    .post-information {
      margin-top: 20px;
      margin-bottom: 20px;
    }
    header{
    min-height: 100vh;
    background: linear-gradient(rgba(0, 0, 0, 0.4), rgba(0, 0, 0, 0.4)), url(images/banner-bg.jpg) center/cover no-repeat fixed;
    display: flex;
    flex-direction: column;
    justify-content: stretch;
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

  </style>
</head>
<?php
function getRandomColor()
{
  $r = mt_rand(0, 255);
  $g = mt_rand(0, 255);
  $b = mt_rand(0, 255);
  return "rgb($r, $g, $b)";
}
?>
<nav class="navbar">
  <div class="container">
    <a href="index.php" class="navbar-brand">MedWeb System</a>
    <div class="navbar-nav">
      <a href="index.php">Home</a>
      <div class="dropdown">
        <button class="dropbtn">Disease</button>
        <div class="dropdown-content">
          <?php
          include "connect.php";
          $sql = "SELECT * FROM category";
          $result = mysqli_query($conn, $sql);
          if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
              echo '<a href="category.php?category_id=' . $row["category_id"] . '">' . $row["category_name"] . '</a>';
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
<div id="main-content">
  <div class="container">
    <div class="row">
      <div class="col-md-8">
        <!-- post-container -->
        <div class="post-container">
          <?php
          include "connect.php";

          $post_id = $_GET['id'];

          $sql = "SELECT post.post_id,post.author,category.category_id, post.title, post.description, post.post_date, category.category_name, user.username,post.category,post.post_img
                  FROM post 
                  LEFT JOIN category ON post.category = category.category_id 
                  LEFT JOIN user ON post.author = user.user_id
                  WHERE post.post_id = {$post_id}";

          $result = mysqli_query($conn, $sql) or die("Query Failed");
          if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
              ?>
              <div class="post-content single-post">
                <div class="post-header">
                  <h1 class="post-title">
                    <?php echo $row['title']; ?>
                  </h1>
                  <img class="post-image" src="admin/upload/<?php echo $row['post_img']; ?>" alt="" />
                  <div class="post-header-overlay"></div>
                </div>
                <div class="post-information">
                  <span>
                    <i class="fa fa-tags" aria-hidden="true"></i>
                    <a href='category.php?category_id=<?php echo $row['category_id']; ?>'>
                      <?php echo $row['category_name']; ?>
                    </a>

                  </span>
                  <span>
                    <i class="fa fa-user" aria-hidden="true"></i>
                    <a href='author.php?aid=<?php echo $row['author']; ?>'>
                      <?php echo $row['username']; ?>
                    </a>
                  </span>
                  <span>
                    <i class="fa fa-calendar" aria-hidden="true"></i>
                    <?php echo $row['post_date']; ?>
                  </span>
                </div>
                <div class="post-description">
                  <p>
                    <?php echo $row['description']; ?>
                  </p>
                </div>
              </div>
              <?php
            }
          } else {
            echo "<h2>No Post Found</h2>";
          }
          mysqli_close($conn);
          ?>
        </div>
        <!-- /post-container -->
      </div>
      <div class="col-md-4">
      </div>
    </div>
  </div>
</div>