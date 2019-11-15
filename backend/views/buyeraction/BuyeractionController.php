<?php

namespace frontend\controllers;

use yii\web\Controller;
use Yii;
use app\models\Property;

use yii\web\Response;
use yii\db\Query;


class BuyeractionController extends Controller {

    public function __construct($id, $module, $config = array()) {
        parent::__construct($id, $module, $config);
        $this->layout = "common";
    }
    
    public function actionIndex() {
        
        
        return $this->render('index');
        
    }
    
     public function actionSaveprop($hardam,$userid) {
         
         $newhar = explode(',',$hardam);
         date_default_timezone_set("Asia/Calcutta");
         $date= date('Y-m-d H:i:s');
         
        
         
    $delete = \Yii::$app->db->createCommand()->delete('shortlistProperty', ['user_id' => $userid])->execute();
          
          foreach($newhar as $key=>$rat)
	
	         { 
     $insert1 = \Yii::$app->db->createCommand()->insert('shortlistProperty', ['user_id' => $userid, 'property_id' => $rat,'created_date'=>$date])->execute();
	              

		 } 
        
        
                }
                
       public function actionSaveprop1($hardam,$userid) {
         
         $newhar = explode(',',$hardam);
         date_default_timezone_set("Asia/Calcutta");
         $date= date('Y-m-d H:i:s');
         
        
         
    $delete = \Yii::$app->db->createCommand()->delete('shortlistProperty', ['user_id' => $userid])->execute();
          
          foreach($newhar as $key=>$rat)
	
	         { 
     $insert1 = \Yii::$app->db->createCommand()->insert('shortlistProperty', ['user_id' => $userid, 'property_id' => $rat,'created_date'=>$date])->execute();
	              

		 } 
        
        
                }
                
                
       public function actionSaveprop2($hardam,$userid) {
         
         $newhar = explode(',',$hardam);
         date_default_timezone_set("Asia/Calcutta");
         $date= date('Y-m-d H:i:s');
         
        
         
    $delete = \Yii::$app->db->createCommand()->delete('shortlistProperty', ['user_id' => $userid])->execute();
          
          foreach($newhar as $key=>$rat)
	
	         { 
     $insert1 = \Yii::$app->db->createCommand()->insert('shortlistProperty', ['user_id' => $userid, 'property_id' => $rat,'created_date'=>$date])->execute();
	              

		 } 
        
        
                } 
                
                 public function actionSaveprop3($hardam,$userid) {
         
         $newhar = explode(',',$hardam);
         date_default_timezone_set("Asia/Calcutta");
         $date= date('Y-m-d H:i:s');
         
        
         
    $delete = \Yii::$app->db->createCommand()->delete('shortlistProperty', ['user_id' => $userid])->execute();
          
          foreach($newhar as $key=>$rat)
	
	         { 
     $insert1 = \Yii::$app->db->createCommand()->insert('shortlistProperty', ['user_id' => $userid, 'property_id' => $rat,'created_date'=>$date])->execute();
	              

		 } 
        
        
                } 

    public function actionSearch() {
        
        return $this->render('search');
    }
    
    public function actionPetproperty($id)
    {
     
      $model = new Property();
      
      if($id == 'hello'){
          
            $payments= \Yii::$app->db->createCommand("SELECT * FROM property order by id DESC")->queryAll();      
                
                echo json_encode($payments); 
         
      }else{          
        
          
          $query = new Query;

	$query  ->select(['expected_price','location']) 
	        ->from('property')
	        ->join(  'LEFT JOIN',
	                'property_type',
	                'property_type.id =property.projectypeid'
                        )                
               ->where(['undercategory' => $id]);             
        
	$command = $query->createCommand();
	$payments = $command->queryAll();   
          
          
//          $payments= \Yii::$app->db->createCommand("SELECT * FROM property where projectypeid=$jmk")->queryAll();      
                
          echo json_encode($payments);
          
          }	 
        
    }
    
    
     public function actionResidfilter($residlocation,$restype,$resprice,$restypename)
             
    {
    
     $query = new Query;
   
     $conditions = array();

    if($residlocation !="") {
      $conditions[] = "(['location' => $residlocation])";
    }
    if($restype !="") {
      $conditions[] = "(['property_for' => $restype])";
    }
    if($resprice !="") {
      $conditions[] = "(['expected_price' => $resprice])";
    }
    if($restypename !="") {
      $conditions[] = "(['typename' => $restypename])";
    }
    
    if (count($conditions) > 0) {
      $sql .= "$query  ->select(['expected_price','location']) 
	        ->from('property')
	        ->join(  'LEFT JOIN',
	                'property_type',
	                'property_type.id = property.projectypeid'
                      )  ->where " . implode(' ->andwhere ', $conditions);
    }
    
    print_r($sql);die;
    
	 $command = $sql->createCommand();
	 $payments = $command->queryAll();   
              

          
//          $payments= \Yii::$app->db->createCommand("SELECT * FROM property left join property_type  where projectypeid=$jmk")->queryAll();      
                
          echo json_encode($payments);
      
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

   

}
