<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title><?= isset($title) ? $title : 'Admin';?></title>
        <link rel="icon" href="<?= base_url('assets/internal/img/favicon.png');?>" type="image/x-icon">
        <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.3.0/css/flag-icon.min.css" rel="stylesheet">
        <link href="<?= base_url('assets/common/css/font-awesome.min.css');?>" rel="stylesheet">
        <link href="<?= base_url('assets/internal/css/summernote-bs4.css');?>" rel="stylesheet">
        <link href="<?= base_url('assets/internal/css/adminlte.css');?>" rel="stylesheet">
        <script> var baseurl = '<?= base_url();?>';</script>
    </head>
    <body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
        <div class="wrapper">
            <?php $this->load->view('internal/modals/toasts');?>
            <?php $this->load->view('internal/notification');?>
            <?php $this->load->view('internal/navmenu');?>
            <?php $this->load->view($view);?>
            <?php $this->load->view('internal/settingbar');?>
            <?php $this->load->view('internal/footer');?>
        </div>
        <script src="<?= base_url('assets/common/js/jquery.min.js');?>"></script>
        <script src="<?= base_url('assets/common/js/popper.min.js');?>"></script>
        <script src="<?= base_url('assets/common/js/bootstrap.min.js');?>"></script>
        <script src="<?= base_url('assets/internal/js/summernote-bs4.min.js');?>"></script>
        <script src="<?= base_url('assets/internal/js/adminlte.min.js');?>"></script>
        <script src="<?= base_url('assets/common/js/highcharts.js');?>"></script>
        <script src="<?= base_url('assets/common/js/highcharts-more.js');?>"></script>
        <?php $this->load->view('internal/scripts');?>
    </body>
</html>
