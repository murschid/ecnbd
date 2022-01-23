<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Visitors <a href="<?= base_url('update/alseen.html'); ?>"><button type="button" data-toggle="tooltip" title="Mark All Seen" class="btn btn-sm btn-danger">Mark Seen</button></a></h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url('admin/dashboard.html'); ?>"><?= lang('dashboard'); ?></a></li>
                        <li class="breadcrumb-item active"><?= lang('visitors'); ?></li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card card-secondary">
                        <div class="card-header">
                            <h3 class="card-title">All Visitors</h3>
                        </div>
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th><i class="nav-icon fa fa-users"></i></th>
                                            <th>IP Address</th>
                                            <th>Country</th>
                                            <th>Total</th>
                                            <th>Status</th>
                                            <th>Agent</th>
                                            <th>Time</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if (count($visitors) <= 0): ?>
                                            <tr><td colspan="8"><h3 class="text-danger font-weight-bold text-center">No Visitors Are Available</h3></td></tr>
                                        <?php endif; ?>
                                        <?php foreach ($visitors as $visitor): ?>
                                            <tr>
                                                <?php if ($visitor->seen == 0) : ?>
                                                    <td><i class="nav-icon fa fa-user"></i></td>
                                                <?php else: ?>
                                                    <td><i class="nav-icon fa fa-user-o"></i></td>
                                                <?php endif; ?>
                                                <td><?= $visitor->ip; ?></td>
                                                <td><?= $visitor->country; ?></td>
                                                <td><?= $visitor->count; ?></td>
                                                <td><?= ($visitor->banned == 1) ? '<span class="badge badge-danger badgef">Banned</span>' : '<span class="badge badge-success badgef">Active</span>'; ?></td>
                                                <td><?= $visitor->agent; ?></td>
                                                <td><?= date('d-m-Y H:i', $visitor->time); ?></td>
                                                <td>
                                                    <?php if ($visitor->banned == 0): ?>
                                                        <a href="<?= base_url('update/visitor/' . $visitor->id); ?>.html?key=de" class="btn-sm btn-danger" data-toggle="tooltip" title="Deactivate"><i class="fa fa-close faw"></i></a>
                                                    <?php else: ?>
                                                        <a href="<?= base_url('update/visitor/' . $visitor->id); ?>.html?key=ac" class="btn-sm btn-success" data-toggle="tooltip" title="Activate"><i class="fa fa-check faw"></i></a>
                                                    <?php endif; ?>
                                                    <a href="<?= base_url('delete/visitor/' . $visitor->id); ?>.html" onclick="return confirm('Are you sure?')" class="btn-sm btn-danger" data-toggle="tooltip" title="Delete"><i class="fa fa-trash faw"></i></a>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="card-footer clearfix"><?= isset($pagination) ? $pagination : '';?></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>