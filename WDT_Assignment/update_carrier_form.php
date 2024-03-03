<!DOCTYPE html>
<html lang="en">
<?php include 'connection.php'?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="stylesheet" href="style1.css">
    <script language="JavaScript" type="text/javascript">
        function checkDelete() {
            return confirm('Are you sure?');
        }
    </script>
</head>

<body>
    <?php
    include 'admin_header.php';
    ?>
    <div class="container border border-dark bg-white rounded mt-5">
        <h1 class="text-center m-1">Update Carrier</h1>
        <?php
        $Carrier_ID = $_POST['carrier_id'];
        ?>
        <form action="#" method="get">
            <div class="mb-3">
                <label for="fragile" class="form-label">Status:</label><br>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="type" id="fragile" value="fragile" checked>
                    <label class="form-check-label" for="fragile">
                        Fragile
                    </label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="type" value="non-fragile" id="non_fragile">
                    <label class="form-check-label" for="non_fragile">
                        Non-fragile
                    </label>
                </div>
            </div>
            <div class="mb-3">
                <label for="date" class="form-label">Estimated Delivered Date:</label>
                <input type="date" name="date" id="date" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="Arrival" class="form-label">Status:</label><br>
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
                    <input class="form-check-input" type="radio" name="status" value="delivered" id="delivered">
                    <label class="form-check-label" for="delivered">
                        Delivered
                    </label>
                </div>
            </div>
            <?php echo '<input type="hidden" name="carrier_id" value="' . $Carrier_ID . '">' ?>
            <input type="submit" value="Update" class="btn btn-primary mb-3">
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
if (isset($_GET['type']) && isset($_GET['date']) && isset($_GET['status'])) {
    if (!empty($_GET['type']) && !empty($_GET['date']) && !empty($_GET['status'])) {
        $type = $_GET['type'];
        $date = $_GET['date'];
        $date = date('Y-m-d', strtotime($date));
        $status = $_GET['status'];
        $Carrier_ID = $_GET['carrier_id'];
        $sql = "UPDATE carrier SET type='$type',delivered_date='$date',Status='$status' WHERE Carrier_ID=$Carrier_ID";
        if (mysqli_query($conn, $sql)) {
            header("Location: carrier_table.php?msg=updatesuccess");
        } else {
            header("Location: carrier_table.php?msg=failed");
        }
    }
}