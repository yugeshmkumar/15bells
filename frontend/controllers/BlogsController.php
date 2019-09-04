<?php

namespace frontend\controllers;

use yii\web\Controller;
use Yii;
use common\models\Article;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\data\Pagination;


class BlogsController extends Controller {

    public function __construct($id, $module, $config = array()) {
        parent::__construct($id, $module, $config);
        $this->layout = "homeLayout";
    }



    public function actionIndex() {


        if (\Yii::$app->request->isPost) {


               // echo '<pre>';print_r(Yii::$app->request->post());die;
                $_POST = Yii::$app->request->post();
                $role = $_POST['keyword'];
                $search2 = $_POST['search2'];

                if(isset($search2) && !empty($search2)){

                    $query = Article::find()->where(['like', 'body', '%'.$search2 . '%', false]); 
                }
                else if(isset($role) && !empty($role)){
                   
                    $query = Article::find()->where(['like', 'body', '%'.$role . '%', false]); 

                }else{

                    $query = Article::find(); 
                }                                   
                    
                } else{

                $query = Article::find();
                }
                

                $pagination = new Pagination([
                'defaultPageSize' => 2,
                'totalCount' => $query->count(),
                ]);

                $countries = $query->orderBy('id')                            
                ->offset($pagination->offset)
                ->limit($pagination->limit)
                ->all();

                return $this->render('index', [
                'countries' => $countries,
                'pagination' => $pagination,
                ]);
       
    }




	 public function actionDet() {
        return $this->render('det');
    }


   

   

}
