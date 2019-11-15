<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Addproperty;

/**
 * AddpropertySearch represents the model behind the search form about `common\models\Addproperty`.
 */
class AddpropertySearch extends Addproperty
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'user_id', 'role_id', 'project_type_id', 'city', 'expected_price', 'price_sq_ft', 'price_acres', 'buildup_area', 'carpet_area', 'total_floors', 'property_on_floor', 'configuration', 'floors_allowed_construction', 'bedrooms', 'bathrooms', 'balconies', 'parking'], 'integer'],
            [['project_name', 'property_for','request_for', 'featured_image', 'featured_video', 'locality','super_unit','super_area','expected_price','asking_rental_price', 'address', 'price_negotiable', 'revenue_lauout', 'present_status', 'jurisdiction_development', 'shed_RCC', 'maintenance_cost', 'maintenance_by', 'annual_dues_payable', 'expected_rental', 'availability', 'age_of_property', 'possesion_by', 'ownership', 'facing', 'FAR_approval', 'LOAN_taken', 'build_unit', 'carpet_unit', 'pooja_room', 'study_room', 'servant_room', 'other_room', 'furnished_status', 'is_active', 'created_date'], 'safe'],
            [['longitude', 'latitude'], 'number'],
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
        $query = Addproperty::find();

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
            'role_id' => $this->role_id,
            'project_type_id' => $this->project_type_id,
            'city' => $this->city,
            'property_for' => $this->property_for,
            'longitude' => $this->longitude,
            'latitude' => $this->latitude,
            
            'expected_price' => $this->expected_price,
            'price_sq_ft' => $this->price_sq_ft,
            'price_acres' => $this->price_acres,
            'buildup_area' => $this->buildup_area,
            'carpet_area' => $this->carpet_area,
            'total_floors' => $this->total_floors,
            'property_on_floor' => $this->property_on_floor,
            'configuration' => $this->configuration,
            'floors_allowed_construction' => $this->floors_allowed_construction,
            'bedrooms' => $this->bedrooms,
            'bathrooms' => $this->bathrooms,
            'balconies' => $this->balconies,
            'parking' => $this->parking,
            'created_date' => $this->created_date,
        ]);

        $query->andFilterWhere(['like', 'project_name', $this->project_name])
            ->andFilterWhere(['like', 'request_for', $this->request_for])
            ->andFilterWhere(['like', 'property_for', $this->property_for])
            ->andFilterWhere(['like', 'featured_image', $this->featured_image])
            ->andFilterWhere(['like', 'featured_video', $this->featured_video])
            ->andFilterWhere(['like', 'locality', $this->locality])
            ->andFilterWhere(['like', 'address', $this->address])
           // ->andFilterWhere(['like', 'all_inclusive_price', $this->all_inclusive_price])
            ->andFilterWhere(['like', 'price_negotiable', $this->price_negotiable])
            ->andFilterWhere(['like', 'revenue_lauout', $this->revenue_lauout])
            ->andFilterWhere(['like', 'present_status', $this->present_status])
            ->andFilterWhere(['like', 'jurisdiction_development', $this->jurisdiction_development])
            ->andFilterWhere(['like', 'shed_RCC', $this->shed_RCC])
            ->andFilterWhere(['like', 'maintenance_cost', $this->maintenance_cost])
            ->andFilterWhere(['like', 'maintenance_by', $this->maintenance_by])
            ->andFilterWhere(['like', 'annual_dues_payable', $this->annual_dues_payable])
            ->andFilterWhere(['like', 'expected_rental', $this->expected_rental])
            ->andFilterWhere(['like', 'availability', $this->availability])
            ->andFilterWhere(['like', 'age_of_property', $this->age_of_property])
            ->andFilterWhere(['like', 'possesion_by', $this->possesion_by])
           // ->andFilterWhere(['like', 'transaction_type', $this->transaction_type])
            ->andFilterWhere(['like', 'ownership', $this->ownership])
            ->andFilterWhere(['like', 'facing', $this->facing])
            ->andFilterWhere(['like', 'FAR_approval', $this->FAR_approval])
            ->andFilterWhere(['like', 'LOAN_taken', $this->LOAN_taken])
            ->andFilterWhere(['like', 'build_unit', $this->build_unit])
            ->andFilterWhere(['like', 'carpet_unit', $this->carpet_unit])
            ->andFilterWhere(['like', 'pooja_room', $this->pooja_room])
            ->andFilterWhere(['like', 'study_room', $this->study_room])
            ->andFilterWhere(['like', 'servant_room', $this->servant_room])
            ->andFilterWhere(['like', 'other_room', $this->other_room])
            ->andFilterWhere(['like', 'furnished_status', $this->furnished_status])
            ->andFilterWhere(['like', 'is_active', $this->is_active]);

        return $dataProvider;
    }





      public function searchl($params)
    {
        $user_id = Yii::$app->user->identity->id; 
        $query = Addproperty::find()->where(['user_id' => $user_id])->andwhere(['role_id'=>'lessor'])->andwhere(['is_active'=>'1']);

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
            'role_id' => $this->role_id,
            'project_type_id' => $this->project_type_id,
            'city' => $this->city,
            'property_for' => $this->property_for,
            'longitude' => $this->longitude,
            'latitude' => $this->latitude,
            
            'expected_price' => $this->expected_price,
            'price_sq_ft' => $this->price_sq_ft,
            'price_acres' => $this->price_acres,
            'buildup_area' => $this->buildup_area,
            'carpet_area' => $this->carpet_area,
            'total_floors' => $this->total_floors,
            'property_on_floor' => $this->property_on_floor,
            'configuration' => $this->configuration,
            'floors_allowed_construction' => $this->floors_allowed_construction,
            'bedrooms' => $this->bedrooms,
            'bathrooms' => $this->bathrooms,
            'balconies' => $this->balconies,
            'parking' => $this->parking,
            'created_date' => $this->created_date,
        ]);

        $query->andFilterWhere(['like', 'project_name', $this->project_name])
            ->andFilterWhere(['like', 'request_for', $this->request_for])
            ->andFilterWhere(['like', 'property_for', $this->property_for])
            ->andFilterWhere(['like', 'featured_image', $this->featured_image])
            ->andFilterWhere(['like', 'featured_video', $this->featured_video])
            ->andFilterWhere(['like', 'locality', $this->locality])
            ->andFilterWhere(['like', 'address', $this->address])
          
           // ->andFilterWhere(['like', 'all_inclusive_price', $this->all_inclusive_price])
            ->andFilterWhere(['like', 'price_negotiable', $this->price_negotiable])
            ->andFilterWhere(['like', 'revenue_lauout', $this->revenue_lauout])
            ->andFilterWhere(['like', 'present_status', $this->present_status])
            ->andFilterWhere(['like', 'jurisdiction_development', $this->jurisdiction_development])
            ->andFilterWhere(['like', 'shed_RCC', $this->shed_RCC])
            ->andFilterWhere(['like', 'maintenance_cost', $this->maintenance_cost])
            ->andFilterWhere(['like', 'maintenance_by', $this->maintenance_by])
            ->andFilterWhere(['like', 'annual_dues_payable', $this->annual_dues_payable])
            ->andFilterWhere(['like', 'expected_rental', $this->expected_rental])
            ->andFilterWhere(['like', 'availability', $this->availability])
            ->andFilterWhere(['like', 'age_of_property', $this->age_of_property])
            ->andFilterWhere(['like', 'possesion_by', $this->possesion_by])
           // ->andFilterWhere(['like', 'transaction_type', $this->transaction_type])
            ->andFilterWhere(['like', 'ownership', $this->ownership])
            ->andFilterWhere(['like', 'facing', $this->facing])
            ->andFilterWhere(['like', 'FAR_approval', $this->FAR_approval])
            ->andFilterWhere(['like', 'LOAN_taken', $this->LOAN_taken])
            ->andFilterWhere(['like', 'build_unit', $this->build_unit])
            ->andFilterWhere(['like', 'carpet_unit', $this->carpet_unit])
            ->andFilterWhere(['like', 'pooja_room', $this->pooja_room])
            ->andFilterWhere(['like', 'study_room', $this->study_room])
            ->andFilterWhere(['like', 'servant_room', $this->servant_room])
            ->andFilterWhere(['like', 'other_room', $this->other_room])
            ->andFilterWhere(['like', 'furnished_status', $this->furnished_status])
            ->andFilterWhere(['like', 'is_active', $this->is_active]);

        return $dataProvider;
    }



      //backend start//

 public function searchlbac($params,$user_id)
    {
        //$user_id = Yii::$app->user->identity->id; 
        $query = Addproperty::find()->where(['user_id' => $user_id])->andwhere(['role_id'=>'lessor'])->andwhere(['is_active'=>'1']);

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
            'role_id' => $this->role_id,
            'project_type_id' => $this->project_type_id,
            'city' => $this->city,
            'property_for' => $this->property_for,
            'longitude' => $this->longitude,
            'latitude' => $this->latitude,
           
            'expected_price' => $this->expected_price,
            'price_sq_ft' => $this->price_sq_ft,
            'price_acres' => $this->price_acres,
            'buildup_area' => $this->buildup_area,
            'carpet_area' => $this->carpet_area,
            'total_floors' => $this->total_floors,
            'property_on_floor' => $this->property_on_floor,
            'configuration' => $this->configuration,
            'floors_allowed_construction' => $this->floors_allowed_construction,
            'bedrooms' => $this->bedrooms,
            'bathrooms' => $this->bathrooms,
            'balconies' => $this->balconies,
            'parking' => $this->parking,
            'created_date' => $this->created_date,
        ]);

        $query->andFilterWhere(['like', 'project_name', $this->project_name])
            ->andFilterWhere(['like', 'request_for', $this->request_for])
            ->andFilterWhere(['like', 'property_for', $this->property_for])
            ->andFilterWhere(['like', 'featured_image', $this->featured_image])
            ->andFilterWhere(['like', 'featured_video', $this->featured_video])
            ->andFilterWhere(['like', 'locality', $this->locality])
            ->andFilterWhere(['like', 'address', $this->address])
           
           // ->andFilterWhere(['like', 'all_inclusive_price', $this->all_inclusive_price])
            ->andFilterWhere(['like', 'price_negotiable', $this->price_negotiable])
            ->andFilterWhere(['like', 'revenue_lauout', $this->revenue_lauout])
            ->andFilterWhere(['like', 'present_status', $this->present_status])
            ->andFilterWhere(['like', 'jurisdiction_development', $this->jurisdiction_development])
            ->andFilterWhere(['like', 'shed_RCC', $this->shed_RCC])
            ->andFilterWhere(['like', 'maintenance_cost', $this->maintenance_cost])
            ->andFilterWhere(['like', 'maintenance_by', $this->maintenance_by])
            ->andFilterWhere(['like', 'annual_dues_payable', $this->annual_dues_payable])
            ->andFilterWhere(['like', 'expected_rental', $this->expected_rental])
            ->andFilterWhere(['like', 'availability', $this->availability])
            ->andFilterWhere(['like', 'age_of_property', $this->age_of_property])
            ->andFilterWhere(['like', 'possesion_by', $this->possesion_by])
           // ->andFilterWhere(['like', 'transaction_type', $this->transaction_type])
            ->andFilterWhere(['like', 'ownership', $this->ownership])
            ->andFilterWhere(['like', 'facing', $this->facing])
            ->andFilterWhere(['like', 'FAR_approval', $this->FAR_approval])
            ->andFilterWhere(['like', 'LOAN_taken', $this->LOAN_taken])
            ->andFilterWhere(['like', 'build_unit', $this->build_unit])
            ->andFilterWhere(['like', 'carpet_unit', $this->carpet_unit])
            ->andFilterWhere(['like', 'pooja_room', $this->pooja_room])
            ->andFilterWhere(['like', 'study_room', $this->study_room])
            ->andFilterWhere(['like', 'servant_room', $this->servant_room])
            ->andFilterWhere(['like', 'other_room', $this->other_room])
            ->andFilterWhere(['like', 'furnished_status', $this->furnished_status])
            ->andFilterWhere(['like', 'is_active', $this->is_active]);

        return $dataProvider;
    }



     public function searchsbac($params,$user_id)
    {

       // $user_id = Yii::$app->user->identity->id; 
        $query = Addproperty::find()->where(['user_id' => $user_id])->andwhere(['role_id'=>'seller'])->andwhere(['is_active'=>'1']);

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
            'role_id' => $this->role_id,
            'project_type_id' => $this->project_type_id,
            'city' => $this->city,
            'property_for' => $this->property_for,
            'longitude' => $this->longitude,
            'latitude' => $this->latitude,
           
            'expected_price' => $this->expected_price,
            'price_sq_ft' => $this->price_sq_ft,
            'price_acres' => $this->price_acres,
            'buildup_area' => $this->buildup_area,
            'carpet_area' => $this->carpet_area,
            'total_floors' => $this->total_floors,
            'property_on_floor' => $this->property_on_floor,
            'configuration' => $this->configuration,
            'floors_allowed_construction' => $this->floors_allowed_construction,
            'bedrooms' => $this->bedrooms,
            'bathrooms' => $this->bathrooms,
            'balconies' => $this->balconies,
            'parking' => $this->parking,
            'created_date' => $this->created_date,
        ]);

        $query->andFilterWhere(['like', 'project_name', $this->project_name])
            ->andFilterWhere(['like', 'request_for', $this->request_for])
            ->andFilterWhere(['like', 'property_for', $this->property_for])
            ->andFilterWhere(['like', 'featured_image', $this->featured_image])
            ->andFilterWhere(['like', 'featured_video', $this->featured_video])
            ->andFilterWhere(['like', 'locality', $this->locality])
            ->andFilterWhere(['like', 'address', $this->address])
           
           // ->andFilterWhere(['like', 'all_inclusive_price', $this->all_inclusive_price])
            ->andFilterWhere(['like', 'price_negotiable', $this->price_negotiable])
            ->andFilterWhere(['like', 'revenue_lauout', $this->revenue_lauout])
            ->andFilterWhere(['like', 'present_status', $this->present_status])
            ->andFilterWhere(['like', 'jurisdiction_development', $this->jurisdiction_development])
            ->andFilterWhere(['like', 'shed_RCC', $this->shed_RCC])
            ->andFilterWhere(['like', 'maintenance_cost', $this->maintenance_cost])
            ->andFilterWhere(['like', 'maintenance_by', $this->maintenance_by])
            ->andFilterWhere(['like', 'annual_dues_payable', $this->annual_dues_payable])
            ->andFilterWhere(['like', 'expected_rental', $this->expected_rental])
            ->andFilterWhere(['like', 'availability', $this->availability])
            ->andFilterWhere(['like', 'age_of_property', $this->age_of_property])
            ->andFilterWhere(['like', 'possesion_by', $this->possesion_by])
           // ->andFilterWhere(['like', 'transaction_type', $this->transaction_type])
            ->andFilterWhere(['like', 'ownership', $this->ownership])
            ->andFilterWhere(['like', 'facing', $this->facing])
            ->andFilterWhere(['like', 'FAR_approval', $this->FAR_approval])
            ->andFilterWhere(['like', 'LOAN_taken', $this->LOAN_taken])
            ->andFilterWhere(['like', 'build_unit', $this->build_unit])
            ->andFilterWhere(['like', 'carpet_unit', $this->carpet_unit])
            ->andFilterWhere(['like', 'pooja_room', $this->pooja_room])
            ->andFilterWhere(['like', 'study_room', $this->study_room])
            ->andFilterWhere(['like', 'servant_room', $this->servant_room])
            ->andFilterWhere(['like', 'other_room', $this->other_room])
            ->andFilterWhere(['like', 'furnished_status', $this->furnished_status])
            ->andFilterWhere(['like', 'is_active', $this->is_active]);

        return $dataProvider;
    }





