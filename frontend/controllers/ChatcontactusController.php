<?php

namespace frontend\controllers;

use Yii;
use common\models\ChatContactUs;
use common\models\ChatContactUsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\HtmlPurifier;


/**
 * ChatcontactusController implements the CRUD actions for ChatContactUs model.
 */
class ChatcontactusController extends Controller
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
     * Lists all ChatContactUs models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ChatContactUsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single ChatContactUs model.
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
     * Creates a new ChatContactUs model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new ChatContactUs();
        date_default_timezone_set("Asia/Calcutta");
         $date = date('Y-m-d H:i:s');

        if ($model->load(Yii::$app->request->post())) {

            $post = Yii::$app->request->post();
// print_r($post);die;
            $model->name = HtmlPurifier::process($post['ChatContactUs']['name']);
            $model->email = HtmlPurifier::process($post['ChatContactUs']['email']);
            $model->phone = HtmlPurifier::process($post['ChatContactUs']['phone']);
            //$model->phone = HtmlPurifier::process($post['ChatContactUs']['phone']);
            
            $model->created_date = $date;

            $model->save(false);
            return 1;
            //return $this->redirect(['view', 'id' => $model->id]);
        } else{
            return 2;
        }
        // else {
        //     return $this->render('create', [
        //         'model' => $model,
        //     ]);
        // }
    }

    /**
     * Updates an existing ChatContactUs model.
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
     * Deletes an existing ChatContactUs model.
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
     * Finds the ChatContactUs model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return ChatContactUs the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = ChatContactUs::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
