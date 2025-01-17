<?php

namespace frontend\controllers;


use yii\web\Controller;
use Yii;
use common\models\Property;
use common\models\MyExpectationsajax;
use common\models\User;
use frontend\models\UserForm;
use frontend\models\search\UserSearch;
use common\models\Addpropertypm;
use common\models\Company;
use common\models\Companynew;
use common\models\CompanyEmp;
use yii\web\Response;
use yii\db\Query;
use yii\filters\AccessControl;
use yii\helpers\HtmlPurifier;


//$this->registerAssetBundle(yii\web\JqueryAsset::className(), View::POS_BEGIN);
class BuyeractionController extends Controller {

    public function __construct($id, $module, $config = array()) {
        parent::__construct($id, $module, $config);
        $this->layout = "roleLayout";
    }

    public function behaviors() {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['login', 'error','index','searches','shortlistpropertiesready','sendownernotification','shortlist','Shortlistproperties','viewpropertys', 'shortlistproperties','search','searchaction','mapproperty2update','getpolymyupdate', 'saveprop', 'viewproperty', 'petproperty', 'directitnow', 'getfreevisit', 'bititnow', 'savemessages', 'similiarprop', 'getpolymy', 'mapproperty1','mapproperty1update', 'mapproperty2'],
                        'allow' => true,
                    ],
                    [
                        //'actions' => ['index', 'shortlistproperties','search','searchaction','mapproperty2update','getpolymyupdate', 'saveprop', 'viewproperty', 'petproperty', 'directitnow', 'getfreevisit', 'bititnow', 'savemessages', 'similiarprop', 'getpolymy', 'mapproperty1','mapproperty1update', 'mapproperty2'],
                        'allow' => true,
                       // 'roles' => ['@'],
                    ],
                ],
            ],
        ];
    }

    public function actionIndex() {
        return $this->render('index');
    }

    public function actionShortlist() {

        $this->layout = "dashboard";
        return $this->render('shortlist');
    }

    public function actionMyescrow() {
        return $this->render('myescrow');
    }

    public function actionMykyc() {
        return $this->render('mykyc');
    }

    public function actionBidpdetails() {
        return $this->render('bidpdetails');
    }

    public function actionSchedulevisit() {
        return $this->render('schedulevisit');
    }

    public function actionSaveprop() {

        $userid = Yii::$app->user->identity->id;
        date_default_timezone_set("Asia/Calcutta");
        $date = date('Y-m-d H:i:s');
        $hardam = $_POST['hardam'];
        $expectation_id = $_POST['expectation_id'];

        $propuserids = Addpropertypm::find('user_id')->where(['id' => $hardam])->andwhere(['status' => 'approved'])->one();
        $propuserid  =  $propuserids->user_id;

        $payments = \Yii::$app->db->createCommand("SELECT * FROM shortlistproperty where user_id='$userid' and property_id ='$hardam'")->queryAll();


        if ($payments) {

            $insert1 = \Yii::$app->db->createCommand()->delete('shortlistproperty', ['user_id' => $userid, 'property_id' => $hardam])->execute();

            return  '1';
        } else {

            $insert1 = \Yii::$app->db->createCommand()->insert('shortlistproperty', ['user_id' => $userid, 'property_id' => $hardam, 'created_date' => $date])->execute();
            $request_id = Yii::$app->db->lastInsertID;
            
            $objlocation = \common\models\RequestSiteVisitbin::getsalesidshortlist($request_id,$userid,7,$propuserid,5);

            return '2';
        }


    }

    public function actionSaveprop1($hardam, $userid) {

        $newhar = explode(',', $hardam);
        date_default_timezone_set("Asia/Calcutta");
        $date = date('Y-m-d H:i:s');

        $payments = \Yii::$app->db->createCommand("SELECT * FROM shortlistproperty where user_id='$userid' and property_id ='$hardam'")->queryAll();


        if ($payments) {
            echo '1';
        } else {

            $insert1 = \Yii::$app->db->createCommand()->insert('shortlistproperty', ['user_id' => $userid, 'property_id' => $hardam, 'created_date' => $date])->execute();
            echo '2';
        }
    }

    public function actionSaveprop2($hardam, $userid) {

        $newhar = explode(',', $hardam);
        date_default_timezone_set("Asia/Calcutta");
        $date = date('Y-m-d H:i:s');
        $payments = \Yii::$app->db->createCommand("SELECT * FROM shortlistproperty where user_id='$userid' and property_id ='$hardam'")->queryAll();


        if ($payments) {
            echo '1';
        } else {

            $insert1 = \Yii::$app->db->createCommand()->insert('shortlistproperty', ['user_id' => $userid, 'property_id' => $hardam, 'created_date' => $date])->execute();
            echo '2';
        }
    }

    public function actionSaveprop3($hardam, $userid) {

        $newhar = explode(',', $hardam);
        date_default_timezone_set("Asia/Calcutta");
        $date = date('Y-m-d H:i:s');

        $payments = \Yii::$app->db->createCommand("SELECT * FROM shortlistproperty where user_id='$userid' and property_id ='$hardam'")->queryAll();


        if ($payments) {
            echo '1';
        } else {

            $insert1 = \Yii::$app->db->createCommand()->insert('shortlistproperty', ['user_id' => $userid, 'property_id' => $hardam, 'created_date' => $date])->execute();
            echo '2';
        }
    }

    public function actionSaveprop4($hardam, $userid) {

        $newhar = explode(',', $hardam);


        date_default_timezone_set("Asia/Calcutta");
        $date = date('Y-m-d H:i:s');
        $payments = \Yii::$app->db->createCommand("SELECT * FROM shortlistproperty where user_id='$userid' and property_id ='$hardam'")->queryAll();


        if ($payments) {
            echo '1';
        } else {

            $insert1 = \Yii::$app->db->createCommand()->insert('shortlistproperty', ['user_id' => $userid, 'property_id' => $hardam, 'created_date' => $date])->execute();
            echo '2';
        }
    }

    public function actionSaveprop5($hardam, $userid) {

        $newhar = explode(',', $hardam);
        date_default_timezone_set("Asia/Calcutta");
        $date = date('Y-m-d H:i:s');

        $payments = \Yii::$app->db->createCommand("SELECT * FROM shortlistproperty where user_id='$userid' and property_id ='$hardam'")->queryAll();


        if ($payments) {
            echo '1';
        } else {

            $insert1 = \Yii::$app->db->createCommand()->insert('shortlistproperty', ['user_id' => $userid, 'property_id' => $hardam, 'created_date' => $date])->execute();
            echo '2';
        }
    }


    public function actionSendownernotification(){


        date_default_timezone_set("Asia/Calcutta");
        $date = date('Y-m-d H:i:s');
        $hardam = $_POST['hardam'];
        $description =  'Your Property lies under one new saved search';

        $propuserids = Addpropertypm::find('user_id')->where(['id' => $hardam])->andwhere(['status' => 'approved'])->one();
        $propuserid  =  $propuserids->user_id;
        $insert1 = \Yii::$app->db->createCommand()->insert('notifications', ['item_name' => 'Property under Search', 'item_id' => $propuserid, 'link' => '#','description'=>$description,'date'=>$date])->execute();

    }


    public function actionGetsitevisitlocation(){

        $id = $_POST['hardam'];        
      
       $payments = \Yii::$app->db->createCommand("SELECT locality,super_area,expected_price from addproperty where id='$id'")->queryOne();

        return json_encode($payments);

}

       public function actionShortlistproperties() {

    //    echo '<pre>';print_r($_POST);die;
     
//   echo  $user_id = Yii::$app->user->identity->id;die;
        if(!isset($_SESSION)) 
        { 
            session_start(); 
        } 

        $locations = $_POST['locations'];
        $shaped = $_POST['shaped'];
        $propid = $_POST['propid'];
        $town = $_POST['town'];
        $sector = $_POST['sector'];
        $country = $_POST['country'];
        $areamin = $_POST['areamin'];
        $areamax = $_POST['areamax'];
        $pricemin = $_POST['pricemin'];
        $pricemax = $_POST['pricemax'];
        $proptype = $_POST['proptype'];
        $propbid = $_POST['propbid'];
        

        $session = Yii::$app->session;


            $session->set('townpost', $town);
            $session->set('sectorpost', $sector);
            $session->set('areaminpost', $areamin);
            $session->set('areamaxpost', $areamax);
            $session->set('priceminpost', $pricemin);
            $session->set('pricemaxpost', $pricemax);
            $session->set('proptypepost', $proptype);
            $session->set('propbidpost', $propbid);

        if($shaped == 'polygon'){

            $newspaths = $_POST['newspaths'];
            $session->set('newspathspost', $newspaths);
            $session->set('locationspost', $locations);
            $session->set('shapedpost', $shaped);
            $session->set('propidpost', $propid);
            
        }
        if($shaped == 'circle'){
            
            $centercoordinates = '"'.$_POST['centercoordinates'].'"';
            $totalradius = $_POST['totalradius'];

            $session->set('centercoordinatespost', $centercoordinates);
            $session->set('totalradiuspost', $totalradius);
            $session->set('locationspost', $locations);
            $session->set('shapedpost', $shaped);
            $session->set('propidpost', $propid);
        }
        if($shaped == 'rectangle'){
            
            $northlat = $_POST['northlat'];
            $southlat = $_POST['southlat'];
            $northlng = $_POST['northlng'];
            $southlng = $_POST['southlng'];

            $rectanglecoordinates = '{
                "north": '.$northlat.',
                "south": '.$southlat.',
                "east": '.$northlng.',
                "west": '.$southlng.'
             }';
           
            $newkuma = $rectanglecoordinates;

            $session->set('newkumapost', $newkuma);
            $session->set('locationspost', $locations);
            $session->set('shapedpost', $shaped);
            $session->set('propidpost', $propid);
           
        }

        if($shaped == 'blank'){            
            
            
            $session->set('locationspost', $locations);
            $session->set('shapedpost', $shaped);
            $session->set('propidpost', $propid);
           
        }

        date_default_timezone_set("Asia/Calcutta");
        $date = date('Y-m-d H:i:s');

         

          if (isset(Yii::$app->user->identity->id)){                   
               

                return 'existuser';
              
               

            }else{

               return 'nouser';
            }   



    }




    public function actionShortlistpropertiesready() {

        //   echo '<pre>';print_r($_POST);die;
         
    //   echo  $user_id = Yii::$app->user->identity->id;die;
            if(!isset($_SESSION)) 
            { 
                session_start(); 
            } 
    
            $locations = $_POST['locations'];
             $shaped = $_POST['shaped'];
            $propid = $_POST['propid'];
            $town = $_POST['town'];
            $sector = $_POST['sector'];
            $country = $_POST['country'];
            $areamin = $_POST['areamin'];
            $areamax = $_POST['areamax'];
            $pricemin = $_POST['pricemin'];
            $pricemax = $_POST['pricemax'];
            $proptype = $_POST['proptype'];
            $propbid = $_POST['propbid'];
            
    
            $session = Yii::$app->session;
    
    
                $session->set('townpost', $town);
                $session->set('sectorpost', $sector);
                $session->set('areaminpost', $areamin);
                $session->set('areamaxpost', $areamax);
                $session->set('priceminpost', $pricemin);
                $session->set('pricemaxpost', $pricemax);
                $session->set('proptypepost', $proptype);
                $session->set('propbidpost', $propbid);
    
            if($shaped == 'polygon'){
    
                 $newspaths = $_POST['newspaths'];
                $session->set('newspathspost', $newspaths);
                $session->set('locationspost', $locations);
                $session->set('shapedpost', $shaped);
                $session->set('propidpost', $propid);
                
            }
            if($shaped == 'circle'){
                
                $centercoordinates = '"'.$_POST['centercoordinates'].'"';
                $totalradius = $_POST['totalradius'];
    
                $session->set('centercoordinatespost', $centercoordinates);
                $session->set('totalradiuspost', $totalradius);
                $session->set('locationspost', $locations);
                $session->set('shapedpost', $shaped);
                $session->set('propidpost', $propid);
            }
            if($shaped == 'rectangle'){                
               
            

                $northlat = $_POST['rectanglecoordinates']['north'];
                $southlat = $_POST['rectanglecoordinates']['south'];
                $northlng = $_POST['rectanglecoordinates']['east'];
                $southlng = $_POST['rectanglecoordinates']['west'];
    
                $rectanglecoordinates = '{
                    "north": '.$northlat.',
                    "south": '.$southlat.',
                    "east": '.$northlng.',
                    "west": '.$southlng.'
                 }';
               
                $newkuma = $rectanglecoordinates;
    
                $session->set('newkumapost', $newkuma);
                $session->set('locationspost', $locations);
                $session->set('shapedpost', $shaped);
                $session->set('propidpost', $propid);
               
            }
    
            if($shaped == 'blank'){            
                
                
                $session->set('locationspost', $locations);
                $session->set('shapedpost', $shaped);
                $session->set('propidpost', $propid);
               
            }
    
            date_default_timezone_set("Asia/Calcutta");
            $date = date('Y-m-d H:i:s');
    
             
    
              if (isset(Yii::$app->user->identity->id)){    
                
                   
    
                    return 'existuser';
                  
                   
    
                }else{
    
                   return 'nouser';
                }   
    
    
    
        }



    public function actionViewpropertys() {

       // echo '<pre>';print_r($_POST);die;

       $title =  \Yii::$app->view->title = 'Commercial Properties for Sale in Gurgaon | Buy Commercial Property in Delhi/NCR.';

       
           \Yii::$app->view->registerMetaTag([
           'name' => 'description',			
           'content' => 'Search Properties for Sale in Gurgaon - Buy Best Commercial Properties in Delhi/NCR by Real Property owners, Dealers, Builders'
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
           'content' => 'Real Estate Property Search'
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
           'content' => 'Search Property for Sale, Search New Projects, Builders And Property Dealers in Delhi/NCR.'
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
           'content' => Yii::getAlias('@frontendUrl').'/buyeraction/viewpropertys',
           ]);

           Yii::$app->view->registerMetaTag([
           'property' => 'og:image',			
           'content' => 'https://staging.15bells.com/newimg/logo.png'
           ]);

           Yii::$app->view->registerMetaTag([
               'property' => 'og:site_name',			
               'content' => '15bells'
               ]);  

        if(!isset($_SESSION)) 
        { 
            session_start(); 
        } 

       $locations = HtmlPurifier::process($_POST['locations']);
        $shaped = HtmlPurifier::process($_POST['shaped']);
        $proptype = HtmlPurifier::process($_POST['proptype']);
        $propcity = HtmlPurifier::process($_POST['propcity']);
        $serachlocality = HtmlPurifier::process($_POST['serachlocality']);
        $propnearby = HtmlPurifier::process($_POST['propnearby']);
        $propsquare = HtmlPurifier::process($_POST['propsquare']);
        $propareaminimum = HtmlPurifier::process($_POST['propareaminimum']);
        $propareamaximum = HtmlPurifier::process($_POST['propareamaximum']);
        $proppriceminimum = HtmlPurifier::process($_POST['proppriceminimum']);
        $proppricemaximum = HtmlPurifier::process($_POST['proppricemaximum']);
        $town = HtmlPurifier::process($_POST['town']);
        $sector = HtmlPurifier::process($_POST['sector']);
        $country = HtmlPurifier::process($_POST['country']);
        $searchlat = HtmlPurifier::process($_POST['searchlat']);
        $searchlng = HtmlPurifier::process($_POST['searchlng']); 

        $session = Yii::$app->session;

        if($shaped == 'polygon'){

            $newspaths = HtmlPurifier::process($_POST['newspaths']);
            $session->set('newspaths', $newspaths);
            $session->set('locations', $locations);
            $session->set('shaped', $shaped);
        }
        if($shaped == 'circle'){
            
            $centercoordinates = '"'.HtmlPurifier::process($_POST['centercoordinates']).'"';
            $totalradius = HtmlPurifier::process($_POST['totalradius']);

            $session->set('centercoordinates', $centercoordinates);
            $session->set('totalradius', $totalradius);
            $session->set('locations', $locations);
            $session->set('shaped', $shaped);
        }
        if($shaped == 'rectangle'){
            
            $northlat = HtmlPurifier::process($_POST['northlat']);
            $southlat = HtmlPurifier::process($_POST['southlat']);
            $northlng = HtmlPurifier::process($_POST['northlng']);
            $southlng = HtmlPurifier::process($_POST['southlng']);

            $rectanglecoordinates = '{
                "north": '.$northlat.',
                "south": '.$southlat.',
                "east": '.$northlng.',
                "west": '.$southlng.'
             }';
           
            $newkuma = $rectanglecoordinates;

            $session->set('newkuma', $newkuma);
            $session->set('locations', $locations);
            $session->set('shaped', $shaped);
           
        }

        if($shaped == ''){            
            
            $session->set('locations', $locations);
            $session->set('shaped', $shaped);
           
        }

        date_default_timezone_set("Asia/Calcutta");
        $date = date('Y-m-d H:i:s');

        $user_id = Yii::$app->user->identity->id;


        if (isset(Yii::$app->user->identity->id)){

           $querys = new Query;
           $querys->select('COUNT(*) as newcount')
                   ->from('save_searches')
                   ->where(['user_id' => $user_id])
                   ->andwhere(['sector' => $sector])
                   ->andwhere(['role_type' => 'buyer']);

           $commands = $querys->createCommand();
           $paymentsm = $commands->queryOne();

          // print_r($paymentsm);die;

        //    if ($paymentsm['newcount'] == 0) {

               

           

          if($shaped == 'polygon'){
             
           $trendingadd = \Yii::$app->db->createCommand()->insert('save_searches', ['role_type' => 'buyer','search_for'=>'google', 'type' => $shaped, 'geometry' => $newspaths, 'user_id' => $user_id, 'location_name' => $locations, 'town' => $town, 'sector' => $sector, 'country' => $country, 'property_type' => $proptype, 'min_area' => $areamin, 'area' => $areamax, 'min_prices' => $pricemin, 'max_prices' => $pricemax, 'property_auction_type' => 'Instant', 'created_date' => $date])->execute();
          }

         else if($shaped == 'circle'){
           
           $trendingadd = \Yii::$app->db->createCommand()->insert('save_searches', ['role_type' => 'buyer','search_for'=>'google', 'type' => $shaped, 'geometry' => $centercoordinates, 'radius' => $totalradius, 'user_id' => $user_id, 'location_name' => $locations, 'town' => $town, 'sector' => $sector, 'country' => $country, 'property_type' => $proptype, 'min_area' => $areamin, 'area' => $areamax, 'min_prices' => $pricemin, 'max_prices' => $pricemax, 'property_auction_type' => 'Instant',
                       'created_date' => $date])->execute();
          }

         else if($shaped == 'rectangle'){
            
           $trendingaddd = \Yii::$app->db->createCommand()->insert('save_searches', ['role_type' => 'buyer','search_for'=>'google', 'type' => $shaped, 'geometry' => $newkuma, 'radius' => $totalradius, 'user_id' => $user_id, 'location_name' => $locations, 'town' => $town, 'sector' => $sector, 'country' => $country, 'property_type' => $proptype, 'min_area' => $areamin, 'area' => $areamax, 'min_prices' => $pricemin, 'max_prices' => $pricemax, 'property_auction_type' => 'Instant',
                       'created_date' => $date])->execute();
                       }

                       else{
                      
                        $trendingaddd = \Yii::$app->db->createCommand()->insert('save_searches', ['role_type' => 'buyer','search_for'=>'text', 'type' => 'blank', 'user_id' => $user_id, 'location_name' => $locations, 'town' => $town, 'sector' => $sector, 'country' => $country, 'property_type' => $proptype, 'min_area' => $areamin, 'area' => $areamax, 'min_prices' => $pricemin, 'max_prices' => $pricemax, 'property_auction_type' => 'Instant','created_date' => $date])->execute();


                                    }

     //$doshortlist = \Yii::$app->db->createCommand()->insert('shortlistproperty', ['user_id' => $user_id,'property_id'=>$propid, 'created_date' => $date, 'active' => '1'])->execute();
                    
     \common\models\activemode::update_my_profile_progress_status($user_id,"my_search",'100','4');
     $assignleadsalesid  =  \common\models\activemode::assignsaleslead($user_id);

      $newid =  $assignleadsalesid['employee_id'];
      $leadid =  $assignleadsalesid['leadid'];

      if($leadid != ''  && $newid != ''){            

      $assignlead  =  \common\models\activemode::assignleadsalesactionfrontend($newid,$leadid,'Automatic send from frontend');

     }

        // }

       }
      
        
        return $this->render('listing',[
            'locations' => $locations,
            'shaped' => $shaped,
            'proptype' => $proptype,
            'propcity' => $propcity,
            'serachlocality' => $serachlocality,
            'propnearby' => $propnearby,
            'propsquare' => $propsquare,
            'propareaminimum' => $propareaminimum,
            'propareamaximum' => $propareamaximum,
            'proppriceminimum' => $proppriceminimum,
            'proppricemaximum' => $proppricemaximum,
            'town' => $town,
            'sector' => $sector,
            'country' => $country,
            'searchlat' => $searchlat,
            'searchlng' => $searchlng,
			
		]);



    }





    public function actionSearches() {

        // echo '<pre>';print_r($_POST);die;
 
        $userid = Yii::$app->user->identity->id;
        $date = date('Y-m-d H:i:s');
 
         $session = Yii::$app->session; 

        $locations = $_SESSION['locationspost'];
        $shaped = $_SESSION['shapedpost'];
        $propid = $_SESSION['propidpost'];
        $town = $_SESSION['townpost'];
        $sector = $_SESSION['sectorpost'];
        $country = $_SESSION['country'];
        $areamin = $_SESSION['areaminpost'];
        $areamax = $_SESSION['areamaxpost'];
        $pricemin = $_SESSION['priceminpost'];
        $pricemax = $_SESSION['pricemaxpost'];
        $proptype = $_SESSION['proptypepost'];
        $propbid = $_SESSION['propbidpost'];



     if($shaped == 'polygon'){

         $newspaths = $_SESSION['newspathspost'];
         
     }
     if($shaped == 'circle'){
         
        $centercoordinates = $_SESSION['centercoordinatespost'];
        $totalradius = $_SESSION['totalradiuspost'];

     }
     if($shaped == 'rectangle'){
         
        $newkuma = $_SESSION['newkumapost'];
        
     }

     
         
     if (isset(Yii::$app->user->identity->id)){
 
        $user_id = Yii::$app->user->identity->id;

        $user_id = Yii::$app->user->identity->id;


        if (isset(Yii::$app->user->identity->id)){

           $querys = new Query;
           $querys->select('COUNT(*) as newcount')
                   ->from('save_searches')
                   ->where(['user_id' => $user_id])
                   ->andwhere(['sector' => $sector])
                   ->andwhere(['role_type' => 'buyer']);
                   $buyer = 'buyer';


           $commands = $querys->createCommand();
           $paymentsm = $commands->queryOne();

          // print_r($paymentsm);die;

           if ($paymentsm['newcount'] > 0) {

            $insert1 = \Yii::$app->db->createCommand('DELETE FROM save_searches WHERE user_id=:userid and sector=:sector and role_type=:role_type ORDER BY id DESC LIMIT 1');
            $insert1->bindParam(':userid', $user_id);
            $insert1->bindParam(':sector', $sector);
            $insert1->bindParam(':role_type', $buyer);
            $insert1->execute();


           }

               

           

          if($shaped == 'polygon'){
             
           $trendingadd = \Yii::$app->db->createCommand()->insert('save_searches', ['role_type' => 'buyer','search_for'=>'google', 'type' => $shaped, 'geometry' => $newspaths, 'user_id' => $user_id, 'location_name' => $locations, 'town' => $town, 'sector' => $sector, 'country' => $country, 'property_type' => $proptype, 'min_area' => $areamin, 'area' => $areamax, 'min_prices' => $pricemin, 'max_prices' => $pricemax, 'property_auction_type' => 'Instant', 'created_date' => $date])->execute();
          }

         else if($shaped == 'circle'){
           
           $trendingadd = \Yii::$app->db->createCommand()->insert('save_searches', ['role_type' => 'buyer','search_for'=>'google', 'type' => $shaped, 'geometry' => $centercoordinates, 'radius' => $totalradius, 'user_id' => $user_id, 'location_name' => $locations, 'town' => $town, 'sector' => $sector, 'country' => $country, 'property_type' => $proptype, 'min_area' => $areamin, 'area' => $areamax, 'min_prices' => $pricemin, 'max_prices' => $pricemax, 'property_auction_type' => 'Instant',
                       'created_date' => $date])->execute();
          }

         else if($shaped == 'rectangle'){
            
           $trendingaddd = \Yii::$app->db->createCommand()->insert('save_searches', ['role_type' => 'buyer','search_for'=>'google', 'type' => $shaped, 'geometry' => $newkuma, 'radius' => $totalradius, 'user_id' => $user_id, 'location_name' => $locations, 'town' => $town, 'sector' => $sector, 'country' => $country, 'property_type' => $proptype, 'min_area' => $areamin, 'area' => $areamax, 'min_prices' => $pricemin, 'max_prices' => $pricemax, 'property_auction_type' => 'Instant',
                       'created_date' => $date])->execute();
                       }

                       else{
                      
                        $trendingaddd = \Yii::$app->db->createCommand()->insert('save_searches', ['role_type' => 'buyer','search_for'=>'text', 'type' => $shaped, 'user_id' => $user_id, 'location_name' => $locations, 'town' => $town, 'sector' => $sector, 'country' => $country, 'property_type' => $proptype, 'min_area' => $areamin, 'area' => $areamax, 'min_prices' => $pricemin, 'max_prices' => $pricemax, 'property_auction_type' => 'Instant','created_date' => $date])->execute();


                                    }

     //$doshortlist = \Yii::$app->db->createCommand()->insert('shortlistproperty', ['user_id' => $user_id,'property_id'=>$propid, 'created_date' => $date, 'active' => '1'])->execute();
                    
      

        

       }
        
   

     }         
 
        
         if($propidpost = $_SESSION['propidpost']){

            $payments = \Yii::$app->db->createCommand("SELECT count(*) as counts FROM shortlistproperty where user_id='$userid' and property_id ='$propidpost'")->queryAll();

            $totalcount = $payments[0]['counts'];
          
   if ($totalcount == 0){
  
      $doshortlist = \Yii::$app->db->createCommand()->insert('shortlistproperty', ['user_id' => $userid,'property_id'=>$propidpost, 'created_date' => $date, 'active' => '1'])->execute();
  
   }
         }        
       
         
         return $this->render('listings');
 
 
 
     }




    public function actionViewproperty() {

       
        date_default_timezone_set("Asia/Calcutta");
        $date = date('Y-m-d H:i:s');

        
            $userid = Yii::$app->user->identity->id;
       
        $id = $_POST['id'];

        
        $querys = new Query;
        $querys->select('COUNT(*) as newcount')
                ->from('user_view_properties')
                ->where(['property_id' => $id])
                ->andwhere(['user_id' => $userid]);

        $commands = $querys->createCommand();
        $paymentsm = $commands->queryOne();

        if ($paymentsm['newcount'] == 0) {

            $insert1 = \Yii::$app->db->createCommand()->insert('user_view_properties', ['user_id' => $userid, 'property_id' => $id, 'created_date' => $date])->execute();
        }
    }

    public function actionSearch() {

        $this->layout = "newdashboard";
        return $this->render('search');
    }

    public function actionSearchaction() {

        $this->layout = "roleLayout";
        return $this->render('searchaction');
    }


    public function actionDeleteprop() {
        $propertyid = $_POST['propertyid'];
        $userid = Yii::$app->user->identity->id;
        date_default_timezone_set("Asia/Calcutta");
        $date = date('Y-m-d H:i:s');


            $insert1 = \Yii::$app->db->createCommand()->delete('shortlistproperty', ['user_id' => $userid, 'property_id' => $propertyid])->execute();
            return '1';
         
    }

    public function actionPetproperty($id) {



        $model = new Property();
        $user_id = Yii::$app->user->identity->id;
        if ($id == 'hello') {


            $payments = \Yii::$app->db->createCommand("SELECT a.*,p.typename as typename,p.undercategory as undercategory,(select count(*) from request_site_visit where user_id='$user_id' and property_id= a.id) as county,(select count(*) from requested_biding_users where propertyID= a.id and request_for='bid' and isactive='1') as county1 ,(select count(*) from user_view_properties where property_id= a.id and user_id='$user_id') as countyview FROM addproperty as a LEFT JOIN property_type as p ON (p.id = a.project_type_id) LEFT JOIN request_site_visit as r ON (r.property_id = a.id) LEFT JOIN requested_biding_users as r1 ON (r1.propertyID = a.id) LEFT JOIN user_view_properties as v1 ON (v1.property_id = a.id) where property_for = 'sale' and a.user_id <> '$user_id' GROUP BY a.id  order by id DESC")->queryAll();

            echo json_encode($payments);
        } else {


            $query = new Query;

            $query->select(['property.*'])
                    ->from('property')
                    ->join('LEFT JOIN', 'property_type', 'property_type.id =property.projectypeid'
                    )
                    ->where(['undercategory' => $id]);

            $command = $query->createCommand();
            $payments = $command->queryAll();

            echo json_encode($payments);
        }
    }

    public function actionGetsorting($val) {


        if ($val == 'high') {

            $payments = \Yii::$app->db->createCommand("SELECT * FROM addproperty where property_for = 'sale' order by expected_price DESC")->queryAll();

            echo json_encode($payments);
        } else if ($val == 'low') {

            $payments = \Yii::$app->db->createCommand("SELECT * FROM addproperty where property_for = 'sale' order by expected_price ASC")->queryAll();

            echo json_encode($payments);
        }
    }



    public function actionGetfreevisit() {

        date_default_timezone_set("Asia/Calcutta");
        $date = date('Y-m-d H:i:s');
         $hardam = $_POST['hardam'];
         $rantime = $_POST['rantime'];
         $visitmode = $_POST['visitmode'];
         //$getexpectationID = $_POST['getexpectationID'];
         if(Yii::$app->user->getIsGuest()){
            return 'nouseractive';
        }else{
        $userid = Yii::$app->user->identity->id;
        $checkrole = \common\models\activemode::checkmyrole($userid);
        $propuserids = Addpropertypm::find('user_id')->where(['id' => $hardam])->andwhere(['status' => 'approved'])->one();
        $propuserid  =  $propuserids->user_id;
       $querys = new Query;
        $querys->select('COUNT(*) as newcount')
                ->from('request_site_visit')
                ->where(['property_id' => $hardam])
                ->andwhere(['user_id' => $userid]);

        $commands = $querys->createCommand();
        $paymentsm = $commands->queryOne();
       // echo '<pre>';print_r($paymentsm);die;


       $querysd = new Query;
        $querysd->select('COUNT(*) as newcountd')
                ->from('user_view_properties')
                ->where(['property_id' => $hardam])
                ->andwhere(['user_id' => $userid]);

        $commandsd = $querysd->createCommand();
        $paymentsmd = $commandsd->queryOne();
        
        if ($paymentsmd['newcountd'] == 0) {
            
            $insert1 = \Yii::$app->db->createCommand()->insert('user_view_properties', ['user_id' => $userid, 'property_id' => $hardam, 'created_date' => $date])->execute();
   
           }

        if ($paymentsm['newcount'] == 0) {
            //echo 'aya';die;

        if ($checkrole->item_name == "Company_user") {


            $model1 = CompanyEmp::find('companyid')->where(['userid' => $userid])->andwhere(['isactive' => '1'])->one();

           $company_id = $model1->companyid;
            

            $model2 = Company::find('free_site_visit')->where(['id' => $company_id])->andwhere(['isactive' => '1'])->one();

            $free_visit = $model2->free_site_visit;

            $new_free_visit = $free_visit - 1;


            if ($free_visit > 0) {


                $model3 = Yii::$app->db->createCommand()->update('company', ['free_site_visit' => $new_free_visit], 'id = "' . $company_id . '"')->execute();

                $my_profile_progress_status = new \common\models\MyProfileProgressStatus();
                        $my_profile_progress_status->property_id = $hardam;
                        $my_profile_progress_status->user_id = $userid;
                        $my_profile_progress_status->process_name = 'site_visit_requested';
                        $my_profile_progress_status->process_status = '100';
                        $my_profile_progress_status->role_id = '7';
                        $my_profile_progress_status->save();



                        $trendingadd = \Yii::$app->db->createCommand()->insert('request_site_visit', ['user_id' => $userid, 'property_id' => $hardam,'visit_type'=>$visitmode,'scheduled_time'=>$rantime, 'company_id' => $company_id, 'created_date' => $date])->execute();
                        $request_id = Yii::$app->db->lastInsertID;

$objlocation = \common\models\RequestSiteVisitbin::getsalesidreqvisited($request_id,$userid,7,$propuserid,5);

return 1;
            } else {

                $model3 = Yii::$app->db->createCommand()->update('company', ['free_site_visit' => $new_free_visit], 'id = "' . $company_id . '"')->execute();

                $my_profile_progress_status = new \common\models\MyProfileProgressStatus();
                        $my_profile_progress_status->property_id = $hardam;
                        $my_profile_progress_status->user_id = $userid;
                        $my_profile_progress_status->process_name = 'site_visit_requested';
                        $my_profile_progress_status->process_status = '100';
                        $my_profile_progress_status->role_id = '4';
                        $my_profile_progress_status->save();

                        $trendingadd = \Yii::$app->db->createCommand()->insert('request_site_visit', ['user_id' => $userid, 'property_id' => $hardam, 'visit_type'=>$visitmode,'scheduled_time'=>$rantime,'company_id' => $company_id ,'created_date' => $date])->execute();
                        $request_id = Yii::$app->db->lastInsertID;

$objlocation = \common\models\RequestSiteVisitbin::getsalesidreqvisited($request_id,$userid,7,$propuserid,5);
return 2;
            }
        } else if ($checkrole->item_name == "user") {

            //echo $checkrole->item_name;die;

            $model2 = User::find('free_site_visit')->where(['id' => $userid])->andwhere(['status' => '1'])->one();

            $free_visit = $model2->free_site_visit;

         $new_free_visit = $free_visit - 1;


            if ($free_visit > 0) {


                $model3 = Yii::$app->db->createCommand()->update('user', ['free_site_visit' => $new_free_visit], 'id = "' . $userid . '"')->execute();

$my_profile_progress_status = new \common\models\MyProfileProgressStatus();
                        $my_profile_progress_status->property_id = $hardam;
                        $my_profile_progress_status->user_id = $userid;
                        $my_profile_progress_status->process_name = 'site_visit_requested';
                        $my_profile_progress_status->process_status = '100';
                        $my_profile_progress_status->role_id = '4';
                        $my_profile_progress_status->save();

                        $trendingadd = \Yii::$app->db->createCommand()->insert('request_site_visit', ['user_id' => $userid, 'property_id' => $hardam, 'visit_type'=>$visitmode,'scheduled_time'=>$rantime,'created_date' => $date])->execute();
                        $request_id = Yii::$app->db->lastInsertID;

$objlocation = \common\models\RequestSiteVisitbin::getsalesidreqvisited($request_id,$userid,7,$propuserid,5);
return 1;
            } else {

                $model3 = Yii::$app->db->createCommand()->update('user', ['free_site_visit' => $new_free_visit], 'id = "' . $userid . '"')->execute();
                
               $my_profile_progress_status = new \common\models\MyProfileProgressStatus();
                        $my_profile_progress_status->property_id = $hardam;
                        $my_profile_progress_status->user_id = $userid;
                        $my_profile_progress_status->process_name = 'site_visit_requested';
                        $my_profile_progress_status->process_status = '100';
                        $my_profile_progress_status->role_id = '4';
                        $my_profile_progress_status->save();
                       

                        $trendingadd = \Yii::$app->db->createCommand()->insert('request_site_visit', ['user_id' => $userid, 'property_id' => $hardam,'visit_type'=>$visitmode,'scheduled_time'=>$rantime, 'created_date' => $date])->execute();
                
 
               $request_id = Yii::$app->db->lastInsertID;

$objlocation = \common\models\RequestSiteVisitbin::getsalesidreqvisited($request_id,$userid,7,$propuserid,5);
return 2;
            }
        }
        
        }else{
        
            return 5;
        
         }
    }
}

    public function actionMyexpectations($id) {


        $model = new Property();
        $model1 = MyExpectationsajax::find()->where(['id' => $id])->andwhere(['is_active' => '1'])->one();


        $propertype = $model1->property_type;
        $location = $model1->location;
        $deposit = $model1->deposit;
        $rent = $model1->rent;
        $maintenance = $model1->maintenance;

        $query = new Query;
        $query->select(['property.*'])
                ->from('property')
                ->join('LEFT JOIN', 'property_type', 'property_type.id =property.projectypeid'
                )
                ->andFilterWhere(['like', 'projectypeid', $propertype])
                ->andFilterWhere([ 'or', ['like', 'deposite_amount', $deposit],
                    ['<', 'deposite_amount', $deposit],
                ])
                ->andFilterWhere([ 'or', ['like', 'expected_price', $rent],
                    ['<', 'expected_price', $rent],
                ])
                ->andFilterWhere([ 'or', ['like', 'maintainces_charges', $maintenance],
                    ['<', 'maintainces_charges', $maintenance],
        ]);



        $command = $query->createCommand();

        $payments = $command->queryAll();

        echo json_encode($payments);
    }

    public function actionBititnow() {

        $propertyid = $_POST['propertyid'];
        $userid = Yii::$app->user->identity->id;
        date_default_timezone_set("Asia/Calcutta");
        $date = date('Y-m-d H:i:s');

        $querys = new Query;
        $querys->select('COUNT(*) as newcount')
                ->from('requested_biding_users')
                ->where(['propertyID' => $propertyid])
                ->andwhere(['userid' => $userid]);

        $commands = $querys->createCommand();
        $paymentsm = $commands->queryOne();

        if ($paymentsm['newcount'] == 0) {


            $query = new Query;
            $query->select(['process_status'])
                    ->from('my_profile_progress_status')
                    ->where(['process_name' => 'my_profile'])
                    ->andwhere(['user_id' => $userid]);

            $command = $query->createCommand();
            $payments = $command->queryOne();

            if ($payments['process_status'] != '100') {
                echo '1';
            } else {

                $query1 = new Query;
                $query1->select(['process_status'])
                        ->from('my_profile_progress_status')
                        ->where(['process_name' => 'my_KYC_upload'])
                        ->andwhere(['user_id' => $userid]);

                $command1 = $query1->createCommand();
                $payments1 = $command1->queryOne();
                if ($payments1['process_status'] != '100') {
                    echo '2';
                } else {

                    $query12 = new Query;
                    $query12->select(['process_status'])
                            ->from('my_profile_progress_status')
                            ->where(['process_name' => 'my_KYC_approval'])
                            ->andwhere(['user_id' => $userid]);

                    $command12 = $query12->createCommand();
                    $payments12 = $command12->queryOne();
                    if ($payments12['process_status'] != '100') {
                        echo '3';
                    } else {

                        $my_profile_progress_status = new \common\models\MyProfileProgressStatus();
                        $my_profile_progress_status->property_id = $propertyid;
                        $my_profile_progress_status->user_id = $userid;
                        $my_profile_progress_status->process_name = 'requested_for_biding';
                        $my_profile_progress_status->process_status = '100';
                        $my_profile_progress_status->role_id = '7';
                        $my_profile_progress_status->save();

                        $trendingadd = \Yii::$app->db->createCommand()->insert('requested_biding_users', ['userid' => $userid, 'propertyID' => $propertyid, 'userroleID' => 'buyer', 'request_for' => 'bid',
                                    'created_at' => $date])->execute();

                        echo '4';
                    }
                }
            }
        } else {

            echo '5';
        }
    }

    public function actionDirectitnow() {

        $propertyid = $_POST['propertyid'];
        $userid = Yii::$app->user->identity->id;
        date_default_timezone_set("Asia/Calcutta");
        $date = date('Y-m-d H:i:s');

        $querys = new Query;
        $querys->select('COUNT(*) as newcount')
                ->from('requested_biding_users')
                ->where(['propertyID' => $propertyid])
                ->andwhere(['userid' => $userid]);

        $commands = $querys->createCommand();
        $paymentsm = $commands->queryOne();

        if ($paymentsm['newcount'] == 0) {
            $query = new Query;
            $query->select(['process_status'])
                    ->from('my_profile_progress_status')
                    ->where(['process_name' => 'my_profile'])
                    ->andwhere(['user_id' => $userid]);

            $command = $query->createCommand();
            $payments = $command->queryOne();

            if ($payments['process_status'] != '100') {
                echo '1';
            } else {

                $query1 = new Query;
                $query1->select(['process_status'])
                        ->from('my_profile_progress_status')
                        ->where(['process_name' => 'my_KYC_upload'])
                        ->andwhere(['user_id' => $userid]);

                $command1 = $query1->createCommand();
                $payments1 = $command1->queryOne();
                if ($payments1['process_status'] != '100') {
                    echo '2';
                } else {

                    $query12 = new Query;
                    $query12->select(['process_status'])
                            ->from('my_profile_progress_status')
                            ->where(['process_name' => 'my_KYC_approval'])
                            ->andwhere(['user_id' => $userid]);

                    $command12 = $query12->createCommand();
                    $payments12 = $command12->queryOne();
                    if ($payments12['process_status'] != '100') {
                        echo '3';
                    } else {

                        $my_profile_progress_status = new \common\models\MyProfileProgressStatus();
                        $my_profile_progress_status->property_id = $propertyid;
                        $my_profile_progress_status->user_id = $userid;
                        $my_profile_progress_status->process_name = 'requested_for_direct';
                        $my_profile_progress_status->process_status = '100';
                        $my_profile_progress_status->role_id = '7';
                        $my_profile_progress_status->save();

                        $trendingadd = \Yii::$app->db->createCommand()->insert('requested_biding_users', ['userid' => $userid, 'propertyID' => $propertyid, 'userroleID' => 'buyer', 'request_for' => 'direct',
                                    'created_at' => $date])->execute();

                        echo '4';
                    }
                }
            }
        } else {

            echo '5';
        }
    }

    public function actionSavemessages() {

        $propid = $_POST['propid'];
        $textarew = $_POST['textarew'];

        $user_id = Yii::$app->user->identity->id;
        date_default_timezone_set("Asia/Calcutta");
        $date = date('Y-m-d H:i:s');
        $trendingadd = \Yii::$app->db->createCommand()->insert('property_messages', ['property_id' => $propid, 'user_id' => $user_id, 'message' => $textarew, 'created_date' => $date])->execute();
        if ($trendingadd) {
            echo 1;
        } else {
            echo 0;
        }
    }

    public function actionSimiliarprop() {


        if (isset(Yii::$app->user->identity->id)){
            $user_id = Yii::$app->user->identity->id;
     }else{
        $user_id = 0;
     }
        date_default_timezone_set("Asia/Calcutta");
        $date = date('Y-m-d H:i:s');

        $location = $_POST['location'];
        $town = $_POST['town'];
        $sector = $_POST['sector'];
        $areamin = $_POST['areamin'];
        $areamax = $_POST['areamax'];
        $pricemin = $_POST['pricemin'];
        $pricemax = $_POST['pricemax'];
        $proptype = $_POST['proptype'];
        $propbid = $_POST['propbid'];

        $query = "SELECT a.*,p.typename as typename,(select count(*) from request_site_visit where user_id='$user_id' and property_id= a.id) as county,(select count(*) from requested_biding_users where propertyID= a.id and request_for='bid' and isactive='1') as county1 ,(select count(*) from user_view_properties where property_id= a.id and user_id='$user_id') as countyview FROM addproperty as a LEFT JOIN property_type as p ON (p.id = a.project_type_id) LEFT JOIN request_site_visit as r ON (r.property_id = a.id) LEFT JOIN requested_biding_users as r1 ON (r1.propertyID = a.id)  LEFT JOIN user_view_properties as v1 ON (v1.property_id = a.id) ";

        $conditions = array();

        $conditions[] = "property_for='sale'";

        $conditions[] = "a.user_id <> '$user_id'";

        if ($proptype != 'Property Type') {
            $conditions[] = "project_type_id = '$proptype'";
        }
        if ($areamin != '' && $areamax != '') {
            $conditions[] = "a.total_plot_area BETWEEN '$areamin' AND '$areamax'";
        }

        if ($pricemin != '' && $pricemax != '') {
            $conditions[] = "a.asking_rental_price BETWEEN '$pricemin' AND '$pricemax'";
        }

        if ($propbid != 'Select') {
            $conditions[] = "a.request_for = '$propbid'";
        }
        if ($town != '') {
            $conditions[] = "town_name = '$town'";
        }
        if ($sector != '') {
            $conditions[] = "sector_name != '$sector'";
        }
        $conditions[] = "a.status='approved'";

//where property_for = 'rent' AND a.user_id <> '$user_id' AND town_name = '$town' AND sector_name='$sector' AND total_plot_area <='$total_area'  GROUP BY a.id
        $sqlstr = $query;
        if (count($conditions) > 0) {
            $sqlstr .= " WHERE " . implode(' AND ', $conditions) . " GROUP BY a.id";
        }



        $payments = \Yii::$app->db->createCommand($sqlstr)->queryAll();

        echo json_encode($payments);
    }

    public function actionWithoutshape() {


        
        if(Yii::$app->user->getIsGuest()){
            $user_id = 0;
            
        }else{
            $user_id = Yii::$app->user->identity->id;
        }
        date_default_timezone_set("Asia/Calcutta");
        $date = date('Y-m-d H:i:s');
        $data = Yii::$app->request->post();
       
        $location = $_POST['location'];
       // $area = $_POST['area'];
        $town = $_POST['town'];
        $sector = $_POST['sector'];
        $country = $_POST['country'];
        $areamin = $_POST['areamin'];
        $areamax = $_POST['areamax'];
        $pricemin = $_POST['pricemin'];
        $pricemax = $_POST['pricemax'];
        $proptype = $_POST['proptype'];
        $propbid = $_POST['propbid'];
        $availabilitym = $_POST['availabilitym'];

            $query = "SELECT a.*,p.typename as typename,(select count(*) from request_site_visit where user_id='$user_id' and property_id= a.id) as county,(select count(*) from shortlistproperty where property_id= a.id  and user_id='$user_id') as county1 ,(select count(*) from user_view_properties where property_id= a.id and user_id='$user_id') as countyview FROM addproperty as a LEFT JOIN property_type as p ON (p.id = a.project_type_id) LEFT JOIN request_site_visit as r ON (r.property_id = a.id) LEFT JOIN requested_biding_users as r1 ON (r1.propertyID = a.id) LEFT JOIN shortlistproperty as sh ON (sh.property_id = a.id)  LEFT JOIN user_view_properties as v1 ON (v1.property_id = a.id)";

            $conditions = array();
            $conditionsnew = array();
            $conditionsprop = array();
            $conditionsexact = array();
        


            $conditionsprop[] = "( property_for='both'";  
            
            $conditions[] = "property_for='sale' )";  

        if ($proptype != '') {
            $conditions[] = "project_type_id = '$proptype'";
        }
        if ($areamin != '' && $areamax !='') {
            // $conditions[] = "a.super_area BETWEEN '$areamin' AND '$areamax'";
 
             $conditionsnew[] = "'$areamin' BETWEEN a.min_super_area AND a.super_area";
             $conditionsnew[] = "'$areamax' BETWEEN a.min_super_area AND a.super_area";
             $conditionsexact[] = "a.super_area BETWEEN '$areamin' AND '$areamax'";
         }

        if ($pricemin != '' && $pricemax != '') {
            $conditions[] = "a.expected_price BETWEEN '$pricemin' AND '$pricemax'";
        }

        if ($propbid != '') {
            $conditions[] = "a.request_for = '$propbid'";
        }
        if ($availabilitym != '') {
            $conditions[] = "a.availability  = '$availabilitym'";
        }
        if ($town != '') {
            $conditions[] = "a.town_name = '$town'";
        }
        if ($sector != '') {
            $conditions[] = "a.sector_name='$sector' ";
        }

        $conditions[] = "a.status='approved'";
        $conditions[] = "a.user_id <> '$user_id' ";

//where property_for = 'rent' AND a.user_id <> '$user_id' AND town_name = '$town' AND sector_name='$sector' AND total_plot_area <='$total_area'  GROUP BY a.id
        $sqlstr = $query;
        if ((count($conditions) > 0) && (count($conditionsnew) == 0)) {
            $sqlstr .= " WHERE " . implode(' AND ', $conditionsprop)." OR ". implode(' AND ', $conditions)." GROUP BY a.id";
        }

        if ((count($conditions) > 0) && (count($conditionsnew) > 0)) {
            $sqlstr .= " WHERE "  . implode(' AND ', $conditionsprop)." OR ". implode(' AND ', $conditions)." AND CASE WHEN a.min_super_area IS NOT NULL THEN ( ".implode(' OR ', $conditionsnew).") ELSE (". implode(' AND ', $conditionsexact).") END GROUP BY a.id";
        }
//   echo $sqlstr;die;

        

            $payments = \Yii::$app->db->createCommand($sqlstr)->queryAll();
            return  json_encode($payments);
        
    }

   
    public function actionGetpolymyupdate() {


        $user_id = Yii::$app->user->identity->id;
        date_default_timezone_set("Asia/Calcutta");
        $date = date('Y-m-d H:i:s');
      // echo '<pre>';print_r($_POST['town']);die;
        $town = $_POST['town'];
        $sector = $_POST['sector'];
        $newpath = $_POST['newpath'];
       
        $areamin = $_POST['areamin'];
        $areamax = $_POST['areamax'];
        $pricemin = $_POST['pricemin'];
        $pricemax = $_POST['pricemax'];
        $proptype = $_POST['proptype'];
        $propbid = $_POST['propbid'];
        $location = $_POST['location'];

       // $model3 = Yii::$app->db->createCommand()->update('save_search', ['geometry' => $newpath,'location_name'=>$location,'town'=>$town,'sector'=>$sector,'created_date'=>$date], 'id = "' . $area . '"')->execute();


            $query = "SELECT a.*,p.typename as typename,p.undercategory as undercategory,(select count(*) from request_site_visit where user_id='$user_id' and property_id= a.id) as county,(select count(*) from requested_biding_users where propertyID= a.id and request_for='bid' and isactive='1') as county1 ,(select count(*) from user_view_properties where property_id= a.id and user_id='$user_id') as countyview FROM addproperty as a LEFT JOIN property_type as p ON (p.id = a.project_type_id) LEFT JOIN request_site_visit as r ON (r.property_id = a.id) LEFT JOIN requested_biding_users as r1 ON (r1.propertyID = a.id) LEFT JOIN user_view_properties as v1 ON (v1.property_id = a.id)";


            $conditions = array();

            $conditions[] = "property_for='sale'";

            

            if ($proptype != 'Property Type') {
                $conditions[] = "project_type_id = '$proptype'";
            }

            if ($propbid != 'Select') {
                $conditions[] = "a.request_for = '$propbid'";
            }

            if ($areamin != '' && $areamax != '') {
                $conditions[] = "a.super_area BETWEEN '$areamin' AND '$areamax'";
            }

            if ($pricemin != '' && $pricemax != '') {
                $conditions[] = "a.expected_price BETWEEN '$pricemin' AND '$pricemax'";
            }

            $conditions[] = "a.user_id <> '$user_id' GROUP BY a.id";

            


            $sqlstr = $query;
            if (count($conditions) > 0) {
                $sqlstr .= " WHERE " . implode(' AND ', $conditions);
            }
        


        $payments = \Yii::$app->db->createCommand($sqlstr)->queryAll();

        echo json_encode($payments);
    }


    public function beforeAction($action) {
       // if($action->id == "getpolymyupdate")
           $this->enableCsrfValidation = false;
           return parent::beforeAction($action);
   }




    public function actionGetpolymy() {


        if (isset(Yii::$app->user->identity->id)){
                $user_id = Yii::$app->user->identity->id;
        }else{
            $user_id = 0;
        }

        date_default_timezone_set("Asia/Calcutta");
        $date = date('Y-m-d H:i:s');

        
        $town = $_POST['town'];
        $sector = $_POST['sector'];
        $newpath = $_POST['newpath'];
        $area = $_POST['area'];
        $areamin = $_POST['areamin'];
        $areamax = $_POST['areamax'];
        $pricemin = $_POST['pricemin'];
        $pricemax = $_POST['pricemax'];
        $proptype = $_POST['proptype'];
        $propbid = $_POST['propbid'];
        $location = $_POST['location'];

        // if (isset(Yii::$app->user->identity->id)){
           
        // $trendingadd = \Yii::$app->db->createCommand()->insert('save_search', ['role_type' => 'buyer', 'type' => 'polygon', 'geometry' => $newpath, 'user_id' => $user_id, 'location_name' => $location, 'expectation_id' => $area, 'town' => $town, 'sector' => $sector,
        //             'created_date' => $date])->execute();
        // }

        

            $query = "SELECT a.*,p.typename as typename,p.undercategory as undercategory,(select count(*) from request_site_visit where user_id='$user_id' and property_id= a.id) as county,(select count(*) from shortlistproperty where property_id= a.id and user_id='$user_id') as county1,(select count(*) from user_view_properties where property_id= a.id and user_id='$user_id') as countyview FROM addproperty as a LEFT JOIN property_type as p ON (p.id = a.project_type_id) LEFT JOIN request_site_visit as r ON (r.property_id = a.id) LEFT JOIN requested_biding_users as r1 ON (r1.propertyID = a.id) LEFT JOIN user_view_properties as v1 ON (v1.property_id = a.id)";


            $conditions = array();
            $conditionsnew = array();
            $conditionsprop = array();
            $conditionsexact = array();
        


            
            $conditionsprop[] = "( property_for='both'";  
            
            $conditions[] = "property_for='sale' )";  

        if ($proptype != '') {
            $conditions[] = "project_type_id = '$proptype'";
        }
        if ($areamin != '' && $areamax !='') {
            // $conditions[] = "a.super_area BETWEEN '$areamin' AND '$areamax'";
 
             $conditionsnew[] = "'$areamin' BETWEEN a.min_super_area AND a.super_area";
             $conditionsnew[] = "'$areamax' BETWEEN a.min_super_area AND a.super_area";
             $conditionsexact[] = "a.super_area BETWEEN '$areamin' AND '$areamax'";
         }

        if ($pricemin != '' && $pricemax != '') {
            $conditions[] = "a.expected_price BETWEEN '$pricemin' AND '$pricemax'";
        }

        if ($propbid != '') {
            $conditions[] = "a.request_for = '$propbid'";
        }
        if ($availabilitym != '') {
            $conditions[] = "a.availability  = '$availabilitym'";
        }
        if ($town != '') {
            $conditions[] = "a.town_name = '$town'";
        }
        if ($sector != '') {
            $conditions[] = "a.sector_name='$sector' ";
        }

        $conditions[] = "a.status='approved'";

        $conditions[] = "a.user_id <> '$user_id' ";

//where property_for = 'rent' AND a.user_id <> '$user_id' AND town_name = '$town' AND sector_name='$sector' AND total_plot_area <='$total_area'  GROUP BY a.id
        $sqlstr = $query;
        if ((count($conditions) > 0) && (count($conditionsnew) == 0)) {
            $sqlstr .= " WHERE " . implode(' AND ', $conditionsprop)." OR ". implode(' AND ', $conditions)." GROUP BY a.id";
        }

        if ((count($conditions) > 0) && (count($conditionsnew) > 0)) {
            $sqlstr .= " WHERE "  . implode(' AND ', $conditionsprop)." OR ". implode(' AND ', $conditions)." AND CASE WHEN a.min_super_area IS NOT NULL THEN ( ".implode(' OR ', $conditionsnew).") ELSE (". implode(' AND ', $conditionsexact).") END GROUP BY a.id";
        }

            
        
// echo $sqlstr;die;

        $payments = \Yii::$app->db->createCommand($sqlstr)->queryAll();

        return json_encode($payments);
    }

    public function actionPetpropertyst($id) {


        $model1 = \common\models\MyExpectations::find()->where(['id' => $id])->one();
        $location = $model1->location;

        $nelocation = str_replace(',', '', $location);

        $model = new Property();
        $sql = "SELECT * FROM property where location LIKE SUBSTRING_INDEX(SUBSTRING_INDEX('$nelocation', ' ',  1), ' ', -1)";
        $payments = \Yii::$app->db->createCommand($sql)->queryAll();

        echo json_encode($payments);
    }

    public function actionResidfilter($residlocation, $restype, $resprice, $restypename) {



        $query = "SELECT property.*,property_type.typename FROM property left join property_type on 'property_type.id = property.projectypeid' ";
        $conditions = array();

        if ($residlocation != "") {
            $conditions[] = "location='$residlocation'";
        }
        if ($restype != 'Select') {
            $conditions[] = "property_for='$restype'";
        }
        if ($resprice != 'Price') {
            $conditions[] = "expected_price='$resprice'";
        }
        if ($restypename != 'Property Type') {
            $conditions[] = "typename='$restypename'";
        }


        $sql = $query;
        if (count($conditions) > 0) {
            $sql .= " WHERE " . implode(' AND ', $conditions);
        }

        $payments = \Yii::$app->db->createCommand($sql)->queryAll();



        echo json_encode($payments);
    }

    public function actionResidfilter1($commlocation, $commtype, $commprice, $commtypename) {

        $cum = str_replace(',', '', $commlocation);
        $query = "SELECT property.*,property_type.typename FROM property left join property_type on 'property_type.id = property.projectypeid' ";
        $conditions = array();

        if ($commlocation != "") {
            $conditions[] = "location LIKE SUBSTRING_INDEX(SUBSTRING_INDEX('$cum', ' ',  1), ' ', -1)";
        }
        if ($commtype != 'Select') {
            $conditions[] = "property_for='$commtype'";
        }
        if ($commprice != 'Price') {
            $conditions[] = "expected_price='$commprice'";
        }
        if ($commtypename != 'Property Type') {
            $conditions[] = "typename='$commtypename'";
        }

        $sql = $query;
        if (count($conditions) > 0) {
            $sql .= " WHERE " . implode(' AND ', $conditions);
        }

        $payments = \Yii::$app->db->createCommand($sql)->queryAll();




        echo json_encode($payments);
    }

    public function actionMapproperty1update() {


        $center = $_POST['center'];
       
        $town = $_POST['town'];
        $sector = $_POST['sector'];
        
        $latcenter = $_POST['latcenter'];
        $longcenter = $_POST['longcenter'];
        $totalradius = $_POST['totalradius'];
        $area = $_POST['area'];
        $areamin = $_POST['areamin'];
        $areamax = $_POST['areamax'];
        $pricemin = $_POST['pricemin'];
        $pricemax = $_POST['pricemax'];
        $proptype = $_POST['proptype'];
        $propbid = $_POST['propbid'];
        $location = $_POST['location'];
        
       
        $user_id = Yii::$app->user->identity->id;
        $range = $totalradius;
        date_default_timezone_set("Asia/Calcutta");
        $date = date('Y-m-d H:i:s');
        
        
            $model3 = Yii::$app->db->createCommand()->update('save_search', ['geometry' => '"'.$center.'"', 'radius' => $totalradius,'location_name'=>$location,'town'=>$town,'sector'=>$sector,'created_date'=>$date], 'id = "' . $area . '"')->execute();

        
        
            $query = "SELECT a.*,p.typename as typename,p.undercategory as undercategory,(select count(*) from request_site_visit where user_id='$user_id' and property_id= a.id) as county,(select count(*) from requested_biding_users where propertyID= a.id and request_for='bid' and isactive='1') as county1 ,(select count(*) from user_view_properties where property_id= a.id and user_id='$user_id') as countyview FROM addproperty as a LEFT JOIN property_type as p ON (p.id = a.project_type_id) LEFT JOIN request_site_visit as r ON (r.property_id = a.id) LEFT JOIN requested_biding_users as r1 ON (r1.propertyID = a.id) LEFT JOIN user_view_properties as v1 ON (v1.property_id = a.id) ";
        
            $conditions = array();
        
            $conditions[] = "property_for='sale'";
        
            if ($proptype != 'Property Type') {
                $conditions[] = "project_type_id = '$proptype'";
            }
        
            if ($propbid != 'Select') {
                $conditions[] = "a.request_for = '$propbid'";
            }
        
            if ($areamin != '' && $areamax != '') {
                $conditions[] = "a.total_plot_area BETWEEN '$areamin' AND '$areamax'";
            }
        
            if ($pricemin != '' && $pricemax != '') {
                $conditions[] = "a.expected_price BETWEEN '$pricemin' AND '$pricemax'";
            }
        
            $conditions[] = "a.user_id <> '$user_id'  GROUP BY a.id";
        
        
        
            $sqlstr = $query;
            if (count($conditions) > 0) {
                $sqlstr .= " WHERE " . implode(' AND ', $conditions);
            }
        
        
        
        
            $payments = \Yii::$app->db->createCommand($sqlstr)->queryAll();
           
        
           
        
            echo json_encode($payments);
        
        }



    public function actionMapproperty1() {


        $center = $_POST['center'];
        $shapes = $_POST['shapes'];
        $town = $_POST['town'];
        $sector = $_POST['sector'];
        
        $totalradius = $_POST['totalradius'];
        
        $areamin = $_POST['areamin'];
        $areamax = $_POST['areamax'];
        $pricemin = $_POST['pricemin'];
        $pricemax = $_POST['pricemax'];
        $proptype = $_POST['proptype'];
        $propbid = $_POST['propbid'];
        $location = $_POST['location'];

       
        if (isset(Yii::$app->user->identity->id)){
        $user_id = Yii::$app->user->identity->id;
        }else{
        $user_id = 0;
        }
       
        $range = $totalradius;
        date_default_timezone_set("Asia/Calcutta");
        $date = date('Y-m-d H:i:s');

        // if (isset(Yii::$app->user->identity->id)){
            
        // $trendingadd = \Yii::$app->db->createCommand()->insert('save_search', ['role_type' => 'buyer', 'type' => $shapes, 'geometry' => '"'.$center.'"', 'radius' => $range, 'user_id' => $user_id, 'location_name' => $location, 'expectation_id' => $area, 'town' => $town, 'sector' => $sector,
        //             'created_date' => $date])->execute();
        // }
 

            $query = "SELECT a.*,p.typename as typename,p.undercategory as undercategory,(select count(*) from request_site_visit where user_id='$user_id' and property_id= a.id) as county,(select count(*) from shortlistproperty where property_id= a.id and user_id='$user_id') as county1 ,(select count(*) from user_view_properties where property_id= a.id and user_id='$user_id') as countyview FROM addproperty as a LEFT JOIN property_type as p ON (p.id = a.project_type_id) LEFT JOIN request_site_visit as r ON (r.property_id = a.id) LEFT JOIN requested_biding_users as r1 ON (r1.propertyID = a.id) LEFT JOIN user_view_properties as v1 ON (v1.property_id = a.id) ";

             $conditions = array();
            $conditionsnew = array();
            $conditionsprop = array();
            $conditionsexact = array();
        


            $conditionsprop[] = "( property_for='both'";  
            
            $conditions[] = "property_for='sale' )";   

        if ($proptype != '') {
            $conditions[] = "project_type_id = '$proptype'";
        }
        if ($areamin != '' && $areamax !='') {
            // $conditions[] = "a.super_area BETWEEN '$areamin' AND '$areamax'";
 
             $conditionsnew[] = "'$areamin' BETWEEN a.min_super_area AND a.super_area";
             $conditionsnew[] = "'$areamax' BETWEEN a.min_super_area AND a.super_area";
             $conditionsexact[] = "a.super_area BETWEEN '$areamin' AND '$areamax'";
         }

        if ($pricemin != '' && $pricemax != '') {
            $conditions[] = "a.expected_price BETWEEN '$pricemin' AND '$pricemax'";
        }

        if ($propbid != '') {
            $conditions[] = "a.request_for = '$propbid'";
        }
        if ($availabilitym != '') {
            $conditions[] = "a.availability  = '$availabilitym'";
        }
        if ($town != '') {
            $conditions[] = "a.town_name = '$town'";
        }
        if ($sector != '') {
            $conditions[] = "a.sector_name='$sector' ";
        }

        $conditions[] = "a.status='approved'";
        $conditions[] = "a.user_id <> '$user_id' ";

//where property_for = 'rent' AND a.user_id <> '$user_id' AND town_name = '$town' AND sector_name='$sector' AND total_plot_area <='$total_area'  GROUP BY a.id
        $sqlstr = $query;
        if ((count($conditions) > 0) && (count($conditionsnew) == 0)) {
            $sqlstr .= " WHERE " . implode(' AND ', $conditionsprop)." OR ". implode(' AND ', $conditions)." GROUP BY a.id";
        }

        if ((count($conditions) > 0) && (count($conditionsnew) > 0)) {
            $sqlstr .= " WHERE "  . implode(' AND ', $conditionsprop)." OR ". implode(' AND ', $conditions)." AND CASE WHEN a.min_super_area IS NOT NULL THEN ( ".implode(' OR ', $conditionsnew).") ELSE (". implode(' AND ', $conditionsexact).") END GROUP BY a.id";
        }

            
            $payments = \Yii::$app->db->createCommand($sqlstr)->queryAll();

            return json_encode($payments);
        
    }

  
    public function actionMapproperty2() {


        date_default_timezone_set("Asia/Calcutta");
        $date = date('Y-m-d H:i:s');
        if (isset(Yii::$app->user->identity->id)){
            $user_id = Yii::$app->user->identity->id;
     }else{
        $user_id = 0;
     }
       
        $northlat     =     $_POST['northlat'];
        $southlat     = $_POST['southlat'];
        $northlng     = $_POST['northlng'];
        $southlng     =   $_POST['southlng'];

     $rectanglecoordinates = '{
             "north": '.$northlat.',
             "south": '.$southlat.',
             "east": '.$northlng.',
             "west": '.$southlng.'
          }';
        
        $newkuma = $rectanglecoordinates;
       // $newkuma = $_POST['newkuma'];
        $center = $_POST['center'];
        $shapes = $_POST['shapes'];
        $town = $_POST['town'];
        $sector = $_POST['sector'];
        
        
        $areamin = $_POST['areamin'];
        $areamax = $_POST['areamax'];
        $pricemin = $_POST['pricemin'];
        $pricemax = $_POST['pricemax'];
        $proptype = $_POST['proptype'];
        $propbid = $_POST['propbid'];
        $location = $_POST['location'];


        // if (isset(Yii::$app->user->identity->id)){
            
        // $trendingadd = \Yii::$app->db->createCommand()->insert('save_search', ['role_type' => 'buyer', 'type' => $shapes, 'geometry' => $newkuma, 'radius' => $center, 'user_id' => $user_id, 'location_name' => $location, 'expectation_id' => $area, 'town' => $town, 'sector' => $sector,
        //             'created_date' => $date])->execute();
        // }

       
            $query = "SELECT a.*,p.typename as typename,p.undercategory as undercategory,(select count(*) from request_site_visit where user_id='$user_id' and property_id= a.id) as county,(select count(*) from shortlistproperty where property_id= a.id and user_id='$user_id') as county1,(select count(*) from user_view_properties where property_id= a.id and user_id='$user_id') as countyview FROM addproperty as a LEFT JOIN property_type as p ON (p.id = a.project_type_id) LEFT JOIN request_site_visit as r ON (r.property_id = a.id) LEFT JOIN requested_biding_users as r1 ON (r1.propertyID = a.id) LEFT JOIN user_view_properties as v1 ON (v1.property_id = a.id) ";

            $conditions = array();
            $conditionsnew = array();
            $conditionsprop = array();
            $conditionsexact = array();
        


            $conditionsprop[] = "( property_for='both'";  
            
            $conditions[] = "property_for='sale' )";  

        if ($proptype != '') {
            $conditions[] = "project_type_id = '$proptype'";
        }
        if ($areamin != '' && $areamax !='') {
            // $conditions[] = "a.super_area BETWEEN '$areamin' AND '$areamax'";
 
             $conditionsnew[] = "'$areamin' BETWEEN a.min_super_area AND a.super_area";
             $conditionsnew[] = "'$areamax' BETWEEN a.min_super_area AND a.super_area";
             $conditionsexact[] = "a.super_area BETWEEN '$areamin' AND '$areamax'";
         }

        if ($pricemin != '' && $pricemax != '') {
            $conditions[] = "a.expected_price BETWEEN '$pricemin' AND '$pricemax'";
        }

        if ($propbid != '') {
            $conditions[] = "a.request_for = '$propbid'";
        }
        if ($availabilitym != '') {
            $conditions[] = "a.availability  = '$availabilitym'";
        }
        if ($town != '') {
            $conditions[] = "a.town_name = '$town'";
        }
        if ($sector != '') {
            $conditions[] = "a.sector_name='$sector' ";
        }

        $conditions[] = "a.status='approved'";
        $conditions[] = "a.user_id <> '$user_id' ";

