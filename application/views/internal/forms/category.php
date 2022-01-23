<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Category Entry</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url('admin/dashboard.html'); ?>">Admin</a></li>
                        <li class="breadcrumb-item active">Category</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="container-fluid">
            <?php if ($this->session->flashdata('errors')): ?>
                <div class="alert alert-danger"><?= $this->session->flashdata('errors'); ?></div>
            <?php endif; ?>
            <?php if ($this->session->flashdata('success')): ?>
                <div class="alert alert-success"><?= $this->session->flashdata('success'); ?></div>
            <?php endif; ?>
            <div class="row">
                <div class="col-lg-12">
                    <div class="card card-info">
                        <div class="card-header">
                            <h3 class="card-title">All Categories</h3>
                        </div>
                        <div class="card-body mycards">
                            <?= form_open('action/addcategory') ?>
                            <div class="form-group row">
                                <div class="col-lg">
                                    <label>Bengali <span class="text-red">*</span></label>
                                    <input type="text" name="bcategory" class="form-control" required="" minlength="3" maxlength="100" placeholder="বিজ্ঞান">
                                </div>
                                <div class="col-lg">
                                    <label>English <span class="text-red">*</span></label>
                                    <input type="text" name="ecategory" class="form-control" required="" minlength="3" maxlength="100" placeholder="Science">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary float-right">Submit</button>
                            <?= form_close(); ?>
                        </div>
                        <div class="card card-secondary">
                            <div class="card-header">
                                <h3 class="card-title">All Categories</h3>
                            </div>
                            <div class="card-body p-0">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped">
                                        <thead>
                                        <tr>
                                            <th>SL</th>
                                            <th>Bengali</th>
                                            <th>English</th>
                                            <th>Moderator</th>
                                            <th>Time</th>
                                            <th>Actions</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php $id = 1; ?>
                                        <?php if (count($categories) <= 0): ?>
                                            <tr>
                                                <td colspan="8"><h3 class="text-danger font-weight-bold text-center">No Categories Are Available</h3></td>
                                            </tr>
                                        <?php endif; ?>
                                        <?php foreach ($categories as $category): ?>
                                            <tr>
                                                <td><?= $id++; ?></td>
                                                <td><?= $category->category; ?></td>
                                                <td><?= $category->english; ?></td>
                                                <td><?= $category->moderator; ?></td>
                                                <td><?= date('d-m-Y h:i a', $category->time); ?></td>
                                                <td>
                                                    <a class="btn-sm btn-info" data-toggle="tooltip" title="View"><i class="fa fa-edit faw text-white"></i></a>
                                                    <a href="<?= base_url('delete/category/' . $category->id); ?>.html" onclick="return confirm('Are you sure?')" class="btn-sm btn-danger" data-toggle="tooltip" title="Delete"><i class="fa fa-trash faw"></i></a>
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
        </div>
    </section>
</div>
