<?php $selecpsts = $this->external_model->exquery('tb_posts', NULL, 10, 'DESC', array('active' => 1, 'selected' => 1));?>
<?php $scategories = $this->external_model->exquery('tb_category', NULL, NULL, 'ASC', array());?>
<?php $archives = $this->external_model->exquery('tb_archive', NULL, NULL, 'DESC', array());?>
<div class="mb-4 pb-3 bg-light">
    <h4 class="font-italic brtop mybg"><?=lang('selectnews');?>-</h4>
    <div class="selectnews">
        <?php foreach ($selecpsts as $selecpst):?>
            <a href="<?=base_url('article/details/'.$selecpst->id);?>.html" class="media text-muted pt-2 border-bottom border-gray">
                <img src="<?=base_url('assets/external/img/thumbnails/'.$selecpst->thumbnail); ?>" height="40" width="60" alt="News" class="mr-2 rounded">
                <h6 class="media-body pb-2 pr-1 mb-0 small font-italic text-muted"><?= $selecpst->title;?></h6>
            </a>
        <?php endforeach;?>
    </div>
</div>
<div class="mb-4 pb-3 bg-light">
    <h4 class="font-italic brtop mybg"><?=lang('category');?>-</h4>
    <ol class="list-unstyled pl-3 mb-0">
        <?php foreach ($scategories as $scategory):?>
            <a href="<?=base_url('article/category/'.$scategory->english); ?>.html" class="text-muted hovspc"><li class="pb-2"><i class="fa fa-caret-right"></i> <?=$scategory->category;?></li></a>
        <?php endforeach;?>
    </ol>
</div>
<div class="mb-4 pb-3 bg-light">
    <h4 class="font-italic brtop mybg"><?=lang('archive');?>-</h4>
    <ol class="list-unstyled pl-3 mb-0">
        <?php foreach ($archives as $archive):?>
        <a href="<?=base_url('article/archive/'.$archive->link);?>.html" class="text-muted hovspc"><li class="pb-2"><i class="fa fa-caret-right"></i> <?=Converter::months($archive->month).' - '.Converter::times($archive->year);?></li></a>
        <?php endforeach;?>
    </ol>
</div>