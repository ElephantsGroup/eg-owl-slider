<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use elephantsGroup\owlSlider\models\OwlSlide;
use elephantsGroup\jdf\Jdf;

/* @var $this yii\web\View */
/* @var $model app\models\OwlSlider */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('owl-slider', 'OwlSlides'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="owlSlider-view">

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
			[
                'attribute' => 'background_image',
                'value' => OwlSlide::$upload_url . $model->id . '/' . $model->background_image,
                'format' => ['image'],
            ],
			'title',
            'text1',
            [
                'attribute' => 'text1_image',
                'value' => OwlSlide::$upload_url . $model->id . '/' . $model->text1_image,
                'format' => ['image'],
            ],
			[
				'attribute'  => 'text1_color',
				'value'  => OwlSlide::getColors()[$model->text1_color],
			],
            [
				'attribute'  => 'text1_bgcolor',
				'value'  => OwlSlide::getBgColors()[$model->text1_bgcolor],
			],
            [
				'attribute'  => 'text1_motion',
				'value'  => OwlSlide::getMotions()[$model->text1_motion],
			],
			[
				'attribute'  => 'text1_align_css',
				'value'  => OwlSlide::getAlignCss()[$model->text1_align_css],
			],
            'text2',
            [
                'attribute' => 'text2_image',
                'value' => OwlSlide::$upload_url . $model->id . '/' . $model->text2_image,
                'format' => ['image'],
            ],
			[
				'attribute'  => 'text2_color',
				'value'  => OwlSlide::getColors()[$model->text2_color],
			],
            [
				'attribute'  => 'text2_bgcolor',
				'value'  => OwlSlide::getBgColors()[$model->text2_bgcolor],
			],
            [
				'attribute'  => 'text2_motion',
				'value'  => OwlSlide::getMotions()[$model->text2_motion],
			],
			[
				'attribute'  => 'text2_align_css',
				'value'  => OwlSlide::getAlignCss()[$model->text2_align_css],
			],
            'text3',
            [
                'attribute' => 'text3_image',
                'value' => OwlSlide::$upload_url . $model->id . '/' . $model->text3_image,
                'format' => ['image'],
            ],
			[
				'attribute'  => 'text3_color',
				'value'  => OwlSlide::getColors()[$model->text3_color],
			],
            [
				'attribute'  => 'text3_bgcolor',
				'value'  => OwlSlide::getBgColors()[$model->text3_bgcolor],
			],
            [
				'attribute'  => 'text3_motion',
				'value'  => OwlSlide::getMotions()[$model->text3_motion],
			],
			[
				'attribute'  => 'text3_align_css',
				'value'  => OwlSlide::getAlignCss()[$model->text3_align_css],
			],
            'link',
            'sort_order',
			[
				'attribute'  => 'status',
				'value'  => OwlSlide::getStatus()[$model->status],
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
