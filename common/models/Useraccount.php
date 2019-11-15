<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "useraccount".
 *
 * @property integer $id
 * @property integer $userID
 * @property integer $propertyID
 * @property integer $invoiceID
 * @property string $xndescrp
 * @property string $xnamount
 * @property integer $gl_id
 * @property string $xntype
 * @property string $xndate
 * @property string $balance
 * @property integer $liveflag
 * @property integer $isActive
 * @property string $created_at
 * @property integer $updated_at
 */
class Useraccount extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'useraccount';
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
            'userID' => 'User ID',
            'propertyID' => 'Property ID',
            'invoiceID' => 'Invoice ID',
            'xndescrp' => 'Xndescrp',
            'xnamount' => 'Xnamount',
            'gl_id' => 'Gl ID',
            'xntype' => 'Xntype',
            'xndate' => 'Xndate',
            'balance' => 'Balance',
            'liveflag' => 'Liveflag',
            'isActive' => 'Is Active',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
