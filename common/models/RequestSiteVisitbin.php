<?php

namespace common\models;

use Yii;
use common\models\LeadsSales;
use common\models\LeadassignmentSales;
use common\models\Leads;
use common\models\Leadassignment;
/**
 * This is the model class for table "request_site_visit".
 *
 * @property integer $request_id
 * @property string $user_id
 * @property integer $property_id
 * @property string $company_id
 * @property string $request_status
 * @property string $reason
 * @property string $scheduled_time
 * @property string $confirm
 * @property string $created_date
 */
class RequestSiteVisitbin extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'request_site_visit';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'property_id', 'scheduled_time', 'created_date'], 'required'],
            [['user_id', 'property_id', 'company_id'], 'integer'],
            [['request_status', 'reason', 'confirm'], 'string'],
            [['scheduled_time', 'created_date'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'request_id' => Yii::t('app', 'Request ID'),
            'user_id' => Yii::t('app', 'User ID'),
            'property_id' => Yii::t('app', 'Property ID'),
            'company_id' => Yii::t('app', 'Company ID'),
            'request_status' => Yii::t('app', 'Request Status'),
            'reason' => Yii::t('app', 'Reason'),
            'scheduled_time' => Yii::t('app', 'Scheduled Time'),
            'confirm' => Yii::t('app', 'Confirm'),
            'created_date' => Yii::t('app', 'Created Date'),
        ];
    }


    public static function getsalesidreqvisited($request_id,$user_id,$role_id,$propid,$newroleid){

        //echo $request_id .','.$user_id.','.$role_id .','.$propid .','.$newroleid;die;
       
        $picleadID = LeadsSales::find()->where(['user_id' => $user_id])->andwhere(['role_id'=>$role_id])->one();
        $sales_ids = LeadsSales::find()->where(['user_id' => $propid])->andwhere(['role_id'=>$newroleid])->one();

         if($picleadID){
       $leadid = $picleadID->id;
           $getassignedID = LeadassignmentSales::find()->where(['leadid' => $leadid])->one();
           if($getassignedID){
  
            $assigned_to_id = $getassignedID->assigned_toID;
             
            if($sales_ids){
                $newleadid = $sales_ids->id;
                $getassignedIDnew = LeadassignmentSales::find()->where(['leadid' => $newleadid])->one();
                $assigned_to_idnew = $getassignedIDnew->assigned_toID; 
           
              $arrfindallstatus = \common\models\RequestSiteVisitbin::find()->where(['request_id'=>$request_id])->one();
              $arrfindallstatus->assigned_to_id = $assigned_to_id;
              $arrfindallstatus->lead_id = $leadid;
              $arrfindallstatus->sales_id = $assigned_to_idnew;
              $arrfindallstatus->save(false);
        }else{

            $arrfindallstatus = \common\models\RequestSiteVisitbin::find()->where(['request_id'=>$request_id])->one();
              $arrfindallstatus->assigned_to_id = $assigned_to_id;
              $arrfindallstatus->lead_id = $leadid;              
              $arrfindallstatus->save(false);
        }
                         
                  }
          }
  
  
  
  
      }



      public static function getsalesidshortlist($request_id,$user_id,$role_id,$propid,$newroleid){

        //echo $request_id .','.$user_id.','.$role_id .','.$propid .','.$newroleid;die;
       
        $picleadID = LeadsSales::find()->where(['user_id' => $user_id])->andwhere(['role_id'=>$role_id])->one();
        $sales_ids = LeadsSales::find()->where(['user_id' => $propid])->andwhere(['role_id'=>$newroleid])->one();

         if($picleadID){
       $leadid = $picleadID->id;
           $getassignedID = LeadassignmentSales::find()->where(['leadid' => $leadid])->one();
           if($getassignedID){
  
            $assigned_to_id = $getassignedID->assigned_toID;
             
            if($sales_ids){
                $newleadid = $sales_ids->id;
                $getassignedIDnew = LeadassignmentSales::find()->where(['leadid' => $newleadid])->one();
                $assigned_to_idnew = $getassignedIDnew->assigned_toID; 
           
              $arrfindallstatus = \common\models\Shortlistproperty::find()->where(['id'=>$request_id])->one();
              $arrfindallstatus->assigned_id = $assigned_to_id;
              //$arrfindallstatus->lead_id = $leadid;
              $arrfindallstatus->sales_id = $assigned_to_idnew;
              $arrfindallstatus->save(false);
        }else{

            $arrfindallstatus = \common\models\Shortlistproperty::find()->where(['id'=>$request_id])->one();
              $arrfindallstatus->assigned_id = $assigned_to_id;
             // $arrfindallstatus->lead_id = $leadid;              
              $arrfindallstatus->save(false);
        }
                         
                  }
          }
  
  
  
  
      }


      public static function getsalesidreqvisit($request_id,$user_id,$role_id){

        $picleadID = LeadsSales::find()->where(['user_id' => $user_id])->andwhere(['role_id'=>$role_id])->one();
  
         if($picleadID){
       $leadid = $picleadID->id;
           $getassignedID = LeadassignmentSales::find()->where(['leadid' => $leadid])->one();
           if($getassignedID){
  
            $assigned_to_id = $getassignedID->assigned_toID;
                      
           
                         
              $arrfindallstatus = \common\models\RequestSiteVisitbin::find()->where(['request_id'=>$request_id])->one();
              
              $arrfindallstatus->sales_id = $assigned_to_id;
              $arrfindallstatus->save(false);
                         
                  }
          }
  

  
      }




      public static function getcsrcontactus($request_id,$user_id,$role_id){

        $picleadID = Leads::find()->where(['user_id' => $user_id])->andwhere(['role_id'=>$role_id])->one();
  
         if($picleadID){
       $leadid = $picleadID->id;
           $getassignedID = Leadassignment::find()->where(['leadid' => $leadid])->one();
           if($getassignedID){
  
            $assigned_to_id = $getassignedID->assigned_toID;
                      
                
              $arrfindallstatus = \common\models\PropertyMessages::find()->where(['id'=>$request_id])->one();
              $arrfindallstatus->assigned_to_id = $assigned_to_id;
              $arrfindallstatus->lead_id = $leadid;    
              $arrfindallstatus->save(false);
                         
                  }
          }
  

  
      }




    }



