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
        <a href="<?= base_url('spt'); ?>" class="nav-link active">
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
                <h3 class="m-0 text-dark">Spt</h3>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item active">Spt</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="card">
        <div class="card-header">
            <h5>Edit data</h5>
        </div>
        <form action="<?= base_url('spt/edit'); ?>" id="formTambah" method="POST" enctype="multipart/form-data">
            <?= csrf_field(); ?>
            <div class="card-body">
                <?php foreach ($spt as $row) :  ?>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>No Surat</label>
                                <input type="text" readonly class="form-control <?= ($validation->hasError('kode')) ? 'is-invalid' : ''; ?>" id="kode" name="kode" value="<?= $row['sptKode']; ?>" required placeholder="Masukan nomor surat">
                                <div class="invalid-feedback">
                                    <?= $validation->getError('kode'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Tanggal Kegiatan</label>
                                <input type="date" class="form-control <?= ($validation->hasError('tanggalkegiatan')) ? 'is-invalid' : ''; ?>" id="tanggalkegiatan" name="tanggalkegiatan" value="<?= $row['sptTanggalKegiatan']; ?>" required>
                                <div class="invalid-feedback">
                                    <?= $validation->getError('tanggalkegiatan'); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>Agenda perjalanan</label>
                                <textarea required class="form-control <?= ($validation->hasError('agenda')) ? 'is-invalid' : ''; ?>" rows="3" name="agenda" id="agenda" placeholder="Masukan agenda perjalanan"><?= $row['sptAgenda']; ?></textarea>
                                <div class="invalid-feedback">
                                    <?= $validation->getError('agenda'); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-5">
                            <div class="form-group">
                                <label>NIP</label>
                                <div class="input-group mb-3">
                                    <input type="text" id="nip" name="nip" required readonly class="form-control nip" />
                                    <button class="btn btn-primary ml-1" data-toggle="modal" data-target="#searchPegawai" type="button">Cari</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-7">
                            <div class="form-group">
                                <label>Nama</label>
                                <div class="input-group mb-3">
                                    <input type="text" id="nama" name="nama" readonly class="form-control nama" />
                                    <button class="btn btn-primary ml-2" type="button" onclick="ajaxSave()">Tambah</button>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
                <div class="row mt-4" id="eek">
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>NIP</th>
                                        <th>Nama</th>
                                        <th>Jabatan</th>
                                        <th>Golongan</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody id="coba">
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
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <div class="float-right">
                    <a href="<?= base_url('spt'); ?>" class="btn btn-secondary">Kembali</a>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </div>
        </form>
    </div>
</div>
<!-- Modal search -->
<div class="modal" tabindex="-1" id="searchPegawai">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Data pegawai</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table id="table" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>NIP</th>
                            <th>Nama</th>
                            <th>Jabatan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 0;
                        foreach ($pegawai as $row) : $no++ ?>
                            <tr>
                                <td> <?= $no; ?></td>
                                <td> <?= $row['pegawaiNip']; ?></td>
                                <td> <?= $row['pegawaiNama']; ?></td>
                                <td> <?= $row['pegawaiJabatan']; ?></td>
                                <td style="text-align: center;">
                                    <a class="btn-sm btn-info btn-choose" data-nip="<?= $row['pegawaiNip']; ?>" data-nama="<?= $row['pegawaiNama']; ?>"><i class="fa fa-edit"></i></a>
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
                    <input type="hidden" class="nip" name="nip" id="nip" required />
                    <input type="hidden" class="spt" name="spt" id="spt" required />
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
        const nip = $(this).data('nip');
        const spt = $(this).data('spt');
        $('.nip').val(nip);
        $('.spt').val(spt);
        $('#deleteModal').modal('show');
    });

    $('.btn-choose').on('click', function() {
        const nip = $(this).data('nip');
        const nama = $(this).data('nama');
        $('.nip').val(nip);
        $('.nama').val(nama);
        $('#searchPegawai').modal('hide');
    });

    function reload() {
        const spt = document.getElementById('kode').value;
        $.ajax({
            url: "<?= base_url(); ?>/spt/apiindexdetail/" + spt,
            beforeSend: function(f) {
                $('#coba').html(`<div class="text-center">
                Mencari data...
                </div>`);
            },
            success: function(data) {
                $('#coba').html(data);
            }
        })
    }

    function ajaxSave() {
        $.ajax({
            url: "<?= base_url('spt/apisavedetail'); ?>",
            type: "POST",
            data: $("#formTambah").serialize(),
            success: function(data) {
                $('#nip').val('');
                $('#nama').val('');
                reload();
            }
        });
    }

    function ajaxDelete() {
        $.ajax({
            url: "<?= base_url('spt/apideletedetail'); ?>",
            type: "POST",
            data: $("#formDelete").serialize(),
            success: function(data) {
                $('#deleteModal').modal('hide');
                reload();
                $('#nip').val('');
                $('#nama').val('');
            }
        });
    }
</script>
<?= $this->endSection(); ?>