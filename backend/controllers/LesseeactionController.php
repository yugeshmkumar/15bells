<?php

namespace backend\controllers;

use yii\web\Controller;
use Yii;
use common\models\Property;
use common\models\MyExpectationsajax;
use common\models\User;
use common\models\Addpropertypm;
use common\models\Company;
use common\models\Companynew;
use common\models\CompanyEmp;
use yii\web\Response;
use yii\db\Query;
use yii\filters\AccessControl;

class LesseeactionController extends Controller {

    public function __construct($id, $module, $config = array()) {
        parent::__construct($id, $module, $config);
        $assigndash = \common\models\RbacAuthAssignment::find()->where(['user_id'=>yii::$app->user->identity->id])->one();
	if($assigndash->item_name == "csr_demand"){
		
		$this->layout="csr_layout";
		
	}if($assigndash->item_name == "csr_head"){
		
		$this->layout="csr_layout";
		
	}if($assigndash->item_name == "csr_supply"){
		
		$this->layout="csr_layout";
		
	}

       if($assigndash->item_name == "sales_demand_lessee"){
		
		$this->layout="sales_supply_layout";
		
	}if($assigndash->item_name == "sales_head"){
		
		$this->layout="sales_layout";
		
	}if($assigndash->item_name == "sales_demand_buyer"){
		
		$this->layout="sales_demand_layout";		
	}
if($assigndash->item_name == "sales_supply_seller"){
		
		$this->layout="sales_buying_layout";		
	}
if($assigndash->item_name == "sales_supply_lessor"){
		
		$this->layout="sales_leasing_layout";		
	}
	
    }



    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['login', 'error'],
                        'allow' => true,
                    ],
                    [
                        'actions' => ['index','index1','search','mapproperty2update','mapproperty1update','getpolymyupdate','searchaction','withoutshape','withoutshapebackend','saveprop','deleteprop','viewproperty','petproperty','getfreevisit','bititnow','savemessages','similiarprop','getpolymy','getpolymycsr','mapproperty1','mapproperty1csr','mapproperty2','mapproperty2csr','directitnow'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
           
        ];
    }

    public function actionIndex() {
        return $this->render('index');
    }

     public function actionIndex1() {
        return $this->render('index1');
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

        //$userid = Yii::$app->user->identity->id;
        $hardam = $_POST['hardam'];
        $userid = $_POST['food'];
        date_default_timezone_set("Asia/Calcutta");
        $date = date('Y-m-d H:i:s');
        $user_id = Yii::$app->user->identity->id;
        $querys = CompanyEmp::find()->where(['userid'=>$user_id])->one();
        $assigned_id = $querys->id;
        $payments = \Yii::$app->db->createCommand("SELECT * FROM shortlistproperty where user_id='$userid' and property_id ='$hardam'")->queryAll();


        if ($payments) {
            $insert1 = \Yii::$app->db->createCommand()->delete('shortlistproperty', ['user_id' => $userid, 'property_id' => $hardam])->execute();

            return  '1';
        } else {

            $insert1 = \Yii::$app->db->createCommand()->insert('shortlistproperty', ['user_id' => $userid, 'property_id' => $hardam,'assigned_id'=>$assigned_id, 'created_date' => $date])->execute();
            return '2';
        }

//        $delete = \Yii::$app->db->createCommand()->delete('shortlistProperty', ['user_id' => $userid])->execute();
//        foreach ($newhar as $key => $rat) {
//            $insert1 = \Yii::$app->db->createCommand()->insert('shortlistProperty', ['user_id' => $userid, 'property_id' => $rat, 'created_date' => $date])->execute();
//        }
    }



      public function actionDeleteprop($propertyid) {

        $userid = Yii::$app->user->identity->id;
        date_default_timezone_set("Asia/Calcutta");
        $date = date('Y-m-d H:i:s');


            $insert1 = \Yii::$app->db->createCommand()->delete('shortlistproperty', ['user_id' => $userid, 'property_id' => $propertyid])->execute();
            echo '1';
         
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

//        $this->layout = "newdashboard";
        return $this->render('search');
    }

    public function actionSearchaction() {

//        $this->layout = "newdashboard";
        return $this->render('searchaction');
    }

    public function actionPetproperty($id) {



        $model = new Property();
        $user_id = Yii::$app->user->identity->id;
        if ($id == 'hello') {


            $payments = \Yii::$app->db->createCommand("SELECT a.*,p.typename as typename,(select count(*) from request_site_visit where user_id='$user_id' and property_id= a.id) as county,(select count(*) from requested_biding_users where propertyID= a.id and request_for='bid' and isactive='1') as county1 ,(select count(*) from user_view_properties where property_id= a.id and user_id='$user_id') as countyview FROM addproperty as a LEFT JOIN property_type as p ON (p.id = a.project_type_id) LEFT JOIN request_site_visit as r ON (r.property_id = a.id) LEFT JOIN requested_biding_users as r1 ON (r1.propertyID = a.id) LEFT JOIN user_view_properties as v1 ON (v1.property_id = a.id) where property_for = 'rent' and a.user_id <> '$user_id' GROUP BY a.id  order by id DESC")->queryAll();

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

            $payments = \Yii::$app->db->createCommand("SELECT * FROM addproperty order by asking_rental_price DESC")->queryAll();

            echo json_encode($payments);
        } else if ($val == 'low') {

            $payments = \Yii::$app->db->createCommand("SELECT * FROM addproperty order by asking_rental_price ASC")->queryAll();

            echo json_encode($payments);
        }
    }



    

    public function actionGetfreevisit() {

        date_default_timezone_set("Asia/Calcutta");
        $date = date('Y-m-d H:i:s');
        $hardam = $_POST['hardam'];
         $rantime = $_POST['rantime'];
         $visitmode = $_POST['visitmode'];
        $userid = $_POST['food'];
        $user_id = Yii::$app->user->identity->id;
        $querys = CompanyEmp::find()->where(['userid'=>$user_id])->one();
        $assigned_id = $querys->id;

        $propuserid = Addpropertypm::find('user_id')->where(['id' => $hardam])->andwhere(['status' => 'approved'])->one();

        $checkrole = \common\models\activemode::checkmyrole($userid);
        
       $querys = new Query;
        $querys->select('COUNT(*) as newcount')
                ->from('request_site_visit')
                ->where(['property_id' => $hardam])
                ->andwhere(['user_id' => $userid]);

        $commands = $querys->createCommand();
        $paymentsm = $commands->queryOne();



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
            // echo 'aya';die;
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
                        $my_profile_progress_status->role_id = '4';
                        $my_profile_progress_status->save();


                $trendingadd = \Yii::$app->db->createCommand()->insert('request_site_visit', ['user_id' => $userid, 'property_id' => $hardam,'assigned_to_id'=>$assigned_id,'visit_type'=>$visitmode,'scheduled_time'=>$rantime, 'company_id' => $company_id, 'created_date' => $date])->execute();

  $request_id = Yii::$app->db->lastInsertID;

  $objlocation = \common\models\RequestSiteVisitbin::getsalesidreqvisited($request_id,$userid,4,$propuserid,5);

                echo 1;
                die;
            } else {

                $model3 = Yii::$app->db->createCommand()->update('company', ['free_site_visit' => $new_free_visit], 'id = "' . $company_id . '"')->execute();

                $my_profile_progress_status = new \common\models\MyProfileProgressStatus();
                        $my_profile_progress_status->property_id = $hardam;
                        $my_profile_progress_status->user_id = $userid;
                        $my_profile_progress_status->process_name = 'site_visit_requested';
                        $my_profile_progress_status->process_status = '100';
                        $my_profile_progress_status->role_id = '4';
                        $my_profile_progress_status->save();

                        $trendingadd = \Yii::$app->db->createCommand()->insert('request_site_visit', ['user_id' => $userid, 'property_id' => $hardam,'assigned_to_id'=>$assigned_id,'visit_type'=>$visitmode,'scheduled_time'=>$rantime, 'company_id' => $company_id, 'created_date' => $date])->execute();
                        $request_id = Yii::$app->db->lastInsertID;

                        $objlocation = \common\models\RequestSiteVisitbin::getsalesidreqvisited($request_id,$userid,4,$propuserid,5);

                echo 2;
                die;
            }
        } else if ($checkrole->item_name == "user") {
          
            $model2 = User::find('free_site_visit')->where(['id' => $userid])->andwhere(['status' => '1'])->one();
            if($model2){
                
           
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

                $trendingadd = \Yii::$app->db->createCommand()->insert('request_site_visit', ['user_id' => $userid, 'property_id' => $hardam,'assigned_to_id'=>$assigned_id,'visit_type'=>$visitmode,'scheduled_time'=>$rantime, 'created_date' => $date])->execute();

$request_id = Yii::$app->db->lastInsertID;

$objlocation = \common\models\RequestSiteVisitbin::getsalesidreqvisited($request_id,$userid,4,$propuserid,5);
                echo 1;
                die;
            } else {

                $model3 = Yii::$app->db->createCommand()->update('user', ['free_site_visit' => $new_free_visit], 'id = "' . $userid . '"')->execute();

               $my_profile_progress_status = new \common\models\MyProfileProgressStatus();
                        $my_profile_progress_status->property_id = $hardam;
                        $my_profile_progress_status->user_id = $userid;
                        $my_profile_progress_status->process_name = 'site_visit_requested';
                        $my_profile_progress_status->process_status = '100';
                        $my_profile_progress_status->role_id = '4';
                        $my_profile_progress_status->save();

                        $trendingadd = \Yii::$app->db->createCommand()->insert('request_site_visit', ['user_id' => $userid, 'property_id' => $hardam,'assigned_to_id'=>$assigned_id,'visit_type'=>$visitmode,'scheduled_time'=>$rantime, 'created_date' => $date])->execute();
                        $request_id = Yii::$app->db->lastInsertID;

                        $objlocation = \common\models\RequestSiteVisitbin::getsalesidreqvisited($request_id,$userid,4,$propuserid,5);
                        echo 2;
                die;
            }
       }
                            else{
                            echo 7;die;
                            } 
                                }
                                }
                                else{

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

       // $userid = Yii::$app->user->identity->id;
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
                        $my_profile_progress_status->role_id = '4';
                        $my_profile_progress_status->save();

                        $trendingadd = \Yii::$app->db->createCommand()->insert('requested_biding_users', ['userid' => $userid, 'propertyID' => $propertyid, 'userroleID' => 'lessee', 'request_for' => 'bid',
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
                        $my_profile_progress_status->role_id = '4';
                        $my_profile_progress_status->save();

                    $trendingadd = \Yii::$app->db->createCommand()->insert('requested_biding_users', ['userid' => $userid, 'propertyID' => $propertyid, 'userroleID' => 'lessee', 'request_for' => 'direct',
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



    public function actionSimiliarprop($location,$town,$sector,$areamin,$areamax,$pricemin,$pricemax,$proptype,$propbid) {

    
        $user_id = Yii::$app->user->identity->id;
        date_default_timezone_set("Asia/Calcutta");
        $date = date('Y-m-d H:i:s');        

          
      $query = "SELECT a.*,p.typename as typename,(select count(*) from request_site_visit where user_id='$user_id' and property_id= a.id) as county,(select count(*) from requested_biding_users where propertyID= a.id and request_for='bid' and isactive='1') as county1 ,(select count(*) from user_view_properties where property_id= a.id and user_id='$user_id') as countyview FROM addproperty as a LEFT JOIN property_type as p ON (p.id = a.project_type_id) LEFT JOIN request_site_visit as r ON (r.property_id = a.id) LEFT JOIN requested_biding_users as r1 ON (r1.propertyID = a.id)  LEFT JOIN user_view_properties as v1 ON (v1.property_id = a.id) ";    
      
      $conditions = array();
        
      $conditions[] = "property_for='rent'";        
        
      $conditions[] = "a.user_id <> '$user_id'";
        
        if ($proptype != 'Select Property Type') {
            $conditions[] = "project_type_id = '$proptype'";
        }
        if ($areamin != '' && $areamax !='') {
            $conditions[] = "a.total_plot_area BETWEEN '$areamin' AND '$areamax";
        }
        
        if ($pricemin != '' && $pricemax !='') {
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

//where property_for = 'rent' AND a.user_id <> '$user_id' AND town_name = '$town' AND sector_name='$sector' AND total_plot_area <='$total_area'  GROUP BY a.id
        $sqlstr = $query;
        if (count($conditions) > 0) {
            $sqlstr .= " WHERE " . implode(' AND ', $conditions)." GROUP BY a.id";
        }
      
      
      
        $payments = \Yii::$app->db->createCommand($sqlstr)->queryAll();

        echo json_encode($payments);
    }
    
    
    public function actionWithoutshape($location, $area,$town,$sector,$areamin,$areamax,$pricemin,$pricemax,$proptype,$propbid,$food) {

    
       // $user_id = Yii::$app->user->identity->id;
       $user_id = $food;
       
        date_default_timezone_set("Asia/Calcutta");
        $date = date('Y-m-d H:i:s');
        
//        $query = new Query;
//        $query->select(['usuable_area'])
//                ->from('lessor_expectations')
//                ->where(['id' => $area])
//                ->andwhere(['is_active' => '1']);
//
//        $command = $query->createCommand();
//        $payments = $command->queryOne();
//      
//      $total_area = $payments['usuable_area'];
    

      $trendingadd = \Yii::$app->db->createCommand()->insert('save_searches', ['type'=>'blank','role_type'=>'lessee','user_id' =>$user_id, 'location_name' => $location, 'expectation_id' => $area,'town'=>$town,'sector'=>$sector,'created_date' => $date])->execute();
      
      
          
      $query = "SELECT a.*,p.typename as typename,(select count(*) from request_site_visit where user_id='$user_id' and property_id= a.id) as county,(select count(*) from requested_biding_users where propertyID= a.id and request_for='bid' and isactive='1') as county1 ,(select count(*) from user_view_properties where property_id= a.id and user_id='$user_id') as countyview FROM addproperty as a LEFT JOIN property_type as p ON (p.id = a.project_type_id) LEFT JOIN request_site_visit as r ON (r.property_id = a.id) LEFT JOIN requested_biding_users as r1 ON (r1.propertyID = a.id)  LEFT JOIN user_view_properties as v1 ON (v1.property_id = a.id) ";    
      
      $conditions = array();
        
      $conditions[] = "property_for='rent'";        
        
      $conditions[] = "a.user_id <> '$user_id'";
        
        if ($proptype != 'Select Property Type') {
            $conditions[] = "project_type_id = '$proptype'";
        }
        if ($areamin != '' && $areamax !='') {
            $conditions[] = "a.total_plot_area BETWEEN '$areamin' AND '$areamax";
        }
        
        if ($pricemin != '' && $pricemax !='') {
            $conditions[] = "a.asking_rental_price BETWEEN '$pricemin' AND '$pricemax'";
        }
        
        if ($propbid != 'Select') {
            $conditions[] = "a.request_for = '$propbid'";
        }
        if ($town != '') {
            $conditions[] = "town_name = '$town'";
        }
        if ($sector != '') {
            $conditions[] = "sector_name='$sector' GROUP BY a.id";
        }

//where property_for = 'rent' AND a.user_id <> '$user_id' AND town_name = '$town' AND sector_name='$sector' AND total_plot_area <='$total_area'  GROUP BY a.id
        $sqlstr = $query;
        if (count($conditions) > 0) {
            $sqlstr .= " WHERE " . implode(' AND ', $conditions);
        }
      
      
       
        $payments = \Yii::$app->db->createCommand($sqlstr)->queryAll();
        \common\models\activemode::update_my_profile_progress_status($user_id,"my_search",'100','4');
        echo json_encode($payments);die;
    }
         
      

    public function actionWithoutshapebackend() {

        $length='';
    
            $user_id = $_POST['food'];
        
        date_default_timezone_set("Asia/Calcutta");
        $date = date('Y-m-d H:i:s');
        
        $location = $_POST['location'];
      //  $area     = $_POST['area'];
        $town     = $_POST['town'];
        $sector   = $_POST['sector'];        
        $areamin  = $_POST['areamin'];
        $areamax  = $_POST['areamax'];
        $pricemin = $_POST['pricemin'];
        $pricemax = $_POST['pricemax'];        
        $proptype = $_POST['proptype'];
        $propbid = $_POST['propbid'];
        $availabilitym = $_POST['availabilitym'];
        $start = $_POST['start'];
        $length = $_POST['length'];
    
    //     if (isset(Yii::$app->user->identity->id)){
    //   $trendingadd = \Yii::$app->db->createCommand()->insert('save_search', ['role_type'=>'lessee','user_id' =>$user_id, 'location_name' => $location,'expectation_id'=>$area,'town'=>$town,'sector'=>$sector,'created_date' => $date])->execute();
      
    //     }

    $availabilitym = $_POST['availabilitym'];
            $whichserch = $_POST['whichserch'];
          $foodexpectid = $_POST['foodexpectid'];
    
    
            if($whichserch == 'client'){
    
                $model3 = Yii::$app->db->createCommand()->update('save_searches', ['search_for'=>'text','type'=>'blank','geometry'=>NULL,'location_name'=>$location,'town'=>$town,'sector'=>$sector, 'property_type' => $proptype, 'min_area' => $areamin, 'area' => $areamax, 'min_prices' => $pricemin, 'max_prices' => $pricemax,'created_date'=>$date], 'id = "' . $foodexpectid . '"')->execute();
            }


    $querycount = "SELECT count(*) as totalprop FROM addproperty as a LEFT JOIN property_type as p ON (p.id = a.project_type_id) LEFT JOIN request_site_visit as r ON (r.property_id = a.id) LEFT JOIN requested_biding_users as r1 ON (r1.propertyID = a.id) LEFT JOIN shortlistproperty as sh ON (sh.property_id = a.id)  LEFT JOIN user_view_properties as v1 ON (v1.property_id = a.id)";
   
    $query = "SELECT a.*,p.typename as typename,(select count(*) from request_site_visit where user_id='$user_id' and property_id= a.id) as county,(select count(*) from shortlistproperty where property_id= a.id  and user_id='$user_id') as county1 ,(select count(*) from user_view_properties where property_id= a.id and user_id='$user_id') as countyview FROM addproperty as a LEFT JOIN property_type as p ON (p.id = a.project_type_id) LEFT JOIN request_site_visit as r ON (r.property_id = a.id) LEFT JOIN requested_biding_users as r1 ON (r1.propertyID = a.id) LEFT JOIN shortlistproperty as sh ON (sh.property_id = a.id)  LEFT JOIN user_view_properties as v1 ON (v1.property_id = a.id)";
      
      $conditions = array();
      $conditionsnew = array();
      $conditionsprop = array();
      $conditionsexact = array();
        


            $conditionsprop[] = "( property_for='both'";  
            
            $conditions[] = "property_for='rent' )";  
            
        
      
        
        if ($proptype != '') {
            $conditions[] = "project_type_id IN ($proptype)";
        }
        if ($areamin != '' && $areamax !='') {
           // $conditions[] = "a.super_area BETWEEN '$areamin' AND '$areamax'";

            $conditionsnew[] = "'$areamin' BETWEEN a.min_super_area AND a.super_area";
            $conditionsnew[] = "'$areamax' BETWEEN a.min_super_area AND a.super_area";
            $conditionsexact[] = "a.super_area BETWEEN '$areamin' AND '$areamax'";

        }
        
        if ($pricemin != '' && $pricemax !='') {
            $conditions[] = "a.asking_rental_price BETWEEN '$pricemin' AND '$pricemax'";
        }

        if ($propbid != '') {
            $conditions[] = "a.request_for = '$propbid'";
        }
        if ($availabilitym != '') {
            $conditions[] = "a.availability  = '$availabilitym'";
        }
        
       
        if ($town != '') {
            $conditions[] = "town_name = '$town'";
        }
        if ($sector != '') {
            $conditions[] = "sector_name='$sector' ";
        }

        $conditions[] = "a.status='approved'";
        $conditions[] = "a.user_id <> '$user_id'";


        $sqlstr = $query;
        $sqlstrcount =  $querycount;

        if ((count($conditions) > 0) && (count($conditionsnew) == 0)) {

            $sqlstrcount .= " WHERE " . implode(' AND ', $conditionsprop)." OR ". implode(' AND ', $conditions)."";
            $paymentscount = \Yii::$app->db->createCommand($sqlstrcount)->queryAll();
            $totalprop  =  $paymentscount[0]['totalprop'];

            if($totalprop < $length){

                $length = $totalprop;
            }
        }

        if ((count($conditions) > 0) && (count($conditionsnew) == 0)) {

           
          
            $sqlstr .= " WHERE " . implode(' AND ', $conditionsprop)." OR ". implode(' AND ', $conditions)." GROUP BY a.id order By a.id asc";

        }



        if ((count($conditions) > 0) && (count($conditionsnew) > 0)) {

            

            $sqlstrcount .= " WHERE "  . implode(' AND ', $conditionsprop)." OR ". implode(' AND ', $conditions)." AND (CASE WHEN a.min_super_area IS NOT NULL THEN ( ".implode(' OR ', $conditionsnew).") ELSE (". implode(' AND ', $conditionsexact).") END )";
            $paymentscount = \Yii::$app->db->createCommand($sqlstrcount)->queryAll();
            $totalprop  =  $paymentscount[0]['totalprop'];

            if($totalprop < $length){

                $length = $totalprop;
            }
        }

        if ((count($conditions) > 0) && (count($conditionsnew) > 0)) {
           

            $sqlstr .= " WHERE "  . implode(' AND ', $conditionsprop)." OR ". implode(' AND ', $conditions)." AND ( CASE WHEN a.min_super_area IS NOT NULL THEN ( ".implode(' OR ', $conditionsnew).") ELSE (". implode(' AND ', $conditionsexact).") END ) GROUP BY a.id order By a.id asc limit $start,$length";

        }
      
        // echo $sqlstr;die;
      
        $payments['datas'] = \Yii::$app->db->createCommand($sqlstr)->queryAll();    

        

       
        $payments['counts'] = $totalprop;

        $payments['start']  = $_POST['start'];
        $payments['lengths'] = $length;

        // $nestedarray['count'] = $totalprop;
        // $nestedarray['datas'] = $payments;

        //  echo '<pre>';print_r($payments);die;

       return json_encode($payments);
    }



     public function actionWithoutshapebackend1($location,$foodexpectid, $whichserch, $area,$town,$sector,$areamin,$areamax,$pricemin,$pricemax,$proptype,$propbid,$food) {

    
       // $user_id = Yii::$app->user->identity->id;
         $user_id = $food;
        date_default_timezone_set("Asia/Calcutta");
        $date = date('Y-m-d H:i:s');
         
        if($whichserch == 'client'){
       $trendingadd = \common\models\SaveSearch::find()->where(['id' => $foodexpectid])->one();
        
        $trendingadd->location_name = $location;
        $trendingadd->town = $town;
        $trendingadd->sector = $sector;
        $trendingadd->updated_date = $date;
        $trendingadd->save();
      }
        
      $query = "SELECT a.*,p.typename as typename,p.typename as typename,(select count(*) from shortlistproperty where property_id= a.id and user_id='$user_id') as countyshortlist,(select count(*) from request_site_visit where user_id='$user_id' and property_id= a.id) as county,(select count(*) from requested_biding_users where propertyID= a.id and request_for='bid' and isactive='1') as county1 ,(select count(*) from user_view_properties where property_id= a.id and user_id='$user_id') as countyview FROM addproperty as a LEFT JOIN property_type as p ON (p.id = a.project_type_id) LEFT JOIN request_site_visit as r ON (r.property_id = a.id) LEFT JOIN requested_biding_users as r1 ON (r1.propertyID = a.id)  LEFT JOIN user_view_properties as v1 ON (v1.property_id = a.id) ";    
      
      $conditions = array();
        
      $conditions[] = "property_for='rent'";        
        
      $conditions[] = "a.user_id <> '$user_id'";
        
        if ($proptype != 'Select Property Type') {
            $conditions[] = "project_type_id = '$proptype'";
        }
        if ($areamin != '' && $areamax !='') {
            $conditions[] = "a.super_area BETWEEN '$areamin' AND '$areamax";
        }
        
        if ($pricemin != '' && $pricemax !='') {
            $conditions[] = "a.asking_rental_price BETWEEN '$pricemin' AND '$pricemax'";
        }
        
        if ($propbid != 'Select') {
            $conditions[] = "a.request_for = '$propbid'";
        }
        if ($town != '') {
            $conditions[] = "town_name = '$town'";
        }
        if ($sector != '') {
            $conditions[] = "sector_name='$sector' GROUP BY a.id";
        }

//where property_for = 'rent' AND a.user_id <> '$user_id' AND town_name = '$town' AND sector_name='$sector' AND total_plot_area <='$total_area'  GROUP BY a.id
        $sqlstr = $query;

        if (count($conditions) > 0) {
            $sqlstr .= " WHERE " . implode(' AND ', $conditions);
        }
      
      
        $payment = \Yii::$app->db->createCommand($sqlstr)->queryAll();
        $data = array();
        
foreach($payment as $payments){
    $blues = 0;
        $row_array['id']=$payments['id'];
        $row_array['user_id']=$payments['user_id'];
        $row_array['role_id']=$payments['role_id'];
        $row_array['project_name']=$payments['project_name'];
        $row_array['property_for']=$payments['property_for'];
        $row_array['project_type_id']=$payments['project_type_id'];
        $row_array['request_for']=$payments['request_for'];
        $row_array['featured_image']=$payments['featured_image'];
        $row_array['featured_video']=$payments['featured_video'];
        $row_array['city']=$payments['city'];
        $row_array['locality']=$payments['locality'];
        $row_array['town_name']=$payments['town_name'];
        $row_array['sector_name']=$payments['sector_name'];
        $row_array['address']=$payments['address'];
        $row_array['longitude']=$payments['longitude'];
        $row_array['latitude']=$payments['latitude'];
        $row_array['total_plot_area']=$payments['total_plot_area'];
        $row_array['plot_unit']=$payments['plot_unit'];
        $row_array['expected_price']=$payments['expected_price'];
        $row_array['asking_rental_price']=$payments['asking_rental_price'];
        $row_array['price_sq_ft']=$payments['price_sq_ft'];
        $row_array['price_acres']=$payments['price_acres'];
        $row_array['price_negotiable']=$payments['price_negotiable'];
        $row_array['present_status']=$payments['present_status'];
        $row_array['jurisdiction_development']=$payments['jurisdiction_development'];
        $row_array['shed_RCC']=$payments['shed_RCC'];
        $row_array['maintenance_cost']=$payments['maintenance_cost'];
        $row_array['maintenance_cost_unit']=$payments['maintenance_cost_unit'];
        $row_array['maintenance_by']=$payments['maintenance_by'];
        $row_array['annual_dues_payable']=$payments['annual_dues_payable'];
        $row_array['expected_rental']=$payments['expected_rental'];
        $row_array['membership_charge']=$payments['membership_charge'];
        $row_array['availability']=$payments['availability'];
        $row_array['available_from']=$payments['available_from'];
        $row_array['available_date']=$payments['available_date'];
        $row_array['age_of_property']=$payments['age_of_property'];
        $row_array['possesion_by']=$payments['possesion_by'];
        $row_array['rental_type']=$payments['rental_type'];
        $row_array['ownership']=$payments['ownership'];
        $row_array['ownership_status']=$payments['ownership_status'];
        $row_array['facing']=$payments['facing'];
        $row_array['FAR_approval']=$payments['FAR_approval'];
        $row_array['LOAN_taken']=$payments['LOAN_taken'];
        $row_array['super_area']=$payments['super_area'];
        $row_array['super_unit']=$payments['super_unit'];
        $row_array['carpet_area']=$payments['carpet_area'];
        $row_array['carpet_unit']=$payments['carpet_unit'];
        $row_array['total_floors']=$payments['total_floors'];
        $row_array['property_on_floor']=$payments['property_on_floor'];
        $row_array['configuration']=$payments['configuration'];
        $row_array['floors_allowed_construction']=$payments['floors_allowed_construction'];
        $row_array['bedrooms']=$payments['bedrooms'];
        $row_array['bathrooms']=$payments['bathrooms'];
        $row_array['balconies']=$payments['balconies'];
        $row_array['pooja_room']=$payments['pooja_room'];
        $row_array['study_room']=$payments['study_room'];
        $row_array['servant_room']=$payments['servant_room'];
        $row_array['other_room']=$payments['other_room'];
        $row_array['furnished_status']=$payments['furnished_status'];
        $row_array['parking']=$payments['parking'];
        $row_array['is_active']=$payments['is_active'];
        $row_array['created_date']=$payments['created_date'];
        $row_array['status']=$payments['status'];
        $row_array['typename']=$payments['typename'];
        $row_array['county']=$payments['county'];
        $row_array['county1']=$payments['county1'];
        $row_array['countyview']=$payments['countyview'];
        $row_array['countyshortlist']=$payments['countyshortlist'];
        //$row_array['percent']=$percent;
$lessorexpec = \common\models\LessorExpectations::find()->where(['property_id' => $payments['id']])->andwhere(['user_id'=>$payments['user_id']])->one();
       if($lessorexpec){
        $interest_security = $lessorexpec->interest_security;
        $agreement = $lessorexpec->agreement;
        $lease_tenure = $lessorexpec->lease_tenure;
        $lock_in_period = $lessorexpec->lock_in_period;
        $escalation_value = $lessorexpec->escalation_value;
        $escalation_month = $lessorexpec->escalation_month;
        $stamp_duty_lessor = $lessorexpec->stamp_duty_lessor;
        $stamp_duty_lessee = $lessorexpec->stamp_duty_lessee;
        $lesseeexpec = \common\models\LessorExpectations::find()->where(['id' => $area])->one();
         if($lesseeexpec){
        $interest_security1 = $lesseeexpec->interest_security;
        $agreement1 = $lesseeexpec->agreement;
        $lease_tenure1 = $lesseeexpec->lease_tenure;
        $lock_in_period1 = $lesseeexpec->lock_in_period;
        $escalation_value1= $lesseeexpec->escalation_value;
        $escalation_month1 = $lesseeexpec->escalation_month;
        $stamp_duty_lessor1 = $lesseeexpec->stamp_duty_lessor;
        $stamp_duty_lessee1 = $lesseeexpec->stamp_duty_lessee;
        
        
        if($interest_security != '' && $interest_security1 !=''){
            if($interest_security == $interest_security1){
                $blues = $blues + 1;
            }
        }
        if($agreement != '' && $agreement1 !=''){
            if($agreement == $agreement1){
                $blues = $blues + 1;
            }
        }
        if($lease_tenure != '' && $lease_tenure1 !=''){
            if($lease_tenure == $lease_tenure1){
                $blues = $blues + 1;
            }
        }
        if($lock_in_period != '' && $lock_in_period1 !=''){
            if($lock_in_period == $lock_in_period1){
                $blues = $blues + 1;
            }
        }
        if($escalation_value != '' && $escalation_value1 !=''){
            if($escalation_value == $escalation_value1){
                $blues = $blues + 1;
            }
        }
        if($escalation_month != '' && $escalation_month1 !=''){
            if($escalation_month == $escalation_month1){
                $blues = $blues + 1;
            }
        }
        if($stamp_duty_lessor != '' && $stamp_duty_lessor1 !=''){
            if($stamp_duty_lessor == $stamp_duty_lessor1){
                $blues = $blues + 1;
            }
        }
        if($stamp_duty_lessee != '' && $stamp_duty_lessee1 !=''){
            if($stamp_duty_lessee == $stamp_duty_lessee1){
                $blues = $blues + 1;
            }
        } 
     
        
        //$new_width = ($totalblues / 100) * $totaloutof;
        //$percent = round($new_width);        
        
        
        
        }

    } 
        $totalblues = $blues;
        $totaloutof = 8;
        $row_array['percent']= $totalblues.' Out of '.$totaloutof.' Match';
        $data['animals'][] = $row_array;
}


	echo json_encode($data);die;


    }

  
         
         
         
    public function actionGetpolymycsr($location,$maxi, $mini, $maxiy, $miniy, $shapes, $town,$sector, $newpath, $area,$areamin,$areamax,$pricemin,$pricemax,$proptype,$propbid,$food) {


        $user_id = $food;
        date_default_timezone_set("Asia/Calcutta");
        $date = date('Y-m-d H:i:s');


        $trendingadd = \Yii::$app->db->createCommand()->insert('save_searches', ['role_type'=>'lessee','type' => $shapes, 'geometry' => $newpath, 'user_id' =>$user_id, 'location_name' => $location,'expectation_id' => $area,'town'=>$town,'sector'=>$sector,
                    'created_date' => $date])->execute();
        
        
        if($town == ''){
            
           
           $query = "SELECT a.*,p.typename as typename,(select count(*) from shortlistproperty where property_id= a.id and user_id='$user_id') as countyshortlist,(select count(*) from request_site_visit where user_id='$user_id' and property_id= a.id) as county,(select count(*) from requested_biding_users where propertyID= a.id and request_for='bid' and isactive='1') as county1 ,(select count(*) from user_view_properties where property_id= a.id and user_id='$user_id') as countyview FROM addproperty as a LEFT JOIN property_type as p ON (p.id = a.project_type_id) LEFT JOIN request_site_visit as r ON (r.property_id = a.id) LEFT JOIN requested_biding_users as r1 ON (r1.propertyID = a.id)  LEFT JOIN user_view_properties as v1 ON (v1.property_id = a.id) LEFT JOIN shortlistproperty as z ON (z.property_id = a.id)";
           
                        $conditions = array();

                        $conditions[] = "property_for='rent'";        

                        $conditions[] = "a.user_id <> '$user_id'";

                        if ($proptype != 'Select Property Type') {
                         $conditions[] = "project_type_id = '$proptype'";
                        }
                        
                        if ($propbid != 'Select') {
                        $conditions[] = "a.request_for = '$propbid'";
                        }
                        
                        if ($areamin != '' && $areamax !='') {
                         $conditions[] = "a.total_plot_area BETWEEN '$areamin' AND '$areamax";
                        }

                        if ($pricemin != '' && $pricemax !='') {
                         $conditions[] = "a.asking_rental_price BETWEEN '$pricemin' AND '$pricemax'";    
                         }
                        
                         $conditions[] = "latitude BETWEEN '$mini' AND '$maxi'";
                        
                         $conditions[] = "longitude BETWEEN '$miniy' AND '$maxiy'  GROUP BY a.id";                        
                       

                        $sqlstr = $query;
                        if (count($conditions) > 0) {
                         $sqlstr .= " WHERE " . implode(' AND ', $conditions). "GROUP BY a.id";
                        }

            
        }else{
            
       
            
//        $query = "SELECT a.*,p.typename as typename,(select count(*) from request_site_visit where user_id='$user_id' and property_id= a.id) as county,(select count(*) from requested_biding_users where propertyID= a.id and request_for='bid' and isactive='1') as county1 ,(select count(*) from user_view_properties where property_id= a.id and user_id='$user_id') as countyview FROM addproperty as a LEFT JOIN property_type as p ON (p.id = a.project_type_id) LEFT JOIN request_site_visit as r ON (r.property_id = a.id) LEFT JOIN requested_biding_users as r1 ON (r1.propertyID = a.id)  LEFT JOIN user_view_properties as v1 ON (v1.property_id = a.id) where ( property_for = 'rent' AND a.user_id <> '$user_id' AND town_name = '$town' AND sector_name='$sector' AND total_plot_area <='$total_area') OR
//                    (property_for = 'rent' AND a.user_id <> '$user_id' AND town_name = '$town' AND sector_name='$sector' AND total_plot_area <='$total_area' AND latitude BETWEEN '" . $mini . "' AND '" . $maxi . "' AND  
//                     longitude BETWEEN '" . $miniy . "' AND '" . $maxiy . "') GROUP BY a.id"; 
        $query = "SELECT a.*,p.typename as typename,(select count(*) from shortlistproperty where property_id= a.id and user_id='$user_id') as countyshortlist,(select count(*) from request_site_visit where user_id='$user_id' and property_id= a.id) as county,(select count(*) from requested_biding_users where propertyID= a.id and request_for='bid' and isactive='1') as county1 ,(select count(*) from user_view_properties where property_id= a.id and user_id='$user_id') as countyview FROM addproperty as a LEFT JOIN property_type as p ON (p.id = a.project_type_id) LEFT JOIN request_site_visit as r ON (r.property_id = a.id) LEFT JOIN requested_biding_users as r1 ON (r1.propertyID = a.id)  LEFT JOIN user_view_properties as v1 ON (v1.property_id = a.id) LEFT JOIN shortlistproperty as z ON (z.property_id = a.id)"; 
        
        
                  $conditions = array();

                        $conditions[] = "property_for='rent'";        

                        $conditions[] = "a.user_id <> '$user_id'";

                        if ($proptype != 'Select Property Type') {
                         $conditions[] = "project_type_id = '$proptype'";
                        }
                        if ($propbid != 'Select') {
                        $conditions[] = "a.request_for = '$propbid'";
                        }
                        if ($areamin != '' && $areamax !='') {
                         $conditions[] = "a.total_plot_area BETWEEN '$areamin' AND '$areamax";
                        }

                        if ($pricemin != '' && $pricemax !='') {
                         $conditions[] = "a.asking_rental_price BETWEEN '$pricemin' AND '$pricemax'";    
                         }
                         
                         if ($town != '') {
                        $conditions[] = "town_name = '$town'";
                        }
                        if ($sector != '') {
                        $conditions[] = "sector_name='$sector'";
                        }                       
                        

                        $sqlstr = $query;
                        if (count($conditions) > 0) {
                         $sqlstr .= " WHERE " . implode(' AND ', $conditions). "GROUP BY a.id";
                        }
            
            
         
        }

        $payments = \Yii::$app->db->createCommand($sqlstr)->queryAll();
        \common\models\activemode::update_my_profile_progress_status($user_id,"my_search",'100','4');
        echo json_encode($payments);die;
    }
    
    
    public function actionGetpolymyupdate() {


        $user_id = Yii::$app->user->identity->id;
        date_default_timezone_set("Asia/Calcutta");
        $date = date('Y-m-d H:i:s');
      // echo '<pre>';print_r($_POST['town']);die;
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
        $whichserch = $_POST['whichserch'];

 if($whichserch == 'client'){
        $model3 = Yii::$app->db->createCommand()->update('save_search', ['geometry' => $newpath,'location_name'=>$location,'town'=>$town,'sector'=>$sector,'created_date'=>$date], 'id = "' . $area . '"')->execute();
 }

            $query = "SELECT a.*,p.typename as typename,p.undercategory as undercategory,(select count(*) from request_site_visit where user_id='$user_id' and property_id= a.id) as county,(select count(*) from requested_biding_users where propertyID= a.id and request_for='bid' and isactive='1') as county1 ,(select count(*) from user_view_properties where property_id= a.id and user_id='$user_id') as countyview FROM addproperty as a LEFT JOIN property_type as p ON (p.id = a.project_type_id) LEFT JOIN request_site_visit as r ON (r.property_id = a.id) LEFT JOIN requested_biding_users as r1 ON (r1.propertyID = a.id) LEFT JOIN user_view_properties as v1 ON (v1.property_id = a.id)";


            $conditions = array();

            $conditions[] = "property_for='rent'";

            

            if ($proptype != 'Select Property Type') {
                $conditions[] = "project_type_id = '$proptype'";
            }

            if ($propbid != 'Select') {
                $conditions[] = "a.request_for = '$propbid'";
            }

            if ($areamin != '' && $areamax != '') {
                $conditions[] = "a.total_plot_area BETWEEN '$areamin' AND '$areamax";
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



         
    public function actionGetpolymy() {


        
        $user_id = $_POST['food'];
     
        date_default_timezone_set("Asia/Calcutta");
        $date = date('Y-m-d H:i:s');

       
       
        $town  = $_POST['town'];
        $sector  = $_POST['sector'];
        $newpath = $_POST['newpath'];
        $area = $_POST['area'];        
        $areamin = $_POST['areamin'];
        $areamax  = $_POST['areamax'];
        $pricemin  = $_POST['pricemin'];
        $pricemax  = $_POST['pricemax'];
        $proptype  = $_POST['proptype'];
        $propbid  = $_POST['propbid'];
        $location = $_POST['location'];
        $availabilitym = $_POST['availabilitym'];

        // if (isset(Yii::$app->user->identity->id)){
        // $trendingadd = \Yii::$app->db->createCommand()->insert('save_search', ['role_type'=>'lessee','type' => 'polygon', 'geometry' => $newpath, 'user_id' =>$user_id, 'location_name' => $location,'expectation_id'=>$area,'town'=>$town,'sector'=>$sector,
        //             'created_date' => $date])->execute();
        
        // }
        $availabilitym = $_POST['availabilitym'];
            $whichserch = $_POST['whichserch'];
            $foodexpectid = $_POST['foodexpectid'];
    
    
            if($whichserch == 'client'){
    
                $model3 = Yii::$app->db->createCommand()->update('save_searches', ['search_for'=>'google','type'=>'polygon','geometry' => $newpath,'location_name'=>$location,'town'=>$town,'sector'=>$sector, 'property_type' => $proptype, 'min_area' => $areamin, 'area' => $areamax, 'min_prices' => $pricemin, 'max_prices' => $pricemax,'created_date'=>$date], 'id = "' . $foodexpectid . '"')->execute();
    
               
            }
            
 
        $query = "SELECT a.*,p.typename as typename,(select count(*) from request_site_visit where user_id='$user_id' and property_id= a.id) as county,(select count(*) from shortlistproperty where property_id= a.id and user_id='$user_id') as county1 ,(select count(*) from user_view_properties where property_id= a.id and user_id='$user_id') as countyview FROM addproperty as a LEFT JOIN property_type as p ON (p.id = a.project_type_id) LEFT JOIN request_site_visit as r ON (r.property_id = a.id) LEFT JOIN requested_biding_users as r1 ON (r1.propertyID = a.id)  LEFT JOIN user_view_properties as v1 ON (v1.property_id = a.id)"; 
        
        
        $conditions = array();
        $conditionsnew = array();
        $conditionsprop = array();
        $conditionsexact = array();

          
                        
            $conditionsprop[] = "( property_for='both'";  
            
            $conditions[] = "property_for='rent' )";        

                        

                        if ($proptype != 'Property Type') {
                         $conditions[] = "project_type_id = '$proptype'";
                        }
                        if ($propbid != 'Select') {
                        $conditions[] = "a.request_for = '$propbid'";
                        }
                        if ($areamin != '' && $areamax !='') {
                            $conditionsnew[] = "'$areamin' BETWEEN a.min_super_area AND a.super_area";
                            $conditionsnew[] = "'$areamax' BETWEEN a.min_super_area AND a.super_area";
                            $conditionsexact[] = "a.super_area BETWEEN '$areamin' AND '$areamax'";

                        }

                        if ($pricemin != '' && $pricemax !='') {
                         $conditions[] = "a.asking_rental_price BETWEEN '$pricemin' AND '$pricemax'";    
                         }
                         
                         if ($town != '') {
                        $conditions[] = "town_name = '$town'";
                        }
                        if ($sector != '') {
                        $conditions[] = "sector_name='$sector'";
                        }   
                        if ($availabilitym != '') {
                            $conditions[] = "a.availability  = '$availabilitym'";
                        }         

                        $conditions[] = "a.status='approved'";
                        $conditions[] = "a.user_id <> '$user_id'";

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
    
    public function actionGetpolymy12($location,$maxi, $mini, $maxiy, $miniy,$foodexpectid, $whichserch, $shapes, $town,$sector, $newpath, $area,$areamin,$areamax,$pricemin,$pricemax,$proptype,$propbid,$food) {


        $user_id = $food;
        date_default_timezone_set("Asia/Calcutta");
        $date = date('Y-m-d H:i:s');


//        $trendingadd = \Yii::$app->db->createCommand()->insert('save_search', ['role_type'=>'lessee','type' => $shapes, 'geometry' => $newpath, 'user_id' =>$user_id, 'location_name' => $town,'expectation_id'=>$area,'town'=>$town,'sector'=>$sector,
//                    'created_date' => $date])->execute();
if($whichserch == 'client'){
    $trendingadd = \Yii::$app->db->createCommand()->insert('save_search', ['role_type' => 'lessee', 'type' => $shapes, 'geometry' => $newpath, 'user_id' => $user_id, 'location_name' => $location, 'expectation_id' => $area, 'town' => $town, 'sector' => $sector,
    'created_date' => $date])->execute();
}
        
        
        if($town == ''){
            
           
           $query = "SELECT a.*,p.typename as typename,(select count(*) from shortlistproperty where property_id= a.id and user_id='$user_id') as countyshortlist,(select count(*) from request_site_visit where user_id='$user_id' and property_id= a.id) as county,(select count(*) from requested_biding_users where propertyID= a.id and request_for='bid' and isactive='1') as county1 ,(select count(*) from user_view_properties where property_id= a.id and user_id='$user_id') as countyview FROM addproperty as a LEFT JOIN property_type as p ON (p.id = a.project_type_id) LEFT JOIN request_site_visit as r ON (r.property_id = a.id) LEFT JOIN requested_biding_users as r1 ON (r1.propertyID = a.id)  LEFT JOIN user_view_properties as v1 ON (v1.property_id = a.id) LEFT JOIN shortlistproperty as z ON (z.property_id = a.id)";
           
                        $conditions = array();

                        $conditions[] = "property_for='rent'";        

                        $conditions[] = "a.user_id <> '$user_id'";

                        if ($proptype != 'Select Property Type') {
                         $conditions[] = "project_type_id = '$proptype'";
                        }
                        
                        if ($propbid != 'Select') {
                        $conditions[] = "a.request_for = '$propbid'";
                        }
                        
                        if ($areamin != '' && $areamax !='') {
                         $conditions[] = "a.total_plot_area BETWEEN '$areamin' AND '$areamax";
                        }

                        if ($pricemin != '' && $pricemax !='') {
                         $conditions[] = "a.asking_rental_price BETWEEN '$pricemin' AND '$pricemax'";    
                         }
                        
                         $conditions[] = "latitude BETWEEN '$mini' AND '$maxi'";
                        
                         $conditions[] = "longitude BETWEEN '$miniy' AND '$maxiy'  GROUP BY a.id";                        
                       

                        $sqlstr = $query;
                        if (count($conditions) > 0) {
                         $sqlstr .= " WHERE " . implode(' AND ', $conditions). "GROUP BY a.id";
                        }

            
        }else{
            
       
            
//        $query = "SELECT a.*,p.typename as typename,(select count(*) from request_site_visit where user_id='$user_id' and property_id= a.id) as county,(select count(*) from requested_biding_users where propertyID= a.id and request_for='bid' and isactive='1') as county1 ,(select count(*) from user_view_properties where property_id= a.id and user_id='$user_id') as countyview FROM addproperty as a LEFT JOIN property_type as p ON (p.id = a.project_type_id) LEFT JOIN request_site_visit as r ON (r.property_id = a.id) LEFT JOIN requested_biding_users as r1 ON (r1.propertyID = a.id)  LEFT JOIN user_view_properties as v1 ON (v1.property_id = a.id) where ( property_for = 'rent' AND a.user_id <> '$user_id' AND town_name = '$town' AND sector_name='$sector' AND total_plot_area <='$total_area') OR
//                    (property_for = 'rent' AND a.user_id <> '$user_id' AND town_name = '$town' AND sector_name='$sector' AND total_plot_area <='$total_area' AND latitude BETWEEN '" . $mini . "' AND '" . $maxi . "' AND  
//                     longitude BETWEEN '" . $miniy . "' AND '" . $maxiy . "') GROUP BY a.id"; 
        $query = "SELECT a.*,p.typename as typename,(select count(*) from shortlistproperty where property_id= a.id and user_id='$user_id') as countyshortlist,(select count(*) from request_site_visit where user_id='$user_id' and property_id= a.id) as county,(select count(*) from requested_biding_users where propertyID= a.id and request_for='bid' and isactive='1') as county1 ,(select count(*) from user_view_properties where property_id= a.id and user_id='$user_id') as countyview FROM addproperty as a LEFT JOIN property_type as p ON (p.id = a.project_type_id) LEFT JOIN request_site_visit as r ON (r.property_id = a.id) LEFT JOIN requested_biding_users as r1 ON (r1.propertyID = a.id)  LEFT JOIN user_view_properties as v1 ON (v1.property_id = a.id) LEFT JOIN shortlistproperty as z ON (z.property_id = a.id)"; 
        
        
                  $conditions = array();

                        $conditions[] = "property_for='rent'";        

                        $conditions[] = "a.user_id <> '$user_id'";

                        if ($proptype != 'Select Property Type') {
                         $conditions[] = "project_type_id = '$proptype'";
                        }
                        if ($propbid != 'Select') {
                        $conditions[] = "a.request_for = '$propbid'";
                        }
                        if ($areamin != '' && $areamax !='') {
                         $conditions[] = "a.total_plot_area BETWEEN '$areamin' AND '$areamax";
                        }

                        if ($pricemin != '' && $pricemax !='') {
                         $conditions[] = "a.asking_rental_price BETWEEN '$pricemin' AND '$pricemax'";    
                         }
                         
                         if ($town != '') {
                        $conditions[] = "town_name = '$town'";
                        }
                        if ($sector != '') {
                        $conditions[] = "sector_name='$sector'";
                        }                       
                        

                        $sqlstr = $query;
                        if (count($conditions) > 0) {
                         $sqlstr .= " WHERE " . implode(' AND ', $conditions). "GROUP BY a.id";
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

    public function actionMapproperty1csr($location,$center, $shapes, $town,$sector, $northeast, $southwest, $latcenter, $longcenter, $totalradius, $area,$areamin,$areamax,$pricemin,$pricemax,$proptype,$propbid,$food) {

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
       

        $trendingadd = \Yii::$app->db->createCommand()->insert('save_searches', ['role_type'=>'lessee','type' => $shapes, 'geometry' => '"'.$center.'"', 'radius' => $range, 'user_id' => $user_id, 'location_name' => $location,'expectation_id' => $area,'town'=>$town,'sector'=>$sector,
                    'created_date' => $date])->execute();
        
//        if($whichserch == 'client'){
//       $trendingadd = \common\models\SaveSearch::find()->where(['id' => $foodexpectid])->one();
//        
//        $trendingadd->location_name = $location;
//        $trendingadd->town = $town;
//        $trendingadd->sector = $sector;
//        $trendingadd->updated_date = $date;
//        $trendingadd->save();
//      }
           
            // Find Max - Min Lat / Long for Radius and zero point and query  
            $lat_range = $range / 69.172;
            $lon_range = abs($range / (cos($latcenter) * 69.172));
            $min_lat = number_format($latcenter - $lat_range, "4", ".", "");
            $max_lat = number_format($latcenter + $lat_range, "4", ".", "");
            $min_lon = number_format($longcenter - $lon_range, "4", ".", "");
            $max_lon = number_format($longcenter + $lon_range, "4", ".", "");
            
            
            
       if($town == ''){
           
           
           $rows = array();
           $query = "SELECT a.*,p.typename as typename,(select count(*) from shortlistproperty where property_id= a.id and user_id='$user_id') as countyshortlist,(select count(*) from request_site_visit where user_id='$user_id' and property_id= a.id) as county,(select count(*) from requested_biding_users where propertyID= a.id and request_for='bid' and isactive='1') as county1 ,(select count(*) from user_view_properties where property_id= a.id and user_id='$user_id') as countyview FROM addproperty as a LEFT JOIN property_type as p ON (p.id = a.project_type_id) LEFT JOIN request_site_visit as r ON (r.property_id = a.id) LEFT JOIN requested_biding_users as r1 ON (r1.propertyID = a.id) LEFT JOIN user_view_properties as v1 ON (v1.property_id = a.id) LEFT JOIN shortlistproperty as z ON (z.property_id = a.id)";
          
          
           $conditions = array();

                        $conditions[] = "property_for='rent'"; 

                        if ($proptype != 'Select Property Type') {
                         $conditions[] = "project_type_id = '$proptype'";
                        }
                        
                        if ($propbid != 'Select') {
                        $conditions[] = "a.request_for = '$propbid'";
                        }
                        
                        if ($areamin != '' && $areamax !='') {
                         $conditions[] = "a.total_plot_area BETWEEN '$areamin' AND '$areamax";
                        }

                        if ($pricemin != '' && $pricemax !='') {
                         $conditions[] = "a.asking_rental_price BETWEEN '$pricemin' AND '$pricemax'";    
                         }
                         
                         $conditions[] = "a.user_id <> '$user_id'  GROUP BY a.id";
                        
                        

                        $sqlstr = $query;
                        if (count($conditions) > 0) {
                         $sqlstr .= " WHERE " . implode(' AND ', $conditions);
                        }
          
           $payments = \Yii::$app->db->createCommand($sqlstr)->queryAll();        
           
           $count = 0;
           
          
          foreach($payments  as $payment ){
              
              
              $latitudeFrom = $payment['latitude'];
              $longitudeFrom = $payment['longitude'];
              $propid = $payment['id'];
              
              $objlocation = \common\models\Addproperty::getCircleDistance($latitudeFrom,$longitudeFrom,$latitudeTo,$longitudeTo);
              
               if ($objlocation < $range) {
                   
                   $count += 1;
                    
           $sqlstr = "SELECT a.*,p.typename as typename,(select count(*) from shortlistproperty where property_id= a.id and user_id='$user_id') as countyshortlist,(select count(*) from request_site_visit where user_id='$user_id' and property_id= a.id) as county,(select count(*) from requested_biding_users where propertyID= a.id and request_for='bid' and isactive='1') as county1 ,(select count(*) from user_view_properties where property_id= a.id and user_id='$user_id') as countyview FROM addproperty as a LEFT JOIN property_type as p ON (p.id = a.project_type_id) LEFT JOIN request_site_visit as r ON (r.property_id = a.id) LEFT JOIN requested_biding_users as r1 ON (r1.propertyID = a.id) LEFT JOIN user_view_properties as v1 ON (v1.property_id = a.id) LEFT JOIN shortlistproperty as z ON (z.property_id = a.id) where 
                       a.id='$propid' GROUP BY a.id";
          
           $paymentst = \Yii::$app->db->createCommand($sqlstr)->queryOne();
                   
             $rows[] = $paymentst;                       
               }
              
          }
          
          
          //echo $count;
          \common\models\activemode::update_my_profile_progress_status($user_id,"my_search",'100','4');
            echo json_encode($rows);die;
           
           
        }else{
            
          
              
//          $sqlstr = "SELECT a.*,p.typename as typename,(select count(*) from request_site_visit where user_id='$user_id' and property_id= a.id) as county,(select count(*) from requested_biding_users where propertyID= a.id and request_for='bid' and isactive='1') as county1 ,(select count(*) from user_view_properties where property_id= a.id and user_id='$user_id') as countyview FROM addproperty as a LEFT JOIN property_type as p ON (p.id = a.project_type_id) LEFT JOIN request_site_visit as r ON (r.property_id = a.id) LEFT JOIN requested_biding_users as r1 ON (r1.propertyID = a.id)  LEFT JOIN user_view_properties as v1 ON (v1.property_id = a.id) where ( property_for = 'rent' AND town_name = '$town' AND sector_name='$sector' AND a.user_id <> '$user_id' AND total_plot_area <='$total_area') OR
//           (property_for = 'rent' AND town_name = '$town' AND sector_name='$sector' AND a.user_id <> '$user_id' AND total_plot_area <='$total_area' AND latitude BETWEEN '" . $min_lat . "' AND '" . $max_lat . "' AND  
//           longitude BETWEEN '" . $min_lon . "' AND '" . $max_lon . "') GROUP BY a.id ";    
          $query = "SELECT a.*,p.typename as typename,(select count(*) from shortlistproperty where property_id= a.id and user_id='$user_id') as countyshortlist,(select count(*) from request_site_visit where user_id='$user_id' and property_id= a.id) as county,(select count(*) from requested_biding_users where propertyID= a.id and request_for='bid' and isactive='1') as county1 ,(select count(*) from user_view_properties where property_id= a.id and user_id='$user_id') as countyview FROM addproperty as a LEFT JOIN property_type as p ON (p.id = a.project_type_id) LEFT JOIN request_site_visit as r ON (r.property_id = a.id) LEFT JOIN requested_biding_users as r1 ON (r1.propertyID = a.id)  LEFT JOIN user_view_properties as v1 ON (v1.property_id = a.id) LEFT JOIN shortlistproperty as z ON (z.property_id = a.id)"; 
          
                        $conditions = array();

                        $conditions[] = "property_for='rent'";        

                        

                        if ($proptype != 'Select Property Type') {
                         $conditions[] = "project_type_id = '$proptype'";
                        }
                        if ($propbid != 'Select') {
                        $conditions[] = "a.request_for = '$propbid'";
                        }
                        if ($areamin != '' && $areamax !='') {
                         $conditions[] = "a.total_plot_area BETWEEN '$areamin' AND '$areamax";
                        }

                        if ($pricemin != '' && $pricemax !='') {
                         $conditions[] = "a.asking_rental_price BETWEEN '$pricemin' AND '$pricemax'";    
                         }
                         
                         if ($town != '') {
                        $conditions[] = "town_name = '$town'";
                        }
                        if ($sector != '') {
                        $conditions[] = "sector_name='$sector'";
                        }  
                        
                        $conditions[] = "a.user_id <> '$user_id'  GROUP BY a.id";
                        

                        $sqlstr = $query;
                        if (count($conditions) > 0) {
                         $sqlstr .= " WHERE " . implode(' AND ', $conditions);
                        }
              
              
          
           $payments = \Yii::$app->db->createCommand($sqlstr)->queryAll();
           \common\models\activemode::update_my_profile_progress_status($user_id,"my_search",'100','4');
            echo json_encode($payments);die;
            
        }


            
        
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
        $whichserch = $_POST['whichserch'];
       
        $user_id = Yii::$app->user->identity->id;
        $range = $totalradius;
        date_default_timezone_set("Asia/Calcutta");
        $date = date('Y-m-d H:i:s');
        
        if($whichserch == 'client'){
            $model3 = Yii::$app->db->createCommand()->update('save_search', ['geometry' => '"'.$center.'"', 'radius' => $totalradius,'location_name'=>$location,'town'=>$town,'sector'=>$sector,'created_date'=>$date], 'id = "' . $area . '"')->execute();
        }
        
        
            $query = "SELECT a.*,p.typename as typename,p.undercategory as undercategory,(select count(*) from request_site_visit where user_id='$user_id' and property_id= a.id) as county,(select count(*) from requested_biding_users where propertyID= a.id and request_for='bid' and isactive='1') as county1 ,(select count(*) from user_view_properties where property_id= a.id and user_id='$user_id') as countyview FROM addproperty as a LEFT JOIN property_type as p ON (p.id = a.project_type_id) LEFT JOIN request_site_visit as r ON (r.property_id = a.id) LEFT JOIN requested_biding_users as r1 ON (r1.propertyID = a.id) LEFT JOIN user_view_properties as v1 ON (v1.property_id = a.id) ";
        
            $conditions = array();
        
            $conditions[] = "property_for='rent'";
        
            if ($proptype != 'Select Property Type') {
                $conditions[] = "project_type_id = '$proptype'";
            }
        
            if ($propbid != 'Select') {
                $conditions[] = "a.request_for = '$propbid'";
            }
        
            if ($areamin != '' && $areamax != '') {
                $conditions[] = "a.total_plot_area BETWEEN '$areamin' AND '$areamax";
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
            $shapes     = $_POST['shapes'];
            $town     = $_POST['town'];
            $sector   = $_POST['sector'];
           
            $totalradius = $_POST['totalradius'];        
            $area = $_POST['area'];
            $areamin  = $_POST['areamin'];
            $areamax  = $_POST['areamax'];
            $pricemin  = $_POST['pricemin'];
            $pricemax  = $_POST['pricemax'];
            $proptype  = $_POST['proptype'];
            $propbid  = $_POST['propbid'];
            $location = $_POST['location'];
            $availabilitym = $_POST['availabilitym'];
    
           
           
            $user_id = $_POST['food'];

            $range = $totalradius;
            date_default_timezone_set("Asia/Calcutta");
            $date = date('Y-m-d H:i:s');
           

            $availabilitym = $_POST['availabilitym'];
            $whichserch = $_POST['whichserch'];
            $foodexpectid = $_POST['foodexpectid'];
    
    
        if($whichserch == 'client'){

            $model3 = Yii::$app->db->createCommand()->update('save_searches', ['search_for'=>'google','type'=>'circle','geometry' => '"'.$center.'"', 'radius' => $range,'location_name'=>$location,'town'=>$town,'sector'=>$sector, 'property_type' => $proptype, 'min_area' => $areamin, 'area' => $areamax, 'min_prices' => $pricemin, 'max_prices' => $pricemax,'created_date'=>$date], 'id = "' . $foodexpectid . '"')->execute();

           
        }
                
        
              $query = "SELECT a.*,p.typename as typename,(select count(*) from request_site_visit where user_id='$user_id' and property_id= a.id) as county,(select count(*) from shortlistproperty where property_id= a.id and user_id='$user_id') as county1 ,(select count(*) from user_view_properties where property_id= a.id and user_id='$user_id') as countyview FROM addproperty as a LEFT JOIN property_type as p ON (p.id = a.project_type_id) LEFT JOIN request_site_visit as r ON (r.property_id = a.id) LEFT JOIN requested_biding_users as r1 ON (r1.propertyID = a.id)  LEFT JOIN user_view_properties as v1 ON (v1.property_id = a.id) "; 
              
              $conditions = array();
              $conditionsnew = array();
              $conditionsprop = array();
              $conditionsexact = array();
    
                
              
              $conditionsprop[] = "( property_for='both'";  
                
              $conditions[] = "property_for='rent' )";      
    
                            
                   if($proptype){
    
                            if ($proptype != 'Property Type' || $proptype != '') {
                                
                             $conditions[] = "project_type_id = '$proptype'";
                            }
                        }
                            if ($propbid != 'Select') {
                            $conditions[] = "a.request_for = '$propbid'";
                            }
                            if ($areamin != '' && $areamax !='') {
                                // $conditions[] = "a.super_area BETWEEN '$areamin' AND '$areamax'";
                     
                                 $conditionsnew[] = "'$areamin' BETWEEN a.min_super_area AND a.super_area";
                                 $conditionsnew[] = "'$areamax' BETWEEN a.min_super_area AND a.super_area";
                                 $conditionsexact[] = "a.super_area BETWEEN '$areamin' AND '$areamax'";
    
                             }
    
                            if ($pricemin != '' && $pricemax !='') {
                             $conditions[] = "a.asking_rental_price BETWEEN '$pricemin' AND '$pricemax'";    
                             }
                             
                             if ($town != '') {
                            $conditions[] = "town_name = '$town'";
                            }
    
                            if ($availabilitym != '') {
                                $conditions[] = "a.availability  = '$availabilitym'";
                            }
                            if ($sector != '') {
                            $conditions[] = "sector_name='$sector'";
                            }  
                            $conditions[] = "a.status='approved'";
                            
                            $conditions[] = "a.user_id <> '$user_id'";
                            
    
                            $sqlstr = $query;
                            if ((count($conditions) > 0) && (count($conditionsnew) == 0)) {
                                $sqlstr .= " WHERE " . implode(' AND ', $conditionsprop)." OR ". implode(' AND ', $conditions)." GROUP BY a.id";
                            }
                    
                            if ((count($conditions) > 0) && (count($conditionsnew) > 0)) {
                                $sqlstr .= " WHERE "  . implode(' AND ', $conditionsprop)." OR ". implode(' AND ', $conditions)." AND CASE WHEN a.min_super_area IS NOT NULL THEN ( ".implode(' OR ', $conditionsnew).") ELSE (". implode(' AND ', $conditionsexact).") END GROUP BY a.id";
                            }
                  
                //   echo $sqlstr;die;
              
               $payments = \Yii::$app->db->createCommand($sqlstr)->queryAll();
    
    
    
                return json_encode($payments);
                
            
    
    
                
            
        }



    
     public function actionMapproperty12($location,$center, $shapes,$foodexpectid, $whichserch, $town,$sector, $northeast, $southwest, $latcenter, $longcenter, $totalradius, $area,$areamin,$areamax,$pricemin,$pricemax,$proptype,$propbid,$food) {

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
       

//        $trendingadd = \Yii::$app->db->createCommand()->insert('save_search', ['role_type'=>'lessee','type' => $shapes, 'geometry' => $center, 'radius' => $range, 'user_id' => $user_id, 'location_name' => $town,'expectation_id'=>$area,'town'=>$town,'sector'=>$sector,
//                    'created_date' => $date])->execute();
        
if($whichserch == 'client'){

    $trendingadd = \Yii::$app->db->createCommand()->insert('save_search', ['role_type' => 'lessee', 'type' => $shapes, 'geometry' => '"'.$center.'"', 'radius' => $range, 'user_id' => $user_id, 'location_name' => $location, 'expectation_id' => $area, 'town' => $town, 'sector' => $sector,
    'created_date' => $date])->execute();
}
           
            // Find Max - Min Lat / Long for Radius and zero point and query  
            $lat_range = $range / 69.172;
            $lon_range = abs($range / (cos($latcenter) * 69.172));
            $min_lat = number_format($latcenter - $lat_range, "4", ".", "");
            $max_lat = number_format($latcenter + $lat_range, "4", ".", "");
            $min_lon = number_format($longcenter - $lon_range, "4", ".", "");
            $max_lon = number_format($longcenter + $lon_range, "4", ".", "");
            
            
            
       if($town == ''){
           
           
           $rows = array();
           $query = "SELECT a.*,p.typename as typename,(select count(*) from shortlistproperty where property_id= a.id and user_id='$user_id') as countyshortlist,(select count(*) from request_site_visit where user_id='$user_id' and property_id= a.id) as county,(select count(*) from requested_biding_users where propertyID= a.id and request_for='bid' and isactive='1') as county1 ,(select count(*) from user_view_properties where property_id= a.id and user_id='$user_id') as countyview FROM addproperty as a LEFT JOIN property_type as p ON (p.id = a.project_type_id) LEFT JOIN request_site_visit as r ON (r.property_id = a.id) LEFT JOIN requested_biding_users as r1 ON (r1.propertyID = a.id) LEFT JOIN user_view_properties as v1 ON (v1.property_id = a.id) LEFT JOIN shortlistproperty as z ON (z.property_id = a.id)";
          
          
           $conditions = array();

                        $conditions[] = "property_for='rent'"; 

                        if ($proptype != 'Select Property Type') {
                         $conditions[] = "project_type_id = '$proptype'";
                        }
                        
                        if ($propbid != 'Select') {
                        $conditions[] = "a.request_for = '$propbid'";
                        }
                        
                        if ($areamin != '' && $areamax !='') {
                         $conditions[] = "a.total_plot_area BETWEEN '$areamin' AND '$areamax";
                        }

                        if ($pricemin != '' && $pricemax !='') {
                         $conditions[] = "a.asking_rental_price BETWEEN '$pricemin' AND '$pricemax'";    
                         }
                         
                         $conditions[] = "a.user_id <> '$user_id'  GROUP BY a.id";
                        
                        

                        $sqlstr = $query;
                        if (count($conditions) > 0) {
                         $sqlstr .= " WHERE " . implode(' AND ', $conditions);
                        }
          
           $payments = \Yii::$app->db->createCommand($sqlstr)->queryAll();        
           
           $count = 0;
           
          
          foreach($payments  as $payment ){
              
              
              $latitudeFrom = $payment['latitude'];
              $longitudeFrom = $payment['longitude'];
              $propid = $payment['id'];
              
              $objlocation = \common\models\Addproperty::getCircleDistance($latitudeFrom,$longitudeFrom,$latitudeTo,$longitudeTo);
              
               if ($objlocation < $range) {
                   
                   $count += 1;
                    
           $sqlstr = "SELECT a.*,p.typename as typename,(select count(*) from shortlistproperty where property_id= a.id and user_id='$user_id') as countyshortlist,(select count(*) from request_site_visit where user_id='$user_id' and property_id= a.id) as county,(select count(*) from requested_biding_users where propertyID= a.id and request_for='bid' and isactive='1') as county1 ,(select count(*) from user_view_properties where property_id= a.id and user_id='$user_id') as countyview FROM addproperty as a LEFT JOIN property_type as p ON (p.id = a.project_type_id) LEFT JOIN request_site_visit as r ON (r.property_id = a.id) LEFT JOIN requested_biding_users as r1 ON (r1.propertyID = a.id) LEFT JOIN user_view_properties as v1 ON (v1.property_id = a.id) LEFT JOIN shortlistproperty as z ON (z.property_id = a.id) where 
                       a.id='$propid' GROUP BY a.id";
          
           $paymentst = \Yii::$app->db->createCommand($sqlstr)->queryOne();
                   
             $rows[] = $paymentst;                       
               }
              
          }
          
          
          //echo $count;
         
            echo json_encode($rows);
           
           
        }else{
            
          
              
//          $sqlstr = "SELECT a.*,p.typename as typename,(select count(*) from request_site_visit where user_id='$user_id' and property_id= a.id) as county,(select count(*) from requested_biding_users where propertyID= a.id and request_for='bid' and isactive='1') as county1 ,(select count(*) from user_view_properties where property_id= a.id and user_id='$user_id') as countyview FROM addproperty as a LEFT JOIN property_type as p ON (p.id = a.project_type_id) LEFT JOIN request_site_visit as r ON (r.property_id = a.id) LEFT JOIN requested_biding_users as r1 ON (r1.propertyID = a.id)  LEFT JOIN user_view_properties as v1 ON (v1.property_id = a.id) where ( property_for = 'rent' AND town_name = '$town' AND sector_name='$sector' AND a.user_id <> '$user_id' AND total_plot_area <='$total_area') OR
//           (property_for = 'rent' AND town_name = '$town' AND sector_name='$sector' AND a.user_id <> '$user_id' AND total_plot_area <='$total_area' AND latitude BETWEEN '" . $min_lat . "' AND '" . $max_lat . "' AND  
//           longitude BETWEEN '" . $min_lon . "' AND '" . $max_lon . "') GROUP BY a.id ";    
          $query = "SELECT a.*,p.typename as typename,(select count(*) from shortlistproperty where property_id= a.id and user_id='$user_id') as countyshortlist,(select count(*) from request_site_visit where user_id='$user_id' and property_id= a.id) as county,(select count(*) from requested_biding_users where propertyID= a.id and request_for='bid' and isactive='1') as county1 ,(select count(*) from user_view_properties where property_id= a.id and user_id='$user_id') as countyview FROM addproperty as a LEFT JOIN property_type as p ON (p.id = a.project_type_id) LEFT JOIN request_site_visit as r ON (r.property_id = a.id) LEFT JOIN requested_biding_users as r1 ON (r1.propertyID = a.id)  LEFT JOIN user_view_properties as v1 ON (v1.property_id = a.id) LEFT JOIN shortlistproperty as z ON (z.property_id = a.id)"; 
          
                        $conditions = array();

                        $conditions[] = "property_for='rent'";        

                        

                        if ($proptype != 'Select Property Type') {
                         $conditions[] = "project_type_id = '$proptype'";
                        }
                        if ($propbid != 'Select') {
                        $conditions[] = "a.request_for = '$propbid'";
                        }
                        if ($areamin != '' && $areamax !='') {
                         $conditions[] = "a.total_plot_area BETWEEN '$areamin' AND '$areamax";
                        }

                        if ($pricemin != '' && $pricemax !='') {
                         $conditions[] = "a.asking_rental_price BETWEEN '$pricemin' AND '$pricemax'";    
                         }
                         
                         if ($town != '') {
                        $conditions[] = "town_name = '$town'";
                        }
                        if ($sector != '') {
                        $conditions[] = "sector_name='$sector'";
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
    
    
    

    public function actionMapproperty2csr($northlat,$southlat,$northlng,$southlng,$location,$newkuma, $center, $shapes, $town,$sector, $maxim, $minim, $maximy, $minimy, $area,$x,$y,$areamin,$areamax,$pricemin,$pricemax,$proptype,$propbid,$food) {
        
        $rectanglecoordinates = '{
            "north": '.$northlat.',
            "south": '.$southlat.',
            "east": '.$northlng.',
            "west": '.$southlng.'
         }';
       
         $newkuma1 = $rectanglecoordinates;
        date_default_timezone_set("Asia/Calcutta");
        $date = date('Y-m-d H:i:s');
        $user_id = $food;
        
        

        $trendingadd = \Yii::$app->db->createCommand()->insert('save_searches', ['role_type'=>'lessee','type' => $shapes, 'geometry' => $newkuma1, 'radius' => $center, 'user_id' => $user_id, 'location_name' => $location,'expectation_id' => $area,'town'=>$town,'sector'=>$sector,
                    'created_date' => $date])->execute();
        

 if($town == ''){
     
       $rows = array();

       $query = "SELECT a.*,p.typename as typename,(select count(*) from shortlistproperty where property_id= a.id and user_id='$user_id') as countyshortlist,(select count(*) from request_site_visit where user_id='$user_id' and property_id= a.id) as county,(select count(*) from requested_biding_users where propertyID= a.id and request_for='bid' and isactive='1') as county1 ,(select count(*) from user_view_properties where property_id= a.id and user_id='$user_id') as countyview FROM addproperty as a LEFT JOIN property_type as p ON (p.id = a.project_type_id) LEFT JOIN request_site_visit as r ON (r.property_id = a.id) LEFT JOIN requested_biding_users as r1 ON (r1.propertyID = a.id)  LEFT JOIN user_view_properties as v1 ON (v1.property_id = a.id) LEFT JOIN shortlistproperty as z ON (z.property_id = a.id)";
       
       
       $conditions = array();

                        $conditions[] = "property_for='rent'"; 

                        if ($proptype != 'Select Property Type') {
                         $conditions[] = "project_type_id = '$proptype'";
                        }
                        if ($propbid != 'Select') {
                        $conditions[] = "a.request_for = '$propbid'";
                        }
                        if ($areamin != '' && $areamax !='') {
                         $conditions[] = "a.total_plot_area BETWEEN '$areamin' AND '$areamax";
                        }

                        if ($pricemin != '' && $pricemax !='') {
                         $conditions[] = "a.asking_rental_price BETWEEN '$pricemin' AND '$pricemax'";    
                         }
                        
                        $conditions[] = "a.user_id <> '$user_id'";
                        
                        $conditions[] = "latitude BETWEEN '$minim' AND '$maxim'";
                        
                         $conditions[] = "longitude BETWEEN '$minimy' AND '$maximy'  GROUP BY a.id"; 
                        

                        $sqlstr = $query;
                        if (count($conditions) > 0) {
                         $sqlstr .= " WHERE " . implode(' AND ', $conditions). "GROUP BY a.id";
                        }
       
       
       
       
       $payments = \Yii::$app->db->createCommand($sqlstr)->queryAll();  
   \common\models\activemode::update_my_profile_progress_status($user_id,"my_search",'100','4');
            echo json_encode($payments);
       
       
       
 }else{
     
         
       $query = "SELECT a.*,p.typename as typename,(select count(*) from shortlistproperty where property_id= a.id and user_id='$user_id') as countyshortlist,(select count(*) from request_site_visit where user_id='$user_id' and property_id= a.id) as county,(select count(*) from requested_biding_users where propertyID= a.id and request_for='bid' and isactive='1') as county1 ,(select count(*) from user_view_properties where property_id= a.id and user_id='$user_id') as countyview FROM addproperty as a LEFT JOIN property_type as p ON (p.id = a.project_type_id) LEFT JOIN request_site_visit as r ON (r.property_id = a.id) LEFT JOIN requested_biding_users as r1 ON (r1.propertyID = a.id) LEFT JOIN user_view_properties as v1 ON (v1.property_id = a.id) LEFT JOIN shortlistproperty as z ON (z.property_id = a.id)";   
         
      $conditions = array();

                        $conditions[] = "property_for='rent'";        

                        $conditions[] = "a.user_id <> '$user_id'";

                        if ($proptype != 'Select Property Type') {
                         $conditions[] = "project_type_id = '$proptype'";
                        }
                        if ($propbid != 'Select') {
                        $conditions[] = "a.request_for = '$propbid'";
                        }
                        if ($areamin != '' && $areamax !='') {
                         $conditions[] = "a.total_plot_area BETWEEN '$areamin' AND '$areamax";
                        }

                        if ($pricemin != '' && $pricemax !='') {
                         $conditions[] = "a.asking_rental_price BETWEEN '$pricemin' AND '$pricemax'";    
                         }
                         
                         if ($town != '') {
                        $conditions[] = "town_name = '$town'";
                        }
                        if ($sector != '') {
                        $conditions[] = "sector_name='$sector'";
                        }                       
                        

                        $sqlstr = $query;
                        if (count($conditions) > 0) {
                         $sqlstr .= " WHERE " . implode(' AND ', $conditions). "GROUP BY a.id";
                        }
    
     
        $payments = \Yii::$app->db->createCommand($sqlstr)->queryAll();
        \common\models\activemode::update_my_profile_progress_status($user_id,"my_search",'100','4');
        echo json_encode($payments);die;
     
     
 }


        
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
        $whichserch = $_POST['whichserch'];

        if($whichserch == 'client'){
        $model3 = Yii::$app->db->createCommand()->update('save_search', ['geometry' => $newkuma,'location_name'=>$location,'town'=>$town,'sector'=>$sector,'created_date'=>$date], 'id = "' . $area . '"')->execute();
        }

       

            $query = "SELECT a.*,p.typename as typename,p.undercategory as undercategory,(select count(*) from request_site_visit where user_id='$user_id' and property_id= a.id) as county,(select count(*) from requested_biding_users where propertyID= a.id and request_for='bid' and isactive='1') as county1 ,(select count(*) from user_view_properties where property_id= a.id and user_id='$user_id') as countyview FROM addproperty as a LEFT JOIN property_type as p ON (p.id = a.project_type_id) LEFT JOIN request_site_visit as r ON (r.property_id = a.id) LEFT JOIN requested_biding_users as r1 ON (r1.propertyID = a.id) LEFT JOIN user_view_properties as v1 ON (v1.property_id = a.id) ";

            $conditions = array();

            $conditions[] = "property_for='rent'";

            if ($proptype != 'Select Property Type') {
                $conditions[] = "project_type_id = '$proptype'";
            }
            if ($propbid != 'Select') {
                $conditions[] = "a.request_for = '$propbid'";
            }
            if ($areamin != '' && $areamax != '') {
                $conditions[] = "a.total_plot_area BETWEEN '$areamin' AND '$areamax";
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

            echo json_encode($payments);die;
      
    }

    



    public function actionMapproperty2() {
        
        
        date_default_timezone_set("Asia/Calcutta");
        $date = date('Y-m-d H:i:s');

        $user_id = $_POST['food'];

       
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
        
       // $center     = $_POST['center'];
        $shapes     = $_POST['shapes'];
        $town   = $_POST['town'];
        $sector  = $_POST['sector'];
            
        $area = $_POST['area'];
       
        $areamin  = $_POST['areamin'];
        $areamax  = $_POST['areamax'];
        $pricemin  = $_POST['pricemin'];
        $pricemax  = $_POST['pricemax'];
        $proptype  = $_POST['proptype'];
        $propbid  = $_POST['propbid'];
        $location = $_POST['location'];
        $availabilitym = $_POST['availabilitym'];
        $whichserch = $_POST['whichserch'];
        $foodexpectid = $_POST['foodexpectid'];


        if($whichserch == 'client'){

            $model3 = Yii::$app->db->createCommand()->update('save_searches', ['search_for'=>'google','type'=>'rectangle','geometry' => $newkuma,'location_name'=>$location,'town'=>$town,'sector'=>$sector, 'property_type' => $proptype, 'min_area' => $areamin, 'area' => $areamax, 'min_prices' => $pricemin, 'max_prices' => $pricemax,'created_date'=>$date], 'id = "' . $foodexpectid . '"')->execute();

           
        }
     
         
       $query = "SELECT a.*,p.typename as typename,(select count(*) from request_site_visit where user_id='$user_id' and property_id= a.id) as county,(select count(*) from shortlistproperty where property_id= a.id and user_id='$user_id') as county1 ,(select count(*) from user_view_properties where property_id= a.id and user_id='$user_id') as countyview FROM addproperty as a LEFT JOIN property_type as p ON (p.id = a.project_type_id) LEFT JOIN request_site_visit as r ON (r.property_id = a.id) LEFT JOIN requested_biding_users as r1 ON (r1.propertyID = a.id) LEFT JOIN user_view_properties as v1 ON (v1.property_id = a.id)";   
         
       $conditions = array();
       $conditionsnew = array();
       $conditionsprop = array();
       $conditionsexact = array();


       
       $conditionsprop[] = "( property_for='both'";  
            
       $conditions[] = "property_for='rent' )";        

                        

                        if ($proptype != 'Property Type') {
                         $conditions[] = "project_type_id = '$proptype'";
                        }
                        if ($propbid != 'Select') {
                        $conditions[] = "a.request_for = '$propbid'";
                        }
                        if ($areamin != '' && $areamax !='') {
                            // $conditions[] = "a.super_area BETWEEN '$areamin' AND '$areamax'";
                 
                             $conditionsnew[] = "'$areamin' BETWEEN a.min_super_area AND a.super_area";
                             $conditionsnew[] = "'$areamax' BETWEEN a.min_super_area AND a.super_area";
                             $conditionsexact[] = "a.super_area BETWEEN '$areamin' AND '$areamax'";

                         }

                        if ($pricemin != '' && $pricemax !='') {
                         $conditions[] = "a.asking_rental_price BETWEEN '$pricemin' AND '$pricemax'";    
                         }
                         
                         if ($town != '') {
                        $conditions[] = "town_name = '$town'";
                        }
                        if ($sector != '') {
                        $conditions[] = "sector_name='$sector'";
                        }    
                                                
                        if ($availabilitym != '') {
                            $conditions[] = "a.availability  = '$availabilitym'";
                        } 
                        
                        $conditions[] = "a.status='approved'";
                        $conditions[] = "a.user_id <> '$user_id'";
                        

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





    public function actionMapproperty22() {
        
       
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
        
       // $center     = $_POST['center'];
        $shapes     = $_POST['shapes'];
        $town   = $_POST['town'];
        $sector  = $_POST['sector'];
            
        $area = $_POST['area'];
       
        $areamin  = $_POST['areamin'];
        $areamax  = $_POST['areamax'];
        $pricemin  = $_POST['pricemin'];
        $pricemax  = $_POST['pricemax'];
        $proptype  = $_POST['proptype'];
        $propbid  = $_POST['propbid'];
        $location = $_POST['location'];
        $availabilitym = $_POST['availabilitym'];



        // if (isset(Yii::$app->user->identity->id)){
        // $trendingadd = \Yii::$app->db->createCommand()->insert('save_search', ['role_type'=>'lessee','type' => $shapes, 'geometry' => $newkuma, 'radius' => $center, 'user_id' => $user_id, 'location_name' => $location,'expectation_id'=>$area,'town'=>$town,'sector'=>$sector,
        //             'created_date' => $date])->execute();
        // }

     
         
       $query = "SELECT a.*,p.typename as typename,(select count(*) from request_site_visit where user_id='$user_id' and property_id= a.id) as county,(select count(*) from shortlistproperty where property_id= a.id and user_id='$user_id') as county1 ,(select count(*) from user_view_properties where property_id= a.id and user_id='$user_id') as countyview FROM addproperty as a LEFT JOIN property_type as p ON (p.id = a.project_type_id) LEFT JOIN request_site_visit as r ON (r.property_id = a.id) LEFT JOIN requested_biding_users as r1 ON (r1.propertyID = a.id) LEFT JOIN user_view_properties as v1 ON (v1.property_id = a.id)";   
         
       $conditions = array();
       $conditionsnew = array();
       $conditionsprop = array();
       $conditionsexact = array();


       
       $conditionsprop[] = "( property_for='both'";  
            
       $conditions[] = "property_for='rent' )";        

                        

                        if ($proptype != 'Property Type') {
                         $conditions[] = "project_type_id = '$proptype'";
                        }
                        if ($propbid != 'Select') {
                        $conditions[] = "a.request_for = '$propbid'";
                        }
                        if ($areamin != '' && $areamax !='') {
                            // $conditions[] = "a.super_area BETWEEN '$areamin' AND '$areamax'";
                 
                             $conditionsnew[] = "'$areamin' BETWEEN a.min_super_area AND a.super_area";
                             $conditionsnew[] = "'$areamax' BETWEEN a.min_super_area AND a.super_area";
                             $conditionsexact[] = "a.super_area BETWEEN '$areamin' AND '$areamax'";

                         }

                        if ($pricemin != '' && $pricemax !='') {
                         $conditions[] = "a.asking_rental_price BETWEEN '$pricemin' AND '$pricemax'";    
                         }
                         
                         if ($town != '') {
                        $conditions[] = "town_name = '$town'";
                        }
                        if ($sector != '') {
                        $conditions[] = "sector_name='$sector'";
                        }    
                                                
                        if ($availabilitym != '') {
                            $conditions[] = "a.availability  = '$availabilitym'";
                        } 
                        
                        $conditions[] = "a.status='approved'";
                        $conditions[] = "a.user_id <> '$user_id'";
                        

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
    
     public function actionMapproperty21($northlat,$southlat,$northlng,$southlng,$location,$newkuma, $center,$foodexpectid, $whichserch, $shapes, $town,$sector, $maxim, $minim, $maximy, $minimy, $area,$x,$y,$areamin,$areamax,$pricemin,$pricemax,$proptype,$propbid,$food) {
        
        
        date_default_timezone_set("Asia/Calcutta");
        $date = date('Y-m-d H:i:s');
        $user_id = $food;
        $rectanglecoordinates = '{
            "north": '.$northlat.',
            "south": '.$southlat.',
            "east": '.$northlng.',
            "west": '.$southlng.'
         }';
       
         $newkuma1 = $rectanglecoordinates;
        

//        $trendingadd = \Yii::$app->db->createCommand()->insert('save_search', ['role_type'=>'lessee','type' => $shapes, 'geometry' => $newkuma, 'radius' => $center, 'user_id' => $user_id, 'location_name' => $town,'expectation_id'=>$area,'town'=>$town,'sector'=>$sector,
//                    'created_date' => $date])->execute();
if($whichserch == 'client'){
    $trendingadd = \Yii::$app->db->createCommand()->insert('save_search', ['role_type' => 'lessee', 'type' => $shapes, 'geometry' => $newkuma1, 'radius' => $center, 'user_id' => $user_id, 'location_name' => $location, 'expectation_id' => $area, 'town' => $town, 'sector' => $sector,
    'created_date' => $date])->execute();
   
}

 if($town == ''){
     
       $rows = array();

       $query = "SELECT a.*,p.typename as typename,(select count(*) from shortlistproperty where property_id= a.id and user_id='$user_id') as countyshortlist,(select count(*) from request_site_visit where user_id='$user_id' and property_id= a.id) as county,(select count(*) from requested_biding_users where propertyID= a.id and request_for='bid' and isactive='1') as county1 ,(select count(*) from user_view_properties where property_id= a.id and user_id='$user_id') as countyview FROM addproperty as a LEFT JOIN property_type as p ON (p.id = a.project_type_id) LEFT JOIN request_site_visit as r ON (r.property_id = a.id) LEFT JOIN requested_biding_users as r1 ON (r1.propertyID = a.id)  LEFT JOIN user_view_properties as v1 ON (v1.property_id = a.id) LEFT JOIN shortlistproperty as z ON (z.property_id = a.id)";
       
       
       $conditions = array();

                        $conditions[] = "property_for='rent'"; 

                        if ($proptype != 'Select Property Type') {
                         $conditions[] = "project_type_id = '$proptype'";
                        }
                        if ($propbid != 'Select') {
                        $conditions[] = "a.request_for = '$propbid'";
                        }
                        if ($areamin != '' && $areamax !='') {
                         $conditions[] = "a.total_plot_area BETWEEN '$areamin' AND '$areamax";
                        }

                        if ($pricemin != '' && $pricemax !='') {
                         $conditions[] = "a.asking_rental_price BETWEEN '$pricemin' AND '$pricemax'";    
                         }
                        
                        $conditions[] = "a.user_id <> '$user_id'";
                        
                        $conditions[] = "latitude BETWEEN '$minim' AND '$maxim'";
                        
                         $conditions[] = "longitude BETWEEN '$minimy' AND '$maximy'  GROUP BY a.id"; 
                        

                        $sqlstr = $query;
                        if (count($conditions) > 0) {
                         $sqlstr .= " WHERE " . implode(' AND ', $conditions). "GROUP BY a.id";
                        }
       
       
       
       
       $payments = \Yii::$app->db->createCommand($sqlstr)->queryAll();  
   
            echo json_encode($payments);
       
       
       
 }else{
     
         
       $query = "SELECT a.*,p.typename as typename,(select count(*) from shortlistproperty where property_id= a.id and user_id='$user_id') as countyshortlist,(select count(*) from request_site_visit where user_id='$user_id' and property_id= a.id) as county,(select count(*) from requested_biding_users where propertyID= a.id and request_for='bid' and isactive='1') as county1 ,(select count(*) from user_view_properties where property_id= a.id and user_id='$user_id') as countyview FROM addproperty as a LEFT JOIN property_type as p ON (p.id = a.project_type_id) LEFT JOIN request_site_visit as r ON (r.property_id = a.id) LEFT JOIN requested_biding_users as r1 ON (r1.propertyID = a.id) LEFT JOIN user_view_properties as v1 ON (v1.property_id = a.id) LEFT JOIN shortlistproperty as z ON (z.property_id = a.id)";   
         
      $conditions = array();

                        $conditions[] = "property_for='rent'";        

                        $conditions[] = "a.user_id <> '$user_id'";

                        if ($proptype != 'Select Property Type') {
                         $conditions[] = "project_type_id = '$proptype'";
                        }
                        if ($propbid != 'Select') {
                        $conditions[] = "a.request_for = '$propbid'";
                        }
                        if ($areamin != '' && $areamax !='') {
                         $conditions[] = "a.total_plot_area BETWEEN '$areamin' AND '$areamax";
                        }

                        if ($pricemin != '' && $pricemax !='') {
                         $conditions[] = "a.asking_rental_price BETWEEN '$pricemin' AND '$pricemax'";    
                         }
                         
                         if ($town != '') {
                        $conditions[] = "town_name = '$town'";
                        }
                        if ($sector != '') {
                        $conditions[] = "sector_name='$sector'";
                        }                       
                        

                        $sqlstr = $query;
                        if (count($conditions) > 0) {
                         $sqlstr .= " WHERE " . implode(' AND ', $conditions). "GROUP BY a.id";
                        }
    
     
        $payments = \Yii::$app->db->createCommand($sqlstr)->queryAll();

        echo json_encode($payments);die;
     
     
 }


        
    }


    public function beforeAction($action) {
        // if($action->id == "getpolymyupdate")
            $this->enableCsrfValidation = false;
            return parent::beforeAction($action);
    }
    
    

}
