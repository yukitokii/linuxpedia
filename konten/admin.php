<?php
session_start();
$_SESSION["tiket"] = true;

// lalu redirect ke halaman admin
header("location: ../admin/index.php");
exit;
?>