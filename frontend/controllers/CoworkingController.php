<?php
namespace frontend\controllers;

use yii\web\Controller;
use common\models\CoworkingQuery;
use Yii;
use yii\db\Query;





class CoworkingController extends \yii\web\Controller
{
    public function actionIndex()

    {

         //    meta tags description starts here  

         $model =  new CoworkingQuery();

		$title =  \Yii::$app->view->title = '15Bells - Revolution in Real Estate Technology ';

		Yii::$app->view->registerMetaTag([
		'name' => 'viewport',			
		'content' => 'width=device-width,  minimum-scale=1,  maximum-scale=1'
		]);
		\Yii::$app->view->registerMetaTag([
		'name' => 'description',			
		'content' => 'For the first time 15 Bells, a Commercial Real Estate company trades in real time. We proudly represent our self as the one-stop solution for all the commercial property needs – BUY, SELL or LEASE a commercial property in Delhi NCR Just within 15 Hours!!'
		]);
		Yii::$app->view->registerMetaTag([
		'name' => 'author',			
		'content' => '15Bells'
		]);
        Yii::$app->view->registerMetaTag([
            'name' => 'robots',			
            'content' => 'index, follow'
            ]);

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

                    
                    $payments = \Yii::$app->db->createCommand("Insert into notifications (item_name,item_id,link,description,date) values ('coworking','1014','',$description,'$date')")->execute();
               
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




    public function actionCreate()

    {
            $model = new CoworkingQuery();

       

    }

    

}
