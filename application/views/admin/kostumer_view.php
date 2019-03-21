<div class="page-header">
    <h3>Data Kostumer</h3>
</div>

<a href="<?= base_url().'admin/kostumer_add'; ?>" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-plus"></span>Kostumer Baru</a>
<br/>
<br/>

<div class="table-responsive">
    <table id="table-datatable" class="table table-bordered table-hover table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Alamat</th>
                <th>Jenis Kelamin</th>
                <th>No. Handphone</th>
                <th>No. KTP</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
        <?php 
        $no = 1;
            foreach($kostumer as $k){
        ?>
            <tr>
                <td><?= $no++; ?></td>
                <td><?= $k->nama_kostumer ?></td>
                <td><?= $k->alamat_kostumer ?></td>
                <td><?= $k->jk_kostumer ?></td>
                <td><?= $k->hp_kostumer ?></td>
                <td><?= $k->ktp_kostumer ?></td>
                <td>
                        <a href="<?= base_url().'admin/kostumer_edit/'.$k->id_kostumer; ?>" class="btn btn-warning btn-sm"><span class="glyphicon glyphicon-plus"></span>Edit</a>
                        <a href="<?= base_url().'admin/kostumer_hapus/'.$k->id_kostumer; ?>" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash"></span>Hapus</a>
                </td>
            </tr>
            <?php }?>
        </tbody>
    </table>
</div>