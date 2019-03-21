<div class="page-header">
    <h3>Data Kostumer Baru</h3>
</div>

<form method="post" action="<?= base_url().'admin/kostumer_add_act' ?>">
    <div class="form-group">
        <label>Nama Kostumer</label>
        <input type="text" name="nama" class="form-control" autocomplete="off">
        <?= form_error('nama'); ?>
    </div>
    <div class="form-group">
        <label>Alamat Kostumer</label>
        <input type="text" name="alamat" class="form-control" autocomplete="off">
        <?= form_error('alamat'); ?>
    </div>
    <div class="form-group">
        <label>Jenis Kelamin</label>
            <select name="jk" class="form-control">
                <option value="L">Laki-laki</option>
                <option value="P">Perempuan</option>
            </select>
        <?= form_error('jk'); ?>
    </div>
    <div class="form-group">
        <label>No. Handphone</label>
        <input type="text" name="hp" class="form-control" autocomplete="off">
    </div>
    <div class="form-group">
        <label>No. KTP</label>
        <input type="text" name="ktp" class="form-control" autocomplete="off">
    </div>
    <div class="form-group">
        <input type="submit" class="btn btn-primary" value="Simpan">
    </div>
</form>