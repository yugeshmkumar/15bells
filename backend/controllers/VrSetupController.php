<?php

namespace backend\controllers;

use Yii;
use common\models\VrSetup;
use common\models\VrSetupSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use \yii\web\Response;
use yii\helpers\Html;

/**
 * VrSetupController implements the CRUD actions for VrSetup model.
 */
class VrSetupController extends Controller
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


    public function __construct($id, $module, $config = array()) {
        parent::__construct($id, $module, $config);
        $assigndash = \common\models\RbacAuthAssignment::find()->where(['user_id'=>yii::$app->user->identity->id])->one();
	if($assigndash->item_name == "sales_demand_lessee"){
		
		$this->layout="sales_supply_layout";
		
	}if($assigndash->item_name == "sales_head"){
		
		$this->layout="sales_layout";
		
	}if($assigndash->item_name == "sales_demand_buyer"){
		
		$this->layout="sales_supply_layout";		
	}
if($assigndash->item_name == "sales_supply_seller"){
		
		$this->layout="sales_buying_layout";		
	}
if($assigndash->item_name == "sales_supply_lessor"){
		
		$this->layout="sales_leasing_layout";		
	}
	
    }
    /**
     * Lists all VrSetup models.
     * @return mixed
     */
    public function actionIndex()
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
        }  else {
			$dataProvider = $searchModel->searches(Yii::$app->request->queryParams);
       
		}
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }


    /**
     * Displays a single VrSetup model.
     * @param integer $id
     * @return mixed
     */
	 public function actionReports(){
		 return $this->render('reports');
	 }
	  public function actionViewp()
    { 
	$id = $_POST['expandRowKey'];
	$propertyid = \common\models\VrSetup::findOne($id)->propertyID;
        return $this->renderPartial('viewp', [
            'model' => $this->findModelp($propertyid),
        ]);
    }
	public  function actionReview()
	{    $modeltwo = \common\models\AuctionParticipants::find()->where(['vr_roomID'=>$_GET['id'],'isactive'=>1])->one();
			
		return $this->render('review',[
		'model' => $this->findModel($_GET['id']),
		//'modeltwo' => $modeltwo,
		
		]);
	}
    public function actionView($id)
    {   
	if(isset($_POST['savebuyers'])){
        $arrbuyers = $_POST['usersbuyers'];
       // echo '<pre>';print_r($_POST['usersbuyers']);die;
		foreach($arrbuyers as $buyers){
			$checkifalready = \common\models\AuctionParticipants::find()->where(['vr_roomID'=>$_GET['id'],'partcipantID'=>$buyers,'isactive'=>1])->one();
			if(!$checkifalready){
				$VrSetuptest = \common\models\VrSetuptest::find()->where(['id'=>$_GET['id']])->one();
				
				$find_role = \common\models\RbacAuthAssignment::find()->where('user_id =:id and item_name =:config1 OR item_name =:config2',array(':id'=>$buyers,':config1'=>"buyerplus",':config2'=>"lesseplus"))->one();
			$insertparticipants = new \common\models\AuctionParticipants();
			$insertparticipants->vr_roomID =$_GET['id'];
			if($find_role){
				$findrolesteo = \common\models\UserRoles::find()->where(['rolename'=>$find_role->item_name,'isactive'=>1])->one();
			$insertparticipants->roleID =$findrolesteo->id;
			}
			$insertparticipants->assigned_time=$VrSetuptest->fromdatetime;
			$insertparticipants->unassigned_time=$VrSetuptest->todatetime;
			$insertparticipants->partcipantID = $buyers;
			$insertparticipants->checkotp= rand(1111,2333);
			$insertparticipants->save();
			}
		}
		return $this->redirect('review?id='.$_GET['id'].'');
	}
        $request = Yii::$app->request;
        if($request->isAjax){
            Yii::$app->response->format = Response::FORMAT_JSON;
            return [
                    'title'=> "VrSetup #".$id,
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
     * Creates a new VrSetup model.
     * For ajax request will return json object
     * and for non-ajax request if creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $request = Yii::$app->request;
        $model = new VrSetup();  

        if($request->isAjax){
            /*
            *   Process for ajax request
            */
            Yii::$app->response->format = Response::FORMAT_JSON;
            if($request->isGet){
                return [
                    'title'=> "Create new VrSetup",
                    'content'=>$this->renderAjax('create', [
                        'model' => $model,
                    ]),
                    'footer'=> Html::button('Close',['class'=>'btn btn-default pull-left','data-dismiss'=>"modal"]).
                                Html::button('Save',['class'=>'btn btn-primary','type'=>"submit"])
        
                ];         
            }else if($model->load($request->post()) && $model->save()){
                return [
                    'forceReload'=>'#crud-datatable-pjax',
                    'title'=> "Create new VrSetup",
                    'content'=>'<span class="text-success">Create VrSetup success</span>',
                    'footer'=> Html::button('Close',['class'=>'btn btn-default pull-left','data-dismiss'=>"modal"]).
                            Html::a('Create More',['create'],['class'=>'btn btn-primary','role'=>'modal-remote'])
        
                ];         
            }else{           
                return [
                    'title'=> "Create new VrSetup",
                    'content'=>$this->renderAjax('create', [
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
				$secretcode = rand(1111,8949883);
                $VrSetuptest = \common\models\VrSetuptest::find()->where(['id'=>$model->id])->one();
                
				if($VrSetuptest){

                    $auction_type = $VrSetuptest->auction_type;

                    if($auction_type == 'reverse_auction'){
                    $propertyID = $VrSetuptest->propertyID;
                    $brandID =  \common\models\Addproperty::find()->where(['id'=>$propertyID])->one();
                    $VrSetuptest->town_name = $brandID->town_name;
                    $VrSetuptest->sector_name = $brandID->sector_name;
                }



                    $VrSetuptest->approverID = Yii::$app->user->identity->id;
					$VrSetuptest->secret_code = $secretcode;
					$VrSetuptest->save();
				}
                return $this->redirect(['view', 'id' => $model->id]);
            } else {
                return $this->render('create', [
                    'model' => $model,
                ]);
            }
        }
       
    }

    /**
     * Updates an existing VrSetup model.
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
                    'title'=> "Update VrSetup #".$id,
                    'content'=>$this->renderAjax('update', [
                        'model' => $model,
                    ]),
                    'footer'=> Html::button('Close',['class'=>'btn btn-default pull-left','data-dismiss'=>"modal"]).
                                Html::button('Save',['class'=>'btn btn-primary','type'=>"submit"])
                ];         
            }else if($model->load($request->post()) && $model->save()){
                return [
                    'forceReload'=>'#crud-datatable-pjax',
                    'title'=> "VrSetup #".$id,
                    'content'=>$this->renderAjax('view', [
                        'model' => $model,
                    ]),
                    'footer'=> Html::button('Close',['class'=>'btn btn-default pull-left','data-dismiss'=>"modal"]).
                            Html::a('Edit',['update','id'=>$id],['class'=>'btn btn-primary','role'=>'modal-remote'])
                ];    
            }else{
                 return [
                    'title'=> "Update VrSetup #".$id,
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
                return $this->redirect(['view', 'id' => $model->id]);
            } else {
                return $this->render('update', [
                    'model' => $model,
                ]);
            }
        }
    }

    /**
     * Delete an existing VrSetup model.
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
     * Delete multiple existing VrSetup model.
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
     * Finds the VrSetup model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return VrSetup the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
	  protected function findModelp($id)
    {
        if (($model = \common\models\Addpropertybackend::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    protected function findModel($id)
    {
        if (($model = VrSetup::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
