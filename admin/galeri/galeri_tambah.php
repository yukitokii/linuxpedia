<h2 class="sub-header">Tambah Galeri</h2>

<form action="?tampil=galeri_tambahProses" method="post" enctype="multipart/form-data" class="form-horizontal">
    <div class="form-group">
        <label for="judul" class="label-control col-md-2">Judul Galeri</label>
        <div class="col-md-4">
            <input type="text" name="judul" required id="judul" class="form-control">
        </div>
    </div>
    <div class="form-group">
        <label for="gambar" class="label-control col-md-2">Gambar</label>
        <div class="col-md-4">
            <input type="file" name="gambar" required id="gambar" class="form-control">
        </div>
    </div>
    <div class="form-group">
        <label class="label-control col-md-2"></label>
        <div class="col-md-4">
            <button type="submit" name="tambah" class="btn btn-primary">Tambah</button>
        </div>
    </div>


</form>