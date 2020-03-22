<h2 class="sub-header">Tambah Halaman</h2>
<form action="?tampil=halaman_tambahProses" method="post" class="form-horizontal">
    <div class="form-group">
        <label for="judul" class="label-control col-md-2">Judul Halaman</label>
        <div class="col-md-4">
            <input type="text" name="judul" required id="judul" class="form-control">
        </div>
    </div>
    <div class="form-group">
        <label for="isi" class="label-control col-md-2">Isi Halaman</label>
        <div class="col-md-9">
            <textarea name="isi" cols="80" rows="20" id="isi" class="form-control tiny"></textarea>
        </div>
    </div>
    <div class="form-group">
        <label class="label-control col-md-2"></label>
        <div class="col-md-4">
            <button type="submit" name="submit" class="btn btn-primary">Tambah</button>
        </div>
    </div>
</form>