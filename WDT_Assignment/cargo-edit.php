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
    <title>Marine Edit</title>
</head>
<body>
<?php include 'admin_header.php'; ?>
    <div class="container mt-5">

        <?php include('message.php'); ?>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                
                    <div class="card-header">
                        <h4>Cargo Edit 
                        </h4>
                    </div>
                    <div class="card-body">

                        <?php
                        if(isset($_GET['id']))
                        {
                            $cargo_id = mysqli_real_escape_string($conn, $_GET['id']);
                            $query = "SELECT * FROM `marine_transportation` WHERE Cargo_id='$cargo_id' ";
                            $query_run = mysqli_query($conn, $query);

                            if(mysqli_num_rows($query_run) > 0)
                            {
                                $cargo = mysqli_fetch_array($query_run);
                                ?>
                                <form action="code.php" method="POST">
                                    <input type="hidden" name="Cargo_id" value="<?= $cargo['Cargo_id']; ?>">

                                    <div class="mb-3">
                                    <label for="Types">Type</label>
                                    <select id = "Types" name="type">
                                        <option value = "fragile">Fragile</option>   
                                        <option value = "non-fragile">Non-Fragile</option>   
                                    </select>
                                    </div>
                                    <div class="mb-3">
                                        <label>Estimated Arrival Date</label>
                                        <input type="date" name="date" value="<?=$cargo['Estimated_Delivered_Date'];?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label for="Status">Status</label>
                                        <select id = "Status" name="status">
                                            <option value = "sanitary">Sanitary</option>   
                                            <option value = "on-delivery">On-Delivery</option>   
                                            <option value = "delivered">Delivered</option>   
                                        </select>
                                    </div>

                                    <div class="mb-3">
                                        <button type="submit" name="update_cargo" class="btn btn-primary">
                                            Update Cargo
                                        </button>
                                    </div>

                                </form>
                                <?php
                            }
                            else
                            {
                                echo "<h4>No Such Id Found</h4>";
                            }
                        }
                        ?>
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