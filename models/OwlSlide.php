<?php

namespace elephantsGroup\owlSlider\models;

use Yii;

/**
 * This is the model class for table "{{%owl_slides}}".
 *
 * @property integer $id
 * @property string $creation_time
 * @property integer $status
 */
class OwlSlide extends \yii\db\ActiveRecord
{
	public $image_file;
	public $text1_image_file;
	public $text2_image_file;
	public $text3_image_file;

	public static $_STATUS_INACTIVE = 0;
	public static $_STATUS_ACTIVE = 1;

	public static $_COLOR_EMPTY = 0;
	public static $_COLOR_LIGHT = 1;
	public static $_COLOR_MEDIUM = 2;
	public static $_COLOR_DARK = 3;
	public static $_COLOR_TINT = 4;

	public static $_BGCOLOR_EMPTY = 0;
	public static $_BGCOLOR_LIGHT = 1;
	public static $_BGCOLOR_DARK = 2;
	public static $_BGCOLOR_GRAY = 3;

	public static $_MOTION_EMPTY = 0;
	public static $_MOTION_FADEIN = 1;
	public static $_MOTION_FADEINDOWN = 2;
	public static $_MOTION_FADEINUP = 3;
	public static $_MOTION_FADEINLEFT = 4;
	public static $_MOTION_FADEINRIGHT = 5;

	public static $_ALIGN_CSS_CENTER = 0;
	public static $_ALIGN_CSS_RIGHT = 1;
	public static $_ALIGN_CSS_LEFT = 2;

	public static $_LANG_EN = 'en';
	public static $_LANG_FA = 'fa-IR';

	public static $upload_url;
    public static $upload_path;
		
	public function init()
    {
        self::$upload_path = str_replace('/backend', '', Yii::getAlias('@webroot')) . '/uploads/eg-owl-slider/owl-slide/';
        self::$upload_url = str_replace('/backend', '', Yii::getAlias('@web')) . '/uploads/eg-owl-slider/owl-slide/';
        parent::init();
    }

	public static function getLanguages()
	{
		return array(
			self::$_LANG_FA => Yii::t('owl-slider', 'Persian'),
			self::$_LANG_EN => Yii::t('owl-slider', 'English'),
		);
	}

	public static function getStatus()
	{
		return [
			self::$_STATUS_ACTIVE => Yii::t('owl-slider', 'Active'),
			self::$_STATUS_INACTIVE => Yii::t('owl-slider', 'Inactive'),
		];
	}

	public static function getColors()
	{
		return [
			self::$_COLOR_EMPTY => '',
			self::$_COLOR_LIGHT => 'light-color',
			self::$_COLOR_MEDIUM => 'medium-color',
			self::$_COLOR_DARK => 'dark-color',
			self::$_COLOR_TINT => 'tint-color',
		];
	}

	public static function getBgColors()
	{
		return [
			self::$_BGCOLOR_EMPTY => '',
			self::$_BGCOLOR_LIGHT => 'lighto-bg',
			self::$_BGCOLOR_DARK => 'darko-bg',
			self::$_BGCOLOR_GRAY => 'gray-bg',
		];
	}

	public static function getMotions()
	{
		return [
			self::$_MOTION_EMPTY => '',
			self::$_MOTION_FADEIN = 'fadeIn-',
			self::$_MOTION_FADEINDOWN = 'fadeInDown-',
			self::$_MOTION_FADEINUP = 'fadeInUp-',
			self::$_MOTION_FADEINLEFT = 'fadeInLeft-',
			self::$_MOTION_FADEINRIGHT = 'fadeInRight-',
		];
	}

