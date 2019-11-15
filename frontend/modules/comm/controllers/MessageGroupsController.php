<?php

namespace frontend\modules\comm\controllers;

use Yii;
use frontend\modules\comm\models\MessageGroups;
use frontend\modules\comm\models\MessageGroupsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * MessageGroupsController implements the CRUD actions for MessageGroups model.
 */
class MessageGroupsController extends Controller
{
    /**
     * @inheritdoc
     */
	 public $layout = "common";
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
     * Lists all MessageGroups models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new MessageGroupsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single MessageGroups model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModeltwo($id),
        ]);
    }

    /**
     * Creates a new MessageGroups model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new MessageGroups();
           
		$request = Yii::$app->request->post();
                if(!empty($request)){
            $modelreq=$request['MessageGroups'];
            $listname=$modelreq['listname'];
			 $userID=$modelreq['userID'];
			if(!empty($userID)){
				foreach($userID as $userIDone){
					$checkifalreadyexists = MessageGroups::find()->where(['userID'=>$userIDone,'listname'=>$listname])->one();
					if(!$checkifalreadyexists){
					$addtomymodel = new MessageGroups();
					$addtomymodel->listname =$listname;
					$addtomymodel->userID =$userIDone;
					$addtomymodel->save();
				}}
			}
            $searchModel = new MessageGroupsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing MessageGroups model.
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
     * Deletes an existing MessageGroups model.
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
     * Finds the MessageGroups model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return MessageGroups the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = MessageGroups::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
	 protected function findModeltwo($listname)
    {
        if (($model = MessageGroups::find()->where(['listname'=>$listname])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
