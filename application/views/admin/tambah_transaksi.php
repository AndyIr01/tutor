<div class="page-header">
    <h3>Transaksi Baru</h3>
</div>

<form action="<?= base_url().'admin/transaksi_add_act' ?>" method="post">
    <div class="form-group">
        <label>Kostumer</label>
        <select name="kostumer" class="form-control">
            <option value="">-Pilih Kostumer-</option>
            <?php foreach($kostumer as $k){ ?>
                <option value="<?= $k->id_kostumer; ?>"><?= $k->nama_kostumer; ?></option>
           <?php } ?>
        </select>
        <?= form_error('kostumer'); ?>
    </div>

    <div class="form-group">
        <label>Barangl</label>
        <select name="mobil" class="form-control">
            <option value="">-Pilih Mobil-</option>
            <?php foreach($mobil as $m){ ?>
            <option value="<?= $m->id_mobil; ?>"><?= $m->merk_mobil; ?></option>
            <?php }?>
        </select>
        <?= form_error('mobil') ?>
    </div>

    <div class="form-group">
        <label>Tanggal Pinjam</label>
        <input type="date" name="tgl_pinjam" class="form-control">
        <?= form_error('tgl_pinjam'); ?>
    </div>

    <div class="form-group">
        <label>Tanggal Kembali</label>
        <input type="date" class="form-control" name="tgl_kembali">
        <?= form_error('tgl_kembali'); ?>
    </div>

    <div class="form-group">
        <label>Harga</label>
        <input type="number" name="harga" class="form-control">
        <?= form_error('harga'); ?>
    </div>

    <div class="form-group">
        <label>Harga Denda / Hari</label>
        <input type="text" class="form-control" name="denda">
        <?= form_error('denda'); ?>
    </div>
    <div class="form-group">
        <input type="submit" value="Simpan" class="btn btn-primary btn-sm">
    </div>
</form>