<?php

namespace backend\controllers;

use Yii;

use yii\web\Controller;
use yii\web\NotFoundHttpException;


use yii\filters\VerbFilter;
use common\models\VrSetup;
use common\models\VrSetupSearch;

use \yii\web\Response;
use yii\helpers\Html;
/**
 * CategoryController implements the CRUD actions for Category model.
 */
class ModeratorController extends Controller
{
	public $layout ="moderator_layout";
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
    public function actionIndex()
    {
       
        return $this->render('index');
    }

	public function actionIndexvr()
    {    
	 
        $searchModel = new VrSetupSearch();
		$checkmyrolemod = \backend\models\BackMode::checkrole(yii::$app->user->identity->id,"moderator");
		$checkmyrolepm = \backend\models\BackMode::checkrole(yii::$app->user->identity->id,"property_manager");
		if($checkmyrolemod){
			$this->layout = "moderator_layout";
			
        $dataProvider = $searchModel->searchformoderator(Yii::$app->request->queryParams,yii::$app->user->identity->id,"published");
        } 
		if($checkmyrolepm){
			$this->layout = "pmanager_layout";
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        } 
        return $this->render('indexvr', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    
}
