<?php
include 'lib/functions.php';
$result = mysqli_query($conn, " SELECT * FROM menu ORDER BY urutan ");
?>

<div class="navbar navbar-inverse">
    <div class="header">
        <button class="navbar-toggle collapsed" type="button" data-toggle="collapse" data-target=#navbar>
            <div class="icon-bar"></div>
            <div class="icon-bar"></div>
            <div class="icon-bar"></div>
        </button>
    </div>
    <div id="navbar" class="collapse navbar-collapse">


        <ul class="nav navbar-nav">
            <?php while ($row = mysqli_fetch_assoc($result)) : ?>

                <li><a href="<?= $row["link"] ?>"><?= $row["judul"] ?></a></li>

            <?php endwhile ?>
        </ul>


        <?php if (isset($_SESSION["login"])) : ?>
            <ul class="right nav navbar-nav">
            <?php
                    $user = $_SESSION["id_user"];
                    $result = mysqli_query($conn, " SELECT * FROM user WHERE id_user = '$user' ");
                    $row = mysqli_fetch_assoc($result);
            ?>
            <?php if($row["username"] == "admin") : ?>
            <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Hallo, <?= $row["nama"]; ?> <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a target="blank" href="?tampil=halaman_admin">Halaman Admin</a></li>
                        <li><a href="?tampil=keluar">Keluar</a></li>
                    </ul>
                </li>
                <!-- <li><a href="?tampil=keluar"> Keluar </a></li> -->
            </ul>
            <?php else : ?>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Hallo, <?= $row["nama"]; ?> <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="?tampil=user_edit">Ubah Profil</a></li>
                        <li><a href="?tampil=artikel">Artikel Saya</a></li>
                        <li><a href="?tampil=keluar">Keluar</a></li>
                    </ul>
                </li>
                <!-- <li><a href="?tampil=keluar"> Keluar </a></li> -->
            </ul>
            <?php endif ?>
        <?php else : ?>
            <ul class="right nav navbar-nav">
                <li><a href="?tampil=login"> Login </a></li>
            </ul>
        <?php endif ?>
    </div>
</div>