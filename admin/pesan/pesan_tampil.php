<?php
include '../lib/functions.php';

?>
<h2 class="sub-header">Data Pesan</h2>

<div class="table-responsive">
<table class="table table-striped" >
    <tr>
        <th>No</th>
        <th>Nama</th>
        <th>Email</th>
        <th>Subjek</th>
        <th>Tanggal</th>
        <th>Aksi</th>
    </tr>

<?php
$no = 1;
$query = " SELECT * FROM pesan ";
$result = mysqli_query($conn, $query);

while ($row = mysqli_fetch_assoc($result)) : ?>

    <tr>
        <td> <?= $no ?> </td>
        <td> <?= $row["nama"] ?> </td>
        <td> <?= $row["email"] ?> </td>
        <td> <a href="?tampil=pesan_balas&id=<?= $row["id_pesan"] ?>"><?= $row["subjek"] ?></a> </td>
        <td> <?= $row["tanggal"] ?> </td>
        <td>
            <a href="?tampil=pesan_hapus&id=<?= $row["id_pesan"] ?>" class="btn btn-danger btn-sm">Hapus</a>
        </td>
    </tr>

<?php
$no++;
endwhile;
?>

</table>
</div>