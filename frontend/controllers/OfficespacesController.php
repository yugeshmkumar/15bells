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
         $model->scenario="officespace";

         $title =  \Yii::$app->view->title = 'Office space for Lease | Delhi/NCR | Office on Rent in Gurgaon';

         Yii::$app->view->registerMetaTag([
             'name' => 'viewport',			
             'content' => 'width=device-width,  minimum-scale=1'
             ]);
             \Yii::$app->view->registerMetaTag([
             'name' => 'description',			
             'content' => 'Search Office space for rent / lease in Delhi / NCR within your budget on 15bells.com. Get Best Commercial Properties in Gurgaon, Delhi/NCR by Real Property owners, Dealers, Builders on Lease'
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
             'content' => 'Search Office space for rent / lease in Delhi / NCR within your budget on 15bells.com. Get Best Commercial Properties in Gurgaon, Delhi/NCR by Real Property owners, Dealers, Builders on Lease'
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
             'content' => Yii::getAlias('@frontendUrl').'/office-spaces',
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
        $this->layout = "homeLayout";

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {

            date_default_timezone_set("Asia/Calcutta");
            $date = date('Y-m-d H:i:s'); 



            //  echo '<pre>';print_r(Yii::$app->request->post());die;
            $post = Yii::$app->request->post()['CoworkingQuery'];
            
            $name = $post['name'];
            $phone = $post['phone'];
            $email = $post['email'];
            $area = $post['area'];
            $message = $post['message'];
        $description = "'prop_type = office-spaces, Name = $name,  Phone = $phone,  Email = $email,  area = $area,  Message = $message'";
          $model->prop_type = 'office-spaces';
           $model->area = $area;
            $model->created_date = $date;
            
            if($model->save()){

                
                $payments = \Yii::$app->db->createCommand("Insert into notifications (item_name,item_id,link,description,date) values ('office-spaces','1333','',$description,'$date')")->execute();
           
                if($payments){

                    
                    
                    //Yii::$app->session->setFlash('success', "Query  has been Successfully Saved");
                    return $this->redirect(['lesseeaction/viewpropertys','type'=>'office-space']);

                }

            }else{
                Yii::$app->session->setFlash('error', "Some database error occured");

            }

        }



        return $this->render('index',[
        
               'model' => $model,
        ]);

    }

    public function actionDelhi()

    {
        $model =  new CoworkingQuery();
        $model->scenario="officespace";
        $this->layout = "homeLayout";

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {

            date_default_timezone_set("Asia/Calcutta");
            $date = date('Y-m-d H:i:s'); 



            //  echo '<pre>';print_r(Yii::$app->request->post());die;
            $post = Yii::$app->request->post()['CoworkingQuery'];
            
            $name = $post['name'];
            $phone = $post['phone'];
            $email = $post['email'];
            $area = $post['area'];
            $message = $post['message'];
        $description = "'prop_type = office-spaces-delhi, Name = $name,  Phone = $phone,  Email = $email,  area = $area,  Message = $message'";
          $model->prop_type = 'office-spaces-delhi';
           $model->area = $area;
            $model->created_date = $date;
            
            if($model->save()){

                
                $payments = \Yii::$app->db->createCommand("Insert into notifications (item_name,item_id,link,description,date) values ('office-spaces-delhi','1333','',$description,'$date')")->execute();
           
                if($payments){

                    return $this->redirect(['lesseeaction/viewpropertys','location'=>'Delhi']);
                    //Yii::$app->session->setFlash('success', "Query  has been Successfully Saved");


                }

            }else{
                Yii::$app->session->setFlash('error', "Some database error occured");

            }

        }

        
       
     $title =  \Yii::$app->view->title = 'Office space for Lease | Delhi/NCR | Office Rent in Gurgaon';

     Yii::$app->view->registerMetaTag([
        'name' => 'viewport',			
        'content' => 'width=device-width,  minimum-scale=1'
        ]);
        \Yii::$app->view->registerMetaTag([
        'name' => 'description',			
        'content' => 'Search Office space for rent / lease in New Delhi within your budget on 15bells.com. Get Best Commercial Properties in New Delhi by Real Property owners, Dealers, Builders on Lease'
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
        'content' => 'Office Space Search'
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
        'content' => '=" Search Office space for rent / lease in New Delhi within your budget on 15bells.com. Get Best Commercial Properties in New Delhi by Real Property owners, Dealers, Builders on Lease '
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
        'content' => Yii::getAlias('@frontendUrl').'/office-spaces-delhi',
        ]);

        Yii::$app->view->registerMetaTag([
        'property' => 'og:image',			
        'content' => 'https://www.15bells.com/newimg/img/banner.jpg'
        ]);

        Yii::$app->view->registerMetaTag([
            'property' => 'og:site_name',			
            'content' => '15bells'
            ]); 

            return $this->render('delhi',[
        
                'model' => $model,
         ]);

    }












    public function actionNoida()

    {
        $model =  new CoworkingQuery();
        $model->scenario="officespace";
        $this->layout = "homeLayout";


        if ($model->load(Yii::$app->request->post()) && $model->validate()) {

            date_default_timezone_set("Asia/Calcutta");
            $date = date('Y-m-d H:i:s'); 



            //  echo '<pre>';print_r(Yii::$app->request->post());die;
            $post = Yii::$app->request->post()['CoworkingQuery'];
            
            $name = $post['name'];
            $phone = $post['phone'];
            $email = $post['email'];
            $area = $post['area'];
            $message = $post['message'];
        $description = "'prop_type = office-spaces-noida, Name = $name,  Phone = $phone,  Email = $email,  area = $area,  Message = $message'";
          $model->prop_type = 'office-spaces-noida';
           $model->area = $area;
            $model->created_date = $date;
            
            if($model->save()){

                
                $payments = \Yii::$app->db->createCommand("Insert into notifications (item_name,item_id,link,description,date) values ('office-spaces-noida','1333','',$description,'$date')")->execute();
           
                if($payments){

                    
                    return $this->redirect(['lesseeaction/viewpropertys','location'=>'Noida']);

                   // Yii::$app->session->setFlash('success', "Query  has been Successfully Saved");


                }

            }else{
                Yii::$app->session->setFlash('error', "Some database error occured");

            }

        }
 
         

      $title =  \Yii::$app->view->title = 'Office space for Lease | Delhi/NCR | Office Rent in Noida';

      Yii::$app->view->registerMetaTag([
         'name' => 'viewport',			
         'content' => 'width=device-width,  minimum-scale=1'
         ]);
         \Yii::$app->view->registerMetaTag([
         'name' => 'description',			
         'content' => 'Search Office space for rent / lease in Noida within your budget on 15bells.com. Get Best Commercial Properties in Noida by Real Property owners, Dealers, Builders on Lease'
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
         'content' => 'Office Space Search'
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
         'content' => '="Search Office space for rent / lease in Noida within your budget on 15bells.com. Get Best Commercial Properties in Noida by Real Property owners, Dealers, Builders on Lease'
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
         'content' => Yii::getAlias('@frontendUrl').'/office-spaces-noida',
         ]);
 
         Yii::$app->view->registerMetaTag([
         'property' => 'og:image',			
         'content' => 'https://www.15bells.com/newimg/img/banner.jpg'
         ]);
 
         Yii::$app->view->registerMetaTag([
             'property' => 'og:site_name',			
             'content' => '15bells'
             ]); 


             return $this->render('noida',[
         
                'model' => $model,
         ]);
     }







    public function actionGurugram()

    {
        $model =  new CoworkingQuery();
        $model->scenario="officespace";
        $this->layout = "homeLayout";


        if ($model->load(Yii::$app->request->post()) && $model->validate()) {

            date_default_timezone_set("Asia/Calcutta");
            $date = date('Y-m-d H:i:s'); 



            //  echo '<pre>';print_r(Yii::$app->request->post());die;
            $post = Yii::$app->request->post()['CoworkingQuery'];
            
            $name = $post['name'];
            $phone = $post['phone'];
            $email = $post['email'];
            $area = $post['area'];
            $message = $post['message'];
        $description = "'prop_type = office-spaces-gurugram, Name = $name,  Phone = $phone,  Email = $email,  area = $area,  Message = $message'";
          $model->prop_type = 'office-spaces-gurugram';
           $model->area = $area;
            $model->created_date = $date;
            
            if($model->save()){

                
                $payments = \Yii::$app->db->createCommand("Insert into notifications (item_name,item_id,link,description,date) values ('office-spaces-gurugram','1333','',$description,'$date')")->execute();
           
                if($payments){

                    
                    return $this->redirect(['lesseeaction/viewpropertys','location'=>'Gurugram']);

                   // Yii::$app->session->setFlash('success', "Query  has been Successfully Saved");


                }

            }else{
                Yii::$app->session->setFlash('error', "Some database error occured");

            }

        }
 
         


            
      $title =  \Yii::$app->view->title = 'Office space for Lease | Office Space on Rent in Gurgaon';

      Yii::$app->view->registerMetaTag([
         'name' => 'viewport',			
         'content' => 'width=device-width,  minimum-scale=1'
         ]);
         \Yii::$app->view->registerMetaTag([
         'name' => 'description',			
         'content' => 'Search Office space for rent / lease in within your budget on 15bells.com. Get Best Commercial Properties in Gurgaon, by Real Property owners, Dealers, Builders on Lease'
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
         'content' => 'Office Space Search'
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
         'content' => '="Search Office space for rent / lease in within your budget on 15bells.com. Get Best Commercial Properties in Gurgaon, by Real Property owners, Dealers, Builders on Lease'
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
         'content' => Yii::getAlias('@frontendUrl').'/office-spaces-gurugram',
         ]);
 
         Yii::$app->view->registerMetaTag([
         'property' => 'og:image',			
         'content' => 'https://www.15bells.com/newimg/img/banner.jpg'
         ]);
 
         Yii::$app->view->registerMetaTag([
             'property' => 'og:site_name',			
             'content' => '15bells'
             ]); 


             return $this->render('gurugram',[
         
                'model' => $model,
         ]);

     }



     
    public function actionCreate()

    {
            $model = new CoworkingQuery();

       

    }

    

}
