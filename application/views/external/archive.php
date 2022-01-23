<div class="col-md-9 mt-3">
    <?php if (count($archives) <= 0):?>
        <h4 class="text-danger font-weight-bold text-center bg-dlight p-5"><?= lang('nosearch');?></h4>
    <?php endif; ?>
    <div class="p-2 bg-light mb-2">
        <?php foreach ($archives as $archive):?>
            <a class="media text-muted p-2 bg-light border-bottom border-gray searched" href="<?= base_url('article/details/'.$archive->id);?>.html">
                <img src="<?= base_url('assets/external/img/thumbnails/'.$archive->thumbnail);?>" alt="News" class="mr-2 img-h-100 rounded">
                <div class="ml-2">
                    <h4 class="text-dark"><?= $archive->title;?></h4>
                    <p class="blog-post-meta font-italic small"><i class="fa fa-calendar-o"></i><?= converter::times(date("d-m-Y H:i", $archive->time));?> <i class="fa fa-user-o"></i><?= $archive->writer;?></p>
                </div>
            </a>
        <?php endforeach;?>
    </div>
    <?= isset($pagination) ? $pagination : '';?>
</div>
<style>.blog-sidebar{margin-top: 1rem;}</style>