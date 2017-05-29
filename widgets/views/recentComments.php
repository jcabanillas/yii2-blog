<?php
use yii\helpers\Html;
?>

<div class="c-content-ver-nav">
    <div class="c-content-title-1 c-theme c-title-md c-margin-t-40">
        <h3 class="c-font-bold c-font-uppercase"><?= $title ?></h3>
        <div class="c-line-left c-theme-bg"></div>
    </div>
    <ul class="c-menu c-arrow-dot c-theme">
        <?php foreach($comments as $comment): ?>
            <li><strong><?php echo $comment->authorLink; ?></strong> Comentado
                <?php echo Html::a(Html::encode($comment->post->title), $comment->getUrl()); ?>
            </li>
        <?php endforeach; ?>
    </ul>
</div>