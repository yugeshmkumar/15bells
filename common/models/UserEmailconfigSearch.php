<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\UserEmailconfig;

/**
 * UserEmailconfigSearch represents the model behind the search form about `common\models\UserEmailconfig`.
 */
class UserEmailconfigSearch extends UserEmailconfig
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'roleid', 'userid', 'emailid', 'isdefault', 'isactive'], 'integer'],
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
        $query = UserEmailconfig::find();

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
            'roleid' => $this->roleid,
            'userid' => $this->userid,
            'emailid' => $this->emailid,
            'isdefault' => $this->isdefault,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'isactive' => $this->isactive,
        ]);

        return $dataProvider;
    }
}
