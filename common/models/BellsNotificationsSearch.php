<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\BellsNotifications;

/**
 * BellsNotificationsSearch represents the model behind the search form about `common\models\BellsNotifications`.
 */
class BellsNotificationsSearch extends BellsNotifications
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'isactive'], 'integer'],
            [['descr', 'when', 'created_at', 'updated_at','process_name'], 'safe'],
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
        $query = BellsNotifications::find();

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
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'isactive' => $this->isactive,
        ]);

        $query->andFilterWhere(['like', 'descr', $this->descr])
		      ->andFilterWhere(['like', 'process_name', $this->process_name])
              ->andFilterWhere(['like', 'when', $this->when]);

        return $dataProvider;
    }
}
