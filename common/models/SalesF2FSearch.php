<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\SalesF2F;

/**
 * SalesF2FSearch represents the model behind the search form about `common\models\SalesF2F`.
 */
class SalesF2FSearch extends SalesF2F
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'buyer_id', 'sellor_id', 'property_id', 'sales_executive_id'], 'integer'],
            [['meeting_date_time', 'status', 'comment', 'created_date'], 'safe'],
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
        $querys = \common\models\CompanyEmpb::find()->where(['userid'=>$user_id])->one();
         $assigned_id = $querys->id;


        $query = SalesF2F::find()->where(['sales_executive_id'=>$assigned_id]);

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
            'buyer_id' => $this->buyer_id,
            'sellor_id' => $this->sellor_id,
            'property_id' => $this->property_id,
            'sales_executive_id' => $this->sales_executive_id,
            'meeting_date_time' => $this->meeting_date_time,
            'created_date' => $this->created_date,
        ]);

        $query->andFilterWhere(['like', 'status', $this->status])
            ->andFilterWhere(['like', 'comment', $this->comment]);

        return $dataProvider;
    }
}
