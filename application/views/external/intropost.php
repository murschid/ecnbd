<?php if (isset($intro)):?>
    <div class="jumbotron rounded mt-n3">
        <img class="float-right pinsign" src="<?= base_url('assets/external/img/icons/pinb.png');?>" data-toggle="tooltip" data-placement="top" title="<?=lang('pinpost');?>">
        <div class="row">
            <div class="col-md-4">
                <img class="card-img-left d-lg-block img-fluid w-100 mx-h-230" src="<?= base_url('assets/external/img/thumbnails/'.$intro->thumbnail);?>" alt="Image">
            </div>
            <div class="col-md-8 pl-2">
                <h3 class="mb-1 mt-xs-2"><a href="<?= base_url('article/details/'.$intro->id);?>.html" class="text-dark"><?= $intro->title;?></a></h3>
                <p class="blog-post-meta font-italic small"><i class="fa fa-calendar-o"></i><?= converter::times(date('d-m-Y H:i', $intro->time));?><i class="fa fa-user-o"></i><?= $intro->writer;?></p>
                <p class="lead"><?= $intro->short_desc;?> <a href="<?= base_url('article/details/' . $intro->id);?>.html" class="font-italic"><?= lang('readmore');?></a></p>
            </div>
        </div>
    </div>
<?php endif;?>