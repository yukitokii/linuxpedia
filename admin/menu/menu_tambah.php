<h2 class="sub-header">Tambah Menu</h2>

<form action="?tampil=menu_tambahProses" method="post" class="form-horizontal">
    <div class="form-group">
        <label for="judul" class="label-control col-md-2">Judul Menu</label>
        <div class="col-md-4">
            <input type="text" name="judul" id="judul" required class="form-control">
        </div>
    </div>
    <div class="form-group">
        <label for="link" class="label-control col-md-2">Link</label>
        <div class="col-md-4">
            <input type="text" name="link" id="link" required class="form-control">
        </div>
    </div>
    <div class="form-group">
        <label for="urutan" class="label-control col-md-2">Urutan</label>
        <div class="col-md-4">
            <input type="text" name="urutan" id="urutan" required class=form-control>
        </div>
    </div>
    <div class="form-group">
        <label class="label-control col-md-2"></label>
        <div class="col-md-4">
            <button type="submit" name="tambah" class="btn btn-primary">Tambah</button>
        </div>
    </div>
</form>