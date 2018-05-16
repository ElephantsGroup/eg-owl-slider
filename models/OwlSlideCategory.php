<?php

namespace elephantsGroup\owlSlider\models;

use Yii;

/**
 * This is the model class for table "basic3aug_news_category".
 *
 * @property integer $id
 * @property string $name
 * @property string $logo
 * @property integer $status
 *
 */
class OwlSlideCategory extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
	public static $_STATUS_INACTIVE = 0;
	public static $_STATUS_ACTIVE = 1;
	
	public static function getStatus()
	{
		return array(
			self::$_STATUS_INACTIVE => Yii::t('owl-slider', 'Inactive'),
			self::$_STATUS_ACTIVE => Yii::t('owl-slider', 'Active'),
		);
	}
	
    public static function tableName()
    {
        return '{{%eg_owl_slides_category}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['status'], 'integer'],
			[['status'], 'default', 'value' => self::$_STATUS_INACTIVE],
			[['status'], 'in', 'range' => array_keys(self::getStatus())],
            [['name'], 'string', 'max' => 32],
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
            'id' => Yii::t('owl-slider', 'id'),
            'name' => Yii::t('owl-slider', 'Name'),
            'status' => Yii::t('owl-slider', 'Status'),
		];
    }
	
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOwlSlide()
    {
        return $this->hasMany(OwlSlide::className(), ['category_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
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
}
