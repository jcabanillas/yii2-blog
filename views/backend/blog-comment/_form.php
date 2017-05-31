<?php

use yii\helpers\Html;
use jcabanillas\blog\Module;
use yii\widgets\ActiveForm;
use jcabanillas\blog\models\BlogPost;
use \yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model backend\modules\blog\models\BlogComment */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="blog-comment-form">

    <?php $form = ActiveForm::begin([
        'options' => [
            // 'class' => 'form-horizontal',
            'enctype' => 'multipart/form-data'],
        'fieldConfig' => [
            'template' => "{input}{error}",
            // 'labelOptions' => ['class' => 'col-lg-2 control-label'],
        ],
    ]); ?>
    <div class="col-sm-9">
        <div class="portlet light bordered">
            <div class="portlet-title">
                <div class="caption">
                    <span class="caption-subject bold uppercase"> <?= Module::t('blog', 'Author') ?></span>
                </div>
            </div>

            <div class="portlet-body form blog-post-form">
                <?= $form->field($model, 'author')->textInput(['maxlength' => 128]) ?>

                <?= $form->field($model, 'email')->textInput(['maxlength' => 128]) ?>

                <?= $form->field($model, 'url')->textInput(['maxlength' => 128]) ?>
            </div>
        </div>
        <?= $form->field($model, 'content')->textarea(['rows' => 6]) ?>
    </div>
    <div class="col-sm-3">
        <div class="portlet light bordered">
            <div class="portlet-title">
                <div class="caption">
                    <span class="caption-subject bold uppercase"> <?= Module::t('blog', 'Status') ?></span>
                </div>
            </div>
            <div class="portlet-body form blog-post-form">
                <?= $form->field($model, 'status')->dropDownList(\jcabanillas\blog\models\Status::labels()) ?>
                <div class="form-actions">
                    <?= $form->field($model, 'post_id')->hiddenInput() // dropDownList(ArrayHelper::map(BlogPost::find()->all(), 'id', 'title'))    ?>

                    <?= Html::submitButton($model->isNewRecord ? Module::t('blog', 'Create') : Module::t('blog', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>

                </div>
            </div>
        </div>
    </div>
    <?php ActiveForm::end(); ?>

</div>
