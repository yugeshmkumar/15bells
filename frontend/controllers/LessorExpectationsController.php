<?php

namespace frontend\controllers;

use Yii;
use common\models\LessorExpectations;
use common\models\LessorExpectationsSearch;
use yii\web\Controller;
use frontend\models\UserForm;
use frontend\models\search\UserSearch;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * LessorExpectationsController implements the CRUD actions for LessorExpectations model.
 */
class LessorExpectationsController extends Controller
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
                        'actions' => ['index','lessor','indexes','lessee','view','expectationsindexlessee','viewmy','create','creates','update','updatee','updateor','updateinlessor','delete','updated'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
           
        ];
    }

    /**
     * Lists all LessorExpectations models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new LessorExpectationsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }


    public function actionIndexes()
    {
        

        $ids = $_GET['ids'];
        $searchModel = new LessorExpectationsSearch();
        $dataProvider = $searchModel->searched(Yii::$app->request->queryParams,$ids);

        return $this->render('indexes', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }


    public function actionExpectationsindexlessee()
    {
        $searchModel = new UserSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('documentindexlessee', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

     public function actionLessor()
    {
        $searchModel = new LessorExpectationsSearch();
        $dataProvider = $searchModel->searchles(Yii::$app->request->queryParams);

        return $this->render('lessor', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }


    public function actionLessee()
    {
        $searchModel = new LessorExpectationsSearch();
        $dataProvider = $searchModel->searchlee(Yii::$app->request->queryParams);

        return $this->render('lessee', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single LessorExpectations model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
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
     * Creates a new LessorExpectations model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreates()
    {
        $model = new LessorExpectations(['scenario' => 'creates']);
        
         $userid = Yii::$app->user->identity->id;
         date_default_timezone_set("Asia/Calcutta");
         $date = date('Y-m-d H:i:s');


        if ($model->load(Yii::$app->request->post())) {

             
          // echo '<pre>';print_r(Yii::$app->request->post());die; 
            $post = Yii::$app->request->post();
            $model->user_id = $userid;
            $model->user_type = 'lessee';
            $model->stamp_duty_lessee='50';
            $model->stamp_duty_lessor='50';
           //$model->usuable_area_unit=$post['LessorExpectations']['usuable_area_unit'];
            
            //echo 'aya';die;
            
             $model->created_date = $date;
             
             if($model->save(false)){
                 echo $model->id;
                 
             }else{
                print_r($model->getErrors());die;
                 echo '0';    
             }
             
            
        } else {
            return $this->renderAjax('creates', [
                'model' => $model,
            ]);
        }
    }
    
    
    
    public function actionCreate()
    {
        $model = new LessorExpectations();
        
        if(isset($_GET['id'])){
           $get_id = $_GET['id']; 
        }
        
        
         $userid = Yii::$app->user->identity->id;
         date_default_timezone_set("Asia/Calcutta");
         $date = date('Y-m-d H:i:s');

        if ($model->load(Yii::$app->request->post())) {
            
            $model->user_id = $userid;
            $model->user_type = 'lessor';
            $model->stamp_duty_lessee='50';
            $model->stamp_duty_lessor='50';
            
             if($get_id != ''){
                
                $model->property_id = $get_id;
             }
            
             $model->created_date = $date;
             $model->save();
            return $this->redirect(['addproperty/additional', 'idm' => $get_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing LessorExpectations model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            //return $this->redirect(['view', 'id' => $model->id]);
            return $this->redirect(['lessor-expectations/lessor']);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }


    public function actionUpdatee($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            //return $this->redirect(['view', 'id' => $model->id]);
            return $this->redirect(['lessor-expectations/lessee']);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    } 

    public function actionUpdateor($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            //return $this->redirect(['view', 'id' => $model->id]);
            return $this->redirect(['lessor-expectations/lessor']);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    } 

    public function actionUpdateinlessor($id)
    {
        $model = $this->findModel($id);
        $propid = $model->property_id;
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            //return $this->redirect(['view', 'id' => $model->id]);
            return $this->redirect(['addproperty/additional','idm'=>$propid]);
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
    /**
     * Deletes an existing LessorExpectations model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        //return $this->redirect(['index']);
        return $this->redirect(Yii::$app->request->referrer);
    }

    /**
     * Finds the LessorExpectations model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return LessorExpectations the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = LessorExpectations::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
