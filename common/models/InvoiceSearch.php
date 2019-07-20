<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Invoice;

/**
 * InvoiceSearch represents the model behind the search form of `common\models\Invoice`.
 */
class InvoiceSearch extends Invoice
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['invoiceitemid', 'propertyid', 'payment_id', 'finyearid', 'isActive'], 'integer'],
            [['invoiceID', 'createdAt', 'remarks'], 'safe'],
            [['amount', 'concessionAmount'], 'number'],
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
        $user_id = Yii::$app->user->identity->id; 
        $query = Invoice::find()->where(['user_id' => $user_id]);

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
            'invoiceitemid' => $this->invoiceitemid,
            'propertyid' => $this->propertyid,
            'payment_id' => $this->payment_id,
            'finyearid' => $this->finyearid,
            'amount' => $this->amount,
            'isActive' => $this->isActive,
            'createdAt' => $this->createdAt,
            'concessionAmount' => $this->concessionAmount,
        ]);

        $query->andFilterWhere(['like', 'invoiceID', $this->invoiceID])
            ->andFilterWhere(['like', 'remarks', $this->remarks]);

        return $dataProvider;
    }
}
