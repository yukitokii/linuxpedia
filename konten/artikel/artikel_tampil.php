<?php
include 'lib/koneksi.php';

if (!isset($_SESSION["login"])) {
    header("location: index.php");
    exit;
}

$id_user = $_SESSION["id_user"];
?>
<ul class="breadcrumb">
  <li>Home</li>
  <li class="active">Data Artikel</li>
</ul>

<h2>Data Artikel</h2>

<a href="?tampil=artikel_tambah" class="btn btn-primary">Tambah Artikel</a><br><br>

<!-- <div class="col-md-7"> -->
<div class="table-responsive">
    <table class="table table-striped" id="tables">
        <tr>
            <th>NO</th>
            <th>Judul Artikel</th>
            <th>Tanggal</th>
            <th>Status</th>
            <th>Aksi</th>
        </tr>

        <?php

        $no = 1;
        $query = " SELECT * FROM artikel_user WHERE id_user = '$id_user' ORDER BY id_artikel_user DESC ";
        $result = mysqli_query($conn, $query);
        while ($row = mysqli_fetch_assoc($result)) :
            if ($row["status"] == "") {
                $status = "Belum Dikonfirmasi";
            } else {
                $status = $row["status"];
            }


            ?>
            <tr>
                <td> <?= $no ?> </td>
                <td class="col-md-4"> <?= $row["judul"]; ?> </td>
                <td class="col-md-2"> <?= $row["tanggal"]; ?> </td>
                <td class="col-md-3"><?= $status ?></td>
                <td>
                    <?php if ($status == "Ditolak") : ?>
                        <a href="?tampil=artikel_edit&id=<?= $row["id_artikel_user"]; ?> " class="btn btn-primary btn-sm disabled">Edit</a>
                        <a href="?tampil=artikel_hapus&id=<?= $row["id_artikel_user"]; ?> " class="btn btn-danger btn-sm">Hapus</a>
                    <?php elseif ($status == 'Diterima') : ?>
                        <a href="?tampil=artikel_edit&id=<?= $row["id_artikel_user"]; ?> " class="btn btn-primary btn-sm">Edit</a>
                        <a href="?tampil=artikel_hapus&id=<?= $row["id_artikel_user"]; ?> " class="btn btn-danger btn-sm">Hapus</a>
                    <?php else : ?>
                        <a href="?tampil=artikel_edit&id=<?= $row["id_artikel_user"]; ?> " class="btn btn-primary btn-sm disabled">Edit</a>
                        <a href="?tampil=artikel_hapus&id=<?= $row["id_artikel_user"]; ?> " class="btn btn-danger btn-sm disabled">Hapus</a>
                    <?php endif ?>

                </td>
            </tr>

            <?php
            $no++;
        endwhile; ?>

    </table>
</div>
<!-- </div> -->