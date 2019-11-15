<?php

namespace backend\controllers;

use Yii;
use common\models\User;
use backend\models\UserForm;
use backend\models\search\UserSearch;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * UserController implements the CRUD actions for User model.
 */
class UsersetController extends Controller
{
	public $layout = 'supervisor_layout';
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
        $dataProvider = $searchModel->searchbydesc(Yii::$app->request->queryParams);

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
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        }
		$arrfindallroles = \common\models\UserRoles::find()->where(['roletype'=>"high",'isactive'=>1])->all();
	

        return $this->render('create', [
            'model' => $model,
            'roles' => ArrayHelper::map($arrfindallroles, 'rolename', 'rolename')
        ]);
    }

    /**
     * Updates an existing User model.
     * @param integer $id
     * @return mixed
     */
	 public function actionUpdatecommentaction()
	 {
		 $getWritecomment  = $_GET['writecomment'];
		 $userid = $_GET['id'];
		 $checkifalreadyexists = \common\models\UserComments::find()->where(['added_for'=>$userid])->one();
		 if(!$checkifalreadyexists){
		 $usercomments = new \common\models\UserComments();
		 $usercomments->comment =$getWritecomment;
		 $usercomments->added_for = $userid;
		 $usercomments->added_by = Yii::$app->user->identity->id;
		 $usercomments->save();
		 }else {
		 $checkifalreadyexists->comment =$getWritecomment;
		 $checkifalreadyexists->added_for = $userid;
		 $checkifalreadyexists->added_by = Yii::$app->user->identity->id;
		 $checkifalreadyexists->save(); 
		 }
		 return  true;
	 }
	 public function actionWritecommentforuser()
	 {
		 
		 return $this->renderPartial('writecommentforuser');
	 }
    public function actionUpdate($id)
    {
        $model = new UserForm();
        $model->setModel($this->findModel($id));
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        }
$arrfindallroles = \common\models\UserRoles::find()->where(['isactive'=>1])->all();
	
        return $this->render('update', [
            'model' => $model,
           'roles' => ArrayHelper::map($arrfindallroles, 'rolename', 'rolename')
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
