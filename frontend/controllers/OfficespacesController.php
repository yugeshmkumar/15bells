<?php
namespace frontend\controllers;

use yii\web\Controller;
use common\models\CoworkingQuery;
use Yii;
use yii\db\Query;





class OfficespacesController extends \yii\web\Controller
{
    public function actionIndex()

    {

         //    meta tags description starts here  

         $model =  new CoworkingQuery();

         $title =  \Yii::$app->view->title = 'Coworking Space on Lease | Best Coworking in Gurgaon | Deals on Offices.';

         Yii::$app->view->registerMetaTag([
             'name' => 'viewport',			
             'content' => 'width=device-width,  minimum-scale=1,  maximum-scale=1'
             ]);
             \Yii::$app->view->registerMetaTag([
             'name' => 'description',			
             'content' => 'Search Commercial Coworking property in Gurgaon and Delhi/NCR. Get Best Coworking Properties in Gurgaon, Delhi/NCR at best prcie, features and services on Lease'
             ]);
             Yii::$app->view->registerMetaTag([
             'name' => 'keywords',			
             'content' => '15Bells'
             ]);
             Yii::$app->view->registerMetaTag([
                 'name' => 'Owner',			
                 'content' => '15bells.com'
                 ]);
             Yii::$app->view->registerMetaTag([
             'name' => 'Copyright',			
             'content' => '15bells.com'
             ]);
             Yii::$app->view->registerMetaTag([
             'name' => 'classification',			
             'content' => 'Coworking property Search'
             ]);
             Yii::$app->view->registerMetaTag([
             'name' => 'distribution',			
             'content' => 'India'
             ]);
             Yii::$app->view->registerMetaTag([
             'name' => 'rating',			
             'content' => 'General'
             ]);
             Yii::$app->view->registerMetaTag([
             'name' => 'subject',			
             'content' => 'Search Commercial Coworking property in Gurgaon and Delhi/NCR. Get Best Coworking Properties in Gurgaon, Delhi/NCR at best prcie, features and services on Lease.'
             ]);
             Yii::$app->view->registerMetaTag([
             'name' => 'audience',			
             'content' => 'All'
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
             'content' => Yii::getAlias('@frontendUrl').'/coworking',
             ]);
  
             Yii::$app->view->registerMetaTag([
             'property' => 'og:image',			
             'content' => 'https://www.15bells.com/newimg/img/banner.jpg'
             ]);
  
             Yii::$app->view->registerMetaTag([
                 'property' => 'og:site_name',			
                 'content' => '15bells'
                 ]);  

        // Yii::$app->view->registerMetaTag([
        //     'name' => 'robots',			
        //     'content' => 'index, follow'
        //     ]);

            if ($model->load(Yii::$app->request->post()) && $model->validate()) {

                date_default_timezone_set("Asia/Calcutta");
                $date = date('Y-m-d H:i:s'); 


    
                // echo '<pre>';print_r(Yii::$app->request->post());die;
                $post = Yii::$app->request->post()['CoworkingQuery'];
                
                $name = $post['name'];
                $phone = $post['phone'];
                $email = $post['email'];
                $seats = $post['seats'];
                $message = $post['message'];
            $description = "'Name = $name,  Phone = $phone,  Email = $email,  Seats = $seats,  Message = $message'";

                $model->created_date = $date;
                
                if($model->save()){

                    
                    $payments = \Yii::$app->db->createCommand("Insert into notifications (item_name,item_id,link,description,date) values ('coworking','1061','',$description,'$date')")->execute();
               
                    if($payments){

                        

                        Yii::$app->session->setFlash('success', "Query  has been Successfully Saved");


                    }

                }else{
                    Yii::$app->session->setFlash('error', "Some database error occured");

                }
    
            }



        $this->layout = "homeLayout";
        return $this->render('index',[
        
               'model' => $model,
        ]);

    }

    public function actionDelhi()

    {
        $model =  new CoworkingQuery();

        $this->layout = "homeLayout";
        return $this->render('delhi',[
        
            'model' => $model,
     ]);
    }
    public function actionNoida()

    {
         $model =  new CoworkingQuery();
 
         $this->layout = "homeLayout";
         return $this->render('noida',[
         
             'model' => $model,
      ]);
     }
    public function actionGurugram()

    {
         $model =  new CoworkingQuery();
 
         $this->layout = "homeLayout";
         return $this->render('gurugram',[
         
             'model' => $model,
      ]);
     }
    public function actionCreate()

    {
            $model = new CoworkingQuery();

       

    }

    

}
