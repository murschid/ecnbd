<div class="col-md-9">
    <div class="row mb-2">
        <?php if (count($posts) <= 0):?>
            <div class="col"><h4 class="text-danger font-weight-bold text-center bg-dlight p-5"><?= lang('nopost');?></h4></div>
        <?php endif; ?>
        <?php foreach ($posts as $post):?>
            <div class="col-md-6">
                <div class="card flex-md-column mb-4 shadow-sm minhight">
                    <div class="card-body d-flex flex-column align-items-start">
                        <h4 class="mb-0"><a href="<?= base_url('article/details/'.$post->id);?>.html" class="text-dark"><?= $post->title;?></a></h4>
                        <p class="blog-post-meta font-italic small"><i class="fa fa-calendar-o"></i><?= converter::times(date("d-m-Y H:i", $post->time));?><i class="fa fa-user-o"></i><?= $post->writer;?></p>
                    </div>
                    <div class="px-3"><img class="card-img-top d-lg-block img-fluid mx-h-230" src="<?= base_url('assets/external/img/thumbnails/'.$post->thumbnail);?>" alt="News"></div>
                    <div class="card-body d-flex flex-column align-items-start">
                        <p class="card-text mb-auto"><?= $post->short_desc;?> <a href="<?= base_url('article/details/'.$post->id);?>.html" class="font-italic"><?= lang('readmore');?></a></p>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
    <?php $this->load->view('external/widget');?>
    <?= isset($pagination) ? $pagination : '';?>
</div>