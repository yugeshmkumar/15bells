<?php

namespace frontend\modules\transaction\controllers;

use Yii;
use frontend\modules\transaction\models\Transaction;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * TransactionController implements the CRUD actions for Transaction model.
 */
class TransactionController extends Controller {

    /**
     * @inheritdoc
     */
	 public $layout = 'commontrans';
    public function behaviors() {
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
     * Lists all Transaction models.
     * @return mixed
     */
  /* public function actionIndex() {
		$this->layout = "commontrans";
		 $model = new Transaction();
        $dataProvider = new ActiveDataProvider([
            'query' => Transaction::find(),
        ]);

        return $this->render('indexold', [
                    'dataProvider' => $dataProvider,
					'model'=>'$model'	
        ]);
    }*/

    /**
     * Displays a single Transaction model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id) {
        return $this->render('view', [
                    'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Transaction model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {
        $model = new Transaction();


        $model->product_id = "1";
        $model->buyer_id = Yii::$app->user->identity->id;

//echo $this->$attribute;die;

        if ($model->load(Yii::$app->request->post()) && $model->save()) {

            Yii::$app->session->setFlash('success', "Bid Placed Sucessfully");

            return $this->redirect(['create', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                        'model' => $model,
            ]);
        }
    }
	public function actionCreatesel() {
        $model = new Transaction();


        $model->product_id = "1";
        $model->buyer_id = Yii::$app->user->identity->id;

//echo $this->$attribute;die;

        if ($model->load(Yii::$app->request->post()) && $model->save()) {

            Yii::$app->session->setFlash('success', "Bid Placed Sucessfully");

            return $this->redirect(['createsel', 'id' => $model->id]);
        } else {
            return $this->render('createsel', [
                        'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Transaction model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id) {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                        'model' => $model,
            ]);
        }
    }

    public function actionBid() {
        $connection = Yii::$app->getDb();

	$time=date("Y-m-d H:i:s");



        $amt = "select max(bid_amount) as bid_amount
        from (
        select max(bid_amount) as bid_amount from transaction where product_id='1' and status='Approved'
        union all
        select max(reserved_price) as bid_amount from product_details where product_id='1'
        ) as p";
        $command_get = $connection->createCommand($amt);
        $result_chk = $command_get->queryOne();
        return $r_res = $result_chk['bid_amount'];
    }


    public function actionEndbid() {

 $model = new Transaction();
 $dbtime=$model->getTime();
 $currtime=$model->getCurrenttime();
 $r=2;
 $r++;
return $r;
       
    }
	
	   public function actionGrid() {

 $model = new Transaction();
  $data= Transaction::find()->all();
 return json_encode($data);

       
    }





    public function actionInsertajax() {
        $connection = Yii::$app->getDb();
        $model = new Transaction();
        $model->product_id = "1";
        $model->buyer_id = Yii::$app->user->identity->id;
        $model->bid_amount = $_POST['bid'];


$dbtime=$model->getTime();
$currtime=$model->getCurrenttime();

if($currtime>$dbtime)
{
echo "You cannot place bid now";die;

}


			if ($model->save()) {
			    echo "Bid Placed Successfully";
			} else {
			    echo "Please add Higher Bid";
			}
    }

    /**
     * Deletes an existing Transaction model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id) {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }
    
     public function actionTime() {
         $connection = Yii::$app->getDb();
       $model = new Transaction();
        $currtime=$model->getCurrenttime();
     
        $time=$_POST['time'];
      //  $time=720+$time;
     
     $t1='+'.$time." minutes";

  $add=date("Y-m-d H:i:s",strtotime($t1));

       $amt = "update timer set timer='$add'";
        $command_get = $connection->createCommand($amt);
     $command_get->query();
    }

    /**
     * Finds the Transaction model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Transaction the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = Transaction::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

}
