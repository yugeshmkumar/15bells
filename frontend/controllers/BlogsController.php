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

         //    meta tags description starts here  

		$title =  \Yii::$app->view->title = '15Bells Blogs - Latest Real Estate News | Find the best of commercial real estate';

		Yii::$app->view->registerMetaTag([
		'name' => 'viewport',			
		'content' => 'width=device-width,  minimum-scale=1,  maximum-scale=1'
		]);
		\Yii::$app->view->registerMetaTag([
		'name' => 'description',			
		'content' => '15bells blogs gives you insights about commercial real estate in india. Follow us and get the best news from industry'
		]);
		Yii::$app->view->registerMetaTag([
		'name' => 'author',			
		'content' => '15Bells'
		]);
        Yii::$app->view->registerMetaTag([
            'name' => 'robots',			
            'content' => 'index, follow'
            ]);



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
                'defaultPageSize' => 6,
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
