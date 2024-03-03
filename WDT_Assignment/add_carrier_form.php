<!DOCTYPE html>
<html lang="en">
<?php ob_start(); ?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="stylesheet" href="style1.css">
</head>

<body>
<?php
    include 'admin_header.php';
    ?>
    <div class="container border border-dark bg-white rounded mt-5">
        <h1 class="text-center">Add Carrier</h1>
        <form action="#" method="post">
            <div class="mb-3">
                <label for="fragile" class="form-label">Status:</label><br>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="type" id="fragile" value="fragile" checked>
                    <label class="form-check-label" for="fragile">
                        Fragile
                    </label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="type" value="non_fragile" id="non_fragile">
                    <label class="form-check-label" for="non_fragile">
                        Non-Fragile
                    </label>
                </div>
            </div>
            <div class="mb-3">
                <label for="delivered_date" class="form-label">Estimated Delivered Date:</label>
                <input type="date" name="date" id="date" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="arrival" class="form-label">Status:</label><br>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="status" value="arrival" id="arrival" checked>
                    <label class="form-check-label" for="arrival">
                        Arrival
                    </label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="status" value="packaging" id="packaging">
                    <label class="form-check-label" for="packaging">
                        Packaging
                    </label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="status" value="on-delivery" id="on_delivery">
                    <label class="form-check-label" for="on_delivery">
                        On Delivery
                    </label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="status" value="delivered_date" id="delivered_date">
                    <label class="form-check-label" for="delivered_date">
                        Delivered
                    </label>
                </div>
            </div>
            <input type="submit" value="Submit" class="btn btn-primary mb-3">
        </form>
    </div>
    <?php
    include 'admin_footer.php';

    if (isset($_GET['msg'])) {
        if ($_GET['msg'] == 'success') {
            echo "<script type='text/javascript'>alert('Add successful!')</script>";
        } elseif ($_GET['msg'] = 'failed') {
            echo "<script type='text/javascript'>alert('Something went wrong')</script>";
        }
    }
    ?>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>

</html>
<?php
    include 'connection.php'; 
if (isset($_POST['type']) && isset($_POST['date']) && isset($_POST['status'])) {
    if (!empty($_POST['type']) && !empty($_POST['date']) && !empty($_POST['status'])) {
        $type = $_POST['type'];
        $delivered_date = $_POST['date'];
        $delivered_date = date('Y-m-d', strtotime($delivered_date));
        $status = $_POST['status'];
        $sql = "INSERT INTO carrier(type,delivered_date,status) VALUES('$type','$delivered_date','$status')";
        if (mysqli_query($conn, $sql)) {
            header("Location:add_carrier_form.php?msg=success");
        } else {
            header("Location:add_carrier_form.php?msg=failed");
        }
    }
}
