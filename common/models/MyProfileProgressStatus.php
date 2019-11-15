<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "my_profile_progress_status".
 *
 * @property integer $id
 * @property string $process_name
 * @property string $process_status
 * @property integer $user_id
 * @property integer $active
 * @property string $created_at
 * @property string $updated_at
 * @property integer $property_id
 * @property integer $role_id
 */
class MyProfileProgressStatus extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'my_profile_progress_status';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'process_name' => 'Process Name',
            'process_status' => 'Process Status',
            'user_id' => 'User ID',
            'active' => 'Active',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'property_id' => 'Property ID',
            'role_id' => 'Role ID',
			'addcomment'=>'addcomment',
        ];
    }

 public static function getStatus($user_id) {
        
        $post = Yii::$app->db->createCommand("select * from my_profile_progress_status where process_name ='my_profile' &&                 process_status='100' && approved= '1' && user_id = '$user_id'")
                ->queryOne();
        if($post){            
                 return 1;        
          }else{            
                 return 2;
          }
        
    }
   
}
