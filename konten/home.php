<?php
include 'lib/koneksi.php';

include 'konten/slideshow.php';
// sistem pagination
$perPage = 4;
$page = isset($_GET["halaman"]) ? $_GET["halaman"] : 1;
$start = ($page > 1) ? ($page * $perPage) - $perPage : 0;

$semua = mysqli_query($conn, " SELECT * FROM artikel ");
$total = mysqli_num_rows($semua);
$pages = ceil($total / $perPage);

$result = mysqli_query($conn, " SELECT * FROM artikel ORDER BY id_artikel DESC LIMIT $start, $perPage ");
// var_dump(mysqli_fetch_assoc($result));
// die;
while ($row = mysqli_fetch_assoc($result)) :
    $id = $row["id_artikel"];
    $judul = $row["judul"];
    $gambar = $row["gambar"];

    $isi = substr($row["isi"], 0, 500);
    $isi = substr($row["isi"], 0, strrpos($isi, " "));
    // var_dump($gambar);
    ?>

    <div class="artikel">
        <h3 class="judul"> <?= $judul ?> </h3>
        <div class="row">
            <div class="col-md-4">
                <?php if ($gambar != "") : ?>
                    <img src="gambar/artikel/<?= $gambar ?>" class="img-thumbnail img-responsive">
                <?php else : ?>
                    <img src="gambar/artikel/default.jpg" class="img-thumbnail img-responsive">
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

<div class="paging">

    <!-- pertama & sebelumnya -->
    <?php if ($page > 1) : ?>
        <span class="btn btn-default"> <a href="?tampil=home&halaman=1">Pertama</a> </span>
        <span class="btn btn-default"> <a href="?tampil=home&halaman=<?= $sebelumnya ?>">Sebelumnya</a> </span>
    <?php else : ?>
        <span class="btn btn-default disabled">Pertama</span>
        <span class="btn btn-default disabled">Sebelumnya</span>
    <?php endif ?>


    <!-- nomor halaman -->
    <?php for ($i = 1; $i <= $pages; $i++) : ?>
        <?php if ($i == $page) : ?>
            <span class="btn btn-default"><b><?= $i ?></b></span>
        <?php else : ?>
            <span class="btn btn-default"> <a href="?tampil=home&halaman=<?= $i ?>"><?= $i ?></a> </span>
        <?php endif ?>
    <?php endfor; ?>

    <!-- berikutnya & terakhir -->
    <?php if ($page < $pages) : ?>
        <span class="btn btn-default"> <a href="?tampil=home&halaman=<?= $berikutnya ?>">Berikutnya</a> </span>
        <span class="btn btn-default"> <a href="?tampil=home&halaman=<?= $pages ?>">Terakhir</a> </span>
    <?php else : ?>
        <span class="disabled btn btn-default">Berikutnya</span>
        <span class="disabled btn btn-default">Terakhir</span>
    <?php endif ?>

</div>