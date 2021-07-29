<!DOCTYPE html>
<html>

<head>
    <title>Laporan Data Tujuan</title>
    <link rel="shortcut icon" href="<?= base_url(); ?>/assets/images/logo.png">
    <style type="text/css">
        .head {
            border-style: double;
            border-width: 3px;
            border-color: white;
        }

        .body {
            border-collapse: collapse;
            border: 1px;
            border-color: black;
        }

        table tr .text2 {
            text-align: right;
            font-size: 13px;
        }

        table tr .text {
            text-align: center;
            font-size: 13px;
        }

        table tr td {
            font-size: 13px;
        }
    </style>
</head>

<body>
    <center>
        <table class="head" width="625">
            <tr>
                <td><img src="<?= base_url(); ?>/assets/images/logo.png" width="90" height="90"></td>
                <td>
                    <center>
                        <font size="4">PEMERINTAHAN PROVINSI SUMATERA BARAT</font><br>
                        <font size="5"><b>DINAS PERKEBUNAN</b></font><br>
                        <font size="2">Alamat : Jalan Rasuna Said No. 77 Padang</font><br>
                        <font size="2"><i>Email : dinasperkebunan@gmail.com Kode Pos : 67116 Telp./Fax (0811) 232311</i></font>
                    </center>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <hr>
                </td>
            </tr>
            <table width="625" class="head">
                <tr>
                    <td class="text2">Padang, <?= date("d M Y"); ?></td>
                </tr>
            </table>
        </table>
        <table class="head" style="margin-bottom: 20px;">
            <tr>
                <td>Laporan Data Tujuan</td>
            </tr>
        </table>
        <table border="1" class="body" width="625">
            <thead>
                <tr style="height: 25px;">
                    <th>No.</th>
                    <th>Nama</th>
                    <th>Kota</th>
                    <th>Provinsi</th>
                    <th>Alamat</th>
                    <th>No Telp</th>
                    <th>Pimpinan</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 0;
                foreach ($tujuan as $row) : $no++ ?>
                    <tr style="height: 20px; text-align: center;">
                        <td> <?= $no; ?></td>
                        <td> <?= $row['tujuanNamaTempat']; ?></td>
                        <td> <?= $row['tujuanKota']; ?></td>
                        <td> <?= $row['tujuanProvinsi']; ?></td>
                        <td> <?= $row['tujuanAlamat']; ?></td>
                        <td> <?= $row['tujuanNoTelp']; ?></td>
                        <td> <?= $row['tujuanPimpinan']; ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </center>
</body>

<script>
    window.print();
</script>

</html>