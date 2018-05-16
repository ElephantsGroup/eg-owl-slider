<?php
	use yii\helpers\Url;
	use elephantsGroup\owlSlider\models\OwlSlide;
	use elephantsGroup\owlSlider\assets\SliderAsset;
	
	SliderAsset::register($this);
?>
<style>
	#owl-example .item{
	  margin: 3px;
	  height: auto;
	  width: 70%;
	}
</style>

	<div class="container">
		<div id="owl-example" class="owl-carousel">
			<?php foreach($slider as  $slide) : ?>
				<img class="item" src="<?= $slide['background_image'] ?>" alt="<?= $slide['title'] ?>" />
			<?php endforeach; ?>
		</div><!-- /.owl-carousel -->		
	</div><!-- /.container -->

<script>
	$(document).ready(function() {
		$("#owl-example").owlCarousel({
			'autoPlay': 5000,
			'lazyEffect' : 'fade',
			'singleItem' : false,
			'navigation' : false,
			'items': <?= $items ?>,
			'itemsDesktop' : [<?= implode(',', $itemsDesktops['itemsDesktop']) ?>],
			'itemsDesktopSmall' : [<?= implode(',', $itemsDesktops['itemsDesktopSmall']) ?>],
		});
	});
</script>  