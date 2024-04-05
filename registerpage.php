<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <!-- Include your CSS and font links here -->
    <link href="https://fonts.googleapis.com/css2?family=Kode+Mono:wght@400..700&family=Montserrat:ital,wght@0,100..900;1,100..900&family=Nunito+Sans:ital,opsz,wght@0,6..12,200..1000;1,6..12,200..1000&family=Nunito:ital,wght@0,200..1000;1,200..1000&family=Open+Sans:ital,wght@0,300..800;1,300..800&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <!-- Include your custom stylesheet -->
    <link rel="stylesheet" href="registerstyle.css">
</head>
<body>
    <form method="post" action="registerpage.php">
        <h1>Login</h1>
           
        <div class="textBox">
            <input type="email" name="email" placeholder="Email" required>
        </div>

        <div class="textBox">
            <input type="password" name="password" placeholder="Password" required>
            <input type="submit" value="Login" class="loginBtn" name="login_btn">
        </div>

        <div class="signup">
            Don't have an account?
            <br>
            <a href="loginpage.php" style="color: black;">Sign up</a>
        </div>
    </form>
</body>
</html>


<?php
session_start();

$conn = mysqli_connect('localhost', 'root', '', 'login') or die('connection failed');

if(isset($_POST['login_btn'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Check if the email exists in the database
    $check_query = "SELECT * FROM registration WHERE email = '$email'";
    $check_result = mysqli_query($conn, $check_query);

    if(mysqli_num_rows($check_result) == 1) {
        // Email exists, now check the password
        $user = mysqli_fetch_assoc($check_result);
        if($password == $user['password']) {
            // Password is correct, set session variables and redirect
            $_SESSION['username'] = $user['username'];
            $_SESSION['email'] = $user['email'];
            header('Location: project.html');
            exit;
        } else {
            // Password is incorrect
            echo "<script>alert('Incorrect password');</script>";
        }
    } else {
        // Email does not exist
        echo "<script>alert('Email not found');</script>";
    }
}

?>


