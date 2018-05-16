<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\OwlSlideCategory */

$this->title = Yii::t('owl-slider', 'Update Owl Slider Category') . ' ' . $model->name . ' - ' . Yii::t('config', 'Company Name') . ' - ' . Yii::t('config', 'description');
$this->params['breadcrumbs'][] = ['label' => Yii::t('owl-slider', 'Owl Slide Categories'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('owl-slider', 'Update');
?>
<div class="owl-slide-category-update">

    <h1><?= Yii::t('owl-slider', 'Update Owl Slide Category') . ' ' . $model->name ?></h1>

    <?= $this->render('_form', [
		'model' => $model,
	]) ?>

</div>
