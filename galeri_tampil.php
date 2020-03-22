<?php 
include '../lib/functions.php';
?>
<h2 class="sub-header">Data Galeri</h2>

<a href="?tampil=galeri_tambah" class="btn btn-primary btn-sm">Tambah Galeri</a><br><br>

<div class="table-responsive">
<table class="table table-striped" >
    <tr>
        <th>No</th>
        <th>Foto</th>
        <th>Judul Foto</th>
        <th>Tanggal</th>
        <th>Aksi</th>
    </tr>

<?php
$no = 1;
$result = mysqli_query($conn, "SELECT * FROM galeri");
while($row = mysqli_fetch_assoc($result)) : ?>

    <tr>
        <td> <?= $no ?> </td>
        <td> <img src="../gambar/galeri/<?= $row["gambar"]; ?>" width="120px" height="80px" class="img-responsive img-thumbnail"> </td>
        <td> <?= $row["judul"] ?> </td>
        <td> <?= $row["tanggal"] ?> </td>
        <td>
            <a href="?tampil=galeri_edit&id=<?= $row["id_galeri"]; ?>" class="btn btn-primary btn-sm">Edit</a>
            <a href="?tampil=galeri_hapus&id=<?= $row["id_galeri"]; ?>" class="btn btn-danger btn-sm">Hapus</a>
        </td>
    </tr>

<?php
$no++;
endwhile;
?>
</table>
</div>