<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Schoolcalendar;

/**
* SchoolcalendarSearch represents the model behind the search form about `common\models\Schoolcalendar`.
*/
class SchoolcalendarSearch extends Schoolcalendar
{
/**
* @inheritdoc
*/
public function rules()
{
return [
[['id', 'entry_type', 'schoolsub_catID', 'isactive'], 'integer'],
            [['color', 'link', 'fromdatetime', 'todatetime', 'publish', 'created_at', 'updated_at'], 'safe'],
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
$query = Schoolcalendar::find();

$dataProvider = new ActiveDataProvider([
'query' => $query,
]);

$this->load($params);

if (!$this->validate()) {
// uncomment the following line if you do not want to any records when validation fails
// $query->where('0=1');
return $dataProvider;
}

$query->andFilterWhere([
            'id' => $this->id,
            'entry_type' => $this->entry_type,
            'schoolsub_catID' => $this->schoolsub_catID,
            'fromdatetime' => $this->fromdatetime,
            'todatetime' => $this->todatetime,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'isactive' => $this->isactive,
        ]);

        $query->andFilterWhere(['like', 'color', $this->color])
            ->andFilterWhere(['like', 'link', $this->link])
            ->andFilterWhere(['like', 'publish', $this->publish]);

return $dataProvider;
}
}