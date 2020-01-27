<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "coworkingQuery".
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property int $phone
 * @property string $message
 * @property int $seats
 * @property string $created_date
 */
class CoworkingQuery extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'coworkingQuery';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
           // [['name', 'email', 'phone', 'seats'], 'required'],
            [['name', 'email', 'phone', 'seats'],'required','on'=>['coworking']],  
            [['name', 'email', 'phone', 'area'],'required','on'=>['officespace']],  
            [['email'],'email'],
          //  [['phone'], 'number', 'min' => 9],
            [['seats'], 'integer'],
            [['area'], 'integer'],
            [['message'], 'string'],
            [['created_date'], 'safe'],
            [['name'], 'string', 'max' => 200],
            [['email'], 'string', 'max' => 250],
        ];
    }

    

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'email' => 'Email',
            'phone' => 'Phone',
            'message' => 'Message',
            'seats' => 'Seats',
            'created_date' => 'Created Date',
        ];
    }
}
