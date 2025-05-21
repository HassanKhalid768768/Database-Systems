<?php
include "connect.php";
session_start();

if (isset($_SESSION['username'])) {
    header("Location: {$hostname}/admin/post.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = md5($_POST['password']);
    $sql = "SELECT user_id, username, role FROM user WHERE username = '{$username}' AND password = '{$password}'";
    $result = mysqli_query($conn, $sql) or die("QUERY FAILED");

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $_SESSION['username'] = $row['username'];
            $_SESSION['user_id'] = $row['user_id'];
            $_SESSION['user_role'] = $row['role'];
            header("Location: {$hostname}/admin/post.php");
            exit();
        }
    } else {
        $error = "Username and Password are not matched";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
        }

        .container {
            background-color: white;
            border-radius: 5px;
            box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.3);
            padding: 20px;
            margin-top: 50px;
            max-width: 400px;
            margin-left: auto;
            margin-right: auto;
        }

        input[type=text],
        input[type=password] {
            width: 100%;
            padding: 12px 20px;
            margin: 8px 0;
            display: inline-block;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        button {
            background-color: #e7751e;
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            width: 100%;
        }

        button:hover {
            background-color: #e7751e;
        }

        .skip-button {
            text-align: center;
            margin-top: 20px;
        }

        .skip-button button {
            background-color: transparent;
            color: #e7751e;
            border: none;
            cursor: pointer;
            font-size: 16px;
            text-decoration: underline;
        }

        .skip-button button:hover {
            color: #e7751e;
        }

        .error {
            color: red;
            margin-top: 10px;
            text-align: center;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Login</h1>
        <?php if (isset($error)) { ?>
            <div class="error">
                <?php echo $error; ?>
            </div>
        <?php } ?>
        <form method="POST">
            <label for="username"><b>Username</b></label>
            <input type="text" placeholder="Enter Username" name="username" required>
            <label for="password"><b>Password</b></label>
            <input type="password" placeholder="Enter Password" name="password" required>
            <button type="submit">Login</button>
        </form>
        <div class="skip-button">
            <button onclick="location.href='<?php echo $hostname ?>/index.php'">Skip Login</button>
        </div>
    </div>

</body>

</html>