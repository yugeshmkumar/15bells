<?php

namespace frontend\controllers;

use yii\web\Controller;
use Yii;
use yii\helpers\HtmlPurifier;
use common\models\Addproperty;
use common\models\AddpropertySearch;

class LessorController extends Controller {

    public function __construct($id, $module, $config = array()) {
        parent::__construct($id, $module, $config);
        $this->layout = "roleLayout";
	}
	

    public function actionIndex() {

        //    meta tags description starts here  

		$title =  \Yii::$app->view->title = '15Bells - Lease Your Commercial Property  | List property for Lease';

		
		\Yii::$app->view->registerMetaTag([
		'name' => 'description',			
		'content' => 'Lease your commercial property space with ease. 15bells will find you verfied lessors at best price.'
		]);
		Yii::$app->view->registerMetaTag([
		'name' => 'author',			
		'content' => '15Bells'
		]);
        Yii::$app->view->registerMetaTag([
            'name' => 'robots',			
            'content' => 'index, follow'
            ]);
		//  og tags 

		Yii::$app->view->registerMetaTag([
		'property' => 'og:title',			
		'content' => $title
		]);
		Yii::$app->view->registerMetaTag([
		'property' => 'og:type',			
		'content' => 'website'
		]);
		Yii::$app->view->registerMetaTag([
		'property' => 'og:url',			
		'content' => 'https://www.15bells.com'
		]);
		Yii::$app->view->registerMetaTag([
		'property' => 'og:image',			
		'content' => 'https://staging.15bells.com/newimg/logo.png'
		]);
		Yii::$app->view->registerMetaTag([
		'property' => 'og:description',			
		'content' => 'Strive to create a transparent and safe place for swift real estate transactions with disruptive technology.'
		]);
	
		//    meta tags description ends here  

        $model = new Addproperty(['scenario' => 'create']);
         
         $userid = Yii::$app->user->identity->id;
         date_default_timezone_set("Asia/Calcutta");
         $date = date('Y-m-d H:i:s');
        
        
        if ($model->load(Yii::$app->request->post()) && $model->validate() ) {
            
           
           // echo '<pre>';print_r(Yii::$app->request->post());die;
           
            $yiipost = Yii::$app->request->post();
            $available_date = $yiipost['Addproperty']['available_date'];
            $total_plot_area = $yiipost['Addproperty']['total_plot_area'];
            $buildup_area = $yiipost['Addproperty']['buildup_area'];

            if($total_plot_area == ''){

               $model->total_plot_area = $buildup_area;

             }

            $lattitude = $yiipost['lat1'];
            $longitude = $yiipost['long1'];
            $town = $yiipost['town'];
            $sector = $yiipost['sector'];
            
            $model->property_for = 'rent';
            $model->user_id = $userid;
            $model->role_id = 'lessor';
            $model->latitude = $lattitude;
            $model->longitude = $longitude;
             $model->town_name = $town;
             if($sector != ''){
              $model->sector_name = $sector;
               }

  
             if($available_date == ''){
               $model->available_date = '1970-01-01 08:00:00';  
            }else{
               $model->available_date = $available_date;  
            }
            $model->created_date = $date;
            
            if($buildup_area !=''){
            
            
            if($model->save()){
               return $this->redirect(['lessor-expectations/create', 'id' => $model->id]);
            }else{
               
                print_r($model->getErrors());die;
            }
          
        }else{
            if($model->save()){
                return $this->redirect(['lessor-expectations/create', 'id' => $model->id]);
             }else{
                
                 print_r($model->getErrors());die;
             }
        }
            
        } else {
            return $this->render('index', [
                'model' => $model,
            ]);
        }
	}
	
    public function actionLessor() {
        return $this->render('lessor');
    }
    public function actionListProperty() {
        return $this->render('list_property');
    }

    public function actionGetnumber(){

        $lesproptype =   HtmlPurifier::process($_POST['getproptype']);
         $lesname =   HtmlPurifier::process($_POST['name']);
         $lesgetcity =   HtmlPurifier::process($_POST['getcity']);
         $leslocation =   HtmlPurifier::process($_POST['getlocation']);
     
        if(!isset($_SESSION)) 
   { 
       session_start(); 
   } 
           $session = Yii::$app->session;
           $session->set('lesproptype', $lesproptype);
            $session->set('lesname', $lesname);
            $session->set('lesgetcity', $lesgetcity);
            $session->set('leslocation', $leslocation);

         if (isset(\Yii::$app->user->identity->id)) {

           echo '1';die;
       }else{
           
           echo '2';die;
       }
    }

}
