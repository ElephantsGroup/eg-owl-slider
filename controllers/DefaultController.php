<?php

namespace elephantsGroup\owlSlider\controllers;

use Yii;
//use yii\web\Controller;
use elephantsGroup\owlSlider\models\OwlSlider;
use elephantsGroup\stat\models\Stat;
use elephantsGroup\base\EGController;

class DefaultController extends EGController
{
    public function actionIndex($lang = 'fa-IR')
    {
		Stat::setView('news', 'default', 'index');
		
		$this->layout = '//main';
		return $this->render('index');
    }

}
