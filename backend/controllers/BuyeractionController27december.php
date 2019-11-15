<?php

namespace backend\controllers;

use yii\web\Controller;
use Yii;
use common\models\Property;
use common\models\MyExpectationsajax;
use common\models\User;
use common\models\Company;
use common\models\Companynew;
use common\models\CompanyEmp;
use yii\web\Response;
use yii\db\Query;

class BuyeractionController extends Controller {

   // public function __construct($id, $module, $config = array()) {
       // parent::__construct($id, $module, $config);
        //$this->layout = "common";
   // }

 	public function __construct($id, $module, $config = array()) {
        parent::__construct($id, $module, $config);
        $assigndash = \common\models\RbacAuthAssignment::find()->where(['user_id'=>yii::$app->user->identity->id])->one();
	if($assigndash->item_name == "csr_demand"){
		
		$this->layout="csr_layout2";
		
	}if($assigndash->item_name == "csr_head"){
		
		$this->layout="csr_layout2";
		
	}if($assigndash->item_name == "csr_supply"){
		
		$this->layout="csr_layout2";
		
	}
	
    }
    public function actionIndex() {
        return $this->render('index');
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

    public function actionSaveprop($hardam,$food) {

        $userid = $food;
        date_default_timezone_set("Asia/Calcutta");
        $date = date('Y-m-d H:i:s');

        $payments = \Yii::$app->db->createCommand("SELECT * FROM shortlistproperty where user_id='$userid' and property_id ='$hardam'")->queryAll();


        if ($payments) {
            echo '1';
        } else {

            $insert1 = \Yii::$app->db->createCommand()->insert('shortlistproperty', ['user_id' => $userid, 'property_id' => $hardam, 'created_date' => $date])->execute();
            echo '2';
        }

//        $delete = \Yii::$app->db->createCommand()->delete('shortlistProperty', ['user_id' => $userid])->execute();
//        foreach ($newhar as $key => $rat) {
//            $insert1 = \Yii::$app->db->createCommand()->insert('shortlistProperty', ['user_id' => $userid, 'property_id' => $rat, 'created_date' => $date])->execute();
//        }
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

    public function actionSaveprop6($hardam, $userid) {

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
    
    
    public function actionViewproperty($id,$food) {

        date_default_timezone_set("Asia/Calcutta");
        $date = date('Y-m-d H:i:s');
        $userid = $food;        

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

       // $this->layout = "newdashboard";
        return $this->render('search');
    }

    public function actionPetproperty($id) {



        $model = new Property();
        $user_id = $_GET['id'];
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

    public function actionGetfreevisit($hardam,$food) {

        date_default_timezone_set("Asia/Calcutta");
        $date = date('Y-m-d H:i:s');
        $userid = $food;
        $checkrole = \common\models\activemode::checkmyrole($userid);
        $querys = new Query;
        $querys->select('COUNT(*) as newcount')
                ->from('request_site_visit')
                ->where(['property_id' => $hardam])
                ->andwhere(['user_id' => $userid]);

        $commands = $querys->createCommand();
        $paymentsm = $commands->queryOne();

      
        if ($paymentsm['newcount'] == 0) {
            

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



                $trendingadd = \Yii::$app->db->createCommand()->insert('request_site_visit', ['user_id' => $userid, 'property_id' => $hardam, 'company_id' => $company_id, 'created_date' => $date])->execute();

                echo 1;
                die;
            } else {

                $model3 = Yii::$app->db->createCommand()->update('company', ['free_site_visit' => $new_free_visit], 'id = "' . $company_id . '"')->execute();

                $my_profile_progress_status = new \common\models\MyProfileProgressStatus();
                        $my_profile_progress_status->property_id = $hardam;
                        $my_profile_progress_status->user_id = $userid;
                        $my_profile_progress_status->process_name = 'site_visit_requested';
                        $my_profile_progress_status->process_status = '100';
                        $my_profile_progress_status->role_id = '7';
                        $my_profile_progress_status->save();

                $trendingadd = \Yii::$app->db->createCommand()->insert('request_site_visit', ['user_id' => $userid, 'property_id' => $hardam, 'company_id' => $company_id, 'created_date' => $date])->execute();

                echo 2;
                die;
            }
        } else if ($checkrole->item_name == "user") {

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
                        $my_profile_progress_status->role_id = '7';
                        $my_profile_progress_status->save();

                $trendingadd = \Yii::$app->db->createCommand()->insert('request_site_visit', ['user_id' => $userid, 'property_id' => $hardam, 'created_date' => $date])->execute();

                echo 1;
                die;
            } else {

                $model3 = Yii::$app->db->createCommand()->update('user', ['free_site_visit' => $new_free_visit], 'id = "' . $userid . '"')->execute();

                $my_profile_progress_status = new \common\models\MyProfileProgressStatus();
                        $my_profile_progress_status->property_id = $hardam;
                        $my_profile_progress_status->user_id = $userid;
                        $my_profile_progress_status->process_name = 'site_visit_requested';
                        $my_profile_progress_status->process_status = '100';
                        $my_profile_progress_status->role_id = '7';
                        $my_profile_progress_status->save();

                $trendingadd = \Yii::$app->db->createCommand()->insert('request_site_visit', ['user_id' => $userid, 'property_id' => $hardam, 'created_date' => $date])->execute();

                echo 2;
                die;
            }
        }
        
        }else{
        
        echo 5;
        
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


//echo '<pre>';print_r($query);die;
        $command = $query->createCommand();
//            echo '<pre>';print_r($command);die;
        $payments = $command->queryAll();
//echo '<pre>';print_r($payments);die;
        echo json_encode($payments);
    }

    public function actionBititnow($propertyid,$food) {

        $userid = $food;
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

    public function actionDirectitnow($propertyid,$food) {
        

        $userid = $food;
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
        
     }else{
         
         echo '5';
          }
    }
    
    
     public function actionSavemessages($propid,$textarew,$food){
        
        
        $user_id = $food;
        date_default_timezone_set("Asia/Calcutta");
        $date = date('Y-m-d H:i:s');
        $trendingadd = \Yii::$app->db->createCommand()->insert('property_messages', ['property_id' => $propid, 'user_id' => $user_id, 'message' =>$textarew, 'created_date' => $date])->execute();
        if($trendingadd){
            echo 1;
        }else{
            echo 0;
        }
        
    }
    
    
    public function actionWithoutshape($location, $area,$town,$sector,$food) {


        $user_id = $food;
        date_default_timezone_set("Asia/Calcutta");
        $date = date('Y-m-d H:i:s');
        
        $query = new Query;
        $query->select(['expected_rate'])
                ->from('sellor_expectations')
                ->where(['id' => $area])
                ->andwhere(['is_active' => '1']);

        $command = $query->createCommand();
        $payments = $command->queryOne();
       
         $expected_rate = $payments['expected_rate'];
    

      $trendingadd = \Yii::$app->db->createCommand()->insert('save_search', ['role_type'=>'buyer','user_id' => $user_id, 'location_name' => $location,'expectation_id'=>$area,'created_date' => $date])->execute();
      
     if($sector != ''){
         
          $sqlstr = "SELECT a.*,p.typename as typename,(select count(*) from request_site_visit where user_id='$user_id' and property_id= a.id) as county,(select count(*) from requested_biding_users where propertyID= a.id and request_for='bid' and isactive='1') as county1 ,(select count(*) from user_view_properties where property_id= a.id and user_id='$user_id') as countyview FROM addproperty as a LEFT JOIN property_type as p ON (p.id = a.project_type_id) LEFT JOIN request_site_visit as r ON (r.property_id = a.id) LEFT JOIN requested_biding_users as r1 ON (r1.propertyID = a.id) LEFT JOIN user_view_properties as v1 ON (v1.property_id = a.id) where property_for = 'sale' AND a.user_id <> '$user_id' AND town_name = '$town' AND sector_name='$sector' AND expected_price <= '$expected_rate'  GROUP BY a.id";
    
      }else{
         
          $sqlstr = "SELECT a.*,p.typename as typename,(select count(*) from request_site_visit where user_id='$user_id' and property_id= a.id) as county,(select count(*) from requested_biding_users where propertyID= a.id and request_for='bid' and isactive='1') as county1 ,(select count(*) from user_view_properties where property_id= a.id and user_id='$user_id') as countyview FROM addproperty as a LEFT JOIN property_type as p ON (p.id = a.project_type_id) LEFT JOIN request_site_visit as r ON (r.property_id = a.id) LEFT JOIN requested_biding_users as r1 ON (r1.propertyID = a.id) LEFT JOIN user_view_properties as v1 ON (v1.property_id = a.id)  where property_for = 'sale' AND a.user_id <> '$user_id' AND town_name = '$town' AND expected_price <= '$expected_rate'  GROUP BY a.id";

      }
      


        $payments = \Yii::$app->db->createCommand($sqlstr)->queryAll();

        echo json_encode($payments);
    }
    
    
    

    public function actionGetpolymy($maxi, $mini, $maxiy, $miniy, $shapes, $town,$sector, $newpath, $area,$food) {
        

        $user_id = $food;
        date_default_timezone_set("Asia/Calcutta");
        $date = date('Y-m-d H:i:s');
        
        $query = new Query;
        $query->select(['expected_rate'])
                ->from('sellor_expectations')
                ->where(['id' => $area])
                ->andwhere(['is_active' => '1']);

        $command = $query->createCommand();
        $payments = $command->queryOne();
       
         $expected_rate = $payments['expected_rate'];
//        $expected_rate = 3400000;
      
      

        $trendingadd = \Yii::$app->db->createCommand()->insert('save_search', ['role_type'=>'buyer','type' => $shapes, 'geometry' => $newpath, 'user_id' => $user_id, 'location_name' => $town,'expectation_id'=>$area,
                    'created_date' => $date])->execute();

if($town == ''){
    
     $sqlstr = "SELECT a.*,p.typename as typename,p.undercategory as undercategory,(select count(*) from request_site_visit where user_id='$user_id' and property_id= a.id) as county,(select count(*) from requested_biding_users where propertyID= a.id and request_for='bid' and isactive='1') as county1 ,(select count(*) from user_view_properties where property_id= a.id and user_id='$user_id') as countyview FROM addproperty as a LEFT JOIN property_type as p ON (p.id = a.project_type_id) LEFT JOIN request_site_visit as r ON (r.property_id = a.id) LEFT JOIN requested_biding_users as r1 ON (r1.propertyID = a.id) LEFT JOIN user_view_properties as v1 ON (v1.property_id = a.id) where 
                    (property_for = 'sale'  AND a.user_id <> '$user_id' AND expected_price <= '$expected_rate' AND latitude BETWEEN '" . $mini . "' AND '" . $maxi . "' AND  
                     longitude BETWEEN '" . $miniy . "' AND '" . $maxiy . "') GROUP BY a.id";
     
}else{
    
    
    if($sector != ''){
        
     $sqlstr = "SELECT a.*,p.typename as typename,p.undercategory as undercategory,(select count(*) from request_site_visit where user_id='$user_id' and property_id= a.id) as county,(select count(*) from requested_biding_users where propertyID= a.id and request_for='bid' and isactive='1') as county1 ,(select count(*) from user_view_properties where property_id= a.id and user_id='$user_id') as countyview FROM addproperty as a LEFT JOIN property_type as p ON (p.id = a.project_type_id) LEFT JOIN request_site_visit as r ON (r.property_id = a.id) LEFT JOIN requested_biding_users as r1 ON (r1.propertyID = a.id) LEFT JOIN user_view_properties as v1 ON (v1.property_id = a.id)  where ( property_for = 'sale' AND a.user_id <> '$user_id' AND town_name = '$town' AND sector_name='$sector' AND expected_price <= '$expected_rate') OR
                    (property_for = 'sale' AND a.user_id <> '$user_id' AND town_name = '$town' AND sector_name='$sector' AND expected_price <= '$expected_rate' AND latitude BETWEEN '" . $mini . "' AND '" . $maxi . "' AND  
                     longitude BETWEEN '" . $miniy . "' AND '" . $maxiy . "') GROUP BY a.id";   
        
    }else{
        
    $sqlstr = "SELECT a.*,p.typename as typename,p.undercategory as undercategory,(select count(*) from request_site_visit where user_id='$user_id' and property_id= a.id) as county,(select count(*) from requested_biding_users where propertyID= a.id and request_for='bid' and isactive='1') as county1 ,(select count(*) from user_view_properties where property_id= a.id and user_id='$user_id') as countyview FROM addproperty as a LEFT JOIN property_type as p ON (p.id = a.project_type_id) LEFT JOIN request_site_visit as r ON (r.property_id = a.id) LEFT JOIN requested_biding_users as r1 ON (r1.propertyID = a.id) LEFT JOIN user_view_properties as v1 ON (v1.property_id = a.id) where ( property_for = 'sale' AND a.user_id <> '$user_id' AND town_name = '$town' AND expected_price <= '$expected_rate') OR
                    (property_for = 'sale' AND a.user_id <> '$user_id' AND town_name = '$town' AND expected_price <= '$expected_rate' AND latitude BETWEEN '" . $mini . "' AND '" . $maxi . "' AND  
                     longitude BETWEEN '" . $miniy . "' AND '" . $maxiy . "') GROUP BY a.id";    
        
        
    }
    
    
    
}


        $payments = \Yii::$app->db->createCommand($sqlstr)->queryAll();

        echo json_encode($payments);
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
//       echo $sql;die;
        $payments = \Yii::$app->db->createCommand($sql)->queryAll();
//        print_r($payments);



        echo json_encode($payments);
    }

    public function actionMapproperty1($center, $shapes, $town,$sector, $northeast, $southwest, $latcenter, $longcenter, $totalradius, $area,$food) {

//       $objlocation = \common\models\Property::getlatlang($newlocation);
//
//        $latitude = $objlocation->lat;
//        $longitude = $objlocation->lng;
        $latitudeTo = strtok($center, ','); 
        $longitudeTo = substr($center, strpos($center, ",") + 1);
        $user_id = $food;
        $range = $totalradius;
        date_default_timezone_set("Asia/Calcutta");
        $date = date('Y-m-d H:i:s');
        
        $query = new Query;
        $query->select(['expected_rate'])
                ->from('sellor_expectations')
                ->where(['id' => $area])
                ->andwhere(['is_active' => '1']);

        $command = $query->createCommand();
        $payments = $command->queryOne();
       
        $expected_rate = $payments['expected_rate'];
//      $expected_rate = 3400000;

        $trendingadd = \Yii::$app->db->createCommand()->insert('save_search', ['role_type'=>'buyer','type' => $shapes, 'geometry' => $center, 'radius' => $range, 'user_id' => $user_id, 'location_name' => $town,'expectation_id'=>$area,
                    'created_date' => $date])->execute();

            // Find Max - Min Lat / Long for Radius and zero point and query  
            $lat_range = $range / 69.172;
            $lon_range = abs($range / (cos($latcenter) * 69.172));
            $min_lat = number_format($latcenter - $lat_range, "4", ".", "");
            $max_lat = number_format($latcenter + $lat_range, "4", ".", "");
            $min_lon = number_format($longcenter - $lon_range, "4", ".", "");
            $max_lon = number_format($longcenter + $lon_range, "4", ".", "");
            
          if($town == ''){           
           
          $rows = array();
          
          $myquery = "SELECT a.*,p.typename as typename,p.undercategory as undercategory,(select count(*) from request_site_visit where user_id='$user_id' and property_id= a.id) as county,(select count(*) from requested_biding_users where propertyID= a.id and request_for='bid' and isactive='1') as county1 ,(select count(*) from user_view_properties where property_id= a.id and user_id='$user_id') as countyview FROM addproperty as a LEFT JOIN property_type as p ON (p.id = a.project_type_id) LEFT JOIN request_site_visit as r ON (r.property_id = a.id) LEFT JOIN requested_biding_users as r1 ON (r1.propertyID = a.id) LEFT JOIN user_view_properties as v1 ON (v1.property_id = a.id)  where 
           ( property_for = 'sale' AND a.user_id <> '$user_id' AND expected_price <='$expected_rate' AND latitude BETWEEN '" . $min_lat . "' AND '" . $max_lat . "' AND  
           longitude BETWEEN '" . $min_lon . "' AND '" . $max_lon . "') GROUP BY a.id ";
          
           $payments = \Yii::$app->db->createCommand($myquery)->queryAll(); 
           $count = 0;
           
          foreach($payments  as $payment ){
              
              
              $latitudeFrom = $payment['latitude'];
              $longitudeFrom = $payment['longitude'];
              $propid = $payment['id'];
              
              $objlocation = \common\models\Addproperty::getCircleDistance($latitudeFrom,$longitudeFrom,$latitudeTo,$longitudeTo);
              
               if ($objlocation < $range) {
                   
                   $count += 1;
                    
           $sqlstr = "SELECT a.*,p.typename as typename,p.undercategory as undercategory,(select count(*) from request_site_visit where user_id='$user_id' and property_id= a.id) as county,(select count(*) from requested_biding_users where propertyID= a.id and request_for='bid' and isactive='1') as county1 ,(select count(*) from user_view_properties where property_id= a.id and user_id='$user_id') as countyview FROM addproperty as a LEFT JOIN property_type as p ON (p.id = a.project_type_id) LEFT JOIN request_site_visit as r ON (r.property_id = a.id) LEFT JOIN requested_biding_users as r1 ON (r1.propertyID = a.id) LEFT JOIN user_view_properties as v1 ON (v1.property_id = a.id) where 
                       a.id='$propid' AND a.user_id <> '$user_id' GROUP BY a.id";
          
           $paymentst = \Yii::$app->db->createCommand($sqlstr)->queryOne();
                   
             $rows[] = $paymentst;                       
               }
              
          }
          
            echo json_encode($rows);
           
           
            }  else{
                
                
            if($sector != ''){
                
             $sqlstr = "SELECT a.*,p.typename as typename,p.undercategory as undercategory,(select count(*) from request_site_visit where user_id='$user_id' and property_id= a.id) as county,(select count(*) from requested_biding_users where propertyID= a.id and request_for='bid' and isactive='1') as county1 ,(select count(*) from user_view_properties where property_id= a.id and user_id='$user_id') as countyview FROM addproperty as a LEFT JOIN property_type as p ON (p.id = a.project_type_id) LEFT JOIN request_site_visit as r ON (r.property_id = a.id) LEFT JOIN requested_biding_users as r1 ON (r1.propertyID = a.id) LEFT JOIN user_view_properties as v1 ON (v1.property_id = a.id) where  ( property_for = 'sale' AND a.user_id <> '$user_id' AND town_name = '$town' AND sector_name='$sector' AND expected_price <='$expected_rate') OR
           ( property_for = 'sale' AND a.user_id <> '$user_id' AND town_name = '$town' AND sector_name='$sector' AND expected_price <='$expected_rate' AND latitude BETWEEN '" . $min_lat . "' AND '" . $max_lat . "' AND  
           longitude BETWEEN '" . $min_lon . "' AND '" . $max_lon . "') GROUP BY a.id ";   
                
            }else{
                
             $sqlstr = "SELECT a.*,p.typename as typename,p.undercategory as undercategory,(select count(*) from request_site_visit where user_id='$user_id' and property_id= a.id) as county,(select count(*) from requested_biding_users where propertyID= a.id and request_for='bid' and isactive='1') as county1 ,(select count(*) from user_view_properties where property_id= a.id and user_id='$user_id') as countyview FROM addproperty as a LEFT JOIN property_type as p ON (p.id = a.project_type_id) LEFT JOIN request_site_visit as r ON (r.property_id = a.id) LEFT JOIN requested_biding_users as r1 ON (r1.propertyID = a.id) LEFT JOIN user_view_properties as v1 ON (v1.property_id = a.id) where  ( property_for = 'sale' AND a.user_id <> '$user_id' AND town_name = '$town' AND expected_price <='$expected_rate') OR
           ( property_for = 'sale' AND a.user_id <> '$user_id' AND town_name = '$town' AND expected_price <='$expected_rate' AND latitude BETWEEN '" . $min_lat . "' AND '" . $max_lat . "' AND  
           longitude BETWEEN '" . $min_lon . "' AND '" . $max_lon . "') GROUP BY a.id ";   
                
            }     
                
           
            


            $payments = \Yii::$app->db->createCommand($sqlstr)->queryAll();

            echo json_encode($payments);
            
            
            }
        
    }

    public function actionMapproperty2($newkuma, $center, $shapes, $town,$sector, $maxim, $minim, $maximy, $minimy, $area,$food) {


        date_default_timezone_set("Asia/Calcutta");
        $date = date('Y-m-d H:i:s');
        $user_id = $food;
        
        $query = new Query;
        $query->select(['expected_rate'])
                ->from('sellor_expectations')
                ->where(['id' => $area])
                ->andwhere(['is_active' => '1']);

        $command = $query->createCommand();
        $payments = $command->queryOne();
       
        $expected_rate = $payments['expected_rate'];
//        $expected_rate = 3400000;


        $trendingadd = \Yii::$app->db->createCommand()->insert('save_search', ['role_type'=>'buyer','type' => $shapes, 'geometry' => $newkuma, 'radius' => $center, 'user_id' => $user_id, 'location_name' => $town,'expectation_id'=>$area,
                    'created_date' => $date])->execute();

  if($town == ''){
      
     $sqlstr = "SELECT a.*,p.typename as typename,p.undercategory as undercategory,(select count(*) from request_site_visit where user_id='$user_id' and property_id= a.id) as county,(select count(*) from requested_biding_users where propertyID= a.id and request_for='bid' and isactive='1') as county1 ,(select count(*) from user_view_properties where property_id= a.id and user_id='$user_id') as countyview FROM addproperty as a LEFT JOIN property_type as p ON (p.id = a.project_type_id) LEFT JOIN request_site_visit as r ON (r.property_id = a.id) LEFT JOIN requested_biding_users as r1 ON (r1.propertyID = a.id) LEFT JOIN user_view_properties as v1 ON (v1.property_id = a.id) where 
         ( property_for = 'sale'  AND a.user_id <> '$user_id' AND expected_price <='$expected_rate' AND latitude BETWEEN '" . $minim . "' AND '" . $maxim . "' AND   
           longitude BETWEEN '" . $minimy . "' AND '" . $maximy . "') GROUP BY a.id ";


        $payments = \Yii::$app->db->createCommand($sqlstr)->queryAll();

        echo json_encode($payments); 
      
      
  }else{
      
      
      if($sector != ''){
          
       $sqlstr = "SELECT a.*,p.typename as typename,p.undercategory as undercategory,(select count(*) from request_site_visit where user_id='$user_id' and property_id= a.id) as county,(select count(*) from requested_biding_users where propertyID= a.id and request_for='bid' and isactive='1') as county1 ,(select count(*) from user_view_properties where property_id= a.id and user_id='$user_id') as countyview FROM addproperty as a LEFT JOIN property_type as p ON (p.id = a.project_type_id) LEFT JOIN request_site_visit as r ON (r.property_id = a.id) LEFT JOIN requested_biding_users as r1 ON (r1.propertyID = a.id) LEFT JOIN user_view_properties as v1 ON (v1.property_id = a.id) where ( property_for = 'sale' AND a.user_id <> '$user_id' AND town_name = '$town' AND sector_name='$sector' AND expected_price <='$expected_rate') OR
         ( property_for = 'sale' AND a.user_id <> '$user_id' AND town_name = '$town' AND sector_name='$sector' AND expected_price <='$expected_rate' AND latitude BETWEEN '" . $maxim . "' AND '" . $minim . "' AND   
           longitude BETWEEN '" . $maximy . "' AND '" . $minimy . "') GROUP BY a.id ";    
          
      }else{
          
       $sqlstr = "SELECT a.*,p.typename as typename,p.undercategory as undercategory,(select count(*) from request_site_visit where user_id='$user_id' and property_id= a.id) as county,(select count(*) from requested_biding_users where propertyID= a.id and request_for='bid' and isactive='1') as county1 ,(select count(*) from user_view_properties where property_id= a.id and user_id='$user_id') as countyview FROM addproperty as a LEFT JOIN property_type as p ON (p.id = a.project_type_id) LEFT JOIN request_site_visit as r ON (r.property_id = a.id) LEFT JOIN requested_biding_users as r1 ON (r1.propertyID = a.id) LEFT JOIN user_view_properties as v1 ON (v1.property_id = a.id) where ( property_for = 'sale' AND a.user_id <> '$user_id' AND town_name = '$town' AND expected_price <='$expected_rate') OR
         ( property_for = 'sale' AND a.user_id <> '$user_id' AND town_name = '$town' AND expected_price <='$expected_rate' AND latitude BETWEEN '" . $maxim . "' AND '" . $minim . "' AND   
           longitude BETWEEN '" . $maximy . "' AND '" . $minimy . "') GROUP BY a.id ";    
          
          
      }


        $payments = \Yii::$app->db->createCommand($sqlstr)->queryAll();

        echo json_encode($payments);
        
  }
    }

}
