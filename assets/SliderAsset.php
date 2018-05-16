<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace elephantsGroup\owlSlider\assets;

use yii\web\AssetBundle;
use yii\web\View;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @author Kartik Visweswaran <kartikv2@gmail.com>
 * @since 2.0
 */
class SliderAsset extends AssetBundle
{
    public $sourcePath = '@vendor/elephantsgroup/yii2-owl-slider/assets';
   
    public function init() {
        $this->jsOptions['position'] = View::POS_BEGIN;
        parent::init();
    }

	public $css = [
        'css/owl.carousel.css',
		'css/owl.theme.css',
		'css/owl.transitions.css',
    ];
    public $js = [
		//'js/jquery-1.9.1.min.js',
		'js/owl.carousel.js',
	];
    public $depends = [
		'yii\web\JqueryAsset',
		//'yii\web\YiiAsset',
    ];
}
