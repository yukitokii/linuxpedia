<?php
include 'lib/koneksi.php';
?>

<h3 class="judul">PENCARIAN</h3>
<form class="form-inline md-form mr-auto mb-4" action="?tampil=pencarian" method="post">
    <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search" name="kata">
    <button class="btn aqua-gradient btn-rounded btn-sm my-0" type="submit">Search</button>
</form><br>

<ul class="nav nav-tabs">
    <li class="active">
        <a href="#konten1" data-toggle="tab">Terbaru</a>
    </li>
    <li>
        <a href="#konten2" data-toggle="tab">Popular</a>
    </li>
    <li>
        <a href="#konten3" data-toggle="tab">Komentar</a>
    </li>
</ul>

<div class="tab-content">
    <div class="tab-pane fade in active" id="konten1">
        <ul>
            <?php
            $result = mysqli_query($conn, " SELECT * FROM artikel ORDER BY id_artikel DESC LIMIT 5 ");
            while ($row = mysqli_fetch_assoc($result)) {
                $id = $row["id_artikel"];
                $judul = $row["judul"];
                $gambar = $row["gambar"];

                if ($gambar != "") {
                    echo "<li> <img src='gambar/artikel/$gambar' class='img-thumbnail img-responsive'> 
                    <a href='?tampil=artikel_detail&id=$id '>$judul </a> </li> ";
                } else {
                    echo "<li> <img src='gambar/artikel/default.jpg' class='img-thumbnail img-responsive'> 
                    <a href='?tampil=artikel_detail&id=$id '>$judul </a> </li> ";
                }
            }
            ?>
        </ul>
    </div>
    <div class="tab-pane fade" id="konten2">
        <ul>
            <?php
            $result = mysqli_query($conn, " SELECT * FROM artikel ORDER BY hits DESC LIMIT 5 ");
            while ($row = mysqli_fetch_assoc($result)) {
                $id = $row["id_artikel"];
                $judul = $row["judul"];
                $gambar = $row["gambar"];
                $hits = $row["hits"];

                if ($gambar != "") {
                    echo "<li> <img src='gambar/artikel/$gambar' class='img-thumbnail img-responsive'> 
                    <a href='?tampil=artikel_detail&id=$id '>$judul </a><br>
                    <span class='text-muted text-left'>Dilihat $hits Kali</span>
                    </li> ";
                } else {
                    echo "<li> <img src='gambar/artikel/default.jpg' class='img-thumbnail img-responsive'> 
                    <a href='?tampil=artikel_detail&id=$id '>$judul </a><br>
                    <span class='text-muted text-left'>Dilihat $hits Kali</span>
                    </li> ";
                }
            }
            ?>
        </ul>
    </div>

    <div class="tab-pane fade" id="konten3">
        <ul>
            <?php
            $result = mysqli_query($conn, " SELECT * FROM komentar JOIN user ON komentar.id_user = user.id_user ORDER BY id_komentar DESC LIMIT 5 ");
            while ($row = mysqli_fetch_assoc($result)) {
                $id = $row["id_artikel"];
                $komentar = $row["komentar"];
                $nama = $row["nama"];
                echo "<li> <b> $nama: </b> <a href='?tampil=artikel_detail&id=$id '>$komentar </a> </li> ";
            }
            ?>
        </ul>
    </div>
</div>

</div>