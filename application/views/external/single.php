<div class="col-md-9">
    <div class="blog-post">
        <h2 class="blog-post-title"><?= $post->title; ?></h2>
        <p class="blog-post-meta text-muted font-italic"><i class="fa fa-calendar-o"></i> <?= converter::times(date("d-m-Y h:i a", $post->time)); ?> <i class="fa fa-user-o"></i> <?= $post->writer; ?></p>
        <?= $post->description; ?>
    </div>
    <div class="mb-4 px-3">
        <?php $tagss = explode(',', $post->tags); ?>
        <?php foreach ($tagss as $tags): ?>
            <span class="<?= general::badge(); ?>"><?= $tags; ?></span>
        <?php endforeach; ?>
    </div>
    <?php #$this->load->view('external/comments'); ?>
</div>
<style>.blog-sidebar{margin-top: 1rem;}</style>