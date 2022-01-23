<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1><?= lang('sentmail'); ?> &nbsp;&nbsp;<a href="<?= base_url('admin/mailing.html'); ?>"><button type="button" data-toggle="tooltip" title="New Message" class="btn btn-sm btn-danger">New</button></a></h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url('admin/dashboard.html'); ?>"><?=lang('dashboard');?></a></li>
                        <li class="breadcrumb-item active"><?= lang('sentmail'); ?></li>
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
                            <h3 class="card-title">All Sent Items</h3>
                        </div>
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Subject</th>
                                            <th>Group</th>
                                            <th>Sender</th>
                                            <th>Time</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if (count($sentmails) <= 0): ?>
                                            <tr><td colspan="5"><h4 class="text-danger font-weight-bold text-center"><?= lang('nodata'); ?></h4></td></tr>
                                        <?php endif; ?>
                                        <?php foreach ($sentmails as $sentmail): ?>
                                            <tr>
                                                <td><?= $sentmail->subject; ?></td>
                                                <td><?= $sentmail->group; ?></td>
                                                <td><?= $sentmail->mod; ?></td>
                                                <td><?= date('d-m-Y H:i', $sentmail->time); ?></td>
                                                <td>
                                                    <a class="btn-sm btn-info" data-toggle="tooltip" title="Show"><i class="fa fa-eye text-white faw"></i></a>
                                                    <a href="<?= base_url('delete/sentmail/'.$sentmail->id); ?>.html" onclick="return confirm('Are you sure?')" class="btn-sm btn-danger" data-toggle="tooltip" title="Delete"><i class="fa fa-trash faw"></i></a>
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