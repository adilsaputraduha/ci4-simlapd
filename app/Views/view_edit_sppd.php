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
        <div class="card-header">
            <h5>Tambah data</h5>
        </div>
        <form action="<?= base_url('sppd/edit'); ?>" method="POST" enctype="multipart/form-data">
            <?= csrf_field(); ?>
            <div class="card-body">
                <div class="row justify-content-center">
                    <div class="col-sm-10">
                        <?php foreach ($sppd as $row) :  ?>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Kode SPPD</label>
                                        <input type="text" readonly class="form-control <?= ($validation->hasError('kode')) ? 'is-invalid' : ''; ?>" id="kode" name="kode" value="<?= $row['sppdKode']; ?>" required>
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('kode'); ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>SPT</label>
                                        <div class="input-group mb-3">
                                            <input type="text" id="spt" value="<?= $row['sppdSpt']; ?>" name="spt" required readonly class="form-control spt" />
                                            <button class="btn btn-primary ml-1" data-toggle="modal" data-target="#searchSpt" type="button">Cari</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Kendaraan yang digunakan</label>
                                        <div class="input-group mb-3">
                                            <input type="text" id="kendaraan" value="<?= $row['sppdKendaraan']; ?>" name="kendaraan" value="<?= old('kendaraan'); ?>" required class="form-control kendaraan <?= ($validation->hasError('kendaraan')) ? 'is-invalid' : ''; ?>" />
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('kendaraan'); ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Keterangan lainnya</label>
                                        <div class="input-group mb-3">
                                            <input type="text" id="keterangan" value="<?= $row['sppdLainLain']; ?>" placeholder="Optional" name="keterangan" value="<?= old('keterangan'); ?>" class="form-control keterangan <?= ($validation->hasError('keterangan')) ? 'is-invalid' : ''; ?>" />
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('keterangan'); ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <div class="float-right">
                    <a href="<?= base_url('sppd'); ?>" class="btn btn-secondary">Kembali</a>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </div>
        </form>
    </div>
</div>
<!-- Modal search -->
<div class="modal" tabindex="-1" id="searchSpt">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Data SPT</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table id="table" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Kode</th>
                            <th>Agenda</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 0;
                        foreach ($spt as $row) : $no++ ?>
                            <tr>
                                <td> <?= $no; ?></td>
                                <td> <?= $row['sptKode']; ?></td>
                                <td> <?= $row['sptAgenda']; ?></td>
                                <td style="text-align: center;">
                                    <a class="btn-sm btn-info btn-choose1" data-kode="<?= $row['sptKode']; ?>"><i class="fa fa-edit"></i></a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" id="button" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>


<script>
    $('.btn-choose1').on('click', function() {
        const spt = $(this).data('kode');
        $('.spt').val(spt);
        $('#searchSpt').modal('hide');
    });
</script>
<?= $this->endSection(); ?>