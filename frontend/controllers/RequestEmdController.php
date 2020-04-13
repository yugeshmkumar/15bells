<?php

namespace frontend\controllers;

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
        $this->layout = "dashboard";
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
                        'actions' => ['index','indexrev','view','create','update','delete','auction','checkuserconfirmstatus','makeuseryes'],
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
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }


    public function actionIndexrev()
    {
        $searchModel = new RequestEmdSearch();
        $dataProvider = $searchModel->searchrev(Yii::$app->request->queryParams);

        return $this->render('indexrev', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }



    public function actionAuction(){

        $this->layout = "dashboard";
        
        return $this->render('auction');

    }


    public function actionCheckuserconfirmstatus(){

         $user_id = Yii::$app->user->identity->id;
        $propid =   \common\models\Addproperty::find()->where(['user_id'=>$user_id])->all();
// echo '<pre>';print_r($propid);die;
        $proparray = [];
        foreach($propid as $propids){


          $finduser = \common\models\RequestEmd::find()->where(['property_id'=>$propids->id])       
          ->andwhere(['client_owner_confirmation'=> 'noinput'])
          ->one();

          $brandname = \common\models\User::find()->where(['id'=>$finduser->user_id])       
          ->andwhere(['status'=> 1])
          ->one();
        if($finduser && $brandname){

            $proparray[] = $finduser->property_id;
            $proparray[] = $brandname->fullname;
            $proparray[] = $finduser->id;
        }

         }

         return json_encode($proparray);

    }



    public function actionMakeuseryes(){

           $returnid  =  $_POST['id'];
           $buttonid  =  $_POST['buttonid'];

         
           if($returnid && $buttonid){
            
           $model = $this->findModel($returnid);

           $model->client_owner_confirmation = $buttonid;
           if($model->save(false)){
               return 1;
           }else{
               return 2;
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
