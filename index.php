<?php 



include('config.php');

if (isset($_POST['submit'])) {

$name= $_POST['name'];
$email= $_POST['email'];
$password= $_POST['password'];
$confirm_password= $_POST['confirm_password'];

    if ($password != $confirm_password) {
        echo "Password not match!";
        exit();
    }
    // hash only password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    $hashed_confirm_password = password_hash($confirm_password, PASSWORD_DEFAULT);

    $sql = "INSERT INTO admin (name, email, password, confirm_password) VALUES ('$name', '$email', '$hashed_password', '$hashed_confirm_password')";
    mysqli_query($conn, $sql);
    
}

?>




<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Admin Register</title>

<link rel="stylesheet" href="style.css">
</head>

<body>

<div class="form-box">
    <h2>Admin Register</h2>

    <form method="post" >
        <div class="input-box">
            <label>Full Name</label>
            <input type="text" placeholder="Enter your name" name="name" required>
        </div>

        <div class="input-box">
            <label>Email</label>
            <input type="email" placeholder="Enter your email" name="email" required>
        </div>

        <div class="input-box">
            <label>Password</label>
            <input type="password" placeholder="Enter password" name="password" required>
        </div>

        <div class="input-box">
            <label>Confirm Password</label>
            <input type="password" placeholder="Confirm password" name="confirm_password" required>
        </div>

        <button type="submit" class="btn" name="submit">Register</button>

        <div class="login-link">
            Already have account? <a href="#">Login</a>
        </div>
    </form>
</div>

</body>
</html>