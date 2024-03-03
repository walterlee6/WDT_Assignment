<!DOCTYPE html>
<html lang="en">

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
    include 'connection.php';
    ?>
    <h1 class="text-center">Update Career</h1>
    <div class="container-sm">
        <table class="table table-bordered border-dark bg-white rounded">
            <tr>
                <th scope="col">Career Name</th>
                <th scope="col">Location</th>
                <th scope="col">Action</th>
            </tr>
            <tr>
                <?php
                $sql = "SELECT * FROM career";
                $result = mysqli_query($conn, $sql);
                if (mysqli_num_rows($result) > 0) {
                    // output data of each row
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<td>" . $row['career_name'] . "</td>";
                        echo "<td>" . $row['location'] . "</td>";
                        echo '<td class="d-flex border-start-0">';
                        echo '<form action="Update_Career_Form.php" method="post">';
                        echo '<input type="submit" name="update" value="update" class="m-1 p-1">';
                        echo '<input type="hidden" name="career_id" value="' . $row['career_id'] . '"/>';
                        echo '<input type="hidden" name="career_name" value="' . $row['career_name'] . '"/>';
                        echo '<input type="hidden" name="location" value="' . $row['location'] . '"/>';
                        echo '</form>';
                        echo '<form action="#" method="post">';
                        echo '<input type="submit" name="delete" value="delete" class="m-1 p-1" onclick="return checkDelete()")">';
                        echo '<input type="hidden" name="career_id" value="' . $row['career_id'] . '"/>';
                        echo '<input type="hidden" name="career_name" value="' . $row['career_name'] . '"/>';
                        echo '<input type="hidden" name="location" value="' . $row['location'] . '"/>';
                        echo '</form>';
                        echo '</td>';
                        echo '</tr>';
                    }
                }
                ?>
            </tr>
        </table>
    </div>

    <?php
    include 'admin_footer.php';
    if (isset($_GET['msg'])) {
        if ($_GET['msg'] == 'deletesuccess') {
            echo "<script type='text/javascript'>alert('Delete Successful!')</script>";
        } elseif ($_GET['msg'] = 'updatesuccess') {
            echo "<script type='text/javascript'>alert('Update Successful')</script>";
        } elseif ($_GET['msg'] = 'failed') {
            echo "<script type='text/javascript'>alert('Something went wrong')</script>";
        }
    }
    ?>
</body>

</html>
<?php
    if(isset($_POST['career_id'])){
            $career_id = $_POST['career_id'];
            $sql = "DELETE FROM career WHERE career_id='$career_id'";
            if(mysqli_query($conn,$sql)){
                header("Location:career_table.php?msg=deletesuccess");
            }
            else{
                header("Location:career_table.php?msg=failed");
            }
        }