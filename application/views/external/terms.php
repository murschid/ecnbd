<div class="col-md-9">
    <div class="jumbotron rounded">
        <div class="row">
            <div class="col">
                <div class="text-center">
                    <h3 class="pb-2"><?=lang('cmnt_terms'); ?></h3>
                    <hr class="m-0">
                </div>
                <div class="text-left mt-3">
                    <p class="px-4">এনভায়রনমেন্ট কনজারভেশন নেটওয়ার্ক (ই.সি.এন) তার প্রতিটি রচনায় পাঠকের মতামত জানতে আগ্রহী। তাই অনলাইনে পাঠক মন্তব্যেও সবিশেষ গুরুত্ব দিয়ে থাকে। পাঠক মন্তব্য যত্নের সঙ্গে, তাৎক্ষণিকভাবে প্রকাশ করা হয়।</p>
                    <ul>
                        <?= general::single('tb_general', 'title', 'comment', 'content'); ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>