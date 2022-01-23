<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark"><?= lang('moderators'); ?> &nbsp;&nbsp;<a href="<?= base_url('admin/addmoderator.html'); ?>"><button type="button" data-toggle="tooltip" title="Mark All Seen" class="btn btn-sm btn-danger">Add New</button></a></h1>
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
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="card card-secondary">
                        <div class="card-header">
                            <h3 class="card-title">All Moderators</h3>
                        </div>
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Photo</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Role</th>
                                            <th>Status</th>
                                            <th>Time</th>
                                            <?php if ($this->session->userdata('coadminauth')['role'] == 'admin') : ?>
                                                <th>Actions</th>
                                            <?php endif; ?>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if (count($moderstors) <= 0): ?>
                                            <tr><td colspan="7"><h3 class="text-danger font-weight-bold text-center"><?= lang('nodata'); ?></h3></td></tr>
                                        <?php endif; ?>
                                        <?php foreach ($moderstors as $moderstor): ?>
                                            <tr>
                                                <td><img class="img-bordered-sm" src="<?= base_url('assets/internal/img/admin/' . $moderstor->photo); ?>" alt="Mod" height="28"></td>
                                                <td><?= $moderstor->name; ?></td>
                                                <td><?= $moderstor->email; ?></td>
                                                <td>Moderator</td>
                                                <td><?= ($moderstor->active == 1) ? '<span class="badge badgef badge-success">Active</span>' : '<span class="badge badgef badge-danger">Inactive</span>'; ?></td>
                                                <td><?= date('d-m-Y H:i', $moderstor->time); ?></td>
                                                <?php if ($this->session->userdata('coadminauth')['role'] == 'admin') : ?>
                                                    <td>
                                                        <a href="<?= base_url('eshow/moderator/' . $moderstor->id); ?>.html" class="btn-sm btn-info" data-toggle="tooltip" title="View"><i class="fa fa-edit faw"></i></a>
                                                        <?php if ($moderstor->active == 1) : ?>
                                                            <a href="<?= base_url('update/moderator/' . $moderstor->id); ?>.html?key=de" class="btn-sm btn-danger" data-toggle="tooltip" title="Deactivate"><i class="fa fa-close faw"></i></a>
                                                        <?php else: ?>
                                                            <a href="<?= base_url('update/moderator/' . $moderstor->id); ?>.html?key=ac" class="btn-sm btn-success" data-toggle="tooltip" title="Activate"><i class="fa fa-check faw"></i></a>
                                                        <?php endif; ?>
                                                        <a href="<?= base_url('delete/moderator/' . $moderstor->id); ?>.html" onclick="return confirm('Are you sure?')" class="btn-sm btn-danger" data-toggle="tooltip" title="Delete"><i class="fa fa-trash faw"></i></a>
                                                    </td>
                                                <?php endif; ?>
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