//backend end//




     public function searchls($params)
    {
        $user_id = $_GET['id']; 
        $query = Addproperty::find()->where(['user_id' => $user_id])->andwhere(['role_id'=>'lessor'])->andwhere(['is_active'=>'1']);

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
            'role_id' => $this->role_id,
            'project_type_id' => $this->project_type_id,
            'city' => $this->city,
            'property_for' => $this->property_for,
            'longitude' => $this->longitude,
            'latitude' => $this->latitude,
          
            'expected_price' => $this->expected_price,
            'price_sq_ft' => $this->price_sq_ft,
            'price_acres' => $this->price_acres,
            'buildup_area' => $this->buildup_area,
            'carpet_area' => $this->carpet_area,
            'total_floors' => $this->total_floors,
            'property_on_floor' => $this->property_on_floor,
            'configuration' => $this->configuration,
            'floors_allowed_construction' => $this->floors_allowed_construction,
            'bedrooms' => $this->bedrooms,
            'bathrooms' => $this->bathrooms,
            'balconies' => $this->balconies,
            'parking' => $this->parking,
            'created_date' => $this->created_date,
        ]);

        $query->andFilterWhere(['like', 'project_name', $this->project_name])
            ->andFilterWhere(['like', 'request_for', $this->request_for])
            ->andFilterWhere(['like', 'property_for', $this->property_for])
            ->andFilterWhere(['like', 'featured_image', $this->featured_image])
            ->andFilterWhere(['like', 'featured_video', $this->featured_video])
            ->andFilterWhere(['like', 'locality', $this->locality])
            ->andFilterWhere(['like', 'address', $this->address])
           
           // ->andFilterWhere(['like', 'all_inclusive_price', $this->all_inclusive_price])
            ->andFilterWhere(['like', 'price_negotiable', $this->price_negotiable])
            ->andFilterWhere(['like', 'revenue_lauout', $this->revenue_lauout])
            ->andFilterWhere(['like', 'present_status', $this->present_status])
            ->andFilterWhere(['like', 'jurisdiction_development', $this->jurisdiction_development])
            ->andFilterWhere(['like', 'shed_RCC', $this->shed_RCC])
            ->andFilterWhere(['like', 'maintenance_cost', $this->maintenance_cost])
            ->andFilterWhere(['like', 'maintenance_by', $this->maintenance_by])
            ->andFilterWhere(['like', 'annual_dues_payable', $this->annual_dues_payable])
            ->andFilterWhere(['like', 'expected_rental', $this->expected_rental])
            ->andFilterWhere(['like', 'availability', $this->availability])
            ->andFilterWhere(['like', 'age_of_property', $this->age_of_property])
            ->andFilterWhere(['like', 'possesion_by', $this->possesion_by])
           // ->andFilterWhere(['like', 'transaction_type', $this->transaction_type])
            ->andFilterWhere(['like', 'ownership', $this->ownership])
            ->andFilterWhere(['like', 'facing', $this->facing])
            ->andFilterWhere(['like', 'FAR_approval', $this->FAR_approval])
            ->andFilterWhere(['like', 'LOAN_taken', $this->LOAN_taken])
            ->andFilterWhere(['like', 'build_unit', $this->build_unit])
            ->andFilterWhere(['like', 'carpet_unit', $this->carpet_unit])
            ->andFilterWhere(['like', 'pooja_room', $this->pooja_room])
            ->andFilterWhere(['like', 'study_room', $this->study_room])
            ->andFilterWhere(['like', 'servant_room', $this->servant_room])
            ->andFilterWhere(['like', 'other_room', $this->other_room])
            ->andFilterWhere(['like', 'furnished_status', $this->furnished_status])
            ->andFilterWhere(['like', 'is_active', $this->is_active]);

        return $dataProvider;
    }



     public function searchlesview($params)
    {
        $user_id = Yii::$app->user->identity->id; 
        $query = Addproperty::find()->where(['user_id' => $user_id])->andwhere(['role_id'=>'lessor'])->andwhere(['is_active'=>'1']);

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
            'role_id' => $this->role_id,
            'project_type_id' => $this->project_type_id,
            'city' => $this->city,
            'property_for' => $this->property_for,
            'longitude' => $this->longitude,
            'latitude' => $this->latitude,
           
            'expected_price' => $this->expected_price,
            'price_sq_ft' => $this->price_sq_ft,
            'price_acres' => $this->price_acres,
            'buildup_area' => $this->buildup_area,
            'carpet_area' => $this->carpet_area,
            'total_floors' => $this->total_floors,
            'property_on_floor' => $this->property_on_floor,
            'configuration' => $this->configuration,
            'floors_allowed_construction' => $this->floors_allowed_construction,
            'bedrooms' => $this->bedrooms,
            'bathrooms' => $this->bathrooms,
            'balconies' => $this->balconies,
            'parking' => $this->parking,
            'created_date' => $this->created_date,
        ]);

        $query->andFilterWhere(['like', 'project_name', $this->project_name])
            ->andFilterWhere(['like', 'request_for', $this->request_for])
            ->andFilterWhere(['like', 'property_for', $this->property_for])
            ->andFilterWhere(['like', 'featured_image', $this->featured_image])
            ->andFilterWhere(['like', 'featured_video', $this->featured_video])
            ->andFilterWhere(['like', 'locality', $this->locality])
            ->andFilterWhere(['like', 'address', $this->address])
          
           // ->andFilterWhere(['like', 'all_inclusive_price', $this->all_inclusive_price])
            ->andFilterWhere(['like', 'price_negotiable', $this->price_negotiable])
            ->andFilterWhere(['like', 'revenue_lauout', $this->revenue_lauout])
            ->andFilterWhere(['like', 'present_status', $this->present_status])
            ->andFilterWhere(['like', 'jurisdiction_development', $this->jurisdiction_development])
            ->andFilterWhere(['like', 'shed_RCC', $this->shed_RCC])
            ->andFilterWhere(['like', 'maintenance_cost', $this->maintenance_cost])
            ->andFilterWhere(['like', 'maintenance_by', $this->maintenance_by])
            ->andFilterWhere(['like', 'annual_dues_payable', $this->annual_dues_payable])
            ->andFilterWhere(['like', 'expected_rental', $this->expected_rental])
            ->andFilterWhere(['like', 'availability', $this->availability])
            ->andFilterWhere(['like', 'age_of_property', $this->age_of_property])
            ->andFilterWhere(['like', 'possesion_by', $this->possesion_by])
           // ->andFilterWhere(['like', 'transaction_type', $this->transaction_type])
            ->andFilterWhere(['like', 'ownership', $this->ownership])
            ->andFilterWhere(['like', 'facing', $this->facing])
            ->andFilterWhere(['like', 'FAR_approval', $this->FAR_approval])
            ->andFilterWhere(['like', 'LOAN_taken', $this->LOAN_taken])
            ->andFilterWhere(['like', 'build_unit', $this->build_unit])
            ->andFilterWhere(['like', 'carpet_unit', $this->carpet_unit])
            ->andFilterWhere(['like', 'pooja_room', $this->pooja_room])
            ->andFilterWhere(['like', 'study_room', $this->study_room])
            ->andFilterWhere(['like', 'servant_room', $this->servant_room])
            ->andFilterWhere(['like', 'other_room', $this->other_room])
            ->andFilterWhere(['like', 'furnished_status', $this->furnished_status])
            ->andFilterWhere(['like', 'is_active', $this->is_active]);

        return $dataProvider;
    }



     public function searchs($params)
    {

        $user_id = Yii::$app->user->identity->id; 
        $query = Addproperty::find()->where(['user_id' => $user_id])->andwhere(['role_id'=>'seller'])->andwhere(['is_active'=>'1']);

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
            'role_id' => $this->role_id,
            'project_type_id' => $this->project_type_id,
            'city' => $this->city,
            'property_for' => $this->property_for,
            'longitude' => $this->longitude,
            'latitude' => $this->latitude,

            'locality' => $this->locality,
            'super_unit' => $this->super_unit,
            'super_area' => $this->super_area,
            'request_for' => $this->request_for,
            'asking_rental_price' => $this->asking_rental_price,
           
            'expected_price' => $this->expected_price,
            'price_sq_ft' => $this->price_sq_ft,
            'price_acres' => $this->price_acres,
            'buildup_area' => $this->buildup_area,
            'carpet_area' => $this->carpet_area,
            'total_floors' => $this->total_floors,
            'property_on_floor' => $this->property_on_floor,
            'configuration' => $this->configuration,
            'floors_allowed_construction' => $this->floors_allowed_construction,
            'bedrooms' => $this->bedrooms,
            'bathrooms' => $this->bathrooms,
            'balconies' => $this->balconies,
            'parking' => $this->parking,
            'created_date' => $this->created_date,
        ]);

        $query->andFilterWhere(['like', 'project_name', $this->project_name])
            ->andFilterWhere(['like', 'request_for', $this->request_for])
            ->andFilterWhere(['like', 'property_for', $this->property_for])
            ->andFilterWhere(['like', 'featured_image', $this->featured_image])
            ->andFilterWhere(['like', 'featured_video', $this->featured_video])
            ->andFilterWhere(['like', 'locality', $this->locality])
            ->andFilterWhere(['like', 'address', $this->address])

            ->andFilterWhere(['like', 'super_unit', $this->super_unit])
            ->andFilterWhere(['like', 'super_area', $this->super_area])
            ->andFilterWhere(['like', 'asking_rental_price', $this->asking_rental_price])
            ->andFilterWhere(['like', 'expected_price', $this->expected_price])
         
           // ->andFilterWhere(['like', 'all_inclusive_price', $this->all_inclusive_price])
            ->andFilterWhere(['like', 'price_negotiable', $this->price_negotiable])
            ->andFilterWhere(['like', 'revenue_lauout', $this->revenue_lauout])
            ->andFilterWhere(['like', 'present_status', $this->present_status])
            ->andFilterWhere(['like', 'jurisdiction_development', $this->jurisdiction_development])
            ->andFilterWhere(['like', 'shed_RCC', $this->shed_RCC])
            ->andFilterWhere(['like', 'maintenance_cost', $this->maintenance_cost])
            ->andFilterWhere(['like', 'maintenance_by', $this->maintenance_by])
            ->andFilterWhere(['like', 'annual_dues_payable', $this->annual_dues_payable])
            ->andFilterWhere(['like', 'expected_rental', $this->expected_rental])
            ->andFilterWhere(['like', 'availability', $this->availability])
            ->andFilterWhere(['like', 'age_of_property', $this->age_of_property])
            ->andFilterWhere(['like', 'possesion_by', $this->possesion_by])
           // ->andFilterWhere(['like', 'transaction_type', $this->transaction_type])
            ->andFilterWhere(['like', 'ownership', $this->ownership])
            ->andFilterWhere(['like', 'facing', $this->facing])
            ->andFilterWhere(['like', 'FAR_approval', $this->FAR_approval])
            ->andFilterWhere(['like', 'LOAN_taken', $this->LOAN_taken])
            ->andFilterWhere(['like', 'build_unit', $this->build_unit])
            ->andFilterWhere(['like', 'carpet_unit', $this->carpet_unit])
            ->andFilterWhere(['like', 'pooja_room', $this->pooja_room])
            ->andFilterWhere(['like', 'study_room', $this->study_room])
            ->andFilterWhere(['like', 'servant_room', $this->servant_room])
            ->andFilterWhere(['like', 'other_room', $this->other_room])
            ->andFilterWhere(['like', 'furnished_status', $this->furnished_status])
            ->andFilterWhere(['like', 'is_active', $this->is_active]);

        return $dataProvider;
    }



   public function searchss($params)
    {

        $user_id = $_GET['id']; 
        $query = Addproperty::find()->where(['user_id' => $user_id])->andwhere(['role_id'=>'seller'])->andwhere(['is_active'=>'1']);

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
            'role_id' => $this->role_id,
            'project_type_id' => $this->project_type_id,
            'city' => $this->city,
            'property_for' => $this->property_for,
            'longitude' => $this->longitude,
            'latitude' => $this->latitude, 
            
            'expected_price' => $this->expected_price,
            'price_sq_ft' => $this->price_sq_ft,
            'price_acres' => $this->price_acres,
            'buildup_area' => $this->buildup_area,
            'carpet_area' => $this->carpet_area,
            'total_floors' => $this->total_floors,
            'property_on_floor' => $this->property_on_floor,
            'configuration' => $this->configuration,
            'floors_allowed_construction' => $this->floors_allowed_construction,
            'bedrooms' => $this->bedrooms,
            'bathrooms' => $this->bathrooms,
            'balconies' => $this->balconies,
            'parking' => $this->parking,
            'created_date' => $this->created_date,
        ]);

        $query->andFilterWhere(['like', 'project_name', $this->project_name])
            ->andFilterWhere(['like', 'request_for', $this->request_for])
            ->andFilterWhere(['like', 'property_for', $this->property_for])
            ->andFilterWhere(['like', 'featured_image', $this->featured_image])
            ->andFilterWhere(['like', 'featured_video', $this->featured_video])
            ->andFilterWhere(['like', 'locality', $this->locality])
            ->andFilterWhere(['like', 'address', $this->address])
            
           // ->andFilterWhere(['like', 'all_inclusive_price', $this->all_inclusive_price])
            ->andFilterWhere(['like', 'price_negotiable', $this->price_negotiable])
            ->andFilterWhere(['like', 'revenue_lauout', $this->revenue_lauout])
            ->andFilterWhere(['like', 'present_status', $this->present_status])
            ->andFilterWhere(['like', 'jurisdiction_development', $this->jurisdiction_development])
            ->andFilterWhere(['like', 'shed_RCC', $this->shed_RCC])
            ->andFilterWhere(['like', 'maintenance_cost', $this->maintenance_cost])
            ->andFilterWhere(['like', 'maintenance_by', $this->maintenance_by])
            ->andFilterWhere(['like', 'annual_dues_payable', $this->annual_dues_payable])
            ->andFilterWhere(['like', 'expected_rental', $this->expected_rental])
            ->andFilterWhere(['like', 'availability', $this->availability])
            ->andFilterWhere(['like', 'age_of_property', $this->age_of_property])
            ->andFilterWhere(['like', 'possesion_by', $this->possesion_by])
           // ->andFilterWhere(['like', 'transaction_type', $this->transaction_type])
            ->andFilterWhere(['like', 'ownership', $this->ownership])
            ->andFilterWhere(['like', 'facing', $this->facing])
            ->andFilterWhere(['like', 'FAR_approval', $this->FAR_approval])
            ->andFilterWhere(['like', 'LOAN_taken', $this->LOAN_taken])
            ->andFilterWhere(['like', 'build_unit', $this->build_unit])
            ->andFilterWhere(['like', 'carpet_unit', $this->carpet_unit])
            ->andFilterWhere(['like', 'pooja_room', $this->pooja_room])
            ->andFilterWhere(['like', 'study_room', $this->study_room])
            ->andFilterWhere(['like', 'servant_room', $this->servant_room])
            ->andFilterWhere(['like', 'other_room', $this->other_room])
            ->andFilterWhere(['like', 'furnished_status', $this->furnished_status])
            ->andFilterWhere(['like', 'is_active', $this->is_active]);

        return $dataProvider;
    }




    public function searchselview($params)
    {

        $user_id = Yii::$app->user->identity->id; 
        $query = Addproperty::find()->where(['user_id' => $user_id])->andwhere(['role_id'=>'seller'])->andwhere(['is_active'=>'1']);

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
            'role_id' => $this->role_id,
            'project_type_id' => $this->project_type_id,
            'city' => $this->city,
            'property_for' => $this->property_for,
            'longitude' => $this->longitude,
            'latitude' => $this->latitude,
           
            'expected_price' => $this->expected_price,
            'price_sq_ft' => $this->price_sq_ft,
            'price_acres' => $this->price_acres,
            'buildup_area' => $this->buildup_area,
            'carpet_area' => $this->carpet_area,
            'total_floors' => $this->total_floors,
            'property_on_floor' => $this->property_on_floor,
            'configuration' => $this->configuration,
            'floors_allowed_construction' => $this->floors_allowed_construction,
            'bedrooms' => $this->bedrooms,
            'bathrooms' => $this->bathrooms,
            'balconies' => $this->balconies,
            'parking' => $this->parking,
            'created_date' => $this->created_date,
        ]);

        $query->andFilterWhere(['like', 'project_name', $this->project_name])
            ->andFilterWhere(['like', 'request_for', $this->request_for])
            ->andFilterWhere(['like', 'property_for', $this->property_for])
            ->andFilterWhere(['like', 'featured_image', $this->featured_image])
            ->andFilterWhere(['like', 'featured_video', $this->featured_video])
            ->andFilterWhere(['like', 'locality', $this->locality])
            ->andFilterWhere(['like', 'address', $this->address])
            
           // ->andFilterWhere(['like', 'all_inclusive_price', $this->all_inclusive_price])
            ->andFilterWhere(['like', 'price_negotiable', $this->price_negotiable])
            ->andFilterWhere(['like', 'revenue_lauout', $this->revenue_lauout])
            ->andFilterWhere(['like', 'present_status', $this->present_status])
            ->andFilterWhere(['like', 'jurisdiction_development', $this->jurisdiction_development])
            ->andFilterWhere(['like', 'shed_RCC', $this->shed_RCC])
            ->andFilterWhere(['like', 'maintenance_cost', $this->maintenance_cost])
            ->andFilterWhere(['like', 'maintenance_by', $this->maintenance_by])
            ->andFilterWhere(['like', 'annual_dues_payable', $this->annual_dues_payable])
            ->andFilterWhere(['like', 'expected_rental', $this->expected_rental])
            ->andFilterWhere(['like', 'availability', $this->availability])
            ->andFilterWhere(['like', 'age_of_property', $this->age_of_property])
            ->andFilterWhere(['like', 'possesion_by', $this->possesion_by])
           // ->andFilterWhere(['like', 'transaction_type', $this->transaction_type])
            ->andFilterWhere(['like', 'ownership', $this->ownership])
            ->andFilterWhere(['like', 'facing', $this->facing])
            ->andFilterWhere(['like', 'FAR_approval', $this->FAR_approval])
            ->andFilterWhere(['like', 'LOAN_taken', $this->LOAN_taken])
            ->andFilterWhere(['like', 'build_unit', $this->build_unit])
            ->andFilterWhere(['like', 'carpet_unit', $this->carpet_unit])
            ->andFilterWhere(['like', 'pooja_room', $this->pooja_room])
            ->andFilterWhere(['like', 'study_room', $this->study_room])
            ->andFilterWhere(['like', 'servant_room', $this->servant_room])
            ->andFilterWhere(['like', 'other_room', $this->other_room])
            ->andFilterWhere(['like', 'furnished_status', $this->furnished_status])
            ->andFilterWhere(['like', 'is_active', $this->is_active]);

        return $dataProvider;
    }
}

