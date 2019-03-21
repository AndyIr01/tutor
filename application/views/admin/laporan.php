<div class="page-header">
    <h3>Laporan</h3>
</div>

<form action="<?= base_url().'admin/laporan' ?>" method="post">
    <div class="form-group">
        <label>Dari Tanggal</label>
        <input type="date" name="dari" class="form-control">
        <?= form_error('dari'); ?>
    </div>

    <div class="form-group">
        <label>Sampai Tanggal</label>
        <input type="date" class="form-control" name="sampai">
        <?= form_error('sampai'); ?>
    </div>

    <div class="form-group">
        <input type="submit" value="Cari" name="cari" class="btn btn-sm btn-primary">
    </div>
</form>