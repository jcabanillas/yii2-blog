<?php

use yii\helpers\Html;
use jcabanillas\blog\Module;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel backend\modules\blog\models\BlogTagSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Module::t('blog', 'Blog Tags');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="blog-tag-index">

    <div class="col-sm-4">
        <?= $this->render('_form', [
            'model' => $model,
        ]) ?>
    </div>
    <div class="col-sm-8">
        <?php Pjax::begin(['id' => 'etiquetas']) ?>
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                ['class' => 'yii\grid\CheckboxColumn'],

                'id',
                'name',
                'frequency',

                ['class' => 'yii\grid\ActionColumn'],
            ],
        ]); ?>
        <?php Pjax::end() ?>
    </div>

</div>
