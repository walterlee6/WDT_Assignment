<?php


include("connection.php");

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    //something was posted
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $query = "SELECT * FROM users WHERE username ='$username' AND password ='$password'";
    $results = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($results);
    $count = mysqli_num_rows($results);
    if ($count == 1) {
        header('Location:registeration.php?msg=registerexist');
    } else {
        $query = "INSERT INTO users (`email`, `username`, `password`) VALUES ('$email','$username','$password')";
        if (!empty($email) && !empty($username) && !empty($password) && !is_numeric($username)) {
            //save to database


            if (mysqli_query($conn, $query)) {
                echo "<script type='text/javascript'>alert('register successful!')</script>";
                $_SESSION["username"] = $username;
                header('location:Login Form.php?msg=registersuccess');
            }
        } else {
            echo "<script type='text/javascript'>alert('Please enter valid credentials!')</script>";
        }
    }
}


?>
<!DOCTYPE HTML>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <link rel="stylesheet" href="login.css">
    <link rel="stylesheet" href="hstyle.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script></head>

<body>
    <?php include 'header.php'; ?>
    <div class="center">
        <h1>Register</h1>
        <form method="post">
            <div class="txt_field">
                <input type="text" name="email" required>
                <span></span>
                <label>Email</label>
            </div>
            <div class="txt_field">
                <input type="text" name="username" required>
                <span></span>
                <label>Username</label>
            </div>
            <div class="txt_field">
                <input type="password" name="password" required>
                <span></span>
                <label>Password</label>
            </div>
            <div class="txt_field">
                <input type="password" required>
                <span></span>
                <label>Repeat Password</label>
            </div>
            <input type="submit" value="Register">
            <div class="signup_link">
                <a href="registeration.php">Already have an account?</a>
            </div>
        </form>
    </div>


</body>

</html>
<?php 
if (isset($_GET['msg'])) {
    if ($_GET['msg'] == 'registerexist') {
        echo "<script type='text/javascript'>alert('user already exist!')</script>";
    }
}