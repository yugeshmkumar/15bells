<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\VRWin;

/**
 * VRWinSearch represents the model behind the search form of `common\models\VRWin`.
 */
class VRWinSearch extends VRWin
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'vr_id', 'prop_id', 'lesse_buyer_id', 'lessor_seller_id', 'status'], 'integer'],
            [['auction_type', 'created_date'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
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
        $query = VRWin::find();

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
            'vr_id' => $this->vr_id,
            'prop_id' => $this->prop_id,
            'lesse_buyer_id' => $this->lesse_buyer_id,
            'lessor_seller_id' => $this->lessor_seller_id,
            'status' => $this->status,
            'created_date' => $this->created_date,
        ]);

        $query->andFilterWhere(['like', 'auction_type', $this->auction_type]);

        return $dataProvider;
    }
}
