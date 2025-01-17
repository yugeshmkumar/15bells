<?php
namespace frontend\controllers;

use yii\web\Controller;
use common\models\CoworkingQuery;
use Yii;
use yii\db\Query;





class CommercialofficespacesController extends \yii\web\Controller
{
    public function actionIndex()

    {

         //    meta tags description starts here  

         $model =  new CoworkingQuery();
         $model->scenario="officespace";

         $title =  \Yii::$app->view->title = 'Retail space for Lease | Commercial Space on Rent/Lease in Delhi/NCR';

         Yii::$app->view->registerMetaTag([
             'name' => 'viewport',			
             'content' => 'width=device-width,  minimum-scale=1'
             ]);
             \Yii::$app->view->registerMetaTag([
             'name' => 'description',			
             'content' => 'Search Retail space for rent/lease in within your budget on 15bells.com. Get Best Commercial Properties in Delhi/NCR, by Real Property owners, Dealers, Builders on Lease'
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
             'content' => 'Retail Space Search'
             ]);
             Yii::$app->view->registerMetaTag([
             'name' => 'distribution',			
             'content' => 'Delhi/NCR'
             ]);
             Yii::$app->view->registerMetaTag([
             'name' => 'rating',			
             'content' => 'General'
             ]);
             Yii::$app->view->registerMetaTag([
             'name' => 'subject',			
             'content' => 'Search Retail space for rent/lease in within your budget on 15bells.com. Get Best Commercial Properties in Delhi/NCR, by Real Property owners, Dealers, Builders on Lease'
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
             'content' => Yii::getAlias('@frontendUrl').'/commercial-retail-spaces',
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



        $this->layout = "homeLayout";
        return $this->render('index',[
        
               'model' => $model,
        ]);

    }

    public function actionDelhi()

    {
        $model =  new CoworkingQuery();
        $model->scenario="officespace";


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

        $this->layout = "homeLayout";
       
     $title =  \Yii::$app->view->title = 'Retail Space/Shop for Lease | Commercial Space on Rent/Lease in Delhi';

     Yii::$app->view->registerMetaTag([
        'name' => 'viewport',			
        'content' => 'width=device-width,  minimum-scale=1'
        ]);
        \Yii::$app->view->registerMetaTag([
        'name' => 'description',			
        'content' => 'Search Retail space/shop  for rent/lease in within your budget on 15bells.com. Get Best Commercial Properties, shop, offices in Delhi, by Real Property owners, Dealers, Builders on Lease'
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
        'content' => 'Retail Space Search'
        ]);
        Yii::$app->view->registerMetaTag([
        'name' => 'distribution',			
        'content' => 'Delhi'
        ]);
        Yii::$app->view->registerMetaTag([
        'name' => 'rating',			
        'content' => 'General'
        ]);
        Yii::$app->view->registerMetaTag([
        'name' => 'subject',			
        'content' => '="Search Retail space/shop  for rent/lease in within your budget on 15bells.com. Get Best Commercial Properties, shop, offices in Delhi, by Real Property owners, Dealers, Builders on Lease'
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
        'content' => Yii::getAlias('@frontendUrl').'/commercial-retail-spaces-delhi',
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
 
         $this->layout = "homeLayout";
         

      $title =  \Yii::$app->view->title = 'Retail Space/Shop for Lease | Commercial Space on Rent/Lease in Noida';

      Yii::$app->view->registerMetaTag([
         'name' => 'viewport',			
         'content' => 'width=device-width,  minimum-scale=1'
         ]);
         \Yii::$app->view->registerMetaTag([
         'name' => 'description',			
         'content' => 'Search Retail space/shop  for rent/lease in within your budget on 15bells.com. Get Best Commercial Properties, shop, offices in Noida, by Real Property owners, Dealers, Builders on Lease'
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
         'content' => 'Retail Space Search'
         ]);
         Yii::$app->view->registerMetaTag([
         'name' => 'distribution',			
         'content' => 'Noida'
         ]);
         Yii::$app->view->registerMetaTag([
         'name' => 'rating',			
         'content' => 'General'
         ]);
         Yii::$app->view->registerMetaTag([
         'name' => 'subject',			
         'content' => '="Search Retail space/shop  for rent/lease in within your budget on 15bells.com. Get Best Commercial Properties, shop, offices in Noida, by Real Property owners, Dealers, Builders on Lease'
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
         'content' => Yii::getAlias('@frontendUrl').'/commercial-retail-spaces-noida',
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
 
         $this->layout = "homeLayout";
         


            
      $title =  \Yii::$app->view->title = 'Retail Space/Shop for Lease | Commercial Space on Rent/Lease in Gurugram';

      Yii::$app->view->registerMetaTag([
         'name' => 'viewport',			
         'content' => 'width=device-width,  minimum-scale=1'
         ]);
         \Yii::$app->view->registerMetaTag([
         'name' => 'description',			
         'content' => 'Search Retail space/shop  for rent/lease in within your budget on 15bells.com. Get Best Commercial Properties, shop, offices in Gurugram, by Real Property owners, Dealers, Builders on Lease'
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
         'content' => 'Retail Space Search'
         ]);
         Yii::$app->view->registerMetaTag([
         'name' => 'distribution',			
         'content' => 'Gurugram'
         ]);
         Yii::$app->view->registerMetaTag([
         'name' => 'rating',			
         'content' => 'General'
         ]);
         Yii::$app->view->registerMetaTag([
         'name' => 'subject',			
         'content' => '="Search Retail space/shop  for rent/lease in within your budget on 15bells.com. Get Best Commercial Properties, shop, offices in Gurugram, by Real Property owners, Dealers, Builders on Lease'
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
         'content' => Yii::getAlias('@frontendUrl').'/commercial-retail-spaces-gurugram',
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
