<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\RequestSiteVisitbin;
use common\models\CompanyEmp;
use common\models\User;


/**
 * RequestSiteVisitbinSearch represents the model behind the search form about `common\models\RequestSiteVisitbin`.
 */
class RequestSiteVisitbinSearch extends RequestSiteVisitbin
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['request_id', 'property_id', 'company_id'], 'integer'],
            [['request_status', 'reason','user_id', 'scheduled_time', 'confirm', 'created_date','visit_type','visit_status_confirm'], 'safe'],
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
        $query = RequestSiteVisitbin::find()->where(['assigned_to_id'=>$assigned_id])->andwhere(['<>','status', '2'])->orderBy([
            'scheduled_time' => SORT_DESC
            
          ]);
       
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
             
        ]);
        

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        
        $query->andFilterWhere([
            'request_id' => $this->request_id,
            'user_id' => $this->user_id,
            'visit_type' => $this->visit_type,
            'property_id' => $this->property_id,
            'company_id' => $this->company_id,
            //'scheduled_time' => $this->scheduled_time,
            'created_date' => $this->created_date,
        ]);

        $query->andFilterWhere(['like', 'request_status', $this->request_status])
           
            ->andFilterWhere(['like', 'feedback', $this->feedback])
            ->andFilterWhere(['like', 'visit_status_confirm', $this->visit_status_confirm]);
           
        $query->andWhere('scheduled_time LIKE "'.$this->scheduled_time . '%" ');

        return $dataProvider;
    }
}
