<?php

namespace backend\controllers;

use Yii;

use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * CategoryController implements the CRUD actions for Category model.
 */
class SupervisorController extends Controller
{
	public $layout ="supervisor_layout";
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all Category models.
     * @return mixed
     */
	 public function actionMainactions()
    {
	$chkedapp=$_POST['ids'];
	$act =$_POST['act'];
	//$subget =$_POST['subget'];	
       
	return $this->renderPartial('allactions',['header'=>'','data'=>'','sd'=>0 , 'checkedapp'=>$chkedapp, 'act'=>$act]);
           
	}
	 public function actionScheduleform()
    {
          
	
	return $this->renderPartial('scheduleform',['sd'=>0]);
         
	}
	public function actionScheduleformtwo()
    {
          
	
	return $this->renderPartial('scheduleformtwo',['sd'=>0]);
         
	}
    public function actionIndex()
    {
       
        return $this->render('index');
    }

    
}
