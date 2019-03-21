<div class="page-header">
    <h3>Daftar Mobil</h3>
</div>

<a href="<?= base_url().'admin/mobil_add'; ?>" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-plus"></span>Mobil Baru</a>
<br/><br/>
<div class="table-responsive">
    <table id="table-datatable" class="table table-bordered table-striped table-hover">
        <thead>
            <tr>
                <th>No</th>
                <th>Merk Mobil</th>
                <th>Plat</th>
                <th>Warna</th>
                <th>Tahun Pembuatan</th>
                <th>Status</th>
                <th></th>
            </tr>
        </thead>

        <tbody>
            <?php 
                $no = 1;
                foreach($mobil as $m){ ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $m->merk_mobil ?></td>
                    <td><?= $m->plat_mobil ?></td>
                    <td><?= $m->warna_mobil ?></td>
                    <td><?= $m->tahun_mobil ?></td>
                    <td>
                        <?php
                            if ($m->status_mobil == "1") {
                                echo "Tersedia";
                            }
                            else if($m->status_mobil != "1"){
                                echo "Sedang Dirental";
                            }
                            ?>
                    </td>
                    <td>
                        <a href="<?= base_url().'admin/mobil_edit/'.$m->id_mobil; ?>" class="btn btn-warning btn-sm"><span class="glyphicon glyphicon-plus"></span>Edit</a>
                        <a href="<?= base_url().'admin/mobil_hapus/'.$m->id_mobil; ?>" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash"></span>Hapus</a>
                    </td>
                </tr>
                <?php
            }?>
        </tbody>
    </table>
</div>