<div class="col-md-9 mt-2">
    <?php if (count($searched) <= 0):?>
        <h4 class="text-danger font-weight-bold text-center bg-dlight p-5"><?= lang('nosearch');?></h4>
    <?php endif; ?>
    <?php foreach ($searched as $search):?>
        <div class="row m-2 border-bottom">
            <div class="col-md-3 justify-content-end myend">
                <img class="card-img-left flex-auto d-lg-block img-fluid rounded" src="<?= base_url('assets/external/img/thumbnails/'.$search->thumbnail);?>" alt="Image"width="150">
            </div>
            <div class="col-md-9 px-2 searched">
                <h4 class="mt-xs-2"><a href="<?= base_url('article/details/'.$search->id);?>.html" class="text-dark"><?= $search->title;?></a></h4>
                <p class="blog-post-meta font-italic small"><i class="fa fa-calendar-o"></i><?= converter::times(date("d-m-Y H:i", $search->time));?><i class="fa fa-user-o"></i><?= $search->writer;?></p>
                <p class="card-text mb-auto"><a href="<?= base_url('article/details/'.$search->id);?>.html" class="font-italic"><?= lang('readdetail');?></a></p>
            </div>
        </div>
    <?php endforeach;?>
</div>
<style>.blog-sidebar{margin-top: 1rem;}</style>