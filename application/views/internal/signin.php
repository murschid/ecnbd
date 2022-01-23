<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Admin | Login</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="<?= base_url('assets/common/css/font-awesome.min.css'); ?>" rel="stylesheet">
        <link href="<?= base_url('assets/common/css/bootstrap.css'); ?>" rel="stylesheet">
        <link href="<?= base_url('assets/internal/css/adminlte.css'); ?>" rel="stylesheet">
    </head>
    <body class="hold-transition login-page">
        <div class="logpreloader"></div>
        <div class="login-box">
            <div class="login-logo">
                <a><i class="fa fa-user-secret"></i> <b>Admin</b>Login <i class="fa fa-user-secret"></i></a>
            </div>
            <div class="card">
                <div class="card-body login-card-body">
                    <p class="login-box-msg">Sign in to start your session</p>
                    <?php if ($this->session->flashdata('errors')): ?>
                        <div class="alert alert-danger"><?= $this->session->flashdata('errors'); ?></div>
                    <?php endif; ?>
                    <?= form_open('auth/adminsignin') ?>
                    <div class="input-group mb-3">
                        <input type="email" name="username" class="form-control" required="" minlength="9" maxlength="30" placeholder="email@gmail.com">
                        <div class="input-group-append">
                            <div class="input-group-text"><span class="fa fa-envelope"></span></div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" name="password" class="form-control" required="" minlength="8" maxlength="20" placeholder="********">
                        <div class="input-group-append">
                            <div class="input-group-text"><span class="fa fa-lock"></span></div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-8">
                            <div class="icheck-primary">
                                <input type="checkbox" name="remember">
                                <label for="remember">Remember Me</label>
                            </div>
                        </div>
                        <div class="col-4">
                            <button type="submit" class="btn btn-sm btn-primary btn-block">Sign In</button>
                        </div>
                    </div>
                    <?= form_close(); ?>
                    <!--<p class="mb-1 float-left"><a href="forgot-password.html">Forgot Password?</a></p>-->
                </div>
            </div>
        </div>
        <script src="<?= base_url('assets/common/js/jquery.min.js'); ?>"></script>
        <script type="text/javascript">
            $(window).on('load', function () {
                $('.logpreloader').fadeOut('slow');
            });
        </script>
    </body>
</html>
