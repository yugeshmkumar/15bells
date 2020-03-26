<?php

namespace backend\controllers;

use Yii;
use common\models\Leads;
use common\models\LeadsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use common\models\CompanyEmp;
use common\models\LeadsSales;
use common\models\LeadcurrentstatusSales;
use common\models\LeadassignmentSales;

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

            //   echo '<pre>';print_r(Yii::$app->request->post()['Leads']['sales_id']);die;

            $sales_id =  Yii::$app->request->post()['Leads']['sales_id'];
            $date = date('Y-m-d h:i:s');
            if(!$sales_id && $sales_id == ''){

            $userid = Yii::$app->user->identity->id;
            $model->move_to_alloted = 1;
            $model->created_at = $date;
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
            
            $querys = CompanyEmp::find()->where(['userid'=>$userid])->one();
            $assigned_id = $querys->id;

            $trendingadd = \Yii::$app->db->createCommand()->insert('leadassignment', ['leadid' => $newleadid, 'lead_current_status_ID' => $newleadstatus, 'assigned_toID' => $assigned_id, 'assigned_at' => $date])->execute();
           if($trendingadd){
            return $this->redirect(['leadrequest/index', 'status' => '1']);
            }

        }else{


            $userid = Yii::$app->user->identity->id;
            $model->move_to_alloted = 1;
            $model->created_at = $date;

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
           
            $Assignleadtoemployee1 = new LeadsSales;
            $Assignleadtoemployee1->user_id = $model->user_id;
            $Assignleadtoemployee1->lead_id = $model->id;
            $Assignleadtoemployee1->email = $model->email;
            $Assignleadtoemployee1->location = $model->location;
            $Assignleadtoemployee1->role_id = $model->role_id;
            $Assignleadtoemployee1->name = $model->name;
            $Assignleadtoemployee1->number = $model->number;
            $Assignleadtoemployee1->product_id = 0;
            $Assignleadtoemployee1->save();


            $Assignleadtoemployee2 = new LeadcurrentstatusSales;
            $Assignleadtoemployee2->leadid = $Assignleadtoemployee1->id;
            $Assignleadtoemployee2->role_id = $model->role_id;
            $Assignleadtoemployee2->statusid = '1';
            $Assignleadtoemployee2->leadactionstatus = '8';
            $Assignleadtoemployee2->save();


            $Assignleadtoemployee3 = new LeadassignmentSales;
            $Assignleadtoemployee3->leadid = $Assignleadtoemployee1->id;
            $Assignleadtoemployee3->lead_current_status_ID = $Assignleadtoemployee2->id;
            $Assignleadtoemployee3->assigned_toID = $sales_id;
            $Assignleadtoemployee3->assigned_at = date('Y-m-d h:i:s');
            $Assignleadtoemployee3->save();
           
           
           
            if($trendingadd){
                return $this->redirect(['leadrequest/index', 'status' => '1']);
            }

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

