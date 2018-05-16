<?php

namespace elephantsGroup\owlSlider\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use elephantsGroup\owlSlider\models\OwlSlideCategory;

/**
 * OwlSlideCategorySearch represents the model behind the search form about `app\models\OwlSlideCategory`.
 */
class OwlSlideCategorySearch extends OwlSlideCategory
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'status'], 'integer'],
            [['name'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = OwlSlideCategory::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

		$dataProvider->setSort([
			'attributes' => [
				'id',
				'name',
				'status'
			]
		]);

        $query->andFilterWhere([
			'id' => $this->id,
			'status' => $this->status,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name]);

		return $dataProvider;
    }
}
