<?php

namespace frontend\controllers;

use Yii;
use common\models\SellorExpectations;
use common\models\SellorExpectationsSearch;
use frontend\models\UserForm;
use frontend\models\search\UserSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * SellorExpectationsController implements the CRUD actions for SellorExpectations model.
 */
class SellorExpectationsController extends Controller
{
    /**
     * @inheritdoc
     */
    public function __construct($id, $module, $config = array()) {
        parent::__construct($id, $module, $config);
        $this->layout = "newdashboard";
    }
    
    
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['login', 'error'],
                        'allow' => true,
                    ],
                    [
                        'actions' => ['index','sellor','buyer','view','viewmy','create','expectationsindexbuyer','creates','update','updated','updateb','updates','updateinsellor','delete'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
           
        ];
    }

    /**
     * Lists all SellorExpectations models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new SellorExpectationsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionExpectationsindexbuyer()
    {
        $searchModel = new UserSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('documentindexbuyer', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }


    



    public function actionSellor()
    {
        $searchModel = new SellorExpectationsSearch();
        $dataProvider = $searchModel->searchs(Yii::$app->request->queryParams);

        return $this->render('sellor', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }


    public function actionBuyer()
    {
        $searchModel = new SellorExpectationsSearch();
        $dataProvider = $searchModel->searchb(Yii::$app->request->queryParams);

        return $this->render('buyer', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single SellorExpectations model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        // $cache = Yii::$app->cache;
        // $secretKey = $cache['random'];
        // if($secretKey === false){
        //     Yii::trace('set secret Key in Cache');
        //     $secretKey = Yii::$app->security->generateRandomKey();
        //     $cache->set('random',$secretKey,10);
        // }

        $db = Yii::$app->db;
        $model = $db->cache(function($db) use ($id){
            return Yii::$app->controller->findModel($id);
        });

        return $this->render('view', [
            'model' => $model,
            //'key'   =>$secretKey,
        ]);
    }


    public function actionViewmy()
    {
        $id = $_POST['expandRowKey'];

        $db = Yii::$app->db;
        $model = $db->cache(function($db) use ($id){
            return Yii::$app->controller->findModel($id);
        });
        return $this->renderPartial('view', [
            'model' => $model,
        ]);
    }

    /**
     * Creates a new SellorExpectations model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new SellorExpectations();
        
        if(isset($_GET['id'])){
           $get_id = $_GET['id']; 
        }        
        
         $userid = Yii::$app->user->identity->id;
         date_default_timezone_set("Asia/Calcutta");
         $date = date('Y-m-d H:i:s');
         
        if ($model->load(Yii::$app->request->post())) {
            
            $model->user_id = $userid;
            $model->user_type = 'sellor';            
             if($get_id != ''){
                
                $model->property_id = $get_id;
             }
            
             $model->created_date = $date;
             $model->save();
            
            return $this->redirect(['addproperty/additionals', 'idm' => $get_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }
    
    
    public function actionCreates()
    {
        $model = new SellorExpectations();
               
        
         $userid = Yii::$app->user->identity->id;
         date_default_timezone_set("Asia/Calcutta");
         $date = date('Y-m-d H:i:s');
         
        if ($model->load(Yii::$app->request->post())) {
            
//echo '<pre>';print_r(Yii::$app->request->post());die;
            $model->user_id = $userid;
            $model->user_type = 'buyer';            
             
             $model->created_date = $date;
             if($model->save()){

                 echo $model->id;
                 
             }else{
                 echo 0;    
             }
            
            //return $this->redirect(['addproperty/additionals', 'idm' => $get_id]);
        } else {
            return $this->renderAjax('creates', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing SellorExpectations model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
           // return $this->redirect(['view', 'id' => $model->id]);
              //return $this->goBack();
              return $this->redirect(Yii::$app->request->referrer);  
            //return $this->redirect(['sellor-expectations/sellor']);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }


   public function actionUpdateb($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
           
             
            return $this->redirect(['sellor-expectations/buyer']);
        } else {
            return $this->render('updateb', [
                'model' => $model,
            ]);
        }
    }

   public function actionUpdates($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
           
             
            return $this->redirect(['sellor-expectations/sellor']);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    public function actionUpdated($id)
    {
        $model = $this->findModel($id);
        
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
           echo 1;
        } else {
            return $this->renderAjax('updated', [
                'model' => $model,
            ]);
        }
    }


    public function actionUpdateinsellor($id)
    {
        $model = $this->findModel($id);
        $propid = $model->property_id;

        if ($model->load(Yii::$app->request->post())) {

       // echo '<pre>';print_r(Yii::$app->request->post());die;
          $post = Yii::$app->request->post();
          $price = $post['SellorExpectations']['expected_rate'];
          $model->expected_rate=$price;
            $model->save(); 
            return $this->redirect(['addproperty/additionals','idm'=>$propid]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing SellorExpectations model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

         // return $this->redirect(['index']);
          return $this->redirect(Yii::$app->request->referrer);
    }

    /**
     * Finds the SellorExpectations model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return SellorExpectations the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = SellorExpectations::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
