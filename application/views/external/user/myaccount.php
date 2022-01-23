<div class="col-md-9">
    <div class="mb-2">
        <div class="col bg-light pt-3 pb-4">
            <div class="text-center">
                <h3 class="pb-3"><?=$user->name.' এর '.lang('profile');?></h3>
            </div>
            <hr class="mt-0">
            <?php if ($this->session->flashdata('uerrors')): ?>
                <div class="alert alert-danger text-center"><?= $this->session->flashdata('uerrors');?></div>
            <?php endif; ?>
            <?php if ($this->session->flashdata('usuccess')): ?>
                <div class="alert alert-success text-center"><?= $this->session->flashdata('usuccess');?></div>
            <?php endif; ?>
            <div class="row">
                <div class="col-md-3 p-4">
                    <img src="<?=base_url('assets/external/img/users/'.$user->photo);?>" class="img-fluid">
                    <h4 class="text-muted text-center my-2"><?=lang('profile');?> ফটো</h4>
                </div>
                <div class="col-md-9">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item"><a class="nav-link active" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false"><?=lang('edit_profile');?></a></li>
                        <li class="nav-item"><a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false"><?=lang('edit_password');?></a></li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                            <?= form_open_multipart('user/update'); ?>
                            <div class="row pt-3">
                                <div class="col-md-6 mb-3">
                                    <input type="text" name="name" class="form-control" value="<?=$user->name;?>" required minlength="3" maxlength="30">
                                    <input type="hidden" name="userid" value="<?=$user->id;?>" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <input type="email" name="email" class="form-control engfont" value="<?=$user->email;?>" readonly minlength="9" maxlength="40">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <input type="tel" name="mobile" class="form-control" value="<?=$user->mobile;?>" required minlength="11" maxlength="14">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <div class="custom-file">
                                        <input type="file" name="photo" class="custom-file-input">
                                        <label class="custom-file-label font-italic text-muted"><?= lang('profile_photo');?></label>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <div class="input-group">
                                    <textarea class="form-control" name="about" maxlength="200"><?=$user->about;?></textarea>
                                </div>
                            </div>
                            <div class="input-group mb-3">
                                <button class="btn btn-sm btn-info" type="submit"><?= lang('send');?></button>
                            </div>
                            <?=form_close();?>
                        </div>
                        <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                            <?= form_open('user/updatepass'); ?>
                            <div class="row pt-3">
                                <input type="hidden" name="puserid" value="<?=$user->id;?>" required>
                                <div class="col-md-6 mb-3">
                                    <input type="email" name="pemail" class="form-control engfont" value="<?= $user->email;?>" readonly minlength="6" maxlength="20">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <input type="password" name="oldpassword" class="form-control" placeholder="<?=lang('curpassword');?>*" required minlength="6" maxlength="20">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <input type="password" name="password" class="form-control" placeholder="<?=lang('newpassword');?>*" required minlength="6" maxlength="20">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <input type="password" name="repassword" class="form-control" placeholder="<?=lang('newrepassword');?>*" required minlength="6" maxlength="20">
                                </div>
                            </div>
                            <div class="input-group mb-3">
                                <button class="btn btn-sm btn-info" type="submit"><?= lang('send');?></button>
                            </div>
                            <?=form_close();?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
