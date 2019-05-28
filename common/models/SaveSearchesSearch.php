<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\SaveSearches;

/**
 * SaveSearchesSearch represents the model behind the search form of `common\models\SaveSearches`.
 */
class SaveSearchesSearch extends SaveSearches
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'user_id', 'property_type', 'area', 'min_prices', 'max_prices'], 'integer'],
            [['role_type', 'search_for', 'type', 'geometry', 'radius', 'location_name', 'town', 'sector', 'country', 'area_unit', 'property_auction_type', 'status', 'created_date', 'updated_date'], 'safe'],
            [['lat', 'lng'], 'number'],
        ];
    }

    /**
     * {@inheritdoc}
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
        $user_id = Yii::$app->user->identity->id; 
        $query = SaveSearches::find()->where(['user_id' => $user_id])->andwhere(['role_type'=>'buyer']);

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
            'user_id' => $this->user_id,
            'lat' => $this->lat,
            'lng' => $this->lng,
            'property_type' => $this->property_type,
            'area' => $this->area,
            'min_prices' => $this->min_prices,
            'max_prices' => $this->max_prices,
            'created_date' => $this->created_date,
            'updated_date' => $this->updated_date,
        ]);

        $query->andFilterWhere(['like', 'role_type', $this->role_type])
            ->andFilterWhere(['like', 'search_for', $this->search_for])
            ->andFilterWhere(['like', 'type', $this->type])
            ->andFilterWhere(['like', 'geometry', $this->geometry])
            ->andFilterWhere(['like', 'radius', $this->radius])
            ->andFilterWhere(['like', 'location_name', $this->location_name])
            ->andFilterWhere(['like', 'town', $this->town])
            ->andFilterWhere(['like', 'sector', $this->sector])
            ->andFilterWhere(['like', 'country', $this->country])
            ->andFilterWhere(['like', 'area_unit', $this->area_unit])
            ->andFilterWhere(['like', 'property_auction_type', $this->property_auction_type])
            ->andFilterWhere(['like', 'status', $this->status]);

        return $dataProvider;
    }

    public function searchles($params)
    {

        $user_id = Yii::$app->user->identity->id; 
        $query = SaveSearches::find()->where(['user_id' => $user_id])->andwhere(['role_type'=>'lessee']);

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
            'user_id' => $this->user_id,
            'lat' => $this->lat,
            'lng' => $this->lng,
            'property_type' => $this->property_type,
            'area' => $this->area,
            'min_prices' => $this->min_prices,
            'max_prices' => $this->max_prices,
            'created_date' => $this->created_date,
            'updated_date' => $this->updated_date,
        ]);

        $query->andFilterWhere(['like', 'role_type', $this->role_type])
            ->andFilterWhere(['like', 'search_for', $this->search_for])
            ->andFilterWhere(['like', 'type', $this->type])
            ->andFilterWhere(['like', 'geometry', $this->geometry])
            ->andFilterWhere(['like', 'radius', $this->radius])
            ->andFilterWhere(['like', 'location_name', $this->location_name])
            ->andFilterWhere(['like', 'town', $this->town])
            ->andFilterWhere(['like', 'sector', $this->sector])
            ->andFilterWhere(['like', 'country', $this->country])
            ->andFilterWhere(['like', 'area_unit', $this->area_unit])
            ->andFilterWhere(['like', 'property_auction_type', $this->property_auction_type])
            ->andFilterWhere(['like', 'status', $this->status]);

        return $dataProvider;
    }


    public function searchbuy($params)
    {
        $query = SaveSearches::find();

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
            'user_id' => $this->user_id,
            'lat' => $this->lat,
            'lng' => $this->lng,
            'property_type' => $this->property_type,
            'area' => $this->area,
            'min_prices' => $this->min_prices,
            'max_prices' => $this->max_prices,
            'created_date' => $this->created_date,
            'updated_date' => $this->updated_date,
        ]);

        $query->andFilterWhere(['like', 'role_type', $this->role_type])
            ->andFilterWhere(['like', 'search_for', $this->search_for])
            ->andFilterWhere(['like', 'type', $this->type])
            ->andFilterWhere(['like', 'geometry', $this->geometry])
            ->andFilterWhere(['like', 'radius', $this->radius])
            ->andFilterWhere(['like', 'location_name', $this->location_name])
            ->andFilterWhere(['like', 'town', $this->town])
            ->andFilterWhere(['like', 'sector', $this->sector])
            ->andFilterWhere(['like', 'country', $this->country])
            ->andFilterWhere(['like', 'area_unit', $this->area_unit])
            ->andFilterWhere(['like', 'property_auction_type', $this->property_auction_type])
            ->andFilterWhere(['like', 'status', $this->status]);

        return $dataProvider;
    }
}
