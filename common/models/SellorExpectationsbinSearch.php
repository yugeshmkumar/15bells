<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\SellorExpectationsbin;

/**
 * SellorExpectationsbinSearch represents the model behind the search form about `common\models\SellorExpectationsbin`.
 */
class SellorExpectationsbinSearch extends SellorExpectationsbin
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'user_id', 'property_id', 'expected_rate', 'payment_time'], 'integer'],
            [['user_type', 'save_search_as', 'rate_negotiable', 'payment_time_negotiable', 'loan_against_property', 'all_dues_cleared', 'vastu_facing', 'loan_to_be_applied', 'is_active', 'created_date'], 'safe'],
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
    public function search($params,$userid)
    {
        $query = SellorExpectationsbin::find()->orderBy('id desc')->where(['user_id'=>$userid]);

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'user_id' => $this->user_id,
            'property_id' => $this->property_id,
            'expected_rate' => $this->expected_rate,
            'payment_time' => $this->payment_time,
            'created_date' => $this->created_date,
        ]);

        $query->andFilterWhere(['like', 'user_type', $this->user_type])
            ->andFilterWhere(['like', 'save_search_as', $this->save_search_as])
            ->andFilterWhere(['like', 'rate_negotiable', $this->rate_negotiable])
            ->andFilterWhere(['like', 'payment_time_negotiable', $this->payment_time_negotiable])
            ->andFilterWhere(['like', 'loan_against_property', $this->loan_against_property])
            ->andFilterWhere(['like', 'all_dues_cleared', $this->all_dues_cleared])
            ->andFilterWhere(['like', 'vastu_facing', $this->vastu_facing])
            ->andFilterWhere(['like', 'loan_to_be_applied', $this->loan_to_be_applied])
            ->andFilterWhere(['like', 'is_active', $this->is_active]);

        return $dataProvider;
    }
}
