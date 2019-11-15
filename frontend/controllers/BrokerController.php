<?php

namespace frontend\controllers;

use yii\web\Controller;
use Yii;

class BrokerController extends Controller {

    public function __construct($id, $module, $config = array()) {
        parent::__construct($id, $module, $config);
        $this->layout = "brokerLayout";
    }
    public function actionIndex() {
        return $this->render('index');
    }

    public function actionSearchProperty($valu) {
       return $this->render('search_property');
    }


public function actionContactus($name,$email,$msg){



    $mail_message = 'Customer Name : '.$name.'
       email Id :  '.$email.'
       description :  '.$msg.'';
    
   
   
      $message = $mail_message;
      $subject ="Customer Query";
      $from = "15BELLS Query";
        
        
    $to = "15bells.official@gmail.com"; 
    $mail= mail($to, $subject, $message);
    //print_r $message; 
    //exit;
    //echo $res=1;

if($mail){
echo $res=1;
}
else
{
echo $res=0;
}
    



   }
}
