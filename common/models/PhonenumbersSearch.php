<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Phonenumbers;

/**
 * PhonenumbersSearch represents the model behind the search form about `\common\models\Phonenumbers`.
 */
class PhonenumbersSearch extends Phonenumbers
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'isdefault', 'isActive'], 'integer'],
            [['country_code', 'phone_no', 'phonetype', 'created_at', 'updated_at'], 'safe'],
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
        $query = Phonenumbers::find();

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
            'isdefault' => $this->isdefault,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'isActive' => $this->isActive,
        ]);

        $query->andFilterWhere(['like', 'country_code', $this->country_code])
            ->andFilterWhere(['like', 'phone_no', $this->phone_no])
            ->andFilterWhere(['like', 'phonetype', $this->phonetype]);

        return $dataProvider;
    }
}
