<?php
include 'connection.php';


if (isset($_POST['username'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $query = "SELECT * FROM users WHERE username ='$username' AND password ='$password'";
    $results = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($results);
    $count = mysqli_num_rows($results);
    if ($count == 1) {
        $_SESSION["username"] = $row["username"];
        header('Location:index.php?msg=loginsuccess');

    } else {
        echo "<script type='text/javascript'>alert('Invalid credentials, Please try again!')</script>";
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</head>

<body>
    <?php include 'header.php'; ?>
    <div class="center">
        <h1>Login</h1>
        <form method="post">
            <div class="txt_field">
                <input type="text" name="username" required>
                <span></span>
                <label>Username</label>
            </div>
            <div class="txt_field">
                <input type="password" class="input-field" name="password" required>
                <span></span>
                <label>Password</label>
            </div>
            <div class="pass">Forgot Password?</div>
            <input type="submit" value="Login">
            <div class="signup_link">
                Not a member? <a href="registeration.php">Signup</a>
            </div>
        </form>
    </div>
</body>

</html>
<?php
if (isset($_GET['msg'])) {
    if ($_GET['msg'] == 'registersuccess') {
        echo "<script type='text/javascript'>alert('register successful!')</script>";
    }
}