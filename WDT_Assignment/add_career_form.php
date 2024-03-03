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
    <div class="container border border-dark rounded bg-white mt-5">
        <h1 class="text-center m-1">Add Career</h1>
        <form action="#" method="get">
            <div class="mb-3">
                <label for="career_name" class="form-label">Career Name:</label>
                <input type="text" name="career_name" id="career_name" class="form-control">
            </div>
            <div class="mb-3">
                <label for="location" class="form-label">location:</label>
                <input type="text" name="location" id="location" class="form-control">
            </div>
            <input type="submit" value="Add" class="btn btn-primary mb-3">
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

</html>
<?php
include 'connection.php';
if(isset($_GET['career_name']) && isset($_GET['location'])){
    if(!empty($_GET['career_name']) && !empty($_GET['location'])){
        $career_name = $_GET['career_name'];
        $location = $_GET['location'];
        $sql = "INSERT INTO career(career_name,location) VALUES('$career_name','$location')";
        if(mysqli_query($conn,$sql)){
            header("location:add_career_form.php?msg=success");
        }
        else{
            header("location:add_career_form.php?msg=failed");
        }
    }
}
