<?php
include '../lib/functions.php';
?>

<h2>Galeri Wallpaper</h2>
<div class="galeri">
    <table cellpadding="5">
        <tr>
            <?php
                $no = 1;
                $query = " SELECT * FROM galeri ORDER BY id_galeri DESC LIMIT 12 ";
                $result = mysqli_query($conn, $query);
                while($row = mysqli_fetch_assoc($result)) : 
                    $judul = $row["judul"];
                    $gambar = $row["gambar"];
            ?>
            <td align="center">
                <a id="fancybox" href="gambar/galeri/<?= $gambar ?>" title="<?= $judul ?>">
                    <img src="gambar/galeri/<?= $gambar ?>"  width="150" height="100" > <br>
                    <?= $judul ?>
                </a>
            </td>
    <?php
        if($no%4 == 0) {
            echo "</tr><tr>";
        }
        $no++;
    endwhile;
    ?>
    </tr>
    </table>

</div>
