<?php

namespace backend\models\AddpropertyOnepageForm;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\AddpropertyOnepageForm\AddpropertyOnepageForm;
use common\models\CompanyEmp;

/**
 * AddpropertyOnepageFormSearch represents the model behind the search form about `backend\models\AddpropertyOnepageForm\AddpropertyOnepageForm`.
 */
class AddpropertyOnepageFormSearch extends AddpropertyOnepageForm
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'company_employee_id', 'property_for', 'property_type_id', 'primary_contact_no', 'secondary_contact_no', 'buildup_area', 'carpet_area', 'total_no_of_floors', 'passenger_lift', 'service_lift', 'ceiling_height', 'floor_plate_area', 'visitor_parking', 'covered_parking', 'asking_lease_rate', 'maintenance_charge', 'security_deposit', 'lock_in_period', 'max_period_lease', 'max_rentfree_period', 'Asking_property_price', 'completion_in_percentage', 'isactive'], 'integer'],
            [['city', 'locality', 'town_name', 'sector_name', 'address', 'builder_name', 'project_name', 'Owner_name', 'landline_no', 'email_id', 'property_on_floor', 'unit_block', 'unit_number', 'buildup_unit', 'carpet_unit', 'owner_address', 'backup_power', 'building_security', 'maintenance_agency', 'type_of_space', 'rate_negotiable', 'security_negotiable', 'lock_in_negotiable', 'lease_period_restriction', 'open_rentfree_period', 'price_negotiable', 'property_with_saledeed', 'property_power_attorney', 'pan_card', 'adhar_card', 'property_tax_id', 'property_status', 'followup_date_time', 'followup_comment', 'created_date'], 'safe'],
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
        $query = AddpropertyOnepageForm::find();

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
            'company_employee_id' => $this->company_employee_id,
            'property_for' => $this->property_for,
            'longitude' => $this->longitude,
            'latitude' => $this->latitude,
            'property_type_id' => $this->property_type_id,
            'primary_contact_no' => $this->primary_contact_no,
            'secondary_contact_no' => $this->secondary_contact_no,
            'buildup_area' => $this->buildup_area,
            'carpet_area' => $this->carpet_area,
            'total_no_of_floors' => $this->total_no_of_floors,
            'passenger_lift' => $this->passenger_lift,
            'service_lift' => $this->service_lift,
            'ceiling_height' => $this->ceiling_height,
            'floor_plate_area' => $this->floor_plate_area,
            'visitor_parking' => $this->visitor_parking,
            'covered_parking' => $this->covered_parking,
            'asking_lease_rate' => $this->asking_lease_rate,
            'maintenance_charge' => $this->maintenance_charge,
            'security_deposit' => $this->security_deposit,
            'lock_in_period' => $this->lock_in_period,
            'max_period_lease' => $this->max_period_lease,
            'max_rentfree_period' => $this->max_rentfree_period,
            'Asking_property_price' => $this->Asking_property_price,
            'completion_in_percentage' => $this->completion_in_percentage,
            'followup_date_time' => $this->followup_date_time,
            'isactive' => $this->isactive,
            'created_date' => $this->created_date,
        ]);

        $query->andFilterWhere(['like', 'city', $this->city])
            ->andFilterWhere(['like', 'locality', $this->locality])
            ->andFilterWhere(['like', 'town_name', $this->town_name])
            ->andFilterWhere(['like', 'sector_name', $this->sector_name])
            ->andFilterWhere(['like', 'address', $this->address])
            ->andFilterWhere(['like', 'builder_name', $this->builder_name])
            ->andFilterWhere(['like', 'project_name', $this->project_name])
            ->andFilterWhere(['like', 'Owner_name', $this->Owner_name])
            ->andFilterWhere(['like', 'landline_no', $this->landline_no])
            ->andFilterWhere(['like', 'email_id', $this->email_id])
            ->andFilterWhere(['like', 'property_on_floor', $this->property_on_floor])
            ->andFilterWhere(['like', 'unit_block', $this->unit_block])
            ->andFilterWhere(['like', 'unit_number', $this->unit_number])
            ->andFilterWhere(['like', 'buildup_unit', $this->buildup_unit])
            ->andFilterWhere(['like', 'carpet_unit', $this->carpet_unit])
            ->andFilterWhere(['like', 'owner_address', $this->owner_address])
            ->andFilterWhere(['like', 'backup_power', $this->backup_power])
            ->andFilterWhere(['like', 'building_security', $this->building_security])
            ->andFilterWhere(['like', 'maintenance_agency', $this->maintenance_agency])
            ->andFilterWhere(['like', 'type_of_space', $this->type_of_space])
            ->andFilterWhere(['like', 'rate_negotiable', $this->rate_negotiable])
            ->andFilterWhere(['like', 'security_negotiable', $this->security_negotiable])
            ->andFilterWhere(['like', 'lock_in_negotiable', $this->lock_in_negotiable])
            ->andFilterWhere(['like', 'lease_period_restriction', $this->lease_period_restriction])
            ->andFilterWhere(['like', 'open_rentfree_period', $this->open_rentfree_period])
            ->andFilterWhere(['like', 'price_negotiable', $this->price_negotiable])
            ->andFilterWhere(['like', 'property_with_saledeed', $this->property_with_saledeed])
            ->andFilterWhere(['like', 'property_power_attorney', $this->property_power_attorney])
            ->andFilterWhere(['like', 'pan_card', $this->pan_card])
            ->andFilterWhere(['like', 'adhar_card', $this->adhar_card])
            ->andFilterWhere(['like', 'property_tax_id', $this->property_tax_id])
            ->andFilterWhere(['like', 'property_status', $this->property_status])
            ->andFilterWhere(['like', 'followup_comment', $this->followup_comment]);

        return $dataProvider;
    }


    public function searchcsr($params)
    {

         $user_id = Yii::$app->user->identity->id;
         $querys = CompanyEmp::find()->where(['userid'=>$user_id])->one();
         $assigned_id = $querys->id;
        $query = AddpropertyOnepageForm::find()->Where(['company_employee_id'=>$assigned_id])->groupBy(['primary_contact_no']);

       // echo '<pre>';print_r($query);die;

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
            'company_employee_id' => $this->company_employee_id,
            'property_for' => $this->property_for,
            'longitude' => $this->longitude,
            'latitude' => $this->latitude,
            'property_type_id' => $this->property_type_id,
            'primary_contact_no' => $this->primary_contact_no,
            'secondary_contact_no' => $this->secondary_contact_no,
            'buildup_area' => $this->buildup_area,
            'carpet_area' => $this->carpet_area,
            'total_no_of_floors' => $this->total_no_of_floors,
            'passenger_lift' => $this->passenger_lift,
            'service_lift' => $this->service_lift,
            'ceiling_height' => $this->ceiling_height,
            'floor_plate_area' => $this->floor_plate_area,
            'visitor_parking' => $this->visitor_parking,
            'covered_parking' => $this->covered_parking,
            'asking_lease_rate' => $this->asking_lease_rate,
            'maintenance_charge' => $this->maintenance_charge,
            'security_deposit' => $this->security_deposit,
            'lock_in_period' => $this->lock_in_period,
            'max_period_lease' => $this->max_period_lease,
            'max_rentfree_period' => $this->max_rentfree_period,
            'Asking_property_price' => $this->Asking_property_price,
            'completion_in_percentage' => $this->completion_in_percentage,
            'followup_date_time' => $this->followup_date_time,
            'isactive' => $this->isactive,
            'created_date' => $this->created_date,
        ]);

        $query->andFilterWhere(['like', 'city', $this->city])
            ->andFilterWhere(['like', 'locality', $this->locality])
            ->andFilterWhere(['like', 'town_name', $this->town_name])
            ->andFilterWhere(['like', 'sector_name', $this->sector_name])
            ->andFilterWhere(['like', 'address', $this->address])
            ->andFilterWhere(['like', 'builder_name', $this->builder_name])
            ->andFilterWhere(['like', 'project_name', $this->project_name])
            ->andFilterWhere(['like', 'Owner_name', $this->Owner_name])
            ->andFilterWhere(['like', 'landline_no', $this->landline_no])
            ->andFilterWhere(['like', 'email_id', $this->email_id])
            ->andFilterWhere(['like', 'property_on_floor', $this->property_on_floor])
            ->andFilterWhere(['like', 'unit_block', $this->unit_block])
            ->andFilterWhere(['like', 'unit_number', $this->unit_number])
            ->andFilterWhere(['like', 'buildup_unit', $this->buildup_unit])
            ->andFilterWhere(['like', 'carpet_unit', $this->carpet_unit])
            ->andFilterWhere(['like', 'owner_address', $this->owner_address])
            ->andFilterWhere(['like', 'backup_power', $this->backup_power])
            ->andFilterWhere(['like', 'building_security', $this->building_security])
            ->andFilterWhere(['like', 'maintenance_agency', $this->maintenance_agency])
            ->andFilterWhere(['like', 'type_of_space', $this->type_of_space])
            ->andFilterWhere(['like', 'rate_negotiable', $this->rate_negotiable])
            ->andFilterWhere(['like', 'security_negotiable', $this->security_negotiable])
            ->andFilterWhere(['like', 'lock_in_negotiable', $this->lock_in_negotiable])
            ->andFilterWhere(['like', 'lease_period_restriction', $this->lease_period_restriction])
            ->andFilterWhere(['like', 'open_rentfree_period', $this->open_rentfree_period])
            ->andFilterWhere(['like', 'price_negotiable', $this->price_negotiable])
            ->andFilterWhere(['like', 'property_with_saledeed', $this->property_with_saledeed])
            ->andFilterWhere(['like', 'property_power_attorney', $this->property_power_attorney])
            ->andFilterWhere(['like', 'pan_card', $this->pan_card])
            ->andFilterWhere(['like', 'adhar_card', $this->adhar_card])
            ->andFilterWhere(['like', 'property_tax_id', $this->property_tax_id])
            ->andFilterWhere(['like', 'property_status', $this->property_status])
            ->andFilterWhere(['like', 'followup_comment', $this->followup_comment]);

        return $dataProvider;
    }

    public function searchcsrphone($params,$phones)
    {

         $user_id = Yii::$app->user->identity->id;
         $querys = CompanyEmp::find()->where(['userid'=>$user_id])->one();
         $assigned_id = $querys->id;
        $query = AddpropertyOnepageForm::find()->Where(['primary_contact_no'=>$phones]);

        //echo '<pre>';print_r($query);die;

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
            'company_employee_id' => $this->company_employee_id,
            'property_for' => $this->property_for,
            'longitude' => $this->longitude,
            'latitude' => $this->latitude,
            'property_type_id' => $this->property_type_id,
            'primary_contact_no' => $this->primary_contact_no,
            'secondary_contact_no' => $this->secondary_contact_no,
            'buildup_area' => $this->buildup_area,
            'carpet_area' => $this->carpet_area,
            'total_no_of_floors' => $this->total_no_of_floors,
            'passenger_lift' => $this->passenger_lift,
            'service_lift' => $this->service_lift,
            'ceiling_height' => $this->ceiling_height,
            'floor_plate_area' => $this->floor_plate_area,
            'visitor_parking' => $this->visitor_parking,
            'covered_parking' => $this->covered_parking,
            'asking_lease_rate' => $this->asking_lease_rate,
            'maintenance_charge' => $this->maintenance_charge,
            'security_deposit' => $this->security_deposit,
            'lock_in_period' => $this->lock_in_period,
            'max_period_lease' => $this->max_period_lease,
            'max_rentfree_period' => $this->max_rentfree_period,
            'Asking_property_price' => $this->Asking_property_price,
            'completion_in_percentage' => $this->completion_in_percentage,
            'followup_date_time' => $this->followup_date_time,
            'isactive' => $this->isactive,
            'created_date' => $this->created_date,
        ]);

        $query->andFilterWhere(['like', 'city', $this->city])
            ->andFilterWhere(['like', 'locality', $this->locality])
            ->andFilterWhere(['like', 'town_name', $this->town_name])
            ->andFilterWhere(['like', 'sector_name', $this->sector_name])
            ->andFilterWhere(['like', 'address', $this->address])
            ->andFilterWhere(['like', 'builder_name', $this->builder_name])
            ->andFilterWhere(['like', 'project_name', $this->project_name])
            ->andFilterWhere(['like', 'Owner_name', $this->Owner_name])
            ->andFilterWhere(['like', 'landline_no', $this->landline_no])
            ->andFilterWhere(['like', 'email_id', $this->email_id])
            ->andFilterWhere(['like', 'property_on_floor', $this->property_on_floor])
            ->andFilterWhere(['like', 'unit_block', $this->unit_block])
            ->andFilterWhere(['like', 'unit_number', $this->unit_number])
            ->andFilterWhere(['like', 'buildup_unit', $this->buildup_unit])
            ->andFilterWhere(['like', 'carpet_unit', $this->carpet_unit])
            ->andFilterWhere(['like', 'owner_address', $this->owner_address])
            ->andFilterWhere(['like', 'backup_power', $this->backup_power])
            ->andFilterWhere(['like', 'building_security', $this->building_security])
            ->andFilterWhere(['like', 'maintenance_agency', $this->maintenance_agency])
            ->andFilterWhere(['like', 'type_of_space', $this->type_of_space])
            ->andFilterWhere(['like', 'rate_negotiable', $this->rate_negotiable])
            ->andFilterWhere(['like', 'security_negotiable', $this->security_negotiable])
            ->andFilterWhere(['like', 'lock_in_negotiable', $this->lock_in_negotiable])
            ->andFilterWhere(['like', 'lease_period_restriction', $this->lease_period_restriction])
            ->andFilterWhere(['like', 'open_rentfree_period', $this->open_rentfree_period])
            ->andFilterWhere(['like', 'price_negotiable', $this->price_negotiable])
            ->andFilterWhere(['like', 'property_with_saledeed', $this->property_with_saledeed])
            ->andFilterWhere(['like', 'property_power_attorney', $this->property_power_attorney])
            ->andFilterWhere(['like', 'pan_card', $this->pan_card])
            ->andFilterWhere(['like', 'adhar_card', $this->adhar_card])
            ->andFilterWhere(['like', 'property_tax_id', $this->property_tax_id])
            ->andFilterWhere(['like', 'property_status', $this->property_status])
            ->andFilterWhere(['like', 'followup_comment', $this->followup_comment]);

        return $dataProvider;
    }
}
