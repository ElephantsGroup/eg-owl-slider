<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\OwlSlider */

$this->title = Yii::t('owl-slider', 'Create OwlSlide');
$this->params['breadcrumbs'][] = ['label' => Yii::t('owl-slider', 'OwlSlides'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="owlSlider-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
