<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use elephantsGroup\owlSlider\models\OwlSlide;
use elephantsGroup\owlSlider\models\OwlSlideCategory;

/* @var $this yii\web\View */
/* @var $model app\models\OwlSlider */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="owlSlider-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'language')->dropDownList(OwlSlide::getLanguages()) ?>


    <?= $form->field($model, 'category_id')->dropDownList(
        ArrayHelper::map(
            OwlSlideCategory::find()
                ->select(['id', 'name'])
                ->all(),
            'id',
            function($array, $key){ return  OwlSlideCategory::findOne(['id' => $array->id])->name; }
        )
    )
    ?>

    <?= $form->field($model, 'image_file')->label('')->fileInput() ?>

    <?= $form->field($model, 'title')->textInput() ?>

    <?= $form->field($model, 'text1')->textInput() ?>

    <?= $form->field($model, 'text1_color')->dropDownList(OwlSlide::getColors()) ?>

    <?= $form->field($model, 'text1_bgcolor')->dropDownList(OwlSlide::getBgColors()) ?>

    <?= $form->field($model, 'text1_motion')->dropDownList(OwlSlide::getMotions()) ?>

    <?= $form->field($model, 'text1_align_css')->dropDownList(OwlSlide::getAlignCss()) ?>

    <?= $form->field($model, 'text1_image_file')->label('')->fileInput() ?>

    <?= $form->field($model, 'text2')->textInput() ?>

    <?= $form->field($model, 'text2_color')->dropDownList(OwlSlide::getColors()) ?>

    <?= $form->field($model, 'text2_bgcolor')->dropDownList(OwlSlide::getBgColors()) ?>

    <?= $form->field($model, 'text2_motion')->dropDownList(OwlSlide::getMotions()) ?>

    <?= $form->field($model, 'text2_align_css')->dropDownList(OwlSlide::getAlignCss()) ?>

    <?= $form->field($model, 'text2_image_file')->label('')->fileInput() ?>

    <?= $form->field($model, 'text3')->textInput() ?>

    <?= $form->field($model, 'text3_color')->dropDownList(OwlSlide::getColors()) ?>

    <?= $form->field($model, 'text3_bgcolor')->dropDownList(OwlSlide::getBgColors()) ?>

    <?= $form->field($model, 'text3_motion')->dropDownList(OwlSlide::getMotions()) ?>

    <?= $form->field($model, 'text3_align_css')->dropDownList(OwlSlide::getAlignCss()) ?>

    <?= $form->field($model, 'text3_image_file')->label('')->fileInput() ?>

    <?= $form->field($model, 'link')->textInput() ?>

    <?= $form->field($model, 'sort_order')->textInput() ?>

    <?= $form->field($model, 'status')->dropDownList(OwlSlide::getStatus()) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('owl-slider', 'Create') : Yii::t('owl-slider', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
