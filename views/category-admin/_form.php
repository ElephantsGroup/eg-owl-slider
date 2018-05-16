<?php
use elephantsGroup\owlSlider\models\OwlSlideCategory;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\OwlSlideCategory */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="owl-slide-category-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

	<?= $form->field($model, 'status')->dropDownList(OwlSlideCategory::getStatus(), ['prompt' => Yii::t('app', 'Select Status ...')]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('owl-slider', 'Create') : Yii::t('owl-slider', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
