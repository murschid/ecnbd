<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Moderator</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url('admin/dashboard.html'); ?>">Admin</a></li>
                        <li class="breadcrumb-item active">Add Moderator</li>
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
                        <?= form_open_multipart('action/add_moderator'); ?>
                        <div class="card-body">
                            <div class="form-row">
                                <div class="col-lg">
                                    <div class="form-group">
                                        <label>Full Name <span class="text-danger">*</span></label>
                                        <input type="text" name="name" class="form-control" placeholder="Larry Page" required minlength="6" maxlength="30">
                                    </div>
                                </div>
                                <div class="col-lg">
                                    <div class="form-group">
                                        <label>Email <span class="text-danger">*</span></label>
                                        <input type="email" name="email" class="form-control" placeholder="email@email.com" required minlength="9" maxlength="30">
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-lg">
                                    <div class="form-group">
                                        <label>Password <span class="text-danger">*</span></label>
                                        <input type="text" name="password" class="form-control" placeholder="@4FT=w+$" autocomplete="off" required minlength="6" maxlength="20">
                                    </div>
                                </div>
                                <div class="col-lg">
                                    <div class="form-group">
                                        <label>Retype Password <span class="text-danger">*</span></label>
                                        <input type="text" name="passwordtwo" class="form-control" placeholder="@4FT=w+$" autocomplete="off" required minlength="6" maxlength="20">
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-lg">
                                    <div class="form-group">
                                        <label>Education</label>
                                        <input type="text" name="education" class="form-control" placeholder="B.Sc in CSE" minlength="3" maxlength="100">
                                    </div>
                                </div>
                                <div class="col-lg">
                                    <div class="form-group">
                                        <label>Profession</label>
                                        <input type="text" name="profession" class="form-control" placeholder="Software Engineer" minlength="3" maxlength="100">
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-lg">
                                    <div class="form-group">
                                        <label>Skills <span class="text-danger">[use comma to separate]</span></label>
                                        <input type="text" name="skills" class="form-control" placeholder="PHP, Java, C++" minlength="1" maxlength="100">
                                    </div>
                                </div>
                                <div class="col-lg">
                                    <div class="form-group">
                                        <label>Location</label>
                                        <input type="text" name="location" class="form-control" placeholder="Dhaka, Bangladesh" minlength="3" maxlength="100">
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-lg">
                                    <div class="form-group">
                                        <label>Facebook</label>
                                        <input type="text" name="facebook" class="form-control" placeholder="https://facebook.com/lagamhin" minlength="14" maxlength="100">
                                    </div>
                                </div>
                                <div class="col-lg">
                                    <div class="form-group">
                                        <label>Photo <span class="text-danger">* [100x100]</span></label>
                                        <input type="file" name="photo" class="form-control" id="inputPhoto">
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