<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Revenue;
use common\models\CompanyEmp;


/**
 * RevenueSearch represents the model behind the search form about `backend\models\Revenue`.
 */
class RevenueSearch extends Revenue
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'property_id', 'sales_executive_id', 'client_id', 'client_total_amount', 'client_pending_amount', 'owner_id', 'owner_total_amount', 'owner_pending_amount'], 'integer'],
            [['client_pending_amount_date', 'owner_pending_amount_date', 'created_date'], 'safe'],
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
        $querys = CompanyEmp::find()->where(['userid'=>$user_id])->one();
         $assigned_id = $querys->id;
        $query = Revenue::find()->where(['sales_executive_id'=>$assigned_id]);

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
            'property_id' => $this->property_id,
            'sales_executive_id' => $this->sales_executive_id,
            'client_id' => $this->client_id,
            'client_total_amount' => $this->client_total_amount,
            'client_pending_amount' => $this->client_pending_amount,
            'client_pending_amount_date' => $this->client_pending_amount_date,
            'owner_id' => $this->owner_id,
            'owner_total_amount' => $this->owner_total_amount,
            'owner_pending_amount' => $this->owner_pending_amount,
            'owner_pending_amount_date' => $this->owner_pending_amount_date,
            'created_date' => $this->created_date,
        ]);

        return $dataProvider;
    }
}
