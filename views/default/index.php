<?php
use yii\helpers\Url;
use elephantsGroup\owlSlider\components\ImageSlider;
use elephantsGroup\owlSlider\models\Owlslide;
?>
<div class="owlSlider-default-index">
	<?php 
		echo ImageSlider::widget(['category' => [1,2],'items' => 3, 'itemsDesktops' => ['itemsDesktop' => [1199,3], 'itemsDesktopSmall' => [979,2]] ]);
	?>
</div>

