<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Leadassignment;

/**
 * LeadassignmentSearch represents the model behind the search form about `common\models\Leadassignment`.
 */
class LeadassignmentSearch extends Leadassignment
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'leadid', 'lead_current_status_ID', 'assigned_toID', 'isactive', 'old_assigned_to'], 'integer'],
            [['currentstar', 'created_at', 'updated_at', 'assigned_at', 'unassigned_at', 'reassigned_at', 'comments'], 'safe'],
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
        $query = Leadassignment::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'leadid' => $this->leadid,
            'lead_current_status_ID' => $this->lead_current_status_ID,
            'assigned_toID' => $this->assigned_toID,
            'isactive' => $this->isactive,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'assigned_at' => $this->assigned_at,
            'unassigned_at' => $this->unassigned_at,
            'old_assigned_to' => $this->old_assigned_to,
            'reassigned_at' => $this->reassigned_at,
        ]);

        $query->andFilterWhere(['like', 'currentstar', $this->currentstar])
            ->andFilterWhere(['like', 'comments', $this->comments]);

        return $dataProvider;
    }
}
