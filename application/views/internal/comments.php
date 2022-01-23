<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Comments &nbsp;&nbsp;<a href="<?= base_url('admin/newpost.html'); ?>"><button type="button" data-toggle="tooltip" title="Mark All Seen" class="btn btn-sm btn-danger">New Post</button></a></h1>
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
                            <h3 class="card-title">All Comments</h3>
                        </div>
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th><i class="fa fa-comments"></i></th>
                                            <th>POST-ID</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Status</th>
                                            <th>Time</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if (count($comments) <= 0): ?>
                                            <tr><td colspan="6"><h3 class="text-danger font-weight-bold text-center"><?= lang('nodata'); ?></h3></td></tr>
                                        <?php endif; ?>
                                        <?php foreach ($comments as $comment): ?>
                                            <tr>
                                                <td><?= ($comment->seen == 1) ? '<i class="fa fa-envelope-open-o"></i>' : '<i class="fa fa-envelope"></i>'; ?></td>
                                                <td>POID<?= $comment->postid; ?></td>
                                                <td><?= $comment->name; ?></td>
                                                <td><?= $comment->email; ?></td>
                                                <td><?= ($comment->active == 1) ? '<span class="badge badgef badge-success">Active</span>' : '<span class="badge badgef badge-danger">Inactive</span>'; ?></td>
                                                <td><?= date('d-m-Y H:i', $comment->time); ?></td>
                                                <td>
                                                    <a onclick="commenttxt(<?= $comment->id; ?>)" class="btn-sm btn-info" data-toggle="tooltip" title="Show"><i class="fa fa-eye faw text-white"></i></a>
                                                    <?php if ($comment->active == 1) : ?>
                                                        <a href="<?= base_url('update/comment/' . $comment->id); ?>.html?key=de" class="btn-sm btn-danger" data-toggle="tooltip" title="Deactivate"><i class="fa fa-close faw"></i></a>
                                                    <?php else: ?>
                                                        <a href="<?= base_url('update/comment/' . $comment->id); ?>.html?key=ac" class="btn-sm btn-success" data-toggle="tooltip" title="Activate"><i class="fa fa-check faw"></i></a>
                                                    <?php endif; ?>
                                                    <a href="<?= base_url('delete/comment/' . $comment->id); ?>.html" onclick="return confirm('Are you sure?')" class="btn-sm btn-danger" data-toggle="tooltip" title="Delete"><i class="fa fa-trash faw"></i></a>
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
<?php $this->load->view('internal/modals/commentbody'); ?>