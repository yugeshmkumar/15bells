<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\MyProfileProgressStatus;

/**
 * MyProfileProgressStatusSearch represents the model behind the search form about `common\models\MyProfileProgressStatus`.
 */
class MyProfileProgressStatusSearch extends MyProfileProgressStatus
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'user_id', 'active', 'property_id', 'role_id'], 'integer'],
            [['process_name', 'process_status', 'created_at', 'updated_at'], 'safe'],
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
        $query = MyProfileProgressStatus::find();

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
            'user_id' => $this->user_id,
            'active' => $this->active,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'property_id' => $this->property_id,
            'role_id' => $this->role_id,
        ]);

        $query->andFilterWhere(['like', 'process_name', $this->process_name])
            ->andFilterWhere(['like', 'process_status', $this->process_status]);

        return $dataProvider;
    }
}
