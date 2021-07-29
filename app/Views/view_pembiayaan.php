<?= $this->extend('layout/main'); ?>

<?= $this->section('menu'); ?>

<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
    <li class="nav-item">
        <a href="<?= base_url('/'); ?>" class="nav-link">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
                Dashboard
            </p>
        </a>
    </li>
    <li class="nav-item has-treeview">
        <a href="#" class="nav-link">
            <i class="nav-icon fas fa fa-th-list"></i>
            <p>
                Master
                <i class="fas fa-angle-left right"></i>
            </p>
        </a>
        <ul class="nav nav-treeview ">
            <li class="nav-item">
                <a href="<?= base_url('pegawai'); ?>" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Pegawai</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="<?= base_url('tujuan'); ?>" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Tujuan</p>
                </a>
            </li>
            <?php if (session()->get('userLevel') == 0) { ?>
                <li class="nav-item">
                    <a href="<?= base_url('user'); ?>" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>User</p>
                    </a>
                </li>
            <?php } ?>
        </ul>
    </li>
    <li class="nav-item">
        <a href="<?= base_url('spt'); ?>" class="nav-link">
            <i class="nav-icon far fa fa-file"></i>
            <p>
                SPT
            </p>
        </a>
    </li>
    <li class="nav-item">
        <a href="<?= base_url('keberangkatan'); ?>" class="nav-link">
            <i class="nav-icon fa fa-plane"></i>
            <p>
                Keberangkatan
            </p>
        </a>
    </li>
    <li class="nav-item">
        <a href="<?= base_url('pembiayaan'); ?>" class="nav-link active">
            <i class="nav-icon fas fa-edit"></i>
            <p>
                Pembiayaan
            </p>
        </a>
    </li>
    <li class="nav-item">
        <a href="<?= base_url('sppd'); ?>" class="nav-link">
            <i class="nav-icon far fa fa-file"></i>
            <p>
                SPPD
            </p>
        </a>
    </li>
    <li class="nav-item">
        <a href="<?= base_url('profile'); ?>" class="nav-link">
            <i class="nav-icon far fa fa-user"></i>
            <p>
                Profile
            </p>
        </a>
    </li>
    <li class="nav-item">
        <a href="<?= base_url('logout'); ?>" class="nav-link">
            <i class="nav-icon fa fa-sign-out-alt"></i>
            <p>
                Logout
            </p>
        </a>
    </li>
</ul>

<?= $this->endSection(); ?>

<?= $this->section('content'); ?>

<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h3 class="m-0 text-dark">Pembiayaan</h3>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item active">Pembiayaan</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="card">
        <div class="card-header">
            <a href="<?= base_url('pembiayaan/tambah'); ?>" class="btn btn-primary"><i class="fa fa-plus mr-2"></i>Tambah Data</a>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="table" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Kode</th>
                        <th>Kode Berangkat</th>
                        <th>Biaya Pokok</th>
                        <th>Transportasi</th>
                        <th>Penginapan</th>
                        <th>Total</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 0;
                    foreach ($pembiayaan as $row) : $no++ ?>
                        <tr>
                            <td> <?= $no; ?></td>
                            <td> <?= $row['pembiayaanKode']; ?></td>
                            <td> <?= $row['pembiayaanKodeBerangkat']; ?></td>
                            <td> <?= "Rp. " . number_format($row['pembiayaanPokok'], 2, ',', '.') ?></td>
                            <td> <?= "Rp. " . number_format($row['pembiayaanTransportasi'], 2, ',', '.') ?></td>
                            <td> <?= "Rp. " . number_format($row['pembiayaanPenginapan'], 2, ',', '.') ?></td>
                            <td> <?= "Rp. " . number_format($row['pembiayaanTotal'], 2, ',', '.') ?></td>
                            <td style="text-align: center;">
                                <a href="<?= base_url(); ?>/pembiayaan/update/<?= $row['pembiayaanKode']; ?>" class="btn-sm btn-primary btn-update mb-1"><i class="fa fa-edit"></i></a>
                                <a href="#" class="btn-sm btn-danger btn-delete mb-1" data-id="<?= $row['pembiayaanKode']; ?>"><i class="fa fa-trash"></i></a>
                                <a href="<?= base_url(); ?>/pembiayaan/rincianpembiayaan/<?= $row['pembiayaanKode']; ?>" target="__blank" class="btn-sm btn-info btn-update mb-1"><i class="fa fa-print"></i></a>
                                <a href="<?= base_url(); ?>/pembiayaan/kwitansi/<?= $row['pembiayaanKode']; ?>" target="__blank" class="btn-sm btn-primary btn-update mb-1"><i class="fa fa-file"></i></a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
</div>

<form action="<?= base_url('pembiayaan/delete'); ?>" method="POST">
    <?= csrf_field(); ?>
    <div class="modal" tabindex="-1" id="deleteModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Hapus pembiayaan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" class="id" name="id" id="id" required />
                    <h6>Yakin ingin menghapus data ini?</h6>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
                    <button type="submit" class="btn btn-primary mt-2 mb-2 mr-2">Yakin</button>
                </div>
            </div>
        </div>
    </div>
</form>

<script>
    $('.btn-delete').on('click', function() {
        const id = $(this).data('id');
        $('.id').val(id);
        $('#deleteModal').modal('show');
    });
</script>
<?= $this->endSection(); ?>