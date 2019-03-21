<div class="page-header">
    <h3>Data barang</h3>
</div>

<form method="post" action="<?= base_url().'admin/mobil_add_act' ?>">
    <div class="form-group">
        <label>Merk barang</label>
        <input type="text" name="merk" class="form-control" autocomplete="off">
        <?= form_error('merk'); ?>
    </div>
    <div class="form-group">
        <label>Warna Mobil</label>
        <input type="text" name="warna" class="form-control" autocomplete="off">
        <?= form_error('warna'); ?>
    </div>
    <div class="form-group">
        <label>jenis barng</label>
        <input type="text" name="tahun" class="form-control" autocomplete="off">
    </div>
    <div class="form-group">
        <label>Status barang</label>
        <select name="status" class="form-control">
            <option value="1">Tersedia</option>
            <option value="2">Sedang Dirental</option>
        </select>
        <?= form_error('status'); ?>
    </div>
    <div class="form-group">
        <input type="submit" class="btn btn-primary" value="Simpan">
    </div>
</form>