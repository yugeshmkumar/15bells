<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\RequestEmd;

/**
 * RequestEmdSearch represents the model behind the search form about `common\models\RequestEmd`.
 */
class RequestEmdSearch extends RequestEmd
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'user_id', 'property_id', 'payable_amount', 'escrow_account_id', 'status'], 'integer'],
            [['payment_status', 'created_date', 'updated_date'], 'safe'],
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
        
        $user_id = Yii::$app->user->identity->id; 
        $query = RequestEmd::find()->where(['user_id' => $user_id])->andwhere(['status'=>1]);

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
            'payable_amount' => $this->payable_amount,
            'escrow_account_id' => $this->escrow_account_id,
            'created_date' => $this->created_date,
            'updated_date' => $this->updated_date,
            'status' => $this->status,
        ]);

        $query->andFilterWhere(['like', 'payment_status', $this->payment_status]);

        return $dataProvider;
    }



      public function searches($params)
    {
        
        $user_id = Yii::$app->user->identity->id;
        $querys = CompanyEmp::find()->where(['userid'=>$user_id])->one();
         $assigned_id = $querys->id;
        $query = RequestEmd::find()->orderBy('id desc')->where(['assigned_to_id'=>$assigned_id]);

       // $query = RequestEmd::find()->where(['user_id' => $user_id])->andwhere(['status'=>1]);

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
            'payable_amount' => $this->payable_amount,
            'escrow_account_id' => $this->escrow_account_id,
            'created_date' => $this->created_date,
            'updated_date' => $this->updated_date,
            'status' => $this->status,
        ]);

        $query->andFilterWhere(['like', 'payment_status', $this->payment_status]);

        return $dataProvider;
    }



    public function searchforward($params)
    {
        
        $user_id = Yii::$app->user->identity->id;
        $querys = CompanyEmp::find()->where(['userid'=>$user_id])->one();
         $assigned_id = $querys->id;
        $query = RequestEmd::find()->orderBy('id desc')->where(['assigned_to_id'=>$assigned_id])->andwhere(['for_auction'=>'forward']);

       // $query = RequestEmd::find()->where(['user_id' => $user_id])->andwhere(['status'=>1]);

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
            'payable_amount' => $this->payable_amount,
            'escrow_account_id' => $this->escrow_account_id,
            'created_date' => $this->created_date,
            'updated_date' => $this->updated_date,
            'status' => $this->status,
        ]);

        $query->andFilterWhere(['like', 'payment_status', $this->payment_status]);

        return $dataProvider;
    }




    public function searchreverse($params)
    {
        
        $user_id = Yii::$app->user->identity->id;
        $querys = CompanyEmp::find()->where(['userid'=>$user_id])->one();
         $assigned_id = $querys->id;
        $query = RequestEmd::find()->orderBy('id desc')->where(['assigned_to_id'=>$assigned_id])->andwhere(['for_auction'=>'reverse']);

       // $query = RequestEmd::find()->where(['user_id' => $user_id])->andwhere(['status'=>1]);

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
            'payable_amount' => $this->payable_amount,
            'escrow_account_id' => $this->escrow_account_id,
            'created_date' => $this->created_date,
            'updated_date' => $this->updated_date,
            'status' => $this->status,
        ]);

        $query->andFilterWhere(['like', 'payment_status', $this->payment_status]);

        return $dataProvider;
    }


}
