<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\RequestDocumentShow;
use common\models\CompanyEmp;

/**
 * RequestDocumentShowSearch represents the model behind the search form about `common\models\RequestDocumentShow`.
 */
class RequestDocumentShowSearch extends RequestDocumentShow
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'request_id', 'user_id', 'property_id', 'payable_amount', 'status'], 'integer'],
            [['payment_status', 'created_date'], 'safe'],
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
        $query = RequestDocumentShow::find()->where(['user_id' => $user_id])->andwhere(['status'=>1]);

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
            'request_id' => $this->request_id,
            'user_id' => $this->user_id,
            'property_id' => $this->property_id,
            'payable_amount' => $this->payable_amount,
            'status' => $this->status,
            'created_date' => $this->created_date,
        ]);

        $query->andFilterWhere(['like', 'payment_status', $this->payment_status]);

        return $dataProvider;
    }


     public function searches($params)
    {
        $user_id = Yii::$app->user->identity->id;
        $querys = CompanyEmp::find()->where(['userid'=>$user_id])->one();
        $assigned_id = $querys->id;
        $query = RequestDocumentShow::find()->orderBy('id desc')->where(['assigned_to_id'=>$assigned_id]);
        //$query = RequestDocumentShow::find()->where(['user_id' => $user_id])->andwhere(['status'=>1]);

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
            'request_id' => $this->request_id,
            'user_id' => $this->user_id,
            'property_id' => $this->property_id,
            'payable_amount' => $this->payable_amount,
            'status' => $this->status,
            'created_date' => $this->created_date,
        ]);

        $query->andFilterWhere(['like', 'payment_status', $this->payment_status]);

        return $dataProvider;
    }




    public function searched($params,$ids)
    {
        $user_id = $ids;
       
        $query = RequestDocumentShow::find()->where(['user_id' => $user_id])->andwhere(['status'=>1]);

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
            'request_id' => $this->request_id,
            'user_id' => $this->user_id,
            'property_id' => $this->property_id,
            'payable_amount' => $this->payable_amount,
            'status' => $this->status,
            'created_date' => $this->created_date,
        ]);

        $query->andFilterWhere(['like', 'payment_status', $this->payment_status]);

        return $dataProvider;
    }

 
}
