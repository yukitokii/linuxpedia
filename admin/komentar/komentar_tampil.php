<h2 class="sub-header">Data Komentar</h2>

<div class="table-responsive">
<table class="table table-striped">
    <tr>
        <th>No</th>
        <th>Nama User</th>
        <th>Judul Artikel</th>
        <th>Isi Komentar</th>
        <th>Tanggal</th>        
        <th>Aksi</th>
    </tr>
<?php 
include '../lib/functions.php';
$no = 1;
$query = " SELECT * FROM komentar JOIN user ON komentar.id_user = user.id_user JOIN artikel ON komentar.id_artikel = artikel.id_artikel ORDER BY id_komentar DESC ";
$result = mysqli_query($conn, $query);

while($row = mysqli_fetch_assoc($result)) : ?>
    <tr>
        <td> <?= $no ?> </td>
        <td> <?= $row["nama"] ?> </td>
        <td> <?= $row["judul"] ?> </td>
        <td> <?= $row["komentar"] ?> </td>
        <td> <?= $row["tanggal"] ?> </td>
        <td>
            <a href="?tampil=komentar_hapus&id=<?= $row["id_komentar"] ?>" class="btn btn-danger btn-sm">Hapus</a>
        </td>
    </tr>
<?php 
$no++;
endwhile;
?>
</table>
</div>