<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Sistem Informasi Laporan Anggaran Perjalanan Dinas | Login</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= base_url(); ?>/assets/plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="<?= base_url(); ?>/assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url(); ?>/assets/dist/css/adminlte.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo">
            <a href="<?= base_url(); ?>/assets/index2.html"><b>SIM</b>LAPD</a>
        </div>
        <!-- /.login-logo -->
        <div class="card">
            <?php
            if (session()->getFlashdata('message')) { ?>
                <div class="alert alert-danger m-2">
                    <?= session()->getFlashdata('message') ?>
                </div>
            <?php } ?>
            <?php if (session()->getFlashdata('success')) { ?>
                <div class="alert alert-success m-2">
                    <?= session()->getFlashdata('success') ?>
                </div>
            <?php } ?>
            <div class="card-body login-card-body">
                <p class="login-box-msg">Silahkan login terlebih dahulu </p>

                <form action="<?= base_url('login/ceklogin'); ?>" method="POST">
                    <?= csrf_field(); ?>
                    <div class="input-group mb-3">
                        <input type="email" class="form-control" placeholder="Email" name="email" required autofocus>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" placeholder="Password" name="password" required autocomplete="off">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-8">
                            <div class="icheck-primary">
                                <input type="checkbox" id="remember">
                                <label for="remember">
                                    Ingat saya
                                </label>
                            </div>
                        </div>
                        <!-- /.col -->
                        <div class="col-4">
                            <button type="submit" class="btn btn-primary btn-block">Login</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- jQuery -->
    <script src="<?= base_url(); ?>/assets/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="<?= base_url(); ?>/assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?= base_url(); ?>/assets/dist/js/adminlte.min.js"></script>

</body>

</html>