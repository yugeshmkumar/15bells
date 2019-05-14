<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\UserProfileEx;

/**
 * UserProfileExSearch represents the model behind the search form about `common\models\UserProfileEx`.
 */
class UserProfileExSearch extends UserProfileEx
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'user_id', 'emailid', 'mobileid','martial_status', 'cur_addressid1', 'per_addressid1', 'isActive'], 'integer'],
            [['title', 'gender', 'pan_card_number', 'adhar_number', 'dob', 'created_at', 'updated_at'], 'safe'],
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
        $query = UserProfileEx::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'user_id' => $this->user_id,
            'emailid' => $this->emailid,
            'mobileid' => $this->mobileid,
            'cur_addressid1' => $this->cur_addressid1,
            'per_addressid1' => $this->per_addressid1,
            'dob' => $this->dob,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'isActive' => $this->isActive,
        ]);

        $query->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'gender', $this->gender])
			->andFilterWhere(['like', 'martial_status', $this->martial_status])
		     ->andFilterWhere(['like', 'pan_card_number', $this->pan_card_number])
            ->andFilterWhere(['like', 'adhar_number', $this->adhar_number]);

        return $dataProvider;
    }
}
