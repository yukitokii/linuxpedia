<h2 class="sub-header">Data Artikel</h2>


<div class="table-responsive">
    <table class="table table-striped" id="tables">
        <tr>
            <th>NO</th>
            <th>Username</th>
            <th>Judul Artikel</th>
            <th>Status</th>
            <th>Aksi</th>
        </tr>

        <?php
        include '../lib/functions.php';
        $no = 1;
        $query = " SELECT * FROM artikel_user JOIN user ON artikel_user.id_user = user.id_user WHERE status ='Pending' ORDER BY id_artikel_user DESC ";
        $result = mysqli_query($conn, $query);
        while ($row = mysqli_fetch_assoc($result)) :
            if ($row["status"] == "Pending") {
                $status = "Belum Dikonfirmasi";
            } else {
                $status = $row["status"];
            }
            ?>
            <tr>
                <td> <?= $no ?> </td>
                <td> <?= $row["username"]; ?> </td>
                <td> <a href="?tampil=artikel_user_detail&id=<?= $row["id_artikel_user"]; ?> " target="blank"><?= $row["judul"]; ?></a> </td>
                <td> <?= $status ?> </td>
                <td>
                    <a href="?tampil=artikel_user_terima&id=<?= $row["id_artikel_user"]; ?> " class="btn btn-primary btn-sm">Terima</a>
                    <a href="?tampil=artikel_user_tolak&id=<?= $row["id_artikel_user"]; ?> " class="btn btn-danger btn-sm">Tolak</a>
                </td>
            </tr>

            <?php
            $no++;
        endwhile; ?>

    </table>
</div>