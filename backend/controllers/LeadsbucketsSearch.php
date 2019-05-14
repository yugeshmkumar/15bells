<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Leadsbuckets;

/**
 * LeadsbucketsSearch represents the model behind the search form about `common\models\Leadsbuckets`.
 */
class LeadsbucketsSearch extends Leadsbuckets
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'isactive'], 'integer'],
            [['bucketname', 'description', 'bucketfor', 'created_at', 'updated_at'], 'safe'],
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
        $query = Leadsbuckets::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'isactive' => $this->isactive,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'bucketname', $this->bucketname])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'bucketfor', $this->bucketfor]);

        return $dataProvider;
    }
}
