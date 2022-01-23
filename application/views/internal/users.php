<div class="content-wrapper">
    <?php $this->load->view($header[0]); ?>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card card-secondary">
                        <div class="card-header">
                            <h3 class="card-title"><?= lang('users'); ?></h3>
                            <div class="card-tools">
                                <div class="input-group input-group-sm">
                                    <input type="search" class="form-control float-right" id="usersearch" onkeyup="searchUser($(this).val())" placeholder="<?= lang('search'); ?>" aria-label="Search">
                                    <!--<div class="input-group-append"><button type="button" class="btn btn-default"><i class="fa fa-search"></i></button></div>-->
                                </div>
                            </div>
                        </div>
                        <div class="card-body p-0">
                            <div id="ajaxdata" class="table-responsive">
                                <table class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th><?= lang('photo'); ?></th>
                                            <th><?= lang('name'); ?></th>
                                            <th><?= lang('email'); ?></th>
                                            <th>Mobile</th>
                                            <th><?= lang('status'); ?></th>
                                            <th><?= lang('time'); ?></th>
                                            <th><?= lang('action'); ?></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if (count($users) <= 0): ?>
                                            <tr><td colspan="7"><h3 class="text-danger font-weight-bold text-center"><?= lang('nodata'); ?></h3></td></tr>
                                        <?php endif; ?>
                                        <?php foreach ($users as $user): ?>
                                            <tr>
                                                <td><img class="img-bordered-sm" src="<?= base_url('assets/external/img/users/' . $user->photo); ?>" alt="User" height="28"></td>
                                                <td><?= $user->name; ?></td>
                                                <td><?= $user->email; ?></td>
                                                <td><?= $user->mobile; ?></td>
                                                <td><?= ($user->active == 1) ? '<span class="badge badgef badge-success">Active</span>' : '<span class="badge badgef badge-danger">Inactive</span>'; ?></td>
                                                <td><?= date('d-m-Y H:i', $user->time); ?></td>
                                                <td>
                                                    <a class="btn-sm btn-info" data-toggle="tooltip" title="View"><i class="fa fa-edit text-white faw"></i></a>
                                                    <?php if ($user->active == 1) : ?>
                                                        <a href="<?= base_url('update/user/' . $user->id); ?>.html?key=de" class="btn-sm btn-danger" data-toggle="tooltip" title="Deactivate"><i class="fa fa-close faw"></i></a>
                                                    <?php else: ?>
                                                        <a href="<?= base_url('update/user/' . $user->id); ?>.html?key=ac" class="btn-sm btn-success" data-toggle="tooltip" title="Activate"><i class="fa fa-check faw"></i></a>
                                                    <?php endif; ?>
                                                    <a href="<?= base_url('delete/user/' . $user->id); ?>.html" onclick="return confirm('Are you sure?')" class="btn-sm btn-danger" data-toggle="tooltip" title="Delete"><i class="fa fa-trash faw"></i></a>
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