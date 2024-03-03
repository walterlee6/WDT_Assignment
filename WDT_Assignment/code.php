<?php
session_start();
require 'connection.php';

if(isset($_POST['delete_cargo']))
{
    $cargo_id = mysqli_real_escape_string($conn, $_POST['delete_cargo']);

    $query = "DELETE FROM marine_transportation WHERE Cargo_id='$cargo_id' ";
    $query_run = mysqli_query($conn, $query);

    if($query_run)
    {
        $_SESSION['message'] = "Data Deleted Successfully";
        header("Location: marine_table.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Data Not Deleted";
        header("Location: marine_table.php");
        exit(0);
    }
}

if(isset($_POST['update_cargo']))
{
    $cargo_id = mysqli_real_escape_string($conn, $_POST['Cargo_id']);

    $type = mysqli_real_escape_string($conn, $_POST['type']);
    $date = mysqli_real_escape_string($conn, $_POST['date']);
    $status = mysqli_real_escape_string($conn, $_POST['status']);
   

    $query = "UPDATE marine_transportation SET Type='$type', Estimated_Delivered_Date='$date', Status='$status' WHERE Cargo_id='$cargo_id' ";
    $query_run = mysqli_query($conn, $query);

    if($query_run)
    {
        $_SESSION['message'] = "Form Updated Successfully";
        header("Location: marine_table.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Form Not Updated";
        header("Location: marine_table.php");
        exit(0);
    }

}


if(isset($_POST['submit']))
{
    $type = mysqli_real_escape_string($conn, $_POST['type']);
    $date = mysqli_real_escape_string($conn, $_POST['date']);
    $status = mysqli_real_escape_string($conn, $_POST['status']);
   
    $query = "INSERT INTO `marine_transportation` (Type,Estimated_Delivered_Date,Status) 
    VALUES ('$type','$date','$status')";

    $query_run = mysqli_query($conn, $query);
    if($query_run)
    {
        $_SESSION['message'] = "Marine Form Created Successfully";
        header("Location: cargo-create.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Marine Form Not Created";
        header("Location: cargo-create.php");
        exit(0);
    }
}

?>