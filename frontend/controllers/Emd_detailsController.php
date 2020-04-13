<?php

namespace frontend\controllers;

use Yii;
use common\models\VrSetup;
use common\models\Emd_details;
use common\models\Emd_detailsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use \yii\web\Response;
use yii\helpers\Html;

/**
 * Emd_detailsController implements the CRUD actions for Emd_details model.
 */
class Emd_detailsController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                    'bulk-delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all Emd_details models.
     * @return mixed
     */
    public function actionIndex()
    {    
        $searchModel = new Emd_detailsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }


    /**
     * Displays a single Emd_details model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {   
        $request = Yii::$app->request;
        if($request->isAjax){
            Yii::$app->response->format = Response::FORMAT_JSON;
            return [
                    'title'=> "Emd_details #".$id,
                    'content'=>$this->renderAjax('view', [
                        'model' => $this->findModel($id),
                    ]),
                    'footer'=> Html::button('Close',['class'=>'btn btn-default pull-left','data-dismiss'=>"modal"]).
                            Html::a('Edit',['update','id'=>$id],['class'=>'btn btn-primary','role'=>'modal-remote'])
                ];    
        }else{
            return $this->render('view', [
                'model' => $this->findModel($id),
            ]);
        }
    }

    public function actionGetdetails()
    {

        $model = new Emd_details();  
        $emdid =  $_POST['emdid'];
        Yii::$app->response->format = Response::FORMAT_JSON;

        $querys = Emd_details::find()->where(['emd_id'=>$emdid])->one();
        return  $querys;
    }

    public function actionGetfavour()
    {

        $model = new VrSetup();  
        $emdid =  $_POST['emdid'];
        $propid =  $_POST['propid'];

        Yii::$app->response->format = Response::FORMAT_JSON;

        $querys = VrSetup::find()->where(['propertyID'=>$propid])->one();

        if($querys){
            return  $querys;
        }else{
            return 2;
        }
       
    }


    public function actionGetfavourrev()
    {

        $model = new VrSetup();  
        $emdid =  $_POST['emdid'];
        $propid =  $_POST['propid'];

        Yii::$app->response->format = Response::FORMAT_JSON;

        $querys = VrSetup::find()->where(['id'=>$propid])->one();

        if($querys){
            return  $querys;
        }else{
            return 2;
        }
       
    }


    /**
     * Creates a new Emd_details model.
     * For ajax request will return json object
     * and for non-ajax request if creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {

      
        $request = Yii::$app->request;
        $model = new Emd_details();  

      
            /*
            *   Process for non-ajax request
            */
            if ($model->load($request->post()) ) {

                if($model->save()){
                    return 1;
                }
            } else {
                return $this->render('create', [
                    'model' => $model,
                ]);
            }
        
       
    }

    /**
     * Updates an existing Emd_details model.
     * For ajax request will return json object
     * and for non-ajax request if update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        
        $request = Yii::$app->request;

        $model = new Emd_details();        
        

        $model = Emd_details::find()->where(['emd_id'=>$id])->one();
             

            /*
            *   Process for non-ajax request
            */
            if ($model->load($request->post())) {

                if( $model->save()){
                    return 1;
                }
            } else {
                return 2;
            }
        
    }

    /**
     * Delete an existing Emd_details model.
     * For ajax request will return json object
     * and for non-ajax request if deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $request = Yii::$app->request;
        $this->findModel($id)->delete();

        if($request->isAjax){
            /*
            *   Process for ajax request
            */
            Yii::$app->response->format = Response::FORMAT_JSON;
            return ['forceClose'=>true,'forceReload'=>'#crud-datatable-pjax'];
        }else{
            /*
            *   Process for non-ajax request
            */
            return $this->redirect(['index']);
        }


    }

     /**
     * Delete multiple existing Emd_details model.
     * For ajax request will return json object
     * and for non-ajax request if deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionBulkDelete()
    {        
        $request = Yii::$app->request;
        $pks = explode(',', $request->post( 'pks' )); // Array or selected records primary keys
        foreach ( $pks as $pk ) {
            $model = $this->findModel($pk);
            $model->delete();
        }

        if($request->isAjax){
            /*
            *   Process for ajax request
            */
            Yii::$app->response->format = Response::FORMAT_JSON;
            return ['forceClose'=>true,'forceReload'=>'#crud-datatable-pjax'];
        }else{
            /*
            *   Process for non-ajax request
            */
            return $this->redirect(['index']);
        }
       
    }

    /**
     * Finds the Emd_details model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Emd_details the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Emd_details::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
