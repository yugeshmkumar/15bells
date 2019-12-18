<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "emd_details".
 *
 * @property int $id
 * @property int $emd_id
 * @property int $utr_no
 * @property string $utr_bank_name
 * @property string $utr_bank_branch_name
 * @property string $utr_date
 * @property int $dd_no
 * @property string $dd_bank_name
 * @property string $dd_bank_branch_name
 * @property string $dd_date
 * @property string $person_name
 * @property int $tracking_id
 * @property string $payment_status
 * @property int $payable_amount
 * @property string $favour_of
 * @property string $created_date
 */
class Emd_details extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'emd_details';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            // [['emd_id', 'utr_no', 'utr_bank_name', 'utr_bank_branch_name', 'utr_date',
            //  'dd_no', 
            // 'dd_bank_name', 'dd_bank_branch_name', 'dd_date', 'person_name', 'tracking_id', 'payment_status', 'payable_amount', 'favour_of', 'created_date'], 'required'],
          
            [['utr_no','utr_bank_name','utr_bank_branch_name','utr_date'] ,'required','when'=>function($model){
                return $model->favour_of == 'utr' ;
             }, 'whenClient' => "function (attribute, value) {
              return $('#emd_details-favour_of').val() == 'utr';
               }" ,'message' => Yii::t('frontend', 'Required')],


               [['dd_no','dd_bank_name','dd_bank_branch_name','dd_date'] ,'required','when'=>function($model){
                return $model->favour_of == 'dd' ;
             }, 'whenClient' => "function (attribute, value) {
              return $('#emd_details-favour_of').val() == 'dd';
               }" ,'message' => Yii::t('frontend', 'Required')],

            [['emd_id', 'utr_no', 'dd_no', 'tracking_id', 'payable_amount'], 'integer'],
            [['utr_date', 'dd_date', 'created_date'], 'safe'],
            [['utr_bank_name', 'utr_bank_branch_name', 'dd_bank_name', 'dd_bank_branch_name', 'person_name'], 'string', 'max' => 250],
            [['payment_status'], 'string', 'max' => 50],
            [['favour_of'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'emd_id' => 'Emd ID',
            'utr_no' => 'Utr No',
            'utr_bank_name' => 'Utr Bank Name',
            'utr_bank_branch_name' => 'Utr Bank Branch Name',
            'utr_date' => 'Utr Date',
            'dd_no' => 'Dd No',
            'dd_bank_name' => 'Dd Bank Name',
            'dd_bank_branch_name' => 'Dd Bank Branch Name',
            'dd_date' => 'Dd Date',
            'person_name' => 'Person Name',
            'tracking_id' => 'Tracking ID',
            'payment_status' => 'Payment Status',
            'payable_amount' => 'Payable Amount',
            'favour_of' => 'Favour Of',
            'created_date' => 'Created Date',
        ];
    }
}
