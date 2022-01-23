<footer class="page-footer bg-light pt-4 border-top">
    <div class="container text-center text-md-left">
        <div class="row">
            <div class="col-md-3 mt-md-0">
                <!--<h4 class="underline text-muted"><?=lang('menu');?></h4>-->
                <a href="<?= base_url();?>" class="blog-header-logo ml-2 text-dark"><img src="<?= base_url('assets/external/img/common/footer_new.png');?>" class="img-fluid"></a>
            </div>
            <hr class="clearfix w-100 d-md-none pb-3">
            <div class="col-md-3 mb-md-0">
                <h4 class="underline text-muted"><?=lang('menu');?></h4>
                <ul class="list-unstyled">
                    <li class="hovspc"><a href="<?=base_url('terms.html');?>" class="text-muted"><i class="fa fa-caret-right"></i> <?=lang('cterms');?></a></li>
                    <li class="hovspc"><a href="<?=base_url('policy.html');?>" class="text-muted"><i class="fa fa-caret-right"></i> <?=lang('policy');?></a></li>
                    <li class="hovspc"><a href="<?=base_url('contact.html');?>" class="text-muted"><i class="fa fa-caret-right"></i> <?=lang('contact');?></a></li>
                </ul>
            </div>
            <hr class="clearfix w-100 d-md-none pb-3">
            <div class="col-md-3 mb-md-0">
                <h4 class="underline text-muted"><?=lang('menu');?></h4>
                <ul class="list-unstyled">
                    <li class="hovspc"><a href="<?= base_url('article/category/pollution.html');?>" class="text-muted"><i class="fa fa-caret-right"></i> <?=lang('pollution');?></a></li>
                    <li class="hovspc"><a href="<?= base_url('article/category/climate.html');?>" class="text-muted"><i class="fa fa-caret-right"></i> <?=lang('climate');?></a></li>
                    <li class="hovspc"><a href="<?= base_url('article/category/wildlife.html');?>" class="text-muted"><i class="fa fa-caret-right"></i> <?=lang('wildlife');?></a></li>
                </ul>
            </div>
            <hr class="clearfix w-100 d-md-none pb-3">
            <div class="col-md-3 mb-md-0">
                <h4 class="underline text-muted"><?=lang('address');?></h4>
                <address class="text-muted">
                    <?=lang('addresstxt');?><br>
                    <abbr><?= lang('emailadd');?></abbr>
                </address>
            </div>
        </div>
    </div>
</footer>