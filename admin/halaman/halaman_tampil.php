<h2 class="sub-header">Data Halaman</h2>

<a href="?tampil=halaman_tambah" class="btn btn-primary btn-sm">Tambah Halaman</a><br><br>

<div class="table-responsive">
<table class="table table-striped">
    <tr>
        <th>No</th>
        <th>Judul Halaman</th>
        <th>Link Halaman</th>
        <th>Aksi</th>
    </tr>
<?php 
include '../lib/functions.php';
$no = 1;
$result = mysqli_query($conn, " SELECT * FROM halaman ");
while($row = mysqli_fetch_assoc($result)) : ?>
    <tr>
        <td> <?= $no ?> </td>
        <td> <?= $row["judul"] ?> </td>
        <td> ?tampil=halaman&id=<?= $row["id_halaman"] ?> </td>
        <td>
            <a href="?tampil=halaman_edit&id=<?= $row["id_halaman"] ?>" class="btn btn-primary btn-sm">Edit</a> 
            <a href="?tampil=halaman_hapus&id=<?= $row["id_halaman"] ?>" class="btn btn-danger btn-sm">Hapus</a>
        </td>
    </tr>
<?php 
$no++;
endwhile;
?>
</table>
</div>