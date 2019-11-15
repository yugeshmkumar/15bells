<?php

namespace frontend\controllers;

use Yii;
use common\models\Bellsfaqs;
use common\models\BellsfaqsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\data\Pagination;

/**
 * FaqController implements the CRUD actions for Bellsfaqs model.
 */
class FaqController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }


    public function __construct($id, $module, $config = array()) {
        parent::__construct($id, $module, $config);
        $this->layout = "homeLayout";
    }

    /**
     * Lists all Bellsfaqs models.
     * @return mixed
     */
    // public function actionIndex()
    // {
    //     $searchModel = new BellsfaqsSearch();
    //     $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

    //     return $this->render('index', [
    //         'searchModel' => $searchModel,
    //         'dataProvider' => $dataProvider,
    //     ]);
    // }


    public function actionIndex(){

        

        if (\Yii::$app->request->isPost) {

           
            $_POST = Yii::$app->request->post();
            $role = $_POST['role'];
           
            $query = Bellsfaqs::find()->where(['page'=>$role]);   
            
            
         } else if(isset($_GET['search2'])){

            $searchid = $_GET['searchid'];
            $query = Bellsfaqs::find()->where(['id'=>$searchid]); 
        }else{

         $query = Bellsfaqs::find();   
         }

        $pagination = new Pagination([
            'defaultPageSize' => 5,
            'totalCount' => $query->count(),
        ]);

        $countries = $query->orderBy('id')                            
                           ->offset($pagination->offset)
                           ->limit($pagination->limit)
                           ->all();

        return $this->render('index', [
            'countries' => $countries,
            'pagination' => $pagination,
        ]);


    }


    public function actionCitylist($term) {
        
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
    
        
        $out = ['id' => '', 'text' => ''];
        $response = array();
        if (!is_null($term)) {
            $query = new \yii\db\Query;
            $query->select('id,subject AS text')
                ->from('15bellsfaqs')
                ->where(['like', 'subject', $term])
                ->limit(20);
            $command = $query->createCommand();
            $data = $command->queryAll();
        // echo '<pre>';print_r($data);die;
        foreach ($data as $datas){
            $response[] = array("id"=>$datas['id'],"value"=>$datas['text']);
        }
            
        }
        
        return $response;
}

    /**
     * Displays a single Bellsfaqs model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Bellsfaqs model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Bellsfaqs();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Bellsfaqs model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Bellsfaqs model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Bellsfaqs model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Bellsfaqs the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Bellsfaqs::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
