<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Kode+Mono:wght@400..700&family=Montserrat:ital,wght@0,100..900;1,100..900&family=Nunito+Sans:ital,opsz,wght@0,6..12,200..1000;1,6..12,200..1000&family=Nunito:ital,wght@0,200..1000;1,200..1000&family=Open+Sans:ital,wght@0,300..800;1,300..800&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
<script src="https://kit.fontawesome.com/56db1d8d0f.js" crossorigin="anonymous"></script>
<link href="https://fonts.googleapis.com/css2?family=Kode+Mono:wght@400..700&family=Montserrat:ital,wght@0,100..900;1,100..900&family=Nunito+Sans:ital,opsz,wght@0,6..12,200..1000;1,6..12,200..1000&family=Nunito:ital,wght@0,200..1000;1,200..1000&family=Open+Sans:ital,wght@0,300..800;1,300..800&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">

<link rel="stylesheet" href="registerstyle.css">
</head>
<body>




      <form method="post" action="loginpage.php">
        <h1>Register</h1>
           
        <div class="textBox">
              <input type="text" name="username" placeholder="username" >
          </div>

          <div class="textBox">
              <input type="email" name="email" placeholder="email" >
          </div>

          <div class="textBox">
            <input type="password" name="password" placeholder="password" >
            <input type="submit" value="login" class="loginBtn" name="register_btn">
        </div>

        <div class="signup">
              Already have an account?
              <br>
              <a href="" style="color: black;">Sign in</a>
        </div>
      </form>

      <script src="script3.js"></script>
    
</body>
</html>

<?php

$conn = mysqli_connect('localhost', 'root', '', 'login') or die('connection failed');

if(isset($_POST['register_btn'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password']; // You should hash the password for security before storing it in the database

    // Check if the email already exists in the database
    $check_query = "SELECT * FROM registration WHERE email = '$email'";
    $check_result = mysqli_query($conn, $check_query);

    if(mysqli_num_rows($check_result) > 0) {
        echo "<script>alert('Email already exists');</script>";
    } else {
        // Insert new user into the database
        $insert_query = "INSERT INTO registration (username,email, password) VALUES ('$username','$email', '$password')";
        $insert_result = mysqli_query($conn, $insert_query);

        if($insert_result) {
            echo "<script>alert('Registration successful');</script>";
            header('Location:project.html');
            exit();
            // Optionally redirect the user to another page after successful registration
        } else {
            echo "<script>alert('Registration failed');</script>";
        }
    }
}

?>



