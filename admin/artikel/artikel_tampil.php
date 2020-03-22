<h2 class="sub-header">Data Artikel</h2>

<a href="?tampil=artikel_tambah" class="btn btn-primary">Tambah Artikel</a><br><br>

<div class="table-responsive">
<table class="table table-striped" id="tables">
    <tr>
        <th>NO</th>
        <th>Username</th>
        <th>Judul Artikel</th>
        <th>Tanggal</th>
        <th>Aksi</th>
    </tr>

<?php 
include '../lib/functions.php';
$no = 1;
$query = " SELECT * FROM artikel JOIN user ON artikel.id_user = user.id_user ORDER BY id_artikel DESC ";
$result = mysqli_query($conn, $query);
while ( $row = mysqli_fetch_assoc($result) ) : 

?>
    <tr>
        <td> <?= $no ?> </td>
        <td> <?= $row["username"]; ?> </td>
        <td> <?= $row["judul"]; ?> </td>
        <td> <?= $row["tanggal"]; ?> </td>
        <td> 
            <a href="?tampil=artikel_edit&id=<?= $row["id_artikel"]; ?> " class="btn btn-primary btn-sm">Edit</a> 
            <a href="?tampil=artikel_hapus&id=<?= $row["id_artikel"]; ?> " class="btn btn-danger btn-sm">Hapus</a>
        </td>
    </tr>

<?php
$no++;
endwhile; ?>

</table>
</div>
