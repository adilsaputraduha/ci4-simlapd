<?php $no = 0;
foreach ($temp as $row) : $no++ ?>
    <tr>
        <td> <?= $no; ?></td>
        <td> <?= $row['tempNip']; ?></td>
        <td> <?= $row['pegawaiNama']; ?></td>
        <td> <?= $row['pegawaiJabatan']; ?></td>
        <td> <?= $row['pegawaiGolongan']; ?></td>
        <td style="text-align: center;">
            <a class="btn-sm btn-danger btn-delete" data-idtemp="<?= $row['tempId']; ?>"><i class=" fa fa-trash"></i></a>
        </td>
    </tr>
<?php endforeach; ?>

<script>
    $('.btn-delete').on('click', function() {
        const idtemp = $(this).data('idtemp');
        $('.idtemp').val(idtemp);
        $('#deleteModal').modal('show');
    });
</script>