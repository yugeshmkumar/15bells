<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Myprofile;

/**
 * MyprofileSearch represents the model behind the search form about `common\models\Myprofile`.
 */
class MyprofileSearch extends Myprofile
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'emailid', 'mobileid', 'isactive'], 'integer'],
            [['title', 'first_name', 'last_name', 'dob', 'gender', 'martial_status', 'minor', 'relatnshp_with_minor', 'guardian_name', 'pan_card_no', 'adhar_card_no', 'current_country', 'current_state', 'current_city', 'current_pincode', 'permanent_country', 'permanent_state', 'permanent_city', 'permanent_pincode', 'created_at', 'updated_at'], 'safe'],
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
        $query = Myprofile::find();

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
            'emailid' => $this->emailid,
            'mobileid' => $this->mobileid,
            'dob' => $this->dob,
            'isactive' => $this->isactive,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'first_name', $this->first_name])
            ->andFilterWhere(['like', 'last_name', $this->last_name])
            ->andFilterWhere(['like', 'gender', $this->gender])
            ->andFilterWhere(['like', 'martial_status', $this->martial_status])
            ->andFilterWhere(['like', 'minor', $this->minor])
            ->andFilterWhere(['like', 'relatnshp_with_minor', $this->relatnshp_with_minor])
            ->andFilterWhere(['like', 'guardian_name', $this->guardian_name])
            ->andFilterWhere(['like', 'pan_card_no', $this->pan_card_no])
            ->andFilterWhere(['like', 'adhar_card_no', $this->adhar_card_no])
            ->andFilterWhere(['like', 'current_country', $this->current_country])
            ->andFilterWhere(['like', 'current_state', $this->current_state])
            ->andFilterWhere(['like', 'current_city', $this->current_city])
            ->andFilterWhere(['like', 'current_pincode', $this->current_pincode])
            ->andFilterWhere(['like', 'permanent_country', $this->permanent_country])
            ->andFilterWhere(['like', 'permanent_state', $this->permanent_state])
            ->andFilterWhere(['like', 'permanent_city', $this->permanent_city])
            ->andFilterWhere(['like', 'permanent_pincode', $this->permanent_pincode]);

        return $dataProvider;
    }
}