//where property_for = 'rent' AND a.user_id <> '$user_id' AND town_name = '$town' AND sector_name='$sector' AND total_plot_area <='$total_area'  GROUP BY a.id
        $sqlstr = $query;
        if ((count($conditions) > 0) && (count($conditionsnew) == 0)) {
            $sqlstr .= " WHERE " . implode(' AND ', $conditionsprop)." OR ". implode(' AND ', $conditions)." GROUP BY a.id";
        }

        if ((count($conditions) > 0) && (count($conditionsnew) > 0)) {
            $sqlstr .= " WHERE "  . implode(' AND ', $conditionsprop)." OR ". implode(' AND ', $conditions)." AND CASE WHEN a.min_super_area IS NOT NULL THEN ( ".implode(' OR ', $conditionsnew).") ELSE (". implode(' AND ', $conditionsexact).") END GROUP BY a.id";
        }

        //  echo $sqlstr;die;
            $payments = \Yii::$app->db->createCommand($sqlstr)->queryAll();

            return json_encode($payments);
        
    }



    public function actionMapproperty2update() {


        date_default_timezone_set("Asia/Calcutta");
        $date = date('Y-m-d H:i:s');
        $user_id = Yii::$app->user->identity->id;
        
        $northlat     = $_POST['northlat'];
        $southlat     = $_POST['southlat'];
        $northlng     = $_POST['northlng'];
        $southlng     = $_POST['southlng'];

     $rectanglecoordinates = '{
             "north": '.$northlat.',
             "south": '.$southlat.',
             "east": '.$northlng.',
             "west": '.$southlng.'
          }';
        
          $newkuma = $rectanglecoordinates;
        $town = $_POST['town'];
        $sector = $_POST['sector'];
       
        $area = $_POST['area'];
        $areamin = $_POST['areamin'];
        $areamax = $_POST['areamax'];
        $pricemin = $_POST['pricemin'];
        $pricemax = $_POST['pricemax'];
        $proptype = $_POST['proptype'];
        $propbid = $_POST['propbid'];
        $location = $_POST['location'];

        $model3 = Yii::$app->db->createCommand()->update('save_search', ['geometry' => $newkuma,'location_name'=>$location,'town'=>$town,'sector'=>$sector,'created_date'=>$date], 'id = "' . $area . '"')->execute();


       

            $query = "SELECT a.*,p.typename as typename,p.undercategory as undercategory,(select count(*) from request_site_visit where user_id='$user_id' and property_id= a.id) as county,(select count(*) from requested_biding_users where propertyID= a.id and request_for='bid' and isactive='1') as county1 ,(select count(*) from user_view_properties where property_id= a.id and user_id='$user_id') as countyview FROM addproperty as a LEFT JOIN property_type as p ON (p.id = a.project_type_id) LEFT JOIN request_site_visit as r ON (r.property_id = a.id) LEFT JOIN requested_biding_users as r1 ON (r1.propertyID = a.id) LEFT JOIN user_view_properties as v1 ON (v1.property_id = a.id) ";

            $conditions = array();

            $conditions[] = "property_for='sale'";

            if ($proptype != 'Property Type') {
                $conditions[] = "project_type_id = '$proptype'";
            }
            if ($propbid != 'Select') {
                $conditions[] = "a.request_for = '$propbid'";
            }
            if ($areamin != '' && $areamax != '') {
                $conditions[] = "a.total_plot_area BETWEEN '$areamin' AND '$areamax'";
            }

            if ($pricemin != '' && $pricemax != '') {
                $conditions[] = "a.expected_price BETWEEN '$pricemin' AND '$pricemax'";
            }

            $conditions[] = "a.user_id <> '$user_id'  GROUP BY a.id";

           


            $sqlstr = $query;
            if (count($conditions) > 0) {
                $sqlstr .= " WHERE " . implode(' AND ', $conditions);
            }


            $payments = \Yii::$app->db->createCommand($sqlstr)->queryAll();

            echo json_encode($payments);
      
    }

}

