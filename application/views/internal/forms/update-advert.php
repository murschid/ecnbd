<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Update Advertisement</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url('admin/dashboard.html'); ?>"><?= lang('admin'); ?></a></li>
                        <li class="breadcrumb-item active"><?= lang('moderators'); ?></li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <?php if ($this->session->flashdata('errors')): ?>
                        <div class="alert alert-danger"><?= $this->session->flashdata('errors'); ?></div>
                    <?php endif; ?>
                    <?php if ($this->session->flashdata('success')): ?>
                        <div class="alert alert-success"><?= $this->session->flashdata('success'); ?></div>
                    <?php endif; ?>
                    <div class="card card-secondary">
                        <div class="card-body mycards">
                            <?= form_open('action/update_advertise'); ?>
                            <div class="form-row">
                                <div class="col-lg">
                                    <div class="form-group">
                                        <label>Title <span class="text-red">*</span></label>
                                        <input type="text" name="title" value="<?= $advert->title; ?>" class="form-control" required="" minlength="3" maxlength="100" placeholder="Facebook">
                                    </div>
                                </div>
                            </div>
                            <input type="hidden" name="addvid" value="<?= $advert->id; ?>">
                            <div class="form-row">
                                <div class="col-lg">
                                    <div class="form-group">
                                        <label>Advertisement Code <span class="text-red">*</span></label>
                                        <textarea name="advertise" class="form-control" required="" minlength="3" placeholder="https://www.facebook.com/plugins/video.php?href=https://www.facebook.com/RinBangladesh/videos/825048651352867/&show_text=0"><?= $advert->advertise; ?></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-lg">
                                    <div class="form-group">
                                        <label>Publish <span class="text-danger">*</span></label>
                                        <select name="active" class="form-control" required="">
                                            <option value="1" selected>Yes</option>
                                            <option value="0">No</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary float-right">Submit</button>
                            <?= form_close(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>