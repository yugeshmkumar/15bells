<?php

namespace backend\models\AddpropertyOnepageForm;

use Yii;

/**
 * This is the model class for table "addproperty_onepage_form".
 *
 * @property int $id
 * @property int $company_employee_id
 * @property int $property_for
 * @property string $city
 * @property string $locality
 * @property string $town_name
 * @property string $sector_name
 * @property string $address
 * @property double $longitude
 * @property double $latitude
 * @property string $builder_name
 * @property string $building_name
 * @property string $project_name
 * @property int $property_type_id
 * @property string $Owner_name
 * @property int $primary_contact_no
 * @property int $secondary_contact_no
 * @property string $landline_no
 * @property string $email_id
 * @property string $property_on_floor
 * @property string $unit_block
 * @property string $unit_number
 * @property int $buildup_area
 * @property string $buildup_unit
 * @property int $carpet_area
 * @property string $carpet_unit
 * @property string $owner_address
 * @property int $total_no_of_floors
 * @property int $passenger_lift
 * @property int $service_lift
 * @property int $ceiling_height
 * @property string $backup_power
 * @property string $building_security
 * @property string $maintenance_agency
 * @property int $floor_plate_area
 * @property string $type_of_space
 * @property int $visitor_parking
 * @property int $covered_parking
 * @property int $asking_lease_rate
 * @property string $rate_negotiable
 * @property int $maintenance_charge
 * @property int $security_deposit
 * @property string $security_negotiable
 * @property int $lock_in_period
 * @property string $lock_in_negotiable
 * @property string $lease_period_restriction
 * @property int $max_period_lease
 * @property string $open_rentfree_period
 * @property int $max_rentfree_period
 * @property int $Asking_property_price
 * @property string $price_negotiable
 * @property string $property_with_saledeed
 * @property string $property_power_attorney
 * @property string $pan_card
 * @property string $adhar_card
 * @property string $property_tax_id
 * @property int $completion_in_percentage
 * @property string $property_status
 * @property string $followup_date_time
 * @property string $followup_comment
 * @property int $isactive
 * @property string $created_date
 */
class AddpropertyOnepageForm extends \yii\db\ActiveRecord
{

