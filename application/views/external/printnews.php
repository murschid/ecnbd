<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title><?= isset($title) ? $title : lang('print');?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" href="<?= base_url('assets/external/img/common/faviconn.png');?>">
        <link href="<?= base_url('assets/common/css/font-awesome.min.css');?>" rel="stylesheet">
        <link href="<?= base_url('assets/external/fonts/solaiman/font.css');?>" rel="stylesheet">
        <!--<link href="<?= base_url('assets/external/fonts/kalpurush/font.css');?>" rel="stylesheet">-->
        <link href="<?= base_url('assets/common/css/bootstrap.css');?>" rel="stylesheet">
        <link href="<?= base_url('assets/external/css/style.css');?>" rel="stylesheet">
    </head>
    <body>
        <div class="wrapper">
            <section class="invoice">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="blog-post">
                                <h2 class="blog-post-title mb-2"><?= $post->title; ?></h2>
                                <p class="blog-post-meta text-muted font-italic"><i class="fa fa-calendar-o"></i> <?= converter::times(date("d-m-Y h:i a", $post->time)); ?> <i class="fa fa-user-o"></i> <?= $post->writer; ?></p>
                                <p class="mt-2"><?= $post->short_desc; ?></p>
                                <div class="px-0"><img class="card-img-bottom flex-auto d-lg-block img-fluid" src="<?= base_url('assets/external/img/posts/' . $post->images); ?>" alt="News"></div>
                                <p class="blog-post-meta font-italic text-center pt-2"><?= lang('photo'); ?>: <?= $post->caption; ?></p>
                                <?= $post->description; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <script type="text/javascript">
            window.addEventListener("load", window.print());
        </script>
    </body>
</html>
