<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Bellsroutings;

/**
 * BellsroutingsSearch represents the model behind the search form about `common\models\Bellsroutings`.
 */
class BellsroutingsSearch extends Bellsroutings
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'user_role', 'isactive'], 'integer'],
            [['login_to', 'login_url', 'rolename','created_at', 'updated_at'], 'safe'],
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
        $query = Bellsroutings::find();

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
            'user_role' => $this->user_role,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'isactive' => $this->isactive,
        ]);

        $query->andFilterWhere(['like', 'login_to', $this->login_to])
		   ->andFilterWhere(['like', 'rolename', $this->rolename])
            ->andFilterWhere(['like', 'login_url', $this->login_url]);

        return $dataProvider;
    }
}
