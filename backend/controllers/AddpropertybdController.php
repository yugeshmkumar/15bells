<?php

namespace backend\controllers;

use Yii;
use common\models\Addpropertybackend;
use common\models\AddpropertybackendSearch;
use yii\web\Controller;
use yii\helpers\ArrayHelper;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * AddpropertybdController implements the CRUD actions for Addpropertybackend model.
 */
class AddpropertybdController extends Controller
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
     * Lists all Addpropertybackend models.
     * @return mixed
     */
    public function actionIndex()
    {  
           $model = new \common\models\Addpropertybackend();
	  $arrayemployes = \common\models\CompanyEmpb::find()->where(['isactive'=>1,'designation'=>1,'employee_typeID'=>1])->all();
	     $data = ArrayHelper::map($arrayemployes,'id','name');
        $searchModel = new AddpropertybackendSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
    if (isset($_POST['expandRowKey'])) {
        return $this->renderPartial('view?id=1');
    } 
	 if (isset($_POST['hasEditable'])) {
        // use Yii's response format to encode output as JSON
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        
        // read your posted model attributes
        if ($model->load($_POST)) {
			$editindex = $_POST['editableIndex'];
			        $request = Yii::$app->request->post();
                    $modelreq=$request['Addpropertybackend'];
					$value=$modelreq[$editindex]['id'];
			$checkifalreadyexist = \common\models\AssignManagerToProperty::find()->where(['propertyID'=>$_POST['editableKey'] ,'isactive'=>1])->one();
			if($checkifalreadyexist)
			{
			$checkifalreadyexist->managerID = $value;
            $checkifalreadyexist->assigned_at = date('y-m-d h:i:s');
			$checkifalreadyexist->status = "successful";
			$checkifalreadyexist->save();
			} else {
            // read or convert your posted information
			$newmodel = new \common\models\AssignManagerToProperty();
            $newmodel->managerID = $value;
            $newmodel->propertyID = $_POST['editableKey'];
			$newmodel->assigned_at = date('y-m-d h:i:s');
			$newmodel->status = "successful";
			$newmodel->save();
			}
			$outputval = \common\models\CompanyEmpb::findOne($value)->name;
            // return JSON encoded output in the below format
            return ['output'=>$outputval, 'message'=>''];
            
            // alternatively you can return a validation error
            // return ['output'=>'', 'message'=>'Validation error'];
        }
        // else if nothing to do always return an empty JSON encoded output
        else {
            return ['output'=>'', 'message'=>''];
        }
    }
	
        return $this->render('index', [
		  'data'=>$data,
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Addpropertybackend model.
     * @param integer $id
     * @return mixed
     */
    public function actionView()
    { 
	$id = $_POST['expandRowKey'];
        return $this->renderPartial('view', [
            'model' => $this->findModel($id),
        ]);
    }
	

    /**
     * Creates a new Addpropertybackend model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Addpropertybackend();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Addpropertybackend model.
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
     * Deletes an existing Addpropertybackend model.
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
     * Finds the Addpropertybackend model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Addpropertybackend the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Addpropertybackend::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
