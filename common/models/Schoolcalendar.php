<?php

namespace common\models;

use Yii;
use \common\models\base\Schoolcalendar as BaseSchoolcalendar;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "school_calendar".
 */
class Schoolcalendar extends BaseSchoolcalendar
{

public function behaviors()
    {
        return ArrayHelper::merge(
            parent::behaviors(),
            [
                # custom behaviors
            ]
        );
    }

    public function rules()
    {
        return ArrayHelper::merge(
             parent::rules(),
             [
                  # custom validation rules
             ]
        );
    }
}
