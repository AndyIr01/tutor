<div class="page-header">
    <h3>Transaksi Selesai</h3>
</div>

<?php foreach($transaksi as $t) { ?>
<form action="<?= base_url().'admin/transaksi_selesai_act' ?>" method="post">
    <input type="hidden" name="id" value="<?= $t->id_transaksi ?>">
    <input type="hidden" name="mobil" value="<?= $t->transaksi_mobil ?>">
    <input type="hidden" name="tgl_kembali" value="<?= $t->transaksi_tgl_kembali ?>">
    <input type="hidden" name="denda" value="<?= $t->transaksi_denda ?>">

    <div class="form-group">
        <label>Kostumer</label>
        <select name="kostumer" disabled class="form-control">
            <option value="">-Pilih Kostumer-</option>
            <?php foreach($kostumer as $k) { ?>
            <option <?php if($t->transaksi_kostumer == $k->id_kostumer){echo "selected='selected'";} ?> value="<?= $k->id_kostumer; ?>"><?= $k->nama_kostumer; ?></option>
            <?php }?>
        </select>
        
        <div class="form-group">
            <label>Barang</label>
            <select name="mobil" disabled class="form-control">
                <option value="">-Pilih Barang-</option>
                <?php foreach($mobil as $m) {?>
                <option <?php if($t->transaksi_mobil == $m->id_mobil){echo "selected='selected'";}?> value="<?= $m->id_mobil; ?>" ><?= $m->merk_mobil; ?></option>
                <?php } ?>
            </select>
        </div>
        
        <div class="form-group">
            <label>Tanggal Pinjam</label>
            <input type="date" name="tgl_pinjam" class="form-control" value="<?= $t->transaksi_tgl_pinjam ?>" disabled>
        </div>

        <div class="form-group">
            <label>Tanggal Kembali</label>
            <input type="date" class="form-control" value="<?= $t->transaksi_tgl_kembali ?>" disabled>
        </div>
        <div class="form-group">
            <label>Harga</label>
            <input type="number" name="harga" class="form-control" value="<?= $t->transaksi_harga ?>" disabled>
        </div>


        <div class="form-group">
            <label>Harga Denda / Hari</label>
            <input type="text" class="form-control" name="denda" value="<?= $t->transaksi_denda ?>" disabled>
        </div>

        <div class="form-group">
            <label>Tanggal Dikembalikan Oleh Kostumer</label>
            <input type="date" class="form-control" name="tgl_dikembalikan">
            <?= form_error('tgl_dikembalikan'); ?>
        </div>

        <div class="form-group">
            <input type="submit" value="Simpan" class="btn btn-primary btn-lg">
        </div>
    </div>
</form>
                <?php } ?>