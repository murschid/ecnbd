<?php if ($this->session->flashdata('successtoast')): ?>
    <div class="mytoast" aria-live="polite" aria-atomic="true">
        <div class="toast bg-success successtoast" data-autohide="true">
            <div class="toast-header">
                <i class="fa fa-bell"></i>&nbsp;<strong class="mr-auto">Notification</strong>
                <small>Moments ago</small>
                <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="toast-body"><?= $this->session->flashdata('successtoast'); ?></div>
        </div>
    </div>
<?php elseif ($this->session->flashdata('errorstoast')) : ?>
    <div class="mytoast" aria-live="polite" aria-atomic="true">
        <div class="toast bg-danger errorstoast" data-autohide="true">
            <div class="toast-header">
                <i class="fa fa-bell"></i>&nbsp;<strong class="mr-auto">Notification</strong>
                <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="toast-body"><?= $this->session->flashdata('errorstoast'); ?></div>
        </div>
    </div>
<?php endif; ?>