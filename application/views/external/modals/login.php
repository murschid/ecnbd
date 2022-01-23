<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false" aria-hidden="true">
    <div class="modal-dialog loginModal modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header py-1">
                <h5 class="modal-title text-muted"><i class="fa fa-sign-in"></i> <?=lang('login');?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <?=form_open('user/signin');?>
                <div class="form-group">
                    <input type="email" name="username" class="form-control" required minlength="6" maxlength="40" placeholder="<?=lang('email');?>*">
                </div>
                <div class="form-group">
                    <input type="password" name="password" class="form-control" required minlength="6" maxlength="20" placeholder="<?=lang('password');?>*">
                </div>
                <div class="form-group">
                    <a href="<?=base_url('user/forgot.html')?>" class="float-left text-muted font-weight-normal"><i class="fa fa-user-secret"></i> <?=lang('forgotpass');?></a>
                    <button type="submit" class="btn btn-sm btn-info float-right"><?=lang('submit');?></button>
                </div>
                <?=form_close();?>
            </div>
        </div>
    </div>
</div>