<!DOCTYPE html>
<html>

<head>
    <title>Rincian Pembiayaan</title>
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
                <td class="judul">RINCIAN BIAYA PERJALANAN DINAS</td>
            </tr>
        </table>
        <table>
            <tr>
                <td width="160">
                    <font size="2">Nomor SPT &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp :</font>
                </td>
                <td width="460"><?php foreach ($pembiayaan as $row) :  ?><?= $row['keberangkatanSpt']; ?><?php endforeach; ?></td>
            </tr>
            <tr>
                <td width="160">
                    <font size="2">Tanggal Perjalanan &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp :</font>
                </td>
                <td width="460"><?php foreach ($pembiayaan as $row) :  ?><?= date('d M Y', strtotime($row['keberangkatanTanggalMulai'])); ?><?php endforeach; ?></td>
            </tr>
            <tr>
                <td width="160">
                    <font size="2">Lokasi Perjalanan &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp :</font>
                </td>
                <td width="460"><?php foreach ($pembiayaan as $row) :  ?><?= $row['tujuanNamaTempat']; ?><?php endforeach; ?></td>
            </tr>
            <tr>
                <td width="160" style="vertical-align: text-top;">
                    <font size="2">Maksud Perjalanan &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp :</font>
                </td>
                <td width="460"><?php foreach ($pembiayaan as $row) :  ?><?= $row['sptAgenda']; ?><?php endforeach; ?></td>
            </tr>
        </table>
        <br><br>
        <table border="1" class="body" width="800">
            <thead>
                <tr style="height: 25px;">
                    <th>Nama</th>
                    <th>Gol</th>
                    <th>SPPD</th>
                    <th>Masa<br>PD</th>
                    <th>Uang<br>Pokok</th>
                    <th>Uang<br>Perjalanan</th>
                    <th>Uang<br>Penginapan</th>
                    <th>Uang<br>Lain-Lain</th>
                    <th>Jumlah</th>
                    <th>Tanda<br>Tangan</th>
                </tr>
            </thead>
            <tbody>
                <?php $total = 0;
                foreach ($detail as $row1) : ?>
                    <tr style="text-align: center;">
                        <td><?= $row1['pegawaiNama']; ?></td>
                        <td><?= $row1['pegawaiGolongan']; ?></td>
                        <td><?= $row1['sppdKode']; ?></td>
                        <td><?= $row1['keberangkatanTanggalMulai']; ?></td>
                        <?php foreach ($pembiayaan as $row2) : ?>
                            <td><?= $row2['pembiayaanPokok']; ?></td>
                            <td><?= $row2['pembiayaanTransportasi']; ?></td>
                            <td><?= $row2['pembiayaanPenginapan']; ?></td>
                            <td><?= $row2['pembiayaanLainLain']; ?></td>
                            <td><?= $row2['pembiayaanTotal']; ?></td>
                        <?php endforeach; ?>
                        <td></td>
                    </tr>
                <?php $total += $row['pembiayaanTotal'];
                endforeach; ?>
                <tr style="text-align: center;">
                    <td colspan="8">Total</td>
                    <td style="font-weight: bold;">Rp. <?= number_format($total, 2, ',', '.') ?></td>
                    <td></td>
                </tr>
            </tbody>
        </table>
        <br>
        <table width="625">
            <tr>
                <td width="430"><br><br><br><br></td>
                <td class="text" align="center">Padang &nbsp&nbsp&nbsp&nbsp<?= date("M Y"); ?><br>
                    Bendahara Pengeluaran<br><br><br><br><br>
                    Aminah Susanti<br>
                    NIP : 19640525 199602 1 003
                </td>
            </tr>
        </table>
    </center>
</body>

<script>
    window.print();
</script>

</html>