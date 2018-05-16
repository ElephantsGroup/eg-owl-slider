<?php

use yii\helpers\Html;
use yii\grid\GridView;
use elephantsGroup\owlSlider\models\OwlSlideCategory;
/* @var $this yii\web\View */
/* @var $searchModel app\models\OwlSlideCategorySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('owl-slider', 'Owl Slider Categories') . ' - ' . Yii::t('config', 'Company Name') . ' - ' . Yii::t('config', 'description');
$this->params['breadcrumbs'][] = Yii::t('owl-slider', 'Owl Slider Categories');
?>
<div class="owl-slide-category-index">

    <h1><?= Yii::t('owl-slider', 'Owl Slide Categories') ?></h1>
    <?php //echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('owl-slider', 'Create Owl Slider Category'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            [
                'attribute' => 'status',
				'format' => 'raw',
                'filter' => OwlSlideCategory::getStatus(),
				'value' => function ($model) { return OwlSlideCategory::getStatus()[$model->status]; },
            ],
        ],
    ]); ?>

</div>
