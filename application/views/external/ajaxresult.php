<?php foreach ($searched as $search):?>
<div class="media text-muted pt-2 border-top border-gray">
    <img src="<?= base_url('assets/external/img/thumbnails/'.$search->thumbnail);?>" height="40" width="60" alt="News" class="mr-2 rounded">
    <a href="<?= base_url('article/details/'.$search->id);?>.html">
        <h6 class="media-body pb-2 mb-0 text-muted"><?= $search->title;?></h6>
        <p class="blog-post-meta font-italic small searchtime"><i class="fa fa-calendar-o"></i><?= converter::times(date('d-m-Y H:i', $search->time));?></p>
    </a>
</div>
<?php endforeach;?>