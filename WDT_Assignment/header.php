<nav class="navbar navbar-expand-lg bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">KKL</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>


    <?php
    if (isset($_SESSION['username'])) {
    echo '<div class="collapse navbar-collapse" id="navbarNavAltMarkup">
    <div class="navbar-nav">
        <a class="nav-link active" href="index.php"><i class="fa-solid fa-home"></i>Home</a>
        <a class="nav-link" href="Career.php"><i class="fa-solid fa-users"></i>Careers</a>
        <a class="nav-link" href="index.php"><i class="fa-solid fa-user"></i>' . $_SESSION["username"] . '</a>
        <a class="nav-link" href="logout.php"><i class="fa-solid fa-right-from-bracket"></i>Logout</a>
    </div>
</div>';
    } else {
        echo '
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav">
        <a class="nav-link active" href="index.php"><i class="fa-solid fa-home"></i>Home</a>
        <a class="nav-link " href="Career.php"><i class="fa-solid fa-users"></i>Careers</a>
        <a class="nav-link " href="Login Form.php"><i class="fa-solid fa-right-to-bracket"></i>Login</a>
        <a class="nav-link " href="registeration.php"><i class="fa-solid fa-pen"></i>Register</a>
    </div>
    </div>';
    }
    ?>
    </div>


</nav>