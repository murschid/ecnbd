<div class="col-md-5">
    <div class="card">
        <div class="card-header border-transparent">
            <h3 class="card-title">Comments</h3>
            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fa fa-times"></i></button>
            </div>
        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table m-0">
                    <thead>
                    <tr>
                        <th>Post ID</th>
                        <th>Name</th>
                        <th>Status</th>
                        <th>Time</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($comments as $comment): ?>
                        <tr>
                            <td><?= $comment->postid; ?></td>
                            <td><?= $comment->name; ?></td>
                            <?php if ($comment->active == 0): ?>
                                <td><span class="badge badge-danger badges">Inactive</span></td>
                            <?php else: ?>
                                <td><span class="badge badge-success badges">Active</span></td>
                            <?php endif; ?>
                            <td><?= date("d-m-Y H:i", $comment->time); ?></td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card-footer clearfix">
            <a href="<?= base_url('admin/newpost.html'); ?>" class="btn btn-sm btn-danger float-right text-white">New Post</a>
            <a href="<?= base_url('admin/comments.html'); ?>" class="btn btn-sm btn-info float-left text-white">All Comments</a>
        </div>
    </div>
</div>