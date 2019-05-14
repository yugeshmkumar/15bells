<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "dashboardroleaggrement".
 *
 * @property integer $id
 * @property integer $aggrement_id
 * @property string $role_id
 * @property string $accept
 * @property string $created_date
 */
class Dashboardroleaggrement extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'dashboardroleaggrement';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['aggrement_id', 'role_id', 'accept','user_id','created_date'], 'required'],
            [['aggrement_id'], 'integer'],
            [['role_id', 'accept'], 'string'],
            [['created_date'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'aggrement_id' => 'Aggrement ID',
            'role_id' => 'Role ID',
            'accept' => 'Accept',
            'created_date' => 'Created Date',
        ];
    }


  public static function getStatusbuyer($user_id) {
        
        $post = Yii::$app->db->createCommand("select * from dashboardroleaggrement where role_id='buyer_seller' && accept= '1' && user_id = '$user_id'")
                ->queryOne();
        if($post){            
                 return 1;        
          }else{            
                 return 2;
          }
        
    }


  public static function getStatusseller($user_id) {
        
        $post = Yii::$app->db->createCommand("select * from dashboardroleaggrement where role_id='lessee_lessor' && accept= '1' && user_id = '$user_id'")
                ->queryOne();
        if($post){            
                 return 1;        
          }else{            
                 return 2;
          }
        
    }
}
