<div class="page-header">
    <h3>Laporan</h3>
</div>

<form action="<?= base_url().'admin/laporan' ?>" method="post">
    <div class="form-group">
        <label>Dari Tanggal</label>
        <input type="date" name="dari" class="form-control" value="<?= set_value('dari');?>">
        <?= form_error('dari'); ?>
    </div>

    <div class="form-group">
        <label>Sampai Tanggal</label>
        <input type="date" class="form-control" name="sampai" value="<?= set_value('sampai');?>">
        <?= form_error('sampai'); ?>
    </div>

    <div class="form-group">
        <input type="submit" value="Cari" name="cari" class="btn btn-sm btn-primary">
    </div>
</form>

<div class="btn-group">
    <a href="<?= base_url().'admin/laporan_pdf/?dari='.set_value('dari').'&sampai='.set_value('sampai') ?>" class="btn btn-warning btn-sm"><span class="glyphicon glyphicon-print"></span>Print</a>
</div>
<br/>
<br/>
<div class="table-responsive">
    <table border="1" id="table-datatable" class="table table-bordered table-striped table-hover">
        <thead>
            <tr>
                <th>No</th>
                <th>Tanggal</th>
                <th>Kostumer</th>
                <th>Mobil</th>
                <th>Tgl. Pinjam</th>
                <th>Tgl. Kembali</th>
                <th>Harga</th>
                <th>Denda / Hari</th>
                <th>Tgl. Dikembalikan</th>
                <th>Total Denda</th>
                <th>Status  </th>
            </tr>
        </thead>

        <tbody>
            <?php 
                $no = 1;
                foreach($laporan as $l){ 
            ?>
            <tr>
                <td><?= $no++; ?></td>
                <td><?= date('d/m/Y', strtotime($l->transaksi_tgl)); ?></td>
                <td><?= $l->nama_kostumer; ?></td>
                <td><?= $l->merk_mobil; ?></td>
                <td><?= date('d/m/Y', strtotime($l->transaksi_tgl_pinjam)); ?></td>
                <td><?= date('d/m/Y', strtotime($l->transaksi_tgl_kembali)); ?></td>
                <td><?= "Rp. ".number_format($l->transaksi_harga); ?></td>
                <td><?= "Rp. ".number_format($l->transaksi_denda); ?></td>
                <td><?php 
                    if($l->transaksi_tgldikembalikan == "0000-00-00"){
                        echo "-";
                    }
                    else{
                        echo date('d/m/Y', strtotime($l->transaksi_tgldikembalikan));
                    }
                ?></td>
                <td>
                    <?php 
                        if($l->transaksi_status == "1"){
                            echo "Selesai";
                        }
                        else{
                            echo "-";
                        }
                    ?>
                </td>
            </tr>
                    <?php }?>
        </tbody>
    </table>
</div>