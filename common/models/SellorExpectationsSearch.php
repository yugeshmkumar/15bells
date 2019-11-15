<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\SellorExpectations;

/**
 * SellorExpectationsSearch represents the model behind the search form about `common\models\SellorExpectations`.
 */
class SellorExpectationsSearch extends SellorExpectations
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'user_id', 'property_id', 'payment_time'], 'integer'],
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
    public function search($params)
    {
        $query = SellorExpectations::find();

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
            'user_id' => $this->user_id,
            'property_id' => $this->property_id,
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


    public function searchs($params)
    {
        
        $user_id = Yii::$app->user->identity->id; 
        $query = SellorExpectations::find()->where(['user_id' => $user_id])->andwhere(['user_type'=>'sellor'])->andwhere(['is_active'=>'1']);

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
            'user_id' => $this->user_id,
            'property_id' => $this->property_id,
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


   public function searchss($params)
    {
        
        $user_id = $_GET['id'];  
        $query = SellorExpectations::find()->where(['user_id' => $user_id])->andwhere(['user_type'=>'sellor'])->andwhere(['is_active'=>'1']);

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
            'user_id' => $this->user_id,
            'property_id' => $this->property_id,
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




    public function searchb($params)
    {
        
        $user_id = Yii::$app->user->identity->id; 
        $query = SellorExpectations::find()->where(['user_id' => $user_id])->andwhere(['user_type'=>'buyer'])->andwhere(['is_active'=>'1']);

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
            'user_id' => $this->user_id,
            'property_id' => $this->property_id,
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


    public function searchbb($params)
    {
        
        $user_id = $_GET['id']; 
        $query = SellorExpectations::find()->where(['user_id' => $user_id])->andwhere(['user_type'=>'buyer'])->andwhere(['is_active'=>'1']);

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
            'user_id' => $this->user_id,
            'property_id' => $this->property_id,
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
