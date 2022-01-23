<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Moderators</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url('admin/dashboard.html'); ?>">Admin</a></li>
                        <li class="breadcrumb-item active">Moderators</li>
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
                    <div class="card card-info">
                        <div class="card-header">
                            <h3 class="card-title">Moderator Entry</h3>
                        </div>
                        <?= form_open_multipart('action/update_moderator?key=admin'); ?>
                        <div class="card-body">
                            <div class="form-row">
                                <div class="col-lg-1">
                                    <div class="form-group">
                                        <img class="img-bordered-sms" src="<?= base_url('assets/internal/img/admin/' . $moderator->photo); ?>" height="68">
                                    </div>
                                </div>
                                <div class="col-lg-5">
                                    <div class="form-group">
                                        <label>Full Name <span class="text-danger">*</span></label>
                                        <input type="text" name="name" class="form-control" value="<?= $moderator->name; ?>" required minlength="6" maxlength="30">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Email <span class="text-danger">*</span></label>
                                        <input type="email" class="form-control" value="<?= $moderator->email; ?>" readonly="" required minlength="9" maxlength="30">
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-lg">
                                    <div class="form-group">
                                        <label>Education</label>
                                        <input type="text" name="education" class="form-control" value="<?= $moderator->education; ?>" minlength="3" maxlength="100">
                                    </div>
                                </div>
                                <div class="col-lg">
                                    <div class="form-group">
                                        <label>Profession</label>
                                        <input type="text" name="profession" class="form-control" value="<?= $moderator->profession; ?>" minlength="3" maxlength="100">
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-lg">
                                    <div class="form-group">
                                        <label>Skills <span class="text-danger">[use comma to separate]</span></label>
                                        <input type="text" name="skills" class="form-control" value="<?= $moderator->skills; ?>" minlength="1" maxlength="100">
                                    </div>
                                </div>
                                <div class="col-lg">
                                    <div class="form-group">
                                        <label>Location</label>
                                        <input type="text" name="location" class="form-control" value="<?= $moderator->location; ?>" minlength="3" maxlength="100">
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-lg">
                                    <div class="form-group">
                                        <label>Facebook</label>
                                        <input type="text" name="facebook" class="form-control" value="<?= $moderator->facebook; ?>" minlength="14" maxlength="100">
                                    </div>
                                </div>
                                <div class="col-lg">
                                    <div class="form-group">
                                        <label>IPs <span class="text-danger">[use comma to separate]</span></label>
                                        <input type="text" name="ipaddress" value="<?= $moderator->IPs; ?>" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-lg">
                                    <div class="form-group">
                                        <label>Password <span class="text-danger">* [md5]</span></label>
                                        <input type="text" name="password" class="form-control" value="<?= $moderator->password; ?>" required minlength="6" maxlength="20">
                                    </div>
                                </div>
                                <div class="col-lg">
                                    <div class="form-group">
                                        <label>Last Updated</label>
                                        <input type="text" value="<?= timespan($moderator->last_update, now(), 1); ?> ago" class="form-control" readonly="">
                                    </div>
                                </div>
                            </div>
                            <div class="float-right">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                        <?= form_close(); ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>