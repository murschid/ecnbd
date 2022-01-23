<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Posts &nbsp;&nbsp;<a href="<?= base_url('admin/newpost.html');?>"><button type="button" data-toggle="tooltip" title="Mark All Seen" class="btn btn-sm btn-danger">New Post</button></a></h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url('admin/dashboard.html');?>"><?= lang('admin');?></a></li>
                        <li class="breadcrumb-item active"><?= lang('moderators');?></li>
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
                            <h3 class="card-title">All Posts</h3>
                        </div>
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Thumbnail</th>
                                            <th>Title</th>
                                            <th>Category</th>
                                            <th>Status</th>
                                            <th>Time</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if (count($posts) <= 0): ?>
                                            <tr><td colspan="6"><h3 class="text-danger font-weight-bold text-center"><?= lang('nodata');?></h3></td></tr>
                                        <?php endif; ?>
                                        <?php foreach ($posts as $post): ?>
                                            <tr>
                                                <td><img class="img-bordered-sm" src="<?= base_url('assets/external/img/thumbnails/'.$post->thumbnail);?>" alt="Mod" width="40" height="30"></td>
                                                <td><?= $post->title; ?></td>
                                                <td><?= ucfirst($post->category); ?></td>
                                                <td><?= ($post->active == 1) ? '<span class="badge badgef badge-success">Active</span>' : '<span class="badge badgef badge-danger">Inactive</span>';?></td>
                                                <td><?= date('d-m-Y H:i', $post->time);?></td>
                                                <td>
                                                    <a href="<?= base_url('eshow/post/'.$post->id);?>.html" class="btn-sm btn-info" data-toggle="tooltip" title="Edit"><i class="fa fa-edit faw"></i></a>
                                                    <?php if ($post->active == 1) : ?>
                                                        <a href="<?= base_url('update/post/'.$post->id);?>.html?key=de" class="btn-sm btn-danger" data-toggle="tooltip" title="Deactivate"><i class="fa fa-close faw"></i></a>
                                                    <?php else: ?>
                                                        <a href="<?= base_url('update/post/'.$post->id);?>.html?key=ac" class="btn-sm btn-success" data-toggle="tooltip" title="Activate"><i class="fa fa-check faw"></i></a>
                                                    <?php endif; ?>
                                                    <a href="<?= base_url('delete/post/'.$post->id);?>.html" onclick="return confirm('Are you sure?')" class="btn-sm btn-danger" data-toggle="tooltip" title="Delete"><i class="fa fa-trash faw"></i></a>
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