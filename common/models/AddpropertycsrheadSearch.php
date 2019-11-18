<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Addpropertycsrhead;

/**
 * AddpropertycsrheadSearch represents the model behind the search form about `common\models\Addpropertycsrhead`.
 */
class AddpropertycsrheadSearch extends Addpropertycsrhead
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'user_id', 'builder_id', 'project_type_id', 'no_of_similiar_shops', 'buildup_area', 'expected_price', 'asking_rental_price', 'membership_charge', 'min_super_area', 'super_area', 'carpet_area', 'total_floors', 'floors_allowed_construction', 'bedrooms', 'bathrooms', 'balconies', 'parking'], 'integer'],
            [['builder_total_area', 'longitude', 'latitude', 'price_sq_ft', 'price_acres', 'maintenance_cost', 'FAR_approval'], 'number'],
            [['role_id', 'project_name', 'property_for', 'request_for', 'featured_image', 'featured_video', 'city', 'locality', 'town_name', 'sector_name', 'address', 'build_unit', 'price_negotiable', 'revenue_lauout', 'interior_details', 'present_status', 'jurisdiction_development', 'shed_RCC', 'maintenance_cost_unit', 'maintenance_by', 'annual_dues_payable', 'expected_rental', 'availability', 'available_from', 'available_date', 'age_of_property', 'possesion_by', 'rental_type', 'ownership', 'ownership_status', 'facing', 'LOAN_taken', 'super_unit', 'carpet_unit', 'property_on_floor', 'configuration', 'pooja_room', 'study_room', 'servant_room', 'other_room', 'furnished_status', 'is_active', 'created_date', 'status'], 'safe'],
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
        $query = Addpropertycsrhead::find();

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
            'user_id' => $this->user_id,
            'builder_id' => $this->builder_id,
            'builder_total_area' => $this->builder_total_area,
            'project_type_id' => $this->project_type_id,
            'longitude' => $this->longitude,
            'latitude' => $this->latitude,
            'no_of_similiar_shops' => $this->no_of_similiar_shops,
            'buildup_area' => $this->buildup_area,
            'expected_price' => $this->expected_price,
            'asking_rental_price' => $this->asking_rental_price,
            'price_sq_ft' => $this->price_sq_ft,
            'price_acres' => $this->price_acres,
            'maintenance_cost' => $this->maintenance_cost,
            'membership_charge' => $this->membership_charge,
            'available_date' => $this->available_date,
            'FAR_approval' => $this->FAR_approval,
            'min_super_area' => $this->min_super_area,
            'super_area' => $this->super_area,
            'carpet_area' => $this->carpet_area,
            'total_floors' => $this->total_floors,
            'floors_allowed_construction' => $this->floors_allowed_construction,
            'bedrooms' => $this->bedrooms,
            'bathrooms' => $this->bathrooms,
            'balconies' => $this->balconies,
            'parking' => $this->parking,
            'created_date' => $this->created_date,
        ]);

        $query->andFilterWhere(['like', 'role_id', $this->role_id])
            ->andFilterWhere(['like', 'project_name', $this->project_name])
            ->andFilterWhere(['like', 'property_for', $this->property_for])
            ->andFilterWhere(['like', 'request_for', $this->request_for])
            ->andFilterWhere(['like', 'featured_image', $this->featured_image])
            ->andFilterWhere(['like', 'featured_video', $this->featured_video])
            ->andFilterWhere(['like', 'city', $this->city])
            ->andFilterWhere(['like', 'locality', $this->locality])
            ->andFilterWhere(['like', 'town_name', $this->town_name])
            ->andFilterWhere(['like', 'sector_name', $this->sector_name])
            ->andFilterWhere(['like', 'address', $this->address])
            ->andFilterWhere(['like', 'build_unit', $this->build_unit])
            ->andFilterWhere(['like', 'price_negotiable', $this->price_negotiable])
            ->andFilterWhere(['like', 'revenue_lauout', $this->revenue_lauout])
            ->andFilterWhere(['like', 'interior_details', $this->interior_details])
            ->andFilterWhere(['like', 'present_status', $this->present_status])
            ->andFilterWhere(['like', 'jurisdiction_development', $this->jurisdiction_development])
            ->andFilterWhere(['like', 'shed_RCC', $this->shed_RCC])
            ->andFilterWhere(['like', 'maintenance_cost_unit', $this->maintenance_cost_unit])
            ->andFilterWhere(['like', 'maintenance_by', $this->maintenance_by])
            ->andFilterWhere(['like', 'annual_dues_payable', $this->annual_dues_payable])
            ->andFilterWhere(['like', 'expected_rental', $this->expected_rental])
            ->andFilterWhere(['like', 'availability', $this->availability])
            ->andFilterWhere(['like', 'available_from', $this->available_from])
            ->andFilterWhere(['like', 'age_of_property', $this->age_of_property])
            ->andFilterWhere(['like', 'possesion_by', $this->possesion_by])
            ->andFilterWhere(['like', 'rental_type', $this->rental_type])
            ->andFilterWhere(['like', 'ownership', $this->ownership])
            ->andFilterWhere(['like', 'ownership_status', $this->ownership_status])
            ->andFilterWhere(['like', 'facing', $this->facing])
            ->andFilterWhere(['like', 'LOAN_taken', $this->LOAN_taken])
            ->andFilterWhere(['like', 'super_unit', $this->super_unit])
            ->andFilterWhere(['like', 'carpet_unit', $this->carpet_unit])
            ->andFilterWhere(['like', 'property_on_floor', $this->property_on_floor])
            ->andFilterWhere(['like', 'configuration', $this->configuration])
            ->andFilterWhere(['like', 'pooja_room', $this->pooja_room])
            ->andFilterWhere(['like', 'study_room', $this->study_room])
            ->andFilterWhere(['like', 'servant_room', $this->servant_room])
            ->andFilterWhere(['like', 'other_room', $this->other_room])
            ->andFilterWhere(['like', 'furnished_status', $this->furnished_status])
            ->andFilterWhere(['like', 'is_active', $this->is_active])
            ->andFilterWhere(['like', 'status', $this->status]);

        return $dataProvider;
    }
}
