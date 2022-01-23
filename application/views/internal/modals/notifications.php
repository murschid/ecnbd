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
                <p class="text-xs text-muted"><i class="fa fa-clock mr-1"></i> <?= timespan($message->time, now(), 1); ?></p>
            </div>
        </div>
    </a>
    <div class="dropdown-divider"></div>
<?php endforeach; ?>
<a href="<?= base_url('admin/contact.html'); ?>" class="dropdown-item dropdown-footer">See All Messages</a>