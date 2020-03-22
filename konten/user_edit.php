<?php
include 'lib/koneksi.php';

if (!isset($_SESSION["login"])) {
  header("location: index.php");
  exit;
}

$id_user = $_SESSION["id_user"];

$query = " SELECT * FROM user WHERE id_user='$id_user' ";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);
$nama = $row["nama"];
$email = $row["email"];
$username = $row["username"];
$gambar = $row["profil"];

?>


<ul class="breadcrumb">
  <li>Home</li>
  <li class="active">Ubah Profil</li>
</ul>
<div class="container">
  <h1>Edit Profile</h1>
  <hr>
  <div class="row">
    <!-- left column -->
    <form class="form-horizontal" role="form" method="post" action="?tampil=user_editProses" enctype="multipart/form-data">
      <input type="hidden" name="gambarLama" value="<?= $gambar ?>">
      <div class="col-md-7">
        <div class="text-center">
          <?php if ($gambar != "") : ?>
            <div>
              <img src="gambar/profil/<?= $gambar ?>" class="avatar img-thumbnail img-responsive img-thumbnail" width="100px"><br><br>
            </div>
          <?php else : ?>
            <img src="gambar/profil/default.png" class="avatar img-thumbnail img-responsive img-circle" width="100px"><br><br>
          <?php endif ?>
          <div class="form-group">
            <label class="col-lg-3 control-label">Ubah gambar</label>
            <div class="col-lg-8">
              <input type="file" class="form-control" name="gambar">
            </div>
          </div>

          <div class="form-group">
            <label class="col-lg-3 control-label">Nama Lengkap</label>
            <div class="col-lg-8">
              <input class="form-control align-left" type="text" name="nama" value="<?= $nama ?>">
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-3 control-label">Email:</label>
            <div class="col-lg-8">
              <input class="form-control" readonly type="text" name="email" value="<?= $email ?>">
              <!-- <span class="form-control align-left"><?= $email ?> -->
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-3 control-label">Username:</label>
            <div class="col-md-8">
              <input class="form-control" readonly type="text" name="username" value="<?= $username ?>">
              <!-- <span class="form-control align-left"><?= $username ?> -->
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-3 control-label">Password:</label>
            <div class="col-md-8">
              <input class="form-control" type="password" name="password" required>
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-3 control-label">Konfirm password</label>
            <div class="col-md-8">
              <input class="form-control" type="password" name="confirm_password" required>
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-3 control-label"></label>
            <div class="col-md-5">
              <button type="submit" name="ubah" class="btn btn-primary">Simpan Perubahan</button>
              <span></span>
              <button type="reset" name="reset" class="btn btn-default">Batal</button>
            </div>
          </div>
    </form>
  </div>
</div>
</div>
</div>
<hr>