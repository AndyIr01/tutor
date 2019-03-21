<div class="page-header">
    <h3>Ganti Password</h3>
</div>

<div class="row">
    <div class="col-md-6 col-md-offset-3">
        <?php 
            if(isset($_GET['pesan'])){
                if ($_GET['pesan'] == "berhasil") {
                    echo "<div class='alert alert-success'>Password berhasil diganti!</div>";
                }
            }
        ?>
        <form action="<?= base_url().'admin/ganti_password_act' ?>" method="post">
            <div class="form-group">
                <label>Password Baru</label>
                <input type="password" name="pass_baru" class="form-control">
                <?= form_error('pass_baru'); ?>
            </div>

            <div class="form-group">
                <label>Ulangi Password</label>
                <input type="password" name="ulang_pass" class="form-control">
                <?= form_error('ulang_pass'); ?>
            </div>

            <div class="form-group">
                <input type="submit" class="btn btn-primary btn-sm" value="Simpan">
            </div>
        </form>
    </div>
</div>