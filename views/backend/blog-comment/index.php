<?php

use yii\helpers\Html;
use jcabanillas\blog\Module;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;
use jcabanillas\blog\models\Status;

/* @var $this yii\web\View */
/* @var $searchModel backend\modules\blog\models\BlogCommentSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Module::t('blog', 'Blog Comments');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="blog-comment-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Module::t('blog', 'Create ') . Module::t('blog', 'Blog Comment'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'tableOptions' => [
            'class' => 'table table-striped table-bordered table-hover table-checkable dataTable no-footer',
        ],
        'headerRowOptions' => [
            'role' => "row",
            'class' => 'heading',
        ],
        'filterRowOptions' => [
            'role' => "row",
            'class' => 'filter',
        ],
        'columns' => [
            ['class' => 'yii\grid\CheckboxColumn'],

            [
                'attribute' => 'post_id',
                'format' => 'raw',
                'value' => function ($model) {
                    return Html::a(mb_substr($model->post->title, 0, 15, 'utf-8') . '...', ['/blog/blog-post/update', 'id' => $model->post->id]);
                },
                'filter' => Html::activeDropDownList(
                    $searchModel,
                    'post_id',
                    \jcabanillas\blog\models\BlogComment::getArrayPost(),
                    ['class' => 'form-control', 'prompt' => Module::t('blog', 'Please Filter')]
                )
            ],
            [
                'attribute' => 'content',
                'format' => 'raw',
                'value' => function ($model) {
                    return Html::a(mb_substr(Yii::$app->formatter->asText($model->content), 0, 30, 'utf-8') . '...', ['update', 'id' => $model->id]);
                },
            ],
            'author',
            'email:email',
            // 'url:url',
            [
                'attribute' => 'status',
                'format' => 'html',
                'value' => function ($model) {
                    if ($model->status === Status::STATUS_ACTIVE) {
                        $class = 'label-success';
                    } elseif ($model->status === Status::STATUS_INACTIVE) {
                        $class = 'label-warning';
                    } else {
                        $class = 'label-danger';
                    }

                    return '<span class="label ' . $class . '">' . $model->getStatus()->label . '</span>';
                },
                'filter' => Html::activeDropDownList(
                    $searchModel,
                    'status',
                    Status::labels(),
                    ['class' => 'form-control', 'prompt' => Module::t('blog', 'PROMPT_STATUS')]
                )
            ],

            // 'create_time',
            // 'update_time',

            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{delete}',
            ],
        ],
    ]); ?>

</div>
