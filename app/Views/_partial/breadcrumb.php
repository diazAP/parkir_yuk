<?php
$uri = service('uri');
$segment1 = $uri->getSegment(1);
$segment2 = $uri->getSegment(2);
?>
<header class="page-title-bar">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb bg-white">
            <li class="breadcrumb-item">
                <a href="<?= base_url('home'); ?>"><span class="fa fa-home"></span></a>
            </li>
            <?php if (!empty($segment1)) : ?>
                <?php if (empty($segment2)) : ?>
                    <li class="breadcrumb-item">
                        <a class="text-muted"><?= segment_translate($segment1) ?></a>
                    </li>
                <?php else : ?>
                    <li class="breadcrumb-item">
                        <a href="<?= base_url($segment1); ?>"><?= segment_translate($segment1) ?></a>
                    </li>
                    <li class="breadcrumb-item">
                        <a class="text-muted"><?= segment_translate($segment2) ?></a>
                    </li>
                <?php endif; ?>
            <?php endif; ?>
        </ol>
    </nav>
</header>