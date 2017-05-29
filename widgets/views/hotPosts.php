<?php
use yii\helpers\Html;

?>
<div class="c-content-ver-nav">
    <div class="c-content-title-1 c-theme c-title-md c-margin-t-40">
        <h3 class="c-font-bold c-font-uppercase"><?= $title ?></h3>
        <div class="c-line-left c-theme-bg"></div>
    </div>
    <ul class="c-content-recent-posts-1">
        <?php foreach ($posts as $post): ?>
            <li>
                <div class="c-image">
                    <img src="<?= '/' . $post->banner ?>" alt="" class="img-responsive"></div>
                <div class="c-post">
                    <?php echo Html::a(Html::encode($post->title), $post->getUrl()); ?>
                </div>
            </li>
        <?php endforeach; ?>

    </ul>
</div>