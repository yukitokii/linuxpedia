<?php
include '../lib/functions.php';
$id = $_GET["id"];
$query = " SELECT * FROM pesan WHERE id_pesan='$id' ";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);

$email = $row["email"];
$subjek = $row["subjek"];
$pesan = $row["pesan"];

?>

<h2 class="sub-header">Pesan Balas</h2>

<form action="?tampil=pesan_balasProses" method="post" class="form-horizontal">

    <div class="form-group">
        <label for="email" class="label-control col-md-2">Kepada</label>
        <div class="col-md-4">
            <input type="text" name="email" id="email" class="form-control" value="<?= $email ?>">
        </div>
    </div>
    <div class="form-group">
        <label for="subjek" class="label-control col-md-2">Subjek</label>
        <div class="col-md-4">
            <input type="text" name="subjek" id="subjek" class="form-control" value="Re: <?= $subjek ?>">
        </div>
    </div>
    <div class="form-group">
        <label for="pesan" class="label-control col-md-2">Pesan</label>
        <div class="col-md-7">
            <textarea name="pesan" cols="80" rows="15" id="pesan" class="form-control"><?= $pesan ?></textarea>
        </div>
    </div>
    <div class="form-group">
        <label class="col-md-2"></label>
        <div class="col-md-4">
            <button type="submit" name="balas" class="btn btn-primary">Balas</button>
        </div>
    </div>
</form>