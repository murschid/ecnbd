<div class="col-md-9">
    <div class="jumbotron rounded">
        <div class="row">
            <div class="col-sm-4">
                <div class="text-center pb-2">
                    <img src="<?= base_url('assets/external/img/icons/address.png'); ?>" width="45">
                </div>
                <h4 class="text-center"><?= lang('address'); ?></h4>
                <p class="text-center"><?= lang('addresstxt'); ?></p>
            </div>
            <div class="col-sm-4">
                <div class="text-center pb-2">
                    <img src="<?= base_url('assets/external/img/icons/phone.png'); ?>" width="45">
                </div>
                <h4 class="text-center"><?= lang('phone'); ?></h4>
                <p class="text-center"><a href="tel:01313727682" class="font-weight-normal"><?= lang('mobileno'); ?></a></p>
            </div>
            <div class="col-sm-4">
                <div class="text-center pb-2">
                    <img src="<?= base_url('assets/external/img/icons/mail.png'); ?>" width="45">
                </div>
                <h4 class="text-center"><?= lang('email'); ?></h4>
                <p class="text-center myfont abbr"><?= lang('emailadd'); ?></p>
            </div>
        </div>
    </div>
    <div class="mb-2">
        <div class="col bg-light pt-4 pb-4">
            <?php if ($this->session->flashdata('errors')): ?>
                <div class="alert alert-danger"><?= $this->session->flashdata('errors'); ?></div>
            <?php endif; ?>
            <?php if ($this->session->flashdata('success')): ?>
                <div class="alert alert-success"><?= $this->session->flashdata('success'); ?></div>
            <?php endif; ?>
            <?= form_open('action/addcontact'); ?>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <input type="text" name="name" class="form-control" placeholder="<?= lang('name'); ?>*" required minlength="3" maxlength="30" data-toggle="tooltip" data-placement="top" title="<?=lang('minmax330');?>">
                </div>
                <div class="col-md-6 mb-3">
                    <input type="email" name="email" class="form-control" placeholder="<?= lang('email'); ?>*" required minlength="9" maxlength="40" data-toggle="tooltip" data-placement="top" title="<?=lang('minmax940');?>">
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <input type="tel" name="mobile" class="form-control" placeholder="<?= lang('mobile'); ?>*" required minlength="11" maxlength="14" data-toggle="tooltip" data-placement="top" title="<?=lang('minmax1114');?>">
                </div>
                <div class="col-md-6 mb-3">
                    <input type="text" name="subject" class="form-control" placeholder="<?= lang('subject'); ?>*" required minlength="6" maxlength="100" data-toggle="tooltip" data-placement="top" title="<?=lang('minmax6100');?>">
                </div>
            </div>
            <div class="mb-3">
                <div class="input-group">
                    <textarea class="form-control" name="message" placeholder="<?= lang('message'); ?>*" required rows="3" minlength="6" maxlength="600" data-toggle="tooltip" data-placement="top" title="<?=lang('minmax6600');?>"></textarea>
                </div>
            </div>
            <div class="input-group">
                <button class="btn btn-sm btn-info float-right" type="submit"><?= lang('send'); ?></button>
            </div>
            <?= form_close(); ?>
        </div>
    </div>
</div>