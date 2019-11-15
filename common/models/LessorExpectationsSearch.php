<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\LessorExpectations;

/**
 * LessorExpectationsSearch represents the model behind the search form about `common\models\LessorExpectations`.
 */
class LessorExpectationsSearch extends LessorExpectations
{
    /**
     * @inheritdoc
     */

    public $priority;
    public function rules()
    {
        return [
            [['id', 'user_id', 'property_id', 'interest_security', 'rent', 'escalation_value', 'escalation_month', 'maintenance_value', 'last_date_rent', 'fit_out_period', 'present_electricity_load', 'car_parking', 'stamp_duty_lessor', 'stamp_duty_lessee', 'usuable_area_length', 'usuable_area_breadth'], 'integer'],
            [['user_type', 'save_search_as', 'auto_cad_drawing', 'site_approval', 'wet_points', 'interest_negotiable', 'agreement', 'agreement_negotiable', 'lease_tenure', 'tenure_negotiable', 'lock_in_period', 'lock_negotiable', 'rent_unit', 'rent_negotiable', 'escalation_negotiable', 'maintenance_unit', 'maintenance_hours', 'maintenance_subject_change', 'last_date_negotiable', 'fit_out_negotiable', 'canBeIncreased_electricity', 'clarity_on_meter', 'power_backup', 'power_can_be_discussed', 'seperate_space', 'motor_water_supply', 'water_supply_part_maintenance', 'working_restriction', 'washroom_provision', 'is_active', 'created_date','priority'], 'safe'],
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
        $query = LessorExpectations::find();

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
            'property_id' => $this->property_id,
            'interest_security' => $this->interest_security,
            'rent' => $this->rent,
            'escalation_value' => $this->escalation_value,
            'escalation_month' => $this->escalation_month,
            'maintenance_value' => $this->maintenance_value,
            'last_date_rent' => $this->last_date_rent,
            'fit_out_period' => $this->fit_out_period,
            'present_electricity_load' => $this->present_electricity_load,
            'car_parking' => $this->car_parking,
            'stamp_duty_lessor' => $this->stamp_duty_lessor,
            'stamp_duty_lessee' => $this->stamp_duty_lessee,
            'usuable_area_length' => $this->usuable_area_length,
            'usuable_area_breadth' => $this->usuable_area_breadth,
            'created_date' => $this->created_date,
        ]);

        $query->andFilterWhere(['like', 'user_type', $this->user_type])
            ->andFilterWhere(['like', 'save_search_as', $this->save_search_as])
            ->andFilterWhere(['like', 'auto_cad_drawing', $this->auto_cad_drawing])
            ->andFilterWhere(['like', 'site_approval', $this->site_approval])
            ->andFilterWhere(['like', 'wet_points', $this->wet_points])
            ->andFilterWhere(['like', 'interest_negotiable', $this->interest_negotiable])
            ->andFilterWhere(['like', 'agreement', $this->agreement])
            ->andFilterWhere(['like', 'agreement_negotiable', $this->agreement_negotiable])
            ->andFilterWhere(['like', 'lease_tenure', $this->lease_tenure])
            ->andFilterWhere(['like', 'tenure_negotiable', $this->tenure_negotiable])
            ->andFilterWhere(['like', 'lock_in_period', $this->lock_in_period])
            ->andFilterWhere(['like', 'lock_negotiable', $this->lock_negotiable])
            ->andFilterWhere(['like', 'rent_unit', $this->rent_unit])
            ->andFilterWhere(['like', 'rent_negotiable', $this->rent_negotiable])
            ->andFilterWhere(['like', 'escalation_negotiable', $this->escalation_negotiable])
            ->andFilterWhere(['like', 'maintenance_unit', $this->maintenance_unit])
            ->andFilterWhere(['like', 'maintenance_hours', $this->maintenance_hours])
            ->andFilterWhere(['like', 'maintenance_subject_change', $this->maintenance_subject_change])
            ->andFilterWhere(['like', 'last_date_negotiable', $this->last_date_negotiable])
            ->andFilterWhere(['like', 'fit_out_negotiable', $this->fit_out_negotiable])
            ->andFilterWhere(['like', 'canBeIncreased_electricity', $this->canBeIncreased_electricity])
            ->andFilterWhere(['like', 'clarity_on_meter', $this->clarity_on_meter])
            ->andFilterWhere(['like', 'power_backup', $this->power_backup])
            ->andFilterWhere(['like', 'power_can_be_discussed', $this->power_can_be_discussed])
            ->andFilterWhere(['like', 'seperate_space', $this->seperate_space])
            ->andFilterWhere(['like', 'motor_water_supply', $this->motor_water_supply])
            ->andFilterWhere(['like', 'water_supply_part_maintenance', $this->water_supply_part_maintenance])
            ->andFilterWhere(['like', 'working_restriction', $this->working_restriction])
            ->andFilterWhere(['like', 'washroom_provision', $this->washroom_provision])
            ->andFilterWhere(['like', 'is_active', $this->is_active]);

