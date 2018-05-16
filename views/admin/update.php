<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\OwlSlider */

$this->title = Yii::t('owl-slider', 'Update OwlSlide') . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('owl-slider', 'OwlSlides'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('owl-slider', 'Update');
?>
<div class="owlSlider-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
