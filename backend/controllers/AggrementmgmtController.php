<?php

namespace backend\controllers;

use Yii;
use common\models\Aggrementmgmt;
use common\models\AggrementmgmtSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * AggrementmgmtController implements the CRUD actions for Aggrementmgmt model.
 */
class AggrementmgmtController extends Controller
{
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
     * Lists all Aggrementmgmt models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new AggrementmgmtSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Aggrementmgmt model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Aggrementmgmt model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Aggrementmgmt();

      
			
		$request = Yii::$app->request->post();
                if(!empty($request)){
            $modelreq=$request['Aggrementmgmt'];
           $subject=$modelreq['subject'];
		   $eventname=$modelreq['eventname'];
		     $ispublish=$modelreq['ispublish'];
			  $roleid=$modelreq['roleid'];
		   $fromdatetime = $_POST['fromdatetime'];
		 //  $todatetime =$_POST['todatetime'];
		   $content =$_POST['content'];
		   if (!empty($roleid)){
			   $findprevagreement = \common\models\Aggrementmgmt::find()->where(['roleid'=>$roleid,'isactive'=>1])->one();
			   if($findprevagreement){
				   $findprevagreement->isactive=0;
				   $findprevagreement->save();
		   }
		  foreach($roleid as $roles){
			  $addmodel = new Aggrementmgmt();
            $addmodel->subject= $subject;
		 $addmodel->eventname =$eventname;
		    $addmodel->ispublish = $ispublish;
			  $addmodel->roleid =$roles;
		   $addmodel->fromdatetime = $fromdatetime;
		   // $addmodel->todatetime =$todatetime;
		    $addmodel->content =$content;
			$addmodel->save();
		   }}
            return $this->redirect(['index']);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Aggrementmgmt model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Aggrementmgmt model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Aggrementmgmt model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Aggrementmgmt the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Aggrementmgmt::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
