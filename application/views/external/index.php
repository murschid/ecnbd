<!doctype html>
<html lang="en">
    <head>
        <title><?= isset($title) ? $title : lang('ecn');?></title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="<?= isset($metadesc) ? $metadesc : lang('ecn_full');?>">
        <meta name="author" content="<?= isset($metaauth) ? $metaauth : lang('murshid');?>">
        <meta name="robots" content="index,follow">
        <meta property="og:title" content="<?= isset($title) ? $title : lang('ecn');?>">
        <meta property="og:description" content="<?= isset($metadesc) ? $metadesc : lang('ecn_full');?>">
        <meta property="og:image" content="<?= isset($metaimg) ? base_url('assets/external/img/posts/').$metaimg : base_url('assets/external/img/posts/News.jpg');?>">
        <!--<meta property="og:url" content="<?= isset($metaurl) ? base_url('article/details/').$metaurl.'.html' : base_url('article');?>">-->
        <link rel="icon" href="<?= base_url('assets/external/img/common/faviconn.png');?>">
        <link href="<?= base_url('assets/common/css/font-awesome.min.css');?>" rel="stylesheet">
        <link href="<?= base_url('assets/external/fonts/solaiman/font.css');?>" rel="stylesheet">
        <link href="<?= base_url('assets/common/css/bootstrap.css');?>" rel="stylesheet">
        <link href="<?= base_url('assets/common/css/animate.min.css');?>" rel="stylesheet">
        <link href="<?= base_url('assets/external/css/style.css');?>" rel="stylesheet">
        <link href="<?= base_url('assets/external/css/responsive.css');?>" rel="stylesheet">
        <script> var baseurl = '<?= base_url();?>';</script>
    </head>
    <body>
        <?php $this->load->view('external/header-top');?>
        <?php $this->load->view('external/modals/toast');?>
        <div class="container">
            <?php $this->load->view('external/ajaxsearch');?>
            <?php $this->load->view('external/navmenu');?>
            <?php $this->load->view('external/header');?>
            <?php $this->load->view('external/breaking');?>
            <?php #$this->load->view('external/slider');?>
            <?php $this->load->view('external/intropost');?>
            <div class="row mb-2">
                <?php $this->load->view(isset($view) ? $view : '');?>
                <?php $this->load->view(isset($sidebar) ? $sidebar : '');?>
            </div>
            <?php #$this->load->view('external/advertise');?>
        </div>
        <?php $this->load->view('external/footer-top');?>
        <?php $this->load->view('external/footer');?>
        <?php $this->load->view('external/preloader');?>
        <script src="<?= base_url('assets/common/js/jquery.min.js');?>"></script>
        <script src="<?= base_url('assets/common/js/popper.min.js');?>"></script>
        <script src="<?= base_url('assets/common/js/bootstrap.min.js');?>"></script>
        <!--<script src="<?= base_url('assets/common/js/html2pdf.min.js');?>"></script>-->
        <!--<script src="<?= base_url('assets/common/js/bongabdo.js');?>"></script>-->
        <script src="<?= base_url('assets/external/js/script.js');?>"></script>
    </body>
</html>