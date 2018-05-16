<?php

use yii\helpers\Html;
use yii\grid\GridView;
use elephantsGroup\owlSlider\models\OwlSlide;

/* @var $this yii\web\View */
/* @var $searchModel app\models\OwlSliderSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('owl-slider', 'OwlSlides');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="owlSlider-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('owl-slider', 'Create OwlSlide'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
			[
                'format' => 'raw',
                'header' => '',
                'value' => function($model) { return '<img src="' . OwlSlide::$upload_url . $model->id . '/' . $model->background_image . '" width="200" />'; }
            ],
			'title',
            [
                'attribute' => 'status',
				'format' => 'raw',
                'filter' => OwlSlide::getStatus(),
                'value' => function ($model) { return OwlSlide::getStatus()[$model->status]; },
            ],
			'sort_order',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
