<?php

namespace frontend\controllers;

use Yii;
use common\models\Callbuttonaction;
use common\models\CallbuttonactionSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use common\models\Addpropertypm;


/**
 * CallbuttonactionController implements the CRUD actions for Callbuttonaction model.
 */
class CallbuttonactionController extends Controller
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

    /**
     * Lists all Callbuttonaction models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new CallbuttonactionSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Callbuttonaction model.
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
     * Creates a new Callbuttonaction model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Callbuttonaction();

        if ($model->load(Yii::$app->request->post())) {
           // return $this->redirect(['view', 'id' => $model->id]);
          // echo '<pre>';print_r(Yii::$app->request->post()['Callbuttonaction']['property_id']);die;
           $propid  = Yii::$app->request->post()['Callbuttonaction']['property_id'];
           $user_phone  = Yii::$app->request->post()['Callbuttonaction']['user_phone'];
          $propuserids = Addpropertypm::find('locality')->where(['id' => $propid])->andwhere(['status' => 'approved'])->one();
    

        $message = 'This '.$user_phone.' has shown interest in this Property-id '.$propid;
            //Your authentication key

        $authKey = "222784ARHZNXuXI5b334809";
        $mobileNumber = '9355731515';

        //Multiple mobiles numbers separated by comma
        //$mobileNumber = $phonenum;

        //Sender ID,While using route4 sender id should be 6 characters long.
        $senderId = "XVBELL";

        //Your message to send, Add URL encoding here.
    // $message = urlencode("Your Verification Code is ".$activation."");

        //Define route 
        $route = 4;

        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => "https://api.msg91.com/api/sendhttp.php?mobiles=$mobileNumber&authkey=$authKey&route=$route&sender=$senderId&message=$message&country=91",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_SSL_VERIFYHOST => 0,
        CURLOPT_SSL_VERIFYPEER => 0,
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
       // echo "cURL Error #:" . $err;die;
        } else {
        //echo $response;die;
        }
           if($model->save()){
               return 1;
           }
           
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Callbuttonaction model.
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
     * Deletes an existing Callbuttonaction model.
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
     * Finds the Callbuttonaction model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Callbuttonaction the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Callbuttonaction::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
