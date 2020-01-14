<?php

namespace frontend\controllers;

use yii\web\Controller;
use common\models\Property;
use yii\db\Query;
use Yii;
use yii\helpers\HtmlPurifier;
use common\models\SaveSearch;

class LesseeController extends Controller {

    public function __construct($id, $module, $config = array()) {
        parent::__construct($id, $module, $config);
        $this->layout = "roleLayout";
    }

    public function actionIndex() {

        //    meta tags description starts here  

		$title =  \Yii::$app->view->title = '15Bells - Commercial Property on Lease | Search Property on Rent';

		Yii::$app->view->registerMetaTag([
		'name' => 'viewport',			
		'content' => 'width=device-width,  minimum-scale=1,  maximum-scale=1'
		]);
		\Yii::$app->view->registerMetaTag([
		'name' => 'description',			
		'content' => '15Bells - Commercial Property on Lease | Search Property on Rent'
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
        $model = new SaveSearch();

		 
        return $this->render('index',[
            'model' => $model,
        ]);

       
    }

    public function actionLessee() {
        return $this->render('lessee');
    }

    public function actionListProperty() {
        return $this->render('list_property');
    }

    public function actionSearchproperty() {
        return $this->render('searchproperty');
    }




    public function actionGetnumber() {    
        
        date_default_timezone_set("Asia/Calcutta");
        $date = date('Y-m-d H:i:s');      
        $searchval = HtmlPurifier::process($_POST['searchval']);
        $town = HtmlPurifier::process($_POST['town']);
        $sector = HtmlPurifier::process($_POST['sector']);
       
        $trendingadd = \Yii::$app->db->createCommand()->insert('save_search', ['search_for' => 'text','role_type'=>'lessee','location_name' => $searchval,
                    'created_date' => $date])->execute();
    
       
        if($sector != ''){

          $sqlstr1 = "select count(*) as count from addproperty where town_name like '$town' and sector_name like '$sector' and property_for = 'rent' and is_active = '1'";
        $payments1 = \Yii::$app->db->createCommand($sqlstr1)->queryAll();
        echo  $payments1[0]['count'];

          }else{

 $sqlstr2 = "select count(*) as count from addproperty where town_name like '$town'  and property_for = 'rent' and is_active = '1'";
        $payments2 = \Yii::$app->db->createCommand($sqlstr2)->queryAll();
        echo  $payments2[0]['count'];

           }
     
        
    }


   public function actionGetnumber1() {

    
        
        date_default_timezone_set("Asia/Calcutta");
        $date = date('Y-m-d H:i:s');
        $searchval = HtmlPurifier::process($_POST['searchval']);
        $town = HtmlPurifier::process($_POST['town']);
        $sector = HtmlPurifier::process($_POST['sector']);
    
       
        $trendingadd = \Yii::$app->db->createCommand()->insert('save_search', ['search_for' => 'text','role_type'=>'lessee','location_name' => $searchval,
                    'created_date' => $date])->execute();

        if($sector != ''){

          $sqlstr1 = "select count(*) as count from addproperty where town_name like '$town' and sector_name like '$sector' and property_for = 'sale' and is_active = '1'";
        $payments1 = \Yii::$app->db->createCommand($sqlstr1)->queryAll();
        echo  $payments1[0]['count'];

          }else{

 $sqlstr2 = "select count(*) as count from addproperty where town_name like '$town'  and property_for = 'sale' and is_active = '1'";
        $payments2 = \Yii::$app->db->createCommand($sqlstr2)->queryAll();
        echo  $payments2[0]['count'];

           }


    }


    public function actionSaveproperty() {

    
        
        date_default_timezone_set("Asia/Calcutta");
        $date = date('Y-m-d H:i:s');
        $searchval = HtmlPurifier::process($_POST['searchval']);
        $searchval1 = HtmlPurifier::process($_POST['searchval1']);
        $user = HtmlPurifier::process($_POST['user']);
    
       
        $trendingadd = \Yii::$app->db->createCommand()->insert('frontend_saveproperty', ['city' => $searchval,'locality'=>$searchval1,'user_type'=>$user,'created_date' => $date])->execute();
            
   

         echo 1;

         }

    
    public function actionMapproperty($newlocation) {


       $objlocation = \common\models\Property::getlatlang($newlocation);

        $latitude = $objlocation->lat;
        $longitude = $objlocation->lng;

        $range = 10;

        date_default_timezone_set("Asia/Calcutta");
        $date = date('Y-m-d H:i:s');

        $trendingadd = \Yii::$app->db->createCommand()->insert('save_search', ['location_name' => $newlocation,
                    'created_date' => $date])->execute();

           
        if ($latitude != "" && $longitude != "") {
            // Find Max - Min Lat / Long for Radius and zero point and query  
            $lat_range = $range / 69.172;
            $lon_range = abs($range / (cos($latitude) * 69.172));
            $min_lat = number_format($latitude - $lat_range, "4", ".", "");
            $max_lat = number_format($latitude + $lat_range, "4", ".", "");
            $min_lon = number_format($longitude - $lon_range, "4", ".", "");
            $max_lon = number_format($longitude + $lon_range, "4", ".", "");
            $sqlstr = "SELECT * FROM addproperty  where
           latitude BETWEEN '" . $min_lat . "' AND '" . $max_lat . "' AND  
           longitude BETWEEN '" . $min_lon . "' AND '" . $max_lon . "' ";


            $payments = \Yii::$app->db->createCommand($sqlstr)->queryAll();

            echo json_encode($payments);
        }
    }
    
}

