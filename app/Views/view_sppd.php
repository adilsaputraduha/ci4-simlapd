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
        <a href="<?= base_url('pembiayaan'); ?>" class="nav-link">
            <i class="nav-icon fas fa-edit"></i>
            <p>
                Pembiayaan
            </p>
        </a>
    </li>
    <li class="nav-item">
        <a href="<?= base_url('sppd'); ?>" class="nav-link active">
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
                <h3 class="m-0 text-dark">SPPD</h3>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item active">SPPD</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="card">
        <?php if (session()->getFlashdata('success')) { ?>
            <div class="alert alert-success icons-alert m-2">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <?php echo session()->getFlashdata('success'); ?>
            </div>
        <?php } else if (session()->getFlashdata('failed')) { ?>
            <div class="alert alert-danger icons-alert m-2">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <?php echo session()->getFlashdata('failed'); ?>
            </div>
        <?php } ?>
        <div class="card-header">
            <a href="<?= base_url('sppd/tambah'); ?>" class="btn btn-primary"><i class="fa fa-plus mr-2"></i>Tambah Data</a>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="table" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Kode SPPD</th>
                        <th>Kode SPT</th>
                        <th>Kendaraan</th>
                        <th>Keterangan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 0;
                    foreach ($sppd as $row) : $no++ ?>
                        <tr>
                            <td> <?= $no; ?></td>
                            <td> <?= $row['sppdKode']; ?></td>
                            <td> <?= $row['sppdSpt']; ?></td>
                            <td> <?= $row['sppdKendaraan']; ?></td>
                            <td> <?= $row['sppdLainLain']; ?></td>
                            <td>
                                <a href="<?= base_url(); ?>/sppd/update/<?= $row['sppdKode']; ?>" class="btn btn-sm btn-primary text-white mb-1"><i class="fa fa-pen"></i></a>
                                <a class="btn btn-sm btn-danger btn-delete text-white mb-1" data-toggle="modal" data-target="#deleteModal<?= $row['sppdKode']; ?>"><i class="fa fa-trash"></i></a>
                                <a href="<?= base_url(); ?>/sppd/surat/<?= $row['sppdKode']; ?>" target="__blank" class=" btn btn-sm btn-info text-white mb-1"><i class="fa fa-print"></i></a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php foreach ($sppd as $row) : ?>
    <form action="<?= base_url('sppd/delete'); ?>" enctype="multipart/form-data" method="POST">
        <?= csrf_field(); ?>
        <div class="modal" tabindex="-1" id="deleteModal<?= $row['sppdKode']; ?>">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Hapus spt</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" id="id" name="id" required value="<?= $row['sppdKode']; ?>" />
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
<?php endforeach; ?>
<?= $this->endSection(); ?>