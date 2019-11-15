<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "bellscountryconfig".
 *
 * @property integer $id
 * @property string $state
 * @property string $city
 * @property string $country
 * @property string $created_at
 * @property string $updated_at
 * @property integer $isactive
 */
class Bellscountryconfig extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'bellscountryconfig';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['state', 'city', 'country'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
            [['isactive'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'state' => 'State',
            'city' => 'City',
            'country' => 'Country',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'isactive' => 'Isactive',
        ];
    }
	 public function getSubCatList($cat_id)
{  
  $dataone=\common\models\Countries::find()
       ->where(['name'=>$cat_id])->one();

	   
    $data=\common\models\States::find()
       ->where(['country_id'=>$dataone->id])
       ->select(['name AS id','name AS name' ])->asArray()->all();

    return $data;

}
 public function getSubCatListtwo($cat_id)
{
	 $dataone=\common\models\States::find()
       ->where(['name'=>$cat_id])->one();

    $data=\common\models\Cities::find()
       ->where(['state_id'=>$dataone->id])
       ->select(['name AS id','name AS name' ])->asArray()->all();

    return $data;

}

}
