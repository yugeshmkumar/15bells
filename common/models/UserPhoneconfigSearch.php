<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\UserPhoneconfig;

/**
 * UserPhoneconfigSearch represents the model behind the search form about `common\models\UserPhoneconfig`.
 */
class UserPhoneconfigSearch extends UserPhoneconfig
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'roleid', 'userid', 'phoneid', 'isdefault', 'isactive'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
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
        $query = UserPhoneconfig::find();

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
            'roleid' => $this->roleid,
            'userid' => $this->userid,
            'phoneid' => $this->phoneid,
            'isdefault' => $this->isdefault,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'isactive' => $this->isactive,
        ]);

        return $dataProvider;
    }
}
