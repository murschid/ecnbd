<div class="col-md-9">
    <div class="jumbotron rounded">
        <div class="row">
            <div class="col-md-6">
                <div class="text-center">
                    <h3 class="pb-2"><?=lang('about'); ?></h3>
                    <hr class="m-0">
                </div>
                <p class="text-justify mt-2"><?= General::single('tb_general', 'title', 'about', 'content'); ?></p>
            </div>
            <div class="col-md-6 border-left">
                <div class="text-center">
                    <h3 class="pb-2"><?=lang('editors'); ?></h3>
                    <hr class="m-0">
                </div>
                <!--<div class="text-center mt-3">
                    <img src="<?=base_url('assets/external/img/common/editor.png')?>" width="200" class="img-fluid rounded mx-auto d-bloc">
                </div>-->
                <h4 class="mt-4 font-italic"><?=lang('editor'); ?>: <?= General::single('tb_general', 'title', 'editor', 'content'); ?></h4>
                <h5 class="font-italic"><?= lang('coeditor'); ?>: <?= General::single('tb_general', 'title', 'sub-editor', 'content'); ?></h5>
            </div>
        </div>
    </div>
</div>