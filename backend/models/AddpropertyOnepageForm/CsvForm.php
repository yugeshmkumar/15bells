<?php

namespace backend\models\AddpropertyOnepageForm;

use Yii;
use yii\base\Model;
use yii\web\UploadedFile;

class CsvForm extends Model{
    public $file;
    public $getpropertycount;
    
    public function rules(){
        return [
            [['file','getpropertycount'],'required'],
            [['getpropertycount' ], 'integer'],

            [['file'],'file','extensions'=>'csv','maxSize'=>1024 * 1024 * 5],
        ];
    }
    
    public function attributeLabels(){
        return [
            'file'=>'Select File',
        ];
    }
}