<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use elephantsGroup\owlSlider\models\OwlSlideCategory;
use elephantsGroup\jdf\Jdf;

/* @var $this yii\web\View */
/* @var $model app\models\NewsCategory */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('owl-slider', 'Owl Slide Categories'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="owl-slide-category-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('owl-slider', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('owl-slider', 'Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('owl-slider', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
			[
                'attribute' => 'status',
                'value' => OwlSlideCategory::getStatus()[$model->status],
                'format' => 'raw',
            ],
			[
				'attribute'  => 'creation_time',
				'value'  => Jdf::jdate('Y/m/d H:i:s', (new \DateTime($model->creation_time))->getTimestamp(), '', 'Iran', 'en'),
			],
			[
				'attribute'  => 'update_time',
				'value'  => Jdf::jdate('Y/m/d H:i:s', (new \DateTime($model->update_time))->getTimestamp(), '', 'Iran', 'en'),
			]
        ],
    ]) ?>

</div>
