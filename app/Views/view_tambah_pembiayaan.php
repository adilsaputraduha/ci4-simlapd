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
            <h5>Tambah data</h5>
        </div>
        <form action="<?= base_url('pembiayaan/save'); ?>" method="POST" enctype="multipart/form-data">
            <?= csrf_field(); ?>
            <div class="card-body">
                <div class="row justify-content-center">
                    <div class="col-sm-5">
                        <div class="form-group">
                            <label>Kode Keberangkatan</label>
                            <input type="text" readonly class="form-control <?= ($validation->hasError('kode')) ? 'is-invalid' : ''; ?>" id="kode" name="kode" value="<?= $kode; ?>" required>
                            <div class="invalid-feedback">
                                <?= $validation->getError('kode'); ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-5">
                        <div class="form-group">
                            <div class="form-group">
                                <label>Keberangkatan</label>
                                <div class="input-group mb-3">
                                    <input type="text" id="keberangkatan" name="keberangkatan" value="<?= old('keberangkatan'); ?>" required readonly class="form-control keberangkatan <?= ($validation->hasError('keberangkatan')) ? 'is-invalid' : ''; ?>" />
                                    <button class="btn btn-primary ml-1" data-toggle="modal" data-target="#searchKeberangkatan" type="button">Cari</button>
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('keberangkatan'); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-sm-5">
                        <div class="form-group">
                            <div class="form-group">
                                <label>Spt</label>
                                <div class="input-group mb-3">
                                    <input type="text" id="spt" name="spt" value="<?= old('spt'); ?>" required readonly class="form-control spt <?= ($validation->hasError('spt')) ? 'is-invalid' : ''; ?>" />
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('spt'); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-5">
                        <div class="form-group">
                            <div class="form-group">
                                <label>Tujuan</label>
                                <div class="input-group mb-3">
                                    <input type="text" id="tujuan" name="tujuan" value="<?= old('tujuan'); ?>" required readonly class="form-control tujuan <?= ($validation->hasError('tujuan')) ? 'is-invalid' : ''; ?>" />
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('tujuan'); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row justify-content-center">
                    <div class="col-sm-2">
                        <div class="form-group">
                            <div class="form-group">
                                <label>Biaya pokok</label>
                                <div class="input-group mb-3">
                                    <input type="text" id="pokok" name="pokok" onkeypress="return hanyaAngka(event)" value="<?= old('pokok'); ?>" required class="form-control pokok <?= ($validation->hasError('pokok')) ? 'is-invalid' : ''; ?>" />
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('pokok'); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="form-group">
                            <div class="form-group">
                                <label>Biaya transportasi</label>
                                <div class="input-group mb-3">
                                    <input type="text" id="transportasi" onkeypress="return hanyaAngka(event)" name="transportasi" value="<?= old('transportasi'); ?>" required class="form-control transportasi <?= ($validation->hasError('transportasi')) ? 'is-invalid' : ''; ?>" />
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('transportasi'); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="form-group">
                            <div class="form-group">
                                <label>Biaya penginapan</label>
                                <div class="input-group mb-3">
                                    <input type="text" id="penginapan" onkeypress="return hanyaAngka(event)" name="penginapan" value="<?= old('penginapan'); ?>" required class="form-control penginapan <?= ($validation->hasError('penginapan')) ? 'is-invalid' : ''; ?>" />
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('penginapan'); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="form-group">
                            <div class="form-group">
                                <label>Biaya lain-lain</label>
                                <div class="input-group mb-3">
                                    <input type="text" id="lainlain" onkeypress="return hanyaAngka(event)" name="lainlain" value="<?= old('lainlain'); ?>" required class="form-control lainlain <?= ($validation->hasError('lainlain')) ? 'is-invalid' : ''; ?>" />
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('lainlain'); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="form-group">
                            <div class="form-group">
                                <label>Total</label>
                                <div class="input-group mb-3">
                                    <input type="text" readonly id="total" name="total" value="<?= old('total'); ?>" required class="form-control total <?= ($validation->hasError('total')) ? 'is-invalid' : ''; ?>" />
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('total'); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <div class="row justify-content-center">
                    <div class="col-sm-10">
                        <div class="float-right">
                            <a href="<?= base_url('pembiayaan'); ?>" class="btn btn-secondary">Kembali</a>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<!-- Modal search -->
<div class="modal" tabindex="-1" id="searchKeberangkatan">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Data Keberangkatan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table id="table" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Kode Keberangkatan</th>
                            <th>Kode SPT</th>
                            <th>Nama Tujuan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 0;
                        foreach ($keberangkatan as $row) : $no++ ?>
                            <tr>
                                <td> <?= $no; ?></td>
                                <td> <?= $row['keberangkatanKode']; ?></td>
                                <td> <?= $row['sptKode']; ?></td>
                                <td> <?= $row['tujuanNamaTempat']; ?></td>
                                <td style="text-align: center;">
                                    <a class="btn-sm btn-info btn-choose1" data-keberangkatan="<?= $row['keberangkatanKode']; ?>" data-spt="<?= $row['sptKode']; ?>" data-nama="<?= $row['tujuanNamaTempat']; ?>"><i class="fa fa-edit"></i></a>
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
        const keberangkatan = $(this).data('keberangkatan');
        const spt = $(this).data('spt');
        const tujuan = $(this).data('nama');
        $('.keberangkatan').val(keberangkatan);
        $('.spt').val(spt);
        $('.tujuan').val(tujuan);
        $('#searchKeberangkatan').modal('hide');
    });

    function hanyaAngka(event) {
        var angka = (event.which) ? event.which : event.keyCode
        if (angka != 46 && angka > 31 && (angka < 48 || angka > 57))
            return false;
        return true;
    }

    $('.lainlain').on('keyup', function() {
        const pokok = document.getElementById('pokok').value;
        const transportasi = document.getElementById('transportasi').value;
        const penginapan = document.getElementById('penginapan').value;
        const lainlain = document.getElementById('lainlain').value;

        const total = parseInt(pokok) + parseInt(transportasi) + parseInt(penginapan) + parseInt(lainlain);

        $('.total').val(total);
    });
</script>
<?= $this->endSection(); ?>