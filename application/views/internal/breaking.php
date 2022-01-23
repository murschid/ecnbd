<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Add Breaking News</h1>
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
                <div class="col-md-12">
                    <?php if ($this->session->flashdata('errors')): ?>
                        <div class="alert alert-danger"><?= $this->session->flashdata('errors'); ?></div>
                    <?php endif; ?>
                    <?php if ($this->session->flashdata('success')): ?>
                        <div class="alert alert-success"><?= $this->session->flashdata('success'); ?></div>
                    <?php endif; ?>
                    <div class="card card-secondary">
                        <div class="card-body mycards">
                            <?= form_open('action/addbreaking') ?>
                            <div class="form-row">
                                <div class="col">
                                    <div class="form-group">
                                        <label>Title <span class="text-red">*</span></label>
                                        <input type="text" name="title" class="form-control" required="" minlength="3" maxlength="100" placeholder="News Title">
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col">
                                    <div class="form-group">
                                        <label>News <span class="text-red">*</span> [use &ofcir; with span tag before news]</label>
                                        <textarea name="breaking" class="form-control" required="" minlength="3" placeholder="Breaking News [ <span>&ofcir;</span> ] for circle"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col">
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
                        <div class="card-header">
                            <h3 class="card-title">All Breaking News</h3>
                        </div>
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th>Title</th>
                                        <th>Moderator</th>
                                        <th>Status</th>
                                        <th>Time</th>
                                        <th>Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php if (count($breakings) <= 0): ?>
                                        <tr><td colspan="5"><h3 class="text-danger font-weight-bold text-center"><?= lang('nodata'); ?></h3></td></tr>
                                    <?php endif; ?>
                                    <?php foreach ($breakings as $breaking): ?>
                                        <tr>
                                            <td><?= $breaking->title; ?></td>
                                            <td><?= $breaking->moderator; ?></td>
                                            <td><?= ($breaking->active == 1) ? '<span class="badge badgef badge-success">Active</span>' : '<span class="badge badgef badge-danger">Inactive</span>'; ?></td>
                                            <td><?= date('d-m-Y H:i', $breaking->time); ?></td>
                                            <td>
                                                <a onclick="breakingUpdate(<?= $breaking->id;?>)" class="btn-sm btn-info" data-toggle="tooltip" title="Edit"><i class="fa fa-edit faw text-white"></i></a>
                                                <?php if ($breaking->active == 1) : ?>
                                                    <a href="<?= base_url('update/breaking/' . $breaking->id); ?>.html?key=de" class="btn-sm btn-danger" data-toggle="tooltip" title="Deactivate"><i class="fa fa-close faw"></i></a>
                                                <?php else: ?>
                                                    <a href="<?= base_url('update/breaking/' . $breaking->id); ?>.html?key=ac" class="btn-sm btn-success" data-toggle="tooltip" title="Activate"><i class="fa fa-check faw"></i></a>
                                                <?php endif; ?>
                                                <a href="<?= base_url('delete/breaking/' . $breaking->id); ?>.html" onclick="return confirm('Are you sure?')" class="btn-sm btn-danger" data-toggle="tooltip" title="Delete"><i class="fa fa-trash faw"></i></a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<?php $this->load->view('internal/modals/breakingbody');?>