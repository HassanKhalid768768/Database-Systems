<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>MedWeb</title>
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

  /* CSS code for the search box */
  .search-form {
    display: flex;
    align-items: center;
    margin: 10px;
  }

  .search-form input[type="text"] {
    padding: 10px;
    font-size: 16px;
    border: none;
    border-radius: 20px 0 0 20px;
    outline: none;
    width: 300px;
    background-color: #555;
  }

  .search-form button[type="submit"] {
    background-color: #555;
    color: white;
    border: none;
    padding: 10px;
    border-radius: 0 20px 20px 0;
    cursor: pointer;
  }

  .search-form button[type="submit"]:hover {
    background-color: #333;
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

  .age-filter {
    margin-top: 20px;
  }

  .age-filter span {
    margin-right: 10px;
    font-weight: bold;
  }

  .age-filter-item {
    margin-right: 10px;
    display: inline-block;
  }

  .age-filter-item input[type="checkbox"] {
    margin-right: 5px;
  }

  .age-filter-item label {
    cursor: pointer;
  }

  .age-filter-item label:hover {
    text-decoration: underline;
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
            <button class="dropbtn">Disease</button>
            <div class="dropdown-content">
              <?php
              include "connect.php";
              $sql = "CALL get_categories()";
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
    <div class="banner">
      <div class="container">
        <h1 class="banner-title">
          <span>Med.</span>Web HealthCare
        </h1>
        <p>everything that you want to know about your disease is provided in this website</p>
        <form method="get" action="search.php" class="search-form">
          <input type="text" name="catname" placeholder="find your cure . . .">
          <button type="submit" class="search-btn">
            <i class="fas fa-search"></i>
          </button>
        </form>
        <div class="age-filter">
          <span>Filter by Age:</span>
          <?php
          include "connect.php";
          $sql = "SELECT DISTINCT age FROM category ORDER BY age ASC";
          $result = mysqli_query($conn, $sql);

          if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
              echo '<label class="age-filter-item"><input type="checkbox" name="age[]" value="' . $row["age"] . '">' . $row["age"] . '</label>';
            }
            echo '<button id="age-filter-confirm" type="button">Confirm</button>';
          } else {
            echo "<p>No age groups found.</p>";
          }

          mysqli_close($conn);
          ?>
        </div>

        <script>
          document.getElementById("age-filter-confirm").addEventListener("click", function () {
            var selectedAges = document.querySelectorAll('input[name="age[]"]:checked');
            var ageValues = [];
            for (var i = 0; i < selectedAges.length; i++) {
              ageValues.push(selectedAges[i].value);
            }
            var ageQueryString = ageValues.join(",");
            window.location.href = "age.php?age=" + ageQueryString;
          });
        </script>

      </div>
    </div>
  </header>

  <!-- design -->
  <section class="design" id="design">
    <div class="container">
      <div class="title">
        <h2>Recent Med &amp; Disease</h2>
        <p>recent medicine &amp; disease on the blog</p>
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


        <?php
        $sql1 = "SELECT * FROM post";
        $result1 = mysqli_query($conn, $sql1) or die("Query Failed");

        if (mysqli_num_rows($result1) > 0) {
          $total_records = mysqli_num_rows($result1);

          $total_page = ceil($total_records / $limit);
          echo '<ul class="pagination admin-pagination">';
          if ($page > 1) {
            echo '<li><a href="index.php?page=' . ($page - 1) . '">Prev</a></li>';
          }
          for ($i = 1; $i <= $total_page; $i++) {
            $active = "";
            if (isset($_GET['page']) && $_GET['page'] == $i) {
              $active = "active";
            }
            echo '<li class="' . $active . '"><a href="index.php?page=' . $i . '">' . $i . '</a></li>';
          }
          if ($total_page > 1 && $page != $total_page) {
            echo '<li><a href="index.php?page=' . ($page + 1) . '">Next</a></li>';
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
          <img src="images/art-design-4.jpg" alt="">
        </div>
        <div class="about-text">
          <div class="title">
            <style>
              h2 {
                color: darkgray;
              }
            </style>
            <h2>Med Web Team</h2>
            <p>Health & Cure is my passion</p>
          </div>
          <p>Discover the Latest Medical Insights for Your Health: Get Personalized Medicine Blogs Tailored to Your
            Disease on MedWed</p>
        </div>
      </div>
    </div>
  </section>
  <!-- footer -->
  <footer>
    <footer>
      <div class="container">
        <div class="footer-content">
          <div class="footer-content-about">
            <h2>About Med.Web</h2>
            <p>MedWeb is a blog about everything related to medicine and cures. You can find various articles,
              tutorials, and resources to improve your skills and knowledge about Health.</p>
          </div>
          <div class="footer-content-divider"></div>
          <div class="footer-content-contact">
            <h2><a href="contact.php"> Contact Us</a></h2>
            <ul>
              <li><i class="fas fa-envelope"></i>abc@gmail.com</li>
              <li><i class="fas fa-phone"></i>+1 1234567890</li>
              <li><i class="fas fa-map-marker-alt"></i>Fast Lahore NECUS</li>
            </ul>
          </div>
        </div>
      </div>
      <div class="footer-bottom">
        &copy; Med Web System | Designed by MedTeam Fast NUCES
      </div>
    </footer>
    <!-- end of footer -->

    <!-- javascript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"
      integrity="sha512-DVvzdK9N3s35T35rj0Lp627lnH/qIYqzJ7/0bq18E3K8ZeaWzL++S39MkOjP+oN6Tq+4Kjnsck4s9cZk9viZw=="
      crossorigin="anonymous"></script>
    <script src="script.js"></script>
</body>

</html>