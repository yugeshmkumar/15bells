<?php

namespace frontend\controllers;

use Yii;
//use common\models\User;
use frontend\models\UserForm;
use frontend\models\search\UserSearch;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
//use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
//use frontend\modules\user\models\SignupForm;

/**
 * UserController implements the CRUD actions for User model.
 */
class UseriphoneController extends Controller
{


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
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all User models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new UserSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single User model.
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
     * Creates a new User model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
       
        $model = new UserForm();
        $model->setScenario('create');
        //echo '<pre>';print_r(Yii::$app->request->post());die;
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        }

        return $this->render('create', [
            'model' => $model,
            'roles' => ArrayHelper::map(Yii::$app->authManager->getRoles(), 'name', 'name')
        ]);
    }



     public function actionAddsubuser()
     {
	 $user_id = Yii::$app->user->identity->id;
         $getstatus = \common\models\MyProfileProgressStatus::getStatus($user_id);
         $model = new SignupForm();
         
        
         if ($model->load(Yii::$app->request->post())) {

              
  //echo '<pre>';print_r(Yii::$app->request->post());die;

                $post = Yii::$app->request->post();
                
                $username = $post['SignupForm']['username'];
                $email = $post['SignupForm']['email'];
                $password = $post['SignupForm']['password'];

		$saveuser = new \common\models\User();
		$saveuser->username = $username;
		$saveuser->email = $email;
		$saveuser->setPassword($password);
		$saveuser->save();
					
                  $userd =  $saveuser->afterCsrSignup();
             if($userd){
               Yii::$app->session->setFlash('success', "New CSR has been Successfully Created");
              
            }

           }
        return $this->render('addsubuser', [
                'model' => $model,
            ]);


    }

    /**
     * Updates an existing User model.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = new UserForm();
        $model->setModel($this->findModel($id));
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        }

        return $this->render('update', [
            'model' => $model,
            'roles' => ArrayHelper::map(Yii::$app->authManager->getRoles(), 'name', 'name')
        ]);
    }

    /**
     * Deletes an existing User model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        Yii::$app->authManager->revokeAll($id);
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the User model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return User the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = User::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
