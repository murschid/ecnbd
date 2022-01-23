<div class="col-md-9">
    <div class="mb-2">
        <div class="col bg-light pt-3 pb-4">
            <div class="text-center">
                <h3 class="pb-3"><?=lang('recoverpass'); ?></h3>
            </div>
            <?php if ($this->session->flashdata('errorstoast')): ?>
                <div class="alert alert-danger"><?= $this->session->flashdata('errorstoast');?></div>
            <?php endif; ?>
            <?php if ($this->session->flashdata('successtoast')): ?>
                <div class="alert alert-success"><?= $this->session->flashdata('successtoast');?></div>
            <?php endif; ?>
            <?= form_open_multipart('user/forgotpassword'); ?>
            <div class="row">
                <div class="col-md-12 mb-3">
                    <input type="email" name="email" class="form-control" placeholder="<?= lang('email');?>*" required minlength="9" maxlength="40" autocomplete="off" data-toggle="tooltip" data-placement="top" title="<?=lang('minmax940');?>">
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <input type="password" name="password" class="form-control" placeholder="<?=lang('newpassword');?>*" required minlength="6" maxlength="20" autocomplete="off" data-toggle="tooltip" data-placement="top" title="<?=lang('minmax620');?>">
                </div>
                <div class="col-md-6 mb-4">
                    <input type="password" name="repassword" class="form-control" placeholder="<?=lang('newrepassword');?>*" required minlength="6" maxlength="20" autocomplete="off" data-toggle="tooltip" data-placement="top" title="<?=lang('samepass');?>">
                </div>
            </div>
            <div class="input-group mt-4">
                <button class="btn btn-sm btn-info mysubmit" type="submit"><?= lang('send');?></button>
            </div>
            <?= form_close(); ?>
        </div>
    </div>
</div>
