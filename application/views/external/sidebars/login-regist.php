<?php if (!$this->session->userdata('ecnuserauth')):?>
<div class="mb-3 pb-1 bg-light rounded">
    <h4 class="font-italic brtop mybg mb-0"><?= lang('reaccount');?>-</h4>
    <ul class="nav nav-tabs border-0" role="tablist">
        <li class="nav-item col-6"><a class="nav-link py-1 text-center active" data-toggle="tab" href="#login" role="tab" aria-controls="login" aria-selected="false"><?=lang('login');?></a></li>
        <li class="nav-item col-6"><a class="nav-link py-1 text-center" data-toggle="tab" href="#regist" role="tab" aria-controls="regist" aria-selected="false"><?= lang('register');?></a></li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane fade show active" id="login" role="tabpanel" aria-labelledby="login-tab">
            <?=form_open('user/signin');?>
            <div class="form-group mb-1">
                <input type="email" name="username" class="form-control" required minlength="6" maxlength="40" placeholder="<?=lang('email');?>*">
            </div>
            <div class="form-group mb-1">
                <input type="password" name="password" class="form-control" required minlength="6" maxlength="20" placeholder="<?=lang('password');?>*">
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-sm btn-outline-info"><?=lang('login');?></button>
            </div>
            <?=form_close();?>
        </div>
        <div class="tab-pane fade show" id="regist" role="tabpanel" aria-labelledby="regist-tab">
            <?= form_open_multipart('user/registration'); ?>
            <div class="input-group mb-1">
                <input type="text" name="name" class="form-control" placeholder="<?= lang('name');?>*" required minlength="3" maxlength="30" autocomplete="off">
            </div>
            <div class="input-group mb-1">
                <input type="email" name="email" class="form-control" placeholder="<?= lang('email');?>*" required minlength="9" maxlength="40" autocomplete="off">
            </div>
            <div class="input-group mb-1">
                <input type="password" name="password" class="form-control" placeholder="<?= lang('password');?>*" required minlength="6" autocomplete="off">
            </div>
            <div class="input-group mb-1">
                <input type="password" name="repassword" class="form-control" placeholder="<?= lang('repassword');?>*" required minlength="6" maxlength="20" autocomplete="off">
            </div>
            <div class="input-group mb-1">
                <input type="tel" name="mobile" class="form-control" placeholder="<?= lang('mobile');?>*" required minlength="11" maxlength="14" autocomplete="off">
            </div>
            <div class="input-group mb-1">
                <div class="custom-file">
                    <input type="file" name="photo" class="custom-file-input" required>
                    <label class="custom-file-label font-italic text-muted"><?= lang('profile_photo');?></label>
                </div>
            </div>
            <div class="input-group mb-1">
                <textarea class="form-control" name="about" placeholder="<?= lang('regbio');?>" maxlength="200" autocomplete="off"></textarea>
            </div>
            <div class="form-check mt-2 mb-1">
                <input type="checkbox" name="terms" class="form-check-input" required>
                <label class="form-check-label"><a href="<?=base_url('terms.html')?>" class="text-muted"><?=lang('accept_terms');?><span class="text-danger">*</span></a></label>
            </div>
            <div class="input-group mt-3">
                <button class="btn btn-sm btn-info mysubmit" type="submit"><?= lang('send');?></button>
            </div>
            <?= form_close(); ?>
        </div>
    </div>
</div>
<?php endif;?>