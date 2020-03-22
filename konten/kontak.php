<ul class="breadcrumb">
    <li>Home</li>
    <li class="active">Kontak kami</li>
</ul>

<form action="?tampil=kontak_proses" method="post" id="formkontak" class="form-horizontal well">
    <div class="form-group">
        <label for="nama" class="control-label col-md-2">Nama</label>
        <div class="col-md-10">
            <input type="text" name="nama" id="nama" class="form-control" required>
        </div>
    </div>
    <div class="form-group">
        <label for="email" class="control-label col-md-2">Email</label>
        <div class="col-md-10">
            <input type="email" name="email" id="email" class="form-control" required>
        </div>
    </div>
    <div class="form-group">
        <label for="pesan" class="control-label col-md-2">Pesan</label>
        <div class="col-md-10">
            <textarea name="pesan" id="pesan" rows="8" class="form-control" required></textarea>
        </div>
    </div>
    <div class="form-group">
        <div class="col-md-10 col-md-offset-2">
            <button type="submit" class="btn btn-primary">Kirim</button>
        </div>
    </div>
</form>