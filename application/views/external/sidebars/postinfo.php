<div class="p-3">
    <h5 class="text-dark"><?= $post->writer;?></h5>
    <hr class="my-1">
    <p class="text-muted mb-0"><?=lang('published');?>: <?= converter::times(date('d ', $post->time)).converter::months(date('F ', $post->time)).converter::times(date('Y, H:i', $post->time));?></p>
    <p class="text-muted mb-0"><?=lang('updated');?>: <?= converter::times(date('d ', $post->updated)).converter::months(date('F ', $post->updated)).converter::times(date('Y, H:i', $post->updated));?></p>
    <p class="text-muted mb-0"><i class="fa fa-comment-o"></i><?= converter::times($post->comments);?> <i class="fa fa-eye"></i><?= converter::times($post->clicks);?> <i class="fa fa-share-alt"></i><?= converter::times($post->share);?> <i class="fa fa-thumbs-o-up"></i><?= converter::times($post->likes);?></p>
    <span class="mr-2 text-muted h4"><?=lang('share');?>:</span>
    <a class="mr-2 facebook" for="<?= $post->id;?>" target="_blank"><img src="<?= base_url('assets/external/img/icons/facebook.png');?>" height="20"></a>
    <a class="mr-2 whatsapp" for="<?= $post->id;?>" target="_blank"><img src="<?= base_url('assets/external/img/icons/whatsapp.png');?>" height="20"></a>
    <a class="mr-2 twitter" for="<?= $post->id;?>" target="_blank"><img src="<?= base_url('assets/external/img/icons/twiter.png');?>" height="20"></a>
    <a class="mr-2 doprint" for="<?= $post->id;?>" target="_blank"><img src="<?= base_url('assets/external/img/icons/print.png');?>" height="20"></a>
    <!--<a onclick="generatePDF()" class="mr-2"><img src="<?= base_url('assets/external/img/icons/pdf.png');?>" height="20"></a>-->
</div>