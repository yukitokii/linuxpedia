<?php

if (isset($_GET["tampil"])) {
    $tampil = $_GET["tampil"];
} else {
    $tampil = "beranda";
}

if( $tampil == "beranda" ) {
    include 'beranda.php';
} elseif ( $tampil == "keluar" ) {
    include 'keluar.php';
} 

  elseif ( $tampil == "menu" ) {
    include 'menu/menu_tampil.php';
} elseif ( $tampil == "menu_tambah" ) {
    include 'menu/menu_tambah.php';
} elseif ( $tampil == "menu_tambahProses" ) {
    include 'menu/menu_tambahProses.php';
} elseif ( $tampil == "menu_edit" ) {
    include 'menu/menu_edit.php';
} elseif ( $tampil == "menu_editProses" ) {
    include 'menu/menu_editProses.php';
} elseif ( $tampil == "menu_hapus" ) {
    include 'menu/menu_hapus.php';
}

elseif ( $tampil == "halaman" ) {
    include 'halaman/halaman_tampil.php';
} elseif ( $tampil == "halaman_tambah" ) {
    include 'halaman/halaman_tambah.php';
} elseif ( $tampil == "halaman_tambahProses" ) {
    include 'halaman/halaman_tambahProses.php';
} elseif ( $tampil == "halaman_edit" ) {
    include 'halaman/halaman_edit.php';
} elseif ( $tampil == "halaman_editProses" ) {
    include 'halaman/halaman_editProses.php';
} elseif ( $tampil == "halaman_hapus" ) {
    include 'halaman/halaman_hapus.php';
}

elseif ( $tampil == "artikel" ) {
    include 'artikel/artikel_tampil.php';
} elseif ( $tampil == "artikel_tambah" ) {
    include 'artikel/artikel_tambah.php';
} elseif ( $tampil == "artikel_tambahProses" ) {
    include 'artikel/artikel_tambahProses.php';
} elseif ( $tampil == "artikel_edit" ) {
    include 'artikel/artikel_edit.php';
} elseif ( $tampil == "artikel_editProses" ) {
    include 'artikel/artikel_editProses.php';
} elseif ( $tampil == "artikel_hapus" ) {
    include 'artikel/artikel_hapus.php';
}

elseif ( $tampil == "artikel_user" ) {
    include 'artikel_user/artikel_tampil.php';
} elseif ( $tampil == "artikel_user_detail" ) {
    include 'artikel_user/artikel_detail.php';
} elseif ( $tampil == "artikel_user_terima" ) {
    include 'artikel_user/artikel_terima.php';
} elseif ( $tampil == "artikel_user_tolak" ) {
    include 'artikel_user/artikel_tolak.php';
}

elseif ( $tampil == "galeri" ) {
    include 'galeri/galeri_tampil.php';
} elseif ( $tampil == "galeri_tambah" ) {
    include 'galeri/galeri_tambah.php';
} elseif ( $tampil == "galeri_tambahProses" ) {
    include 'galeri/galeri_tambahProses.php';
} elseif ( $tampil == "galeri_edit" ) {
    include 'galeri/galeri_edit.php';
} elseif ( $tampil == "galeri_editProses" ) {
    include 'galeri/galeri_editProses.php';
} elseif ( $tampil == "galeri_hapus" ) {
    include 'galeri/galeri_hapus.php';
}

elseif ( $tampil == "pesan" ) {
    include 'pesan/pesan_tampil.php';
} elseif ( $tampil == "pesan_balas" ) {
    include 'pesan/pesan_balas.php';
} elseif ( $tampil == "pesan_balasProses" ) {
    include 'pesan/pesan_balasProses.php';
} elseif ( $tampil == "pesan_hapus" ) {
    include 'pesan/pesan_hapus.php';
}

elseif ( $tampil == "user_edit" ) {
    include 'user/user_edit.php';
} elseif ( $tampil == "user_editProses" ) {
    include 'user/user_editProses.php';
}

elseif ( $tampil == "komentar" ) {
    include 'komentar/komentar_tampil.php';
} elseif ( $tampil == "komentar_hapus" ) {
    include 'komentar/komentar_hapus.php';
}

else {
    echo "Konten Tidak Ada";
}




?>