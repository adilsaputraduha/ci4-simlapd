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
                <a href="<?= base_url('pegawai'); ?>" class="nav-link active">
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
                <h3 class="m-0 text-dark">Pegawai</h3>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Master</a></li>
                    <li class="breadcrumb-item active">Pegawai</li>
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
        <form action="<?= base_url('pegawai/edit'); ?>" method="POST" enctype="multipart/form-data">
            <?= csrf_field(); ?>
            <div class="card-body">
                <?php foreach ($pegawai as $row) : ?>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Nip</label>
                                <input type="text" required class="form-control <?= ($validation->hasError('nip')) ? 'is-invalid' : ''; ?>" id="nip" name="nip" readonly value="<?= $row['pegawaiNip']; ?>">
                                <div class="invalid-feedback">
                                    <?= $validation->getError('nip'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Nama</label>
                                <input type="text" required class="form-control <?= ($validation->hasError('nama')) ? 'is-invalid' : ''; ?>" id="nama" name="nama" value="<?= $row['pegawaiNama']; ?>" placeholder="Masukan nama">
                                <div class="invalid-feedback">
                                    <?= $validation->getError('nama'); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Jabatan</label>
                                <input type="text" required class="form-control <?= ($validation->hasError('jabatan')) ? 'is-invalid' : ''; ?>" id="jabatan" name="jabatan" value="<?= $row['pegawaiJabatan']; ?>" placeholder="Masukan jabatan">
                                <div class="invalid-feedback">
                                    <?= $validation->getError('jabatan'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Golongan</label>
                                <input type="text" required class="form-control <?= ($validation->hasError('golongan')) ? 'is-invalid' : ''; ?>" id="golongan" name="golongan" value="<?= $row['pegawaiGolongan']; ?>" placeholder="Masukan golongan">
                                <div class="invalid-feedback">
                                    <?= $validation->getError('golongan'); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>Alamat</label>
                                <textarea required class="form-control <?= ($validation->hasError('alamat')) ? 'is-invalid' : ''; ?>" rows="3" name="alamat" id="alamat" placeholder="Masukan alamat"><?= $row['pegawaiAlamat']; ?></textarea>
                                <div class="invalid-feedback">
                                    <?= $validation->getError('alamat'); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
            <div class="card-footer">
                <div class="float-right">
                    <a href="<?= base_url('pegawai'); ?>" class="btn btn-secondary">Kembali</a>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </div>
        </form>
    </div>
</div>
<?= $this->endSection(); ?>