<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">News Post</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url('admin/dashboard.html'); ?>">Admin</a></li>
                        <li class="breadcrumb-item active">Update News</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <?php if ($this->session->flashdata('errors')): ?>
                        <div class="alert alert-danger"><?= $this->session->flashdata('errors'); ?></div>
                    <?php endif; ?>
                    <?php if ($this->session->flashdata('success')): ?>
                        <div class="alert alert-success"><?= $this->session->flashdata('success'); ?></div>
                    <?php endif; ?>
                    <div class="card card-secondary">
                        <div class="card-header">
                            <h3 class="card-title">News Update</h3>
                        </div>
                        <?= form_open_multipart('action/update_post'); ?>
                        <div class="card-body">
                            <div class="form-row">
                                <div class="col-lg">
                                    <div class="form-group">
                                        <label>Title <span class="text-danger">*</span></label>
                                        <input type="text" name="title" value="<?= $post->title; ?>" class="form-control" placeholder="This is news title." required minlength="6" maxlength="200">
                                    </div>
                                </div>
                            </div>
                            <input type="hidden" name="postid" value="<?= $post->id; ?>">
                            <div class="form-row">
                                <div class="col-lg">
                                    <div class="form-group">
                                        <label>Short Description <span class="text-danger">*</span></label>
                                        <textarea type="text" name="shortdesc" class="form-control" minlength="10" maxlength="350"><?= $post->short_desc; ?></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-lg">
                                    <div class="form-group">
                                        <label>Detail News <span class="text-danger">*</span></label>
                                        <textarea type="text" id="mainnews" name="description" class="form-control textarealg mainnews" required minlength="100"><?= $post->description; ?></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label>Writer Name <span class="text-danger">*</span></label>
                                        <input type="text" name="writer" value="<?= $post->writer; ?>" class="form-control" required placeholder="Larry Page" minlength="3" maxlength="140">
                                    </div>
                                </div>
                                <div class="col-lg-2">
                                    <div class="form-group">
                                        <label>Category <span class="text-danger">*</span></label>
                                        <select name="category" class="form-control" required>
                                            <?php foreach ($categories as $category): ?>
                                                <?php if ($category->english == $post->category): ?>
                                                    <option value="<?= $category->english; ?>" selected><?= $category->category; ?></option>
                                                <?php else: ?>
                                                    <option value="<?= $category->english; ?>"><?= $category->category; ?></option>
                                                <?php endif; ?>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-2">
                                    <div class="form-group">
                                        <label>Language <span class="text-danger">*</span></label>
                                        <select name="language" class="form-control" required>
                                            <?php if ($post->language == 'bengali'): ?>
                                                <option value="bengali" selected>Bengali</option>
                                                <option value="english">English</option>
                                            <?php else: ?>
                                                <option value="english" selected>English</option>
                                                <option value="bengali">Bengali</option>
                                            <?php endif; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label>Tags <span class="text-danger"> *[use comma to separate]</span></label>
                                        <input type="text" name="tags" value="<?= $post->tags; ?>" class="form-control" required placeholder="PHP, Java, C++" minlength="3" maxlength="140">
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label>Photo Caption <span class="text-danger">*</span></label>
                                        <input type="text" name="caption" value="<?= $post->caption; ?>" class="form-control" required placeholder="Photo caption" minlength="3" maxlength="140">
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label>Thumbnail <span class="text-danger">[4:3 small]</span></label>
                                        <input type="file" name="thumbnail" class="form-control" id="inputThumb">
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label>Photo <span class="text-danger">[16:9 medium]</span></label>
                                        <input type="file" name="photo" class="form-control" id="inputPhoto">
                                    </div>
                                </div>
                                <div class="col-lg-1">
                                    <div class="form-group">
                                        <label>Selected</label>
                                        <select name="selected" class="form-control" required>
                                            <option value="0" <?= $post->selected == 0 ? 'selected' : ''; ?>>No</option>
                                            <option value="1"<?= $post->selected == 1 ? 'selected' : ''; ?>>Yes</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-1">
                                    <div class="form-group">
                                        <label>Make Pinned</label>
                                        <select name="intro" class="form-control" required>
                                            <option value="0" <?= $post->intro == 0 ? 'selected' : ''; ?>>No</option>
                                            <option value="1"<?= $post->intro == 1 ? 'selected' : ''; ?>>Yes</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label>Photo Credit</label>
                                        <input type="text" name="photocredit" value="<?= $post->photo_credit; ?>" class="form-control" placeholder="Photo Credit">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label>Main Article Title</label>
                                        <input type="text" name="linktitle" value="<?= $post->link_title; ?>" class="form-control" placeholder="Link">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label>Main Article Link</label>
                                        <input type="text" name="mainlink" value="<?= $post->main_article; ?>" class="form-control" placeholder="Link">
                                    </div>
                                </div>
                            </div>
                            <div class="float-right">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </div>
                        <?= form_close(); ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>