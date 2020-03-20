<?php

namespace frontend\modules\api\controllers;

use frontend\modules\api\models\User;
use common\models\Addproperty;
use common\models\UserViewProperties;
use common\models\PropertyType;
use common\models\RequestSiteVisit;
use common\models\RequestDocumentShow;
use common\models\CompanyEmp;

class UserController extends \yii\web\Controller
{



    public function actionIndex()
    {

               return $this->render('index');
    }


    private function setHeader($status)
  {
      
      $status_header = 'HTTP/1.1 ' . $status . ' ' . $this->_getStatusCodeMessage($status);
      $content_type="application/json; charset=utf-8";
    
      header($status_header);
      header('Content-type: ' . $content_type);
      header('X-Powered-By: ' . "Nintriva <nintriva.com>");
  }
  private function _getStatusCodeMessage($status)
  {
      $codes = Array(
	  200 => 'OK',
	  400 => 'Bad Request',
	  401 => 'Unauthorized',
	  402 => 'Payment Required',
	  403 => 'Forbidden',
	  404 => 'Not Found',
	  500 => 'Internal Server Error',
	  501 => 'Not Implemented',
      );
      return (isset($codes[$status])) ? $codes[$status] : '';
  }	


  public function actionOnlinesitevisit($userid){

    \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

    
    $this->setHeader(200);

    header("Access-Control-Allow-Headers: *");

    $model12 = RequestSiteVisit::find()->where(['user_id' => $userid])->andwhere(['visit_type' => 'online'])->andwhere(['status' => 1])->all();
    
    $array3 = array();
    foreach ($model12 as $model1){

        $array2['id'] = $model1->request_id;
        $array2['property_id'] = $model1->property_id;
        $array2['field_employee_id'] = $model1->sales_id;
        $array2['request_status'] = $model1->request_status;
        $array2['amount_payable'] = $model1->amount_payable;
        $array2['scheduled_time'] = $model1->scheduled_time;
        $array2['created_date'] = $model1->created_date;

        $array3[] = $array2;

    }

    //$data['site_visit'] =  $array3;
     
    // echo json_encode(array('status'=>1,'Online_Site_Visit'=>$array3),JSON_PRETTY_PRINT); die;
    echo $_GET['callback'] . '('.json_encode(array('status'=>1,'Online_Site_Visit'=>$array3),JSON_PRETTY_PRINT).')'; die;

}


  public function actionOnlinesitevisitagent($userid){

    \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

    header('Access-Control-Allow-Origin: *');

    $this->setHeader(200);

    $querys = CompanyEmp::find()->where(['userid'=>$userid])->one();
    $assigned_id = $querys->id;

    $model12 = RequestSiteVisit::find()->where(['sales_id' => $assigned_id])->andwhere(['visit_type' => 'online'])->andwhere(['status' => 1])->all();
    
    $array3 = array();
    foreach ($model12 as $model1){

        $array2['id'] = $model1->request_id;
        $array2['property_id'] = $model1->property_id;
        $array2['user_id'] = $model1->user_id;
        $array2['request_status'] = $model1->request_status;
        $array2['amount_payable'] = $model1->amount_payable;
        $array2['scheduled_time'] = $model1->scheduled_time;
        $array2['created_date'] = $model1->created_date;

        $array3[] = $array2;

    }

    //$data['site_visit'] =  $array3;
     
         echo  json_encode(array('status'=>1,'Online_Site_Visit'=>$array3),JSON_PRETTY_PRINT);die;
        // echo $_GET['callback'] . '('.json_encode(array('status'=>1,'Online_Site_Visit'=>$array3),JSON_PRETTY_PRINT).')'; die;

  }


  
    public function actionListuser($id){       

        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

        header('Access-Control-Allow-Origin: *');


        $model2 = UserViewProperties::find()->where(['property_id' => $id])->andwhere(['active' => '1'])->all();
        $model1 = Addproperty::find()->where(['id' => $id])->andwhere(['is_active' => '1'])->one();
         $userid = $model1->user_id;

       
        $model=$this->findModel($userid);      
        $this->setHeader(200);
       
        $array3 = array();

        $data['property_for'] = $model1->property_for;
        $proptype_id  = $model1->project_type_id;

        // echo '<pre>';print_r($proptype_id);die;

        $model12 = PropertyType::find()->where(['id' => $proptype_id])->andwhere(['isactive' => '1'])->one();


        $data['property_type'] = $model12->typename;
       
        $data['locality'] = $model1->locality;
       
        $data['Auction_type'] = $model1->request_for;
        $data['locality'] = $model1->locality;
        $data['property_for'] = $model1->property_for;
       // $data['locality'] = $model1->locality;
        
        $time['id']=$model->id;
        $time['name']=$model->username;
        $time['email']=$model->email;

        $data['Owner_details'] = $time;
       
        $data['property_for'] = $model1->property_for;
        $data['total_plot_area'] = $model1->super_area;
        $data['plot_unit'] = $model1->super_unit;
        $data['expected_price'] = $model1->expected_price;
        $data['asking_rental_price'] = $model1->asking_rental_price;
        
        if(!empty($model2)){

           

        foreach ($model2 as $model2s){


            $array4 = array();
            $array5 = array();

            $array_outpu3['user_id'] = $model2s->user_id;
            $model341 = $this->findModel($model2s->user_id); 
            
            $array_outpu3['phone_no']=$model341->username;
            $array_outpu3['email']=$model341->email;

             $fullname = $model341->fullname;
             $lastname = $model341->lastname;
            $array_outpu3['Username']=$fullname .' '.$lastname;

            $model245 = RequestSiteVisit::find()->where(['property_id' => $id])->andwhere(['user_id' => $model2s->user_id])->one();
            $model246 = RequestDocumentShow::find()->where(['property_id' => $id])->andwhere(['user_id' => $model2s->user_id])->one();

            if($model245){
                $array_outpu4['status'] = 1;
            }else{
                $array_outpu4['status'] = 0;

            }
            if($model246){
                $array_outpu5['status'] = 1;
            }else{
                $array_outpu5['status'] = 0;

            }
            $array4[] = $array_outpu4;
            $array5[] = $array_outpu5;

            $array_outpu3['site_visit']=$array4;
            $array_outpu3['document_show']=$array5;


            $array3[] = $array_outpu3;

        }
        $data['Intersted_user']=$array3;
        
        
        
      echo $_GET['callback'] . '('.json_encode(array('status'=>1,'Property'=>$data),JSON_PRETTY_PRINT).')'; die;

    }else{

       
        echo $_GET['callback'] . '('.json_encode(array('status'=>0,'Property'=>'No user'),JSON_PRETTY_PRINT).')'; die;


    }
       // echo  json_encode(array('status'=>1,'Property'=>$data),JSON_PRETTY_PRINT);
         //echo  json_encode(array('status'=>1,'data'=>array_filter($model->attributes)),JSON_PRETTY_PRINT);
    }



    protected function findModel($id)
     {
        $model = User::findOne($id);
       
        if (($model = User::findOne($id)) !== null) {
           
        return $model;
        } else {
            
        $this->setHeader(400);
        echo json_encode(array('status'=>0,'error_code'=>400,'message'=>'No User Found'),JSON_PRETTY_PRINT);
        exit;
      }

    }

}
