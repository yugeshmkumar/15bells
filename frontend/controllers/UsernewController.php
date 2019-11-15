<?php

namespace frontend\controllers;

use Yii;
use common\models\Usernew;
use common\models\UsernewSearch;
use common\models\SubUserSearch;
use frontend\modules\user\models\SignupForm;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use \yii\web\Response;
use yii\helpers\Html;

/**
 * UsernewController implements the CRUD actions for Usernew model.
 */
class UsernewController extends Controller
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
     * Lists all Usernew models.
     * @return mixed
     */
    public function actionIndex()
    {    
        $searchModel = new SubUserSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }


    /**
     * Displays a single Usernew model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {   
        $request = Yii::$app->request;
        if($request->isAjax){
            Yii::$app->response->format = Response::FORMAT_JSON;
            return [
                    'title'=> "Usernew #".$id,
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
     * Creates a new Usernew model.
     * For ajax request will return json object
     * and for non-ajax request if creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $request = Yii::$app->request;
        $model = new Usernew();  
        $modelsignup = new SignupForm();
        if($request->isAjax){
            /*
            *   Process for ajax request
            */
            Yii::$app->response->format = Response::FORMAT_JSON;
            if($request->isGet){
                return [
                    'title'=> "<i class='fa fa-plus'></i> Add Subusers",
                    'content'=>$this->renderAjax('create', [
                        'model' => $model,
                    ]),
                    'footer'=> Html::button('Close',['class'=>'btn btn-default pull-left','data-dismiss'=>"modal"]).
                                Html::button('<i class="fa fa-check"></i> Save',['class'=>'btn btn-primary','type'=>"submit"])
        
                ];         
            }else if($model->load($request->post())){
				$checkuser = \common\models\User::find()->where(['email'=>$model->email])->one();
				if(!$checkuser){
					$model->save();
					$user = \common\models\User::find()->where(['id'=>$model->id])->one();
					if($user)
                     $user->setPassword($model->password_hash);
                     $user->save();
                  $user->afterSubSignup();
                 $userid = Yii::$app->user->identity->id;
                 $subuserid =  $user->id;
                 
                $model1 = \common\models\Company::find()
                ->where(['userid' => $userid, 'isactive' => 1])
                ->one();                    
                $companyid = $model1->id;
            
                 $myprofilestatus = new \common\models\CompanyUsers();
				 $myprofilestatus->admin_user_id=$userid;
				 $myprofilestatus->fname = $model->fname;
                 $myprofilestatus->company_id=$companyid;
                 $myprofilestatus->subuser_id= $subuserid;

                 $myprofilestatus->save();
                return [
                    'forceReload'=>'#crud-datatable-pjax',
                    'title'=> "<i class='fa fa-plus'></i> Add Subusers",
                    'content'=>'<span class="text-success"><i class="fa fa-check"></i> Add Subusers success</span>',
                    'footer'=> Html::button('Close',['class'=>'btn btn-default pull-left','data-dismiss'=>"modal"]).
                            Html::a('<i class="fa fa-plus"></i> Add More Subusers',['create'],['class'=>'btn btn-primary','role'=>'modal-remote'])
        
                ];  
				} else {
					return [
                    'forceReload'=>'#crud-datatable-pjax',
                    'title'=> "<i class='fa fa-plus'></i> Add Subusers",
                    'content'=>'<span class="text-danger"><i class="fa fa-danger"></i> Duplicate Not Allowed.</span>',
                    'footer'=> Html::button('Close',['class'=>'btn btn-default pull-left','data-dismiss'=>"modal"]).
                            Html::a('<i class="fa fa-plus"></i> Add More Subusers',['create'],['class'=>'btn btn-primary','role'=>'modal-remote'])
        
                ]; 
				}				
            }else{           
                return [
                    'title'=> "<i class='fa fa-plus'></i> Add Subusers",
                    'content'=>$this->renderAjax('create', [
                        'model' => $model,
                    ]),
                    'footer'=> Html::button('Close',['class'=>'btn btn-default pull-left','data-dismiss'=>"modal"]).
                                Html::button('<i class="fa fa-check"></i> Save',['class'=>'btn btn-primary','type'=>"submit"])
        
                ];         
            }
        }else{
            /*
            *   Process for non-ajax request
            */
            if ($model->load($request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            } else {
                return $this->render('create', [
                    'model' => $model,
                ]);
            }
        }
       
    }

    /**
     * Updates an existing Usernew model.
     * For ajax request will return json object
     * and for non-ajax request if update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $request = Yii::$app->request;
        $model = $this->findModel($id);       

        if($request->isAjax){
            /*
            *   Process for ajax request
            */
            Yii::$app->response->format = Response::FORMAT_JSON;
            if($request->isGet){
                return [
                    'title'=> "Update Company Sub-Users #".$id,
                    'content'=>$this->renderAjax('update', [
                        'model' => $model,
                    ]),
                    'footer'=> Html::button('Close',['class'=>'btn btn-default pull-left','data-dismiss'=>"modal"]).
                                Html::button('Save',['class'=>'btn btn-primary','type'=>"submit"])
                ];         
            }else if($model->load($request->post()) && $model->save()){
				 $getfname = \common\models\CompanyUsers::find()->where(['subuser_id'=>$id])->one();
			        if($getfname){
						$getfname->fname = $model->fname;
						$getfname->save();
					} 
                return [
                    'forceReload'=>'#crud-datatable-pjax',
                    'title'=> "Update Company Sub-Users #".$id,
                    'content'=>$this->renderAjax('view', [
                        'model' => $model,
                    ]),
                    'footer'=> Html::button('Close',['class'=>'btn btn-default pull-left','data-dismiss'=>"modal"]).
                            Html::a('Edit',['update','id'=>$id],['class'=>'btn btn-primary','role'=>'modal-remote'])
                ];    
            }else{
                 return [
                    'title'=> "Update Company Sub-Users #".$id,
                    'content'=>$this->renderAjax('update', [
                        'model' => $model,
                    ]),
                    'footer'=> Html::button('Close',['class'=>'btn btn-default pull-left','data-dismiss'=>"modal"]).
                                Html::button('Save',['class'=>'btn btn-primary','type'=>"submit"])
                ];        
            }
        }else{
            /*
            *   Process for non-ajax request
            */
            if ($model->load($request->post()) && $model->save()) {
				$getfname = \common\models\CompanyUsers::find()->where(['subuser_id'=>$id])->one();
			        if($getfname){
						$getfname->fname = $model->fname;
						$getfname->save();
					} 
                return $this->redirect(['view', 'id' => $model->id]);
            } else {
                return $this->render('update', [
                    'model' => $model,
                ]);
            }
        }
    }

    /**
     * Delete an existing Usernew model.
     * For ajax request will return json object
     * and for non-ajax request if deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $request = Yii::$app->request;
		$getfname = \common\models\CompanyUsers::find()->where(['subuser_id'=>$id])->one();
			        if($getfname){
						$getfname->delete();
					} 
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
     * Delete multiple existing Usernew model.
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
     * Finds the Usernew model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Usernew the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Usernew::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
