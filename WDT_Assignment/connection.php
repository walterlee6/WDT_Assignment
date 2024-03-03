<?php
$dbhost = 'localhost';
$dbname = 'root';
$dbpass = '';
$conn = mysqli_connect($dbhost, $dbname, $dbpass, 'wdt_assignment');
if (!$conn) {
    echo ("Connection Failed" . mysqli_connect_error());
}
session_start();
ob_start();