        return $dataProvider;
    }






    public function searched($params,$ids)
    {
        $query = LessorExpectations::find()->where(['user_id' => $ids]);

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
            'property_id' => $this->property_id,
            'interest_security' => $this->interest_security,
            'rent' => $this->rent,
            'escalation_value' => $this->escalation_value,
            'escalation_month' => $this->escalation_month,
            'maintenance_value' => $this->maintenance_value,
            'last_date_rent' => $this->last_date_rent,
            'fit_out_period' => $this->fit_out_period,
            'present_electricity_load' => $this->present_electricity_load,
            'car_parking' => $this->car_parking,
            'stamp_duty_lessor' => $this->stamp_duty_lessor,
            'stamp_duty_lessee' => $this->stamp_duty_lessee,
            'usuable_area_length' => $this->usuable_area_length,
            'usuable_area_breadth' => $this->usuable_area_breadth,
            'created_date' => $this->created_date,
        ]);

        $query->andFilterWhere(['like', 'user_type', $this->user_type])
            ->andFilterWhere(['like', 'save_search_as', $this->save_search_as])
            ->andFilterWhere(['like', 'auto_cad_drawing', $this->auto_cad_drawing])
            ->andFilterWhere(['like', 'site_approval', $this->site_approval])
            ->andFilterWhere(['like', 'wet_points', $this->wet_points])
            ->andFilterWhere(['like', 'interest_negotiable', $this->interest_negotiable])
            ->andFilterWhere(['like', 'agreement', $this->agreement])
            ->andFilterWhere(['like', 'agreement_negotiable', $this->agreement_negotiable])
            ->andFilterWhere(['like', 'lease_tenure', $this->lease_tenure])
            ->andFilterWhere(['like', 'tenure_negotiable', $this->tenure_negotiable])
            ->andFilterWhere(['like', 'lock_in_period', $this->lock_in_period])
            ->andFilterWhere(['like', 'lock_negotiable', $this->lock_negotiable])
            ->andFilterWhere(['like', 'rent_unit', $this->rent_unit])
            ->andFilterWhere(['like', 'rent_negotiable', $this->rent_negotiable])
            ->andFilterWhere(['like', 'escalation_negotiable', $this->escalation_negotiable])
            ->andFilterWhere(['like', 'maintenance_unit', $this->maintenance_unit])
            ->andFilterWhere(['like', 'maintenance_hours', $this->maintenance_hours])
            ->andFilterWhere(['like', 'maintenance_subject_change', $this->maintenance_subject_change])
            ->andFilterWhere(['like', 'last_date_negotiable', $this->last_date_negotiable])
            ->andFilterWhere(['like', 'fit_out_negotiable', $this->fit_out_negotiable])
            ->andFilterWhere(['like', 'canBeIncreased_electricity', $this->canBeIncreased_electricity])
            ->andFilterWhere(['like', 'clarity_on_meter', $this->clarity_on_meter])
            ->andFilterWhere(['like', 'power_backup', $this->power_backup])
            ->andFilterWhere(['like', 'power_can_be_discussed', $this->power_can_be_discussed])
            ->andFilterWhere(['like', 'seperate_space', $this->seperate_space])
            ->andFilterWhere(['like', 'motor_water_supply', $this->motor_water_supply])
            ->andFilterWhere(['like', 'water_supply_part_maintenance', $this->water_supply_part_maintenance])
            ->andFilterWhere(['like', 'working_restriction', $this->working_restriction])
            ->andFilterWhere(['like', 'washroom_provision', $this->washroom_provision])
            ->andFilterWhere(['like', 'is_active', $this->is_active]);

        return $dataProvider;
    }











    public function searchles($params)
    {
        $user_id = Yii::$app->user->identity->id;
        $query = LessorExpectations::find()->where(['user_id' => $user_id])->andwhere(['user_type'=>'lessor'])->andwhere(['is_active'=>'1']);
         //echo '<pre>';print_r($query);die;

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
            'property_id' => $this->property_id,
            'interest_security' => $this->interest_security,
            'rent' => $this->rent,
            'escalation_value' => $this->escalation_value,
            'escalation_month' => $this->escalation_month,
            'maintenance_value' => $this->maintenance_value,
            'last_date_rent' => $this->last_date_rent,
            'fit_out_period' => $this->fit_out_period,
            'present_electricity_load' => $this->present_electricity_load,
            'car_parking' => $this->car_parking,
            'stamp_duty_lessor' => $this->stamp_duty_lessor,
            'stamp_duty_lessee' => $this->stamp_duty_lessee,
            'usuable_area_length' => $this->usuable_area_length,
            'usuable_area_breadth' => $this->usuable_area_breadth,
            'created_date' => $this->created_date,
        ]);

        $query->andFilterWhere(['like', 'user_type', $this->user_type])
            ->andFilterWhere(['like', 'save_search_as', $this->save_search_as])
            ->andFilterWhere(['like', 'auto_cad_drawing', $this->auto_cad_drawing])
            ->andFilterWhere(['like', 'site_approval', $this->site_approval])
            ->andFilterWhere(['like', 'wet_points', $this->wet_points])
            ->andFilterWhere(['like', 'interest_negotiable', $this->interest_negotiable])
            ->andFilterWhere(['like', 'agreement', $this->agreement])
            ->andFilterWhere(['like', 'agreement_negotiable', $this->agreement_negotiable])
            ->andFilterWhere(['like', 'lease_tenure', $this->lease_tenure])
            ->andFilterWhere(['like', 'tenure_negotiable', $this->tenure_negotiable])
            ->andFilterWhere(['like', 'lock_in_period', $this->lock_in_period])
            ->andFilterWhere(['like', 'lock_negotiable', $this->lock_negotiable])
            ->andFilterWhere(['like', 'rent_unit', $this->rent_unit])
            ->andFilterWhere(['like', 'rent_negotiable', $this->rent_negotiable])
            ->andFilterWhere(['like', 'escalation_negotiable', $this->escalation_negotiable])
            ->andFilterWhere(['like', 'maintenance_unit', $this->maintenance_unit])
            ->andFilterWhere(['like', 'maintenance_hours', $this->maintenance_hours])
            ->andFilterWhere(['like', 'maintenance_subject_change', $this->maintenance_subject_change])
            ->andFilterWhere(['like', 'last_date_negotiable', $this->last_date_negotiable])
            ->andFilterWhere(['like', 'fit_out_negotiable', $this->fit_out_negotiable])
            ->andFilterWhere(['like', 'canBeIncreased_electricity', $this->canBeIncreased_electricity])
            ->andFilterWhere(['like', 'clarity_on_meter', $this->clarity_on_meter])
            ->andFilterWhere(['like', 'power_backup', $this->power_backup])
            ->andFilterWhere(['like', 'power_can_be_discussed', $this->power_can_be_discussed])
            ->andFilterWhere(['like', 'seperate_space', $this->seperate_space])
            ->andFilterWhere(['like', 'motor_water_supply', $this->motor_water_supply])
            ->andFilterWhere(['like', 'water_supply_part_maintenance', $this->water_supply_part_maintenance])
            ->andFilterWhere(['like', 'working_restriction', $this->working_restriction])
            ->andFilterWhere(['like', 'washroom_provision', $this->washroom_provision])
            ->andFilterWhere(['like', 'is_active', $this->is_active]);

        return $dataProvider;
    }



    public function searchless($params)
    {
        $user_id = $_GET['id'];
        $query = LessorExpectations::find()->where(['user_id' => $user_id])->andwhere(['user_type'=>'lessor'])->andwhere(['is_active'=>'1']);
        

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
            'property_id' => $this->property_id,
            'interest_security' => $this->interest_security,
            'rent' => $this->rent,
            'escalation_value' => $this->escalation_value,
            'escalation_month' => $this->escalation_month,
            'maintenance_value' => $this->maintenance_value,
            'last_date_rent' => $this->last_date_rent,
            'fit_out_period' => $this->fit_out_period,
            'present_electricity_load' => $this->present_electricity_load,
            'car_parking' => $this->car_parking,
            'stamp_duty_lessor' => $this->stamp_duty_lessor,
            'stamp_duty_lessee' => $this->stamp_duty_lessee,
            'usuable_area_length' => $this->usuable_area_length,
            'usuable_area_breadth' => $this->usuable_area_breadth,
            'created_date' => $this->created_date,
        ]);

        $query->andFilterWhere(['like', 'user_type', $this->user_type])
            ->andFilterWhere(['like', 'save_search_as', $this->save_search_as])
            ->andFilterWhere(['like', 'auto_cad_drawing', $this->auto_cad_drawing])
            ->andFilterWhere(['like', 'site_approval', $this->site_approval])
            ->andFilterWhere(['like', 'wet_points', $this->wet_points])
            ->andFilterWhere(['like', 'interest_negotiable', $this->interest_negotiable])
            ->andFilterWhere(['like', 'agreement', $this->agreement])
            ->andFilterWhere(['like', 'agreement_negotiable', $this->agreement_negotiable])
            ->andFilterWhere(['like', 'lease_tenure', $this->lease_tenure])
            ->andFilterWhere(['like', 'tenure_negotiable', $this->tenure_negotiable])
            ->andFilterWhere(['like', 'lock_in_period', $this->lock_in_period])
            ->andFilterWhere(['like', 'lock_negotiable', $this->lock_negotiable])
            ->andFilterWhere(['like', 'rent_unit', $this->rent_unit])
            ->andFilterWhere(['like', 'rent_negotiable', $this->rent_negotiable])
            ->andFilterWhere(['like', 'escalation_negotiable', $this->escalation_negotiable])
            ->andFilterWhere(['like', 'maintenance_unit', $this->maintenance_unit])
            ->andFilterWhere(['like', 'maintenance_hours', $this->maintenance_hours])
            ->andFilterWhere(['like', 'maintenance_subject_change', $this->maintenance_subject_change])
            ->andFilterWhere(['like', 'last_date_negotiable', $this->last_date_negotiable])
            ->andFilterWhere(['like', 'fit_out_negotiable', $this->fit_out_negotiable])
            ->andFilterWhere(['like', 'canBeIncreased_electricity', $this->canBeIncreased_electricity])
            ->andFilterWhere(['like', 'clarity_on_meter', $this->clarity_on_meter])
            ->andFilterWhere(['like', 'power_backup', $this->power_backup])
            ->andFilterWhere(['like', 'power_can_be_discussed', $this->power_can_be_discussed])
            ->andFilterWhere(['like', 'seperate_space', $this->seperate_space])
            ->andFilterWhere(['like', 'motor_water_supply', $this->motor_water_supply])
            ->andFilterWhere(['like', 'water_supply_part_maintenance', $this->water_supply_part_maintenance])
            ->andFilterWhere(['like', 'working_restriction', $this->working_restriction])
            ->andFilterWhere(['like', 'washroom_provision', $this->washroom_provision])
            ->andFilterWhere(['like', 'is_active', $this->is_active]);

        return $dataProvider;
    }


   public function searchlee($params)
    {
        
        $user_id = Yii::$app->user->identity->id; 
        $query = LessorExpectations::find()->where(['user_id' => $user_id])->andwhere(['user_type'=>'lessee'])->andwhere(['is_active'=>'1']);


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
            'property_id' => $this->property_id,
            'interest_security' => $this->interest_security,
            'rent' => $this->rent,
            'escalation_value' => $this->escalation_value,
            'escalation_month' => $this->escalation_month,
            'maintenance_value' => $this->maintenance_value,
            'last_date_rent' => $this->last_date_rent,
            'fit_out_period' => $this->fit_out_period,
            'present_electricity_load' => $this->present_electricity_load,
            'car_parking' => $this->car_parking,
            'stamp_duty_lessor' => $this->stamp_duty_lessor,
            'stamp_duty_lessee' => $this->stamp_duty_lessee,
            'usuable_area_length' => $this->usuable_area_length,
            'usuable_area_breadth' => $this->usuable_area_breadth,
            'created_date' => $this->created_date,
        ]);

        $query->andFilterWhere(['like', 'user_type', $this->user_type])
            ->andFilterWhere(['like', 'save_search_as', $this->save_search_as])
            ->andFilterWhere(['like', 'auto_cad_drawing', $this->auto_cad_drawing])
            ->andFilterWhere(['like', 'site_approval', $this->site_approval])
            ->andFilterWhere(['like', 'wet_points', $this->wet_points])
            ->andFilterWhere(['like', 'interest_negotiable', $this->interest_negotiable])
            ->andFilterWhere(['like', 'agreement', $this->agreement])
            ->andFilterWhere(['like', 'agreement_negotiable', $this->agreement_negotiable])
            ->andFilterWhere(['like', 'lease_tenure', $this->lease_tenure])
            ->andFilterWhere(['like', 'tenure_negotiable', $this->tenure_negotiable])
            ->andFilterWhere(['like', 'lock_in_period', $this->lock_in_period])
            ->andFilterWhere(['like', 'lock_negotiable', $this->lock_negotiable])
            ->andFilterWhere(['like', 'rent_unit', $this->rent_unit])
            ->andFilterWhere(['like', 'rent_negotiable', $this->rent_negotiable])
            ->andFilterWhere(['like', 'escalation_negotiable', $this->escalation_negotiable])
            ->andFilterWhere(['like', 'maintenance_unit', $this->maintenance_unit])
            ->andFilterWhere(['like', 'maintenance_hours', $this->maintenance_hours])
            ->andFilterWhere(['like', 'maintenance_subject_change', $this->maintenance_subject_change])
            ->andFilterWhere(['like', 'last_date_negotiable', $this->last_date_negotiable])
            ->andFilterWhere(['like', 'fit_out_negotiable', $this->fit_out_negotiable])
            ->andFilterWhere(['like', 'canBeIncreased_electricity', $this->canBeIncreased_electricity])
            ->andFilterWhere(['like', 'clarity_on_meter', $this->clarity_on_meter])
            ->andFilterWhere(['like', 'power_backup', $this->power_backup])
            ->andFilterWhere(['like', 'power_can_be_discussed', $this->power_can_be_discussed])
            ->andFilterWhere(['like', 'seperate_space', $this->seperate_space])
            ->andFilterWhere(['like', 'motor_water_supply', $this->motor_water_supply])
            ->andFilterWhere(['like', 'water_supply_part_maintenance', $this->water_supply_part_maintenance])
            ->andFilterWhere(['like', 'working_restriction', $this->working_restriction])
            ->andFilterWhere(['like', 'washroom_provision', $this->washroom_provision])
            ->andFilterWhere(['like', 'is_active', $this->is_active]);

        return $dataProvider;
    }


      public function searchlees($params)
    {
        
        $user_id = $_GET['id'];
        $query = LessorExpectations::find()->where(['user_id' => $user_id])->andwhere(['user_type'=>'lessee'])->andwhere(['is_active'=>'1']);


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
            'property_id' => $this->property_id,
            'interest_security' => $this->interest_security,
            'rent' => $this->rent,
            'escalation_value' => $this->escalation_value,
            'escalation_month' => $this->escalation_month,
            'maintenance_value' => $this->maintenance_value,
            'last_date_rent' => $this->last_date_rent,
            'fit_out_period' => $this->fit_out_period,
            'present_electricity_load' => $this->present_electricity_load,
            'car_parking' => $this->car_parking,
            'stamp_duty_lessor' => $this->stamp_duty_lessor,
            'stamp_duty_lessee' => $this->stamp_duty_lessee,
            'usuable_area_length' => $this->usuable_area_length,
            'usuable_area_breadth' => $this->usuable_area_breadth,
            'created_date' => $this->created_date,
        ]);

        $query->andFilterWhere(['like', 'user_type', $this->user_type])
            ->andFilterWhere(['like', 'save_search_as', $this->save_search_as])
            ->andFilterWhere(['like', 'auto_cad_drawing', $this->auto_cad_drawing])
            ->andFilterWhere(['like', 'site_approval', $this->site_approval])
            ->andFilterWhere(['like', 'wet_points', $this->wet_points])
            ->andFilterWhere(['like', 'interest_negotiable', $this->interest_negotiable])
            ->andFilterWhere(['like', 'agreement', $this->agreement])
            ->andFilterWhere(['like', 'agreement_negotiable', $this->agreement_negotiable])
            ->andFilterWhere(['like', 'lease_tenure', $this->lease_tenure])
            ->andFilterWhere(['like', 'tenure_negotiable', $this->tenure_negotiable])
            ->andFilterWhere(['like', 'lock_in_period', $this->lock_in_period])
            ->andFilterWhere(['like', 'lock_negotiable', $this->lock_negotiable])
            ->andFilterWhere(['like', 'rent_unit', $this->rent_unit])
            ->andFilterWhere(['like', 'rent_negotiable', $this->rent_negotiable])
            ->andFilterWhere(['like', 'escalation_negotiable', $this->escalation_negotiable])
            ->andFilterWhere(['like', 'maintenance_unit', $this->maintenance_unit])
            ->andFilterWhere(['like', 'maintenance_hours', $this->maintenance_hours])
            ->andFilterWhere(['like', 'maintenance_subject_change', $this->maintenance_subject_change])
            ->andFilterWhere(['like', 'last_date_negotiable', $this->last_date_negotiable])
            ->andFilterWhere(['like', 'fit_out_negotiable', $this->fit_out_negotiable])
            ->andFilterWhere(['like', 'canBeIncreased_electricity', $this->canBeIncreased_electricity])
            ->andFilterWhere(['like', 'clarity_on_meter', $this->clarity_on_meter])
            ->andFilterWhere(['like', 'power_backup', $this->power_backup])
            ->andFilterWhere(['like', 'power_can_be_discussed', $this->power_can_be_discussed])
            ->andFilterWhere(['like', 'seperate_space', $this->seperate_space])
            ->andFilterWhere(['like', 'motor_water_supply', $this->motor_water_supply])
            ->andFilterWhere(['like', 'water_supply_part_maintenance', $this->water_supply_part_maintenance])
            ->andFilterWhere(['like', 'working_restriction', $this->working_restriction])
            ->andFilterWhere(['like', 'washroom_provision', $this->washroom_provision])
            ->andFilterWhere(['like', 'is_active', $this->is_active]);

        return $dataProvider;
    }


}
