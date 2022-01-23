<div class="col-md-9">
    <div class="mb-3 bg-light tophideme">
        <?php $this->load->view('external/sidebars/postinfo');?>
    </div>
    <div id="printme" class="blog-post">
        <h2 class="blog-post-title mb-2"><?= $post->title;?></h2>
        <p><?= $post->short_desc;?></p>
        <div class="px-0"><img class="card-img-bottom d-lg-block img-fluid mn-h-250" src="<?= base_url('assets/external/img/posts/'.$post->images);?>" alt="News"></div>
        <p class="blog-post-meta font-italic text-center pt-2"><?= lang('photo');?>: <?= $post->caption;?></p>
        <hr class="py-1">
        <?= $post->description;?>
        <?php if ($post->main_article):?>
            <p class="mt-1"><?= lang('seemore');?> <i class="fa fa-hand-o-right"></i> <a href="<?= $post->main_article;?>" target="_blank" class="font-italic"><?= $post->link_title;?></a></p>
        <?php endif;?>
        <?php if ($post->photo_credit):?>
            <p><?= lang('photo');?>: <span class="font-italic"><?= $post->photo_credit;?></span></p>
        <?php endif;?>
    </div>
    <hr class="pb-2">
    <div class="mb-4 px-3">
        <?php $tagss = explode(',', $post->tags);?>
        <?php foreach ($tagss as $tags): ?>
            <span class="<?= general::badge();?>"><?= $tags;?></span>
        <?php endforeach;?>
        <span class="float-right text-muted"><a onclick="dolike(<?= $post->id;?>)"><i class="fa fa-thumbs-o-up fa-2x animate__animated"></i></a></span>
    </div>
    <?php $this->load->view('external/comments');?>
</div>
<style>.blog-sidebar{margin-top:1rem;}</style>