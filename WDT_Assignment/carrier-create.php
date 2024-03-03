<?php
session_start();
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
    <title>Carrier Create</title>
</head>

<body>

    <?php include 'header-marine.php'; ?>
    <div class="container mt-4">
        <?php include('message.php'); ?>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="container-fluid">

                        <div class="card-header">
                            <h4>Add Carrier Form
                            </h4>
                        </div>
                        <div class="card-body">
                            <form action="code.php" method="POST">

                                <div class="mb-3">
                                    <label for="Types">Type</label>
                                    <select id="Types" name="type">
                                        <option value="fragile">Fragile</option>
                                        <option value="non-fragile">Non-Fragile</option>
                                    </select>
                                    <!-- <input type="text" name="type" class="form-control"> -->
                                </div>
                                <div class="mb-3">
                                    <label>Estimated EstimatedDelivered Date</label>
                                    <input type="date" name="date" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label for="Status2">Status</label>
                                    <select id="Status2" name="status">
                                        <option value="arrival">Arrival</option>
                                        <option value="packaging">Packaging</option>
                                        <option value="on-delivery">On-Delivery</option>
                                        <option value="delivered">Delivered</option>
                                    </select>

                                    <div class="mb-3">
                                        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                                    </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
<footer class="pt-4 pt-md-5 border-top ">
    <p>Copyright &copy; 2022 KKL Logistics Group.All Rights Reserved</p>
</footer>

</html>