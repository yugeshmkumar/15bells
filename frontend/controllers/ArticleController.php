<?php

namespace frontend\controllers;

use common\models\Article;
use common\models\ArticleAttachment;
use frontend\models\search\ArticleSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use common\models\Article_comments;
use Yii;


/**
 * @author Eugene Terentev <eugene@terentev.net>
 */
class ArticleController extends Controller
{
    /**
     * @return string
     */
    public function __construct($id, $module, $config = array()) {
        parent::__construct($id, $module, $config);
        $this->layout = "homeLayout";
    }
    
    public function actionIndex()
    {
        $searchModel = new ArticleSearch();
        $dataProvider = $searchModel->search(\Yii::$app->request->queryParams);
//        $dataProvider->sort = [
//            'defaultOrder' => ['created_at' => SORT_DESC]
//        ];
        return $this->render('index', ['dataProvider'=>$dataProvider]);
    }

    /**
     * @param $slug
     * @return string
     * @throws NotFoundHttpException
     */


    public function actionView($slug)
    {
        $model = Article::find()->andWhere(['slug'=>$slug])->one();
        if (!$model) {
            throw new NotFoundHttpException;
        }

        $viewFile = $model->view ?: 'view';
        return $this->render($viewFile, ['model'=>$model]);
    }




    public function actionAttachmentDownload($id)
    {
        $model = ArticleAttachment::findOne($id);
        if (!$model) {
            throw new NotFoundHttpException;
        }

        return \Yii::$app->response->sendStreamAsFile(
            \Yii::$app->fileStorage->getFilesystem()->readStream($model->path),
            $model->name
        );
    }

    public function actionSavecomments(){

       

        $model = new Article_comments();
         
         date_default_timezone_set("Asia/Calcutta");
         $date = date('Y-m-d H:i:s');

        //  echo '<pre>';print_r(Yii::$app->request->post());die;
        if ($model->load(Yii::$app->request->post()) && $model->validate() ) {
            
            $model->created_date = $date;
            if($model->save()){
                return $this->redirect(Yii::$app->request->referrer);
            }
        }else{
           print_r($model->errors);die;
        }


    }
}
