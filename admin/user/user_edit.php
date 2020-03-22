<?php
include '../lib/functions.php';
$result = mysqli_query($conn, "SELECT username FROM admin ");
$row = mysqli_fetch_assoc($result);
$username = $row["username"];
?>

<h2 class="sub-header">Edit User</h2>

<form action="?tampil=user_editProses" method="post" class="form-horizontal">
    <div class="form-group">
        <label for="username" class="label-control col-md-2">Username</label>
        <div class="col-md-4">
            <input type="text" name="username" class="form-control" value="<?= $username ?>" required>
        </div>
    </div>
    <div class="form-group">
        <label for="password" class="label-control col-md-2">Password</label>
        <div class="col-md-4">
            <input type="password" name="password" class="form-control">
        </div>
    </div>
    <div class="form-group">
        <label for="konfirmasi" class="label-control col-md-2">Konfirmasi Password</label>
        <div class="col-md-4">
            <input type="password" name="password2" class="form-control">
        </div>
    </div>
    <div class="form-group">
        <label class="label-control col-md-2"></label>
        <div class="col-md-2">
            <td><button type="submit" name="ubah" class="btn btn-primary">Ubah User</button></td>
        </div>
    </div>
</form>