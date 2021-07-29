<!DOCTYPE html>
<html>

<head>
    <title>Surat Perintah Tugas</title>
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

<body>
    <center>
        <table class="head" width="625">

        </table>
        <table class="head" style="margin-bottom: 20px;">
            <tr>
                <td class="judul">KWITANSI</td>
            </tr>
        </table>
        <br>
        <table>
            <tr>
                <td width="150" style="vertical-align: text-top;">
                    <font size="2">Sudah diterima dari &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp:</font>
                </td>
                <td width="400" height="50px" style="padding-left: 20px; vertical-align: text-top;">BENDAHARA PENGELUARAN ORGANISASI PERANGKAT DAERAH DINAS PERKEBUNAN PROVINSI SUMATERA BARAT</td>
            </tr>
            <tr>
                <td width="150" style="vertical-align: text-top;">
                    <font size="2">Uang sejumlah &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp:</font>
                </td>
                <td width="400" height="50px" style="padding-left: 20px; vertical-align: text-top;">
                    <font size="4" style="font-weight: bold;">Rp. <?php foreach ($pembiayaan as $row) : ?><?= number_format($row['pembiayaanTotal'], 2, ',', '.') ?><?php endforeach; ?></font>
                </td>
            </tr>
            <tr>
                <td width="150" style="vertical-align: text-top;">
                    <font size="2">Terbilang &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp:</font>
                </td>
                <td width="400" height="50px" style="padding-left: 20px;">
                    ...........................................................................................................................
                </td>
            </tr>
            <tr>
                <td width="150" style="vertical-align: text-top;">
                    <font size="2">Untuk &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp:</font>
                </td>
                <td width="400" height="50px" style="padding-left: 20px; vertical-align: text-top;">
                    Biaya perjalanan dinas a.n. <?php foreach ($pegawai as $row) : ?><?= $row['pegawaiNama']; ?>, <?php endforeach; ?><?php foreach ($pembiayaan as $row) : ?><?= $row['sptAgenda']; ?><?php endforeach; ?>
                </td>
            </tr>
        </table>
        <br>
        <table width="625">
            <tr>
                <td class="text" align="center">Setuju dibayar <br> Kuasa Pengguna Anggaran<br><br><br><br><br><br>
                    <font style="font-weight: bold;">Ir. Yustiadi<br>NIP : 19640525 199622 1 100</font>
                </td>
                <td class="text" align="center">Padang &nbsp&nbsp&nbsp&nbsp<?= date("M Y"); ?><br>
                    Yang menerima<br><br><br><br><br><br>
                    <font style="font-weight: bold;">Nama Terang : <?= $namaterang['pegawaiNama']; ?><br>
                        NIP : <?= $namaterang['pegawaiNip']; ?></font>
                </td>
            </tr>
        </table>
        <br><br>
        <table width="625">
            <tr>
                <td class="text" align="center">Lunas dibayar tgl,<br>
                    Bendahara Pengeluaran<br><br><br><br><br>
                    <font style="font-weight: bold;">Aminah Susanti<br>
                        NIP : 19640435 199672 1 355</font>
                </td>
                <td class="text" align="center">Mengetahui<br>
                    PPTK<br><br><br><br><br>
                    <font style="font-weight: bold;">Ir. Gusnadi Abda<br>
                        NIP : 19644225 249602 1 424</font>
                </td>
            </tr>
        </table>
    </center>
</body>

<script>
    window.print();
</script>

</html>