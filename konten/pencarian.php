<?php
include 'lib/koneksi.php';

$perPage = 3;
$page = isset($_GET["halaman"]) ? $_GET["halaman"] : 1;
$start = ($page > 1) ? ($page * $perPage) - $perPage : 0;

$semua = mysqli_query($conn, " SELECT * FROM artikel ");
$total = mysqli_num_rows($semua);
$pages = ceil($total / $perPage);

$kata = $_POST["kata"];
$query = " SELECT * FROM artikel WHERE judul LIKE '%$kata%' OR isi LIKE '%$kata%'
            ORDER BY id_artikel DESC LIMIT $start, $perPage ";
$result = mysqli_query($conn, $query);
$hasil = mysqli_num_rows($result);


// buka if untuk pencarian
if ($hasil > 0) :

    echo "Hasil pencarian dari <b>$kata</b>";
    while ($row = mysqli_fetch_assoc($result)) :
        $id = $row["id_artikel"];
        $judul = $row["judul"];
        $gambar = $row["gambar"];

        $isi = substr($row["isi"], 0, 800);
        $isi = substr($row["isi"], 0, strrpos($isi, " "));
        // var_dump($gambar);
        ?>
        <div class="artikel">
            <h3 class="judul"> <?= $judul ?> </h3>
            <div class="row">
                <div class="col-md-4">
                    <?php if ($gambar != "") : ?>
                        <img src="gambar/artikel/<?= $gambar ?>" class="thumbnail" width="100%" height="150px">
                    <?php else : ?>
                        <img src="gambar/artikel/default.jpg" class="thumbnail" width="100%" height="150px">
                    <?php endif ?>
                </div>
                <div class="col-md-8">
                    <?= $isi ?> ...
                    <a href="?tampil=artikel_detail&id=<?= $id ?>" class="btn btn-primary btn-xs">Selengkapnya</a>
                </div>
            </div>
        </div>
    <?php endwhile;
    $sebelumnya = $page - 1;
    $berikutnya = $page + 1;
    ?>

<?php else : ?>
    <p>Artikel yang dicari tidak ditemukan</p>
    <!-- tutup if untuk pencarian -->
<?php endif ?>