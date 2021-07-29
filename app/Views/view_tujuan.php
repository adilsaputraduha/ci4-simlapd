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
    <li class="nav-item has-treeview menu-open">
        <a href="#" class="nav-link">
            <i class="nav-icon fas fa fa-th-list"></i>
            <p>
                Master
                <i class="fas fa-angle-left right"></i>
            </p>
        </a>
        <ul class="nav nav-treeview ">
            <li class="nav-item">
                <a href="<?= base_url('pegawai'); ?>" class="nav-link ">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Pegawai</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="<?= base_url('tujuan'); ?>" class="nav-link active">
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
                <h3 class="m-0 text-dark">Tujuan</h3>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Master</a></li>
                    <li class="breadcrumb-item active">Tujuan</li>
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
            <button class="btn btn-primary" data-toggle="modal" data-target="#addModal"><i class="fa fa-plus mr-2"></i>Tambah Data</button>
            <a href="<?= base_url('tujuan/laporan'); ?>" target="__blank" class="btn btn-info"><i class="fa fa-print mr-2"></i>Cetak</a>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="table" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Nama</th>
                        <th>Kota</th>
                        <th>Provinsi</th>
                        <th>Alamat</th>
                        <th>No Telp</th>
                        <th>Pimpinan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 0;
                    foreach ($tujuan as $row) : $no++ ?>
                        <tr>
                            <td> <?= $no; ?></td>
                            <td> <?= $row['tujuanNamaTempat']; ?></td>
                            <td> <?= $row['tujuanKota']; ?></td>
                            <td> <?= $row['tujuanProvinsi']; ?></td>
                            <td> <?= $row['tujuanAlamat']; ?></td>
                            <td> <?= $row['tujuanNoTelp']; ?></td>
                            <td> <?= $row['tujuanPimpinan']; ?></td>
                            <td style="text-align: center;">
                                <a class="btn-sm btn-primary btn-update" data-toggle="modal" data-target="#editModal<?= $row['tujuanId']; ?>"><i class="fa fa-edit"></i></a>
                                <a class="btn-sm btn-danger btn-delete" data-toggle="modal" data-target="#deleteModal<?= $row['tujuanId']; ?>"><i class="fa fa-trash"></i></a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
</div>

<form action="<?= base_url('tujuan/save'); ?>" enctype="multipart/form-data" method="POST">
    <?= csrf_field(); ?>
    <div class="modal fade" id="addModal" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title">Tambah tujuan</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="mb-3">
                                <label>Nama tempat</label>
                                <input type="text" class="form-control" placeholder="Masukan nama tempat" id="nama" name="nama" required autocomplete="off">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="mb-3">
                                <label>Alamat</label>
                                <textarea class="form-control" rows="3" name="alamat" id="alamat" required placeholder="Masukan alamat"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label>Kota</label>
                                <input type="text" class="form-control" placeholder="Masukan kota" id="kota" name="kota" required autocomplete="off">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label>Provinsi</label>
                                <input type="text" class="form-control" placeholder="Masukan provinsi" id="provinsi" name="provinsi" required autocomplete="off">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label>Nomor Telepon</label>
                                <input type="text" class="form-control" onkeypress="return onlyNumber(event)" placeholder="Masukan nomor telepon" id="notelp" name="notelp" required autocomplete="off">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label>Pimpinan</label>
                                <input type="text" class="form-control" placeholder="Masukan pimpinan" id="pimpinan" name="pimpinan" required autocomplete="off">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary mt-2 mb-2" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary mt-2 mb-2 mr-2">Simpan</button>
                </div>
            </div>
        </div>
    </div>
</form>

<?php foreach ($tujuan as $row) : ?>
    <form action="<?= base_url('tujuan/edit'); ?>" enctype="multipart/form-data" method="POST">
        <?= csrf_field(); ?>
        <div class="modal fade" id="editModal<?= $row['tujuanId']; ?>" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h6 class="modal-title">Edit tujuan</h6>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="id" required value="<?= $row['tujuanId']; ?>" />
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="mb-3">
                                    <label>Nama tempat</label>
                                    <input type="text" value="<?= $row['tujuanNamaTempat']; ?>" class="form-control" placeholder="Masukan nama tempat" id="nama" name="nama" required autocomplete="off">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="mb-3">
                                    <label>Alamat</label>
                                    <textarea class="form-control" rows="3" name="alamat" id="alamat" required placeholder="Masukan alamat"><?= $row['tujuanAlamat']; ?></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <label>Kota</label>
                                    <input type="text" class="form-control" value="<?= $row['tujuanKota']; ?>" placeholder="Masukan kota" id="kota" name="kota" required autocomplete="off">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <label>Provinsi</label>
                                    <input type="text" class="form-control" value="<?= $row['tujuanProvinsi']; ?>" placeholder="Masukan provinsi" id="provinsi" name="provinsi" required autocomplete="off">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <label>Nomor Telepon</label>
                                    <input type="text" class="form-control" value="<?= $row['tujuanNoTelp']; ?>" onkeypress="return onlyNumber(event)" placeholder="Masukan nomor telepon" id="notelp" name="notelp" required autocomplete="off">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <label>Pimpinan</label>
                                    <input type="text" class="form-control" value="<?= $row['tujuanPimpinan']; ?>" placeholder="Masukan pimpinan" id="pimpinan" name="pimpinan" required autocomplete="off">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary mt-2 mb-2" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary mt-2 mb-2 mr-2">Simpan</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <form action="<?= base_url('tujuan/delete'); ?>" enctype="multipart/form-data" method="POST">
        <?= csrf_field(); ?>
        <div class="modal" tabindex="-1" id="deleteModal<?= $row['tujuanId']; ?>">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Hapus tujuan</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="id" required value="<?= $row['tujuanId']; ?>" />
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

<script>
    function onlyNumber(event) {
        var angka = (event.which) ? event.which : event.keyCode
        if (angka != 46 && angka > 31 && (angka < 48 || angka > 57))
            return false;
        return true;
    }
</script>

<?= $this->endSection(); ?>