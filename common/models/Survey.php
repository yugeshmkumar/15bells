<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "survey".
 *
 * @property integer $id
 * @property string $name
 * @property string $from
 * @property string $to
 * @property string $description
 * @property integer $type_id
 * @property string $survey_link
 * @property boolean $is_active
 * @property integer $created_at
 * @property integer $updated_at
 * @property integer $created_by
 *
 * @property Csq[] $csqs
 * @property Type $type
 * @property User $createdBy
 * @property SurveyRespondents[] $surveyRespondents
 */
class Survey extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'survey';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['from', 'to'], 'safe'],
            [['type_id', 'created_at', 'updated_at', 'created_by'], 'integer'],
            [['is_active'], 'boolean'],
            [['name', 'description'], 'string', 'max' => 100],
            [['survey_link'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Name'),
            'from' => Yii::t('app', 'From'),
            'to' => Yii::t('app', 'To'),
            'description' => Yii::t('app', 'Description'),
            'type_id' => Yii::t('app', 'Type ID'),
            'survey_link' => Yii::t('app', 'Survey Link'),
            'is_active' => Yii::t('app', 'Is Active'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
            'created_by' => Yii::t('app', 'Created By'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCsqs()
    {
        return $this->hasMany(Csq::className(), ['survey_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getType()
    {
        return $this->hasOne(Type::className(), ['id' => 'type_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCreatedBy()
    {
        return $this->hasOne(User::className(), ['id' => 'created_by']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSurveyRespondents()
    {
        return $this->hasMany(SurveyRespondents::className(), ['survey_id' => 'id']);
    }
}
