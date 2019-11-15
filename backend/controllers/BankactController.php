<?php

namespace backend\controllers;

use Yii;
	
use common\models\Banknew;
use common\models\BanknewSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * BankController implements the CRUD actions for Bank model.
 */
class BankactController extends Controller
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
        ];
    }

    /**
     * Lists all Bank models.
     * @return mixed
     */
	  public function actionBankdetails() {
		  $userid = $_GET['id'];
		       
			   $rbac = \common\models\RbacAuthAssignment::find()->where(['user_id'=>yii::$app->user->identity->id])->one();
	if($rbac->item_name == "csr_demand"){
		$this->layout="csr_demand_layout";
	}if($rbac->item_name == "csr_head"){
		$this->layout="csr_head_layout";
	}if($rbac->item_name == "csr_supply"){
		$this->layout="csr_supply_layout";
	}
        $getstatus = \common\models\MyProfileProgressStatus::getStatus($userid);


		  $model = new Banknew();

        if ($model->load(Yii::$app->request->post())) {
			$request = Yii::$app->request->post();
			$modelreq = $request['Banknew'];
		$banknam3 =$modelreq['bank_name'];
         $accountno =   $modelreq['account_no'];
          $isfcode =     $modelreq['isfc_code'];
          $zipcode =  $modelreq['zip_code'];
         $accounttpe = $modelreq['account_type'];
         $branchname =  $modelreq['branch_name'];
        $branchaccntname =$modelreq['bank_accnt_name'];
        
		$model->user_id =  $userid;
		$model->bank_name=$banknam3;
		$model->account_no=$accountno;
		$model->isfc_code= $isfcode ;
		$model->zip_code=$zipcode;
		$model->account_type=$accounttpe ;
		$model->branch_name=$branchname;
		$model->bank_accnt_name=$branchaccntname;
		$model->user_auth="user";
		$model->save();
\common\models\activemode::update_my_profile_progress_status($userid,"my_bank",'100','3');
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('bankdetails', [
                'model' => $model,
            ]);
        }
       
    }
    public function actionIndex()
    {
        $searchModel = new BankSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Bank model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
		 $rbac = \common\models\RbacAuthAssignment::find()->where(['user_id'=>yii::$app->user->identity->id])->one();
	if($rbac->item_name == "csr_demand"){
		$this->layout="csr_demand_layout";
	}if($rbac->item_name == "csr_head"){
		$this->layout="csr_head_layout";
	}if($rbac->item_name == "csr_supply"){
		$this->layout="csr_supply_layout";
	}
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Bank model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Bank();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Bank model.
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
     * Deletes an existing Bank model.
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
     * Finds the Bank model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Bank the loaded model
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
