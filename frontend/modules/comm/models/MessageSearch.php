<?php

namespace frontend\modules\comm\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\modules\comm\models\Message;

/**
 * MessageSearch represents the model behind the search form about `frontend\modules\comm\models\Message`.
 */
class MessageSearch extends Message
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'messagechannelID', 'algoID', 'isactive'], 'integer'],
            [['subject', 'body', 'message_type', 'recurring_frequency', 'attach_file_name', 'attach_file_path', 'attach_file_original_name', 'created_at', 'updated_at'], 'safe'],
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
        $query = Message::find();

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
            'messagechannelID' => $this->messagechannelID,
            'algoID' => $this->algoID,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'isactive' => $this->isactive,
        ]);

        $query->andFilterWhere(['like', 'subject', $this->subject])
            ->andFilterWhere(['like', 'body', $this->body])
            ->andFilterWhere(['like', 'message_type', $this->message_type])
            ->andFilterWhere(['like', 'recurring_frequency', $this->recurring_frequency])
            ->andFilterWhere(['like', 'attach_file_name', $this->attach_file_name])
            ->andFilterWhere(['like', 'attach_file_path', $this->attach_file_path])
            ->andFilterWhere(['like', 'attach_file_original_name', $this->attach_file_original_name]);

        return $dataProvider;
    }
}
