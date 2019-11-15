<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\AgreementLog;

/**
 * AgreementLogSearch represents the model behind the search form about `common\models\AgreementLog`.
 */
class AgreementLogSearch extends AgreementLog
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'agreement_id', 'user_id', 'curr_validity', 'role_id', 'isactive'], 'integer'],
            [['accept_date', 'created_at', 'updated_at'], 'safe'],
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
        $query = AgreementLog::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'agreement_id' => $this->agreement_id,
            'user_id' => $this->user_id,
            'accept_date' => $this->accept_date,
            'curr_validity' => $this->curr_validity,
            'role_id' => $this->role_id,
            'isactive' => $this->isactive,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        return $dataProvider;
    }
}
