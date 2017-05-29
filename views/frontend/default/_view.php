<?php
use yii\helpers\Html;
use yii\helpers\StringHelper;
?>


<div class="post">
    <div class="title">
        <?= Html::a(Html::encode($data->title), $data->url); ?>
    </div>
    <div class="nav">
        <i class="icon-date"></i><?= Yii::$app->formatter->asDate($data->created_at); ?>
        <i class="icon-edit"></i><?= 'Por ' . $data->user->username; ?>
        <i class="icon-cat"></i><?= '<a href="'. Yii::$app->getUrlManager()->createUrl(['/post/catalog/','id'=>$data->catalog->id]) .'">' . $data->catalog->title . '</a>'; ?>
        <i class="icon-comment"></i><?= Html::a("{$data->commentsCount} comentarios de artículo", $data->url.'#comments'); ?>
        <i class="icon-smiley"></i>Le&iacute;do <?= $data->click; ?> veces
        <i class="icon-views"></i><?= implode(' ', $data->tagLinks); ?>
    </div>
    <div class="content">
        <?php
        $parser = new \cebe\markdown\GithubMarkdown();
        echo $parser->parse($data->content);
        ?>
    </div>
</div>