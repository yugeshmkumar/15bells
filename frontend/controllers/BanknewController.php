<?php

namespace frontend\controllers;

use Yii;
use common\models\Banknew;
use common\models\BanknewSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * BanknewController implements the CRUD actions for Banknew model.
 */
class BanknewController extends Controller
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
                    'delete' => ['POST'],
                ],
            ],
            // 'access' => [
            //             'class' => \yii\filters\AccessControl::className(),
            //             'only' => ['index'],
            //             'rules' => [
            //                 // allow authenticated users
            //                 [
            //                     'allow' => true,
            //                     'roles' => ['?'],
            //                 ],
            //                 // everything else is denied
            //             ],
            //         ],            
        ];
    }

    /**
     * Lists all Banknew models.
     * @return mixed
     */
    public function actionIndex()
    {
        $this->layout = "dashboard";
        $searchModel = new BanknewSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Banknew model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
		 $this->layout = "newdashboard";
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }


    public function actionBank()
    {

        $model = new Banknew();
         $this->layout = "dashboard";
         

        return $this->render('bank', [
            'model' =>  $model,
        ]);
    }

    /**
     * Creates a new Banknew model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Banknew();

        $user_id = Yii::$app->user->identity->id;
        $getstatus = \common\models\MyProfileProgressStatus::getStatus($user_id);


        if ($getstatus == 1) {
            
          $this->layout = "dashboard";
        } else {

            $this->layout = "dashboard";  // common
        }

        if ($model->load(Yii::$app->request->post()) ) {
               $request = Yii::$app->request->post();
          //print_r($request);die;
			$modelreq = $request['Banknew'];
		$banknam3 =$modelreq['bank_name'];
         $accountno =   $modelreq['account_no'];
          $isfcode =     $modelreq['isfc_code'];
         
         $accounttpe = $modelreq['account_type'];
         $branchname =  $modelreq['branch_name'];
        $branchaccntname =$modelreq['bank_accnt_name'];
        $userid = Yii::$app->user->identity->id;
		$model->user_id =  $userid;
		$model->bank_name=$banknam3;
		$model->account_no=$accountno;
		$model->isfc_code= $isfcode ;
		
		$model->account_type=$accounttpe ;
		$model->branch_name=$branchname;
		$model->bank_accnt_name=$branchaccntname;
		$model->user_auth="user";
		$model->save();



            return $this->redirect(['bank']);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Banknew model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
		 $this->layout = "dashboard";
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['bank']);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Banknew model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

     public function actionBankdelete($id){

       $this->findModel($id)->delete();
        //return $this->redirect(['create']);
     }

    /**
     * Finds the Banknew model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Banknew the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Banknew::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
