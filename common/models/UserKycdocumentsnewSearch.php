<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\UserKycdocuments;

/**
 * UserKycdocumentsnewSearch represents the model behind the search form about `common\models\UserKycdocuments`.
 */
class UserKycdocumentsnewSearch extends UserKycdocuments
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'userid', 'approve_status', 'approved_by', 'isactive'], 'integer'],
            [['document_name', 'file_type', 'docment_file_name', 'document_file_path', 'document_file_name_extenstn', 'approve_reason', 'approved_at', 'created_at', 'updated_at'], 'safe'],
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
        $query = UserKycdocuments::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'userid' => $this->userid,
            'approve_status' => $this->approve_status,
            'approved_by' => $this->approved_by,
            'approved_at' => $this->approved_at,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'isactive' => $this->isactive,
        ]);

        $query->andFilterWhere(['like', 'document_name', $this->document_name])
            ->andFilterWhere(['like', 'file_type', $this->file_type])
            ->andFilterWhere(['like', 'docment_file_name', $this->docment_file_name])
            ->andFilterWhere(['like', 'document_file_path', $this->document_file_path])
            ->andFilterWhere(['like', 'document_file_name_extenstn', $this->document_file_name_extenstn])
            ->andFilterWhere(['like', 'approve_reason', $this->approve_reason]);

        return $dataProvider;
    }
}
