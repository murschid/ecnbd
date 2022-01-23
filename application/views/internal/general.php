<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">General Update</h1>
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
                    <div class="card card-secondary">
                        <div class="card-header">
                            <h3 class="card-title">All General</h3>
                        </div>
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th>SL</th>
                                        <th>Section</th>
                                        <th>Content</th>
                                        <th>Time</th>
                                        <th>Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php if (count($generals) <= 0): ?>
                                        <tr><td colspan="4"><h3 class="text-danger font-weight-bold text-center"><?= lang('nodata');?></h3></td></tr>
                                    <?php endif; ?>
                                    <?php foreach ($generals as $general): ?>
                                        <tr>
                                            <td><?= $general->id; ?></td>
                                            <td><?= ucfirst($general->title);?></td>
                                            <td class="mb-0"><?= explode('।', $general->content)[0];?></td>
                                            <td><?= date('d-m-Y H:i', $general->time);?></td>
                                            <td>
                                                <a onclick="generalupdate(<?= $general->id;?>)" class="btn-sm btn-info" data-toggle="tooltip" title="Edit"><i class="fa fa-edit faw text-white"></i></a>
                                                <a class="btn-sm btn-danger" data-toggle="tooltip" title="Delete"><i class="fa fa-trash faw text-white"></i></a>
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
<?php $this->load->view('internal/modals/generalbody'); ?>