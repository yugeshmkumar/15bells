<?php

namespace backend\controllers;

use Yii;
use common\models\CompanyEmpb;
use common\models\CompanyEmpbSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use \yii\web\Response;
use yii\helpers\Html;

/**
 * CompanyEmpbController implements the CRUD actions for CompanyEmpb model.
 */
class CompanyEmpbController extends Controller
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
     * Lists all CompanyEmpb models.
     * @return mixed
     */
    public function actionIndex()
    {    
        $searchModel = new CompanyEmpbSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }


    /**
     * Displays a single CompanyEmpb model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {   
        $request = Yii::$app->request;
        if($request->isAjax){
            Yii::$app->response->format = Response::FORMAT_JSON;
            return [
                    'title'=> "CompanyEmpb #".$id,
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

    /**
     * Creates a new CompanyEmpb model.
     * For ajax request will return json object
     * and for non-ajax request if creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $request = Yii::$app->request;
        $model = new CompanyEmpb();  

            /*
            *   Process for non-ajax request
            */


            if ($model->load($request->post()) && $model->save()) {
				//create login and rbac roles
		    $user = new \common\models\User();
			$user->username = $model->employee_number;
			$user->fullname = $model->name;
            $user->email = $model->employee_email;
			$user->countrycode = '91';
            $user->setPassword($model->employee_number);
            $user->status = 1;
            $user->save();
			$CompanyEmpuser = \common\models\CompanyEmpuser::find()->where(['id'=>$model->id])->one();
			if($CompanyEmpuser){
			$CompanyEmpuser->userid = $user->id;
			$CompanyEmpuser->save(); }
			$user->afterSignup_employee();
            $userroles = \common\models\UserRoles::find()->where(['id'=>$model->role_id])->one();
			if($userroles){
			 $rbacauth = \Yii::$app->db->createCommand()->insert('rbac_auth_assignment', ['item_name'=>$userroles->rolename,'user_id' => $user->id ,'created_at'=>time()])->execute(); 
			
				if(($model->role_id == 23) || ($model->role_id == 22)) {
				//insert into employee config
				$checkifexist = \common\models\EmployeeConfig::find()->where(['employee_id'=>$model->id])->one();
				if(!$checkifexist){
				 $trendingadd = \Yii::$app->db->createCommand()->insert('employee_config', ['employee_id'=>$model->id,'location' => $model->location ,'role_id'=>$model->role_id,'availability'=>"yes",'count_leads'=>0])->execute(); 
				}
				}
				if(($model->role_id == 25) || ($model->role_id == 27)) {
				//insert into employee config
				$checkifexist = \common\models\EmployeeConfig::find()->where(['employee_id'=>$model->id])->one();
				if(!$checkifexist){
				 $trendingadd = \Yii::$app->db->createCommand()->insert('employee_config', ['employee_id'=>$model->id,'location' => $model->location ,'role_id'=>$model->role_id,'availability'=>"yes",'count_leads'=>0,'config'=>"sales"])->execute(); 
				}
				}
				 Yii::$app->getSession()->setFlash('alert', [
                    'body'=>Yii::t('frontend', 'Successfully Added Employee!'),
                    'options'=>['class'=>'alert-successful']
                ]);
			} else {
				 Yii::$app->getSession()->setFlash('alert', [
                    'body'=>Yii::t('frontend', 'Error While Assigning Role'),
                    'options'=>['class'=>'alert-error']
                ]);
			}
				
                return $this->redirect(['view', 'id' => $model->id]);
            } else {
                return $this->render('create', [
                    'model' => $model,
					'roles' => Yii\helpers\ArrayHelper::map(\common\models\UserRoles::find()->where(['roletype'=>"employee"])->all(), 'id', 'rolename')
                ]);
            }
        
       
    }

    /**
     * Updates an existing CompanyEmpb model.
     * For ajax request will return json object
     * and for non-ajax request if update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $request = Yii::$app->request;
        $model = $this->findModel($id);       

            /*
            *   Process for non-ajax request
            */
            if ($model->load($request->post()) && $model->save()) {
				
                return $this->redirect(['view', 'id' => $model->id]);
            } else {
                return $this->render('update', [
                    'model' => $model,
					'roles' => Yii\helpers\ArrayHelper::map(\common\models\UserRoles::find()->where(['roletype'=>"employee"])->all(), 'id', 'rolename'),
                ]);
            
        }
    }

    /**
     * Delete an existing CompanyEmpb model.
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
     * Delete multiple existing CompanyEmpb model.
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
     * Finds the CompanyEmpb model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return CompanyEmpb the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = CompanyEmpb::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
