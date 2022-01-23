<div class="d-flex flex-column flex-md-row align-items-center bg-light border-bottom border-top box-shadow mb-3">
    <!--<div class="col card-body mycart bg-info py-3 px-1">
        <span class="nomargin"><img src="<?= base_url('assets/external/img/bulletin.png'); ?>" height="50"></span>
        <h4 class="nomargin"><?= lang('breaking'); ?></h4>
    </div>-->
    <div class="col breaking">
        <marquee behavior="scroll" direction="left" hspace="20"><h4 class="text-danger zeroma"><?= lang('breaking'); ?>: <?= general::breaking(); ?></h4></marquee>
    </div>
</div>