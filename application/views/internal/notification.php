<?php $messages = $this->admin_model->adquery('tb_contacts', NULL, NULL, 'DESC', array('seen' => 0)); ?>
<?php $comments = $this->admin_model->adquery('tb_comments', NULL, NULL, 'DESC', array('seen' => 0)); ?>
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <ul class="navbar-nav">
        <li class="nav-item"><a class="nav-link" data-widget="pushmenu"><i class="fa fa-bars"></i></a></li>
        <li class="nav-item d-none d-sm-inline-block"><a href="<?= base_url(); ?>" target="_blank" class="nav-link">Website</a></li>
    </ul>
    <div class="form-inline ml-3">
        <div class="input-group input-group-sm">
            <input type="search" class="form-control form-control-navbar" placeholder="<?= lang('search'); ?>" aria-label="Search">
            <!--<div class="input-group-append"><button class="btn btn-navbar" type="submit"><i class="fa fa-search"></i></button></div>-->
        </div>
    </div>
    <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown notificajax">
            <a class="nav-link" data-toggle="dropdown"><i class="fa fa-comments"></i><span class="badge badge-danger navbar-badge notification"><?= $msg = count($messages); ?></span></a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right notificheight">
                <?php if (count($messages) <= 0): ?>
                    <a class="dropdown-item">
                        <div class="media">
                            <div class="media-body">
                                <h3 class="dropdown-item-title text-danger text-center">You have no new message</h3>
                            </div>
                        </div>
                    </a>
                <?php endif; ?>
                <?php foreach ($messages as $message): ?>
                    <a onclick="contactmsg(<?= $message->id; ?>)" class="dropdown-item msgcountcls msghide_<?= $message->id; ?>">
                        <div class="media">
                            <img src="<?= base_url('assets/internal/img/admin/user' . rand(1, 8) . '-128x128.jpg'); ?>" alt="Avatar" class="img-size-50 mr-3 img-circle">
                            <div class="media-body">
                                <h3 class="dropdown-item-title"><?= $message->name; ?><span class="float-right text-sm <?= general::color(); ?>"><i class="fa fa-star"></i></span></h3>
                                <p class="text-xs"><?= implode(' ', array_slice(explode(' ', $message->subject), 0, 5)); ?>...</p>
                                <p class="text-xs text-muted"><i class="fa fa-clock mr-1"></i> <?= timespan($message->time, now(), 1); ?> ago</p>
                            </div>
                        </div>
                    </a>
                    <div class="dropdown-divider"></div>
                <?php endforeach; ?>
                <a href="<?= base_url('admin/contact.html'); ?>" class="dropdown-item dropdown-footer"><?= lang('seeallmsg'); ?></a>
            </div>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown"><i class="fa fa-bell"></i><span class="badge badge-warning navbar-badge notificsecondi"><?= ($msg + $cmnt = count($comments)); ?></span></a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <span class="dropdown-header"><span class="notificsecond badge badge-warning rounded-circle"><?= ($msg + $cmnt); ?></span> <?= lang('notifications'); ?></span>
                <div class="dropdown-divider"></div>
                <a href="<?= base_url('admin/comments.html'); ?>" class="dropdown-item"><i class="fa fa-comments mr-2"></i> <span class="newcomment"><?= $cmnt; ?></span> new comments<?php if ($cmnt >= 1): ?><span class="float-right text-muted text-sm"><?= timespan(reset($comments)->time, now(), 1); ?></span><?php endif; ?></a>
                <div class="dropdown-divider"></div>
                <a href="<?= base_url('admin/contact.html'); ?>" class="dropdown-item"><i class="fa fa-envelope mr-2"></i> <span class="newnotification"><?= $msg; ?></span> new messages<?php if ($msg >= 1): ?><span class="float-right text-muted text-sm"><?= timespan(reset($messages)->time, now(), 1); ?></span><?php endif; ?></a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item"><i class="fa fa-users mr-2"></i> 0 new subscriber<span class="float-right text-muted text-sm">&nbsp;</span></a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item dropdown-footer"><?= lang('seeallnoti'); ?></a>
            </div>
        </li>
        <li class="nav-item dropdown">
            <?php if ($this->session->userdata('language') == 'bengali'): ?>
                <a class="nav-link" data-toggle="dropdown"><i class="flag-icon flag-icon-bd"></i></a>
            <?php else: ?>
                <a class="nav-link" data-toggle="dropdown"><i class="flag-icon flag-icon-us"></i></a>
            <?php endif; ?>
            <!--<div class="dropdown-menu dropdown-menu-right p-0">
                <a href="<?= base_url('language/change/english.html'); ?>" class="dropdown-item <?= $this->session->userdata('language') == 'english' ? 'active' : ''; ?>"><i class="flag-icon flag-icon-us mr-2"></i> <?= lang('english'); ?></a>
                <a href="<?= base_url('language/change/bengali.html'); ?>" class="dropdown-item <?= $this->session->userdata('language') == 'bengali' ? 'active' : ''; ?>"><i class="flag-icon flag-icon-bd mr-2"></i> <?= lang('bengali'); ?></a>
            </div>-->
        </li>
        <li class="nav-item"><a class="nav-link" data-widget="control-sidebar" data-slide="true"><i class="fa fa-th-large"></i></a></li>
    </ul>
</nav>
<?php $this->load->view('internal/modals/notificbody'); ?>