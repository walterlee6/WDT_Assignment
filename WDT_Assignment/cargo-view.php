<?php
require 'connection.php';
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style1.css">

    <title>Marine View</title>
</head>

<body>
    <?php include 'admin_header.php'; ?>
    <div class="container mt-5">

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>view Cargo Details
                        </h4>
                    </div>
                    <div class="card-body">

                        <?php
                        if (isset($_GET['id'])) {
                            $cargo_id = mysqli_real_escape_string($conn, $_GET['id']);
                            $query = "SELECT * FROM `marine_transportation` WHERE Cargo_id='$cargo_id' ";
                            $query_run = mysqli_query($conn, $query);

                            if (mysqli_num_rows($query_run) > 0) {
                                $cargo = mysqli_fetch_array($query_run);
                        ?>

                                <div class="mb-3">
                                    <label>Type</label>
                                    <p class="form-control">
                                        <?= $cargo['Type']; ?>
                                    </p>
                                </div>
                                <div class="mb-3">
                                    <label>Estimated Arrival Date</label>
                                    <p class="form-control">
                                        <?= $cargo['Estimated_Delivered_Date']; ?>
                                    </p>
                                </div>
                                <div class="mb-3">
                                    <label>Status</label>
                                    <p class="form-control">
                                        <?= $cargo['Status']; ?>
                                    </p>
                                </div>


                        <?php
                            } else {
                                echo "<h4>No Such Id Found</h4>";
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php include 'admin_footer.php'; ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>