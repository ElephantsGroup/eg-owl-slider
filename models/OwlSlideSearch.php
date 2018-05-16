<?php

namespace elephantsGroup\owlSlider\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use elephantsGroup\owlSlider\models\OwlSlide;

/**
 * owlSliderSearch represents the model behind the search form about `app\models\owlSlider`.
 */
class OwlSlideSearch extends owlSlide
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [
				[
					'id', 'status', 'sort_order',
					'text1_color', 'text1_bgcolor', 'text1_motion',
					'text1_color', 'text2_bgcolor', 'text2_motion',
					'text1_color', 'text3_bgcolor', 'text3_motion',
				],
				'integer'
			],
            [
				[
					'background_image', 'sort_order', 'status', 'title', 'language',
					'text1', 'text2', 'text3', 'link',
					'text1_image', 'text2_image', 'text3_image',
					'text1_color', 'text1_bgcolor', 'text1_motion',
					'text1_color', 'text2_bgcolor', 'text2_motion',
					'text1_color', 'text3_bgcolor', 'text3_motion',
				],
				'safe'
			]
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
        $query = OwlSlide::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'status' => $this->status,
            'sort_order' => $this->sort_order,
            'language' => $this->language,
            'text1_color' => $this->text1_color,
            'text1_bgcolor' => $this->text1_bgcolor,
            'text1_motion' => $this->text1_motion,
            'text1_align_css' => $this->text1_align_css,
            'text2_color' => $this->text2_color,
            'text2_bgcolor' => $this->text2_bgcolor,
            'text2_motion' => $this->text2_motion,
            'text2_align_css' => $this->text2_align_css,
            'text3_color' => $this->text3_color,
            'text3_bgcolor' => $this->text3_bgcolor,
            'text3_motion' => $this->text3_motion,
            'text3_align_css' => $this->text3_align_css,
        ]);

        $query->andFilterWhere(['like', 'text1', $this->text1]);
        $query->andFilterWhere(['like', 'text1_image', $this->text1_image]);
        $query->andFilterWhere(['like', 'text2', $this->text2]);
        $query->andFilterWhere(['like', 'text2_image', $this->text2_image]);
        $query->andFilterWhere(['like', 'text3', $this->text3]);
        $query->andFilterWhere(['like', 'text3_image', $this->text3_image]);
        $query->andFilterWhere(['like', 'link', $this->link]);

        return $dataProvider;
    }
}