    public $efficiency;
    public $ownership_title;
    public $ID_proof;
   

   

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'addproperty_onepage_form';

    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['company_employee_id', 'property_type_id', 'primary_contact_no', 'secondary_contact_no', 'super_area', 'carpet_area', 'total_no_of_floors', 'ceiling_height', 'floor_plate_area', 'visitor_parking', 'asking_lease_rate','total_lease_rate', 'maintenance_charge', 'security_deposit', 'lock_in_period', 'max_period_lease', 'max_rentfree_period', 'Asking_property_price', 'completion_in_percentage', 'isactive'], 'integer'],
            [['locality', 'address', 'backup_power', 'building_security', 'maintenance_agency', 'type_of_space', 'rate_negotiable', 'security_negotiable', 'lock_in_negotiable', 'lease_period_restriction', 'open_rentfree_period', 'price_negotiable', 'property_with_saledeed', 'property_power_attorney', 'property_status', 'followup_comment','property_scomment'], 'string'],
            [['longitude', 'latitude'], 'number'],
    //               ['property_on_floor', 'compare','compareValue'=>'total_no_of_floors','operator'=>'<',
    // 'message'=>'Property on floor should be smaller than total no. of floors'],
            //[['total_no_of_floors'], 'required'],
            [['followup_date_time', 'created_date'], 'safe'],
            [['city', 'property_on_floor', 'unit_block', 'unit_number'], 'string', 'max' => 20],
            [['town_name', 'sector_name'], 'string', 'max' => 200],
            [['building_name', 'project_name', 'Owner_name', 'pan_card', 'adhar_card', 'covered_parking','property_tax_id'], 'string', 'max' => 50],
            [['landline_no', 'email_id'], 'string', 'max' => 30],
            [['super_unit', 'carpet_unit'], 'string', 'max' => 15],
            [['owner_address'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'efficiency'=>'Efficiency (%)',
            'company_employee_id' => 'Company Employee ID',
            'property_for' => 'Property For',
            'city' => 'City',
            'locality' => 'Locality',
            'town_name' => 'Town Name',
            'sector_name' => 'Sector Name',
            'address' => 'Address',
            'longitude' => 'Longitude',
            'latitude' => 'Latitude',
            'builder_name' => 'Builder Name',
            'building_name' => 'Building Name',
            'project_name' => 'Project Name',
            'property_type_id' => 'Property Type ID',
            'Owner_name' => 'Owner Name',
            'primary_contact_no' => 'Primary Contact No',
            'secondary_contact_no' => 'Secondary Contact No',
            'landline_no' => 'Landline No',
            'email_id' => 'Email ID',
            'property_on_floor' => 'Property On Floor',
            'unit_block' => 'Unit Block/Phase/Tower',
            'unit_number' => 'Unit Number/Plot Number',
            'super_area' => 'Super Area',
            'super_unit' => 'Super Unit',
            'carpet_area' => 'Carpet Area',
            'carpet_unit' => 'Carpet Unit',
            'owner_address' => 'Owner Address',
            'total_no_of_floors' => 'Total No Of Floors',
            'passenger_lift' => 'Passenger Lift',
            'service_lift' => 'Service Lift',
            'ceiling_height' => 'Ceiling Height',
            'backup_power' => 'Backup Power',
            'building_security' => 'Building Security',
            'maintenance_agency' => 'Maintenance Agency',
            'floor_plate_area' => 'Floor Plate Area',
            'type_of_space' => 'Type Of Space',
            'visitor_parking' => 'Visitor Parking',
            'covered_parking' => 'Covered Parking',
            'asking_lease_rate' => 'Asking Lease Rate (PSF)',
            'total_lease_rate' => 'Total lease rate',
            'rate_negotiable' => 'Rate Negotiable',
            'maintenance_charge' => 'Maintenance Charge',
            'security_deposit' => 'Security Deposit',
            'security_negotiable' => 'Security Negotiable',
            'lock_in_period' => 'Lock In Period',
            'lock_in_negotiable' => 'Lock In Negotiable',
            'lease_period_restriction' => 'Lease Period Restriction',
            'max_period_lease' => 'Max Lease Tenure',
            'max_period_lease_negotiable' => 'Max Lease Tenure Negotiable',
            'open_rentfree_period' => 'Open Rentfree Period',
            'max_rentfree_period' => 'Max Rentfree Period',
            'Asking_property_price' => 'Asking Property Price',
            'price_negotiable' => 'Price Negotiable',
            'property_with_saledeed' => 'Property With Saledeed',
            'property_power_attorney' => 'Property Power Attorney',
            'pan_card' => 'Pan Card',
            'ID_proof' => 'ID Proof',
            'adhar_card' => 'Adhar Card',
            'property_tax_id' => 'Property Tax ID',
            'completion_in_percentage' => 'Completion In Percentage',
            'property_status' => 'Property Status',
            'property_scomment' => 'Property Status Comment',
            'lead_source' => 'Lead Source',
            'site_visit' => 'Site Visit',
            'site_visit' => 'Site Visit',
            'remarks' => 'Remarks',
            'followup_comment' => 'Followup Comment',
            'isactive' => 'Isactive',
            'created_date' => 'Created Date',
        ];
    }


    
    public function addnewlead($idf,$Owner_name,$primary_contact_no,$employee)

          {   

         

     $checkifalready = \common\models\Leads::find()->where(['number'=>$primary_contact_no,'name'=>$Owner_name])->one();
                if(!$checkifalready){
                $addnewlead = new \common\models\Leads();            
                $addnewlead->name =$Owner_name;               
                $addnewlead->number =$number;
                $addnewlead->save();
                
                $Leadcurrentstatus = new \common\models\Leadcurrentstatus();
                $Leadcurrentstatus->leadid =$addnewlead->id;
                $Leadcurrentstatus->role_id = "3";
                $Leadcurrentstatus->statusid =1;
                $Leadcurrentstatus->leadactionstatus =8;
                $Leadcurrentstatus->special ="yes";
                $Leadcurrentstatus->save();
                //assign CSR
    
                $newleadid = $addnewlead->id;
               $newleadstatus = $Leadcurrentstatus->id;
                $date = date('Y-m-d h:i:s');
    
                 $employecount = \Yii::$app->db->createCommand("SELECT count(*) from company_emp where id IN (" . implode(',', $employee) . ")")->queryAll();
                // echo '<pre>';print_r($employecount);die;

                $findcsr = \Yii::$app->db->createCommand("SELECT * from company_emp where id IN (" . implode(',', $employee) . ") order by alloted asc limit 1")->queryOne();
               
    
                $findcsrst = \Yii::$app->db->createCommand("SELECT * from company_emp where id IN (" . implode(',', $employee) . ") order by alloted desc limit 1")->queryOne(); 
               $count = $employecount['0']['count(*)'];
    
                $getallot = $findcsrst['alloted'];
                
                
                
               
                if($getallot == $count){
                
                
    $givezero = Yii::$app->db->createCommand()->update('company_emp', ['alloted' => '0'],'csr_name = "CSR"')->execute();            
                
                $findcsrs = \Yii::$app->db->createCommand("SELECT * from company_emp where id IN (" . implode(',', $employee) . ") order by alloted asc limit 1")->queryOne();  
    $findcsrsd = \Yii::$app->db->createCommand("SELECT * from company_emp where id IN (" . implode(',', $employee) . ") order by alloted desc limit 1")->queryOne();            
                $getallots = $findcsrsd['alloted'];
                $newids = $findcsrs['id'];
                $counters = $getallots + 1;
                
               
    $update = Yii::$app->db->createCommand()->update('company_emp', ['alloted' => $counters],'id = "'.$newids.'"')->execute();
    $updater = Yii::$app->db->createCommand()->update('addproperty_onepage_form', ['company_employee_id' => $newids],'id = "'.$idf.'"')->execute();
    $updater2 = Yii::$app->db->createCommand()->update('addproperty_onepage_form', ['company_employee_id' => $newids],'primary_contact_no = "'.$primary_contact_no.'"')->execute();
    
            $trendingadd = \Yii::$app->db->createCommand()->insert('leadassignment', ['leadid' => $newleadid, 'lead_current_status_ID' => $newleadstatus, 'assigned_toID' => $newids, 'assigned_at' => $date])->execute();
    
    if($trendingadd){return true;}
    
    
                }else{
                
                $counter = $getallot + 1;
                $newid = $findcsr['id']; 
    
           $updates = Yii::$app->db->createCommand()->update('company_emp', ['alloted' => $counter],'id = "'.$newid.'"')->execute();
    
           $updater = Yii::$app->db->createCommand()->update('addproperty_onepage_form', ['company_employee_id' => $newid],'id = "'.$idf.'"')->execute();

           $updater2 = Yii::$app->db->createCommand()->update('addproperty_onepage_form', ['company_employee_id' => $newid],'primary_contact_no = "'.$primary_contact_no.'"')->execute();

    
    
                
               $trendingadd = \Yii::$app->db->createCommand()->insert('leadassignment', ['leadid' => $newleadid, 'lead_current_status_ID' => $newleadstatus, 'assigned_toID' => $newid, 'assigned_at' => $date])->execute();
    
    if($trendingadd){return true;}
    
                }
                
                }

                
    }






}
