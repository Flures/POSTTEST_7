<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Login</title>
</head>

<body>
    <?php include("includes/navbar.php"); ?>
    <h2 style="text-align: center;">Login</h2>
    <?php
    if (isset($error)) {
        echo "<p style='color:red'>username atau password salah</p>";
    }
    ?>
    <section class="form-section">
        <div class="container-form">
            <form action="" method="POST">
                <label for="username">Username:</label>
                <input type="text" name="username" placeholder="Enter Your Username" required><br>

                <label for="password">Password:</label>
                <input type="password" name="password" placeholder="Enter Your Password" required><br>


                <button type="submit" name="login" id="login">Login</button>
            </form>
    </section>
    </div>
    <script src="script.js" ;></script>
</body>


</html>

<?php
require "includes/connection.php";

session_start();

if (isset($_SESSION['login'])) {
    header("Location: dashboard.php");
    exit;
}


if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $result = mysqli_query($conn, "SELECT * from users where username = '$username'");

    if (mysqli_num_rows($result) === 1) {
        $row = mysqli_fetch_assoc($result);
        if (password_verify($password, $row['password'])) {
            $_SESSION['login'] = true;
            header("Location: index.php");
            exit;
        }
    }
    $error = true;
}





?>