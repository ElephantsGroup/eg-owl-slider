<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\NewsCategory */

$this->title = Yii::t('owl-slider', 'Create Owl Slide Category') . ' - ' . Yii::t('config', 'Company Name') . ' - ' . Yii::t('config', 'description');;
$this->params['breadcrumbs'][] = ['label' => Yii::t('owl-slider', 'Owl Slider Categories'), 'url' => ['index']];
$this->params['breadcrumbs'][] = Yii::t('owl-slider', 'Create Owl Slider Category');
?>
<div class="owl-slide-category-create">

    <h1><?= Yii::t('owl-slider', 'Create Owl Slider Category') ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
