<div class="mb-4 pb-3 bg-light rounded">
    <h4 class="font-italic brtop mybg"><?=lang('subscribe');?>-</h4>
    <?php if ($this->session->flashdata('suberrors')):?>
        <div class="alert alert-danger"><?=$this->session->flashdata('suberrors');?></div>
    <?php endif;?>
    <?php if ($this->session->flashdata('subsuccess')):?>
        <div class="alert alert-success"><?=$this->session->flashdata('subsuccess');?></div>
    <?php endif;?>
    <?=form_open('article/subscribe');?>
    <div class="input-group">
        <input type="email" name="email" class="form-control" required placeholder="<?=lang('emailadds');?>" minlength="9" maxlength="40" autocomplete="off" data-toggle="tooltip" data-placement="top" title="<?=lang('minmax940');?>">
        <div class="input-group-append">
            <button type="submit" class="input-group-text"><img src="<?=base_url('assets/external/img/icons/rocket.png');?>" class="img-fluid mysocialsm"></button>
        </div>
    </div>
    <?=form_close();?>
</div>