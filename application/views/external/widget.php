<?php $topreads = $this->external_model->exqueryor('tb_posts', NULL, 5, 'clicks', 'DESC', array('active' => 1));?>
<?php $virals = $this->external_model->exqueryor('tb_posts', NULL, 5, 'comments', 'DESC', array('active' => 1));?>
<div class="row mb-2">
    <div class="col-md-6">
        <div class="p-3 mb-3 bg-light">
            <h4 class="font-italic brtop mybg"><?= lang('topread');?>-</h4>
            <?php foreach ($topreads as $topread):?>
                <a href="<?= base_url('article/details/'.$topread->id);?>.html" class="media text-muted pt-2 border-bottom border-gray">
                    <img src="<?= base_url('assets/external/img/thumbnails/'.$topread->thumbnail);?>" height="40" width="60" alt="News" class="mr-2 rounded">
                    <h6 class="media-body pb-2 mb-0 text-muted"><?= $topread->title;?></h6>
                </a>
            <?php endforeach;?>
        </div>
    </div>
    <div class="col-md-6">
        <div class="p-3 bg-light">
            <h4 class="font-italic brtop mybg"><?= lang('viraled');?>-</h4>
            <?php foreach ($virals as $viral):?>
                <a href="<?= base_url('article/details/'.$viral->id);?>.html" class="media text-muted pt-2 border-bottom border-gray">
                    <img src="<?= base_url('assets/external/img/thumbnails/'.$viral->thumbnail);?>" height="40" width="60" alt="News" class="mr-2 rounded">
                    <h6 class="media-body pb-2 mb-0 text-muted"><?= $viral->title;?></h6>
                </a>
            <?php endforeach;?>
        </div>
    </div>
</div>