<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <?php include("includes/navbar.php"); ?>
    <h2 style="text-align: center;">Registration</h2>

    <section class="form-section">
        <div class="container-form">
            <form action="" method="POST">
                <label for="username">Username:</label>
                <input type="text" name="username" placeholder="Enter Your Username" required><br>

                <label for="password">Password:</label>
                <input type="password" name="password" placeholder="Enter Your Password" required><br>

                <label for="password"> Confirm Password:</label>
                <input type="password" name="copassword" placeholder="Confirm Password" required><br>

                <button type="submit" name="register" id="register">Register</button>
            </form>
        </div>
    </section>
</body>
<script src="script.js"></script>

</html>

<?php
require "includes/connection.php";

if (isset($_POST['register'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $copassword = $_POST['copassword'];


    if ($password === $copassword) {
        $password = password_hash($password, PASSWORD_DEFAULT);
        $result = mysqli_query($conn, "select  username from users where username = '$username'");

        if (mysqli_fetch_assoc($result)) {
            echo "<script>alert('Username Already Exists');
            document.location.href = 'register.php'; </script>";
        } else {
            $sql = "INSERT INTO users (username, password) VALUES ('$username', '$password')";
            $result = mysqli_query($conn, $sql);
            if (mysqli_affected_rows($conn) > 0) {
                echo "<script>alert('Registered Successfully');
            document.location.href = 'login.php'; </script>";
            } else {
                echo "<script>alert('Registration Failed');
            document.location.href ='index.php'; </script>";
            }
        }
    } else {
        echo "<script>alert('Passwords do not match');
    document.location.href='register.php';</script>";

    }

}



?>