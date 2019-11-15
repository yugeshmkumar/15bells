<?php

namespace common\models\Notifications;

use Yii;

/**
 * This is the model class for table "notifications".
 *
 * @property int $id
 * @property string $item_name
 * @property int $item_id
 * @property string $is_seen
 * @property string $date
 */
class Notifications extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'notifications';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['item_name', 'item_id', 'date'], 'required'],
            [['item_id'], 'integer'],
            [['is_seen'], 'string'],
            [['date'], 'safe'],
            [['item_name'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'item_name' => 'Item Name',
            'item_id' => 'Item ID',
            'is_seen' => 'Is Seen',
            'date' => 'Date',
        ];
    }
}
