<?php

namespace backend\controllers;

use Yii;
use common\models\Leads;
use common\models\LeadsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use common\models\CompanyEmp;

/**
 * LeadsController implements the CRUD actions for Leads model.
 */
class LeadsController extends Controller {

    public $layout = "csr_layout";

    public function behaviors() {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all Leads models.
     * @return mixed
     */
    public function actionIndex() {
        $searchModel = new LeadsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Leads model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id) {
        return $this->render('view', [
                    'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Leads model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {
        $model = new Leads();

        if ($model->load(Yii::$app->request->post())) {

            //  echo '<pre>';print_r(Yii::$app->request->post());die;
            $userid = Yii::$app->user->identity->id;
            $model->move_to_alloted = 2;
            $model->save();

            $Leadcurrentstatus = new \common\models\Leadcurrentstatus();
            $Leadcurrentstatus->leadid = $model->id;
            $Leadcurrentstatus->role_id = $model->role_id;
            $Leadcurrentstatus->statusid = 1;
            $Leadcurrentstatus->leadactionstatus = 8;
            $Leadcurrentstatus->special = "yes";
            $Leadcurrentstatus->save();
            //assign CSR

            $newleadid = $model->id;
            $newleadstatus = $Leadcurrentstatus->id;
            $date = date('Y-m-d h:i:s');
            $querys = CompanyEmp::find()->where(['userid'=>$userid])->one();
            $assigned_id = $querys->id;

            $trendingadd = \Yii::$app->db->createCommand()->insert('leadassignment', ['leadid' => $newleadid, 'lead_current_status_ID' => $newleadstatus, 'assigned_toID' => $assigned_id, 'assigned_at' => $date])->execute();
           if($trendingadd){
            return $this->redirect(['view', 'id' => $model->id]);
            }

            
        } else {
            return $this->render('create', [
                        'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Leads model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id) {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['leadrequest/index', 'status' => '1']);
        } else {
            return $this->render('update', [
                        'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Leads model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id) {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Leads model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Leads the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = Leads::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

}

