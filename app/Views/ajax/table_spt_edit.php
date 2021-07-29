<?php $no = 0;
foreach ($detail as $row) : $no++ ?>
    <tr>
        <td> <?= $no; ?></td>
        <td> <?= $row['detailsptNip']; ?></td>
        <td> <?= $row['pegawaiNama']; ?></td>
        <td> <?= $row['pegawaiJabatan']; ?></td>
        <td> <?= $row['pegawaiGolongan']; ?></td>
        <td style="text-align: center;">
            <a class="btn btn-sm btn-danger btn-delete text-white mb-1" data-nip="<?= $row['detailsptNip']; ?>" data-spt="<?= $row['detailsptKodeSpt']; ?>"><i class="fa fa-trash"></i></a>
        </td>
    </tr>
<?php endforeach; ?>

<script>
    $('.btn-delete').on('click', function() {
        const nip = $(this).data('nip');
        const spt = $(this).data('spt');
        $('.nip').val(nip);
        $('.spt').val(spt);
        $('#deleteModal').modal('show');
    });
</script>