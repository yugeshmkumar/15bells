<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\FifteenbellsConfig;

/**
 * FifteenbellsConfigSearch represents the model behind the search form about `common\models\FifteenbellsConfig`.
 */
class FifteenbellsConfigSearch extends FifteenbellsConfig
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'status_value', 'isactive'], 'integer'],
            [['table_name', 'column_name', 'status_name', 'created_at', 'updated_at'], 'safe'],
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
        $query = FifteenbellsConfig::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'status_value' => $this->status_value,
            'isactive' => $this->isactive,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'table_name', $this->table_name])
            ->andFilterWhere(['like', 'column_name', $this->column_name])
            ->andFilterWhere(['like', 'status_name', $this->status_name]);

        return $dataProvider;
    }
}
