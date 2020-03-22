<h2 class="sub-header">Data Menu</h2>

<a href="?tampil=menu_tambah" class="btn btn-primary btn-sm">Tambah Menu</a> <br><br>

<div class="table-responsive">
<table class="table table-striped">
    <tr>
        <th>No</th>
        <th>Judul Menu</th>
        <th>Link</th>
        <th>Urutan</th>
        <th>Aksi</th>
    </tr>


<?php
include '../lib/functions.php';
$no=1;
$result = mysqli_query($conn, "SELECT * FROM menu ORDER BY urutan");
while($row = mysqli_fetch_assoc($result)) : ?>

    <tr>
        <td> <?= $no; ?> </td>
        <td> <?= $row["judul"]; ?> </td>
        <td> <?= $row["link"]; ?> </td>
        <td> <?= $row["urutan"]; ?> </td>
        <td>
            <a href="?tampil=menu_edit&id=<?= $row["id_menu"]; ?>" class="btn btn-primary btn-sm">Edit</a> 
            <a href="?tampil=menu_hapus&id=<?= $row["id_menu"]; ?>" class="btn btn-danger btn-sm">Hapus</a>
        </td>
    </tr>

<?php 
$no++;
endwhile; ?>
</table>
</div>