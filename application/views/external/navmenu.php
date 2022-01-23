<nav class="navbar navbar-expand-lg navbar-light bg-light py-lg-3 sticky-top border-bottom">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggler" aria-controls="navbarToggler" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
    <div class="collapse navbar-collapse" id="navbarToggler">
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
            <!--<li class="nav-item <?= isset($home['main']) ? $home['main'] : ''; ?>"><a class="p-2 text-muted" href="<?= base_url('article.html'); ?>"><i class="fa fa-home"></i></a></li>-->
            <li class="nav-item <?= isset($press['main']) ? $press['main'] : ''; ?>"><a class="text-muted" href="<?= base_url('article/category/press.html');?>"><?= lang('press'); ?></a></li>
            <li class="nav-item d-none d-lg-block"><a class="text-muted p-1">|</a></li>
            <li class="nav-item <?= isset($pollution['main']) ? $pollution['main'] : ''; ?>"><a class="text-muted" href="<?= base_url('article/category/pollution.html');?>"><?= lang('pollution'); ?></a></li>
            <li class="nav-item d-none d-lg-block"><a class="text-muted p-1">|</a></li>
            <li class="nav-item <?= isset($climate['main']) ? $climate['main'] : ''; ?>"><a class="text-muted" href="<?= base_url('article/category/climate.html');?>"><?= lang('climate'); ?></a></li>
            <li class="nav-item d-none d-lg-block"><a class="text-muted p-1">|</a></li>
            <li class="nav-item <?= isset($wildlife['main']) ? $wildlife['main'] : ''; ?>"><a class="text-muted" href="<?= base_url('article/category/wildlife.html');?>"><?= lang('wildlife'); ?></a></li>
            <li class="nav-item d-none d-lg-block"><a class="text-muted p-1">|</a></li>
            <li class="nav-item <?= isset($economy['main']) ? $economy['main'] : ''; ?>"><a class="text-muted" href="<?= base_url('article/category/economy.html');?>"><?= lang('economy'); ?></a></li>
            <li class="nav-item d-none d-lg-block"><a class="text-muted p-1">|</a></li>
            <li class="nav-item <?= isset($energy['main']) ? $energy['main'] : ''; ?>"><a class="text-muted" href="<?= base_url('article/category/energy.html');?>"><?= lang('energy'); ?></a></li>
            <li class="nav-item d-none d-lg-block"><a class="text-muted p-1">|</a></li>
            <!--<li class="nav-item <?= isset($others['main']) ? $others['main'] : ''; ?>"><a class="text-muted" href="<?= base_url('article/others.html');?>"><?= lang('others'); ?></a></li>-->
            <div class="dropdown bg-light">
                <li class="nav-item dropdown-toggle pointer <?= isset($others['main']) ? $others['main'] : ''; ?>" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><a class="text-muted"><?= lang('others');?></a></li>
                <div class="dropdown-menu dropdown-menu-right p-0">
                    <a href="<?= base_url('article/category/agriculture.html');?>" class="dropdown-item text-muted border-bottom py-1"><?= lang('agriculture'); ?></a>
                    <a href="<?= base_url('article/category/health.html');?>" class="dropdown-item text-muted border-bottom py-1"><?= lang('health'); ?></a>
                    <a href="<?= base_url('article/category/rivers.html');?>" class="dropdown-item text-muted border-bottom py-1"><?= lang('rivers'); ?></a>
                </div>
            </div>
        </ul>
    </div>
</nav>