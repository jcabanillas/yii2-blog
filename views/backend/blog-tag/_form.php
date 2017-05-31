<?php

use yii\helpers\Html;
use jcabanillas\blog\Module;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\modules\blog\models\BlogTag */
/* @var $form yii\widgets\ActiveForm */
$this->title = Module::t('blog', 'Create ') . Module::t('blog', 'Blog Tag');

?>
<?php

$this->registerJs(
    '$("document").ready(function(){ 
        $("#new_tag").on("pjax:end", function() {
            $.pjax.reload({container:"#etiquetas"});  //Reload GridView
        });
    });'
);
?>
<div class="blog-tag-form">

    <?php yii\widgets\Pjax::begin(['id' => 'new_tag']) ?>
    <?php $form = ActiveForm::begin([
        'options' => ['data-pjax' => true],
        'fieldConfig' => [
            'template' => "{input}{error}",
        ],
    ]); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => 128, 'placeholder' => 'Nombre']) ?>

    <?= $form->field($model, 'frequency')->hiddenInput() // textInput(['maxlength' => 10])  ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Module::t('blog', 'Create') : Module::t('blog', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>
    <?php yii\widgets\Pjax::end() ?>

</div>
