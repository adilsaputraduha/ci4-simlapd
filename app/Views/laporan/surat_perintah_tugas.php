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
                <td class="judul">SURAT PERINTAH TUGAS</td>
            </tr>
            <tr>
                <td>Nomor : <?php foreach ($spt as $row) : ?> <?= $row['sptKode']; ?> <?php endforeach; ?></td>
            </tr>
        </table>
        <br>
        <table>
            <tr>
                <td>
                    <font size="2">DASAR</font>
                </td>
                <td width="572">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp: &nbsp&nbsp&nbsp DPA - SKPD DINAS PERKEBUNAN PROVINSI SUMATERA BARAT</td>
            </tr>
            <tr>
                <td>
                    <font size="2">T.A</font>
                </td>
                <td width="564">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp: &nbsp&nbsp&nbsp Tahun Anggaran <?= date("Y"); ?>.</td>
            </tr>
        </table>
        <br>
        <table class="head" style="margin-top: 10px;">
            <tr>
                <td class="judul">MEMERINTAHKAN</td>
            </tr>
        </table>
        <br>
        <table>
            <tr>
                <td width="80" style="vertical-align: text-top;">
                    <font size="2">Kepada &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp:</font>
                </td>
                <td width=" 530">
                    <?php $no = 0;
                    foreach ($detail as $row) : $no++; ?>
                        <?= $no; ?>. Nama / Nip &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp: &nbsp&nbsp<?= $row['pegawaiNama']; ?> / <?= $row['detailsptNip']; ?><br>
                        &nbsp&nbsp&nbsp Jabatan &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp: &nbsp&nbsp<?= $row['pegawaiJabatan']; ?><br><br>
                    <?php endforeach; ?>
                </td>
            </tr>
        </table>
        <br>
        <table>
            <tr>
                <td width="80" style="vertical-align: text-top;">
                    <font size="2">Untuk &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp:</font>
                </td>
                <td width=" 530">
                    <?php foreach ($spt as $row) :  ?>
                        <?= $row['sptAgenda']; ?>
                    <?php endforeach; ?>
                </td>
            </tr>
        </table>
        <br>
        <br>
        <table width="625">
            <tr>
                <td width="430"><br><br><br><br></td>
                <td class="text" align="center">DITETAPKAN DI &nbsp:&nbsp PADANG<br>
                    PADA TANGGAL &nbsp: &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<?= date("M Y"); ?><br><br>
                    KEPALA DINAS PERKEBUNAN PROVINSI SUMATERA BARAT<br><br><br><br><br><br>
                    Ir. SYAFRIZAL<br>
                    NIP : 19640525 199602 1 001
                </td>
            </tr>
        </table>
    </center>
</body>

<script>
    window.print();
</script>

</html>