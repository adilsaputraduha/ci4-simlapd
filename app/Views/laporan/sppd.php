<!DOCTYPE html>
<html>

<head>
    <title>Surat Perintah Perjalanan Dinas</title>
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

        .judul {
            font-size: 15px;
            text-decoration: underline;
            font-weight: bold;
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

<?php foreach ($sppd as $row) : ?>

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
                    <td class="judul">SURAT PERINTAH PERJALANAN DINAS</td>
                </tr>
                <tr>
                    <td style="text-align: center;">Nomor : <?php foreach ($tujuan as $row1) : ?> <?= $row1['sppdKode']; ?> <?php endforeach; ?></td>
                </tr>
            </table>
            <br><br>
            <table border="1" class="body" width="650">
                <tbody>
                    <tr>
                        <td width="5%" height="50px" style="padding-left: 10px;">1.</td>
                        <td width="40%" style="padding-left: 10px;">Pejabat yang memberi perintah</td>
                        <td width="65%" style="padding-left: 10px;">Kepala Dinas Perkebunan Provinsi Sumatera Barat</td>
                    </tr>
                    <tr>
                        <td width="5%" height="50px" style="padding-left: 10px;">2.</td>
                        <td width="40%" style="padding-left: 10px;">Nama anggota/pegawai yang diperintahkan mengadakan perjalanan</td>
                        <td width="65%" style="padding-left: 10px;"><?= $row['detailsptNip']; ?></td>
                    </tr>
                    <tr>
                        <td width="5%" height="50px" style="padding-left: 10px;">3.</td>
                        <td width="40%" style="padding-left: 10px;">Jabatan dan pangkat pegawai yang diperintahkan</td>
                        <td width="65%" style="padding-left: 10px;"><?= $row['pegawaiJabatan']; ?></td>
                    </tr>
                    <?php foreach ($tujuan as $row2) : ?>
                        <tr>
                            <td width="5%" height="50px" style="padding-left: 10px;">4.</td>
                            <td width="40%" style="padding-left: 10px;">Perjalanan dinas yang diperintahkan</td>
                            <td width="65%" style="padding-left: 10px;">Dari &nbsp&nbsp&nbsp&nbsp: &nbsp Padang <br> Ke &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp: &nbsp&nbsp<?= $row2['tujuanKota']; ?></td>
                        </tr>
                        <tr>
                            <td width="5%" height="50px" style="padding-left: 10px;">5.</td>
                            <td width="40%" style="padding-left: 10px;">Direncanakan</td>
                            <td width="65%" style="padding-left: 10px;">Berangkat tanggal &nbsp&nbsp&nbsp&nbsp: &nbsp&nbsp<?= date('d M Y', strtotime($row2['keberangkatanTanggalMulai'])); ?> <br>Kembali tanggal &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp: &nbsp&nbsp<?= date('d M Y', strtotime($row2['keberangkatanTanggalSelesai'])); ?></td>
                        </tr>
                        <tr>
                            <td width="5%" height="50px" style="padding-left: 10px;">6.</td>
                            <td width="40%" style="padding-left: 10px;">Kendaraan yang digunakan</td>
                            <td width="65%" style="padding-left: 10px;"><?= $row2['sppdKendaraan']; ?></td>
                        </tr>
                        <tr>
                            <td width="5%" height="50px" style="padding-left: 10px;">7.</td>
                            <td width="40%" style="padding-left: 10px;">Maksud mengadakan perjalanan</td>
                            <td width="65%" style="padding-left: 10px;"><?= $row2['sptAgenda']; ?></td>
                        </tr>
                        <tr>
                            <td width="5%" height="50px" style="padding-left: 10px;">8.</td>
                            <td width="40%" style="padding-left: 10px;">Keterangan</td>
                            <td width="65%" style="padding-left: 10px;"><?= $row2['sppdLainLain']; ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <br><br><br>
            <table width="625">
                <tr>
                    <td class="text" align="center" style="padding-top: 30px;">Yang Melakukan Perjalanan<br><br><br><br><br><br><br><br>
                        Ir. SYAFRIZAL<br>
                        NIP : 19640525 199602 1 001
                    </td>
                    <td class="text" align="center">Padang &nbsp&nbsp&nbsp&nbsp<?= date("M Y"); ?><br>
                        YANG MEMBERI PERINTAH<br>KUASA PENGGUNA ANGGARAN<br>DINAS PERKEBUNAN PROVINSI<br>
                        SUMATERA BARAT<br><br><br><br><br><br>
                        Ir. SYAFRIZAL<br>
                        NIP : 19640525 199602 1 001
                    </td>
                </tr>
            </table>
            <br><br><br>
            <?php foreach ($tujuan as $row2) : ?>
                <table border="1" class="body" width="650">
                    <tbody>
                        <tr>
                            <td width="50%" height="240px" style="padding-left: 10px; vertical-align: text-top; padding-top: 10px;">
                                Tiba di &nbsp&nbsp&nbsp&nbsp: &nbsp&nbsp&nbsp&nbsp <?= $row2['tujuanKota']; ?><br><br>
                                Tanggal &nbsp&nbsp: <br><br>
                                Tanda tangan &nbsp&nbsp:
                            </td>
                            <td width="50%" height="240px" style="padding-left: 10px; vertical-align: text-top; padding-top: 10px;">
                                Berangkat dari &nbsp&nbsp&nbsp&nbsp: &nbsp&nbsp&nbsp&nbsp<?= $row2['tujuanKota']; ?><br><br>
                                Ke &nbsp&nbsp&nbsp&nbsp: &nbsp&nbspPadang<br><br>
                                Pada tanggal &nbsp&nbsp: <br><br>
                                Tanda tangan &nbsp&nbsp:
                            </td>
                        </tr>
                        <tr>
                            <td width="50%" height="220px" style="padding-left: 10px;"></td>
                            <td width="50%" height="220px" style="padding-left: 10px; vertical-align: text-top; padding-top: 10px; text-align: center;">
                                Telah diperiksa dengan keterangan bahwa Perjalanan <br> tersebut atas perintahnya dan semata - mata untuk <br> kepentingan jabatan dalam waktu yang sesingkat-singkatnya. <br><br>
                                Kuasa Pengguna Anggaran <br><br><br><br><br><br>
                                Ir. Akhiruddin <br>
                                NIP : 192329191 131323 1004
                            </td>
                        </tr>
                    </tbody>
                </table>
                <br><br>
            <?php endforeach; ?>
        </center>
    </body>
    <br><br><br><br><br><br><br><br><br><br><br><br>
    <br><br><br><br><br><br><br><br><br><br><br><br>
<?php endforeach; ?>

<script>
    window.print();
</script>

</html>