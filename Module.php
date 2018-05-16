<?php

namespace elephantsGroup\owlSlider;

use Yii;

class Module extends \yii\base\Module
{
    //public $controllerNamespace = 'elephantsGroup\owlSlider\controllers';

    public function init()
    {
        parent::init();

        if (empty(Yii::$app->i18n->translations['owl-slider']))
		{
            Yii::$app->i18n->translations['owl-slider'] =
			[
                'class' => 'yii\i18n\PhpMessageSource',
                'basePath' => __DIR__ . '/messages',
                //'forceTranslation' => true,
            ];
        }
    }
}
