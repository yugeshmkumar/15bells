<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Aggrementmgmt;

/**
 * AggrementmgmtSearch represents the model behind the search form about `common\models\Aggrementmgmt`.
 */
class AggrementmgmtSearch extends Aggrementmgmt
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'roleid', 'aggrement_status', 'ispublish', 'isactive'], 'integer'],
            [['subject', 'content', 'decription', 'fromdatetime', 'todatetime', 'eventname', 'created_at', 'updated_at'], 'safe'],
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
        $query = Aggrementmgmt::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'roleid' => $this->roleid,
            'fromdatetime' => $this->fromdatetime,
            'todatetime' => $this->todatetime,
            'aggrement_status' => $this->aggrement_status,
            'ispublish' => $this->ispublish,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'isactive' => $this->isactive,
        ]);

        $query->andFilterWhere(['like', 'subject', $this->subject])
            ->andFilterWhere(['like', 'content', $this->content])
            ->andFilterWhere(['like', 'decription', $this->decription])
            ->andFilterWhere(['like', 'eventname', $this->eventname]);

        return $dataProvider;
    }
}
