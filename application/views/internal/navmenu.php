<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="<?= base_url('admin/dashboard.html'); ?>" class="brand-link">
        <img src="<?= base_url('assets/internal/img/AdminLTELogo.png') ?>" alt="Logo" class="brand-image img-circle elevation-3"><span class="brand-text font-weight-light">AdminR</span>
    </a>
    <div class="sidebar">
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="<?= base_url('assets/internal/img/admin/' . $this->session->userdata('coadminauth')['photo']); ?>" class="img-circle elevation-2" alt="User">
            </div>
            <div class="info">
                <a href="<?= base_url('admin/myprofile.html'); ?>" class="d-block font-weight-bold"><?= $this->session->userdata('coadminauth')['name']; ?></a>
            </div>
        </div>
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item"><a href="<?= base_url('admin/dashboard.html'); ?>" class="nav-link  <?= isset($dashcls['main']) ? $dashcls['main'] : ''; ?>"><i class="nav-icon fa fa-tachometer"></i><p><?= lang('dashboard'); ?></p></a></li>
                <li class="nav-item has-treeview <?= isset($postcls['open']) ? $postcls['open'] : ''; ?>">
                    <a class="nav-link <?= isset($postcls['main']) ? $postcls['main'] : ''; ?>"><i class="nav-icon fa fa-newspaper-o"></i><p>News<i class="right fa fa-angle-left"></i></p></a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item"><a href="<?= base_url('admin/newpost.html'); ?>" class="nav-link  <?= isset($postcls['third']) ? $postcls['third'] : ''; ?>"><i class="nav-icon fa fa-newspaper-o"></i><p>Add New</p></a></li>
                        <li class="nav-item"><a href="<?= base_url('admin/posts.html'); ?>" class="nav-link  <?= isset($postcls['first']) ? $postcls['first'] : ''; ?>"><i class="nav-icon fa fa-newspaper-o"></i><p>All News</p></a></li>
                        <li class="nav-item"><a href="<?= base_url('admin/breaking.html'); ?>" class="nav-link <?= isset($postcls['second']) ? $postcls['second'] : ''; ?>"><i class="fa fa-window-close nav-icon"></i><p>Breaking</p></a></li>
                    </ul>
                </li>

                <li class="nav-item"><a href="<?= base_url('admin/comments.html'); ?>" class="nav-link  <?= isset($cmntcls['main']) ? $cmntcls['main'] : ''; ?>"><i class="nav-icon fa fa-comments"></i><p>Comments<span class="right badge badge-danger"><?= mycrypt::totalcount('tb_comments', array('seen' => 0)) ?></span></p></a></li>
                <li class="nav-item"><a href="<?= base_url('admin/advertise.html'); ?>" class="nav-link  <?= isset($adscls['main']) ? $adscls['main'] : ''; ?>"><i class="nav-icon fa fa-th"></i><p>Advertise</p></a></li>
                <li class="nav-item"><a href="<?= base_url('admin/general.html'); ?>" class="nav-link  <?= isset($gnrlcls['main']) ? $gnrlcls['main'] : ''; ?>"><i class="nav-icon fa fa-th"></i><p>General</p></a></li>
                <li class="nav-item has-treeview <?= isset($modcls['open']) ? $modcls['open'] : ''; ?>">
                    <a class="nav-link <?= isset($modcls['main']) ? $modcls['main'] : ''; ?>"><i class="nav-icon fa fa-users"></i><p><?= lang('users'); ?><i class="right fa fa-angle-left"></i></p></a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item"><a href="<?= base_url('admin/moderators.html'); ?>" class="nav-link <?= isset($modcls['first']) ? $modcls['first'] : ''; ?>"><i class="fa fa-user-secret nav-icon"></i><p><?= lang('moderators'); ?></p></a></li>
                        <li class="nav-item"><a href="<?= base_url('admin/users.html'); ?>" class="nav-link <?= isset($modcls['second']) ? $modcls['second'] : ''; ?>"><i class="fa fa-user nav-icon"></i><p><?= lang('users'); ?></p></a></li>
                    </ul>
                </li>
                <li class="nav-item has-treeview <?= isset($mailcls['open']) ? $mailcls['open'] : ''; ?>">
                    <a class="nav-link <?= isset($mailcls['main']) ? $mailcls['main'] : ''; ?>"><i class="nav-icon fa fa-th"></i><p><?= lang('email'); ?><i class="right fa fa-angle-left"></i></p></a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item"><a href="<?= base_url('admin/mailing.html'); ?>" class="nav-link <?= isset($mailcls['first']) ? $mailcls['first'] : ''; ?>"><i class="fa fa-pencil-square nav-icon"></i><p><?= lang('compose'); ?></p></a></li>
                        <li class="nav-item"><a href="<?= base_url('admin/sentitem.html'); ?>" class="nav-link <?= isset($mailcls['second']) ? $mailcls['second'] : ''; ?>"><i class="fa fa-envelope nav-icon"></i><p><?= lang('sent'); ?></p></a></li>
                    </ul>
                </li>
                <li class="nav-item has-treeview <?= isset($msgcls['open']) ? $msgcls['open'] : ''; ?>">
                    <a class="nav-link <?= isset($msgcls['main']) ? $msgcls['main'] : ''; ?>"><i class="nav-icon fa fa-th"></i><p><?= lang('messages'); ?><i class="right fa fa-angle-left"></i></p></a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item"><a href="<?= base_url('admin/contact.html'); ?>" class="nav-link <?= isset($msgcls['first']) ? $msgcls['first'] : ''; ?>"><i class="fa fa-envelope nav-icon"></i><p><?= lang('contact'); ?><span class="right badge badge-danger"><?= mycrypt::totalcount('tb_contacts', array('seen' => 0)) ?></span></p></a></li>
                    </ul>
                </li>
                <li class="nav-item"><a href="<?= base_url('admin/category.html'); ?>" class="nav-link  <?= isset($catcls['main']) ? $catcls['main'] : ''; ?>"><i class="nav-icon fa fa-th"></i><p>Categories</p></a></li>
                <li class="nav-header text-bold">COMMON-</li>
                <li class="nav-item"><a href="<?= base_url('admin/visitors.html'); ?>" class="nav-link <?= isset($visitorcls) ? $visitorcls : ''; ?>"><i class="nav-icon fa fa-users"></i><p><?= lang('visitors'); ?></p></a></li>
                <?php if ($this->session->userdata('coadminauth')['role'] == 'admin') : ?>
                    <li class="nav-item"><a href="<?= base_url('admin/logs.html'); ?>" class="nav-link <?= isset($logscls['main']) ? $logscls['main'] : ''; ?>"><i class="nav-icon fa fa-history"></i><p><?= lang('logs'); ?></p></a></li>
                <?php endif; ?>
                <li class="nav-item"><a href="<?= base_url('admin/dltcache.html'); ?>" class="nav-link <?= isset($cachecls) ? $cachecls : ''; ?>"><i class="nav-icon fa fa-trash"></i><p><?= lang('dltcache'); ?></p></a></li>
                <li class="nav-item"><a href="<?= base_url('admin/signout.html'); ?>" class="nav-link"><i class="nav-icon fa fa-sign-out text-danger"></i><p><?= lang('logout'); ?></p></a></li>
            </ul>
        </nav>
    </div>
</aside>