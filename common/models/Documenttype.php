<?php

namespace common\models;

use Yii;
use common\models\Myprofile;

/**
 * This is the model class for table "documenttype".
 *
 * @property integer $documenttypeID
 * @property integer $documentConfigID
 * @property string $documentTypeName
 */
class Documenttype extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'documenttype';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['documentConfigID','user_login_as'], 'integer'],
            [['documentTypeName'], 'required'],
            [['documentTypeName'], 'string', 'max' => 250]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'documenttypeID' => Yii::t('app', 'Documenttype ID'),
            'documentConfigID' => Yii::t('app', 'Document Config ID'),
            'documentTypeName' => Yii::t('app', 'Document Type Name'),
        ];
    }
    
     public static function getalldocumentTypeuser($docConfigID)
    {

    $dat1=Documenttype::find()->where(['documentConfigID' => $docConfigID])->all();
	
    $dat2=Documenttype::find()->where(['documentConfigID' => $docConfigID ])->count();
    return array($dat1,$dat2);
    }



    public static function getalldocumentType($docConfigID,$user_login_as)
    {

    $user_id = Yii::$app->user->identity->id;
   
    $payments = \Yii::$app->db->createCommand("SELECT * from myprofile where userID='$user_id'")->queryOne();


    if($payments['nationality'] == 'NRI'){

        $dat1=Documenttype::find()->where(['documentConfigID' => '3','user_login_as'=>$user_login_as])->all();	
        $dat2=Documenttype::find()->where(['documentConfigID' => '3' ,'user_login_as'=>$user_login_as])->count();
        return array($dat1,$dat2);
      
     }
     else if($payments['nationality'] == 'PIO'){

        $dat1=Documenttype::find()->where(['documentConfigID' => '4','user_login_as'=>$user_login_as])->all();	
        $dat2=Documenttype::find()->where(['documentConfigID' => '4' ,'user_login_as'=>$user_login_as])->count();
        return array($dat1,$dat2);
      
     }

     else if($payments['nationality'] == 'OCI'){

        $dat1=Documenttype::find()->where(['documentConfigID' => '5','user_login_as'=>$user_login_as])->all();	
        $dat2=Documenttype::find()->where(['documentConfigID' => '5' ,'user_login_as'=>$user_login_as])->count();
        return array($dat1,$dat2);
      
     }
    
     else{
    $dat1=Documenttype::find()->where(['documentConfigID' => $docConfigID,'user_login_as'=>$user_login_as])->all();	
    $dat2=Documenttype::find()->where(['documentConfigID' => $docConfigID ,'user_login_as'=>$user_login_as])->count();
    return array($dat1,$dat2);

       }

    }
    
    public static function getdocTypeInfo($docTypeID)
    {
   return Documenttype::findOne($docTypeID); 
    }
    
}
