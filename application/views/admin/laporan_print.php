<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>
    <style>

    </style>
    <h3>Laporan Transaksi Rental Mobil</h3>

    <table>
        <tr>
            <td>Dari Tgl</td>
            <td>:</td>
            <td><?= date('d/m/Y', strtotime($_GET['dari'])); ?></td>
        </tr>

        <tr>
            <td>Sampai Tgl</td>
            <td>:</td>
            <td><?= date('d/m/Y', strtotime($_GET['sampai'])); ?></td>
        </tr>
    </table>
    <br/>

    <table class="table-data">
        <thead>
            <tr>
                <th>No</th>
                <th>Tanggal</th>
                <th>Kostumer</th>
                <th>Mobil</th>
                <th>Tgl. <RP></RP>ental</th>
                <th>Tgl. Kembali</th>
                <th>Harga</th>
                <th>Denda / Hari</th>
                <th>Tgl. Dikembalikan</th>
                <th>Total Denda</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            $no = 1;
            foreach($laporan as $l){?>
            <tr>
                <td><?= $no++; ?></td>
                <td><?= date('d/m/Y', strtotime($l->transaksi_tgl)); ?></td>
                <td><?= $l->nama_kostumer; ?></td>
                <td><?= $l->merk_mobil; ?></td>
                <td><?= date('d/m/Y', strtotime($l->transaksi_tgl_pinjam)); ?></td>
                <td><?= date('d/m/Y', strtotime($l->transaksi_tgl_kembali)); ?></td>
                <td><?= "Rp. ".number_format($l->transaksi_harga); ?></td>
                <td><?= "Rp. ".number_format($l->transaksi_denda); ?></td>
                <td><?php if($l->transaksi_tgldikembalikan == "0000-00-00"){
                    echo "-";
                }
                else{
                    echo date('d/m/Y', strtotime($l->transaksitgl_dikembalikan));
                } ?></td>
                <td><?= "Rp. ".number_format($l->transaksi_totaldenda)." ,-" ?>
                </td>
                <td><?php 
                    if($l->transaksi_status == "1"){
                        echo "Selesai";
                    }
                    else{
                        echo "-";
                    }
                ?></td>
            </tr>
                <?php } ?>
        </tbody>
    </table>

    <script type="text/javascript">
        window.print();
    </script>
</body>
</html>