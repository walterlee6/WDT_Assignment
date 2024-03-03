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
    ?>
    <div class="container border border-dark bg-white rounded">
        <h1 class="text-center m-1">Update Career</h1>
        <?php
        $career_id = $_POST['career_id'];
        $career_name = $_POST['career_name'];
        $location = $_POST['location'];
        ?>
        <form action="#" method="get">
            <div class="mb-3">
                <label for="career_name" class="form-label">Career Name:</label>
                <input type="text" name="career_name" id="career_name" class="form-control" value="<?php echo $career_name; ?>">
            </div>
            <div class="mb-3">
                <label for="location" class="form-label">Location:</label>
                <input type="text" name="location" id="location" class="form-control" value="<?php echo $location; ?> ">
            </div>
            <input type="hidden" value="<?php echo $career_id; ?>" class="btn btn-primary mb-3" name="career_id">
            <input type="submit" value="Update" class="btn btn-primary mb-3">
        </form>
    </div>
</body>
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

</html>
<?php
    include 'connection.php';
    if(isset($_GET['career_id']) && isset($_GET['location'])){
        if(!empty($_GET['career_name']) && !empty($_GET['location'])){
            $career_id = $_GET['career_id'];
            $career_name = $_GET['career_name'];
            $location = $_GET['location'];
            $sql = "UPDATE career SET career_name='$career_name',location='$location' WHERE career_id='$career_id'";
            if(mysqli_query($conn,$sql)){
                header("Location:career_table.php?msg=updatesuccess");
            }
            else{
                header("Location:career_table.php?msg=failed");
            }
        }
    }