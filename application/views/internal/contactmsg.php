<div class="content-wrapper">
    <?php $this->load->view($header[0]); ?>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card card-secondary">
                        <div class="card-header">
                            <h3 class="card-title">All Messages</h3>
                        </div>
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th><i class="fa fa-envelope"></i></th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Mobile</th>
                                            <th>Subject</th>
                                            <th>Time</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if (count($messages) <= 0): ?>
                                            <tr><td colspan="7"><h4 class="text-danger font-weight-bold text-center"><?= lang('nodata'); ?></h4></td></tr>
                                        <?php endif; ?>
                                        <?php foreach ($messages as $message): ?>
                                            <tr>
                                                <td><?= ($message->seen == 1) ? '<i class="fa fa-envelope-open-o"></i>' : '<i class="fa fa-envelope"></i>'; ?></td>
                                                <td><?= $message->name; ?></td>
                                                <td><?= $message->email; ?></td>
                                                <td><?= $message->mobile; ?></td>
                                                <td><?= $message->subject; ?></td>
                                                <td><?= date('Y-m-d H:i', $message->time); ?></td>
                                                <td>
                                                    <a onclick="contactmsg(<?= $message->id; ?>)" class="btn-sm btn-info" data-toggle="tooltip" title="Show"><i class="fa fa-eye faw text-white"></i></a>
                                                    <a href="<?= base_url('delete/contact/' . $message->id); ?>.html" onclick="return confirm('Are you sure?')" class="btn-sm btn-danger" data-toggle="tooltip" title="Delete"><i class="fa fa-trash faw"></i></a>
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