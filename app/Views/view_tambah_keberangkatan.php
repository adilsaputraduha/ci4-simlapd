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
        <a href="<?= base_url('keberangkatan'); ?>" class="nav-link active">
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
                <h3 class="m-0 text-dark">Keberangkatan</h3>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item active">Keberangkatan</li>
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
        <form action="<?= base_url('keberangkatan/save'); ?>" method="POST" enctype="multipart/form-data">
            <?= csrf_field(); ?>
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Kode Keberangkatan</label>
                            <input type="text" readonly class="form-control <?= ($validation->hasError('kode')) ? 'is-invalid' : ''; ?>" id="kode" name="kode" value="<?= $kode; ?>" required>
                            <div class="invalid-feedback">
                                <?= $validation->getError('kode'); ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <div class="form-group">
                                <label>SPT</label>
                                <div class="input-group mb-3">
                                    <input type="text" id="spt" name="spt" value="<?= old('spt'); ?>" required readonly class="form-control spt <?= ($validation->hasError('spt')) ? 'is-invalid' : ''; ?>" />
                                    <button class="btn btn-primary ml-1" data-toggle="modal" data-target="#searchSpt" type="button">Cari</button>
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('spt'); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <input type="hidden" id="idtujuan" name="idtujuan" class="idtujuan">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <div class="form-group">
                                <label>Tujuan</label>
                                <div class="input-group mb-3">
                                    <input type="text" id="nama" name="nama" value="<?= old('nama'); ?>" required readonly class="form-control nama <?= ($validation->hasError('nama')) ? 'is-invalid' : ''; ?>" />
                                    <button class="btn btn-primary ml-1" data-toggle="modal" data-target="#searchTujuan" type="button">Cari</button>
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('nama'); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label>Kota</label>
                            <input type="text" readonly class="form-control kota" value="<?= old('kota'); ?>" id="kota" name="kota" required>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label>Provinsi</label>
                            <input type="text" readonly class="form-control provinsi" value="<?= old('provinsi'); ?>" id="provinsi" name="provinsi" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label>Tanggal Berangkat</label>
                            <input type="date" class="form-control tglberangkat" value="<?= old('tglberangkat'); ?>" id="tglberangkat" name="tglberangkat" required>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label>Tanggal Selesai</label>
                            <input type="date" class="form-control tglselesai" value="<?= old('tglselesai'); ?>" id="tglselesai" name="tglselesai" required>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label>Lama Hari</label>
                            <input type="text" class="form-control lama" id="lama" name="lama" value="<?= old('lama'); ?>" required>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <div class="float-right">
                    <a href="<?= base_url('keberangkatan'); ?>" class="btn btn-secondary">Kembali</a>
                    <button type="submit" class="btn btn-primary">Simpan</button>
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
<div class="modal" tabindex="-1" id="searchTujuan">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Data Tujuan</h5>
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
                        foreach ($tujuan as $row) : $no++ ?>
                            <tr>
                                <td> <?= $no; ?></td>
                                <td> <?= $row['tujuanNamaTempat']; ?></td>
                                <td> <?= $row['tujuanKota']; ?></td>
                                <td> <?= $row['tujuanProvinsi']; ?></td>
                                <td style="text-align: center;">
                                    <a class="btn-sm btn-info btn-choose2" data-id="<?= $row['tujuanId']; ?>" data-nama="<?= $row['tujuanNamaTempat']; ?>" data-kota="<?= $row['tujuanKota']; ?>" data-provinsi="<?= $row['tujuanProvinsi']; ?>"><i class="fa fa-edit"></i></a>
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

<form id="formDelete" method="POST">
    <?= csrf_field(); ?>
    <div class="modal" tabindex="-1" id="deleteModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Hapus user</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" class="idtemp" name="idtemp" id="idtemp" required />
                    <h6>Yakin ingin menghapus data ini?</h6>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
                    <button type="button" onclick="ajaxDelete()" class="btn btn-primary mt-2 mb-2 mr-2">Yakin</button>
                </div>
            </div>
        </div>
    </div>
</form>

<script>
    $('.btn-delete').on('click', function() {
        const idtemp = $(this).data('idtemp');
        $('.idtemp').val(idtemp);
        $('#deleteModal').modal('show');
    });

    $('.btn-choose1').on('click', function() {
        const kode = $(this).data('kode');
        $('.spt').val(kode);
        $('#searchSpt').modal('hide');
    });

    $('.btn-choose2').on('click', function() {
        const id = $(this).data('id');
        const nama = $(this).data('nama');
        const kota = $(this).data('kota');
        const provinsi = $(this).data('provinsi');
        $('.idtujuan').val(id);
        $('.nama').val(nama);
        $('.kota').val(kota);
        $('.provinsi').val(provinsi);
        $('#searchTujuan').modal('hide');
    });
</script>
<?= $this->endSection(); ?>