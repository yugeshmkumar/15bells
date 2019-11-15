<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "company_subusers_record".
 *
 * @property int $id
 * @property int $master_id
 * @property int $subuser_id
 * @property string $created_date
 */
class Company_Subusers_Record extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'company_subusers_record';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['master_id', 'subuser_id', 'created_date'], 'required'],
            [['master_id', 'subuser_id'], 'integer'],
            [['created_date'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'master_id' => 'Master ID',
            'subuser_id' => 'Subuser ID',
            'created_date' => 'Created Date',
        ];
    }
}
