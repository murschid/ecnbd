<div class="mb-4">
    <div class="row bootstrap snippets">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <?php #if ($this->session->userdata('ecnuserauth')):?>
                        <h4 class="font-italic text-center mybg mb-3"><?= lang('docomment'); ?>-</h4>
                        <?php if ($this->session->flashdata('errors')): ?>
                            <div class="alert alert-danger"><?= $this->session->flashdata('errors'); ?></div>
                        <?php endif; ?>
                        <?php if ($this->session->flashdata('success')): ?>
                            <div class="alert alert-success"><?= $this->session->flashdata('success'); ?></div>
                        <?php endif; ?>
                        <?= form_open('article/addcomment'); ?>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <input type="text" name="name" value="<?= ($this->session->userdata('ecnuserauth')) ? $this->session->userdata('ecnuserauth')['name'] : '';?>" class="form-control" required minlength="3" maxlength="30" placeholder="<?= lang('name'); ?>*" data-toggle="tooltip" data-placement="top" title="<?=lang('minmax330');?>">
                            </div>
                            <div class="form-group col-md-6">
                                <input type="email" name="email" value="<?= ($this->session->userdata('ecnuserauth')) ? $this->session->userdata('ecnuserauth')['email'] : '';?>" class="form-control" required minlength="9" maxlength="40" placeholder="<?= lang('email'); ?>*" data-toggle="tooltip" data-placement="top" title="<?=lang('minmax940');?>">
                            </div>
                        </div>
                        <input type="hidden" name="postid" value="<?= $post->id; ?>">
                        <div class="form-group">
                            <textarea class="form-control" name="comment" required minlength="6" maxlength="600" placeholder="<?= lang('comment'); ?>*" data-toggle="tooltip" data-placement="top" title="<?=lang('minmax6600');?>"></textarea>
                        </div>
                        <button type="submit" class="btn btn-sm btn-info float-right"><?= lang('send'); ?></button>
                        <?= form_close(); ?>
                    <?php #else:?>
                        <!--<h4 class="text-center mybg mb-3"><?= lang('forcmnt');?> <span class="underline pointer font-weight-bold" data-toggle="modal" data-target="#loginModal"><?= lang('login');?></span> <?= lang('doit');?></h4>-->
                    <?php #endif;?>
                    <?php if (count($comments) >= 1): ?><div class="clearfix"></div><hr><?php endif; ?>
                    <ul class="list-unstyled">
                        <?php foreach ($comments as $comment): ?>
                            <li class="media">
                                <a class="float-left pr-2"><img src="<?= base_url('assets/external/img/users/'.$comment->photo); ?>" alt="SS" width="50" class="img-thumbnail"></a>
                                <div class="media-body">
                                    <span class="text-muted pull-right font-italic"><small class="text-muted"><i class="fa fa-clock-o"></i><?= converter::times(date("d-m-Y H:i", $comment->time)); ?></small></span>
                                    <strong class="text-dark font-italic"><?= $comment->name; ?></strong>
                                    <p><?= $comment->comment; ?></p>
                                </div>
                            </li>
                            <div class="clearfix"></div><hr>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>