<?php if (!$this->session->userdata('ecnuserauth')):?>
    <div class="mb-3 pb-1 bg-light rounded">
        <h4 class="font-italic brtop mybg"><?= lang('relogin');?>-</h4>
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
<?php endif;?>