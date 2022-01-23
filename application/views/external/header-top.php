<header class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 bg-dlight border-bottom box-shadow">
    <div class="my-2 d-xs-none my-md-0 topmenu">
        <a href="<?= base_url('about.html');?>" class="p-2 text-dark"><?= lang('about');?></a>
        <a class="text-muted">|</a>
        <a href="<?= base_url('contact.html');?>" class="p-2 text-dark"><?= lang('contact');?></a>
    </div>
    <div class="col-lg-2 col-md-3 offset-md-1 input-group md-form form-sm form-2 px-0">
        <?=form_open('article/search', array('class' => 'w-100'));?>
        <input type="search" name="searchr" onkeyup="ajaxsearch($(this).val())" class="form-control my-0 py-1" required placeholder="<?= lang('search');?>" autocomplete="off" data-toggle="tooltip" data-placement="top" title="<?=lang('typebengali');?>">
        <?=form_close();?>
    </div>
    <div class="col-1 d-flex justify-content-end align-items-end uaccount">
        <div class="btn-group">
            <button type="button" class="btn btn-light bg-dlight dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user-circle <?= ($this->session->userdata('ecnuserauth')) ? 'text-info' : '';?>"></i></button>
            <div class="dropdown-menu dropdown-menu-right">
                <?php if ($this->session->userdata('ecnuserauth')):?>
                    <a href="<?=base_url('user/myaccount.html')?>" class="dropdown-item text-muted"><i class="fa fa-user text-info"></i> <?=$this->session->userdata('ecnuserauth')['name'];?></a>
                    <a href="<?=base_url('user/signout.html')?>" class="dropdown-item text-muted"><i class="fa fa-sign-out text-danger"></i> <?= lang('logout');?></a>
                <?php else:?>
                    <!--<a href="<?=base_url('user/signin.html')?>" class="dropdown-item"><i class="fa fa-sign-in"></i> <?= lang('login');?></a>-->
                    <a class="dropdown-item text-muted" data-toggle="modal" data-target="#loginModal"><i class="fa fa-sign-in"></i> <?= lang('login');?></a>
                    <a href="<?=base_url('user/signup.html')?>" class="dropdown-item text-muted"><i class="fa fa-user"></i> <?= lang('register');?></a>
                <?php endif;?>
            </div>
        </div>
    </div>
</header>
<?php $this->load->view('external/modals/login');?>