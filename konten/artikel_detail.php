<?php
include 'lib/koneksi.php';
$id = $_GET["id"];
mysqli_query($conn, " UPDATE artikel SET hits=hits+1 WHERE id_artikel='$id' ");

$query = " SELECT * FROM artikel JOIN user ON artikel.id_user = user.id_user WHERE id_artikel='$id' ";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);
$judul = $row["judul"];
$gambar = $row["gambar"];
$isi = $row["isi"];
$nama = $row["nama"];
$tanggal = $row["tanggal"];

?>

<ul class="breadcrumb">
  <li>Home</li>
  <li>Artikel</li>
  <li class="active"><?= $judul ?></li>
</ul>

<div class="artikel">
    <div class="col-md-12">
        <h2 class="judul text-left"> <?= $judul ?> </h2>
        <span class="text-muted text-left nama-user"><?= $nama ?> - <?= $tanggal ?> </span>
    </div>
    <div class="row">
        <div class="col-md-12 gambar">
            <?php if ($gambar != "") : ?>
                <img src="gambar/artikel/<?= $gambar ?>" class="img-responsive img-rounded">
            <?php endif ?>
        </div>
        <div>
            <p><?= $isi ?></p>
        </div>
    </div>
</div>
<hr>
<?php
// tampil isi komentar

$komentar = mysqli_query($conn, " SELECT * FROM komentar JOIN user ON komentar.id_user = user.id_user WHERE id_artikel='$id' ");

$jmlKomentar = mysqli_num_rows($komentar);
?>
<h3><?= $jmlKomentar ?> Komentar</h3>
<hr>
<?php
$tanggal = $row["tanggal"];
while ($row = mysqli_fetch_assoc($komentar)) :
    $nama = $row["nama"];
    // $profil = $row["profil"];
    $komen = $row["komentar"];
    if ($row["profil"] != "") {
        $profil = $row["profil"];
    } else {
        $profil = "default.png";
    }
    ?>
    <div class="komentar">
        <div class="col-md-1">
            <img src="gambar/profil/<?= $profil ?>" class="img-responsive avatar">
        </div>
        <div>
            <h4><?= $nama ?> - <?= $tanggal ?></h4>
            <p><?= $komen ?></p>
        </div>
    </div>
    <hr>
<?php endwhile; ?>
<h3>Isi Komentar</h3>

<!-- form komentar -->

<form action="?tampil=komentar_proses" method="post" class="form-horizontal well" id="formkomentar">
    <input type="hidden" name="id" value=" <?= $id ?> ">
    <div class="form-group">
        <label for="komentar" class="control-label col-md-2">Komentar</label>
        <div class="col-md-10">
            <textarea name="komentar" id="komentar" rows="8" class="form-control"></textarea>
        </div>
    </div>
    <div class="form-group">
        <div class="col-md-10 col-md-offset-2">
            <button type="submit" class="btn btn-primary">Kirim Komentar</button>
        </div>
    </div>
</form>