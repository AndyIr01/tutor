<div class="page-header">
    <h3>Edit Data Barang</h3>
</div>

<?php foreach($mobil as $m){ ?>
<form method="post" action="<?= base_url().'admin/mobil_update' ?>">
    <div class="form-group">
        <label>Merk Barng</label>
        <input type="hidden" name="id" value="<?= $m->id_mobil; ?>">
        <input type="text" name="merk" class="form-control" value="<?= $m->merk_mobil; ?>">
        <?= form_error('merk'); ?>
    </div>
    </div>
    <div class="form-group">
        <label>jenis barang</label>
        <input type="text" name="warna" class="form-control" value="<?= $m->warna_mobil; ?>">
        <?= form_error('warna'); ?>
    </div>
    <div class="form-group">
        <label>Status barang</label>
        <select name="status" class="form-control">
            <option <?php if($m->status_mobil == "1"){echo "selected='selected'";} echo $m->tahun_mobil; ?> value="1">Tersedia</option>
            <option <?php if($m->status_mobil == "2"){echo "selected='selected'";} echo $m->tahun_mobil; ?> value="2">Sedang Dirental</option>
        </select>
        <?= form_error('status'); ?>
    </div>
<?php } ?>
    <div class="form-group">
        <input type="submit" class="btn btn-primary" value="Simpan">
    </div>
</form>