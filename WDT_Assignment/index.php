<!DOCTYPE HTML>
<html lang="en">
<?php include 'connection.php' ?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KKL Logistics</title>
    <link rel="stylesheet" href="hstyle.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</head>

<body>
    <?php
    include 'header.php'
    ?>
    <div class="banner-text">
        <h1>Globally Connected, Locally Invested</h1>
    </div>
    <div class="banner-btn">
    <?php      if (isset($_SESSION['username'])) {
        echo '<a href="admin_index.php"><span></span>Our Services</a> ';
    }
        ?>

        <div class="banner-btnn">
            <a href="Abus.php"><span></span>About Us</a>
        </div>
    </div>
</body>

</html>
<?php
if (isset($_GET['msg'])) {
    if ($_GET['msg'] == 'loginsuccess') {
        echo "<script type='text/javascript'>alert('login successful!')</script>";
    }
}
