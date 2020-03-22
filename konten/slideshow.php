<?php
include 'lib/koneksi.php';

$files = scandir("gambar/galeri/");

?>

<div id="myCarousel" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <?php
    $i = 0;
    for ($a = 2; $a < count($files); $a++) :
      ?>
      <li data-target="#myCarousel" data-slide-to="0" class="<?= $i == 0 ? 'active' : ''; ?> "></li>
      <?php
      $i++;
    endfor;
    ?>
  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner">
    <?php
    $i = 0;
    for ($a = 2; $a < count($files); $a++) :
      ?>
      <div class="item <?= $i == 0 ? 'active' : ''; ?> ">
        <img width="100%" src="gambar/galeri/<?= $files[$a]; ?> ">
      </div>
      <?php
      $i++;
    endfor;
    ?>
  </div>

  <!-- Left and right controls -->
  <a class="left carousel-control" href="#myCarousel" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#myCarousel" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right"></span>
    <span class="sr-only">Next</span>
  </a>
</div>