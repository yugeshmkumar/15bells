<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\RequestSiteVisit;
use common\models\CompanyEmp;

/**
 * RequestSiteVisitSearch represents the model behind the search form about `common\models\RequestSiteVisit`.
 */
class RequestSiteVisitSearch extends RequestSiteVisit
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['request_id', 'user_id', 'property_id', 'company_id', 'terms_conditions_id', 'amount_payable'], 'integer'],
            [['request_status', 'account_manager_rating', 'property_rating', 'landmark', 'terms_conditions_files', 'feedback', 'scheduled_time', 'visit_status_confirm', 'created_date'], 'safe'],
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
        $query = RequestSiteVisit::find()->where(['user_id' => $user_id])->andwhere(['status'=>1]);

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
            'request_id' => $this->request_id,
            'user_id' => $this->user_id,
            'property_id' => $this->property_id,
            'company_id' => $this->company_id,
            'terms_conditions_id' => $this->terms_conditions_id,
            'amount_payable' => $this->amount_payable,
            'scheduled_time' => $this->scheduled_time,
            'created_date' => $this->created_date,
        ]);

        $query->andFilterWhere(['like', 'request_status', $this->request_status])
            ->andFilterWhere(['like', 'account_manager_rating', $this->account_manager_rating])
            ->andFilterWhere(['like', 'property_rating', $this->property_rating])
            ->andFilterWhere(['like', 'landmark', $this->landmark])
            ->andFilterWhere(['like', 'terms_conditions_files', $this->terms_conditions_files])
            ->andFilterWhere(['like', 'feedback', $this->feedback])
            ->andFilterWhere(['like', 'visit_status_confirm', $this->visit_status_confirm]);

        return $dataProvider;
    }




    public function searched($params,$ids)
    {
       
        $user_id = $ids; 
        $query = RequestSiteVisit::find()->where(['user_id' => $ids])->andwhere(['status'=>1]);

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
            'request_id' => $this->request_id,
            'user_id' => $this->user_id,
            'property_id' => $this->property_id,
            'company_id' => $this->company_id,
            'terms_conditions_id' => $this->terms_conditions_id,
            'amount_payable' => $this->amount_payable,
            'scheduled_time' => $this->scheduled_time,
            'created_date' => $this->created_date,
        ]);

        $query->andFilterWhere(['like', 'request_status', $this->request_status])
            ->andFilterWhere(['like', 'account_manager_rating', $this->account_manager_rating])
            ->andFilterWhere(['like', 'property_rating', $this->property_rating])
            ->andFilterWhere(['like', 'landmark', $this->landmark])
            ->andFilterWhere(['like', 'terms_conditions_files', $this->terms_conditions_files])
            ->andFilterWhere(['like', 'feedback', $this->feedback])
            ->andFilterWhere(['like', 'visit_status_confirm', $this->visit_status_confirm]);

        return $dataProvider;
    }


    public function searches($params)
    {
       
        $user_id = Yii::$app->user->identity->id;
        $querys = CompanyEmp::find()->where(['userid'=>$user_id])->one();
         $assigned_id = $querys->id;
        $query = RequestSiteVisit::find()->where(['sales_id'=>$assigned_id])->andwhere(['<>','status', '2']);
       // $query = RequestSiteVisit::find()->where(['user_id' => $user_id])->andwhere(['status'=>1]);

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
            'request_id' => $this->request_id,
            'user_id' => $this->user_id,
            'property_id' => $this->property_id,
            'company_id' => $this->company_id,
            'terms_conditions_id' => $this->terms_conditions_id,
            'amount_payable' => $this->amount_payable,
            'scheduled_time' => $this->scheduled_time,
            'created_date' => $this->created_date,
        ]);

        $query->andFilterWhere(['like', 'request_status', $this->request_status])
            ->andFilterWhere(['like', 'account_manager_rating', $this->account_manager_rating])
            ->andFilterWhere(['like', 'property_rating', $this->property_rating])
            ->andFilterWhere(['like', 'landmark', $this->landmark])
            ->andFilterWhere(['like', 'terms_conditions_files', $this->terms_conditions_files])
            ->andFilterWhere(['like', 'feedback', $this->feedback])
            ->andFilterWhere(['like', 'visit_status_confirm', $this->visit_status_confirm]);

        return $dataProvider;
    }
}
