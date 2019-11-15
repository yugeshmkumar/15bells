<?php
namespace backend\models;

use yii\db\ActiveRecord;

/**
 * Login form
 */
class BackMode extends ActiveRecord
{
   
public static function checkrole($userid,$rolename)
{
	$resultset = \common\models\RbacAuthAssignment::find()
	->where(['user_id'=>$userid,'item_name'=>$rolename])
	->one();
	return $resultset;
}
  
}
