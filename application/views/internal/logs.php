<div class="content-wrapper">
    <?php $this->load->view($header[0]); ?>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card card-secondary">
                        <div class="card-header">
                            <h3 class="card-title">All Logs</h3>
                        </div>
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Photo</th>
                                            <th>Name</th>
                                            <th>IP</th>
                                            <th>Login</th>
                                            <th>Status</th>
                                            <th>Device</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if (count($logs) <= 0): ?>
                                            <tr><td colspan="7"><h4 class="text-danger font-weight-bold text-center"><?= lang('nodata'); ?></h4></td></tr>
                                        <?php endif; ?>
                                        <?php foreach ($logs as $log): ?>
                                            <tr>
                                                <td><img class="img-bordered-sm" src="<?= base_url('assets/internal/img/admin/'.$log->photo); ?>" alt="Mod" height="28"></td>
                                                <td><?= $log->name; ?></td>
                                                <td><?= $log->ip; ?></td>
                                                <td><?= date('d-m-Y H:i', $log->login); ?></td>
                                                <td><?= (time() - $log->login >= 86400) ? '<span class="badge badge-danger">Died</span>' : '<span class="badge badge-success">Active</span>'; ?></td>
                                                <td><?= $log->device; ?></td>
                                                <td>
                                                    <a class="btn-sm btn-info" data-toggle="tooltip" title="View"><i class="fa fa-edit faw text-white"></i></a>
                                                    <a href="<?= base_url('delete/logs/' . $log->id); ?>.html" onclick="return confirm('Are you sure?')" class="btn-sm btn-danger" data-toggle="tooltip" title="Delete"><i class="fa fa-trash faw"></i></a>
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