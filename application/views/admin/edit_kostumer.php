<div class="page-header">
    <h3>Edit Kostumer</h3>
</div>

<?php foreach($kostumer as $k){ ?>
<form method="post" action="<?= base_url().'admin/kostumer_update' ?>">
    <div class="form-group">
        <label>Nama Kostumer</label>
        <input type="hidden" name="id" value="<?= $k->id_kostumer; ?>">
        <input type="text" name="nama" class="form-control" value="<?= $k->nama_kostumer; ?>">
        <?= form_error('nama'); ?>
    </div>
    <div class="form-group">
        <label>Alamat Kostumer</label>
        <input type="text" name="alamat" class="form-control" value="<?= $k->alamat_kostumer; ?>">
        <?= form_error('alamat'); ?>
    </div>
    <div class="form-group">
        <label>Jenis Kelamin</label>
        <select name="jk" class="form-control">
            <option <?php if($k->jk_kostumer == "L"){echo "selected:'selected'";} ?> value="L">Laki-laki</option>
            <option <?php if($k->jk_kostumer == "P"){echo "selected:'selected'";} ?> value="P">Perempuan</option>
        </select>
        <?= form_error('jk'); ?>
    </div>
    <div class="form-group">
        <label>No. Handphone</label>
        <input type="text" name="hp" class="form-control" value="<?= $k->hp_kostumer; ?>">
    </div>
    <div class="form-group">
        <label>No. KTP</label>
        <input type="text" name="ktp" class="form-control" value="<?= $k->ktp_kostumer; ?>">
        <?= form_error('ktp'); ?>
    </div>
<?php } ?>
    <div class="form-group">
        <input type="submit" class="btn btn-primary" value="Simpan">
    </div>
</form>