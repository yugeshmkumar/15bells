<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\MyExpectations;

/**
 * MyExpectationsSearch represents the model behind the search form about `common\models\MyExpectations`.
 */
class MyExpectationsSearch extends MyExpectations
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'property_id', 'tenure'], 'integer'],
            [['possession','save_search_as', 'deposit', 'agreement', 'lock_in_period', 'rent', 'escalation', 'maintenance', 'working_hour_restrict', 'created_date', 'is_active'], 'safe'],
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
        $userid = Yii::$app->user->identity->id;
        $query = MyExpectations::find()->where(['user_id'=>$userid])->andwhere(['user_type'=>'lessee'])->andwhere(['is_active'=>'1']);

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'property_id' => $this->property_id,
            'tenure' => $this->tenure,
            'created_date' => $this->created_date,
        ]);

        $query->andFilterWhere(['like', 'possession', $this->possession])
            ->andFilterWhere(['like', 'save_search_as', $this->save_search_as])
            ->andFilterWhere(['like', 'deposit', $this->deposit])
            ->andFilterWhere(['like', 'agreement', $this->agreement])
            ->andFilterWhere(['like', 'lock_in_period', $this->lock_in_period])
            ->andFilterWhere(['like', 'rent', $this->rent])
            ->andFilterWhere(['like', 'escalation', $this->escalation])
            ->andFilterWhere(['like', 'maintenance', $this->maintenance])
            ->andFilterWhere(['like', 'working_hour_restrict', $this->working_hour_restrict])
            ->andFilterWhere(['like', 'is_active', $this->is_active]);

        return $dataProvider;
    }
}
