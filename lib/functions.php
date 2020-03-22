<?php
$host = "localhost";
$user = "admin";
$pass = "HatsuneMiku01";
$db = "linux";
$conn = mysqli_connect($host, $user, $pass, $db);

function redirect($tujuan)
{
    header("location: ../admin.php?tampil=$tujuan ");
}
?>