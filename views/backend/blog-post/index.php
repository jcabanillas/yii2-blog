<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;
use jcabanillas\blog\Module;
use jcabanillas\blog\models\Status;

/* @var $this yii\web\View */
/* @var $searchModel backend\modules\blog\models\BlogPostSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Module::t('blog', 'Blog Posts');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="blog-post-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Module::t('blog', 'Create ') . Module::t('blog', 'Blog Post'), ['create'], ['class' => 'btn btn-success']) ?>
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
                'attribute' => 'catalog_id',
                'value' => function ($model) {
                    return $model->catalog->title;
                },
                'filter' => Html::activeDropDownList(
                    $searchModel,
                    'catalog_id',
                    \jcabanillas\blog\models\BlogPost::getArrayCatalog(),
                    ['class' => 'form-control', 'prompt' => Module::t('blog', 'Please Filter')]
                )
            ],
            [
                'attribute' => 'title',
                'format' => 'raw',
                'value' => function ($model) {
                    return Html::a($model->title, ['update', 'id' => $model->id]);
                },
            ],
            // 'content:ntext',
            // 'tags',
            // 'surname',
            // 'click',
            // 'user_id',
            'commentsCount',
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
            'created_at:date',
            // 'update_time',

            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{delete}',
            ],
        ],
    ]); ?>

</div>
