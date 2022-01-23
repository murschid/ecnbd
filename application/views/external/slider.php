<?php if (isset($sliders)):?>
    <div id="carouselExampleCaptions" class="jumbotron carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <?php $i = 0; $j = 0; $k = 0;?>
            <?php foreach ($sliders as $slider):?>
                <li data-target="#carouselExampleCaptions" data-slide-to="<?=$i++;?>" class="<?=($j++ == 0) ? 'active' : '';?>"></li>
            <?php endforeach;?>
        </ol>
        <div class="carousel-inner">
            <?php foreach ($sliders as $slider):?>
                <div class="carousel-item <?=($k++ == 0) ? 'active' : '';?>">
                    <div class="row">
                        <div class="col-md-4 justify-content-end">
                            <img class="card-img-left d-lg-block img-fluid w-100 mx-h-230" src="<?= base_url('assets/external/img/posts/'.$slider->images);?>" alt="Carousel">
                        </div>
                        <div class="col-md-8 pl-2">
                            <h3 class="mb-1 mt-xs-2"><a href="<?=base_url('article/details/'.$slider->id);?>.html" class="text-dark"><?=$slider->title;?></a></h3>
                            <p class="blog-post-meta font-italic small"><i class="fa fa-calendar-o"></i><?= converter::times(date("d-m-Y H:i", $slider->time));?><i class="fa fa-user-o"></i><?= $slider->writer;?></p>
                            <p class="lead myhidemd"><?=$slider->short_desc;?> <a href="<?= base_url('article/details/'.$slider->id);?>.html" class="font-weight-bold font-italic"><?=lang('readmore');?></a></p>
                        </div>
                    </div>
                </div>
            <?php endforeach;?>
        </div>
    </div>
<?php endif;?>

