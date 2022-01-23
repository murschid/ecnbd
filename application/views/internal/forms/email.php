<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6"><h1>Email Sending</h1></div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url('admin/dashboard.html'); ?>">Admin</a></li>
                        <li class="breadcrumb-item active">Send Email</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="container-fluid">
            <?php if ($this->session->flashdata('errors')): ?>
                <div class="alert alert-danger"><?= $this->session->flashdata('errors'); ?></div>
            <?php endif; ?>
            <?php if ($this->session->flashdata('success')): ?>
                <div class="alert alert-success"><?= $this->session->flashdata('success'); ?></div>
            <?php endif; ?>
            <div class="row">
                <div class="col-lg-12">
                    <div class="card card-info">
                        <div class="card-body mycards">
                            <?= form_open_multipart('email/send_message'); ?>
                            <div class="form-group row">
                                <div class="col-lg-5">
                                    <label>Subject <span class="text-red">*</span></label>
                                    <input type="text" name="subject" class="form-control" required minlength="10" maxlength="100" placeholder="This is the subject of email.">
                                </div>
                                <div class="col-lg-3">
                                    <label>Address <span class="text-red">*</span></label>
                                    <select name="mailaddress" class="form-control" required>
                                        <option value="info@ecnbd.com">info@ecnbd.com</option>
                                    </select>
                                </div>
                                <div class="col-lg-2">
                                    <label>Group <span class="text-red">*</span></label>
                                    <select name="table" class="form-control" required>
                                        <option value="tb_subscribers">Subscribers</option>
                                        <option value="tb_admin">Administrators</option>
                                    </select>
                                </div>
                                <div class="col-lg-2">
                                    <label>Template <span class="text-red">*</span></label>
                                    <select name="template" class="form-control" required>
                                        <option value="1" selected>Yes</option>
                                        <option value="0">No</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Body Title <span class="text-red">*</span></label>
                                <input type="text" name="body" class="form-control" required minlength="10" maxlength="200" placeholder='1-2 lines'>
                            </div>
                            <div class="form-group">
                                <label>Message <span class="text-red">*</span></label>
                                <textarea name="message" class="form-control textarealg" required minlength="10" maxlength="5000"></textarea>
                            </div>
                            <div class="float-right">
                                <button type="submit" onclick="return confirm('Are you sure?')" class="btn btn-primary">Send</button>
                            </div>
                            <?= form_close(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>