	public static function getAlignCss()
	{
		return [
			self::$_ALIGN_CSS_CENTER => 'text-center',
			self::$_ALIGN_CSS_RIGHT => 'text-right',
			self::$_ALIGN_CSS_LEFT => 'text-left',
		];
	}

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%eg_owl_slides}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [
				[
					'background_image', 'title', 'sort_order', 'status', 'language',
					'text1', 'text2', 'text3', 'link',
					'text1_image', 'text2_image', 'text3_image',
					'text1_color', 'text1_bgcolor', 'text1_motion', 'text1_align_css',
					'text1_color', 'text2_bgcolor', 'text2_motion', 'text2_align_css',
					'text1_color', 'text3_bgcolor', 'text3_motion', 'text3_align_css',
				],
				'safe'
			],
            [
				[
					'background_image', 'title', 'text1', 'text2', 'text3', 'link', 'language',
					'text1_image', 'text2_image', 'text3_image',
				],
				'string'
			],
            [['background_image'], 'default', 'value'=>'default.png'],
			[['status'], 'default', 'value' => self::$_STATUS_INACTIVE],
			[['status'], 'in', 'range' => array_keys(self::getStatus())],
            [['image_file'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg', 'checkExtensionByMimeType'=>false],
            [['text1_image_file'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg', 'checkExtensionByMimeType'=>false],
            [['text2_image_file'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg', 'checkExtensionByMimeType'=>false],
            [['text3_image_file'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg', 'checkExtensionByMimeType'=>false],
            [['sort_order'], 'default', 'value' => 0],
			[
				[
					'status', 'sort_order','category_id' ,
					'text1_color', 'text1_bgcolor', 'text1_motion',
					'text1_color', 'text2_bgcolor', 'text2_motion',
					'text1_color', 'text3_bgcolor', 'text3_motion',
					'text1_align_css', 'text2_align_css', 'text3_align_css',
				],
				'integer'
			],
			[['update_time'], 'default', 'value' => (new \DateTime)->setTimestamp(time())->setTimezone(new \DateTimeZone('Iran'))->format('Y-m-d H:i:s')],
            [['creation_time'], 'default', 'value' => (new \DateTime)->setTimestamp(time())->setTimezone(new \DateTimeZone('Iran'))->format('Y-m-d H:i:s')]			
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('owl-slider', 'ID'),
			'category_id' => Yii::t('owl-slider', 'Category id'),
            'background_image' => Yii::t('owl-slider', 'Background Image'),
            'title' => Yii::t('owl-slider', 'Title'),
            'language' => Yii::t('owl-slider', 'Language'),
            'text1' => Yii::t('owl-slider', 'First Text'),
            'text1_color' => Yii::t('owl-slider', 'First Text Color'),
            'text1_bgcolor' => Yii::t('owl-slider', 'First Text Background Color'),
            'text1_motion' => Yii::t('owl-slider', 'First Text Motion'),
            'text1_image' => Yii::t('owl-slider', 'First Text Image'),
            'text1_align_css' => Yii::t('owl-slider', 'Text1 Align Css'),
            'text2' => Yii::t('owl-slider', 'Second Text'),
            'text2_color' => Yii::t('owl-slider', 'Second Text Color'),
            'text2_bgcolor' => Yii::t('owl-slider', 'Second Text Background Color'),
            'text2_motion' => Yii::t('owl-slider', 'Second Text Motion'),
            'text2_image' => Yii::t('owl-slider', 'Second Text Image'),
            'text2_align_css' => Yii::t('owl-slider', 'Text2 Align Css'),
            'text3' => Yii::t('owl-slider', 'Thirth Text'),
            'text3_color' => Yii::t('owl-slider', 'Thirth Text Color'),
            'text3_bgcolor' => Yii::t('owl-slider', 'Thirth Text Background Color'),
            'text3_motion' => Yii::t('owl-slider', 'Thirth Text Motion'),
            'text3_image' => Yii::t('owl-slider', 'Thirth Text Image'),
            'text3_align_css' => Yii::t('owl-slider', 'Text3 Align Css'),
            'link' => Yii::t('owl-slider', 'Link'),
            'sort_order' => Yii::t('owl-slider', 'Sort Order'),
            'status' => Yii::t('owl-slider', 'Status'),
        ];
    }
	
	public function getCategory()
    {
        return $this->hasOne(OwlSlideCategory::className(), ['id' => 'category_id']);
    }
	
	public function beforeSave($insert)
	{
		$date = new \DateTime();
		$date->setTimestamp(time());
		$date->setTimezone(new \DateTimezone('Iran'));
		$this->update_time = $date->format('Y-m-d H:i:s');
		if($this->isNewRecord)
			$this->creation_time = $date->format('Y-m-d H:i:s');
		return parent::beforeSave($insert);
	}
	
	public function afterSave($insert, $changedAttributes)
    {
        if($this->image_file)
        {
			$dir = self::$upload_path . $this->id . '/';
			if(!file_exists($dir))
				mkdir($dir, 0777, true);
            $file_name = 'owl-slide-' . $this->id . '.' . $this->image_file->extension;
            $this->image_file->saveAs($dir . $file_name);
            $this->updateAttributes(['background_image' => $file_name]);
        }
		if($this->text1_image_file)
		{
			$dir = self::$upload_path . $this->id . '/';
			if(!file_exists($dir))
				mkdir($dir, 0777, true);
            $file_name = 'slide-text1-' . $this->id . '.' . $this->text1_image_file->extension;
			$this->text1_image_file->saveAs($dir . $file_name);
            $this->updateAttributes(['text1_image' => $file_name]);
		}		
		if($this->text2_image_file)
		{
			$dir = self::$upload_path . $this->id . '/';
			if(!file_exists($dir))
				mkdir($dir, 0777, true);
            $file_name = 'slide-text2-' . $this->id . '.' . $this->text2_image_file->extension;
			$this->text2_image_file->saveAs($dir . $file_name);
            $this->updateAttributes(['text2_image' => $file_name]);
	
		}
		if($this->text3_image_file)
		{
			$dir = self::$upload_path . $this->id . '/';
			if(!file_exists($dir))
				mkdir($dir, 0777, true);
            $file_name = 'slide-text3-' . $this->id . '.' . $this->text3_image_file->extension;
			$this->text3_image_file->saveAs($dir . $file_name);
            $this->updateAttributes(['text3_image' => $file_name]);
	
		}
		return parent::afterSave($insert, $changedAttributes);
    }

	public function beforeDelete()
	{

		if($this->background_image != 'default.png')
		{
			$file_path = self::$upload_path . $this->id . '/' . $this->background_image;
			if(file_exists($file_path))
				unlink($file_path);
		}
		
		$file_path = self::$upload_path . $this->id . '/' . $this->text1_image;
			if(file_exists($file_path))
				unlink($file_path);
			
		$file_path = self::$upload_path . $this->id . '/' . $this->text2_image;
			if(file_exists($file_path))
				unlink($file_path);
			
		$file_path = self::$upload_path . $this->id . '/' . $this->text3_image;
			if(file_exists($file_path))
				unlink($file_path);
		
		return parent::beforeDelete();
	}
}
