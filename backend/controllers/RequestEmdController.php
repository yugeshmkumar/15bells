<?php

namespace backend\controllers;

use Yii;
use common\models\RequestEmd;
use common\models\RequestEmdSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
/**
 * RequestEmdController implements the CRUD actions for RequestEmd model.
 */
class RequestEmdController extends Controller
{
    /**
     * @inheritdoc
     */
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
    
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
          'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['login', 'error'],
                        'allow' => true,
                    ],
                    [
                        'actions' => ['index','view','create','update','delete','forward','reverse','reversebybrand','movetoforward','movetoreverse'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
    }

    /**
     * Lists all RequestEmd models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new RequestEmdSearch();
        $dataProvider = $searchModel->searches(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }


    public function actionForward()
    {
        $searchModel = new RequestEmdSearch();
        $dataProvider = $searchModel->searchforward(Yii::$app->request->queryParams);

        return $this->render('forward', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }


    public function actionReverse()
    {
        $searchModel = new RequestEmdSearch();
        $dataProvider = $searchModel->searchreverse(Yii::$app->request->queryParams);

        return $this->render('reverse', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }


    public function actionReversebybrand()
    {
        $searchModel = new RequestEmdSearch();
        $dataProvider = $searchModel->searchreversebybrand(Yii::$app->request->queryParams);

        return $this->render('reversebybrand', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }


    public function actionMovetoforward() {

        $requestid = $_GET['requestid'];
        
        if ($requestid != '') {
            
            $model = $this->findModel($requestid);

            $model->for_auction = 'forward';

            if ($model->save(false)) {
                return 1;
            } else {
                return 0;
            }
        }
    }

    public function actionMovetoreverse() {

        $requestid = $_GET['requestid'];
        $propid = $_GET['propid'];
        $user_id =   \common\models\Addproperty::findOne(['id'=>$propid])->user_id;
        $town_name =   \common\models\Addproperty::findOne(['id'=>$propid])->town_name;
        $sector_name =   \common\models\Addproperty::findOne(['id'=>$propid])->sector_name;
        
        if ($requestid != '') {
            
            $model = $this->findModel($requestid);
            $data = $this->findModel($requestid)->attributes;

            $model->for_auction = 'reverse';
            $model->lessor_id = $user_id;
            $model->town_name = $town_name;
            $model->sector_name = $sector_name;

            if ($model->save(false)) {  
                
                
        $findbrandid =   \common\models\RequestEmd::find()->where(['brandid'=>$model->user_id])->andwhere(['town_name'=>$town_name])->andwhere(['sector_name'=>$sector_name])->one();

if(!$findbrandid){

                // echo '<pre>';print_r($data);die;              
                $anotherModel = new RequestEmd();                
                $anotherModel->setAttributes($data);
                //$anotherModel->property_id= NULL;
                $anotherModel->brandid= $model->user_id;;
                $anotherModel->lessor_id= NULL;
                $anotherModel->town_name= $town_name;
                $anotherModel->sector_name= $sector_name;
               $anotherModel->for_auction= 'reverse';

               
               if($anotherModel->save(false)){
                   

               // $propid =  $model->property_id;
                date_default_timezone_set("Asia/Calcutta");
                $date = date('Y-m-d H:i:s');
                $user_id =   \common\models\Addproperty::findOne(['id'=>$propid])->user_id;
                $link  =     Yii::getAlias('@frontendUrl').'/addproperty/lesview';

                $trendingadd = \Yii::$app->db->createCommand()->insert('notifications', ['item_name' => 'Auction Approval', 'item_id' => $user_id, 'link' => $link, 'description'=>'Your property required approval for reverse auction','date' => $date])->execute();


                return 1;
               }else {

                return 0;
            }

        }else{


            date_default_timezone_set("Asia/Calcutta");
                $date = date('Y-m-d H:i:s');
                $user_id =   \common\models\Addproperty::findOne(['id'=>$propid])->user_id;
                $link  =     Yii::getAlias('@frontendUrl').'/addproperty/lesview';

                $trendingadd = \Yii::$app->db->createCommand()->insert('notifications', ['item_name' => 'Auction Approval', 'item_id' => $user_id, 'link' => $link, 'description'=>'Your property required approval for reverse auction','date' => $date])->execute();


                return 1;
        }





            } else {
                return 0;
            }
        }
    }

    /**
     * Displays a single RequestEmd model.
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
     * Creates a new RequestEmd model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new RequestEmd();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing RequestEmd model.
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
     * Deletes an existing RequestEmd model.
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
     * Finds the RequestEmd model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return RequestEmd the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = RequestEmd::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
