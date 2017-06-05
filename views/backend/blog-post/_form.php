<?php

use yii\helpers\Html;
use jcabanillas\blog\Module;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use jcabanillas\blog\models\BlogCatalog;
use kartik\markdown\MarkdownEditor;
use mihaildev\ckeditor\CKEditor;

/* @var $this yii\web\View */
/* @var $model backend\modules\blog\models\BlogPost */
/* @var $form yii\widgets\ActiveForm */
?>
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
    <?= $form->field($model, 'title')->textInput(['maxlength' => 128, 'placeholder' => Module::t('blog', 'Title')]) ?>

    <?php // $form->field($model, 'surname')->textInput(['maxlength' => 128, 'placeholder' => Module::t('blog', 'Surname')]) ?>

    <?= $form->field($model, 'brief')->textarea(['rows' => 6, 'placeholder' => Module::t('blog', 'Brief')]) ?>

    <?= $form->field($model, 'content')->widget(\yii\redactor\widgets\Redactor::className(),
        [
            'clientOptions' => [
                'imageUpload' => \yii\helpers\Url::to(['/redactor/upload/image']),
            ],
        ]
    ) ?>

</div>
<div class="col-sm-3">
    <div class="portlet light bordered">
        <div class="portlet-title">
            <div class="caption">
                <span class="caption-subject bold uppercase"> <?= Module::t('blog', 'Status') ?></span>
            </div>
        </div>

        <div class="portlet-body form blog-post-form">
            <?= $form->field($model, 'status')->dropDownList(\jcabanillas\blog\models\Status::labels(), ['placeholder' => Module::t('blog', 'Status')]) ?>

            <?= $form->field($model, 'click')->hiddenInput()// textInput(['placeholder' => Module::t('blog', 'Click')])   ?>

            <div class="form-actions">
                <?= Html::submitButton($model->isNewRecord ? Module::t('blog', 'Create') : Module::t('blog', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>

            </div>
        </div>
    </div>
    <div class="portlet light bordered">
        <div class="portlet-title">
            <div class="caption">
                <span class="caption-subject bold uppercase"> <?= Module::t('blog', 'Catalog ID') ?></span>
            </div>
        </div>

        <div class="portlet-body form blog-post-form">


            <?= $form->field($model, 'catalog_id')->dropDownList(ArrayHelper::map(BlogCatalog::get(0, BlogCatalog::find()->all()), 'id', 'str_label')) ?>
        </div>
    </div>
    <div class="portlet light bordered">
        <div class="portlet-title">
            <div class="caption">
                <span class="caption-subject bold uppercase"> <?= Module::t('blog', 'Tags') ?></span>
            </div>
        </div>

        <div class="portlet-body form blog-post-form">
            <?= $form->field($model, 'tags')->textInput(['maxlength' => 128, 'placeholder' => Module::t('blog', 'Tags')]) ?>
        </div>
    </div>
    <div class="portlet light bordered">
        <div class="portlet-title">
            <div class="caption">
                <span class="caption-subject bold uppercase"> <?= Module::t('blog', 'Banner') ?></span>
            </div>
        </div>

        <div class="portlet-body form blog-post-form">
            <?= $form->field($model, 'banner')->fileInput(['placeholder' => Module::t('blog', 'Banner')]) ?>
        </div>
    </div>
</div>

<?php ActiveForm::end(); ?>

