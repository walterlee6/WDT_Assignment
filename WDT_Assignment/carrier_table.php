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
    <script language="JavaScript" type="text/javascript">
        function checkDelete() {
            return confirm('Are you sure?');
        }
    </script>
</head>

<body>
    <?php include 'admin_header.php'; ?>
    <?php include 'connection.php'; ?>
    <h1 class="text-center mt-5">Update Carrier</h1>
    <div class="container-fluid rounded mt-5">
        <table class="table table-bordered border-dark bg-white">
            <tr>
                <th scope="col">Carrier ID</th>
                <th scope="col">Type(Fraglie/Non-Fragile)</th>
                <th scope="col">Estimated Arrival Date</th>
                <th scope="col">Status</th>
                <th scope="col" colspan="2">Action</th>
            </tr>

            <?php
            $sql = "SELECT * FROM carrier";
            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) > 0) {
                // output data of each row
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<td>" . $row['carrier_id'] . "</td>";
                    echo "<td>" . $row['type'] . "</td>";
                    echo "<td>" . $row['delivered_date'] . "</td>";
                    echo "<td>" . $row['status'] . "</td>";
                    echo '<td class="d-flex border-start-0">';
                    echo '<form action="update_carrier_form.php" method="post">';
                    echo '<input type="submit" name="update" value="update" class="m-1 p-1">';
                    echo '<input type="hidden" name="carrier_id" value="' . $row['carrier_id'] . '"/>';
                    echo '</form>';
                    echo '<form action="#" method="post">';
                    echo '<input type="submit" name="delete" value="delete" class="m-1 p-1" onclick="return checkDelete()")">';
                    echo '<input type="hidden" name="carrier_id" value="' . $row['carrier_id'] . '"/>';
                    echo '</form>';
                    echo '</td>';
                    echo '</tr>';
                }
            }
            ?>

        </table>
    </div>
    <?php include 'admin_footer.php';
    if (isset($_GET['msg'])) {
        if ($_GET['msg'] == 'deletesuccess') {
            echo "<script type='text/javascript'>alert('Delete Successful!')</script>";
        } elseif ($_GET['msg'] = 'updatesuccess') {
            echo "<script type='text/javascript'>alert('Update Successful')</script>";
        } elseif ($_GET['msg'] = 'failed') {
            echo "<script type='text/javascript'>alert('Something went wrong')</script>";
        }
    }?>
</body>

</html>
<?php
if (isset($_POST['carrier_id'])) {
    $Carrier_ID = $_POST['carrier_id'];
    $sql = "DELETE FROM carrier WHERE Carrier_ID=$Carrier_ID";
    if (mysqli_query($conn, $sql)) {
        header("Location: carrier_table.php?msg=deletesuccess");
    } else {
        header("Location: carrier_table.php?msg=failed");
    }
}