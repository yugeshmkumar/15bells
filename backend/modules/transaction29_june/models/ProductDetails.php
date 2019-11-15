<?php

namespace backend\modules\transaction\models;

use Yii;

/**
 * This is the model class for table "product_details".
 *
 * @property integer $id
 * @property integer $reserved_price
 * @property integer $product_id
 * @property string $created_date
 */
class ProductDetails extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'product_details';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['reserved_price', 'product_id'], 'required'],
            [['reserved_price', 'product_id'], 'integer'],
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
            'reserved_price' => 'Reserved Price',
            'product_id' => 'Product ID',
            'created_date' => 'Created Date',
        ];
    }
}
