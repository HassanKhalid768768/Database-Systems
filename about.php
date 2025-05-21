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
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

  <style>
    @import url('https://cdnjs.cloudflare.com/ajax/libs/compass/1.0.1/stylesheets/compass.min.css');

    /* Slide down effect via css3 */
    /* No jQuery animation */
    /* Taken from http://davidwalsh.name/css-slide */
    .slider {
      overflow-y: hidden;
      max-height: 0;
      box-sizing: border-box;
      transition: all 0.5s ease;
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

    .slider.open {
      max-height: 500px;
      /* approximate max height */
    }

    /* slider styling */
    .slider {
      background-color: white;
      padding: 0 1em;
      margin: 1em 0;
      border-radius: 0.2em;
    }

    /* Page styling */
    body {
      font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif;
      line-height: 1.5;
      padding: 2em;
      color: #666;
    }

    .content {
      padding-top: 20px;
      /* add 20px of padding to the top of the element */
    }

    .container {
      position: relative;
      margin: 0 auto;
      max-width: 480px;
      overflow: visible;
    }

    html,
    body {
      margin: 0;
      padding: 0;
    }

    h1 {
      font-weight: 100;
      color: #222;
    }

    .button {
      display: block;
      height: 2em;
      background-color: brown;
      text-align: center;
      color: white;
      font-weight: 100;
      font-size: 2em;
      line-height: 2em;
      border-radius: 0.25em;
      text-decoration: none;
    }

    .button:hover {
      text-decoration: none;
      background-color: coral;
    }

    .button:active {
      text-decoration: none;
      background-color: darken(coral, 3%);
    }

    body {
      background-color: #F4F4F4;
      font-family: Arial, sans-serif;
    }

    .container {
      margin-top: 50px;
    }

    canvas {
      width: 100% !important;
      height: auto !important;
    }

    h1 {
      text-align: center;
      color: #222222;
      margin-top: 50px;
      font-size: 48px;
      font-weight: bold;
      text-shadow: 2px 2px 2px rgba(0, 0, 0, 0.1);
    }

    table {
      margin: 50px auto;
      border-collapse: collapse;
      box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.2);
      border-radius: 10px;
      overflow: hidden;
    }

    thead {
      background-color: #222222;
      color: #FFFFFF;
    }

    th {
      padding: 20px;
      text-align: left;
    }

    td {
      padding: 10px 20px;
      font-size: 18px;
      font-weight: bold;
      color: #222222;
    }

    .gold {
      background-color: gold;
    }

    .silver {
      background-color: silver;
    }

    .bronze {
      background-color: #cd7f32;
    }

    tr:nth-child(even) {
      background-color: #F2F2F2;
    }

    tr {
      transition: all 0.3s ease-in-out;
      cursor: pointer;
    }

    tr:hover {
      background-color: #DDDDDD;
      transform: scale(1.1);
      box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.4);
    }
  </style>
  <script>
    $(document).ready(function () {
      var buttons = $('.button'); // Select all "Hide me" buttons
      var sliders = $('.slider'); // Select all sliders

      buttons.on('click', function (e) {
        e.preventDefault(); // Prevent the default behavior of the anchor tag
        // Find the button and slider corresponding to the clicked button
        var button = $(this);
        var slider = button.next('.slider');

        if (slider.hasClass('open')) {
          button.text('Hide Him!');
          slider.removeClass('open');
        } else {
          button.text('Click to close back!');
          slider.addClass('open');
        }
      });
    });

  </script>
</head>

<body>
  <header>
    <nav class="navbar">
      
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
      
    </nav>
    </div>
  </header>
  <div class="container">
    <a href="#" class="button">Leaderboard!</a>
    <div class="slider">

      <?php
      include "connect.php";
      $sql = "SELECT user.username, COUNT(post.post_id) as post_count
            FROM post 
            LEFT JOIN user ON post.author = user.user_id
            GROUP BY user.username
            ORDER BY post_count DESC";
      $result = mysqli_query($conn, $sql) or die("Query Failed");

      echo "<h1>Leaderboard</h1>";

      if (mysqli_num_rows($result) > 0) {
        echo "<table>";
        echo "<thead><tr><th>Rank</th><th>Username</th><th>Ratings</th></tr></thead>";
        echo "<tbody>";

        $rank = 1;
        while ($row = mysqli_fetch_assoc($result)) {
          $username = $row['username'];
          $post_count = $row['post_count'];

          $class = "";
          if ($rank == 1) {
            $class = "gold";
          } else if ($rank == 2) {
            $class = "silver";
          } else if ($rank == 3) {
            $class = "bronze";
          }

          echo "<tr class=\"$class\"><td>$rank</td><td>$username</td><td>$post_count</td></tr>";

          $rank++;
        }

        echo "</tbody>";
        echo "</table>";
      } else {
        echo "<h2>No Result Found</h2>";
      }
      ?>

    </div>
  </div>

  <div class="container">
    <a href="#" class="button">View Trend!</a>
    <div class="slider">
    <canvas id="myChart3" width="800" height="800"></canvas>
      <p>hello</p>
    </div>
  </div>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js"></script>
    <script>
      var ctx = document.getElementById('myChart3').getContext('2d');
      var chart = new Chart(ctx, {
        type: 'line',
        data: {
          labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
          datasets: [{
            label: 'Monthly Posts',
            data: [50, 80, 120, 90, 100, 70, 130, 110, 150, 200, 180, 250],
            backgroundColor: 'rgba(255, 99, 132, 0.2)',
            borderColor: 'rgba(255, 99, 132, 1)',
            borderWidth: 2
          }]
        },
        options: {
          responsive: true,
          maintainAspectRatio: false,
          scales: {
            yAxes: [{
              ticks: {
                beginAtZero: true
              }
            }]
          }
        }
      });
    </script>
  <div class="container">
    <a href="#" class="button">Highest Post!</a>
    <div class="slider">
      <canvas id="myChart" width="400" height="400"></canvas>
      <p>hello</p>
    </div>
  </div>

  <?php
  include "connect.php";

  $query1 = "SELECT user.username, COUNT(post.post_id) AS post_count
			  FROM post
			  LEFT JOIN user ON post.author = user.user_id
			  GROUP BY user.username
			  ORDER BY post_count DESC";
  $result1 = mysqli_query($conn, $query1);

  if (!$result1) {
    die("Query failed: " . mysqli_error($conn));
  }

  $data = array();
  $colors = array('#FF6384', '#36A2EB', '#FFCE56', '#8BC34A', '#9C27B0', '#3F51B5', '#009688', '#FF5722', '#607D8B', '#F44336');

  while ($row = mysqli_fetch_assoc($result1)) {
    array_push($data, $row['post_count']);
  }

  ?>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js"></script>
  <script>
    var ctx2 = document.getElementById('myChart').getContext('2d');
    var chart2 = new Chart(ctx2, {
      type: 'pie',
      data: {
        labels: [
          <?php
          $sql1 = "SELECT user.username, COUNT(post.post_id) AS post_count
						  FROM post
						  LEFT JOIN user ON post.author = user.user_id
						  GROUP BY user.username";
          $result1 = mysqli_query($conn, $sql1);

          $i = 0;
          while ($row = mysqli_fetch_assoc($result1)) {
            echo '"' . $row['username'] . '",';
            $i++;
            if ($i >= 10) {
              break;
            }
          }
          ?>
        ],
        datasets: [{
          data: <?php echo json_encode($data); ?>,
          backgroundColor: <?php echo json_encode($colors); ?>
        }]
      },
      options: {
        responsive: true,
        maintainAspectRatio: false
      }
    });

  </script>

</body>

</html>