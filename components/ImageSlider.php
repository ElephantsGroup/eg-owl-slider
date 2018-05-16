<?php
namespace elephantsGroup\owlSlider\components;

use elephantsGroup\serviceRelation\models\ServiceRelation;
use Yii;
use elephantsGroup\owlSlider\models\OwlSlide;
use elephantsGroup\serviceRelation\models\admin;
use elephantsGroup\gallery\models\album;
use elephantsGroup\gallery\models\picture;
use elephantsGroup\owlSlider\models\OwlSlideCategory;
use yii\helpers\ArrayHelper;
use yii\base\Widget;
use yii\helpers\Html;

class ImageSlider extends Widget
{
	public $language;
	public $items;
	public $navigation;
	public $autoPlay;
	public $slideSpeed;
	public $lazyEffect;
	public $singleItem;

	public $itemsDesktops = [];
    public $category = [];
	
	protected $slider = [];
	
	public function init()
	{
		if(!isset($this->language) || !$this->language)
			$this->language = Yii::$app->language;
        if(!isset($this->navigation) || !$this->navigation)
            $this->navigation = false;
        if(!isset($this->autoPlay) || !$this->autoPlay)
            $this->autoPlay = 5000;
        if(!isset($this->slideSpeed) || !$this->slideSpeed)
            $this->slideSpeed = 200;
        if(!isset($this->lazyEffect) || !$this->lazyEffect)
            $this->lazyEffect = 'fade';
        if(!isset($this->singleItem) || !$this->singleItem)
            $this->singleItem = false;
		if(!isset($this->items) || !$this->items)
		{
			$this->items = 5;
			if(!isset($this->itemsDesktops) || !$this->itemsDesktops)
				$this->itemsDesktops = [
					'itemsDesktop' => [1199,4],
					'itemsDesktopSmall' => [979,3]
				];
		}
		elseif($this->items>2)
		{
			if(!isset($this->itemsDesktops) || !$this->itemsDesktops)
				$this->itemsDesktops = [
					'itemsDesktop' => [1199,($this->items)-1],
					'itemsDesktopSmall' => [979,($this->items)-2]
				];
		}else
		{
			if (!isset($this->itemsDesktops) || !$this->itemsDesktops)
				$this->itemsDesktops = [
					'itemsDesktop' => [1199, ($this->items)],
					'itemsDesktopSmall' => [979, ($this->items) - 1]
				];
		}
	}

	/**
	 * @return string
     */
	public function	run()
	{
		$owl_slider = OwlSlide::find()
			->select(['id', 'background_image', 'title','category_id'])
			->where(['status' => OwlSlide::$_STATUS_ACTIVE, 'language' =>$this->language, 'category_id' => $this->category ])
			->orderBy(['creation_time'=>SORT_DESC])
			->all();
		foreach($owl_slider as $slide)
		{
			$this->slider[]=[
				'id' => $slide['id'],
				'title' => $slide['title'],
				'background_image' => OwlSlide::$upload_url . $slide['id'] . '/' . $slide['background_image'],
			];
		}
		$relation = ServiceRelation::find()
            ->where(['service1_id' => 1, 'service2_id' => 2, 'item1_id' => $this->category])
            ->one();
        if ($relation)
        {
           $pic = Picture::find()
               ->where(['album_id' => $relation->item2_id])
               ->all();

           foreach ($pic as $pictures)
           {
               $this->slider[]=[
                   'id' => 'e' . $pictures->id,
                   'title' => $pictures->name,
                   'background_image' => Picture::$upload_url . $pictures->id . '/' . $pictures->picture,
               ];
           }
        }

		return $this->render('image_slider',[
			'slider' => $this->slider,
			'category' => $this->category,
			'language' => $this->language,
			'items' => $this->items,
			'itemsDesktops' => $this->itemsDesktops
		]);
	}
}