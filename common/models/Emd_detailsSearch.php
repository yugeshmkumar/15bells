<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Emd_details;

/**
 * Emd_detailsSearch represents the model behind the search form about `common\models\Emd_details`.
 */
class Emd_detailsSearch extends Emd_details
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'emd_id', 'utr_no', 'dd_no', 'tracking_id', 'payable_amount'], 'integer'],
            [['utr_bank_name', 'utr_bank_branch_name', 'utr_date', 'dd_bank_name', 'dd_bank_branch_name', 'dd_date', 'person_name', 'payment_status', 'favour_of', 'created_date'], 'safe'],
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
        $query = Emd_details::find();

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
            'emd_id' => $this->emd_id,
            'utr_no' => $this->utr_no,
            'utr_date' => $this->utr_date,
            'dd_no' => $this->dd_no,
            'dd_date' => $this->dd_date,
            'tracking_id' => $this->tracking_id,
            'payable_amount' => $this->payable_amount,
            'created_date' => $this->created_date,
        ]);

        $query->andFilterWhere(['like', 'utr_bank_name', $this->utr_bank_name])
            ->andFilterWhere(['like', 'utr_bank_branch_name', $this->utr_bank_branch_name])
            ->andFilterWhere(['like', 'dd_bank_name', $this->dd_bank_name])
            ->andFilterWhere(['like', 'dd_bank_branch_name', $this->dd_bank_branch_name])
            ->andFilterWhere(['like', 'person_name', $this->person_name])
            ->andFilterWhere(['like', 'payment_status', $this->payment_status])
            ->andFilterWhere(['like', 'favour_of', $this->favour_of]);

        return $dataProvider;
    }
}
