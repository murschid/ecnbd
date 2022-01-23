<div class="row flex-nowrap justify-content-between align-items-center">
    <div class="col-md-6">
        <a href="<?= base_url();?>" class="blog-header-logo ml-2 text-dark">
            <img src="<?= base_url('assets/external/img/common/logo_short.png');?>" class="img-fluid">
        </a>
    </div>
    <!--<div class="col-md-4"><h4 class="bongabdo text-center"></h4></div>-->
    <div class="col-md-6 d-flex justify-content-end align-items-center">
        <div class="card flex-md-row shadow-sm">
            <div class="card-body mycartb bg-info py-1">
                <h2 class="nomargin"><?= converter::times(date('d')).' <span class="h6">'.converter::months(date('F'));?></span></h2>
                <h6 class="nomargin"><?= converter::times(date('Y')).' '.converter::days(date('l'));?></h6>
            </div>
        </div>
    </div>
</div>