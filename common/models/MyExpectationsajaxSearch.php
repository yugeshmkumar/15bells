<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\MyExpectationsajax;

/**
 * MyExpectationsajaxSearch represents the model behind the search form about `common\models\MyExpectationsajax`.
 */
class MyExpectationsajaxSearch extends MyExpectationsajax
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'user_id', 'property_id', 'property_type', 'tenure'], 'integer'],
            [['user_type', 'save_search_as', 'location', 'lat', 'long', 'possession', 'deposit', 'agreement', 'lock_in_period', 'rent', 'escalation', 'maintenance', 'working_hour_restrict', 'created_date', 'is_active'], 'safe'],
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
//        $query = MyExpectationsajax::find();
        $userid = Yii::$app->user->identity->id;
        $query = MyExpectationsajax::find()->where(['user_id'=>$userid])->andwhere(['user_type'=>'lessee'])->andwhere(['is_active'=>'1']);


        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
        'pageSize' => 5,
    ],
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'user_id' => $this->user_id,
            'property_id' => $this->property_id,
            'property_type' => $this->property_type,
            'tenure' => $this->tenure,
            'created_date' => $this->created_date,
        ]);

        $query->andFilterWhere(['like', 'user_type', $this->user_type])
            ->andFilterWhere(['like', 'save_search_as', $this->save_search_as])
            ->andFilterWhere(['like', 'location', $this->location])
            ->andFilterWhere(['like', 'lat', $this->lat])
            ->andFilterWhere(['like', 'long', $this->long])
            ->andFilterWhere(['like', 'possession', $this->possession])
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
