<div class="col-md-9">
    <div class="mb-2">
        <div class="col bg-light pt-3 pb-4">
            <div class="text-center">
                <h3 class="pb-3"><?=lang('userregister'); ?></h3>
            </div>
            <?php if ($this->session->flashdata('errorstoast')): ?>
                <div class="alert alert-danger"><?= $this->session->flashdata('errorstoast');?></div>
            <?php endif; ?>
            <?php if ($this->session->flashdata('successtoast')): ?>
                <div class="alert alert-success"><?= $this->session->flashdata('successtoast');?></div>
            <?php endif; ?>
            <?= form_open_multipart('user/registration'); ?>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <input type="text" name="name" class="form-control" placeholder="<?= lang('name');?>*" required minlength="3" maxlength="30" autocomplete="off" data-toggle="tooltip" data-placement="top" title="<?=lang('minmax330');?>">
                </div>
                <div class="col-md-6 mb-3">
                    <input type="email" name="email" class="form-control" placeholder="<?= lang('email');?>*" required minlength="9" maxlength="40" autocomplete="off" data-toggle="tooltip" data-placement="top" title="<?=lang('minmax940');?>">
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <input type="password" name="password" class="form-control" placeholder="<?= lang('password');?>*" required minlength="6" maxlength="20" autocomplete="off" data-toggle="tooltip" data-placement="top" title="<?=lang('minmax620');?>">
                </div>
                <div class="col-md-6 mb-3">
                    <input type="password" name="repassword" class="form-control" placeholder="<?= lang('repassword');?>*" required minlength="6" maxlength="20" autocomplete="off" data-toggle="tooltip" data-placement="top" title="<?=lang('samepass');?>">
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <input type="tel" name="mobile" class="form-control" placeholder="<?= lang('mobile');?>*" required minlength="11" maxlength="14" autocomplete="off" data-toggle="tooltip" data-placement="top" title="<?=lang('minmax1114');?>">
                </div>
                <div class="col-md-6 mb-3">
                    <div class="custom-file">
                        <input type="file" name="photo" class="custom-file-input" required data-toggle="tooltip" data-placement="top" title="<?=lang('minmax2x2');?>">
                        <label class="custom-file-label font-italic text-muted"><?= lang('profile_photo');?></label>
                    </div>
                </div>
            </div>
            <div class="mb-3">
                <div class="input-group">
                    <textarea class="form-control" name="about" placeholder="<?= lang('regbio');?>" maxlength="200" autocomplete="off" data-toggle="tooltip" data-placement="top" title="<?=lang('max200');?>"></textarea>
                </div>
            </div>
            <div class="form-check mb-3">
                <input type="checkbox" name="terms" class="form-check-input" required>
                <label class="form-check-label"><a href="<?=base_url('terms.html')?>" class="text-muted"><?=lang('accept_terms');?><span class="text-danger">*</span></a></label>
            </div>
            <div class="input-group">
                <button class="btn btn-sm btn-info mysubmit" type="submit"><?= lang('send');?></button>
            </div>
            <?= form_close(); ?>
        </div>
    </div>
</div>
