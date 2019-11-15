<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\AuctionParticipants;

/**
 * AuctionParticipantsSearch represents the model behind the search form about `common\models\AuctionParticipants`.
 */
class AuctionParticipantsSearch extends AuctionParticipants
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'vr_roomID', 'roleID', 'partcipantID', 'isactive'], 'integer'],
            [['assigned_time', 'unassigned_time', 'checkotp', 'created_at', 'updated_at'], 'safe'],
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
        $query = AuctionParticipants::find()->where(['partcipantID'=>Yii::$app->user->identity->id]);

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
            'vr_roomID' => $this->vr_roomID,
            'roleID' => $this->roleID,
            'partcipantID' => $this->partcipantID,
            'assigned_time' => $this->assigned_time,
            'unassigned_time' => $this->unassigned_time,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'isactive' => $this->isactive,
        ]);

        $query->andFilterWhere(['like', 'checkotp', $this->checkotp]);

        return $dataProvider;
    }
}
